<div class="table-responsive">
	
 <table class="table table-sm table-striped border">
    <tr class="bg-light text-dark">
      <td width="25">
       No
      </td>
      <td>
       Title
      </td>
      <td>
        Description
      </td>
      <td width="40">
        Delete
      </td>
    </tr>

   <?php if(isset($all_categories)): ?>
   	<?php $counter = 1; ?>
      <?php foreach($all_categories as $cate) : ?>
        <tr>
          <td class="bg-light text-dark"><?=$counter?></td>
          <td><?=$cate['post_category']?></td>
          <td><?=$cate['description'] ?></td>
          <td><button class="btn btn-sm btn-danger rounded-circle"><i class="bi bi-trash"></i></button></td>
        </tr>
        <?php $counter++?>
      <?php endforeach  ?>
    <?php endif ?>
  </table>

</div>