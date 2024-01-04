<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'order_log';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'customerName',
        'customerContact',
        'address',
        'product',
        'email',
        'rfc',
        'orderDate',
        'status'
    ];

    // total order made by a user
    public function totalOrder($rfc)
    {
        $query = $this->db->table('order_log')
                  ->where('rfc', $rfc)
                  ->countAllResults();
                  return $query;
    }

    public function orders($rfc){
        $query = $this->db->table('order_log')
                  ->where('order_log.rfc', $rfc)
                  ->join('users', 'users.rfc = order_log.rfc')
                  ->join('stock', 'stock.id = order_log.product')
                  ->get()
                  ->getResult();
                  return $query;
    }

     // order total in general 
     public function getOrderLogCount()
     {
         return $this->countAllResults();
     }

   
   
}
