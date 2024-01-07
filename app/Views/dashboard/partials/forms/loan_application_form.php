<form action="<?=base_url('/dashboard/loan_membership')?>" method="post" enctype="multipart/form-data">

	<div class="form-group mb-3">
		<label>Full Name</label>
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
		<label>Applicant Passport Size Image</label>
		<input type="file" name="applicantImg"  class="form-control" >
		<?php if(isset($validation) && $validation->hasError('applicantImg')) : ?>
           <div class="text-danger"><?=$validation->getError('applicantImg')?></div>
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
		<label>Loan Category</label>
		<select class="form-control" name="currency" >
			<option value="">Choose</option>
			<option <?=set_select('loanCategory', 'LRD')?> value="Coliteral">Coliteral</option>
			<option <?=set_select('loanCategory', 'USD')?> value="Agricultural">Agrocultural Loan</option>
		</select>
		<?php if(isset($validation) && $validation->hasError('loanCategory')) : ?>
	       <div class="text-danger"><?=$validation->getError('loanCategory')?></div>
	    <?php endif; ?>
	</div>

	<div class="form-group mb-3">
		<label>Amount of loant </label>
		<input type="number" name="loanAmount" value="<?= set_value('loanAmount')?>"  class="form-control" >
		<?php if(isset($validation) && $validation->hasError('loanAmount')) : ?>
           <div class="text-danger"><?=$validation->getError('loanAmount')?></div>
        <?php endif; ?>
	</div>


	<div class="form-group mb-3">
		<label>Loan Currency</label>
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
		<label>Interest rate enter 10, 15, 20 etc. <span class="text-danger">Don't enter the interenst in percent</span></label>
		<input type="number" name="interestRate" value="<?= set_value('interestRate')?>"  class="form-control" >
		<?php if(isset($validation) && $validation->hasError('interestRate')) : ?>
           <div class="text-danger"><?=$validation->getError('interestRate')?></div>
        <?php endif; ?>
	</div>

	<div class="form-group mb-3">
		<label>Attach loan application agreement form</label>
		<input type="file" name="loan_aggrement_form"  class="form-control" >
		<?php if(isset($validation) && $validation->hasError('loan_aggrement_form')) : ?>
           <div class="text-danger"><?=$validation->getError('loan_aggrement_form')?></div>
        <?php endif; ?>
	</div>


	<div class="form-group mb-3">
		<button class="btn btn-success">Submit Form</button>
	</div>
</form>