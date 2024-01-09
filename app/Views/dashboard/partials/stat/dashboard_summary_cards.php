<div class="owl-carousel owl-theme">
<!-- 
    total_club_members
total_loan_applicants
total_due_pmnt_lrd
total_due_pmnt_usd
total_loan_pmnt_lrd
total_loan_pmnt_usd

total_due_pmnt_pending_lrd
total_due_pmnt_pending_usd
total_loan_pmnt_pending_lrd
total_loan_pmnt_pending_usd

total_club_members_pending
total_loan_applicants_pending

-->
    <div class="item  bg-white p-0 rounded border shadow-lg border-2 ">
    	<div class="row  align-items-center">
    		<div class="col-5  p-3 text-center">
    			<i class="bi bi-people text-primary display-4"></i>
    			<h5 class="text-secondary">Total Club Account Approved</h5>
    		</div>
    		<div class="col-7 text-dark">
    			<h1><?=$total_club_members?></h1>
    		</div>
    	</div>
    </div>

     <div class="item  bg-white p-0 rounded border border-2 ">
        <div class="row  align-items-center">
            <div class="col-5  p-3 text-center">
                <i class="bi bi-people text-danger display-4"></i>
                <h5 class="text-secondary">Total Club Account Pending</h5>
            </div>
            <div class="col-7 text-dark">
                <h1><?=$total_club_members_pending?></h1>
            </div>
        </div>
    </div>


     <div class="item bg-white p-0 rounded  border shadow-lg border-2">
    	<div class="row  align-items-center ">
    		<div class="col-5  p-3 text-center">
    			<i class="bi bi-person text-primary display-4"></i>
    			<h5 class="text-secondary">Total Loan Accounts Approved</h5>
    		</div>
    		<div class="col-7 text-dark">
    			<h1><?=$total_loan_applicants?></h1>
    		</div>
    	</div>
    </div>

     <div class="item bg-white p-0 rounded  border border-2">
        <div class="row  align-items-center ">
            <div class="col-5  p-3 text-center">
                <i class="bi bi-person text-danger display-4"></i>
                <h5 class="text-secondary">Total Loan Accounts Pending</h5>
            </div>
            <div class="col-7 text-dark">
                <h1><?=$total_loan_applicants_pending?></h1>
            </div>
        </div>
    </div>

     <div class="item bg-white p-0 rounded border border-2 shadow-lg">
    	<div class="row  align-items-center">
    		<div class="col-5  p-3 text-center">
    			<i class="bi bi-cash-coin text-primary display-4"></i>
    			<h5 class="text-secondary">Total LRD  Club Payment Approved</h5>
    		</div>
    		<div class="col-7 text-dark">
    			<h1><?=$total_due_pmnt_lrd?></h1>
    		</div>
    	</div>
    </div>

        <div class="item bg-white p-0 rounded  border border-2">
        <div class="row  align-items-center">
            <div class="col-5  p-3 text-center">
                <i class="bi bi-cash-coin text-danger display-4"></i>
                <h5 class="text-secondary">Total LRD  Club Payment Pending</h5>
            </div>
            <div class="col-7 text-dark">
                <h1><?=$total_due_pmnt_pending_lrd?></h1>
            </div>
        </div>
    </div>

     <div class="item bg-white  p-0 rounded border shadow-lg border-2 ">
    	<div class="row  align-items-center">
    		<div class="col-5  p-3 text-center">
    			<i class="bi bi-cash-stack text-primary display-4"></i>
    			<h5 class="text-secondary">Total USD In Club Account approved </h5>
    		</div>
    		<div class="col-7 text-dark">
    			<h1><?=$total_due_pmnt_usd?></h1>
    		</div>
    	</div>
    </div>

    <div class="item bg-white  p-0 rounded border border-2 ">
        <div class="row  align-items-center">
            <div class="col-5  p-3 text-center">
                <i class="bi bi-cash-stack text-danger display-4"></i>
                <h5 class="text-secondary">Total club USD payment pending</h5>
            </div>
            <div class="col-7 text-dark">
                <h1><?=$total_due_pmnt_pending_usd?></h1>
            </div>
        </div>
    </div>

     <div class="item bg-white p-0 shadow-lg border border-lg">
    	<div class="row  align-items-center">
    		<div class="col-5  p-3 text-center">
    			<i class="bi bi-currency-rupee text-primary display-4"></i>
    			<h5 class="text-secondary">Total LRD Loan Payment Approved</h5>
    		</div>
    		<div class="col-7 text-dark">
    			<h1><?=$total_loan_pmnt_lrd?></h1>
    		</div>
    	</div>
    </div>

    <div class="item bg-white p-0 border-2 border">
        <div class="row  align-items-center">
            <div class="col-5  p-3 text-center">
                <i class="bi bi-currency-rupee text-danger display-4"></i>
                <h5 class="text-secondary">Total LRD Loan Payment Pending</h5>
            </div>
            <div class="col-7 text-dark">
                <h1><?=$total_loan_pmnt_pending_lrd?></h1>
            </div>
        </div>
    </div>

      <div class="item bg-white p-0 shadow-lg border border-lg">
        <div class="row  align-items-center">
            <div class="col-5  p-3 text-center">
                <i class="bi bi-currency-dollar text-primary display-4"></i>
                <h5 class="text-secondary">Total Loan USD Payment Approved</h5>
            </div>
            <div class="col-7 text-dark">
                <h1><?=$total_loan_pmnt_usd?></h1>
            </div>
        </div>
    </div>

    <div class="item bg-white p-0 border-2 border">
        <div class="row  align-items-center">
            <div class="col-5  p-3 text-center">
                <i class="bi bi-currency-dollar text-danger display-4"></i>
                <h5 class="text-secondary">Total Loan USD Payment Pending</h5>
            </div>
            <div class="col-7 text-dark">
                <h1><?=$total_loan_pmnt_pending_usd?></h1>
            </div>
        </div>
    </div>


</div>