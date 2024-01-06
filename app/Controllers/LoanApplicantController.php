<?php namespace App\Controllers;

use App\Models\LoanApplicantModel;
use App\Models\LoanLogModel;


class LoanApplicantController extends BaseController{

    public function __construct()
    {
        helper(['form', 'url', 'text']);
    }
   
public function index()
    {
      $data = [];
       $data['passLink'] = "loanmanager";
        $data['userData'] = session()->get('userData');


      $LoanApplicantModel = new LoanApplicantModel();
      $LoanLogModel = new LoanLogModel();

      $data['pending_loan_applicants'] = $LoanApplicantModel->get_loan_applicants_log('Pending');
      $data['approved_loan_applicants'] = $LoanApplicantModel->get_loan_applicants_log('Approved');


        $validationRules = [

            'fullName' => [
                'rules' => 'required|min_length[6]|max_length[30]',
                'label' => 'Club Member Full Name',
                'errors' => [
                    'required' => 'Please provide the Club Member\'s full name.',
                    'min_length' => 'The name is too short. Minimum 6 characters required.',
                    'max_length' => 'The name is too long. Maximum 30 characters allowed.',
                ]
            ],

            'gender' => [
                'rules' => 'required',
                'label' => 'Member Gender',
                'errors' => [
                    'required' => 'Please provide the member\'s gender.'
                ]
            ], 


            'loanStartDate' => [
                'rules' => 'required',
                'label' => 'Date on which lone is given',
                'errors' => [
                    'required' => 'Give the date on which the loan is given'
                ]
            ], 

              'loanEndDate' => [
                'rules' => 'required',
                'label' => 'Date on which lone payment ends',
                'errors' => [
                    'required' => 'Give the date on which loan should end'
                ]
            ], 

             'loanAmount' => [
                'rules' => 'required',
                'label' => 'Ammount of Loan',
                'errors' => [
                    'required' => 'Amount of loan you are giving out should be indicated'
                ]
            ], 

            'interestRate' => [
                'rules' => 'required',
                'label' => 'Interest Rate',
                'errors' => [
                    'required' => 'Please enter the interest rate of the loan'
                ]
            ], 
 

            'phone' => [
                'rules' => 'required',
                'label' => 'Member Phone Number',
                'errors' => [
                    'required' => 'Member phone number is required.'
                ]
            ], 

            'address' => [
                'rules' => 'required',
                'label' => 'Member Residential Address',
                'errors' => [
                    'required' => 'Please provide the current residential address of the member.'
                ]
            ], 


            'currency' => [
                'rules' => 'required',
                'label' => 'Currency (LD or LRD)',
                'errors' => [
                    'required' => 'Let us know the currency of the account.'
                ]
            ], 


            'email' => [
                'rules' => 'required|min_length[10]',
                'label' => 'Club Member Email',
                'errors' => [
                    'required' => 'The email field cannot be empty.',
                    'min_length' => 'The email cannot be less than 10 characters.'
                ]
            ],

            'applicantImg' => [
                'rules' => 'uploaded[applicantImg]|max_size[applicantImg,6024]|is_image[applicantImg]|mime_in[applicantImg,image/jpeg,image/jpg,image/png]',
                'label' => 'Profile Image',
                'errors' => [
                    'required' => 'Please upload a valid file.',
                    'max_size'  => 'The file size is too large. Maximum size is 6 MB.',
                    'is_image' => 'Only image files are allowed.',
                    'mime_in' => 'Only JPEG, JPG, and PNG file types are allowed.'
                ]
            ],

            'loan_aggrement_form' => [
                'rules' => 'uploaded[loan_aggrement_form]|max_size[loan_aggrement_form,1024]|ext_in[loan_aggrement_form,pdf]',
                'label' => 'Loan agreement form',
                'errors' => [
                    'required' => 'Loan agreement document in pdf required',
                    'max_size'  => 'The file size is too large. Maximum size is 6 MB.',
                    'is_image' => 'Only pdf allowed',
                    'ext_in' => 'Please choose pdf only'
                ]
            ],
        ];


 if ($this->request->getMethod() == 'post') {

    if ($this->validate($validationRules)) {
        // Process and upload the image
        $profileImg_newname = "";
        if ($this->request->getFile('applicantImg')) {
            $profileImg = $this->request->getFile('applicantImg');
            $profileImg_newname = $profileImg->getRandomName(); // random image name
            if (!$profileImg->move('uploads/', $profileImg_newname)) {
                return redirect()->to('/dashboard/loan_membership')->with('error', 'Error uploading the profile image');
            }
        }

       
       // the code below uploads and save the applicant form 
        $loan_aggrement_form = "";

        if($this->request->getFile('loan_aggrement_form'))
        {
            $file = $this->request->getFile('loan_aggrement_form');
            $loan_aggrement_form = $file->getRandomName(); // random image name
                if(!$file->move('uploads/', $loan_aggrement_form)) {
                return redirect()->to('/dashboard/loan_membership')->with('error', 'Error uploading the application form');
            }
        }

        // generate loan code 
        $loanCode = random_string('alnum', 6);
        // Prepare form data
        $formData = [
            'fullName' => $this->request->getPost('fullName'),
            'gender' => $this->request->getPost('gender'),
            'applicantImg' => $profileImg_newname,
            'phone' => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address'),
            'deposite_unit' => $this->request->getPost('deposite_unit'),
            'saving_year' => $this->request->getPost('saving_year'),
            'currency' => $this->request->getPost('currency'),
            'email' => $this->request->getPost('email'),
            'mem_serial' => $this->request->getPost('mem_serial'),
            'serial_no' => $loanCode,
            'loan_aggrement_form' => $loan_aggrement_form,
            'interestRate' => $this->request->getPost('interestRate'),
            'loanAmount' => $this->request->getPost('loanAmount'),
            'loanStartDate' => $this->request->getPost('loanStartDate'),
            'loanEndDate' => $this->request->getPost('loanEndDate'),
            'pmtStatus' => 'complete', // create thifield in the form pls
            'regBy' => 1,
            'profileImg' => $profileImg_newname,
        ];

        // Save data to the database
        if ($LoanApplicantModel->save($formData)) {
            return redirect()->to('/dashboard/loanmanager')->with('success', 'Loan application for '.$this->request->getPost('fullName').' is recorded successfully<br> The loan code is: '.$loanCode);
                } else {
                    return redirect()->to('/dashboard/loanmanager')->with('error', 'Failed to record loan application');
                }
            } else {
                $data['validation'] = $this->validator;
            }
              
        }

      return view('dashboard/loan_applicants', $data);
    }


