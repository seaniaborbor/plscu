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
        $data['passLink'] = "";
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

      print_r($startingDate).' .... '.print_r($endingDate);

      // get all the lone payments log 
      $all_loan_payment_table = $LoanReportModel->allpayments($startingDate, $endingDate);

      // get the sum of total loan, payment, balance and others 
      $loaners_payment_summary = $LoanReportModel->get_payment_summary($startingDate, $endingDate);

      // get the um of usd and lrd paid
      $totalLRDpaid_pending = $LoanReportModel->sumLoanPaidByCurrency('LRD', 'Pending', $startingDate, $endingDate);
      $totalLRDpaid_approved = $LoanReportModel->sumLoanPaidByCurrency('LRD', 'Approved', $startingDate, $endingDate);
      $totalUSDpaid_pending = $LoanReportModel->sumLoanPaidByCurrency('USD', 'Pending', $startingDate, $endingDate);
      $totalUSDpaid_approved = $LoanReportModel->sumLoanPaidByCurrency('USD', 'Approved', $startingDate, $endingDate);

      //various currencies of loan taken base on their status 
      $sumOfLrdLoanOutApproved = $LoanReportModel->sumLoanCreditedAmount("LRD", "Approved", $startingDate, $endingDate);
      $sumOfLrdLoanOutPending = $LoanReportModel->sumLoanCreditedAmount("LRD", "Pending", $startingDate, $endingDate);
      $sumofUsdLoanOutPApproved = $LoanReportModel->sumLoanCreditedAmount("USD", "Approved", $startingDate, $endingDate);
      $sumofUsdLoanOutPending = $LoanReportModel->sumLoanCreditedAmount("USD", "Pending", $startingDate, $endingDate);


      exit();



    }else{
        return redirect->to('/dashboard')->with('error', 'invalid inputs');
    }

   }

        return view('dashboard/generate_loan_report', $data);
    } 
}

