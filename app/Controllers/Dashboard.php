<?php namespace App\Controllers;


class Dashboard extends BaseController{    
   

    // home page route 
    public function index(){
         $data['passLink'] = "clubmembership";
         
        return view("dashboard/index", $data);
    }

    // portfolio 
    public function portfolio()
    {
        $data = [];
        return view('dashboard/portfolio', $data);
    }

    // blog details method 
    public function blog($slug = null)
    {
        return view('public/blog');
    }

    // blog details method 
    public function blog_details($slug = null)
    {
        return view('public/blog-details');
    }


    // login route 
    public function login(){

        return view("public/login");
    }



    public function logout(){

        if(session()->has("adminLogin")){
            session()->remove('adminLogin');
            return redirect()->to("/")->withInput()->with('msg', "Welcome back to the dashboard");
        }

        if(session()->has("agentLogin")){
            session()->remove('agentLogin');
            return redirect()->to("/")->withInput()->with('msg', "Welcome back to the dashboard");
        }

    }



}