<form action="<?=base_url('/dashboard/team')?>" method="post" enctype="multipart/form-data">
	<div class="form-group mb-3">
		<label>Team Member Full Name</label>
		<input type="text" name="fullName" value="<?= set_value('fullName')?>" class="form-control" >
		<?php if(isset($validation) && $validation->hasError('fullName')) : ?>
           <div class="text-danger"><?=$validation->getError('fullName')?></div>
        <?php endif; ?>
	</div>

	<div class="form-group mb-3">
		<label>Email Address</label>
		<input type="email" name="email" value="<?= set_value('email')?>" class="form-control" >
		<?php if(isset($validation) && $validation->hasError('email')) : ?>
           <div class="text-danger"><?=$validation->getError('email')?></div>
        <?php endif; ?>
	</div>

	<div class="form-group mb-3">
		<label>Profession (seperate each with a comma)</label>
		<input type="text" name="profession" value="<?= set_value('profession')?>" class="form-control" >
		<?php if(isset($validation) && $validation->hasError('profession')) : ?>
           <div class="text-danger"><?=$validation->getError('profession')?></div>
        <?php endif; ?>
	</div>

	<div class="form-group mb-3">
		<label>Profile Image</label>
		<input type="file" name="profileImg"  class="form-control" >
		<?php if(isset($validation) && $validation->hasError('profileImg')) : ?>
           <div class="text-danger"><?=$validation->getError('profileImg')?></div>
        <?php endif; ?>
	</div>

	<div class="form-group mb-3">
		<label>Facebook Handle</label>
		<input type="url" name="fbHandle" value="<?= set_value('fbHandle')?>"  class="form-control" >
		<?php if(isset($validation) && $validation->hasError('fbHandle')) : ?>
           <div class="text-danger"><?=$validation->getError('fbHandle')?></div>
        <?php endif; ?>
	</div>

	<div class="form-group mb-3">
		<label>Twitter Handle</label>
		<input type="url" name="xHandle" value="<?= set_value('xHandle')?>"  class="form-control" >
		<?php if(isset($validation) && $validation->hasError('xHandle')) : ?>
           <div class="text-danger"><?=$validation->getError('xHandle')?></div>
        <?php endif; ?>
	</div>

	<div class="form-group mb-3">
		<label>LinkIn Handle</label>
		<input type="url" name="linkinHandle" value="<?= set_value('linkinHandle')?>"  class="form-control" >
		<?php if(isset($validation) && $validation->hasError('linkinHandle')) : ?>
           <div class="text-danger"><?=$validation->getError('linkinHandle')?></div>
        <?php endif; ?>
	</div>


	<div class="form-group mb-3">
		<button class="btn btn-success">Add Team Member</button>
	</div>
</form>