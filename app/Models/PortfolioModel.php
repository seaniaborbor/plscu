<?php

namespace App\Models;

use CodeIgniter\Model;

class PortfolioModel extends Model
{
    protected $table = 'portfolio';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'title',
        'shceenshoti',
        'shceenshotii',
        'shceenshotiii',
        'snippet',
        'postbody',
        'category',
        'client',
        'url'
    ];


    public function save_portfolio($data)
    {
        
    }
    
}
