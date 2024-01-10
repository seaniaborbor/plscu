<?php namespace App\Controllers;

use App\Models\PortfolioModel;
use App\Models\CategoryModel;


class PortfolioController extends BaseController{

    public function __construct()
    {
        helper(['form', 'url']);
    }
   
    public function index(){
        $data = [];

        

        $PortfolioModel = new PortfolioModel();
        $CategoryModel = new CategoryModel();
 
        $data = [
                'all_portfolio' => $PortfolioModel->orderBy('id', 'desc')->paginate(10),
                'pager' => $PortfolioModel->pager,
            ];

        $data['passLink'] = "portfolio";
        $data['userData'] = session()->get('userData');

        $data['all_categories'] = $CategoryModel->findAll();
        //$data['all_portfolio'] = $PortfolioModel->findAll();

        // set the validation rules 
        $validationRules = [
            'title' => 'required|is_unique[portfolio.title]',
            'snippet' => 'required',
            'shceenshoti' => 'uploaded[shceenshoti]|max_size[shceenshoti,6024]|is_image[shceenshoti]|mime_in[shceenshoti,image/jpeg,image/jpg,image/png]',
            'shceenshotii' => 'uploaded[shceenshotii]|max_size[shceenshotii,6024]|is_image[shceenshotii]|mime_in[shceenshotii,image/jpeg,image/jpg,image/png]',
            'shceenshotiii' => 'uploaded[shceenshotiii]|max_size[shceenshotiii,6024]|is_image[shceenshotiii]|mime_in[shceenshotiii,image/jpeg,image/jpg,image/png]',
            'postbody' => 'required',
            'category' => 'required',
            'client' => 'required',
            'url' => 'required'
        ];


        if($this->request->getMethod() == "post")
        {
            $formData = [];
            $shceenshoti_newname = "";
            $shceenshotii_newname = "";
            $shceenshotiii_newname = "";

            // check if the form submitted validated 
            if($this->validate($validationRules))
            {
                // upload the first screenshot 
                 if($this->request->getFile('shceenshoti'))
                 {
                    $shceenshoti = $this->request->getFile('shceenshoti');
                    $shceenshoti_newname = $shceenshoti->getRandomName(); // random image name 
                     if(!$shceenshoti->move('uploads/', $shceenshoti_newname))
                     {
                        return redirect()->to('/dashboard/portfolio')->with('error', 'Error in uploading the the first screenshot');
                        exit();
                     }    
                  }

                  // upload the second screenshot 
                 if($this->request->getFile('shceenshotii'))
                 {
                    $shceenshotii = $this->request->getFile('shceenshotii');
                    $shceenshotii_newname = $shceenshotii->getRandomName(); // random image name 
                     if(!$shceenshotii->move('uploads', $shceenshotii_newname))
                     {
                        return redirect()->to('/dashboard/portfolio')->with('error', 'Error in uploading the second screenshot');
                        exit();
                     }    
                  }

                     // upload the third screenshot 
                 if($this->request->getFile('shceenshotiii'))
                 {
                    $shceenshotiii = $this->request->getFile('shceenshotiii');
                    $shceenshotiii_newname = $shceenshotiii->getRandomName(); // random image name 
                     if(!$shceenshotiii->move('uploads/', $shceenshotiii_newname))
                     {
                        return redirect()->to('/dashboard/portfolio')->with('error', 'Error in uploading the third screenshot');
                     }    
                  }


                $formData['title'] = $this->request->getPost('title');
                $formData['shceenshoti'] = $shceenshoti_newname;
                $formData['shceenshotii'] = $shceenshotii_newname;
                $formData['shceenshotiii'] = $shceenshotiii_newname;
                $formData['snippet'] = $this->request->getPost('snippet');
                $formData['postbody'] = $this->request->getPost('postbody');
                $formData['category'] = $this->request->getPost('category');
                $formData['client'] = $this->request->getPost('client');
                $formData['url'] = $this->request->getPost('url');

                if($PortfolioModel->save($formData))
                {
                    return redirect()->to('/dashboard/portfolio')->with('success', 'Portfolio save and publshed successfully');
                }

            }
            else
            {
                $data['validation'] = $this->validator;
            }
        }

        return view('dashboard/portfolio', $data);
    }


  
 // ================ EDIT PORTFOLIO POST METHOD ============

