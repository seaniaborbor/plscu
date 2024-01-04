<?php namespace App\Controllers;

use App\Models\ServicesModel;
use App\Models\FaqModel;
use App\Models\TestimonialsModel;
use App\Models\PortfolioModel;
use App\Models\TeamModel;
use App\Models\BlogModel;
use App\Models\CommentModel;





class Publiccontroller extends BaseController{    
   public function __construct()
    {
        helper(['form', 'url']);
    }

    // HOME PAGE METHOD 
    public function index(){
        $data = [];

        // load services 
        $servicesModel = new servicesModel();
        $data['all_services'] = $servicesModel->findAll();

        // load the FAQs
        $FaqModel = new FaqModel();
        $data['all_faq'] = $FaqModel->orderBy('id', 'desc')->findAll();

        // load the testimonials 
        $TestimonialsModel = new TestimonialsModel();
        $data['all_testimonials'] = $TestimonialsModel->findAll();


        // load all the portfoloi
        $PortfolioModel = new PortfolioModel();
        $data['all_portfolios'] = $PortfolioModel->orderBy('id', 'desc')->findAll(16);

        // get the distinct categories of all potfolio
        $data['portfolio_categories'] = $PortfolioModel->groupBy("category","desc")->findAll();

        // get all team members 
        $TeamModel = new TeamModel();
        $data['all_team'] = $TeamModel->findAll();

        // get all team members 
        $BlogModel = new BlogModel();
        $data['recent_blogs'] = $BlogModel->recent_blogs(); // this method is defined in blog model

        return view("public/index", $data);
    }



    // PORTFOLIO DETAIL METHOD 
    public function portfolio_details($id = null)
    {
        $data = [];

        $PortfolioModel = new PortfolioModel();
        $data['portfolio_details'] = $PortfolioModel->find($id);

        return view('public/portfolio-details', $data);
    }



    // ALL BLOG POSTS METHOD 
    public function blog()
    {
        $data = [];

        $BlogModel = new BlogModel();

        $data = [
            'blog_posts' => $BlogModel->orderBy('blog.id', 'desc')->join('team', 'team.email = blog.createdBy')->paginate(6),
            'pager' => $BlogModel->pager,
        ];

        return view('public/blog', $data);
    }


    // BLOG DETAILS - SHOW/READ A BLOG 
    public function blog_details($id = null)
    {
        $data = [];

        // get all team members 
        $BlogModel = new BlogModel();
        $data['blog_to_read'] = $BlogModel->blog_post_to_read($id); // get the blog to be read

        $data['recent_blogs'] = $BlogModel->groupBy('id', 'desc')->findAll(4); // find the latest 4 recent posts
        $data['post_per_category'] = $BlogModel->post_per_category(); // get all the categories with num of post

        $CommentModel = new CommentModel();
        $data['post_comments'] = $CommentModel->where('blog_comments.postId', $id)->findAll();



        // if an instance the readerposts a comment, get validation rules that must be applied
         $validationRules = [

            'name' => 
                [
                    'rules' => 'required',
                    'label' => 'Your Name',
                    'errors' => [
                        'required' => 'Please enter a name reader will see'
                    ]
                ],

            'email' => [
                'rules'=>'required|max_length[50]',
                'label' => 'Your email',
                'errors' => [
                    'required' =>'Give your email which administrator of this platform may contact you through',
                    'max_length' =>'The email is too long'
                ]
            ],

             'comment' => [
                'rules'=>'required|min_length[50]|max_length[500]',
                'label' => 'Your comments',
                'errors' => [
                    'required' =>'Provide your comment. It is required',
                    'min_length' =>'Your comment is too short. It should be 50 characters minimum',
                    'max_length' =>'Comment is too long. It should be 500 characters maxamium',
                ]
            ]
        ];

        // handle posted comments if received

        if($this->request->getMethod() == 'post'){
            if($this->validate($validationRules)){

                $commentData['name'] = htmlspecialchars($this->request->getPost('name'));
                $commentData['email'] = htmlspecialchars($this->request->getPost('email'));
                $commentData['comment'] = htmlspecialchars($this->request->getPost('comment'));
                $commentData['postId'] = $this->request->getPost('postId');

                if($CommentModel->save($commentData)){
                    return redirect()->to('/blog-details/'.$id)->with('success', 'Your comments were received successfully');
                }else{
                    return redirect()->to('/blog-details/'.$id)->with('error', 'Error in receiving your comments');
                }

            }else{
                $data['validation'] = $this->validator;
            }
        }



        return view('public/blog-details', $data);
    }


   // ========== login page =============

    public function login()
    {
        return view('login');
    }

}