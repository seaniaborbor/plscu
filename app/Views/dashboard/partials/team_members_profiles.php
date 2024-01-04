<div class="row">

	<?php if(isset($all_team)) : ?>
		<?php foreach($all_team as $tm) : ?>
			<div class="col-md-4 mt-3">
				<div class="card rounded">
					<div class="card-body" 
					style="height:250px; 
					background-image: url(<?=base_url('uploads/'.$tm['profileImg'])?>);
					background-position: top; background-size: cover; background-repeat: no-repeat;
					" >
						
					</div>
					<div class="card-footer">
						<div class="row text-center">
							<div class="col-12">
								<h5 class="mb-0"><?=$tm['fullName']?></h5>
								<p class="text-dark mt-0"><i><?=$tm['profession']?></i></p>
							</div>
						</div>
						<div class="row">
							<div class="col-3">
								<a class="btn btn-primary rounded-circle" target="blank" href="<?=$tm['fbHandle']?>">
									<i class="bi bi-facebook"></i>
								</a>
							</div>
							<div class="col-3">
								<a class="btn btn-success rounded-circle" target="blank" href="<?=$tm['xHandle']?>">
									<i class="bi bi-twitter"></i>
								</a>
							</div>
							<div class="col-3">
								<a class="btn btn-info rounded-circle" target="blank" href="<?=$tm['linkinHandle']?>">
									<i class="bi bi-linkedin"></i>
								</a>
							</div>
							<div class="col-3">
								<a class="btn btn-danger rounded-circle" href="<?=base_url('/dashboard/edit/team/'.$tm['id'])?>">
									<i class="bi bi-pencil"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	<?php endif; ?>
</div>