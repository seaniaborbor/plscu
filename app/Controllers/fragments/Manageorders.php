<?php

namespace App\Controllers;

use App\Models\OrderModel;
use App\Models\AgentsModel;
use App\Models\StockModel;
use App\Models\TablesModel;


class Manageorders extends BaseController
{
    
    public function index()
    {
        $db = db_connect();
        $orders = new TablesModel($db);
        $data['orders'] = $orders->order_details();
        
        return view("dashboard/manageorders", $data);
    }

    public function create()
    {
        $agents = new AgentsModel();
        $data['agents'] = $agents->findAll();

        $products = new StockModel();
        $data['products'] = $products->findAll();


        if($this->request->getMethod() === 'post'){
            
            $validation = \Config\Services::validation();
            
            // Set validation rules
            $validation->setRules([
                'customerName' => 'required',
                'customerContact' => 'required|numeric|min_length[10]',
                'product' => 'required',
                'address' => 'required',
                'rfc' => 'required'
            ]);

            if ($validation->withRequest($this->request)->run()) {
                // Validation passed, save the form data

                // Get the form input values
                $record['customerName'] = $this->request->getPost('customerName');
                $record['customerContact'] = $this->request->getPost('customerContact');
                $record['product'] = $this->request->getPost('product');
                $record['email'] = $this->request->getPost('email');
                $record['address'] = $this->request->getPost('address');
                $record['rfc'] = $this->request->getPost('rfc');

                // Perform the database insertion or any other required operations
                // Example:
                // $this->yourModel->saveForm($customerName, $customerContact, $product, $email, $address, $rfc);
                $OrderModel = new OrderModel();
                $OrderModel->save($record);
                // Redirect or return a success message
                return redirect()->to('manageorders')->with('success', 'Order successfully placed. You can click on <i class="fa fa-truck"></i> Icon to complete the transaction if necessary');
            } else {
                // Validation failed, show the form again with validation errors
                $data['validation'] = $validation;
            }
        }

        return view("dashboard/forms/order-form.php", $data);
    }

    // delete order 

    public function delete($id){
        $OrderModel = new OrderModel();
        if($OrderModel->delete($id)){
            return redirect()->to('manageorders')->with('success', 'Order deleted successfully. Any record associated wount show on your dashboard, users or agents account respectively.');
        }else{
            return redirect()->to('manageorders')->with('error', 'Error occured while deleting this order you requested. It might be that the order does not exist in the database');
        }
    }

}
