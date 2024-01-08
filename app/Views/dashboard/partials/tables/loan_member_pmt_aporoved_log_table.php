 <div class="text-dark">
        <?php //print_r($applicant_pending_loan_log); exit(); ?>
</div>
<div class="table-responsive">
    <table id="example" class="table table-striped">
    <thead>
        <tr>
            <th>Member Name</th>
            <th>Amount Paid</th>
            <th>Logged By</th>
            <th>Date</th>
            <th>Status</th>
            <?php if($userData['userRole'] == "SUDO") : ?>
                <th>Delete</th>
            <?php endif; ?>
            
        </tr>
    </thead>
    <tbody>

       
        <?php if(isset($applicant_approved_loan_log)) : ?>
            <?php foreach ($applicant_approved_loan_log as $approve_lg) : ?>
                <?php if($userData['id'] == $approve_lg->id || $userData['userRole'] == "SUDO") : ?>
                <tr>
                    <!-- Add a data-bs-toggle attribute with value "popover" -->
                    <td ><?=$approve_lg->payBy?></td>
                    <td><?=$approve_lg->amount.' '.$approve_lg->pmtCurrency?></td>
                    <td><?=$approve_lg->fullName?></td>
                    <td><?=$approve_lg->loggedDate?></td>
                    <td>
                            <button class="btn btn-primary btn-sm" type="button" disabled>
                              <i class="bi bi-check"></i> <?=$approve_lg->isApproved?>...</span>
                            </button>
                    </td>
                    <?php if($userData['userRole'] == "SUDO") : ?>
                       <td><a href="<?=base_url('/dashboard/delete/log_loan_payment/'.$approve_lg->payment_id)?>"  class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Delete</a></td>
                    <?php endif; ?>
                <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
</div>