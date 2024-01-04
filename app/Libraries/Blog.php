<?php namespace App\Libraries;

class Blog
{

    // this method renders or return the contact form 
    public function contact_form(){
        return view('partials/contact');
    }

    // this method renders or return the latest blogs
    public function latestBlog(){
        return view('partials/latest_blog_post');
    }

     // this method renders or return the navbar
     public function navbar(){
        return view('partials/nav');
    }

      // this method renders or return the footer
      public function footer(){
        return view('partials/footer');
    }

}