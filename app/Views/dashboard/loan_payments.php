<?php $this->extend('dashboard/partials/layout')?>

<?=$this->section('main')?>

	<div class="row">

		<div class="col-md-8 pt-2">
			<div class="card">
				<div class="card-header">
					<ul class="nav nav-pills" id="myTab" role="tablist">
						<li class="nav-item" role="presentation">
						    <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Pending Loan Payment Log</a>
						</li>
						<li class="nav-item" role="presentation">
						    <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Approved Loan Payment Log</a>
						</li>
					</ul>
				</div>
				<div class="card-body">
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane text-dark fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
							<div class="text-dark">
								<?php 
								  include('partials/tables/all_pending_loan_payments_log.php');
							 	?>
							</div>
						</div>
						<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
							<?php 
								include('partials/tables/app_approved_loan_payments_log.php');
							 ?>
						</div>
					</div>


				</div>
			</div>
		</div>

		<div class="col-md-4 pt-2">
			<?php include('partials/forms/loan_payment_form.php'); ?>
		</div>

	</div>
<?=$this->endSection()?>