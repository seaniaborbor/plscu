<?php

namespace App\Models;

use CodeIgniter\Model;

class StockModel extends Model
{
    protected $table = 'stock';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        "productName",
     "category",
      "purchasePrice",
       "tagPrice",
        "featureImg",
        "salePrice",
        "salePrice2",
        "description",
        "hide"];

        public function getAllProductsOrdered(){
            return $this->db->table('stock')
                        ->orderBy('id', 'desc')
                        ->limit(4)
                        ->get()
                        ->getResult();
        }
        public function getTabletorPhone()
        {
            return $this->db->table('stock')
                    ->where('category', 'tablet')
                    ->orWhere('category', 'phone')
                    ->orderBy('id', 'DESC') // Replace 'id' with the field you want to order by
                    ->limit(4)
                    ->get()
                    ->getResult();
        }

        public function getLaptopsOrComputer()
        {
            return $this->where('category', 'laptop')
                ->orWhere('category', 'desktop')
                ->limit(4)
                ->orderBy('id', 'DESC') // Replace 'id' with the field you want to order by
                ->get()
                ->getResult();
        }

        public function getProductsNotInCategories(){
        $categories = ['laptop', 'phone', 'tablet', 'monitor'];
        return $this->db->table('stock')
            ->whereNotIn('category', $categories)
            ->orderBy('id', 'DESC') // Replace 'id' with the field you want to order by
            ->get()
            ->getResult();
         }

         public function categoryResults($category){
            return $this->where('category', $category)
                ->orWhere('category', 'desktop')
                ->limit(10)
                ->orderBy('id', 'DESC') // Replace 'id' with the field you want to order by
                ->get()
                ->getResult();
         }


         public function searchProducts($searchQuery)
         {
            $keywords = explode(' ', $searchQuery);
            $this->db->table('stock')
                    ->select('*')
                    ->orLike('stock.productName', $keywords[0])
                    ->orWhereIn('description', $keywords)
                    ->get()
                    ->getResult();
         }

         // for the admin graph
         public function ordersummary()
         {
             $query = $this->db->table('order_log')
                 ->select('stock.category as category, COUNT(order_log.product) as total_orders')
                 ->join('stock', 'order_log.product = stock.id')
                 ->groupBy('stock.category')
                 ->get();
         
             return $query->getResult();
         }

         // for the admin graph
         public function delivery_summary()
         {
             $query = $this->db->table('deliveries')
                 ->select('stock.category as category, SUM(deliveries.amoutPaid) as total')
                 ->join('order_log', 'deliveries.order_id = order_log.id')
                 ->join('stock', 'order_log.product = stock.id') // Assuming there is a column "product" in "order_log" that links to "stock" table
                 ->groupBy('stock.category')
                 ->get();
         
             return $query->getResult();
         }

        
         
  
}