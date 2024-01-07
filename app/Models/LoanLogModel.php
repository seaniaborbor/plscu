<?php

namespace App\Models;

use CodeIgniter\Model;

class LoanLogModel extends Model
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

// get the log that is pending or not pending/approved 
   public function all_pending_loan_payments($approveStatus){
   		$data = $this->db->table('loan_pmt_log')
   				->select('*, loan_application.fullName as payBy, loan_pmt_log.id as payment_id')
   				->join('loan_application', 'loan_application.serial_no = loan_pmt_log.serial_no')
   				->join('team', 'loan_pmt_log.loggedBy = team.id')
          ->where('loan_pmt_log.isApproved', $approveStatus)
   				->orderBy('loan_pmt_log.loggedDate', 'desc')
          ->get()
          ->getResult();
        return $data;
   }

// // get the payment summary of all creditors 
  public function get_payment_summary(){

	  	$data = $this->db->table('loan_pmt_log')
	  			->select('*, SUM(loan_pmt_log.amount) as total_pmt, loan_application.serial_no as applicantSerial')
	  			->where('loan_pmt_log.serial_no = loan_application.serial_no')
	  			->join('loan_application', 'loan_pmt_log.serial_no = loan_application.serial_no')
	  			->groupBy('loan_application.serial_no')
	  			->orderBy('loan_application.loanStartDate')
	  			->get()
	  			->getResult();
	  	return $data;
  }

  // get the payment history of a person base on serial

  public function get_single_loan_log($serial){
    $data = $this->db->table('loan_pmt_log')
          ->select('*, loan_application.fullName as payBy, loan_pmt_log.id as payment_id, loan_application.id as applicantId')
          ->join('loan_application', 'loan_application.serial_no = loan_pmt_log.serial_no')
          ->where("loan_application.serial_no",$serial)
          ->join('team', 'loan_pmt_log.loggedBy = team.id')
          ->orderBy('loan_pmt_log.loggedDate', 'desc')
          ->get()
          ->getResult();
        return $data;
  }

// get the long log of a single member by serialNo and status(pending or approved)
    public function get_loan_applicants_log($serial, $approveStatus){

      $data = $this->db->table('loan_pmt_log')
          ->select('*, loan_application.fullName as payBy, loan_pmt_log.id as payment_id, loan_application.id as applicantId')
          ->join('loan_application', 'loan_application.serial_no = loan_pmt_log.serial_no')
          ->where("loan_application.serial_no",$serial)
          ->where('loan_pmt_log.isApproved', $approveStatus)
          ->join('team', 'loan_pmt_log.loggedBy = team.id')
          ->orderBy('loan_pmt_log.loggedDate', 'desc')
          ->get()
          ->getResult();
        return $data;
   }

// get the lone total payment for single client 
    public function total_loan_paid_by_applicant($serial, $approveStatus){

         $data = $this->db->table('loan_pmt_log')
        ->select('*, SUM(loan_pmt_log.amount) as total_paid')
        ->where('loan_pmt_log.serial_no', $serial)
        ->where('loan_pmt_log.isApproved', $approveStatus)
        ->get()
        ->getRow();
    
    return $data;
   }



}