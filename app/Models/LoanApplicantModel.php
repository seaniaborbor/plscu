<?php

namespace App\Models;

use CodeIgniter\Model;

class LoanApplicantModel extends Model
{
    protected $table = 'loan_application'; // Adjust the table name as needed
    protected $primaryKey = 'id'; // Adjust the primary key as needed
    protected $allowedFields = [
        'fullName',
        'gender',
        'applicantImg',
        'phone',
        'email',
        'address',
        'mem_serial',
        'loanAmount',
        'currency',
        'loanStartDate',
        'loanEndDate',
        'interestRate',
        'loan_aggrement_form',
        'regBy',
        'lstEdited',
        'pmtStatus',
        'serial_no',
        'approv_status'
    ];

    // get all loan applicants 
    public function get_loan_applicants_log($approv_status){
        return $this->db->table('loan_application')
                ->select('*, loan_application.fullName as applicantName, loan_application.id as applicant_id')
                ->join('team', 'team.id = loan_application.regBy')
                ->where('loan_application.approv_status', $approv_status)
                ->orderBy('loan_application.lstEdited', 'desc')
                ->get()
                ->getResult();
    }

    // get an applicant profile by serial 
    public function get_an_applicant_profile($serial){
        return $this->db->table('loan_application')
                ->select('*, loan_application.fullName as applicantName')
                ->where('loan_application.serial_no', $serial)
                ->join('team', 'team.id = loan_application.regBy')
                ->orderBy('loan_application.lstEdited', 'desc')
                ->get()
                ->getResult();
    }

    // get applicant profile by profile id
    public function get_an_applicant_profile_by_id($id){
        return $this->db->table('loan_application')
                ->select('*, loan_application.fullName as applicantName')
                ->where('loan_application.id', $id)
                ->join('team', 'team.id = loan_application.regBy')
                ->orderBy('loan_application.lstEdited', 'desc')
                ->get()
                ->getResult();
    }

}