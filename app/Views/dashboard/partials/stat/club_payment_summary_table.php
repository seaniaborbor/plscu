
<div class="table-responsive">
	
 <table id="example2" class="table table-hover  table-striped border">
   <thead>
      <tr class="bg-secnodary text-dark">
      <td>Full Name</td>
      <td>
        Gender
      </td>
      <td>Phone #</td>
      <td>Category</td>
      <td>Total Paid</td>
      <td>Currency</td>
      <td>Profile</td>
    </tr>
   </thead>
   <tbody>
     <?php if(isset($club_payments_summary_log)): ?>
   
      <?php foreach($club_payments_summary_log as $clb_mdm) : ?>
    
        <tr>
          <td data-bs-toggle="popover" data-bs-trigger="hover" data-bs-placement="top" data-bs-html="true" data-bs-content="<img  src='<?=base_url('uploads/'.$clb_mdm->memBerpic)?>' alt='Applicant Image' width='100'>">
            <?=$clb_mdm->fullName?>
              
            </td>
                <td><?=$clb_mdm->gender ?></td>
                <td><?=$clb_mdm->phone ?></td>
                <td><?=$clb_mdm->membership_category ?></td>
                <td><?=$clb_mdm->total_saved ?></td>
                <td><?=$clb_mdm->currency?></td>
                <td><a href="<?=base_url('/dashboard/profile/membership/'.$clb_mdm->memberSerialNo)?>"  class="btn btn-sm btn-success"><i class="bi bi-person"></i> Profile</a>
                </td>
        </tr>
   
      <?php endforeach  ?>
    <?php endif ?>
   </tbody>
  </table>

</div>