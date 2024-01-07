<?php $this->extend('dashboard/partials/layout')?>

<!-- 
	applicant_data
applicant_pending_loan_log
applicant_approved_loan_log
-->


<?=$this->section('main')?>
	<div class="row">
		<?php if($applicant_data[0]->approv_status == "Pending"){
			?>
				<div class="col-md-8">
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
				  <h1>
					<strong>Please Wait a while</strong>
					<div class="spinner-grow text-danger" role="status">
						  <span class="visually-hidden">Loading...</span>
						</div>
					<div class="spinner-grow text-warning" role="status">
						  <span class="visually-hidden">Loading...</span>
						</div>
				</h1>
					</strong> This account is under review by the CEO/Admin for approvial.
				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				</div>

			<?php 
			}else{
				?>

				<div class="col-md-8 pt-2">
			<div class="row">
				<div class="col-md-3">
					<div class="card border border-2 ">
						<div class="card-body text-center ">
							<h1><?=$applicant_data[0]->loanAmount?></h1>
						</div>
						<div class="card-footer text-secondary text-center ">
							<h3>Total Loan Credited</h3>
						</div>
					</div>
				</div>
				<?php /* total_approved_loan_paid
total_approved_loan_pending */ ?>
				<div class="col-md-3">
					<div class="card">
						<div class="card-body  text-center">
							<h1><?=$applicant_data[0]->loanAmount+($applicant_data[0]->loanAmount*($applicant_data[0]->interestRate/100))?></h1>
						</div>
						<div class="card-footer text-secondary text-center ">
							<h3>Total Amt to  Paid</h3>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card">
						<div class="card-body text-center ">
							<h1><?=$total_approved_loan_paid->total_paid?></h1>
						</div>
						<div class="card-footer text-secondary text-center ">
							<h3>Total To Paid</h3>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card">
						<div class="card-body text-center ">
							<h1><?=($applicant_data[0]->loanAmount+($applicant_data[0]->loanAmount*($applicant_data[0]->interestRate/100)))-$total_approved_loan_paid->total_paid?></h1>
						</div>
						<div class="card-footer text-secondary text-center ">
							<h3>Balance To Pay</h3>
						</div>
					</div>
				</div>
			</div>
			<div class="card  mt-3">
				<div class="card-header ">
					<h2 class="text-success">Financial Log of <?=$applicant_data[0]->applicantName?> </h2>
				</div>

				<div class="card-body">	
				<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
					  <li class="nav-item" role="presentation">
					    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#ppills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Pending Payments</button>
					  </li>
					  <li class="nav-item" role="presentation">
					    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#ppills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Approved Payments</button>
					  </li>
					</ul>
					<div class="tab-content" id="pills-tabContent">
					  <div class="tab-pane fade show active" id="ppills-home" role="tabpanel" aria-labelledby="pills-home-tab">
					  	<?php include('partials/tables/loan_member_pmt_pending_log_table.php');?>
					  </div>
					  <div class="tab-pane text-dark fade" id="ppills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
					  	<?php include('partials/tables/loan_member_pmt_aporoved_log_table.php'); ?>
					  </div>
					</div>

				<?php //include('partials/tables/single_loan_member_log.php'); ?>
				</div>
			</div>
		</div>

				<?php 
			}
			?>

		<div class="col-md-4 pt-2">
			<div class="card shadow-lg">
				<div class="card-header">
					<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
					  <li class="nav-item" role="presentation">
					    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Applicant Profile</button>
					  </li>
					  <li class="nav-item" role="presentation">
					    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Approve Applicant</button>
					  </li>
					</ul>
				</div>
				<div class="card-body">
					<div class="tab-content" id="pills-tabContent">
					  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
					  	<?php include('partials/loan_applicant_profile.php'); ?>
					  </div>
					  <div class="tab-pane text-dark fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
					  	<?php include('partials/forms/loan_approve_form.php'); ?>
					  </div>
					</div>
				</div>
			</div>
		</div>

	</div>
<?=$this->endSection()?>