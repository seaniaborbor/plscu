<?php namespace App\Controllers;

use App\Models\ClubMembershipModel;
use App\Models\ClubDueLogModel;



class ClubMembershipController extends BaseController{

    public function __construct()
    {
        helper(['form', 'url', 'text']);
    }
   
    public function index(){
        $data = [];
        $data['passLink'] = "clubmembership";
        $data['userData'] = session()->get('userData');


    $ClubDueLogModel = new ClubDueLogModel();
    $ClubMembershipModel = new ClubMembershipModel();

    $data['approve_member'] = $ClubMembershipModel->return_member_log('Approved');
    $data['pending_member'] = $ClubMembershipModel->return_member_log('Pending');

      


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

    'dob' => [
        'rules' => 'required',
        'label' => 'Member Date of Birth',
        'errors' => [
            'required' => 'Please provide the member\'s date of birth.'
        ]
    ], 

    'membership_category' => [
        'rules' => 'required',
        'label' => 'Membership Category',
        'errors' => [
            'required' => 'You must provide the category this registrant falls into.'
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

    'deposite_unit' => [
        'rules' => 'required',
        'label' => 'Amount per Deposit',
        'errors' => [
            'required' => 'Please specify the amount the member will be saving each time.'
        ]
    ], 

    'currency' => [
        'rules' => 'required',
        'label' => 'Currency (LD or LRD)',
        'errors' => [
            'required' => 'Let us know the currency of the account.'
        ]
    ], 

    'saving_year' => [
        'rules' => 'required',
        'label' => 'Annual Club Year',
        'errors' => [
            'required' => 'Specify the annual saving year for this account.'
        ]
    ], 

    'accountStatus' => [
        'rules' => 'required',
        'label' => 'Account Status',
        'errors' => [
            'required' => 'Indicate if this account is active or not.'
        ]
    ], 

    'regFeesStatus' => [
        'rules' => 'required',
        'label' => 'Account Registration Fees Status',
        'errors' => [
            'required' => 'Indicate whether the registration requirement fees are paid in full.'
        ]
    ], 

    'regFees' => [
        'rules' => 'required',
        'label' => 'Registration Fees Payment',
        'errors' => [
            'required' => 'Enter the amount to be paid for registration requirement.'
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

    'profileImg' => [
        'rules' => 'uploaded[profileImg]|max_size[profileImg,6024]|is_image[profileImg]|mime_in[profileImg,image/jpeg,image/jpg,image/png]',
        'label' => 'Profile Image',
        'errors' => [
            'required' => 'Please upload a valid file.',
            'max_size'  => 'The file size is too large. Maximum size is 6 MB.',
            'is_image' => 'Only image files are allowed.',
            'mime_in' => 'Only JPEG, JPG, and PNG file types are allowed.'
        ]
    ],
];


 if ($this->request->getMethod() == 'post') {
    if ($this->validate($validationRules)) {
        // Process and upload the image
        $profileImg_newname = "";
        if ($this->request->getFile('profileImg')) {
            $profileImg = $this->request->getFile('profileImg');
            $profileImg_newname = $profileImg->getRandomName(); // random image name
            if (!$profileImg->move('uploads/', $profileImg_newname)) {
                return redirect()->to('/dashboard/membership')->with('error', 'Error uploading the profile image');
            }
        }

        // Prepare form data
        $formData = [
            'fullName' => $this->request->getPost('fullName'),
            'gender' => $this->request->getPost('gender'),
            'dob' => $this->request->getPost('dob'),
            'membership_category' => $this->request->getPost('membership_category'),
            'phone' => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address'),
            'deposite_unit' => $this->request->getPost('deposite_unit'),
            'saving_year' => $this->request->getPost('saving_year'),
            'currency' => $this->request->getPost('currency'),
            'email' => $this->request->getPost('email'),
            'memberSerialNo' => random_string('alnum', 6),
            'regFees' => $this->request->getPost('regFees'),
            'regFeesStatus' => $this->request->getPost('regFeesStatus'),
            'accountStatus' => 'Pending',
            'registeredBy' => $data['userData']['id'],
            'profileImg' => $profileImg_newname,
        ];

        // Save data to the database
        if ($ClubMembershipModel->save($formData)) {
            return redirect()->to('/dashboard/membership')->with('success', 'Member registered successfully');
        } else {
            return redirect()->to('/dashboard/membership')->with('error', 'Failed to register member');
        }
    } else {
        $data['validation'] = $this->validator;
    }
  }


      return view('dashboard/club_membership', $data);
}


    //============== VIEW THE PROFILE OF A CLUB MEMBER ================

    public function profile($serial){
       // check if the serial is null
        $data = [];
         $data['passLink'] = "clubmembership";
        $data['userData'] = session()->get('userData');
         

        if(empty($serial)){
            return redirect()->to('/dashboard/membership')->with('error', 'Unknown Error');
            exit();
        }

        $ClubDueLogModel = new ClubDueLogModel();
        $ClubMembershipModel = new ClubMembershipModel();

                 // get the lone log to edit
          $data['member_profile'] =  $ClubMembershipModel->a_member_profile_log($serial);

          if(!$data['member_profile']){
            return redirect()->to('/dashboard/membership')->with('error', 'Record no longer exists');
            exit();
          }
        
        $data['a_member_payment_pending_log'] = $ClubDueLogModel->a_member_payment_log("Pending", $serial);
        $data['a_member_payment_approvide_log'] = $ClubDueLogModel->a_member_payment_log("Approved", $serial);
        $data['a_member_total_pending_amt'] = $ClubDueLogModel->get_a_mem_due_total($serial, "Pending");
        $data['a_member_total_approved_amt'] = $ClubDueLogModel->get_a_mem_due_total($serial, "Approved");

        // print_r($data['a_member_total_pending_amt']);
        // echo "<br><br><hr>";
        // print_r($data['a_member_total_approved_amt']);
        // exit();

    return view('dashboard/view_club_member_profile', $data);
  }

// =========== APPROVE MEMBERSHIP APPLICATION  ======== 
  public function approve_mem_acc($serial)
  {
        if(empty($serial)){
            return redirect()->to('/dashboard/membership')->with('error', 'Unknown Error');
            exit();
         }

         $data['userData'] = session()->get('userData');
         $ClubMembershipModel = new ClubMembershipModel();
         $mem_to_approve = $ClubMembershipModel->where('memberSerialNo',$serial)->first();

         if(!$mem_to_approve){
            return redirect()->to('/dashboard/membership')->with('error', 'The application you want to approve no longer exists');
            exit();
          }

           if(!($data['userData']['userRole'] == "SUDO")){
            return redirect()->to('/dashboard/membership')->with('error', 'You dont have previllage to execute this action');
            exit();
          }

          
          $mem_to_approve['accountStatus'] = "Approved";
          $id = $mem_to_approve['id'];

          if($ClubMembershipModel->update($id, $mem_to_approve))
          {
            return redirect()->to('/dashboard/membership')->with('success', 'You approved an account successfully');
          }


  }



}