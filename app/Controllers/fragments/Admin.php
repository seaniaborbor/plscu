<?php namespace App\Controllers;

use App\Models\OrderModel;
use App\Models\AgentsModel;
use App\Models\DeliveryModel;
use App\Models\StockModel;
use App\Models\TablesModel;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->session = \Config\Services::session();
    }
    // dashboard home page 
    public function index(){
        
        $handle  = new StockModel();
        $data['order_summary'] = $handle->ordersummary();

        $data['sale_summary'] = $handle->delivery_summary();

        $orderHandle = new OrderModel();
        $data['total_order'] = $orderHandle->getOrderLogCount();

        $deliveryHandle = new DeliveryModel();
        $data['total_delivery'] = $deliveryHandle->getDeliveryLogCount();


        $data['id'] = 1;
        return view("dashboard/index", $data);
    }


    
}