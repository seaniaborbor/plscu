<?php $this->extend('dashboard/partials/layout')?>


<?=$this->section('main')?>
	<div class="row">
<!-- 
	Array ( [id] => 9 [mem_serial_no] => Z9k1BQ [due_amount] => 2323 [due_currency] => USD [recordedBy] => 1 [recordedDate] => 2024-01-02 15:01:27 [last_edited_date] => 2024-01-02 00:00:00 [last_edited_by] => 1 [approved_status] => Pending )

-->

		<div class="col-md-8 pt-2">
			<div class="card ">
				<div class="card-header ">
					<h2 class="text-success">Edit loan payment of  </h2>
				</div>

				<div class="card-body">				
					<form method="post" action="<?=base_url('dashboard/edit/club_due_management/'.$data_to_edit['id'])?>">
						<div class="row align-items-center">
						<div class="col-md-8">
							<div class="form-group">
								<label>Member Serial </label>
								<input type="text" value="<?=$data_to_edit['mem_serial_no']?>" name="mem_serial_no" class=" form-control">
								<?php if(isset($duePaymentValidation) && $duePaymentValidation->hasError('mem_serial_no')) : ?>
						           <div class="text-danger"><?=$duePaymentValidation->getError('mem_serial_no')?></div>
						        <?php endif; ?>
							</div>
						</div>
						<div class="col-md-8">
							<div class="form-group">
								<label>Amount</label>
								<input type="number" value="<?=$data_to_edit['due_amount']?>" min='0' name="due_amount" class=" form-control">
								<?php if(isset($duePaymentValidation) && $duePaymentValidation->hasError('due_amount')) : ?>
						           <div class="text-danger"><?=$duePaymentValidation->getError('due_amount')?></div>
						        <?php endif; ?>
							</div>
						</div>
						<div class="col-md-8">
							<div class="form-group ">
								<label>Account Currency</label>
								<select class="form-control " name="due_currency" >
									<option value="">Choose</option>
									<option <?=set_select('due_currency', 'LRD')?> value="LRD">Liberian Dollars</option>
									<option <?=set_select('due_currency', 'USD')?> value="USD">United States Dollars</option>
								</select>
								<?php if(isset($duePaymentValidation) && $duePaymentValidation->hasError('due_currency')) : ?>
						           <div class="text-danger"><?=$duePaymentValidation->getError('due_currency')?></div>
						        <?php endif; ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group  pt-4">
								<button class="btn pull-right btn-success ">Record Payment</button>
							</div>
						</div>
					</div>
					</form>
				</div>
			</div>

				<div class="card shadow-lg mt-3">
				<div class="card-header">
					<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
					  <li class="nav-item" role="presentation">
					    <button class="nav-link active" id="pills-home-tab1" data-bs-toggle="pill" data-bs-target="#pills-home1" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Pending Payments</button>
					  </li>
					  <li class="nav-item" role="presentation">
					    <button class="nav-link" id="pills-profile-tab2" data-bs-toggle="pill" data-bs-target="#pills-profilek" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Approved Payments</button>
					  </li>
					</ul>
				</div>
				<div class="card-body">
					<div class="tab-content" id="pills-tabContent">
					  <div class="tab-pane fade show active" id="pills-home1" role="tabpanel" aria-labelledby="pills-home-tab1">
					  	<?php include('partials/tables/single_club_member_pending_due_log.php')?>
					  </div>
					  <div class="tab-pane text-dark fade" id="pills-profilek" role="tabpanel" aria-labelledby="pills-profile-tab2">
					  	<?php include('partials/tables/single_club_member_approved_due_log.php')?>
					  </div>
					</div>
				</div>
			</div>

		</div>

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
					  	<?php include("partials/club_member_profile.php"); ?>
					  </div>
					  <div class="tab-pane text-dark fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
					  	<?php //include('partials/forms/edit_club_member_form.php')?>
					  	<div class="alert alert-warning">
					  		<h1>Editing of Profile Functionality is not available in this version</h1>
					  	</div>
					  </div>
					</div>
				</div>
			</div>
		</div>

	</div>
<?=$this->endSection()?>