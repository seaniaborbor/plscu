

<h3 class="text-success mb-3 mt-3 "><i class="bi bi-card-checklist"></i> Payments Log from <?php echo $startingDate.' to '.$endingDate; ?></h3>

<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Important Note!</strong> Below is the log of all payment made between <?php echo $startingDate.' to '.$endingDate; ?>. It include both pending and approved payment transaction of loan - (LRD and USD).
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>


<div class="table-responsive d-block">
  <?php //print_r($all_pending_loan_payments); exit(); ?>
 <table id="example" class="table table-hover table-striped w-100">
   <thead>
      <tr>
      <td>Member Full Name</td>
      <td>Amount</td>
      <td>Currency</td>
      <td>Logged At</td>
      <td>Logged By</td>
      <td>Status</td>
    </tr>
   </thead>
   <tbody>
     <?php if(isset($all_loan_payment_table)): ?>
      <?php foreach($all_loan_payment_table as $pdng_lonpmts) : ?>
        <tr>
          <td data-bs-toggle="popover" data-bs-trigger="hover" data-bs-placement="top" data-bs-html="true" data-bs-content="<img  src='<?=base_url('uploads/'.$pdng_lonpmts->applicantImg)?>' alt='Applicant Image' width='100'>">
            <?=$pdng_lonpmts->payBy?>
          </td>
          <td><?=$pdng_lonpmts->amount ?></td>
          <td><?=$pdng_lonpmts->currency ?></td>
          <td><?=$pdng_lonpmts->loggedDate ?></td>
          <td><?=$pdng_lonpmts->fullName ?></td>
          <td>
            <i class="bi bi-check-lg"></i>
            <?=$pdng_lonpmts->isApproved ?>
          </td>
        </tr>
      <?php endforeach  ?>
    <?php endif ?>
   </tbody>
  </table>

</div>
