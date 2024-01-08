<?php $this->extend('dashboard/partials/layout')?>

<?=$this->section('main')?>
	<div class="row">

		<div class="col-md-8 pt-2">
			<div class="card">
				<div class="card shadow-lg ">
				<div class="card-header bg-success d-flex justify-content-between text-white">
					<h4><span class="text-warning">EDIT: </span><?=$team_data['fullName']?>'s Profile</h4>
				</div>
				<div class="card-body">
					<?php include('partials/forms/edit_profile_form.php')?>
				</div>
			</div>
			</div>
		</div>

		<div class="col-md-4 pt-2">
			<div class="card rounded">
					<div class="card-header">
						<h3>Your Current Profile</h3>
					</div>
					<div class="card-body">
						<div class="mx-5 rounded" style="height:350px; 
						background-image: url(<?=base_url('uploads/'.$team_data['profileImg'])?>);
						background-position: top;
						background-size: cover;
					" >
							
						</div>
					</div>
					<div class="card-footer">
						<div class="row text-center">
							<div class="col-12">
								<h5 class="mb-0"><?=$team_data['fullName']?></h5>
								<p class="text-dark mt-0"><i><?=$team_data['profession']?></i></p>
							</div>
						</div>
						<div class="row px-5 justify-content-around d-flex mb-3">
							<div class="col-3">
								<a class="btn btn-primary rounded-circle" target="blank" href="<?=$team_data['fbHandle']?>">
									<i class="bi bi-facebook"></i>
								</a>
							</div>
							<div class="col-3">
								<a class="btn btn-success rounded-circle" target="blank" href="<?=$team_data['xHandle']?>">
									<i class="bi bi-twitter"></i>
								</a>
							</div>
							<div class="col-3">
								<a class="btn btn-info rounded-circle" target="blank" href="<?=$team_data['linkinHandle']?>">
									<i class="bi bi-linkedin"></i>
								</a>
							</div>
						</div>

						<div class="alert alert-danger">
							<h5 class="text-danger">Delete your profile!</h5>
							<p><b>NOTE:</b> Deleting your profile is illrevertable and you will not be able to retreive it. More over, any post (blog or portfolio) associated with your name name will not show on the website anymore</p>
							<button class="btn btn-danger mt-3 rounded-0">Yes, Delete</button>
						</div>
					</div>
				</div>
		</div>

	</div>
<?=$this->endSection()?>