     public function edit($id){
        // check if the id is null
        if(empty($id) || !is_numeric($id)){
            return redirect()->to('/dashboard/portfolio')->with('error', 'Unknown Error');
            exit();
        }

        $data = [];

        $data['passLink'] = "portfolio";
        $data['userData'] = session()->get('userData');

        $PortfolioModel = new PortfolioModel();
        $CategoryModel = new CategoryModel();

        $data['all_categories'] = $CategoryModel->findAll();
        $data['portfolio_data'] = $PortfolioModel->find($id);

        // set the validation rules 
        $validationRules = [
            'title' => 'required',
            'snippet' => 'required',
            'postbody' => 'required',
            'category' => 'required',
            'client' => 'required',
            'url' => 'required'
        ];

        $edit_pic_1 = false;
        $edit_pic_2 = false;
        $edit_pic_3 = false;
        // if the admin make a request to edit the first pic, validate
        if($this->request->getFile('shceenshoti') && $this->request->getFile('shceenshoti')->isValid()){
            $validationRules['shceenshoti'] = 'uploaded[shceenshoti]|max_size[shceenshoti,6024]|is_image[shceenshoti]|mime_in[shceenshoti,image/jpeg,image/jpg,image/png]';
            $edit_pic_1 = true;
        }

         // if the admin make a request to edit the second pic, validate
        if($this->request->getFile('shceenshotii') && $this->request->getFile('shceenshotii')->isValid()){
            $validationRules['shceenshotii'] = 'uploaded[shceenshotii]|max_size[shceenshotii,6024]|is_image[shceenshotii]|mime_in[shceenshotii,image/jpeg,image/jpg,image/png]';
            $edit_pic_2 = true;


        }

          // if the admin make a request to edit the third pic, validate
        if($this->request->getFile('shceenshotiii') && $this->request->getFile('shceenshotiii')->isValid()){
            $validationRules['shceenshotiii'] = 'uploaded[shceenshotiii]|max_size[shceenshotiii,6024]|is_image[shceenshotiii]|mime_in[shceenshotiii,image/jpeg,image/jpg,image/png]';
            $edit_pic_3 = true;

        }


        if($this->request->getMethod() == "post")
        {

            $formData = [];
            $shceenshoti_newname = "";
            $shceenshotii_newname = "";
            $shceenshotiii_newname = "";

            // check if the form submitted validated 
            if($this->validate($validationRules))
            {
                // upload the first screenshot 
                 if($edit_pic_1)
                 {
                    $shceenshoti = $this->request->getFile('shceenshoti');
                    $shceenshoti_newname = $shceenshoti->getRandomName(); // random image name 
                    $data['portfolio_data']['shceenshoti'] = $shceenshoti_newname;

                     if(!$shceenshoti->move('/uploads', $shceenshoti_newname))
                     {
                        return redirect()->to('/dashboard/portfolio')->with('error', 'Error in uploading the the first screenshot');
                        exit();
                     }    
                  }

                  // upload the second screenshot 
                 if($edit_pic_2)
                 {
                    $shceenshotii = $this->request->getFile('shceenshotii');
                    $shceenshotii_newname = $shceenshotii->getRandomName(); // random image name 
                    $data['portfolio_data']['shceenshotii'] = $shceenshotii_newname;

                     if(!$shceenshotii->move('/uploads', $shceenshotii_newname))
                     {
                        return redirect()->to('/dashboard/portfolio')->with('error', 'Error in uploading the second screenshot');
                        exit();
                     }    
                  }

                     // upload the third screenshot 
                 if($edit_pic_3)
                 {
                    $shceenshotiii = $this->request->getFile('shceenshotiii');
                    $shceenshotiii_newname = $shceenshotiii->getRandomName(); // random image name 
                    $data['portfolio_data']['shceenshotiii'] = $shceenshotiii_newname;

                     if(!$shceenshotiii->move('/uploads', $shceenshotiii_newname))
                     {
                        return redirect()->to('/dashboard/portfolio')->with('error', 'Error in uploading the third screenshot');
                     }    
                  }


                $data['portfolio_data']['title'] = $this->request->getPost('title');
                $data['portfolio_data']['snippet'] = $this->request->getPost('snippet');
                $data['portfolio_data']['postbody'] = $this->request->getPost('postbody');
                $data['portfolio_data']['category'] = $this->request->getPost('category');
                $data['portfolio_data']['client'] = $this->request->getPost('client');
                $data['portfolio_data']['url'] = $this->request->getPost('url');

                if($PortfolioModel->update($id,$data['portfolio_data']))
                {
                    return redirect()->to('/dashboard/portfolio')->with('success', 'Portfolio updated and publshed successfully');
                }else{
                    return redirect()->back();
                }

            }
            else
            {
                $data['validation'] = $this->validator;
            }
        }

        return view('dashboard/edit_portfolio_post', $data);
    }


    public function delete($id){
      if(!empty($id) && !is_numeric($id)){
        return redirect()->to('/dashboard/portfolio/')->with('error', 'Invalid perimeter');
      }

      $db = new PortfolioModel();
      if($db->find($id) && $db->delete($id)){
        return redirect()->to('/dashboard/portfolio/')->with('success', 'Portfolio post deleted successfully');
      }else{
        return redirect()->to('/dashboard/portfolio/')->with('error', 'Failed to delete Portfolio');
      }
    }

}