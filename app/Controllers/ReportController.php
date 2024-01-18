<?php namespace App\Controllers;

use App\Models\LoanReportModel;


class ReportController extends BaseController{

    public function __construct()
    {
        helper(['form', 'url', 'text']);
    }
   
public function loan_report()
    {
        $LoanReportModel = new LoanReportModel();

        $data = [];
        $data['passLink'] = "loan_membership";
        $data['userData'] = session()->get('userData');

         $validationRules = [
        'startingDate' => 'required|valid_date',
        'endingDate'   => 'required|valid_date',
    ];

    // Run validation
   if($this->request->getMethod() === 'post'){
     if ($this->validate($validationRules)) {

      $startingDate = $this->request->getPost('startingDate');
      $endingDate = $this->request->getPost('endingDate');

      $data['startingDate'] = $startingDate;
      $data['endingDate'] = $endingDate;
      // get all the lone payments log 
      $data['all_loan_payment_table'] = $LoanReportModel->allpayments($startingDate, $endingDate);

      // get the sum of total loan, payment, balance and others 
      $data['loaners_payment_summary'] = $LoanReportModel->get_payment_summary($startingDate, $endingDate);

      // get the um of usd and lrd paid
      $data['totalLRDpaid_pending'] = $LoanReportModel->sumLoanPaidByCurrency('LRD', 'Pending', $startingDate, $endingDate);
      $data['totalLRDpaid_approved'] = $LoanReportModel->sumLoanPaidByCurrency('LRD', 'Approved', $startingDate, $endingDate);
      $data['totalUSDpaid_pending'] = $LoanReportModel->sumLoanPaidByCurrency('USD', 'Pending', $startingDate, $endingDate);
      $data['totalUSDpaid_approved'] = $LoanReportModel->sumLoanPaidByCurrency('USD', 'Approved', $startingDate, $endingDate);

      //various currencies of loan taken base on their status 
      $data['sumOfLrdLoanOutApproved'] = $LoanReportModel->sumLoanCreditedAmount("LRD", "Approved", $startingDate, $endingDate);
      $data['sumOfLrdLoanOutPending'] = $LoanReportModel->sumLoanCreditedAmount("LRD", "Pending", $startingDate, $endingDate);
      $data['sumofUsdLoanOutPApproved'] = $LoanReportModel->sumLoanCreditedAmount("USD", "Approved", $startingDate, $endingDate);
      $data['sumofUsdLoanOutPending'] = $LoanReportModel->sumLoanCreditedAmount("USD", "Pending", $startingDate, $endingDate);



    }else{
        return redirect()->to('/dashboard')->with('error', 'invalid inputs');
    }

   }

        return view('dashboard/generate_loan_report', $data);
    } 


// generate club report 

    public function club_report()
    {
        $LoanReportModel = new LoanReportModel();

        $data = [];
        $data['passLink'] = "loan_membership";
        $data['userData'] = session()->get('userData');

         $validationRules = [
        'startingDate' => 'required|valid_date',
        'endingDate'   => 'required|valid_date',
    ];

    // Run validation
   if($this->request->getMethod() === 'post'){
     if ($this->validate($validationRules)) {

      $startingDate = $this->request->getPost('startingDate');
      $endingDate = $this->request->getPost('endingDate');

      $data['startingDate'] = $startingDate;
      $data['endingDate'] = $endingDate;
      // get all the lone payments log 
      



    }else{
        return redirect()->to('/dashboard')->with('error', 'invalid inputs');
    }

   }

        return view('dashboard/generate_club_report', $data);
    } 
}

