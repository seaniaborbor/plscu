<?php

namespace App\Models;

use CodeIgniter\Model;

class ClubDueLogModel extends Model
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
  public function return_payment_log($status){

    $data = $this->db->table('due_pmt_log')
        ->select('team.*, due_pmt_log.*, due_pmt_log.id as paymentId, membership_applicants.*, team.fullName as teamMemName, membership_applicants.fullName as memberFullName')
        ->join('team', 'team.id = due_pmt_log.recordedBy')
        ->join('membership_applicants', 'membership_applicants.memberSerialNo = due_pmt_log.mem_serial_no')
        ->where('due_pmt_log.approved_status', $status)
        ->orderBy('due_pmt_log.id','desc')
        ->get()
        ->getResult();
        return $data;
  	}

// get the list of payment status for everyone 
  public function a_member_payment_log($status, $serial){

    $data = $this->db->table('due_pmt_log')
        ->select('team.*, due_pmt_log.*,membership_applicants.*, team.fullName as teamMemName, membership_applicants.fullName as memberFullName')
        ->join('team', 'team.id = due_pmt_log.recordedBy')
        ->join('membership_applicants', 'membership_applicants.memberSerialNo = due_pmt_log.mem_serial_no')
        ->where('due_pmt_log.approved_status', $status)
        ->where('membership_applicants.memberSerialNo', $serial)
        ->orderBy('due_pmt_log.id','desc')
        ->get()
        ->getResult();
        return $data;
    }


// get the total amount saved by member 

public function get_a_mem_due_total($serial, $approved_status)
{
     $data = $this->db->table('due_pmt_log')
        ->select('*, SUM(due_pmt_log.due_amount) as total_paid')
        ->where('due_pmt_log.mem_serial_no', $serial)
        ->where('due_pmt_log.approved_status', $approved_status)
        ->get()
        ->getRow();
        return $data;
}



}