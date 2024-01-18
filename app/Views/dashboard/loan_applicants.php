<?php $this->extend('dashboard/partials/layout')?>

<?=$this->section('main')?>
	<div class="row">

		<div class="col-md-8 pt-2">
			<div class="card">
                <div class="card-header">
                    <ul class="nav nav-pills mb-3" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Pending Loan Applicant Log</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Approve Loan applicants</a>
                            </li>
                             <li class="nav-item" role="presentation">
                                <a class="nav-link btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#loanReport">Generate Loan Report</a>
                            </li>
                        </ul>
                </div>
				<div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            	<div class="card ">
                            		<div class="card-header">
                            			<h5 class="me-2 mb-2 text-dark">Loan Payment Log</h5>
                            		</div>
                            		<div class="card-body">
		                                <?php include('partials/tables/pending_lone_applicants_log.php'); ?>
                            		</div>
                            	</div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            	<div class="card ">
                            		<div class="card-header">
                            			<h5 class="me-2 mb-2 text-dark">Loan Applicants Log</h5>
                            		</div>
                            		<div class="card-body">
		                                <?php include('partials/tables/approve_lone_applicants_log.php'); ?>
                            		</div>
                            	</div>
                            </div>
                        </div>
				</div>
			</div>
		</div>

		<div class="col-md-4 pt-2">
			<div class="card ">
				<div class="card-header bg-success d-flex justify-content-between text-white">
					<h4>Register Loan Applicant</h4>
				</div>
				<div class="card-body">
					<?php include('partials/forms/loan_application_form.php'); ?>
				</div>
			</div>
		</div>

	</div>
<?=$this->endSection()?>