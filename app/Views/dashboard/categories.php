<?php $this->extend('dashboard/partials/layout')?>

<?=$this->section('main')?>
	<div class="row">

		<div class="col-md-8 pt-2">
			<div class="card">
				<div class="card-body">
					  <h4 class="text-success mb-3 mt-3">Categories</h4>
					<?php include('partials/tables/categories_table.php')?>
				</div>
			</div>
		</div>

		<div class="col-md-4 pt-2">
			<div class="card shadow-lg border border-success border-5">
				<div class="card-header bg-success d-flex justify-content-between text-white">
					<h4>Add Post Category</h4>
				</div>
				<div class="card-body">
					<?php include('partials/forms/add_category_form.php')?>
				</div>
			</div>
		</div>

	</div>
<?=$this->endSection()?>