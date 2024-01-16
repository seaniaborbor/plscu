<?php

namespace App\Models;

use CodeIgniter\Model;

class LoanReportModel extends Model
{
    protected $table = 'loan_pmt_log'; // Adjust the table name as needed
    protected $primaryKey = 'id'; // Adjust the primary key as needed
    protected $allowedFields = [
        'serial_no',
        'amount',
        'pmtCurrency',
        'loggedBy',
        'isApproved' 
    ];


// this is the payment log of the report 
  public function allpayments($startDate, $endDate) {
    $data = $this->db->table('loan_pmt_log')
        ->select('*, loan_application.fullName as payBy, loan_pmt_log.id as payment_id')
        ->join('loan_application', 'loan_application.serial_no = loan_pmt_log.serial_no')
        ->join('team', 'loan_pmt_log.loggedBy = team.id')
        ->where('loan_pmt_log.loggedDate >=', $startDate)
        ->where('loan_pmt_log.loggedDate <=', $endDate)
        ->orderBy('loan_pmt_log.loggedDate', 'desc')
        ->get()
        ->getResult();

    return $data;
}


// // get the payment summary of all creditors 
  public function get_payment_summary($startDate, $endDate){

      $data = $this->db->table('loan_pmt_log')
          ->select('*, SUM(loan_pmt_log.amount) as total_pmt, loan_application.serial_no as applicantSerial')
          ->where('loan_pmt_log.serial_no = loan_application.serial_no')
          ->join('loan_application', 'loan_pmt_log.serial_no = loan_application.serial_no')
          ->where('loan_pmt_log.loggedDate >=', $startDate)
          ->where('loan_pmt_log.loggedDate <=', $endDate)
          ->groupBy('loan_application.serial_no')
          ->orderBy('loan_application.loanStartDate')
          ->get()
          ->getResult();
      return $data;
  }


// sum of total payments per currency 
  public function sumLoanPaidByCurrency($currency, $status, $startDate, $endDate) {
    $result = $this->db->table('loan_pmt_log')
        ->selectSum('amount', 'totalAmount')
        ->where('pmtCurrency', $currency)
        ->where('isApproved', $status)
        ->where('loggedDate >=', $startDate)
        ->where('loggedDate <=', $endDate)
        ->get()
        ->getRow();

    return $result->totalAmount ?? 0;
}

// the loan taken base on currency, status and date range
public function sumLoanCreditedAmount($currency, $status, $startDate, $endDate) {
    $result = $this->db->table('loan_application')
        ->selectSum('loanAmount', 'totalLoanAmount')
        ->where('loanStartDate >=', $startDate)
        ->where('loanEndDate <=', $endDate)
        ->where('approv_status', $status)
        ->where('currency', $currency)
        ->get()
        ->getRow();

    return $result->totalLoanAmount ?? 0;
}










}