<?php

namespace App\Models;

use CodeIgniter\Model;

class TestimonialsModel extends Model
{
    protected $table      = 'testimonials';
    protected $primaryKey = 'id';
    protected $allowedFields = [
    	'customer_pic',
    	'customer_testimoney',
    	'customer_title',
    	'customer_name'
    ];
  
    
}