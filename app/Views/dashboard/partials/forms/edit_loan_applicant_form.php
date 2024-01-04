<h2 class="text-success">Edit the profile of <?=$client_profile[0]->applicantName?></h2>
<form action="<?=base_url('dashboard/edit/loanmanager/'.$client_profile[0]->serial_no)?>" method="post" enctype="multipart/form-data" class="text-dark shadow-sm m-2">


	<div class="form-group mb-3">
		<label>Contact</label>
		<input type="tel" name="phone" value="<?= set_value('phone')?>"  class="form-control" >
		<?php if(isset($validation) && $validation->hasError('phone')) : ?>
           <div class="text-danger"><?=$validation->getError('phone')?></div>
        <?php endif; ?>
	</div>

	<div class="form-group mb-3">
		<label>Email</label>
		<input type="email" name="email" value="<?= set_value('email')?>"  class="form-control" >
		<?php if(isset($validation) && $validation->hasError('email')) : ?>
           <div class="text-danger"><?=$validation->getError('email')?></div>
        <?php endif; ?>
	</div>

	<div class="form-group mb-3">
		<label>Current Address</label>
		<input type="text" name="address" value="<?= set_value('address')?>"  class="form-control" >
		<?php if(isset($validation) && $validation->hasError('address')) : ?>
           <div class="text-danger"><?=$validation->getError('address')?></div>
        <?php endif; ?>
	</div>


	<div class="form-group mb-3">
		<button class="btn btn-success">Update Applicant Profile</button>
	</div>
</form>

	<div class="col-md-12 p-3">
		<div class=" alert alert-warning rounded  shadow-sm">
		<p>Only the information above of the applicant can be edited. <span class="text-danger">This is for security reason</span></p>
	</div>
	</div>