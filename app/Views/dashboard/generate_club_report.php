<?php $this->extend('dashboard/partials/layout')?>

<?=$this->section('main')?>

<div class="row">
	<div class="col-md-12">
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