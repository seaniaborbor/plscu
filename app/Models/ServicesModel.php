<?php

namespace App\Models;

use CodeIgniter\Model;

class ServicesModel extends Model
{
    protected $table      = 'services';
    protected $primaryKey = 'id';
    protected $allowedFields = [
    	'service_name',
    	'service_summary',
    	'service_detail',
    	'service_icon'
    ];
  
    
}