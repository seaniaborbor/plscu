<div class="table-responsive">
	
 <table id="example" class="table table-sm table-striped border" id="dTable">
    <thead>
      <tr class="bg-light text-dark">
      <td width="25">
       No
      </td>
      <td>
       Title
      </td>
      <td width="150">
        Last Updated
      </td>
      <td width="100">
       View
      </td>
      <td width="100">
        Edit
      </td>
    </tr>
    </thead>

  <tbody>
     <?php if(isset($all_portfolio)): ?>
    <?php $counter = 1; ?>
      <?php foreach($all_portfolio as $port) : ?>
        <tr>
          <td class="bg-light text-dark"><?=$counter?></td>
          <td data-bs-toggle="popover" data-bs-trigger="hover" data-bs-placement="top" data-bs-html="true" data-bs-content="<img src='<?=base_url('uploads/'.$port['shceenshoti'])?>' alt='Applicant Image' width='100'><br> <?=$port['snippet']?>"><?=$port['title']?></td>
          <td><?= substr($port['createdAt'], 0,10) ?></td>
          
          <td>
            <a href="#" class="btn btn-sm btn-success"><i class="bi bi-eye"></i> View</a>
        </td>

          <td><a href="<?=base_url('/dashboard/edit/portfolio/'.$port['id'])?>" class="btn btn-sm btn-success "><i class="bi bi-pencil"></i> Edite</a></td>
        </tr>
        <?php $counter++?>
      <?php endforeach  ?>
    <?php endif ?>
  </tbody>
  </table>

</div>