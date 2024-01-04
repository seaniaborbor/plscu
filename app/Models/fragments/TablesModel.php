<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class TablesModel {
    protected $db;

    public function __construct(ConnectionInterface &$db)
    {
        
        $this->db =& $db;

    }

    // get all orders in details 
    public function order_details(){
        $builder = $this->db->table('order_log');
        $builder->select('*, order_log.id as orderId');
        $builder->where('order_log.status', 0);
        $builder->join('users', 'users.rfc = order_log.rfc');
        $builder->join('stock', 'stock.id = order_log.product');
        $orders = $builder->get()->getResult();
        return $orders;

    }

      // get all deliveries in details 
      public function delivery_details(){
        $query = $this->db->table('deliveries')
        ->select('*, deliveries.id as deliveryId')
        ->join('order_log', 'order_log.id = deliveries.order_Id')
        ->join('stock', 'order_log.product = stock.id')
        ->get();
        $result = $query->getResult();
        return $result;
    }


}
