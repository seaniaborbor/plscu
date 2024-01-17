
<div class="table-responsive">
  
 <table id="example1" class="table table-hover  table-striped border">
   <thead>
      <tr class="bg-secnodary text-dark">
        <td></td>
      <td>Full Name</td>
      <td>Loan Total</td>
      <td>Interest Rate</td>
      <td>Total To Pay</td>
      <td>Amount Paid</td>
      <td>Balance</td>
      <td>Currency</td>
      <td>Profile</td>
    </tr>
   </thead>
   <tbody>
     <?php if(isset($loaners_payment_summary)): ?>
   
      <?php foreach($loaners_payment_summary as $clb_mdm) : ?>
    
        <tr>
          <td>
            <img  src='<?=base_url('uploads/'.$clb_mdm->memBerpic)?>' alt='Applicant Image' style="width:50px; height:50px;" class="rounded-circle img-thumbnail">
          </td>
          <td>
            <?=$clb_mdm->fullName?>
          </td>
          <td><?=$clb_mdm->loanAmount ?></td>
          <td><?=$clb_mdm->interestRate.'%'?></td>
          <td><?=($clb_mdm->loanAmount*($clb_mdm->interestRate/100))+$clb_mdm->loanAmount?></td>
          <td><?=$clb_mdm->totalPaid ?></td>
          <td><?=(($clb_mdm->loanAmount*($clb_mdm->interestRate/100))+$clb_mdm->loanAmount)-$clb_mdm->totalPaid?></td>
          <td><?=$clb_mdm->currency?></td>
          <td><a href="<?=base_url('/dashboard/loanmanager/view_profile/'.$clb_mdm->applicantId)?>"  class="btn btn-sm btn-success"><i class="bi bi-person"></i> Profile</a>
          </td>
        </tr>
   
      <?php endforeach  ?>
    <?php endif ?>
   </tbody>
  </table>

</div>