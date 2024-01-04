<?php $this->extend('dashboard/partials/layout')?>

<?=$this->section('main')?>
	<div class="row">

		<div class="col-md-8 pt-2">
			<div class="card mb-3">
				<div class="card-header bg-success text-white">
					<h3>Log a new loan payment</h3>
				</div>
				<div class="card-body">
					<form method="post" action="/dashboard/log_loan_payment">
						<div class="row align-items-center">
						<div class="col-3">
							<div class="form-group">
								<label>Loan Serial </label>
								<input type="text" value="<?= set_value('serial_no')?>" name="serial_no" class="border-success form-control">
								<?php if(isset($lonePaymentLogValidation) && $lonePaymentLogValidation->hasError('serial_no')) : ?>
						           <div class="text-danger"><?=$lonePaymentLogValidation->getError('serial_no')?></div>
						        <?php endif; ?>
							</div>
						</div>
						<div class="col-3">
							<div class="form-group">
								<label>Amount</label>
								<input type="number" value="<?= set_value('mount')?>" min='0' name="mount" class="border-success form-control">
								<?php if(isset($lonePaymentLogValidation) && $lonePaymentLogValidation->hasError('mount')) : ?>
						           <div class="text-danger"><?=$lonePaymentLogValidation->getError('mount')?></div>
						        <?php endif; ?>
							</div>
						</div>
						<div class="col-3">
							<div class="form-group ">
								<label>Loan Currency</label>
								<select class="form-control border-success" name="pmtCurrency" >
									<option value="">Choose</option>
									<option <?=set_select('pmtCurrency', 'LRD')?> value="LRD">Liberian Dollars</option>
									<option <?=set_select('pmtCurrency', 'USD')?> value="USD">United States Dollars</option>
								</select>
								<?php if(isset($lonePaymentLogValidation) && $lonePaymentLogValidation->hasError('pmtCurrency')) : ?>
						           <div class="text-danger"><?=$lonePaymentLogValidation->getError('pmtCurrency')?></div>
						        <?php endif; ?>
							</div>
						</div>
						<div class="col-3">
							<div class="form-group  pt-4">
								<button class="btn pull-right w-100 btn-success ">Record Payment</button>
							</div>
						</div>
					</div>
					</form>
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					  <ul class="nav nav-pills mb-3" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Loan Payment Log</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Loan Application</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile2" role="tab" aria-controls="profile" aria-selected="false">Payment Summary</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            	<div class="card ">
                            		<div class="card-header">
                            			<h5 class="me-2 mb-2 text-dark">Loan Payment Log</h5>
                            		</div>
                            		<div class="card-body">
		                                <?php include('partials/tables/loan_payment_log_table.php'); ?>
                            		</div>
                            	</div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            	<div class="card ">
                            		<div class="card-header">
                            			<h5 class="me-2 mb-2 text-dark">Loan Applicants Log</h5>
                            		</div>
                            		<div class="card-body">
		                                <?php include('partials/tables/loan_applicants_table.php'); ?>
                            		</div>
                            	</div>
                            </div>
                            <div class="tab-pane fade" id="profile2" role="tabpanel" aria-labelledby="profile-tab2">
                            	<div class="card ">
                            		<div class="card-header">
                            			<h5 class="me-2 mb-2 text-dark">Loan Applicants Log</h5>
                            		</div>
                            		<div class="card-body text-dark">
		                                <?php include('partials/tables/loan_payment_summary_table.php'); ?>
                            		</div>
                            	</div>
                            </div>
                        </div>
				</div>
			</div>
		</div>

		<div class="col-md-4 pt-2">
			<div class="card shadow-lg">
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