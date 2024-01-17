<?php $this->extend('dashboard/partials/layout')?>

<?=$this->section('main')?>

<div class="row">
	<div class="col-md-12">
		<ul class="nav nav-pills mb-3  nav-justified" id="pills-tab" role="tablist">
		  <li class="nav-item" role="presentation">
		    <button class="btn-lg nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Home</button>
		  </li>
		  <li class="nav-item" role="presentation">
		    <button class="btn-lg nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Payments Log</button>
		  </li>
		  <li class="nav-item" role="presentation">
		    <button class="btn-lg nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</button>
		  </li>
		</ul>
		<div class="tab-content" id="pills-tabContent">
		  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
		  	<?php include('partials/loan_report/_transaction_summary.php');?>
		  </div>
		  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
		  	<div class="row align-items-center">
		  		<div class="col-md-9">
		  			<div class="card">
		  				<div class="card-body">
		  					<?php include('partials/loan_report/_payment_log.php'); ?>
		  				</div>
		  			</div>
		  		</div>
		  		<div class="col-3">
		  			<div class="card border border-3 border-success">
		  				<div class="card-body text-center">
		  					<h3>Total Transaction Made</h3>
		  					<h1 class="display-1 text-success "><?=count($all_loan_payment_table)?></h1>
		  				</div>
		  				<div class="card-footer bg-success text-white">
		  					<p>The above figure shows the total number of approve financial tranaction made relative to loan transactions</p>
		  				</div>
		  			</div>
		  		</div>
		  	</div>
		  </div>
		  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
		  	<div class="col-12">
		  		<?php include("partials/loan_report/_payment_by_individuals_summary.php"); ?>
		  	</div>
		  </div>
		</div>
	</div>
</div>

<?=$this->endSection()?>