<?php $this->extend('dashboard/partials/layout')?>

<?=$this->section('main')?>
	<div class="row">

		<div class="col-md-8 pt-2">
			<div class="card">
				<div class="card-header">
					<h4 class="text-success mt-2 mb-4">Due/Saving Log</h4>
				</div>
				<div class="card-body">
					<?php 

					?>	

					<ul class="nav nav-pills" id="myTab" role="tablist">
						<li class="nav-item" role="presentation">
						    <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Pending Due Payment Log</a>
						</li>
						<li class="nav-item" role="presentation">
						    <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Approved Due Payment Log</a>
						</li>
					</ul>
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
							<?php 
								include('partials/tables/pending_due_log_table.php');
							 ?>
						</div>
						<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
							<?php 
								include('partials/tables/approve_due_log_table.php');
							 ?>
						</div>
					</div>


				</div>
			</div>
		</div>

		<div class="col-md-4 pt-2">
			<div class="card shadow-lg">
				<div class="card-header bg-success d-flex justify-content-between text-white">
					<h4>Log a due/saving </h4>
				</div>
				<div class="card-body">
										<form method="post" action="<?=base_url('dashboard/club_due_management')?>">
						<div class="row align-items-center">
						<div class="col-12">
							<div class="form-group">
								<label>Member Serial </label>
								<input type="text" value="<?= set_value('mem_serial_no')?>" name="mem_serial_no" class=" form-control">
								<?php if(isset($duePaymentValidation) && $duePaymentValidation->hasError('mem_serial_no')) : ?>
						           <div class="text-danger"><?=$duePaymentValidation->getError('mem_serial_no')?></div>
						        <?php endif; ?>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label>Amount</label>
								<input type="number" value="<?= set_value('due_amount')?>" min='0' name="due_amount" class=" form-control">
								<?php if(isset($duePaymentValidation) && $duePaymentValidation->hasError('due_amount')) : ?>
						           <div class="text-danger"><?=$duePaymentValidation->getError('due_amount')?></div>
						        <?php endif; ?>
							</div>
						</div>
						<div class="col-12">
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
						<div class="col-3">
							<div class="form-group  pt-4">
								<button class="btn pull-right w-100 btn-success ">Record Payment</button>
							</div>
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>

	</div>
<?=$this->endSection()?>