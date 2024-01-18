
<?php 

$bb_to_pay_ld = 0; // balance dept lrd
$bb_to_pay_usd = 0; // balance dept usd

$tt_paid_ld = 0; // total to paid in  lrd 
$tt_paid_usd = 0; // total to paid in  usd

?>


<div class="table-responsive">
  <h3 class="mt-3 mb-3 text-success">Lone payment summary per individual</h3>

  <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Important Note!</strong> The table below summarizes the amount taken, interest rate, total to pay in return, amount paid, and balance per individual between <?php echo $startingDate.' to '.$endingDate; ?> inclusive... regardless of currency. 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

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
        <?php 
           $tt_pay = ($clb_mdm->loanAmount*($clb_mdm->interestRate/100))+$clb_mdm->loanAmount;// total to pay 
           $bb_pay = (($clb_mdm->loanAmount*($clb_mdm->interestRate/100))+$clb_mdm->loanAmount)-$clb_mdm->totalPaid;

           if($clb_mdm->currency == "LRD"){
            $bb_to_pay_ld += $bb_pay;
            $tt_paid_ld += $clb_mdm->totalPaid;
           }else{
             $bb_to_pay_usd += $bb_pay;
            $tt_paid_usd += $clb_mdm->totalPaid;
           }
        ?>
        <tr>
          <td>
            <img  src='<?=base_url('uploads/'.$clb_mdm->memBerpic)?>' alt='Applicant Image' style="width:50px; height:50px;" class="rounded-circle img-thumbnail">
          </td>
          <td>
            <?=$clb_mdm->fullName?>
          </td>
          <td><?=$clb_mdm->loanAmount ?></td>
          <td><?=$clb_mdm->interestRate.'%'?></td>
          <td><?=$tt_pay?></td>
          <td><?=$clb_mdm->totalPaid?></td>
          <td><?=$bb_pay?></td>
          <td><?=$clb_mdm->currency?></td>
          <td><a href="<?=base_url('/dashboard/loanmanager/view_profile/'.$clb_mdm->applicantId)?>"  class="btn btn-sm btn-success"><i class="bi bi-person"></i> Profile</a>
          </td>
        </tr>
   
      <?php endforeach  ?>
    <?php endif ?>
   </tbody>
  </table>

</div>

<div class="row">
  <div class="col-md-8">
    
  </div>
  <div class="col-md-4">
    <div class="row">
      <div class=" col-6 card-body border shadow-sm text-center">
      <h3><?=$bb_to_pay_ld?></h3>
      <h5>Total LRD In Credit</h5>
    </div>
    <div class="col-6 card-body border shadow-sm text-center">
      <h3><?=$bb_to_pay_usd?></h3>
      <h5>Total USD In Credit</h5>
    </div>
    </div>
  </div>
</div>
<!-- 
$bb_to_pay_ld = 0; // balance dept lrd
$bb_to_pay_usd = 0; // balance dept usd

$tt_paid_ld = 0; // total to paid in  lrd 
$tt_paid_usd = 0; // total to paid in  usd -->