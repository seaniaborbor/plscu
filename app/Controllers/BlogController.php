<?php

namespace App\Controllers;


use App\Models\CategoryModel;
use App\Models\BlogModel;


class BlogController extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url']);
    }
    //admin dashboard for managing blog
    public function index()
    {
        $data = [];
         $data['passLink'] = "blog";
        $data['userData'] = session()->get('userData');
        
        $BlogModel = new BlogModel();
        $data['all_blogs'] = $BlogModel->findAll();

        $CategoryModel = new CategoryModel();
        $data['all_categories'] = $CategoryModel->findAll();

        // validata the form if submitted 
        $rules = [
            'title' => [
                'rules' => "required|min_length[6]|max_length[50]",
                'label' => "Post headline",
                'errors' => [
                    'required' => 'This headline field is a must',
                    'min_length'  => 'The headline is too short',
                    'max_length' => 'Title too long'
                ]
            ],

            'featureImg' => [
                'rules' => 'uploaded[featureImg]|max_size[featureImg,6024]|is_image[featureImg]|mime_in[featureImg,image/jpeg,image/jpg,image/png]',
                'label' => 'Feature Image',
                'errors' => [
                    'required' => 'This field must be a valid file',
                    'max_size'  => 'The file is too large',
                    'is_image' => 'Only image files is allowed',
                    'mime_in' => 'Only of type jpeg, jpg & pngs are allowed'
                ]
            ],

            'postbody' => [
                'rules' => "required|min_length[200]|max_length[5000]",
                'label' => "Blog content",
                'errors' => [
                    'required' => 'This blog content field is a must',
                    'min_length'  => 'The content is too short',
                    'max_length' => 'The content too long'
                ]
            ],

             'category' => [
                'rules' => "required|min_length[6]|max_length[50]",
                'label' => "Post category ",
                'errors' => [
                    'required' => 'This category field is a must',
                    'min_length'  => 'The category is too short',
                    'max_length' => 'category too long'
                ]
            ]
        ];

        // a post request is made
        if($this->request->getMethod() == "post")
        {
            // check if form is validated 
            if($this->validate($rules))
            {
                $formData = []; // array of data to be saved initialized 
                $featureImg_newname = "";
                // process and upload the image here 
                 if($this->request->getFile('featureImg'))
                 {
                    $featureImg = $this->request->getFile('featureImg');
                    $featureImg_newname = $featureImg->getRandomName(); // random image name 
                     if(!$featureImg->move('uploads/', $featureImg_newname))
                     {
                        return redirect()->to('/dashboard/blog')->with('error', 'Error in uploading the the feature image');
                        exit();
                     }    
                  }

                  // populate array to be save - say get form data to be save
                  $formData['title'] = $this->request->getPost('title');
                  $formData['featureImg'] = $featureImg_newname;
                  $formData['postbody'] = $this->request->getPost('postbody');
                  $formData['category'] = $this->request->getPost('category');

                  if($BlogModel->save($formData))
                  {
                        return redirect()->to('/dashboard/blog')->with('success', 'You successfully published a blog post');
                   }

            }else{
                $data['validation'] = $this->validator;
            }
        }

       return view("dashboard/blog", $data);
    }


    // ================= EDIT BLOG METHOD ==============

    public function edit($id)
    {
         if(empty($id) || !is_numeric($id))
         {
            return redirect()->to('/dashboard/blog')->with('error', 'Unknown Error');
            exit();
         }

        $data = [];
         $data['passLink'] = "blog";
        $data['userData'] = session()->get('userData');
        
        $BlogModel = new BlogModel();
        $data['blog_data'] = $BlogModel->find($id);

        if(empty($data['blog_data'])){
        return redirect()->to('/dashboard/blog')->with('error', 'Unknown Error');
        exit();

      }

        $CategoryModel = new CategoryModel();
        $data['all_categories'] = $CategoryModel->findAll();

        // validata the form if submitted 
        $rules = [
            'title' => [
                'rules' => "required|min_length[6]|max_length[50]",
                'label' => "Post headline",
                'errors' => [
                    'required' => 'This headline field is a must',
                    'min_length'  => 'The headline is too short',
                    'max_length' => 'Title too long'
                ]
            ],

            'postbody' => [
                'rules' => "required|min_length[200]|max_length[5000]",
                'label' => "Blog content",
                'errors' => [
                    'required' => 'This blog content field is a must',
                    'min_length'  => 'The content is too short',
                    'max_length' => 'The content too long'
                ]
            ],

             'category' => [
                'rules' => "required|min_length[6]|max_length[50]",
                'label' => "Post category ",
                'errors' => [
                    'required' => 'This category field is a must',
                    'min_length'  => 'The category is too short',
                    'max_length' => 'category too long'
                ]
            ]
        ];

        $update_featureImg = false;

        if($this->request->getFile('featureImg') && $this->request->getFile('featureImg')->isValid())
         {
               $rules['featureImg'] = [
                'rules' => 'uploaded[featureImg]|max_size[featureImg,6024]|is_image[featureImg]|mime_in[featureImg,image/jpeg,image/jpg,image/png]',
                'label' => 'Feature Image',
                'errors' => [
                    'required' => 'This field must be a valid file',
                    'max_size'  => 'The file is too large',
                    'is_image' => 'Only image files is allowed',
                    'mime_in' => 'Only of type jpeg, jpg & pngs are allowed'
                ]
            ];

            $update_featureImg = true;

          }
        // a post request is made
        if($this->request->getMethod() == "post")
        {
            // check if form is validated 
            if($this->validate($rules))
            {
                $formData = []; // array of data to be saved initialized 
                $featureImg_newname = "";

                // process and upload the image here  if it is meant
                 if($update_featureImg)
                 {
                    $featureImg = $this->request->getFile('featureImg');
                    $featureImg_newname = $featureImg->getRandomName(); // random image name 
                     if(!$featureImg->move('uploads/', $featureImg_newname))
                     {
                        return redirect()->to('/dashboard/blog')->with('error', 'Error in uploading the the feature image');
                        exit();
                     }    
                  }

                  // populate array to be save - say get form data to be save
                  $formData['title'] = $this->request->getPost('title');
                  $formData['featureImg'] = $featureImg_newname;
                  $formData['postbody'] = $this->request->getPost('postbody');
                  $formData['category'] = $this->request->getPost('category');

                  if($BlogModel->update($id, $formData))
                  {
                        return redirect()->to('/dashboard/blog')->with('success', 'You successfully published a blog post');
                   }

            }else{
                $data['validation'] = $this->validator;
            }
        }

       return view("dashboard/edit_blog", $data);
    }

}
