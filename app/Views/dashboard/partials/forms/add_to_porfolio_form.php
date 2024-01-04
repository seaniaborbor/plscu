<form action="<?=base_url('/dashboard/portfolio')?>" method="post" enctype="multipart/form-data">
	<div class="form-group mb-3">
		<label>Project Title</label>
		<input type="text" name="title" value="<?= set_value('title')?>" class="form-control" >
		<?php if(isset($validation) && $validation->hasError('title')) : ?>
           <div class="text-danger"><?=$validation->getError('title')?></div>
        <?php endif; ?>
	</div>

	<div class="form-group mb-3">
		<label>Snippet(summary sentence)</label>
		<input type="text" name="snippet" value="<?= set_value('title')?>" class="form-control" >
		<?php if(isset($validation) && $validation->hasError('snippet')) : ?>
           <div class="text-danger"><?=$validation->getError('snippet')?></div>
        <?php endif; ?>
	</div>

	<div class="form-group mb-3">
		<label>Post Body</label>
		<textarea class="form-control" id="content" value="<?= set_value('postbody')?>" name="postbody" ></textarea>
		<?php if(isset($validation) && $validation->hasError('postbody')) : ?>
           <div class="text-danger"><?=$validation->getError('postbody')?></div>
        <?php endif; ?>
	</div>

	<div class="form-group mb-3">
		<label>Screenshot I</label>
		<input type="file" name="shceenshoti"  class="form-control" >
		<?php if(isset($validation) && $validation->hasError('shceenshoti')) : ?>
           <div class="text-danger"><?=$validation->getError('shceenshoti')?></div>
        <?php endif; ?>
	</div>

	<div class="form-group mb-3">
		<label>Screenshot II</label>
		<input type="file" name="shceenshotii"  class="form-control" >
		<?php if(isset($validation) && $validation->hasError('shceenshotii')) : ?>
           <div class="text-danger"><?=$validation->getError('shceenshotii')?></div>
        <?php endif; ?>
	</div>

	<div class="form-group mb-3">
		<label>Screenshot III</label>
		<input type="file" name="shceenshotiii"  class="form-control" >
		<?php if(isset($validation) && $validation->hasError('shceenshotiii')) : ?>
           <div class="text-danger"><?=$validation->getError('shceenshotiii')?></div>
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
		<label>Client</label>
		<input type="text" name="client" value="<?= set_value('client')?>" class="form-control" >
		<?php if(isset($validation) && $validation->hasError('client')) : ?>
           <div class="text-danger"><?=$validation->getError('client')?></div>
        <?php endif; ?>
	</div>

	<div class="form-group mb-3">
		<label>Project URL</label>
		<input type="url" name="url" value="<?= set_value('url')?>" class="form-control" >
		<?php if(isset($validation) && $validation->hasError('url')) : ?>
           <div class="text-danger"><?=$validation->getError('url')?></div>
        <?php endif; ?>
	</div>

	<div class="form-group mb-3">
		<button class="btn btn-success">Publish Post</button>
	</div>
</form>