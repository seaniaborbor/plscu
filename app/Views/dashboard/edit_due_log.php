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

		</div>

		<div class="col-md-4 pt-2">
			<div class="card">
				<div class="card-body">
					 <?php include("partials/club_member_profile.php"); ?>
				</div>
			</div>
		</div>

	</div>
<?=$this->endSection()?>