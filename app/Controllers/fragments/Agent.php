<?php namespace App\Controllers;

use App\Models\OrderModel;
use App\Models\DeliveryModel;
use App\Models\AgentsModel;
use App\Models\MessageModel;

class Agent extends BaseController{

    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
    }
    
    public function index(){
        $loginUserData = new AgentsModel();
        $id = $this->session->get('user');
        
        $orders = new OrderModel();

        $data['userProfile'] = $loginUserData->agentProfile($id);
        $data['totalorder'] = $orders->totalOrder($id);

        $deliveries  = new DeliveryModel();
        $data['deliveries'] = $deliveries->totalDelivery($id);

        $data['earning'] = $deliveries->totalDelivery($id);

        return view("agents/index", $data);
    }

    public function inbox(){
        $rfc = $this->session->get('user');
        $loginUserData = new AgentsModel();
        // load the user profile
        $data['userProfile'] = $loginUserData->agentProfile($rfc);

        

        $messageModel = new MessageModel();
        $data['messages'] = $messageModel->userMessages($rfc);

        return view("agents/inbox",$data);
    }

    public function compose(){
        $rfc = $this->session->get('user');
        
        $agents = new AgentsModel();
        $data['agents'] = $agents->findAll();
       
        // load the user profile
        $data['userProfile'] = $agents->agentProfile($rfc);

        
        $validation = \Config\Services::validation();

        // Set validation rules
        $validation->setRules([
            'receiver' => 'required',
            'subject'  => 'required',
            'body'     => 'required'
        ]);

        // Run validation
        if($this->request->getMethod() == 'post'){
            if ($validation->withRequest($this->request)->run()) {
                // If validation passes, save the message to the database
                $messageModel = new MessageModel();
    
                $data = [
                    'sender'     => $rfc,
                    'receiver' => $this->request->getPost('receiver'),
                    'subject'  => $this->request->getPost('subject'),
                    'body'     => $this->request->getPost('body')
                ];
                $messageModel = new messageModel();
                if($messageModel->insert($data)){
                    return redirect()->to('agents/inbox')->with('success', ['your message was successfully sent to the reciepient choosen']);
                }else{
                    return redirect()->to('agents/inbox')->with('errors', ['Error occured while trying to send your message.']);
                }
                // Redirect or display a success message
                } else {
                // If validation fails, display errors
                $data['errors'] = $validation->getErrors();
                return view("agents/inbox", $data);
            }
        }
        return view("agents/compose", $data);
    }


    public function read($sender_rfc){
        $agents = new AgentsModel();

        $messageModel = new MessageModel();
        $rfc = $this->session->get('user');
        
        // load the user profile
        $data['userProfile'] = $agents->agentProfile($rfc);
        // load all the thread or messages with this user
        $data['thread'] = $messageModel->messageThread($rfc, $sender_rfc);



        
        return view("agents/read_message", $data);
    }


    public function deliveries(){

        $id = $this->session->get('user');
        $agents = new AgentsModel();
        $deliveries  = new DeliveryModel();

        $data['deliveries'] = $deliveries->deliveries($id);
        // load the user profile
        $data['userProfile'] = $agents->agentProfile($id);

        return view("agents/deliveries", $data);

    }

    public function orders(){
        $id = $this->session->get('user');
        
        $agents = new AgentsModel();
        $data['userProfile'] = $agents->agentProfile($id);

        $orders = new OrderModel();
        $data['orders'] = $orders->orders($id);
        return view("agents/orders", $data);
    }
}