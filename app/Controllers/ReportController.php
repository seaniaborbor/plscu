<?php namespace App\Controllers;

use App\Models\LoanApplicantModel;
use App\Models\LoanLogModel;


class ReportController extends BaseController{

    public function __construct()
    {
        helper(['form', 'url', 'text']);
    }
   
public function loan_report()
    {
        $data = [];
        $data['passLink'] = "";
        $data['userData'] = session()->get('userData');

        return view('dashboard/generate_loan_report', $data);
    } 
}

