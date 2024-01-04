<?php $this->extend('dashboard/partials/layout')?>

<?=$this->section('main')?>
	<div class="row">

		<div class="col-md-8 pt-2">
			<div class="card">
				<div class="card-body">
					<h4 class="text-success mt-2 mb-4">Services You Offer</h4> 
					<?php include('partials/services_list.php')?>
				</div>
			</div>
		</div>

		<div class="col-md-4 pt-2">
			<div class="card shadow-lg ">
				<div class="card-header bg-success d-flex justify-content-between text-white">
					<h4>Add a service you offer</h4>
					<button type="button" class="btn btn-light rounded-circle" data-bs-toggle="modal" data-bs-target="#categoryModal">
              <i class="bi bi-question"></i>
            </button>
				</div>
				<div class="card-body">
					<?php include('partials/forms/add_service_form.php')?>
				</div>
			</div>
		</div>

	</div>
<?=$this->endSection()?>