
<div class="table-responsive">
	
 <table id="example1" class="table table-hover  table-striped border">
   <thead>
      <tr class="bg-secnodary text-dark">
      <td>Full Name</td>
      <td>Loan Total</td>
      <td>Amount Paid</td>
      <td>Interest Rate</td>
      <td>Currency</td>
      <td>Profile</td>
    </tr>
   </thead>
   <tbody>
     <?php if(isset($loan_payments_summary_log)): ?>
   
      <?php foreach($loan_payments_summary_log as $clb_mdm) : ?>
    
        <tr>
          <td data-bs-toggle="popover" data-bs-trigger="hover" data-bs-placement="top" data-bs-html="true" data-bs-content="<img  src='<?=base_url('uploads/'.$clb_mdm->memBerpic)?>' alt='Applicant Image' width='100'>">
            <?=$clb_mdm->fullName?>
          </td>
          <td><?=$clb_mdm->loanAmount ?></td>
          <td><?=$clb_mdm->totalPaid ?></td>
          <td><?=$clb_mdm->interestRate.'%'?></td>
          <td><?=$clb_mdm->currency?></td>
          <td><a href="<?=base_url('/dashboard/loanmanager/view_profile/'.$clb_mdm->applicantId)?>"  class="btn btn-sm btn-success"><i class="bi bi-person"></i> Profile</a>
          </td>
        </tr>
   
      <?php endforeach  ?>
    <?php endif ?>
   </tbody>
  </table>

</div>