<?php namespace App\Controllers;

use App\Models\LoanApplicantModel;
use App\Models\LoanLogModel;


class LoanPaymentController extends BaseController{

    public function __construct()
    {
        helper(['form', 'url', 'text']);
    }

// ======================SAVE LOAN PAYMENT ======================

    public function index(){
      
     $data = [];
       $data['passLink'] = "loan_payments";
        $data['userData'] = session()->get('userData');

      $LoanApplicantModel = new LoanApplicantModel();
      $LoanLogModel = new LoanLogModel();

      
      $data['all_pending_loan_payments'] = $LoanLogModel->all_pending_loan_payments('Pending');
      $data['all_approved_loan_payments'] = $LoanLogModel->all_pending_loan_payments('Approved');


     $validationRules = [
           
           'serial_no' => [
                        'rules' => 'required',
                        'label' => 'Loan Serial Number',
                        'errors' => [
                            'required' => 'The loan serial no is required'
                        ]
                    ],

            'mount' => [
                'rules' => 'required',
                'label' => 'Amount ',
                'errors' => [
                    'required' => 'Please enter the amount the client is paying'
                ]
            ],

            'pmtCurrency' => [
                'rules' => 'required',
                'label' => 'Payment Currency',
                'errors' => [
                    'required' => 'Payment currency is required',
                ]
            ]
        ];


    if($this->request->getMethod() == 'post')
    {

        if($this->validate($validationRules))
        {
            // get the data of the account serial submitted 
            $accountData = $LoanApplicantModel
                                    ->where('serial_no', $this->request->getPost('serial_no'))
                                    ->find();
            // check if there's data 
            if(!$accountData){
                return redirect()->to('/dashboard/loan_payments')->with('error', 'Invalid Loan Serial Number. Try Again');
                
              }

            // check if the currenciesy match 
              if(!($accountData[0]['currency'] === $this->request->getPost('pmtCurrency'))){
                return redirect()->to('/dashboard/loan_payments')->with('error', 'Invalid Loan currency. The loan was taken in '.$accountData[0]['currency']);
              }

              //loggedBy    loggedDate  
              $formData = [
                'loggedBy' => $data['userData']['id'],
                'serial_no' => $this->request->getPost('serial_no'),
                'amount' => $this->request->getPost('mount'),
                'pmtCurrency' => $this->request->getPost('pmtCurrency'),
                'isApproved' => 'Pending',
              ];

              if($LoanLogModel->save($formData)){
                return redirect()->to('/dashboard/loan_payments')->with('success', 'Loan payment recoded successfully');
              }else{
                return redirect()->to('/dashboard/loan_payments')->with('error', 'Unknown Error. Just try again');
              }

        }else{
            $data['lonePaymentLogValidation'] = $this->validator;
        }
    }

      return view('dashboard/loan_payments', $data);
  }

//============ EDIT A LOAN PAYMENT METHOD =============
 

