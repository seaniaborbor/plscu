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
           <td><a href="<?=base_url('dashboard/loanmanager/view_profile/'.$pdng_lonpmts->payment_id)?>"  class="btn btn-sm btn-primary"><i class="bi bi-person"></i> Approve</a></td>
           <?php endif;?>
           <td><a href="<?=base_url('/dashboard/profile/membership/'.$pdng_lonpmts->serial_no)?>"  class="btn btn-sm btn-success"><i class="bi bi-person"></i> Edit</a></td>
                    <td><a href="#"  class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Delete</a></td>
        </tr>
      <?php endif; ?>
      <?php endforeach  ?>
    <?php endif ?>
   </tbody>
  </table>

</div>

<!-- 

  Array ( [0] => stdClass Object ( [id] => 3 [serial_no] => cwzwCY [amount] => 3000 [pmtCurrency] => LRD [loggedBy] => 3 [isApproved] => Pending [loggedDate] => 2024-01-05 14:16:38 [fullName] => Fayiah A. Korkor Sr [gender] => Male [applicantImg] => 1703983221_4338dc845c91289b1543.jpg [phone] => 077777358 [email] => tpb@gmail.com [address] => new georgia gulf [mem_serial] => [loanAmount] => 45700 [currency] => LRD [loanStartDate] => 2023-12-21 [loanEndDate] => 2023-12-28 [interestRate] => 12 [loan_aggrement_form] => 1703983221_ca9cfafc70c60d1ef26c.pdf [regBy] => 1 [lstEdited] => 2024-01-05 12:08:22 [pmtStatus] => complete [approv_status] => Pending [passwd] => $2y$10$UwmKcL.VWxisRTH.cFswFOIJGaEY5HeazG60bsoPepiFwmx0iFmmW [userRole] => USER [profession] => Secretary, Board of Directors [fbHandle] => http://facebook.com/tarnueg [xHandle] => [linkinHandle] => [profileImg] => 1703993104_0f84e69f743b9cb588b6.png [createdAt] => 2023-12-24 15:40:21 [payBy] => Peter L Borbor [payment_id] => 4 ) [1] => stdClass Object ( [id] => 4 [serial_no] => cwzwCY [amount] => 450 [pmtCurrency] => LRD [loggedBy] => 4 [isApproved] => Pending [loggedDate] => 2024-01-05 14:16:31 [fullName] => Deddeh H. Kollie [gender] => Male [applicantImg] => 1703983221_4338dc845c91289b1543.jpg [phone] => 077777358 [email] => fake@gmail.com [address] => new georgia gulf [mem_serial] => [loanAmount] => 45700 [currency] => LRD [loanStartDate] => 2023-12-21 [loanEndDate] => 2023-12-28 [interestRate] => 12 [loan_aggrement_form] => 1703983221_ca9cfafc70c60d1ef26c.pdf [regBy] => 1 [lstEdited] => 2024-01-05 12:08:22 [pmtStatus] => complete [approv_status] => Pending [passwd] => $2y$10$w6gXy41pYWIpiurglirfpebCtR86ahAUPPFvzwXrYLmUj2rlEfAYe [userRole] => USER [profession] => Member, Board of Directors [fbHandle] => http://facebook.com/tarnuevvefd [xHandle] => [linkinHandle] => [profileImg] => 1703993164_6a5e0959fbb2d83ca446.png [createdAt] => 2023-12-24 15:45:49 [payBy] => Peter L Borbor [payment_id] => 5 ) [2] => stdClass Object ( [id] => 2 [serial_no] => 2Il23F [amount] => 300 [pmtCurrency] => USD [loggedBy] => 2 [isApproved] => Pending [loggedDate] => 2024-01-05 14:16:28 [fullName] => Kebbeh Sakui [gender] => Male [applicantImg] => 1703978196_9737d9a502fca536315d.jpg [phone] => 08886102312 [email] => jane@gmail.com [address] => New Georgia Gulf, Township of New Georgia, Monrovia [mem_serial] => [loanAmount] => 7000 [currency] => USD [loanStartDate] => 2023-12-21 [loanEndDate] => 2024-05-30 [interestRate] => 16 [loan_aggrement_form] => 1703978196_f0965d700c133f824084.pdf [regBy] => 1 [lstEdited] => 2024-01-05 12:08:29 [pmtStatus] => complete [approv_status] => Approved [passwd] => $2y$10$I9Zx2/lxqWjLeRTVcSNXjuC50uDcPOQA1YiuZzR8qamQXDpkV/4ru [userRole] => USER [profession] => Vice Chair, Board of Directors [fbHandle] => http://facebook.com/tarnuevv [xHandle] => [linkinHandle] => [profileImg] => 1703993013_d555799c4bd17a67e887.png [createdAt] => 2023-12-24 15:38:34 [payBy] => Tarnue P. Borbor [payment_id] => 3 ) [3] => stdClass Object ( [id] => 4 [serial_no] => lYbZGv [amount] => 49 [pmtCurrency] => LRD [loggedBy] => 4 [isApproved] => Pending [loggedDate] => 2024-01-05 14:16:19 [fullName] => Deddeh H. Kollie [gender] => Female [applicantImg] => 1703968242_69b8fcc09dd235248dd1.jpg [phone] => 0775577736 [email] => fake@gmail.com [address] => new georgia gulf [mem_serial] => [loanAmount] => 10000 [currency] => LRD [loanStartDate] => 2023-12-30 [loanEndDate] => 2024-07-30 [interestRate] => 15 [loan_aggrement_form] => 1703968242_283f272521e8a44ec789.pdf [regBy] => 1 [lstEdited] => 2024-01-05 12:08:51 [pmtStatus] => complete [approv_status] => Pending [passwd] => $2y$10$w6gXy41pYWIpiurglirfpebCtR86ahAUPPFvzwXrYLmUj2rlEfAYe [userRole] => USER [profession] => Member, Board of Directors [fbHandle] => http://facebook.com/tarnuevvefd [xHandle] => [linkinHandle] => [profileImg] => 1703993164_6a5e0959fbb2d83ca446.png [createdAt] => 2023-12-24 15:45:49 [payBy] => Princess Jackson [payment_id] => 2 ) [4] => stdClass Object ( [id] => 1 [serial_no] => lYbZGv [amount] => 7 [pmtCurrency] => LRD [loggedBy] => 1 [isApproved] => Pending [loggedDate] => 2024-01-05 14:14:55 [fullName] => Tamba Bundor [gender] => Female [applicantImg] => 1703968242_69b8fcc09dd235248dd1.jpg [phone] => 0775577736 [email] => admin@gmail.com [address] => new georgia gulf [mem_serial] => [loanAmount] => 10000 [currency] => LRD [loanStartDate] => 2023-12-30 [loanEndDate] => 2024-07-30 [interestRate] => 15 [loan_aggrement_form] => 1703968242_283f272521e8a44ec789.pdf [regBy] => 1 [lstEdited] => 2024-01-05 12:08:51 [pmtStatus] => complete [approv_status] => Pending [passwd] => $2y$10$hHnWv2QTGSFLkhTCvGfIduhsmyT30egxSeLZF6YfCPMi1D8lTZ7Vu [userRole] => SUDO [profession] => Chairman, Board of Director [fbHandle] => http://facebook.com/tarnuea [xHandle] => [linkinHandle] => [profileImg] => 1703992888_372fcc6a5ec5c481edac.png [createdAt] => 2023-12-24 15:36:34 [payBy] => Princess Jackson [payment_id] => 1 ) )

  -->