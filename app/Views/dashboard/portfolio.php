<?php $this->extend('dashboard/partials/layout')?>

<?=$this->section('main')?>
	<div class="row">

		<div class="col-md-8 pt-2">
			<div class="card">
				<div class="card-body">
					<h4 class="text-success mt-2 mb-4">Portfolio Post Log</h4> 
					<?php include('partials/tables/portfolio_table.php')?>
				</div>
			</div>
		</div>

		<div class="col-md-4 pt-2">
			<div class="card shadow-lg ">
				<div class="card-header bg-success d-flex justify-content-between text-white">
					<h4>Add to portfolio</h4>
					<a href="<?=base_url('/dashboard/category')?>" class="btn btn-light" title="Add new category">
						<i class="bi bi-plus"></i> Add Category
					</a>
				</div>
				<div class="card-body">
					<?php include('partials/forms/add_to_porfolio_form.php')?>
				</div>
			</div>
		</div>

	</div>
<?=$this->endSection()?>