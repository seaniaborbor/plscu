<h5 class="text-dark mt-3"><i class="bi bi-card-checklist"></i> Pending Loan Payments</h5>
<div class="table-responsive d-block">
	<?php //print_r($all_pending_loan_payments); exit(); ?>
 <table id="example2" class="table table-hover table-striped w-100">
   <thead>
      <tr>
      <td>Member Full Name</td>
      <td>Amount</td>
      <td>Currency</td>
      <td>Logged At</td>
      <td>Logged By</td>
      <td>Status</td>
      
      <?php if($userData['userRole'] == "SUDO"): ?>
          <th>Approve</th>
      <?php endif;?>
      <td>Edit</td>
      <td>Delete</td>
    </tr>
   </thead>
   <tbody>
     <?php if(isset($all_pending_loan_payments)): ?>
      <?php foreach($all_pending_loan_payments as $pdng_lonpmts) : ?>

         <?php if($userData['id'] == $pdng_lonpmts->loggedBy || $userData['userRole'] == "SUDO") : ?>
        <tr>
          <td data-bs-toggle="popover" data-bs-trigger="hover" data-bs-placement="top" data-bs-html="true" data-bs-content="<img  src='<?=base_url('uploads/'.$pdng_lonpmts->applicantImg)?>' alt='Applicant Image' width='100'>">
            <?=$pdng_lonpmts->payBy?>
          </td>
          <td><?=$pdng_lonpmts->amount ?></td>
          <td><?=$pdng_lonpmts->currency ?></td>
          <td><?=$pdng_lonpmts->loggedDate ?></td>
          <td><?=$pdng_lonpmts->fullName ?></td>
          <td>
            <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
            <?=$pdng_lonpmts->isApproved ?>
          </td>
          <?php if($userData['userRole'] == "SUDO"): ?>
           <td><a href="<?=base_url('/dashboard/approve/log_loan_payment/'.$pdng_lonpmts->payment_id)?>"  class="btn btn-sm btn-primary"><i class="bi bi-person"></i> Approve</a></td>
           <?php endif;?>
           <td><a href="<?=base_url('/dashboard/edit/log_loan_payment/'.$pdng_lonpmts->payment_id)?>"  class="btn btn-sm btn-success"><i class="bi bi-pencil"></i> Edit</a></td>
                    <td><a href="#"  class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Delete</a></td>
        </tr>
      <?php endif; ?>
      <?php endforeach  ?>
    <?php endif ?>
   </tbody>
  </table>

</div>
