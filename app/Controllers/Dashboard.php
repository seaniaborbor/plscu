<?php namespace App\Controllers;

use App\Models\ClubMembershipModel;
use App\Models\ClubDueLogModel;

use App\Models\LoanApplicantModel;
use App\Models\LoanLogModel;


class Dashboard extends BaseController{    
   
    // home page route 
    public function index(){

         $data['passLink'] = "dashboard";
         $data['userData'] = session()->get('userData');

         $ClubMembershipModel = new ClubMembershipModel();
         $ClubDueLogModel = new ClubDueLogModel();

         $LoanApplicantModel = new LoanApplicantModel();
         $LoanLogModel = new LoanLogModel();

         //total club membership account 
         $data['total_club_members'] = $ClubMembershipModel->where('accountStatus', 'Approved')->countAllResults();
         $data['total_loan_applicants'] = $LoanApplicantModel->where('approv_status', 'Approved')->countAllResults();

         $data['total_club_members_pending'] = $ClubMembershipModel->where('accountStatus', 'Pending')->countAllResults();
         $data['total_loan_applicants_pending'] = $LoanApplicantModel->where('approv_status', 'Pending')->countAllResults();

          //total lrd in saving accounts 
         $data['total_due_pmnt_lrd'] = $ClubDueLogModel->selectSum('due_amount')
                                                            ->where('approved_status', 'Approved')
                                                            ->where('due_currency', 'LRD')
                                                            ->get()
                                                            ->getRow()
                                                            ->due_amount;
          //total usd in saving accounts 
         $data['total_due_pmnt_usd'] = $ClubDueLogModel->selectSum('due_amount')
                                                            ->where('approved_status', 'Approved')
                                                            ->where('due_currency', 'USD')
                                                            ->get()
                                                            ->getRow()
                                                            ->due_amount;

          //total lrd in saving accounts 
         $data['total_loan_pmnt_lrd'] = $LoanLogModel->selectSum('amount')
                                                            ->where('isApproved', 'Approved')
                                                            ->where('pmtCurrency', 'LRD')
                                                            ->get()
                                                            ->getRow()
                                                            ->amount;
          //total usd in saving accounts 
         $data['total_loan_pmnt_usd'] = $LoanLogModel->selectSum('amount')
                                                            ->where('isApproved', 'Approved')
                                                            ->where('pmtCurrency', 'USD')
                                                            ->get()
                                                            ->getRow()
                                                            ->amount;
        // pending 
                  //total lrd in saving accounts 
         $data['total_due_pmnt_pending_lrd'] = $ClubDueLogModel->selectSum('due_amount')
                                                            ->where('approved_status', 'Pending')
                                                            ->where('due_currency', 'LRD')
                                                            ->get()
                                                            ->getRow()
                                                            ->due_amount;
          //total usd in saving accounts 
         $data['total_due_pmnt_pending_usd'] = $ClubDueLogModel->selectSum('due_amount')
                                                            ->where('approved_status', 'Pending')
                                                            ->where('due_currency', 'USD')
                                                            ->get()
                                                            ->getRow()
                                                            ->due_amount;

          //total lrd in saving accounts 
         $data['total_loan_pmnt_pending_lrd'] = $LoanLogModel->selectSum('amount')
                                                            ->where('isApproved', 'Pending')
                                                            ->where('pmtCurrency', 'LRD')
                                                            ->get()
                                                            ->getRow()
                                                            ->amount;
          //total usd in saving accounts 
         $data['total_loan_pmnt_pending_usd'] = $LoanLogModel->selectSum('amount')
                                                            ->where('isApproved', 'Pending')
                                                            ->where('pmtCurrency', 'USD')
                                                            ->get()
                                                            ->getRow()
                                                            ->amount;

        // ============== TABLES ================

        // table containg club payment summary 
        $data['club_payments_summary_log'] = $ClubDueLogModel->table('due_pmt_log')
                                                            ->selectSum('due_amount')
                                                            ->join('membership_applicants', 'membership_applicants.memberSerialNo = due_pmt_log.mem_serial_no')
                                                            ->where('due_pmt_log.approved_status', 'Approved')
                                                            ->get()
                                                            ->getRow()
                                                            ->due_amount;

         
        return view("dashboard/index", $data);
    }

    // portfolio 
    public function portfolio()
    {
        $data = [];
        return view('dashboard/portfolio', $data);
        $data['userData'] = session()->get('userData');
        
    }

    // blog details method 
    public function blog($slug = null)
    {
        return view('public/blog');
    }

    // blog details method 
    public function blog_details($slug = null)
    {
        return view('public/blog-details');
    }


    // login route 
    public function login(){

        return view("public/login");
    }



    public function logout(){

        if(session()->has("adminLogin")){
            session()->remove('adminLogin');
            return redirect()->to("/")->withInput()->with('msg', "Welcome back to the dashboard");
        }

        if(session()->has("agentLogin")){
            session()->remove('agentLogin');
            return redirect()->to("/")->withInput()->with('msg', "Welcome back to the dashboard");
        }

    }



}