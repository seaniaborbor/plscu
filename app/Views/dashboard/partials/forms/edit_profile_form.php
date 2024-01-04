<form action="<?=base_url('/dashboard/edit/team/'.$team_data['id'])?>" method="post" enctype="multipart/form-data">
	<div class="form-group mb-3">
		<label>Team Member Full Name</label>
		<input type="text" name="fullName" value="<?=$team_data['fullName']?>" class="form-control" >
		<?php if(isset($validation) && $validation->hasError('fullName')) : ?>
           <div class="text-danger"><?=$validation->getError('fullName')?></div>
        <?php endif; ?>
	</div>

	<div class="form-group mb-3">
		<label>Email Address(This can't be changed)</label>
		<input type="email" name="email" value="<?=$team_data['email']?>" class="form-control" disabled>
		<?php if(isset($validation) && $validation->hasError('email')) : ?>
           <div class="text-danger"><?=$validation->getError('email')?></div>
        <?php endif; ?>
	</div>

	<div class="form-group mb-3">
		<label>Enter Old Password(<span class="text-danger">Security Reason</span>)</label>
		<input type="password" name="passwdOld" value="<?=set_value('passwdOld')?>" class="form-control" >
		<?php if(isset($validation) && $validation->hasError('passwdOld')) : ?>
           <div class="text-danger"><?=$validation->getError('passwdOld')?></div>
        <?php endif; ?>
	</div>

	<div class="form-group mb-3">
		<label>New Password Password (<span class="text-danger">If you don't wish to change it, enter the one here</span>)</label>
		<input type="password" name="passwd" value="<?=set_value('passwd')?>" class="form-control" >
		<?php if(isset($validation) && $validation->hasError('passwd')) : ?>
           <div class="text-danger"><?=$validation->getError('passwd')?></div>
        <?php endif; ?>
	</div>

	<div class="form-group mb-3">
		<label>Profession (seperate each with a comma)</label>
		<input type="text" name="profession" value="<?=$team_data['profession']?>" class="form-control" >
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
		<input type="url" name="fbHandle" value="<?=$team_data['fbHandle']?>"  class="form-control" >
		<?php if(isset($validation) && $validation->hasError('fbHandle')) : ?>
           <div class="text-danger"><?=$validation->getError('fbHandle')?></div>
        <?php endif; ?>
	</div>

	<div class="form-group mb-3">
		<label>Twitter Handle</label>
		<input type="url" name="xHandle" value="<?=$team_data['xHandle']?>"  class="form-control" >
		<?php if(isset($validation) && $validation->hasError('xHandle')) : ?>
           <div class="text-danger"><?=$validation->getError('xHandle')?></div>
        <?php endif; ?>
	</div>

	<div class="form-group mb-3">
		<label>LinkIn Handle</label>
		<input type="url" name="linkinHandle" value="<?=$team_data['linkinHandle']?>"  class="form-control" >
		<?php if(isset($validation) && $validation->hasError('linkinHandle')) : ?>
           <div class="text-danger"><?=$validation->getError('linkinHandle')?></div>
        <?php endif; ?>
	</div>


	<div class="form-group mb-3">
		<button class="btn btn-success">Update Profile</button>
	</div>
</form>