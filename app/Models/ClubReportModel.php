<?php

namespace App\Models;

use CodeIgniter\Model;

class ClubReportModel extends Model
{
    protected $table = 'due_pmt_log'; // Adjust the table name as needed
    protected $primaryKey = 'id'; // Adjust the primary key as needed
    protected $allowedFields = [
        'mem_serial_no',
        'due_amount',
        'due_currency',
        'recordedBy',
        'approved_status',
        'last_edited_by',
        'recordedDate',
        'last_edited_date' 
    ];

// get the list of payment status for everyone 
  public function get_all_report_payment_log($startDate, $endDate){

    $data = $this->db->table('due_pmt_log')
        ->select('team.*, due_pmt_log.*, due_pmt_log.id as paymentId, membership_applicants.*, team.fullName as teamMemName, membership_applicants.fullName as memberFullName')
        ->join('team', 'team.id = due_pmt_log.recordedBy')
        ->join('membership_applicants', 'membership_applicants.memberSerialNo = due_pmt_log.mem_serial_no')
        ->where('due_pmt_log.recordedDate >=', $startDate)
        ->where('due_pmt_log.recordedDate <=', $endDate)
        ->orderBy('due_pmt_log.id','desc')
        ->get()
        ->getResult();
        return $data;
  	}


// get the total amount saved by member 

public function get_report_payment_total($status, $currency, $startDate, $endDate)
{
     $result = $this->db->table('due_pmt_log')
        ->select('*, SUM(due_pmt_log.due_amount) as total_paid')
        ->where('due_pmt_log.due_currency', $currency)
        ->where('due_pmt_log.approved_status', $status)
        ->where('due_pmt_log.recordedDate >=', $startDate)
        ->where('due_pmt_log.recordedDate <=', $endDate)
        ->get()
        ->getRow();
        return $result->total_paid ?? 0;
}



}