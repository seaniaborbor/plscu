<?php namespace App\Controllers;

use App\Models\TestimonialsModel;


class TestimonialsController extends BaseController{

    public function __construct()
    {
        helper(['form', 'url']);
    }
   
    public function index(){

      $data = [];

      $testimonialModel = new TestimonialsModel();
      $data['all_testimonials'] = $testimonialModel->findAll();


         // set the validation rules 
        $validationRules = [
            'customer_name' => [
                    'rules' => 'required',
                    'label' => 'Customer Name',
                    'errors' => [
                        'required' => 'Please enter Customer Name'
                    ]
                ],

            'customer_title' => [
                'rules'=>'required|max_length[100]',
                'label' => 'Customer Title',
                'errors' => [
                    'required' =>'You must provide a captivating summary',
                    'max_length' =>'Customer Title cannot be more than 200 characters'
                ]
            ],

            'customer_testimoney' => [
                'rules'=>'required|min_length[50]|max_length[600]',
                'label' => 'Customer Testimoney',
                'errors' => [
                    'required' =>'Give detail info about this service you offer',
                    'min_length' =>'The details cannot be less than 250 characters',
                    'max_length' =>'The details cannot be more than 3000 characters'
                ]
            ],

             'customer_pic' => [
                'rules' => 'uploaded[customer_pic]|max_size[customer_pic,6024]|is_image[customer_pic]|mime_in[customer_pic,image/jpeg,image/jpg,image/png]',
                    'label' => 'Customer Pic',
                    'errors' => [
                        'required' => 'This field must be a valid file',
                        'max_size'  => 'The file is too large',
                        'is_image' => 'Only image files is allowed',
                        'mime_in' => 'Only of type jpeg, jpg & png are allowed'
                    ]
            ]
        ];

        if($this->request->getMethod() == "post")
        {
        	$formData = [];

        	if($this->validate($validationRules))
        	{
                  $customer_pic_newname = "";
                // process and upload the image here 
                 if($this->request->getFile('customer_pic'))
                 {
                    $customer_pic = $this->request->getFile('customer_pic');
                    $customer_pic_newname = $customer_pic->getRandomName(); // random image name 
                     if(!$customer_pic->move('uploads/', $customer_pic_newname))
                     {
                        return redirect()->to('/dashboard/blog')->with('error', 'Error in uploading the the feature image');
                        exit();
                     }    
                  }

        		$formData['customer_name'] = $this->request->getPost('customer_name');
        		$formData['customer_title'] = $this->request->getPost('customer_title');
        		$formData['customer_testimoney'] = $this->request->getPost('customer_testimoney');
        		$formData['customer_pic'] = $customer_pic_newname;

        		if($testimonialModel->save($formData)){
        			return redirect()->to('/dashboard/testimonials')->with('success', 'A customer testimony save and publshed successfully');
        		}else{
        			return redirect()->to('/dashboard/testimonials')->with('error', 'Error in saving and publishing A customer testimony');
        		}

        	}else{
        		$data['validation'] = $this->validator;
        	}
        }

      return view('dashboard/testimonials', $data);
   }



   // =========== UPDATE TESTIMONIAL ===================
    public function edit($id){

      $data = [];

       // check if the id is null
        if(empty($id)){
            return redirect()->to('/dashboard/testimonials')->with('error', 'Unknown Error');
            exit();
        }


      $testimonialModel = new TestimonialsModel();
      $data['a_testimonial'] = $testimonialModel->find($id);
      
      if(empty($data['a_testimonial'])){
            return redirect()->to('/dashboard/testimonials')->with('error', 'Unknown Error');
            exit();
      }


         // set the validation rules 
              $validationRules = [
            'customer_name' => [
                    'rules' => 'required',
                    'label' => 'Customer Name',
                    'errors' => [
                        'required' => 'Please enter Customer Name'
                    ]
                ],

            'customer_title' => [
                'rules'=>'required',
                'label' => 'Customer Title',
                'errors' => [
                    'required' =>'You must provide a captivating summary'
                ]
            ],

            'customer_testimoney' => [
                'rules'=>'required|min_length[50]|max_length[300]',
                'label' => 'Customer Testimoney',
                'errors' => [
                    'required' =>'Give detail info about this service you offer',
                    'min_length' =>'The details cannot be less than 250 characters',
                    'max_length' =>'The details cannot be more than 3000 characters'
                ]
            ]
        ];

             // there is a request to update the profile picture
      $update_profileImg = false;

      if($this->request->getFile('customer_pic') && $this->request->getFile('customer_pic')->isValid())
        {
            $validationRules['customer_pic'] = [
                  'rules' => 'uploaded[customer_pic]|max_size[customer_pic,6024]|is_image[customer_pic]|mime_in[customer_pic,image/jpeg,image/jpg,image/png]',
                  'label' => 'Profile Image',
                  'errors' => [
                      'required' => 'This field must be a valid file',
                      'max_size'  => 'The file is too large',
                      'is_image' => 'Only image files is allowed',
                      'mime_in' => 'Only of type jpeg, jpg & pngs are allowed'
                  ]
              ];

            $update_profileImg = true;
        }


        if($this->request->getMethod() == "post")
        {
            $formData = [];

            if($this->validate($validationRules))
            {
                  $customer_pic_newname = "";
                // process and upload the image here 
                 if($update_profileImg)
                 {
                    $customer_pic = $this->request->getFile('customer_pic');
                    $customer_pic_newname = $customer_pic->getRandomName(); // random image name 
                    $data['a_testimonial']['customer_pic'] = $customer_pic_newname;

                     if(!$customer_pic->move('uploads/', $customer_pic_newname))
                     {
                        return redirect()->to('/dashboard/blog')->with('error', 'Error in uploading the the feature image');
                        exit();
                     }    
                  }

                $data['a_testimonial']['customer_name'] = $this->request->getPost('customer_name');
                $data['a_testimonial']['customer_title'] = $this->request->getPost('customer_title');
                $data['a_testimonial']['customer_testimoney'] = $this->request->getPost('customer_testimoney');

                if($testimonialModel->update($id,$data['a_testimonial'])){
                    return redirect()->to('/dashboard/testimonials')->with('success', 'A customer testimony updated and publshed successfully');
                }else{
                    return redirect()->to('/dashboard/edit/testimonials/'.$id)->with('error', 'Error in updating and publishing A customer testimony');
                }

            }else{
                $data['validation'] = $this->validator;
            }
        }

      return view('dashboard/edit_testimonial', $data);
   }



}