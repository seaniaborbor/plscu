<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\OrderModel;
use App\Models\TablesModel;
use App\Models\DeliveryModel;
use App\Models\AgentsModel;


class Managedelivery extends BaseController
{
    
    public function index()
    {
        $db = db_connect();
        $deliveries  = new TablesModel($db);
        $data['deliveries'] = $deliveries->delivery_details();
       return view("dashboard/managedelivery", $data);
    }
    

    public function create($id = null)
    {

        // if admin submits the delivery form, perform this action/logic 
        if($this->request->getMethod() === 'post'){
            
            $validation = \Config\Services::validation();
            
            // Set validation rules
            $validation->setRules([
                'order_id' => 'numeric|required',
                'qty' => 'required|numeric',
                'deliveryAgntId' => 'numeric|required',
                'rfc' => 'numeric|required',
                'amoutPaid' => 'numeric|required',
                'balance' => 'required'
            ]);

            if ($validation->withRequest($this->request)->run()) {
                // Validation passed, save the form data

                // Get the form input values
                $record['order_id'] = $this->request->getPost('order_id');
                $record['qty'] = $this->request->getPost('qty');
                $record['deliveryAgntId'] = $this->request->getPost('deliveryAgntId');
                $record['rfc'] = $this->request->getPost('rfc');
                $record['amoutPaid'] = $this->request->getPost('amoutPaid');
                $record['balance'] = $this->request->getPost('balance');

                // Perform the database insertion or any other required operations
                $DeliveryModel = new DeliveryModel();

                if($DeliveryModel->save($record)){
                    // update the order record reflect the delivery made 
                    //the particular order to be deliver data 
                    $orderModel = new OrderModel();
                    $orderRecord = $orderModel->find($id);
                    
                    $orderRecord['status'] = 1;
                    //print_r($orderRecord);                    
                    if($orderModel->update($id, $orderRecord)){
                        return redirect()->to('manageorders')->with('success', 'Order successfully placed. You can click on <i class="fa fa-truck"></i> Icon to complete the transaction if necessary');
                    }
                };

                // Redirect or return a success message
                return redirect()->to('managedelivery/')->with("error", "Error occured while updating the order record to reflect the delivery just made. Contact developer to handle this issue. ");
            } else {
                // Validation failed, show the form again with validation errors
                $data['validation'] = $validation;
            }
        }
        //get all the users to choose who is the deliverer 
        $agents = new AgentsModel();
        $data['agents'] = $agents->findAll();

        //the particular order to be deliver data 
        $orderModel = new OrderModel();
        $data['orderRecord'] = $orderModel->find($id);
        if(!$data['orderRecord']){
            return redirect()->to('managedelivery/')->with("error", "The product requested might have been deleted or does not exist!");
        }

        return view("dashboard/forms/delivery-form", $data); 
    }


    //delete a delivery log 
    public function delete($id){
        $DeliveryModel = new DeliveryModel();
        $data = $DeliveryModel->find($id);
        $order_id = $data['order_Id'];

        if($DeliveryModel->delete($id)){
            
            $OrderModel = new OrderModel();
            $newData['orderData'] = $OrderModel->find($order_id);
            $newData['orderData']['status'] = 0;
            
            if($OrderModel->update($order_id, $newData['orderData'])){
                return redirect()->to('managedelivery')->with('success', 'Order deleted successfully. Any delivery associated wount show on your dashboard, users or agents account respectively.');
            }else{
                return redirect()->to('managedelivery')->with('error', 'Error occured while restoring the order data as it was before delivery');
            }
        }else{
            return redirect()->to('managedelivery')->with('error', 'Error occured while deleting this delivery you requested. It might be that the order does not exist in the database');
        }
    }

}
