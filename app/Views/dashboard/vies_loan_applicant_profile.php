<?php $this->extend('dashboard/partials/layout')?>

<?=$this->section('main')?>
	<div class="row">
		<div class="col-md-4 pt-2">
			<div class="card shadow-lg">
				<div class="card-header">
					<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
					  <li class="nav-item" role="presentation">
					    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Applicant Profile</button>
					  </li>
					  <li class="nav-item" role="presentation">
					    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Edit Application</button>
					  </li>
					</ul>
				</div>
				<div class="card-body">
					<div class="tab-content" id="pills-tabContent">
					  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
					  	<?php include('partials/loan_applicant_profile.php'); ?>
					  </div>
					  <div class="tab-pane text-dark fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
					  	<?php include('partials/forms/edit_loan_applicant_form.php'); ?>
					  </div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-8 pt-2">
			<div class="card mb-3">
				<div class="card-body">
					<div class="row">
						<div class="col-md-4">
							<div class="alert alert-primary">
								<h1><?=$client_profile[0]->loanAmount?></h1>
								<h3>Total Loan Owed</h3>
							</div>
						</div>
						<?php //print_r($total_loan_paid_by_applicant); exit(); ?>
						<div class="col-md-4">
							<div class="alert alert-success">
								<h1>$<?=$total_loan_paid_by_applicant->total_paid?></h1>
								<h3>Total Loan Paid</h3>
							</div>
						</div>
						<div class="col-md-4">
							<div class="alert alert-warning">
								<h1><?php echo $client_profile[0]->loanAmount?></h1>
								<h3>Total To Paid</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card ">
				<div class="card-header ">
					<h2 class="text-success">Financial Log of <?=$client_profile[0]->applicantName?> </h2>
				</div>

				<div class="card-body">				
				<?php include('partials/tables/single_loan_member_log.php'); ?>
				</div>
			</div>
		</div>

	</div>
<?=$this->endSection()?>