    //============== UPDATE LOAN MEMBER PROFILE ================

    public function edit($serial){
        $data = [];
         $data['passLink'] = "loanmanager";
        $data['userData'] = session()->get('userData');


        if(empty($serial)){
          return redirect()->to('/dashboard/loanmanager')->with('error', 'Unknown Error. Just try again');
          exit();
        }
       // check if the id is null
        $LoanApplicantModel = new LoanApplicantModel();

          // get the lone log to edit
          $data['client_profile'] =  $LoanApplicantModel->where('serial_no', $serial)->find();

          if(!$data['client_profile']){
            return redirect()->to('/dashboard/loanmanager')->with('error', 'Record no longer exists');
            exit();
          }


            $validationRules = [

            'phone' => [
                'rules' => 'required',
                'label' => 'Member Phone Number',
                'errors' => [
                    'required' => 'Member phone number is required.'
                ]
            ], 

            'address' => [
                'rules' => 'required',
                'label' => 'Member Residential Address',
                'errors' => [
                    'required' => 'Please provide the current residential address of the member.'
                ]
            ], 



            'email' => [
                'rules' => 'required|min_length[10]',
                'label' => 'Club Member Email',
                'errors' => [
                    'required' => 'The email field cannot be empty.',
                    'min_length' => 'The email cannot be less than 10 characters.'
                ]
            ],

        ];


        if($this->request->getMethod() == "post")
        {
            if($this->validate($validationRules))
            {
                $data['client_profile']['phone'] = $this->request->getPost('phone');
                $data['client_profile']['address'] = $this->request->getPost('address');
                $data['client_profile']['email'] = $this->request->getPost('email');

                if($LoanApplicantModel->update($data['client_profile'][0]['id'],$data['client_profile']))
                    {
                        return redirect()->to('/dashboard/loanmanager')->with('success', 'You updated the profile of '.$data['client_profile'][0]['fullName']);
                    }

            }else{
               return redirect()->to('/dashboard/loanmanager')->with('error', 'failed to update the profile of '.$data['client_profile'][0]['fullName']);
            }
        }

        return redirect()->to('/dashboard/loanmanager')->with('success', 'Welcome from an unknown location (:');
  }



  // ================ MARK LOAN APPLICANT AS COMPLETE PAYMENT ===================
  public function update_applicant_status($serial) {
        
        $data = [];
        $data['passLink'] = "loanmanager";
        $data['userData'] = session()->get('userData');


        if(empty($serial)){
          return redirect()->to('/dashboard/loanmanager')->with('error', 'Unknown Error. Just try again');
          exit();
        }
       // check if the id is null
        $LoanApplicantModel = new LoanApplicantModel();

          // get the lone log to edit
          $data['client_profile'] =  $LoanApplicantModel->where('serial_no', $serial)->find();

          if(!$data['client_profile']){
            return redirect()->to('/dashboard/loanmanager')->with('error', 'Loan Client Record no longer exists');
            exit();
        }

        $data['client_profile']['pmtStatus'] = "Complete";

        if($LoanApplicantModel->update($data['client_profile'][0]['id'],$data['client_profile']))
            {
                return redirect()->to('/dashboard/loan_membership')->with('success', 'You marked '.$data['client_profile'][0]['fullName'].' as complete in term of lone payment.');
            }else{
                return redirect()->to('/dashboard/loan_membership')->with('error', 'Failed to mark '.$data['client_profile'][0]['fullName'.' as complete']);
            }
  }


public function view_profile($id)
    {
        if(empty($id) || !is_numeric($id)){
          return redirect()->to('/dashboard/loan_membership')->with('error', 'Sorr we expected a number in your request');
          exit();
        }

        $data = [];
        $data['passLink'] = "loanmanager";
        $data['userData'] = session()->get('userData');


          $LoanApplicantModel = new LoanApplicantModel();
          $LoanLogModel = new LoanLogModel();

          $data['applicant_data'] = $LoanApplicantModel->get_an_applicant_profile_by_id($id);

          if(!$data['applicant_data']){
          return redirect()->to('/dashboard/loan_membership')->with('error', 'That applicant no longer exist, sorr!');
          exit();
        }

        // print_r($data['applicant_data'][0]);
        // exit();

        $serial = $data['applicant_data'][0]->mem_serial;

          $data['applicant_pending_loan_log'] = $LoanLogModel->get_loan_applicants_log($serial, 'Pending');
          $data['applicant_approved_loan_log'] = $LoanLogModel->get_loan_applicants_log($serial, 'Approved');


        return view('dashboard/vies_loan_applicant_profile', $data);


    }

}

