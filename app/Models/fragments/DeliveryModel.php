<?php

namespace App\Models;

use CodeIgniter\Model;

class DeliveryModel extends Model
{
    protected $table = 'deliveries';
    protected $primaryKey = 'id';
    protected $allowedFields = [	
        "order_id",
        "qty",
        "deliveryAgntId",	
        "rfc",	
        "amoutPaid",
        "balance"
    ];
  
    public function totalDelivery($rfc)
    {
        $query = $this->db->table('deliveries')
                  ->where('rfc', $rfc)
                  ->countAllResults();
                  return $query;
    }

    public function deliveries($rfc){
        $query = $this->db->table('deliveries')
                  ->select('*, deliveries.id as deliveryId')
                  ->where('deliveries.rfc', $rfc)
                  ->join('order_log', 'order_log.id = deliveries.order_Id')
                  ->join('stock', 'order_log.product = stock.id')
                  ->get()
                  ->getResult();
                  return $query;
    }

     // delivery total in general 
     public function getDeliveryLogCount()
     {
        $query = $this->selectSum('qty')
        ->get();
        return $query->getRow()->qty;
     }
}