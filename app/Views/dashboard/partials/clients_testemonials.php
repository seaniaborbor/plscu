

<div class="row">
	<div class="row">
		<?php if(isset($all_testimonials)): ?>
   	<?php $counter = 1; ?>
      <?php foreach($all_testimonials as $testi) : ?>
        	<div class="col-md-3 mb-5">
        		<div class="card">
	        		<div class="card-body text-center">
	        			<div class="p-5" 
	        			style="height:200px; 
	        			background-image:url(<?=base_url('uploads/'.$testi['customer_pic'])?>); 
	        			background-position:top;
	        			background-size:cover; background-repeat: no-repeat;">
	        			</div>
	        			<h6 ><?=$testi['customer_name']?></h6>
	        			<p><?=$testi['customer_title']?></p>
	        		</div>
	        		<div class="card-footer">
	        			<small><?=$testi['customer_testimoney']?></small><br>
	        			<a href="<?=base_url('dashboard/edit/testimonials/'.$testi['id'])?>" class="btn mt-2 btn-success">Edit</a>
	        			<button class="btn mt-2 btn-danger">Delete</button>
	        		</div>
        		</div>
        	</div>
        <?php $counter++?>
      <?php endforeach  ?>
    <?php endif ?>
	</div>
</div>