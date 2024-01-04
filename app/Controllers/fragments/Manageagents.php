<?php namespace App\Controllers;

use App\Models\AgentsModel;
use App\Models\TablesModel;


class Manageagents extends BaseController
{
    
    public function index()
    {
        $agents = new AgentsModel();
        $data['agents'] = $agents->findAll();
       return view("dashboard/manageagents", $data);
    }
    

    public function create()
    {
        
            // Load the form helper
            helper('form');
    
            // Load the form validation library
            $validation = \Config\Services::validation();
    
            // Set validation rules
            $validation->setRules([
                'username' => 'required',
                'email' => 'required|valid_email|is_unique[users.email]',
                'rfc' => 'required|numeric|min_length[4]|max_length[5]|is_unique[users.rfc]',
                'contact' => 'required|is_unique[users.contact]|min_length[10]|max_length[13]',
                'address' => 'required',
                'userType' => 'required'
            ]);
    
            if ($this->request->getMethod() === 'post') {
                // Validate the form data
                if ($validation->withRequest($this->request)->run()) {
                    // Form data is valid, save it to the database or perform other actions
                    
                    // Get the form input values
                    $username = $this->request->getPost('username');
                    $email = $this->request->getPost('email');
                    $rfc = $this->request->getPost('rfc');
                    $contact = $this->request->getPost('contact');
                    $address = $this->request->getPost('address');
                    $userType = $this->request->getPost('userType');
                    $passWord = password_hash("123456", PASSWORD_DEFAULT);
    
                    // Perform database operations or other actions here
                    // Example:
                    $userModel = new AgentsModel();
                    $userModel->save([
                        'username' => $username,
                        'email' => $email,
                        'password' => $passWord,
                        'rfc' => $rfc,
                        'contact' => $contact,
                        'address' => $address,
                        'userType' => $userType
                    ]);
    
                    // Redirect or display a success message
                    
                    return redirect()->to('/manageagents')->with("success", "You successfully registered an agent");
                } else {
                    // Validation failed, redisplay the form with error messages
                    return view('dashboard/forms/agents-form', [
                        'validation' => $validation,
                    ]);
                }
            }
    
            // Display the form for the first time
        return view("dashboard/forms/agents-form");
    }

}
