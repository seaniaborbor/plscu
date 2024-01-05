<?php

namespace App\Controllers;

use App\Models\TeamModel;
use App\Libraries\Hash;

class AuthController extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url']);
    }
    // load the home page
    public function index()
    {
        if(session()->has("isLoggedIn") && session()->has('userData')){
            return redirect()->to("/dashboard")->withInput()->with('success', "Welcome to the dashboard");
        }

        $db = new TeamModel();
        
        $data = [];

        $rules = [
            'email' => [
               'rules' => 'required|valid_email',
               'label' => 'Email field or input ',
               'errors' => [
                'required' => 'Rrequired, please fill out',
                'valid_email'=> 'Your email is invalid'
               ]
            ],
            'password' => [
                'rules' => 'required|min_length[5]',
                'label' => 'Password Input',
                'errors' => [
                    'required' => 'Password fied cant be blank',
                    'min_length' => 'Password too short' 
                ]
                ]
        ];

        if ($this->request->getMethod() == 'post') {
            if ($this->validate($rules)) {
                
                // get the user data from the database
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');

                $user = $db->where('email', $email)->first(); // Retrieve the first matching user
            
                // check if the user exists
                if (!$user) {
                    // If no user exists, redirect to 'auth' page with error message
                    return redirect()->to('auth')->with('error', "Wrong Email");
                }
                
                
                if (password_verify($password, $user['passwd'])) {
                    // Password matches, redirect to 'dashboard' with success message
                    session()->set('isLoggedIn',"yes");
                    session()->set('userData', $user);

                    return redirect()->to('dashboard')->with('success', "Welcome to the dashboard");
                } else {
                    // Password does not match, redirect to 'auth' page with error message
                    return redirect()->to('auth')->with('error', "Wrong Password");
                }
                
            } else {
                $data['validation'] = $this->validator;
            }
        }
        return view('auth', $data);
    }




      public function logout(){

        if(session()->has("isLoggedIn")){
            session()->remove('isLoggedIn');
            session()->remove('userData');
            return redirect()->to("/auth")->withInput()->with('success', "You're  logged out");
        }

    }
}
