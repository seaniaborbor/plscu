<div class="row text-dark">
	<h2 class="text-success">Profile of <?=$applicant_data[0]->applicantName?> </h2><hr>
	<div class="col-md-4">
		<img src="<?=base_url('uploads/'.$applicant_data[0]->applicantImg)?>" class="img-fluid w-100">

	</div>
	<div class="col-md-8">
		<table class="table">
			<tr>
				<td>Full Name</td>
				<td><?=$applicant_data[0]->applicantName?></td>
			</tr>
			<tr>
				<td>Applicant Serial </td>
				<td><?=$applicant_data[0]->serial_no?></td>
			</tr>
			<tr>
				<td>Loan Amount</td>
				<td><?=$applicant_data[0]->loanAmount?></td>
			</tr>
			<tr>
				<td>Interest Rate</td>
				<td><?=$applicant_data[0]->interestRate?></td>
			</tr>
			<tr>
				<td>Loan Category</td>
				<td><?=$applicant_data[0]->loanCategory?></td>
			</tr>
			<tr>
				<td>Loan Taken Date</td>
				<td><?=$applicant_data[0]->loanStartDate?></td>
			</tr>
			<tr>
				<td>Payment Deadline</td>
				<td><?=$applicant_data[0]->loanEndDate?></td>
			</tr>
			<tr>
				<td>Profile Last Edited By</td>
				<td><?=$applicant_data[0]->fullName?></td>
			</tr>
			<tr>
				<td>Payment Status</td>
				<td><?=$applicant_data[0]->pmtStatus?></td>
			</tr>

		</table>
		<div class="col-md-12 d-flex justify-content-between">
			<a href="<?=base_url('uploads/'.$applicant_data[0]->loan_aggrement_form)?>" class="btn border-secondary rounded-pill">View Applicant Form</a>
			<a href="#" class="btn border-secondary rounded-pill">Delete This Applicantion</a>
		</div>
		<div class="col-md-12 p-3">
			<div class=" alert alert-danger rounded  shadow-sm">
			<p>Deleting this user will hide and affect all the financial records associated with it. <span class="text-danger">This process is illrevertable</span></p>
		</div>
		</div>
	</div>
	
</div>

<!-- 
	stdClass Object ( [id] => 1 [fullName] => Marie Jolo [gender] => Male [applicantImg] => 1703855165_45be5fdc859e88d364c3.jpg [phone] => 0775577736 [email] => marie@gmail.com [address] => new georgia gulf [mem_serial] => 4 [loanAmount] => 676 [currency] => LRD [loanStartDate] => 2023-12-30 [loanEndDate] => 2023-12-30 [interestRate] => 15 [serial_no] => QFBmqk [loan_aggrement_form] => 1703855165_054707c5b04c3d672397.jpg [regBy] => 1 [lstEdited] => 2023-12-29 23:52:22 [pmtStatus] => complete [passwd] => $2y$10$jRKwxAGx05p0S/IhmCk2KO5TsS2PVrnLSKD81M8pNQjucpuPNpeBa [profession] => CEO, Construction Engineer [fbHandle] => http://facebook.com/tarnuea [xHandle] => [linkinHandle] => [profileImg] => 1703462447_43178a4b72d0f1bb6b33.jpg [createdAt] => 2023-12-24 15:36:34 [applicantName] => Jane Doe )
-->