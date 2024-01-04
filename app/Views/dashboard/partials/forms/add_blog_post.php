<form action="<?=base_url('/dashboard/blog')?>" method="post" enctype="multipart/form-data">
	<div class="form-group mb-3">
		<label>Post Title</label>
		<input type="text" name="title" value="<?= set_value('title')?>" class="form-control" >
		<?php if(isset($validation) && $validation->hasError('title')) : ?>
           <div class="text-danger"><?=$validation->getError('title')?></div>
        <?php endif; ?>
	</div>

	<div class="form-group mb-3">
		<label>Caption Image</label>
		<input type="file" name="featureImg"  class="form-control" >
		<?php if(isset($validation) && $validation->hasError('featureImg')) : ?>
           <div class="text-danger"><?=$validation->getError('featureImg')?></div>
        <?php endif; ?>
	</div>

	<div class="form-group mb-3">
		<label>Post Body</label>
		<textarea id="content" class="form-control" value="<?= set_value('postbody')?>" name="postbody" ></textarea>
		<?php if(isset($validation) && $validation->hasError('postbody')) : ?>
           <div class="text-danger"><?=$validation->getError('postbody')?></div>
        <?php endif; ?>
	</div>

	<div class="form-group mb-3">
		<label>Project Category</label>
		<select class="form-control" name="category" >
			<option value="">Choose</option>
			<?php if(isset($all_categories)): ?>
				<?php foreach($all_categories as $cat): ?>
					<option <?=set_select('category', $cat['post_category'])?> value="<?=$cat['post_category']?>"><?=$cat['post_category']?></option>
				<?php endforeach;?>
			<?php endif; ?>
		</select>
		<?php if(isset($validation) && $validation->hasError('category')) : ?>
           <div class="text-danger"><?=$validation->getError('category')?></div>
        <?php endif; ?>
	</div>

	<div class="form-group mb-3">
		<button class="btn btn-success">Publish Post</button>
	</div>
</form>