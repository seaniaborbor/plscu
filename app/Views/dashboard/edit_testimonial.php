<?php $this->extend('dashboard/partials/layout')?>

<?=$this->section('main')?>
	<div class="row">

		<div class="col-md-8 pt-2">
			<div class="card">
				<div class="card-header">
					<h4 class="text-success mt-2 mb-4">Edit Testimonial</h4> 
				</div>
				<div class="card-body">
					<?php include('partials/forms/edit_testimonial_form.php')?>
				</div>
			</div>
		</div>

		<div class="col-md-4 pt-2">
			<div class="card shadow-lg ">
				<div class="card-header bg-success d-flex justify-content-between text-white">
					<h4>Testimonial Summary</h4>
				</div>
				<div class="card-body">
					<div class="mb-3 border-bottom">
						<h5>Customer's Name</h5>
						<p><?= $a_testimonial['customer_name']?></p>
					</div>
					<div class="mb-3 border-bottom">
						<h5>Customer's Title</h5>
						<p><?= $a_testimonial['customer_title']?></p>
					</div>
					<div class="mb-3 border-bottom">
						<h5>Customer's Testimoney</h5>
						<p><?= $a_testimonial['customer_testimoney']?></p>
					</div>
					<div class="mb-3 col-md-6 rounded-3 offset-md-3">
						<div class="p-5" 
	        			style="height:200px; 
	        			background-image:url(<?=base_url('uploads/'.$a_testimonial['customer_pic'])?>); 
	        			background-position:top;
	        			background-size: cover;
	        			background-repeat: no-repeat;">
	        			</div>
					</div>
				</div>
			</div>
		</div>

	</div>
<?=$this->endSection()?>