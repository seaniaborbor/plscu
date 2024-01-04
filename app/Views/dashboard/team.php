<?php $this->extend('dashboard/partials/layout')?>

<?=$this->section('main')?>
	<div class="row">

		<div class="col-md-8 pt-2">
			<div class="card">
				<div class="card-body">
					<h4 class="text-success mt-2 mb-4">Team Members Profiles</h4>
					<?php include("partials/team_members_profiles.php")?> 
				</div>
			</div>
		</div>

		<div class="col-md-4 pt-2">
			<div class="card shadow-lg border ">
				<div class="card-header bg-success d-flex justify-content-between text-white">
					<h4>Add Team Members</h4>
					<a href="<?=base_url('/dashboard/category')?>" class="btn btn-light" title="Add new category">
						<i class="bi bi-plus"></i> Add Category
					</a>
				</div>
				<div class="card-body">
					<?php include("partials/forms/add_team_member_form.php")?>
				</div>
			</div>
		</div>

	</div>
<?=$this->endSection()?>