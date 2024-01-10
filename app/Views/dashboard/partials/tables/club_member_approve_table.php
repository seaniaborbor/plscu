<h5 class="text-success mt-4">Approved Members</h5>
<div class="table-responsive d-block">
	
 <table id="example2" class="table w-100">
   <thead>
      <tr>
      <td width="400">Member Full Name</td>
      <td>Gender</td>
      <td>Phone #</td>
      <td>Category</td>
      <td>Currency</td>
      <td>Serial</td>
      <td>Year</td>
      <td>Detail</td>
    </tr>
   </thead>
   <tbody>
     <?php if(isset($approve_member)): ?>
      <?php foreach($approve_member as $clb_mdm) : ?>
        <tr>
          <td data-bs-toggle="popover" data-bs-trigger="hover" data-bs-placement="top" data-bs-html="true" data-bs-content="<img  src='<?=base_url('uploads/'.$clb_mdm->memBerpic)?>' alt='Applicant Image' width='100'>">
            <?=$clb_mdm->fullName?>
              
            </td>
          <td><?=$clb_mdm->gender ?></td>
          <td><?=$clb_mdm->phone ?></td>
          <td><?=$clb_mdm->membership_category ?></td>
          <td><?=$clb_mdm->currency ?></td>
          <td><?=$clb_mdm->memberSerialNo ?></td>
          <td><?=$clb_mdm->saving_year ?></td>
          <td><a href="<?=base_url('/dashboard/profile/membership/'.$clb_mdm->memberSerialNo)?>"  class="btn btn-sm btn-success"><i class="bi bi-person"></i> View Profile </a></td>
        </tr>
      <?php endforeach  ?>
    <?php endif ?>
   </tbody>
  </table>

</div>