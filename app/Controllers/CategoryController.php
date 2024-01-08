<?php namespace App\Controllers;

use App\Models\CategoryModel;


class CategoryController extends BaseController{
    public function __construct()
    {
        helper(['form', 'url']);
    }
   
    public function index(){
        $data = [];
        $data['passLink'] = "category";
        $data['userData'] = session()->get('userData');

        $CategoryModel = new CategoryModel();
        $data['all_categories'] = $CategoryModel->findAll();
        

        // set the validation rules 
        $validationRules = [
            'post_category' => 
                [
                    'rules' => 'required|is_unique[categories.post_category]',
                    'label' => 'Post Category',
                    'errors' => [
                        'required' => 'Please enter a post category',
                        'is_unique' => 'This category is already entered, try another please.',
                    ]
                ],

            'description' => [
                'rules'=>'required|min_length[20]',
                'label' => 'Post description',
                'errors' => [
                    'required' =>'You must provide vivid description of the Post Category',
                    'min_length' =>'The description cannot be less than 20 characters'
                ]
            ]
        ];

        if($this->request->getMethod() == "post")
        {
            $formData = [];
             $data['passLink'] = "clubmembership";

            // check if the form submitted validated 
            if($this->validate($validationRules))
            {
              
                $formData['post_category'] = $this->request->getPost('post_category');
                $formData['description'] = $this->request->getPost('description');

                if($CategoryModel->save($formData)){
                        return redirect()->to('/dashboard/category')->with('success', 'You successfully added a category');
                }
            }
            else
            {
                $data['category_validation'] = $this->validator;
            }
        }

        return view('dashboard/categories', $data);
    }


  

}