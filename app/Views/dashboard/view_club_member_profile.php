<?php $this->extend('dashboard/partials/layout')?>

<?=$this->section('main')?>
	<div class="row">
		
		<div class="col-md-8 pt-2">

			<?php if(isset($member_profile) && !empty($member_profile) && $member_profile[0]->accountStatus == 'Approved'){
				?>

					<div class="row mb-4">
						<div class="col-md-6">
							<div class="card rounded-0 shadow-lg">
								<div class="card-body mb-0 p-0">
									<div class="row align-item-center">
									<div class="col-4 text-center">
										<div class="alert alert-success mb-0">
											<h1 class="display-1 text-success"><i class="bi bi-currency-dollar"></i></h1>
										</div>
									</div>
									<div class="col-8">
										<h1><?=$a_member_total_approved_amt->total_paid?></h1>
										<h3>Total Amount Saved</h3>
									</div>
									</div>
								</div>
							</div>
						</div>
						<?php //print_r($member_profile); exit(); ?>
						<div class="col-md-6">
							<div class="card border-2 rounded-0 shadow-lg">
								<div class="card-body mb-0 p-0">
									<div class="row align-item-center">
									<div class="col-4 text-center">
										<div class="alert alert-danger mb-0">
											<h1 class="display-1 "><i class="bi bi-currency-dollar"></i></h1>
										</div>
									</div>
									<div class="col-8">
										<h1><?=$a_member_total_pending_amt->total_paid?></h1>
										<h3 >Total Amount Pending <br> <span class="text-danger spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> <span class="spinner-grow spinner-grow-sm text-danger" role="status" aria-hidden="true"></span></h3>
									</div>
									</div>
								</div>
							</div>
						</div>
					</div>

			<div class="card shadow-lg">
				<div class="card-header">
					<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
					  <li class="nav-item" role="presentation">
					    <button class="nav-link active" id="pills-home-tab1" data-bs-toggle="pill" data-bs-target="#pills-home1" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Pending Payments</button>
					  </li>
					  <li class="nav-item" role="presentation">
					    <button class="nav-link" id="pills-profile-tab2" data-bs-toggle="pill" data-bs-target="#pills-profilek" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Approved Payments</button>
					  </li>
					</ul>
				</div>
				<div class="card-body">
					<div class="tab-content" id="pills-tabContent">
					  <div class="tab-pane fade show active" id="pills-home1" role="tabpanel" aria-labelledby="pills-home-tab1">
					  	<?php include('partials/tables/single_club_member_pending_due_log.php')?>
					  </div>
					  <div class="tab-pane text-dark fade" id="pills-profilek" role="tabpanel" aria-labelledby="pills-profile-tab2">
					  	<?php include('partials/tables/single_club_member_approved_due_log.php')?>
					  </div>
					</div>
				</div>
			</div>

				<?php 
			}else{
				?>

				<div class="alert alert-warning alert-dismissible fade show" role="alert">
				  <h1>
					<strong>Please Wait a while</strong>
					<div class="spinner-grow text-danger" role="status">
						  <span class="visually-hidden">Loading...</span>
						</div>
					<div class="spinner-grow text-warning" role="status">
						  <span class="visually-hidden">Loading...</span>
						</div>
				</h1>
					</strong> This account is under review by the CEO/Admin for approvial.
				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>

				<?php 
			}
			?>
			

		</div>

		<div class="col-md-4 pt-2">
			<div class="card shadow-lg">
				<div class="card-header">
					<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
					  <li class="nav-item" role="presentation">
					    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Applicant Profile</button>
					  </li>
					  <li class="nav-item" role="presentation">
					    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Edit Application</button>
					  </li>
					</ul>
				</div>
				<div class="card-body">
					<div class="tab-content" id="pills-tabContent">
					  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
					  	<div class="card ">
					  		<div class="card-header text-dark">
			  					<h5 class="text-dark shadow-sm">Club Member Profile</h5>
					  		</div>
					  		<div class="card-body">
							  	<?php include("partials/club_member_profile.php"); ?>					  			
					  		</div>
					  	</div>
					  </div>
					  <div class="tab-pane text-dark fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

					  	<?php if($userData['userRole'] == 'SUDO'){
					  		include('partials/forms/approve_club_member_form.php');
					  	}else{
					  		?>
					  			<div class="card border bordered shadow-lg border-danger border-2">
					  				<div class="card-header bg-danger text-center">
					  					<h4 class="text-white"><i class="bi bi-exclimation "></i>Warning</h4>
					  				</div>
					  				<div class="card-body">
					  					<p>Your account do not have the previllage to approve any applicant</p>
					  				</div>
					  			</div>
					  		<?php 
					  	}
					  	 ?>

					  </div>
					</div>
				</div>
			</div>
		</div>

	</div>
<?=$this->endSection()?>