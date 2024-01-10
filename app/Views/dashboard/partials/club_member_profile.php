
<div class="row text-dark">
<?php //print_r($member_profile); ?>

	<div class="col-md-4 text-center">
		<img src="<?=base_url('uploads/'.$member_profile[0]->profileImg)?>" class="w-100  img-thumbnail img-fluid">
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
		<a href="<?=base_url('uploads/'.$member_profile[0]->application_form)?>" class="btn border-secondary ">View Applicant Form</a>
		<a href="<?=base_url('/dashboard/delete/membership/'.$member_profile[0]->id)?>" class="btn border-secondary rounded-pill">Delete Application</a>
		<div class=" mt-3 alert alert-warning rounded  shadow-sm">
			<p>Deleting this user will hide and affect all the financial records associated with it. <span class="text-danger">This process is illrevertable</span></p>
		</div>
	</div>
</div>
