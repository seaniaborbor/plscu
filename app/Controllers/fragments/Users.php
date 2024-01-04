<?php namespace App\Controllers;

use App\Models\AgentsModel;
use App\Models\TablesModel;


class Users extends BaseController
{
    
    public function index()
    {
        $agents = new AgentsModel();
        $data['agents'] = $agents->findAll();
       return view("dashboard/manageagents", $data);
    }
    


}
