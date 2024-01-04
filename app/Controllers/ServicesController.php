<?php namespace App\Controllers;

use App\Models\ServicesModel;


class ServicesController extends BaseController{

    public function __construct()
    {
        helper(['form', 'url']);
    }
   
    public function index(){

      $data = [];

      $servicesModel = new servicesModel();
      $data['all_services'] = $servicesModel->findAll();


         // set the validation rules 
        $validationRules = [
            'service_name' => 
                [
                    'rules' => 'required|is_unique[services.service_name]',
                    'label' => 'Service Name',
                    'errors' => [
                        'required' => 'Please enter service name',
                        'is_unique' => 'The service name is already entered',
                    ]
                ],

            'service_summary' => [
                'rules'=>'required|min_length[100]|max_length[200]',
                'label' => 'Brief summary of service',
                'errors' => [
                    'required' =>'You must provide a captivating summary',
                    'min_length' =>'The summary cannot be less than 100 characters',
                    'max_length' =>'The summary cannot be more than 200 characters'
                ]
            ],

            'service_detail' => [
                'rules'=>'required|min_length[250]|max_length[3000]',
                'label' => 'Details of service',
                'errors' => [
                    'required' =>'Give detail info about this service you offer',
                    'min_length' =>'The details cannot be less than 250 characters',
                    'max_length' =>'The details cannot be more than 3000 characters'
                ]
            ],

             'service_icon' => [
                'rules'=>'required|max_length[50]',
                'label' => 'Details of service',
                'errors' => [
                    'required' =>'Provide the icon code, please',
                    'max_length' =>'This seems not to be a bootstrap icon code. Try again'
                ]
            ]
        ];

        if($this->request->getMethod() == "post")
        {
        	$formData = [];

        	if($this->validate($validationRules))
        	{
        		$formData['service_name'] = $this->request->getPost('service_name');
        		$formData['service_summary'] = $this->request->getPost('service_summary');
        		$formData['service_detail'] = $this->request->getPost('service_detail');
        		$formData['service_icon'] = $this->request->getPost('service_icon');

        		if($servicesModel->save($formData)){
        			return redirect()->to('/dashboard/services')->with('success', 'Service save and publshed successfully');
        		}else{
        			return redirect()->to('/dashboard/services')->with('error', 'Error in saving and publishing services');
        		}

        	}else{
        		$data['validation'] = $this->validator;
        	}
        }

      return view('dashboard/services', $data);
   }



   // =========== UPDATE SERVICE ===================

     public function edit($id){

       	if(empty($id)){
            return redirect()->to('/dashboard/portfolio')->with('error', 'Unknown Error');
            exit();
        }


      $data = [];

      $servicesModel = new servicesModel();
      $data['a_service_data'] = $servicesModel->find($id);
      
       if(empty($data['a_service_data'])){
            return redirect()->to('/dashboard/testimonials')->with('error', 'Unknown Error');
            exit();
      }


         // set the validation rules 
        $validationRules = [
            'service_name' => 
                [
                    'rules' => 'required',
                    'label' => 'Service Name',
                    'errors' => [
                        'required' => 'Please enter service name'
                    ]
                ],

            'service_summary' => [
                'rules'=>'required|min_length[100]|max_length[200]',
                'label' => 'Brief summary of service',
                'errors' => [
                    'required' =>'You must provide a captivating summary',
                    'min_length' =>'The summary cannot be less than 100 characters',
                    'max_length' =>'The summary cannot be more than 200 characters'
                ]
            ],

            'service_detail' => [
                'rules'=>'required|min_length[250]|max_length[3000]',
                'label' => 'Details of service',
                'errors' => [
                    'required' =>'Give detail info about this service you offer',
                    'min_length' =>'The details cannot be less than 250 characters',
                    'max_length' =>'The details cannot be more than 3000 characters'
                ]
            ],

             'service_icon' => [
                'rules'=>'required|max_length[50]',
                'label' => 'Details of service',
                'errors' => [
                    'required' =>'Provide the icon code, please',
                    'max_length' =>'This seems not to be a bootstrap icon code. Try again'
                ]
            ]
        ];

        if($this->request->getMethod() == "post")
        {

        	if($this->validate($validationRules))
        	{
        		$data['a_service_data']['service_name'] = $this->request->getPost('service_name');
        		$data['a_service_data']['service_summary'] = $this->request->getPost('service_summary');
        		$data['a_service_data']['service_detail'] = $this->request->getPost('service_detail');
        		$data['a_service_data']['service_icon'] = $this->request->getPost('service_icon');

        		if($servicesModel->update($id,$data['a_service_data'])){
        			return redirect()->to('/dashboard/services')->with('success', 'Service updated and publshed successfully');
        		}else{
        			return redirect()->to('/dashboard/services')->with('error', 'Error in updated and publishing services');
        		}

        	}else{
        		$data['validation'] = $this->validator;
        	}
        }

      return view('dashboard/edit_service', $data);
   }


}