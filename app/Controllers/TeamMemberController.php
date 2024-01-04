<?php namespace App\Controllers;

use App\Models\TeamModel;


class TeamMemberController extends BaseController{

    public function __construct()
    {
        helper(['form', 'url']);
    }
   
    public function index(){

        $data = [];

        $TeamModel = new TeamModel();
        $data['all_team'] = $TeamModel->findAll();


        

        // set the validation rules 
        $validationRules = [
            'fullName' => 
                [
                    'rules' => 'required|is_unique[team.fullName]|min_length[6]|max_length[30]',
                    'label' => 'Team Member full name',
                    'errors' => [
                        'required' => 'Please provide the team member name in full',
                        'is_unique' => 'This name is already entered, try another please.',
                        'min_length' => 'The name is too short',
                        'max_length' => 'The name is too long - 30 characters allowed only',
                    ]
                ],

                'email' => [
                    'rules'=>'required|is_unique[team.email]|min_length[10]',
                    'label' => 'Team Member Email',
                    'errors' => [
                        'required' =>'Oh, reall?? This field is a must!',
                        'min_length' =>'The user email cannot be less than 10 characters'
                    ]
                ],

              'profileImg' => [
                    'rules' => 'uploaded[profileImg]|max_size[profileImg,6024]|is_image[profileImg]|mime_in[profileImg,image/jpeg,image/jpg,image/png]',
                    'label' => 'Profile Image',
                    'errors' => [
                        'required' => 'This field must be a valid file',
                        'max_size'  => 'The file is too large',
                        'is_image' => 'Only image files is allowed',
                        'mime_in' => 'Only of type jpeg, jpg & pngs are allowed'
                    ]
                ],

                'profession' => [
                    'rules'=>'required|min_length[6]',
                    'label' => 'Profession or Career',
                    'errors' => [
                        'required' =>'The Member Profession is required ',
                        'min_length' =>'The team member profession cannot be less than 6 characters'
                    ]
                ],

                'fbHandle' => [
                    'rules'=>'required|is_unique[team.fbHandle]',
                    'label' => 'Link to team member profile',
                    'errors' => [
                        'required' =>'This is required to contact team member through facebook/messenger'
                    ]
                ]
        ];

        if($this->request->getMethod() == "post")
        {
            $formData = [];

            // check if the form submitted validated 
            if($this->validate($validationRules))
            {

              $profileImg_newname = "";
                // process and upload the image here 
                 if($this->request->getFile('profileImg'))
                 {
                    $profileImg = $this->request->getFile('profileImg');
                    $profileImg_newname = $profileImg->getRandomName(); // random image name 
                     if(!$profileImg->move('uploads/', $profileImg_newname))
                     {
                        return redirect()->to('/dashboard/blog')->with('error', 'Error in uploading the the feature image');
                        exit();
                     }    
                  }
              
              // collect the form data if everything is ok
                $formData['fullName'] = $this->request->getPost('fullName');
                $formData['email'] = $this->request->getPost('email');
                $formData['passwd'] = password_hash('123456789', PASSWORD_DEFAULT);
                $formData['profession'] = $this->request->getPost('profession');
                $formData['fbHandle'] = $this->request->getPost('fbHandle');
                $formData['xHandle'] = $this->request->getPost('xHandle');
                $formData['linkinHandle'] = $this->request->getPost('linkinHandle');
                $formData['profileImg'] = $profileImg_newname;

                // save the data and exit to the dashboard
                if($TeamModel->save($formData)){
                        return redirect()->to('/dashboard/team')->with('success', 'You successfully added a Team Member. The added He or she login credentials are : EMAIL -'.$this->request->getPost('email').' PASSWORD - 123456789. Said team member should login and update his password as soon as possible!');
                }
            }
            else
            {
                $data['validation'] = $this->validator;
            }
        }

      return view('dashboard/team', $data);
    }


    //============== UPDATE TEAM MEMBER PROFILE ================

