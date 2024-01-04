<?php $this->extend('dashboard/partials/layout')?>

<?=$this->section('main')?>
	<div class="row">

		<div class="col-md-8 pt-2">
			<div class="card">
				<div class="card shadow-lg border border-success ">
				<div class="card-header bg-success d-flex justify-content-between text-white">
					<h4><span class="text-warning">EDIT: </span><?=$blog_data['title']?> (blog post)</h4>
				</div>
				<div class="card-body">
					<?php include('partials/forms/edit_blog_form.php')?>
				</div>
			</div>
			</div>
		</div>

		<div class="col-md-4 pt-2">
			<div class="card">
				<div class="card-body">
					<h3 class="text-success">Post Summary</h3>
					<div class="mb-3 border-bottom">
						<h4 class="text-secondary">Post Title</h4>
						<h6><?=$blog_data['title']?></h6>
					</div>
					<div class="mb-3 border-bottom">
						<h4 class="text-secondary">Created Date</h4>
						<h6><?=$blog_data['createdAt']?></h6>
					</div>
					<div class="mb-3 border-bottom">
						<h4 class="text-secondary">Category</h4>
						<h6><?=$blog_data['category']?></h6>
					</div>
					<div class="form-group mb-3">
						<div class="alert alert-info">
							<p>You must choose the blog category in order for it to be edited. If you've forgetten the previous category, please look through the post summary above</p>
						</div>
					</div>
					<div class="mb-3 border-bottom">
						<h4 class="text-secondary">Post Images</h4>
						<div class="row">
							<div class="col-md-12">
								<img src="<?=base_url('uploads/'.$blog_data['featureImg'])?>" class="img-fluid rounded img-thumbnail shadow-lg mt-2">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
<?=$this->endSection()?>