<?php

namespace App\Models;

use CodeIgniter\Model;

class ClubMembershipModel extends Model
{
    protected $table      = 'membership_applicants';
    protected $primaryKey = 'id';
    protected $allowedFields = [
    	'fullName',
    	'gender',
    	'dob',
    	'membership_category',
    	'phone',
    	'address',
    	'deposite_unit',
        'saving_year',
        'currency',
        'email',
        'memberSerialNo',
        'regFeesStatus',
        'regFees',
        'accountStatus',
        'registeredBy',
    	'profileImg',
    ];
  
  // the list the member depending on their reg status 
  public function return_member_log($status){
   $data = $this->db->table('membership_applicants')
                ->select('team.*, membership_applicants.*, team.fullName as agentName, membership_applicants.profileImg as memBerpic')
                ->join('team', 'team.id = membership_applicants.registeredBy')
                ->where('membership_applicants.accountStatus', $status)
                ->orderBy('membership_applicants.id', 'desc')
                ->get()
                ->getResult();
                return $data;
  }
    

// get a member profile dedails 
  public function a_member_profile_log($serial){
   $data = $this->db->table('membership_applicants')
                ->select('team.*, membership_applicants.*, team.fullName as agentName, membership_applicants.profileImg as memBerpic')
                ->join('team', 'team.id = membership_applicants.registeredBy')
                ->where('membership_applicants.memberSerialNo', $serial)
                ->orderBy('membership_applicants.id', 'desc')
                ->get()
                ->getResult();
                return $data;
  }
    

}