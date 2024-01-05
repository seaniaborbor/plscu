
<div class="row text-dark">
	<h2 class="text-success">Club Member Profile</h2><hr>
<?php //print_r($member_profile); ?>

	<div class="col-md-4 text-center">
		<img src="<?=base_url('uploads/'.$member_profile[0]->profileImg)?>" class="w-100 rounded-circle img-thumbnail img-fluid">
		 <?php if($userData['userRole'] == "SUDO") : ?>
				<a href="<?=base_url('dashboard/approve/membership/'.$member_profile[0]->memberSerialNo)?>" class="btn btn-light shadow-lg w-100  border-secondary rounded-pill btn-lg mt-2 ">Approve Account</a>
		 <?php endif; ?>
	</div>
	<div class="col-md-8">
		<table class="table">
			<tr>
				<td>Name</td>
				<td><?=$member_profile[0]->fullName?></td>
			</tr>
			<tr>
				<td>Gender</td>
				<td><?=$member_profile[0]->gender?></td>
			</tr>
			<tr>
				<td>Contact</td>
				<td><?=$member_profile[0]->phone?></td>
			</tr>
			<tr>
				<td>Address</td>
				<td><?=$member_profile[0]->address?></td>
			</tr>
			<tr>
				<td>Membership Type</td>
				<td><?=$member_profile[0]->membership_category?></td>
			</tr>
			<tr>
				<td>Account Serial</td>
				<td><?=$member_profile[0]->memberSerialNo?></td>
			</tr>
			<tr>
				<td>Registration Payment Status</td>
				<td><?=$member_profile[0]->regFeesStatus?></td>
			</tr>
			<tr>
				<td>Account Status</td>
				<td><?=$member_profile[0]->accountStatus?></td>
			</tr>
			<tr>
				<td>Amount/Deposit</td>
				<td><?=$member_profile[0]->deposite_unit?></td>
			</tr>
			<tr>
				<td>Account Currency</td>
				<td><?=$member_profile[0]->currency?></td>
			</tr>
			<tr>
				<td>Account Submitted By:</td>
				<td><?=$member_profile[0]->agentName?></td>
			</tr>
		</table>
		<br>

		<!-- 
			Array ( [0] => stdClass Object ( [id] => 3 [fullName] => Mark Angel [email] => working@gmail.com [passwd] => $2y$10$hHnWv2QTGSFLkhTCvGfIduhsmyT30egxSeLZF6YfCPMi1D8lTZ7Vu [profession] => Chairman, Board of Director [fbHandle] => http://facebook.com/tarnuea [xHandle] => [linkinHandle] => [profileImg] => 1704101935_228b8ba3f32acda05118.jpg [createdAt] => 2023-12-24 15:36:34 [gender] => Male [dob] => 2024-01-18 [membership_category] => OSM [memberSerialNo] => EHPq30 [phone] => 0775588736 [address] => clara Town Monrovia Liberia [deposite_unit] => 40000.00 [currency] => LRD [regFees] => 45000.00 [regFeesStatus] => Incomplete [accountStatus] => Pending [saving_year] => 2024-01-01 [updated_at] => 2024-01-01 01:39:18 [registeredBy] => 1 [agentName] => Tamba Bundor [memBerpic] => 1704101935_228b8ba3f32acda05118.jpg ) )
		-->
		<a href="" class="btn btn-success  btn-sm">View Applicant Form</a>
		<a href="#" class=" btn-sm btn btn-danger rounded">Delete Application</a>
		<div class=" alert alert-warning rounded  shadow-sm">
			<p>Deleting this user will hide and affect all the financial records associated with it. <span class="text-danger">This process is illrevertable</span></p>
		</div>
	</div>
</div>
