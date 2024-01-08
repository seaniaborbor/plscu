 <div class="text-dark">
        <?php //print_r($applicant_pending_loan_log); exit(); ?>
</div>
<div class="table-responsive">
    <table id="example2" class="table table-striped">
    <thead>
        <tr>
            <th>Member Name</th>
            <th>Amount Paid</th>
            <th>Logged By</th>
            <th>Date</th>
            <th>Status</th>
            <?php if($userData['userRole'] == "SUDO") : ?>
                <th>Approve</th>
                <th>Delete</th>
            <?php endif; ?>
            
        </tr>
    </thead>
    <tbody>

       
        <?php if(isset($applicant_pending_loan_log)) : ?>
            <?php foreach ($applicant_pending_loan_log as $approve_lg) : ?>
                <tr>
                    <!-- Add a data-bs-toggle attribute with value "popover" -->
                    <td ><?=$approve_lg->payBy?></td>
                    <td><?=$approve_lg->amount.' '.$approve_lg->pmtCurrency?></td>
                    <td><?=$approve_lg->fullName?></td>
                    <td><?=$approve_lg->loggedDate?></td>
                    <td>
                            <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                              <?=$approve_lg->isApproved?>...</span>
                    </td>
                    <?php if($userData['userRole'] == "SUDO") : ?>
                        <td><a href="<?=base_url('dashboard/approve/log_loan_payment/'.$approve_lg->payment_id)?>"  class="btn btn-sm btn-success"><i class="bi bi-check-lg"></i> Approve</a></td>
                        <td><a href="<?=base_url('/dashboard/delete/log_loan_payment/'.$approve_lg->payment_id)?>"  class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Delete</a></td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
</div>