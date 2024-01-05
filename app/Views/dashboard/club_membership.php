<?php $this->extend('dashboard/partials/layout')?>

<?=$this->section('main')?>
	<div class="row">

		<div class="col-md-8 pt-2">
			<div class="card">
				<div class="card-header">
					<ul class="nav nav-pills" id="myTab" role="tablist">
						<li class="nav-item" role="presentation">
						    <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Pending Applications</a>
						</li>
						<li class="nav-item" role="presentation">
						    <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Approved Members</a>
						</li>
					</ul>
				</div>
				<div class="card-body">
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
							<?php include('partials/tables/club_member_pending_log_table.php'); ?>
						</div>
						<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
							<?php include('partials/tables/club_member_approve_table.php'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-4 pt-2">
			<div class="card shadow-lg">
				<div class="card-header bg-success d-flex justify-content-between text-white">
					<h4>Register A New Club Member</h4>
				</div>
				<div class="card-body">
					<?php include('partials/forms/club_membership_form.php'); ?>
				</div>
			</div>
		</div>

	</div>
<?=$this->endSection()?>