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
    <div class="item  bg-white p-0 rounded border shadow-lg border-2 " style="background-color: #4158D0;
background-image: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);
">
    	<div class="row  align-items-center">
    		<div class="col-5  p-3 text-center">
    			<i class="bi bi-people text-white display-4"></i>
    			<h5 class="text-white">Total Club Account Approved</h5>
    		</div>
    		<div class="col-7 text-white">
    			<h1><?=$total_club_members?></h1>
    		</div>
    	</div>
    </div>

     <div class="item  bg-white p-0 rounded border border-2 " style="background-color: #F4D03F;
background-image: linear-gradient(132deg, #F4D03F 0%, #16A085 100%);
">
        <div class="row  align-items-center">
            <div class="col-5  p-3 text-center">
                <i class="bi bi-people text-white display-4"></i>
                <h5 class="text-white">Total Club Account Pending</h5>
            </div>
            <div class="col-7 text-white">
                <h1><?=$total_club_members_pending?></h1>
            </div>
        </div>
    </div>


     <div class="item bg-white p-0 rounded  border shadow-lg border-2" style="background-color: #FAD961;
background-image: linear-gradient(90deg, #FAD961 0%, #F76B1C 100%);
">
    	<div class="row  align-items-center ">
    		<div class="col-5  p-3 text-center">
    			<i class="bi bi-person text-white display-4"></i>
    			<h5 class="text-white">Total Loan Accounts Approved</h5>
    		</div>
    		<div class="col-7 text-white">
    			<h1><?=$total_loan_applicants?></h1>
    		</div>
    	</div>
    </div>

     <div class="item bg-white p-0 rounded  border border-2" style="background-color: #74EBD5;
background-image: linear-gradient(90deg, #74EBD5 0%, #9FACE6 100%);
">
        <div class="row  align-items-center ">
            <div class="col-5  p-3 text-center">
                <i class="bi bi-person text-white display-4"></i>
                <h5 class="text-white">Total Loan Accounts Pending</h5>
            </div>
            <div class="col-7 text-white">
                <h1><?=$total_loan_applicants_pending?></h1>
            </div>
        </div>
    </div>

     <div class="item bg-white p-0 rounded border border-2 shadow-lg" style="background-color: #FF9A8B;
background-image: linear-gradient(90deg, #FF9A8B 0%, #FF6A88 55%, #FF99AC 100%);
">
    	<div class="row  align-items-center">
    		<div class="col-5  p-3 text-center">
    			<i class="bi bi-cash-coin text-white display-4"></i>
    			<h5 class="text-white">Total LRD  Club Payment Approved</h5>
    		</div>
    		<div class="col-7 text-white">
    			<h1><?=$total_due_pmnt_lrd?></h1>
    		</div>
    	</div>
    </div>

        <div class="item bg-white p-0 rounded  border border-2" style="background-color: #FA8BFF;
background-image: linear-gradient(45deg, #FA8BFF 0%, #2BD2FF 52%, #2BFF88 90%);
">
        <div class="row  align-items-center">
            <div class="col-5  p-3 text-center">
                <i class="bi bi-cash-coin text-white display-4"></i>
                <h5 class="text-white">Total LRD  Club Payment Pending</h5>
            </div>
            <div class="col-7 text-white">
                <h1><?=$total_due_pmnt_pending_lrd?></h1>
            </div>
        </div>
    </div>

     <div class="item bg-white  p-0 rounded border shadow-lg border-2 " style="background-image: linear-gradient(180deg, #2af598 0%, #009efd 100%);">
    	<div class="row  align-items-center">
    		<div class="col-5  p-3 text-center">
    			<i class="bi bi-cash-stack text-white display-4"></i>
    			<h5 class="text-white">Total USD In Club Account approved </h5>
    		</div>
    		<div class="col-7 text-white">
    			<h1><?=$total_due_pmnt_usd?></h1>
    		</div>
    	</div>
    </div>

    <div class="item bg-white  p-0 rounded border border-2 " style="background-image: linear-gradient(to right, #b8cbb8 0%, #b8cbb8 0%, #b465da 0%, #cf6cc9 33%, #ee609c 66%, #ee609c 100%);">
        <div class="row  align-items-center">
            <div class="col-5  p-3 text-center">
                <i class="bi bi-cash-stack text-white display-4"></i>
                <h5 class="text-white">Total club USD payment pending</h5>
            </div>
            <div class="col-7 text-white">
                <h1><?=$total_due_pmnt_pending_usd?></h1>
            </div>
        </div>
    </div>

     <div class="item bg-white p-0 shadow-lg border border-lg" style="background-image: linear-gradient(to top, #48c6ef 0%, #6f86d6 100%);">
    	<div class="row  align-items-center">
    		<div class="col-5  p-3 text-center">
    			<i class="bi bi-currency-rupee text-white display-4"></i>
    			<h5 class="text-white">Total LRD Loan Payment Approved</h5>
    		</div>
    		<div class="col-7 text-white">
    			<h1><?=$total_loan_pmnt_lrd?></h1>
    		</div>
    	</div>
    </div>

    <div class="item bg-white p-0 border-2 border" style="background-image: linear-gradient(to top, #00c6fb 0%, #005bea 100%);">
        <div class="row  align-items-center">
            <div class="col-5  p-3 text-center">
                <i class="bi bi-currency-rupee text-white display-4"></i>
                <h5 class="text-white">Total LRD Loan Payment Pending</h5>
            </div>
            <div class="col-7 text-white">
                <h1><?=$total_loan_pmnt_pending_lrd?></h1>
            </div>
        </div>
    </div>

      <div class="item bg-white p-0 shadow-lg border border-lg" style="background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(237,3,32,0.87) 20.8%, rgba(242,121,1,0.84) 74.4% );">
        <div class="row  align-items-center">
            <div class="col-5  p-3 text-center">
                <i class="bi bi-currency-dollar text-white display-4"></i>
                <h5 class="text-white">Total Loan USD Payment Approved</h5>
            </div>
            <div class="col-7 text-white">
                <h1><?=$total_loan_pmnt_usd?></h1>
            </div>
        </div>
    </div>

    <div class="item bg-white p-0 border-2 border" style="background-image: linear-gradient(to top, #fcc5e4 0%, #fda34b 15%, #ff7882 35%, #c8699e 52%, #7046aa 71%, #0c1db8 87%, #020f75 100%);">
        <div class="row  align-items-center">
            <div class="col-5  p-3 text-center">
                <i class="bi bi-currency-dollar text-white display-4"></i>
                <h5 class="text-white">Total Loan USD Payment Pending</h5>
            </div>
            <div class="col-7 text-white">
                <h1><?=$total_loan_pmnt_pending_usd?></h1>
            </div>
        </div>
    </div>


</div>