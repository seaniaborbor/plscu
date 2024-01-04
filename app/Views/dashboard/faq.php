<?php $this->extend('dashboard/partials/layout')?>

<?=$this->section('main')?>
	<div class="row">

		<div class="col-md-8 pt-2">
			<div class="card">
				<div class="card-body">
					<?php include("partials/faq_accordion.php")?> 
				</div>
			</div>
		</div>

		<div class="col-md-4 pt-2">
			<div class="card shadow-lg ">
				<div class="card-header bg-success d-flex justify-content-between text-white">
					<h4>Answer a frequently asked question</h4>
				</div>
				<div class="card-body">
					<?php include('partials/forms/add_faq_form.php')?>
				</div>
			</div>
		</div>

	</div>
<?=$this->endSection()?>