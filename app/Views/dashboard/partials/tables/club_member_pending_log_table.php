<h5 class="text-success mt-3">Pending Membership Application</h5>
<div class="table-responsive">
	
 <table id="example" class="table table-hover  table-striped border">
   <thead>
      <tr class="bg-secnodary text-dark">
      <td>Full Name</td>
      <td>
        Gender
      </td>
      <td>Phone #</td>
      <td>Category</td>
      <td>Currency</td>
      <td>Year</td>
      <td>Registered By</td>
      <td>Status</td>
      <td>Edit</td>
    </tr>
   </thead>
   <tbody>
     <?php if(isset($pending_member)): ?>
   
      <?php foreach($pending_member as $clb_mdm) : ?>
         <?php if($userData['id'] == $clb_mdm->registeredBy || $userData['userRole'] == "SUDO") : ?>
        <tr>
          <td data-bs-toggle="popover" data-bs-trigger="hover" data-bs-placement="top" data-bs-html="true" data-bs-content="<img  src='<?=base_url('uploads/'.$clb_mdm->memBerpic)?>' alt='Applicant Image' width='100'>">
            <?=$clb_mdm->fullName?>
              
            </td>
                <td><?=$clb_mdm->gender ?></td>
                <td><?=$clb_mdm->phone ?></td>
                <td><?=$clb_mdm->membership_category ?></td>
                <td><?=$clb_mdm->currency ?></td>
                <td><?=$clb_mdm->saving_year ?></td>
                <td><?=$clb_mdm->agentName?></td>
                <td>
                      <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                      <span role="status"><?=$clb_mdm->accountStatus?></span>
                    </td>
                     <td><a href="<?=base_url('/dashboard/profile/membership/'.$clb_mdm->memberSerialNo)?>"  class="btn btn-sm btn-success"><i class="bi bi-person"></i> Profile</a></td>
        </tr>
        <?php endif; ?>
      <?php endforeach  ?>
    <?php endif ?>
   </tbody>
  </table>

</div>