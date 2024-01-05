<?php namespace App\Controllers;

use App\Models\ClubDueLogModel;
use App\Models\ClubMembershipModel;


class DueController extends BaseController{
    public function __construct()
    {
        helper(['form', 'url']);
    }
   
    public function index(){
        $data = [];
        $data['userData'] = session()->get('userData');

         $data['passLink'] = "club_due_management";

         $ClubMembershipModel = new ClubMembershipModel();
        $ClubDueLogModel = new ClubDueLogModel();
         
     	 $data['due_payment_approved_log'] = $ClubDueLogModel->return_payment_log('Approved');

        $data['due_payment_pending_log'] = $ClubDueLogModel->return_payment_log('Pending');
        							
     
   	
    $validationRules = [
           
           'mem_serial_no' => [
                        'rules' => 'required',
                        'label' => 'Member/Account Serial Number',
                        'errors' => [
                            'required' => 'Please enter the member serial number'
                        ]
                    ],

            'due_amount' => [
                'rules' => 'required',
                'label' => 'Amount the client is paying',
                'errors' => [
                    'required' => 'Please enter the amount the member pays'
                ]
            ],

            'due_currency' => [
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
            $accountData = $ClubMembershipModel
                                    ->where('memberSerialNo', $this->request->getPost('mem_serial_no'))
                                    ->find();
            // check if there's data 
            if(!$accountData){
                return redirect()->to('/dashboard/club_due_management')->with('error', 'Invalid User Serial Number. Try Again');
                
              }

              
              

            // check if the currenciesy match 
              if(!($accountData[0]['currency'] == $this->request->getPost('due_currency'))){
                return redirect()->to('/dashboard/club_due_management')->with('error', 'Invalid account currency. The account was created in '.$accountData[0]['currency']);
              }
  
              $formData = [
                'due_amount' => $this->request->getPost('due_amount'),
                'mem_serial_no' => $this->request->getPost('mem_serial_no'),
                'due_currency' => $this->request->getPost('due_currency'),
                'recordedBy' => session()->get('userData')['id'],
                'last_edited_date' => date('Y-m-d'),
                'last_edited_by' => session()->get('userData')['id'],
                'approved_status' => 'Pending'
              ];

              if($ClubDueLogModel->save($formData)){
                return redirect()->to('/dashboard/club_due_management')->with('success', 'Due save successfully recoded and pending to be approved by CEO');
              }else{
                return redirect()->to('/dashboard/club_due_management')->with('error', 'Unknown Error. Just try again');
              }

        }else{
            $data['duePaymentValidation'] = $this->validator;
        }
    }


      return view('dashboard/club_due_management', $data);
    }



//========== edit due payment log LOG ================

    public function edit($id)
    {
        $data = [];
        $data['passLink'] = "club_due_management";
        $data['userData'] = session()->get('userData');
        
        
        // if id not correct
        if(empty($id) || !is_numeric($id)){
          return redirect()->to('/dashboard/club_due_management')->with('error', 'Unknown Error. Just try again');
          exit();
        }

        $ClubDueLogModel = new ClubDueLogModel();
         $ClubMembershipModel = new ClubMembershipModel();

             // get the lone log to edit
      $data['data_to_edit'] =  $ClubDueLogModel->find($id);
      //print_r($data['data_to_edit']); exit();
      if(!$data['data_to_edit']){
        return redirect()->to('/dashboard/club_due_management')->with('error', 'Record no longer exists');
        exit();
      }

      $serial = $data['data_to_edit']['mem_serial_no'];
      
        $data['member_profile'] =  $ClubMembershipModel->a_member_profile_log($serial);
        $data['a_member_payment_pending_log'] = $ClubDueLogModel->a_member_payment_log("Pending", $serial);
        $data['a_member_payment_approvide_log'] = $ClubDueLogModel->a_member_payment_log("Approved", $serial);



        $validationRules = [
           
           'mem_serial_no' => [
                        'rules' => 'required',
                        'label' => 'Member/Account Serial Number',
                        'errors' => [
                            'required' => 'Please enter the member serial number'
                        ]
                    ],

            'due_amount' => [
                'rules' => 'required',
                'label' => 'Amount the client is paying',
                'errors' => [
                    'required' => 'Please enter the amount the member pays'
                ]
            ],

            'due_currency' => [
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
                $data['data_to_edit']['due_amount'] = $this->request->getPost('due_amount');
                $data['data_to_edit']['last_edited_by'] = session()->get('userData')['id'];
                $data['data_to_edit']['last_edited_date'] = date('Y-m-d');
                $data['data_to_edit']['approved_status'] = 'Pending';

                if($ClubDueLogModel->update($id, $data['data_to_edit'])){
                    return redirect()->to('/dashboard/club_due_management')->with('success', 'Due payment successfully updated and pending for approvial by CEO');
                }
            }else{
                $data['duePaymentValidation'] = $this->validator; 
            }
        }


      return view('dashboard/edit_due_log', $data);

    }


//=========== delete a log from the saving db or table 
    public function delete($id){

        if(empty($id) || !is_numeric($id)){
              return redirect()->to('/dashboard/club_due_management')->with('error', 'Dumps dont hack');
              exit();
        }

          $ClubDueLogModel = new ClubDueLogModel();
          $data['userData'] = session()->get('userData');

          // check if the person trying to delete this is sudo user or creator of it. 
          $data_to_delete = $ClubDueLogModel->find($id);
          if(!$data_to_delete){
             return redirect()->to('/dashboard/club_due_management')->with('error', 'Data no longer exists');
                  exit();
          }

          if(($data_to_delete['recordedBy'] == $data['userData']['id']) || ($data['userData']['userRole'] == 'SUDO')){
              if($ClubDueLogModel->delete($id)){
                return redirect()->to('/dashboard/club_due_management')->with('success', 'A due payment was successfully deleted');
                  exit();
              }else{
                return redirect()->to('/dashboard/club_due_management')->with('error', 'Failed to delete for unknown reason');
                  exit();
              }
          }
    }


// approve a log from the db by admin 
    public function approve_payment($id)
    {
       if(empty($id) || !is_numeric($id)){
              return redirect()->to('/dashboard/club_due_management')->with('error', 'Dumps dont hack');
              exit();
        }

          $ClubDueLogModel = new ClubDueLogModel();
          $data['userData'] = session()->get('userData');

          // check if the person trying to delete this is sudo user or creator of it. 
          $data_to_approve = $ClubDueLogModel->find($id);
          if(!$data_to_approve){
             return redirect()->to('/dashboard/club_due_management')->with('error', 'Data no longer exists');
                  exit();
          }

          if(($data['userData']['userRole'] == 'SUDO')){
              $data_to_approve['approved_status'] = 'Approved';
              if($ClubDueLogModel->update($id, $data_to_approve)){
                return redirect()->to('/dashboard/club_due_management')->with('success', 'A due payment was successfully Approved');
                  exit();
              }else{
                return redirect()->to('/dashboard/club_due_management')->with('error', 'Failed to approve for unknown reason');
                  exit();
              }
          }else{
            return redirect()->to('/dashboard/club_due_management')->with('error', 'Invalid Request - your account dont have the right to do this!');
                  exit();
          }
    }

}