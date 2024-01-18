<?php $this->extend('dashboard/partials/layout')?>

<?=$this->section('main')?>

<div class="row">
	<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Holy guacamole!</strong> Your Report is ready
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<!-- 
	get_all_report_payment_log
total_pending_lrd
total_pending_usd
total_approved_lrd
total_approved_usd

-->

	<div class="col-md-4">
		<table class="table table-hover table-stripped">
			<thead>
				<tr>
				<td>Date</td>
				<td>Transaction Description</td>
				<td>Value</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?=$startingDate." - ".$endingDate?></td>
					<td>Total Liberian Dollars Saved (Pending)</td>
					<td><?=$total_pending_lrd?></td>
				</tr>

				<tr>
					<td><?=$startingDate." - ".$endingDate?></td>
					<td>Total Liberian Dollars Saved (Approved)</td>
					<td><?=$total_approved_lrd?></td>
				</tr>

				<tr>
					<td><?=$startingDate." - ".$endingDate?></td>
					<td>Total United States Dollars Saved (Pending)</td>
					<td><?=$total_pending_usd?></td>
				</tr>

				<tr>
					<td><?=$startingDate." - ".$endingDate?></td>
					<td>Total United States Dollars Saved (Approved)</td>
					<td><?=$total_approved_usd?></td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="col-md-8">
		<ul class="nav nav-pills mb-3  nav-justified" id="pills-tab" role="tablist">
		  <li class="nav-item" role="presentation">
		    <button class="btn-lg nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Financial Statements</button>
		  </li>
		  <li class="nav-item" role="presentation">
		    <button class="btn-lg nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Payments Log</button>
		  </li>
		  <li class="nav-item" role="presentation">
		    <button class="btn-lg nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Individual Payments</button>
		  </li>
		</ul>
		<div class="tab-content" id="pills-tabContent">
		  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
		  </div>
		  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
		 
		  </div>
		  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
		  	<div class="col-12">
		  		
		  	</div>
		  </div>
		</div>
	</div>
</div>

<?=$this->endSection()?>