<form class="text-dark" action="<?=base_url('/dashboard/membership')?>" method="post" enctype="multipart/form-data">

	<div class="form-group mb-3">
		<label>Member Full Name</label>
		<input type="text" name="fullName" value="<?= set_value('fullName')?>" class="form-control" >
		<?php if(isset($validation) && $validation->hasError('fullName')) : ?>
           <div class="text-danger"><?=$validation->getError('fullName')?></div>
        <?php endif; ?>
	</div>

	 <div class="form-group mb-3">
        <label>Gender</label>
        <select class="form-control" name="gender">
            <option value="">Choose</option>
            <option <?= set_select('gender', 'Male') ?> value="Male">Male</option>
            <option <?= set_select('gender', 'Female') ?> value="Female">Female</option>
            <option <?= set_select('gender', 'Rather Not Say') ?> value="Rather Not Say">Rather Not Say</option>
        </select>
        <?php if (isset($validation) && $validation->hasError('gender')) : ?>
            <div class="text-danger"><?= $validation->getError('gender') ?></div>
        <?php endif; ?>
    </div>

	<div class="form-group mb-3">
		<label>Date of Birth</label>
		<input type="date" name="dob" value="<?= set_value('dob')?>" class="form-control" >
		<?php if(isset($validation) && $validation->hasError('dob')) : ?>
           <div class="text-danger"><?=$validation->getError('dob')?></div>
        <?php endif; ?>
	</div>

	<div class="form-group mb-3">
		<label>Membership Category</label>
		<select class="form-control" name="membership_category" >
			<option  value="">Choose</option>
			<option <?=set_select('membership_category', 'FFM')?> value="FFM">Fouding & Funding Members</option>
			<option <?=set_select('membership_category', 'FRM')?> value="FRM">Regular Registered Member</option>
			<option <?=set_select('membership_category', 'OSM')?> value="OSM">Only Saving Member</option>
		</select>
		<?php if(isset($validation) && $validation->hasError('membership_category')) : ?>
           <div class="text-danger"><?=$validation->getError('membership_category')?></div>
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
		<label>Amount Per Saving</label>
		<input type="number" name="deposite_unit" value="<?= set_value('deposite_unit')?>"  class="form-control" >
		<?php if(isset($validation) && $validation->hasError('deposite_unit')) : ?>
           <div class="text-danger"><?=$validation->getError('deposite_unit')?></div>
        <?php endif; ?>
	</div>

	<div class="form-group mb-3">
		<label>Currency</label>
		<select class="form-control" name="currency" >
			<option value="">Choose</option>
			<option <?=set_select('currency', 'LRD')?> value="LRD">Liberian Dollars</option>
			<option <?=set_select('currency', 'USD')?> value="USD">United States Dollars</option>
		</select>
		<?php if(isset($validation) && $validation->hasError('currency')) : ?>
           <div class="text-danger"><?=$validation->getError('currency')?></div>
        <?php endif; ?>
	</div>

	<div class="form-group mb-3">
		<label>Registration Fees </label>
		<input type="number" name="regFees" value="<?= set_value('regFees')?>"  class="form-control" >
		<?php if(isset($validation) && $validation->hasError('regFees')) : ?>
           <div class="text-danger"><?=$validation->getError('regFees')?></div>
        <?php endif; ?>
	</div>

	<div class="form-group mb-3">
    <label>Registration Requirement Fees Payment Status</label>
    <select class="form-control" name="regFeesStatus">
        <option value="">Choose</option>
        <option <?= set_select('regFeesStatus', 'Complete') ?> value="Complete">Not paid in full</option>
        <option <?= set_select('regFeesStatus', 'Incomplete') ?> value="Incomplete">Paid in full</option>
    </select>
    <?php if (isset($validation) && $validation->hasError('regFeesStatus')) : ?>
        <div class="text-danger"><?= $validation->getError('regFeesStatus') ?></div>
    <?php endif; ?>
</div>


	<div class="form-group mb-3">
    <label>Account Activation Status</label>
    <select class="form-control" name="accountStatus">
        <option value="">Choose</option>
        <option <?= set_select('accountStatus', 'Active') ?> value="Active">Active</option>
        <option <?= set_select('accountStatus', 'Deactivated') ?> value="Deactivated">Deactivated</option>
    </select>
    <?php if (isset($validation) && $validation->hasError('accountStatus')) : ?>
        <div class="text-danger"><?= $validation->getError('accountStatus') ?></div>
    <?php endif; ?>
</div>


	<div class="form-group mb-3">
		<label>Saving Year</label>
		<input type="date" name="saving_year" value="<?= set_value('saving_year')?>"  class="form-control" >
		<?php if(isset($validation) && $validation->hasError('saving_year')) : ?>
           <div class="text-danger"><?=$validation->getError('saving_year')?></div>
        <?php endif; ?>
	</div>


	<div class="form-group mb-3">
		<button class="btn btn-success">Submit Form</button>
	</div>
</form>