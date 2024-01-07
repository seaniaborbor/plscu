<div class="card">
	<div class="card-header text-dark"><h5>Approve</h5></div>
	<div class="card-body">
		<div class="alert alert-primary">
			<p>If you've read through the application of this applicant and you wish to approve. Please fill out this form below and smash the approve loan button to <b>approve</b> NOTE: This cannot be undone</p>
		</div>
		<form class="text-dark" method="post" action="<?=base_url('dashboard/loanmanager/approve/'.$applicant_data[0]->serial_no)?>">
			<div class="form-group mb-3">
			    <label>Date on which loan is given out</label>
					<input type="date" name="loanStartDate" value="<?= set_value('loanStartDate')?>"  class="form-control" >
			    <?php if (isset($validation) && $validation->hasError('loanStartDate')) : ?>
			        <div class="text-danger"><?= $validation->getError('loanStartDate') ?></div>
			    <?php endif; ?>
			</div>

			<div class="form-group mb-3">
			    <label>Date on which loan ends</label>
					<input type="date" name="loanEndDate" value="<?= set_value('loanEndDate')?>"  class="form-control" >
			    <?php if (isset($validation) && $validation->hasError('loanEndDate')) : ?>
			        <div class="text-danger"><?= $validation->getError('loanEndDate') ?></div>
			    <?php endif; ?>
			</div>

			<div class="form-group mb-3">
				<label>Approve Status</label>
				<select class="form-control" name="approv_status" >
					<option value="">Choose</option>
					<option <?=set_select('approv_status', 'Approved')?> value="Approved">Approved</option>
				</select>
				<?php if(isset($validation) && $validation->hasError('approv_status')) : ?>
			       <div class="text-danger"><?=$validation->getError('approv_status')?></div>
			    <?php endif; ?>
			</div>

			<div>
				<button class="btn  btn-success ">Approve Loan</button>
			</div>
		</form>
	</div>
</div>

<div class="card mt-4">
	<div class="card-header text-dark"><h5>Payment Status</h5></div>
	<div class="card-body">
		<div class="alert alert-primary">
			<p>Modify the payment status of this loan such as completed, overdue or wave depending what it's.</p>
		</div>
		<div class="form-group mb-3">
			<form method="post" action="<?=base_url('/dashboard/loanmanager/update_status/'.$applicant_data[0]->serial_no)?>">
				<label>Loan Payment Status</label>
				<select class="form-control" name="pmtStatus" >
					<option value="">Choose</option>
					<option <?=set_select('pmtStatus', 'In-Progress')?> value="In-Progress">In-Progress</option>
					<option <?=set_select('pmtStatus', 'Completed')?> value="Completed">Completed</option>
					<option <?=set_select('pmtStatus', 'Over Due')?> value="Over Due">Over Due</option>
				</select>
				<?php if(isset($validation) && $validation->hasError('pmtStatus')) : ?>
			       <div class="text-danger"><?=$validation->getError('pmtStatus')?></div>
			    <?php endif; ?>
			    <button>Update Payment Status</button>
			</form>
		</div>
	</div>
</div>