  public function edit($id)
  {
    $data = [];
    $data['passLink'] = "loan_payments";

    // if id not correct
    if(empty($id) || !is_numeric($id)){
      return redirect()->to('/dashboard/loan_payments')->with('error', 'Unknown Error. Just try again');
      exit();
    }



      $LoanApplicantModel = new LoanApplicantModel();
      $LoanLogModel = new LoanLogModel();

      
      $data['all_pending_loan_payments'] = $LoanLogModel->all_pending_loan_payments('Pending');
      $data['all_approved_loan_payments'] = $LoanLogModel->all_pending_loan_payments('Approved');

      // get the lone log to edit
      $data['data_to_edit'] = $LoanLogModel->find($id);

      if(!$data['data_to_edit']){
        return redirect()->to('/dashboard/loan_payments')->with('error', 'Record no longer exists');
        exit();
      }

      $data['applicant_data'] =  $LoanApplicantModel->get_an_applicant_profile($data['data_to_edit']['serial_no']);
      $data['client_profile'] =  $LoanApplicantModel->get_an_applicant_profile($data['data_to_edit']['serial_no']);




     $validationRules = [
           
           'serial_no' => [
                        'rules' => 'required',
                        'label' => 'Loan Serial Number',
                        'errors' => [
                            'required' => 'The loan serial no is required'
                        ]
                    ],

            'mount' => [
                'rules' => 'required',
                'label' => 'Amount the client is paying',
                'errors' => [
                    'required' => 'Please enter the amount the client'
                ]
            ],

            'pmtCurrency' => [
                'rules' => 'required',
                'label' => 'Payment Currency',
                'errors' => [
                    'required' => 'Payment currency is required',
                ]
            ]
        ];


    if($this->request->getMethod() == 'post')
    {

        if($this->validate($validationRules))
        {
            // get the data of the account serial submitted 
            $accountData = $LoanApplicantModel
                                    ->where('serial_no', $this->request->getPost('serial_no'))
                                    ->find();
            // check if there's data 
            if(!$accountData){
                return redirect()->to('/dashboard/loan_payments')->with('error', 'Invalid Loan Serial Number. Try Again');
                
              }

            // check if the currenciesy match 
              if(!($accountData[0]['currency'] === $this->request->getPost('pmtCurrency'))){
                return redirect()->to('dashboard/loan_payments')->with('error', 'Invalid Loan currency. The loan was taken in '.$accountData[0]['currency']);
              }

             
             if(($data['userData']['id'] == $data['data_to_edit']['loggedBy']) || $data['userData']['userRole'] == 'SUDO'){
              
                  $data['data_to_edit']['loggedBy'] = $data['data_to_edit']['loggedBy'];
                  $data['data_to_edit']['serial_no'] = $this->request->getPost('serial_no');
                  $data['data_to_edit']['amount'] = $this->request->getPost('mount');
                  $data['data_to_edit']['pmtCurrency'] = $this->request->getPost('pmtCurrency');

                if($LoanLogModel->update($id, $data['data_to_edit'])){
                  return redirect()->to('dashboard/loan_payments')->with('success', 'Loan payment updated successfully');
                }else{
                  return redirect()->to('dashboard/loan_payments')->with('error', 'Unknown Error... Just try again');
                }
              }else{
                return redirect()->to('dashboard/loan_payments')->with('error', 'You are trying to edit data you did not record... STOP');
              }

        }else{
            $data['lonePaymentLogValidation'] = $this->validator;
        }
    }

      return view('dashboard/edit_loan_log', $data);
  }


  public function approve($id)
  {
    $data['userData'] = session()->get('userData');
    // if id not correct
    if(empty($id) || !is_numeric($id)){
      return redirect()->to('/dashboard/loan_payments')->with('error', 'Unknown Error. Just try again');
      exit();
    }
    // check if the previllage exist to approve payment 
    if($data['userData']['userRole'] == 'SUDO'){
      // find the data to edit
       $LoanLogModel = new LoanLogModel();
        $data['data_to_edit'] = $LoanLogModel->find($id);

      if(!$data['data_to_edit']){
        return redirect()->to('/dashboard/loan_payments')->with('error', 'Record no longer exists');
        exit();
      }
      // set the isApproved to Approved from pending 
      $data['data_to_edit']['isApproved'] = "Approved";
      // check if it's saved
      if($LoanLogModel->update($id, $data['data_to_edit'])){
            return redirect()->to('dashboard/loan_payments')->with('success', 'Loan payment approved successfully');
          }else{
              return redirect()->to('dashboard/loan_payments')->with('error', 'Unknown Error... Just try again');
              }
      }else{
         return redirect()->to('/dashboard/loan_payments')->with('error', 'You do not have to right to approve payments');
          exit();
      }
  }


  public function delete($id){
    $data['userData'] = session()->get('userData');
    // if id not correct
    if(empty($id) || !is_numeric($id)){
      return redirect()->to('/dashboard/loan_payments')->with('error', 'Unknown Error. Just try again');
      exit();
    }

      // find the data to edit
      $LoanApplicantModel = new LoanApplicantModel();
      $data['data_to_delete'] = $LoanApplicantModel->find($id);

      if(!$data['data_to_delete']){
        return redirect()->to('/dashboard/loan_payments')->with('error', 'Record no longer exists');
        exit();
      }      

    // check if the previllage exist to approve payment 
    if($data['userData']['userRole'] == 'SUDO' || !($data['data_to_delete']['regBy'] == $data['userData']['id'])){
      // check if it's saved
      if($LoanApplicantModel->delete($id)){
            return redirect()->to('dashboard/loan_payments')->with('success', 'You successfully deleted a loan applicant successfully');
          }else{
              return redirect()->to('dashboard/loan_payments')->with('error', 'Unknown Error... Just try again');
              }
      }else{
         return redirect()->to('/dashboard/loan_payments')->with('error', 'You do not have to right to to do this');
          exit();
      }
  }



}

