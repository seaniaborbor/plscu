
<form class="text-dark">
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
			<option <?=set_select('approv_status', 'Approved')?> value="Coliteral">Approved</option>
			<option <?=set_select('approv_status', 'Pending')?> value="Agricultural">Pend</option>
		</select>
		<?php if(isset($validation) && $validation->hasError('approv_status')) : ?>
	       <div class="text-danger"><?=$validation->getError('approv_status')?></div>
	    <?php endif; ?>
	</div>

	<div class="form-group mb-3">
		<label>Loan Status</label>
		<select class="form-control" name="pmtStatus" >
			<option value="">Choose</option>
			<option <?=set_select('pmtStatus', 'Incomplete')?> value="Coliteral">Completed</option>
			<option <?=set_select('pmtStatus', 'Completed')?> value="Agricultural">In Progess</option>
		</select>
		<?php if(isset($validation) && $validation->hasError('pmtStatus')) : ?>
	       <div class="text-danger"><?=$validation->getError('pmtStatus')?></div>
	    <?php endif; ?>
	</div>
	<div>
		<button class="btn  btn-success ">Approve Loan</button>
	</div>
</form>