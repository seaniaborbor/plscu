<?php namespace App\Controllers;

use App\Models\FaqModel;


class FaqController extends BaseController{
    public function __construct()
    {
        helper(['form', 'url']);
    }
   
    public function index(){
        $data = [];
         $data['passLink'] = "clubmembership";
         
        $FaqModel = new FaqModel();
        $data['all_faq'] = $FaqModel->findAll();
        

        // set the validation rules 
        $validationRules = [
            'question' => 
                [
                    'rules' => 'required|is_unique[categories.post_category]',
                    'label' => 'Question',
                    'errors' => [
                        'required' => 'Please enter a question',
                        'is_unique' => 'This category is question is already asked',
                    ]
                ],

            'answer' => [
                'rules'=>'required|max_length[500]',
                'label' => 'Question answer',
                'errors' => [
                    'required' =>'You must provide vivid answer of the answer',
                    'max_length' =>'The answer cannot be more than 500  characters'
                ]
            ]
        ];

        if($this->request->getMethod() == "post")
        {
            $formData = [];


            // check if the form submitted validated 
            if($this->validate($validationRules))
            {
              
                $formData['question'] = $this->request->getPost('question');
                $formData['answer'] = $this->request->getPost('answer');

                if($FaqModel->save($formData)){
                        return redirect()->to('/dashboard/faq')->with('success', 'You successfully answered a frequently question');
                }
            }
            else
            {
                $data['category_validation'] = $this->validator;
            }
        }

        return view('dashboard/faq', $data);
    }


  

}