    public function edit($id){
       // check if the id is null
        if(empty($id)){
            return redirect()->to('/dashboard/team')->with('error', 'Unknown Error');
            exit();
        }

      $data = [];

      $TeamModel = new TeamModel();
      $data['team_data'] = $TeamModel->find($id);
      $hasspasswd = $data['team_data']['passwd'];

      // verify that the data exists
       if(empty($data['team_data'])){
            return redirect()->to('/dashboard/testimonials')->with('error', 'Unknown Error');
            exit();
      }


      // set the validation rules 
      $validationRules = [
          'fullName' => 
              [
                  'rules' => 'required|min_length[6]|max_length[30]',
                  'label' => 'Team Member full name',
                  'errors' => [
                      'required' => 'Please provide the team member name in full',
                      'min_length' => 'The name is too short',
                      'max_length' => 'The name is too long - 30 characters allowed only',
                  ]
              ],

               'passwd' => [
                  'rules'=>'required|min_length[6]',
                  'label' => 'New Password',
                  'errors' => [
                      'required' =>'Oh, reall?? This field is a must!',
                      'min_length' =>'Password is too short; hence it is less secure'
                  ]
              ],

              'passwdOld' => [
                  'rules'=>'required|min_length[6]',
                  'label' => 'Old Passward',
                  'errors' => [
                      'required' =>'Oh, reall?? This field is a must!',
                      'min_length' =>'Password is too short; hence it is less secure'
                  ]
              ],

              'profession' => [
                  'rules'=>'required|min_length[6]',
                  'label' => 'Profession or Career',
                  'errors' => [
                      'required' =>'The Member Profession is required ',
                      'min_length' =>'The team member profession cannot be less than 6 characters'
                  ]
              ],

              'fbHandle' => [
                  'rules'=>'required',
                  'label' => 'Link to team member profile',
                  'errors' => [
                      'required' =>'This is required to contact team member through facebook/messenger'
                  ]
              ]
      ];

      // there is a request to update the profile picture
      $update_profileImg = false;

      if($this->request->getFile('profileImg') && $this->request->getFile('profileImg')->isValid())
        {
            $validationRules['profileImg'] = [
                  'rules' => 'uploaded[profileImg]|max_size[profileImg,6024]|is_image[profileImg]|mime_in[profileImg,image/jpeg,image/jpg,image/png]',
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

          // check if the form submitted validated 
          if($this->validate($validationRules))
          {
            // verify the user password
            if(!password_verify($this->request->getPost('passwdOld'), $hasspasswd))
              {
                return redirect()->to('/dashboard/team')->with('error', 'Old Password provided is wrong... try again');
                exit();
              }

            
              // process and upload the image here 
               if($update_profileImg)
               {
                  $profileImg = $this->request->getFile('profileImg');
                  $profileImg_newname = $profileImg->getRandomName(); // random image name 
                  $data['team_data']['profileImg'] = $profileImg_newname;

                   if(!$profileImg->move('uploads/', $profileImg_newname))
                   {
                      return redirect()->to('/dashboard/team')->with('error', 'Error in uploading the the profile image');
                      exit();
                   }    
                }
            
            // collect the form data if everything is ok
              $data['team_data']['fullName'] = $this->request->getPost('fullName');
              $data['team_data']['passwd'] = password_hash($this->request->getPost('passwd'), PASSWORD_DEFAULT);
              $data['team_data']['profession'] = $this->request->getPost('profession');
              $data['team_data']['fbHandle'] = $this->request->getPost('fbHandle');
              $data['team_data']['xHandle'] = $this->request->getPost('xHandle');
              $data['team_data']['linkinHandle'] = $this->request->getPost('linkinHandle');
              

              // save the data and exit to the dashboard
              if($TeamModel->update($id, $data['team_data'])){
                      return redirect()->to('/dashboard/team')->with('success', 'You successfully updated your login credentials to the following: EMAIL -'.$this->request->getPost('email').' PASSWORD - '.$this->request->getPost('passwd').'. Make sure to keep your password a secret');
              }
          }
          else
          {
              $data['validation'] = $this->validator;
          }
      }

    return view('dashboard/edit_profile', $data);
  }



}