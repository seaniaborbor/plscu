<?php $this->extend('dashboard/partials/layout')?>

<?=$this->section('main')?>
	<div class="row">

		<div class="col-md-8 pt-2">
			<div class="card">
				<div class="card-header">
					<h4 class="text-success mt-2 mb-4">Edit Service Form</h4> 
				</div>
				<div class="card-body">
					<?php include('partials/forms/edit_service_form.php')?>
				</div>
			</div>
		</div>

		<div class="col-md-4 pt-2">
			<div class="card shadow-lg ">
				<div class="card-header bg-success d-flex justify-content-between text-white">
					<h4>Service Summary</h4>
					<button type="button" class="btn btn-light rounded-circle" data-bs-toggle="modal" data-bs-target="#categoryModal">
              <i class="bi bi-question"></i>
            </button>
				</div>
				<div class="card-body">
					<div class="mb-3">
						<h3>Service Name</h3>
						<p><?=$a_service_data['service_name']?></p>
					</div>
					<div class="mb-3">
						<h3>Service Summary</h3>
						<p><?=$a_service_data['service_summary']?></p>
					</div>
					<div class="mb-3">
						<h3>Service Detail</h3>
						<p><?=$a_service_data['service_detail']?></p>
					</div>
					<div class="mb-3">
						<h3>Service Icon</h3>
						<p class="display-4 text-success"><i class="bi <?=$a_service_data['service_icon']?>"></i></p>
					</div>
				</div>
			</div>
		</div>

	</div>
<?=$this->endSection()?>