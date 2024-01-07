<div class="text-dark">
        <?php //print_r($due_payment_pending_log); exit(); ?>
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
            <?php if($userData['userRole'] == "SUDO"): ?>
                <th>Approve</th>
            <?php endif;?>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    
    <tbody>

       
        <?php if(isset($due_payment_pending_log)) : ?>
            <?php foreach ($due_payment_pending_log as $pending_lg) : ?>
               <?php if($userData['id'] == $pending_lg->last_edited_by || $userData['userRole'] == "SUDO") : ?>
                     <tr>
                        <!-- Add a data-bs-toggle attribute with value "popover" -->
                        <td ><?=$pending_lg->memberFullName?></td>
                        <td><?=$pending_lg->due_amount?></td>
                        <td><?=$pending_lg->teamMemName?></td>
                        <td><?=$pending_lg->recordedDate?></td>
                        <td>
                            <span class="spinner-border text-danger spinner-border-sm" aria-hidden="true"></span>
                            <span class="text-dark"><?=$pending_lg->approved_status?>...</span>
                        </td>
                         <?php if($userData['userRole'] == "SUDO"): ?>
                         <td><a href="<?=base_url('dashboard/approve/club_due_management/'.$pending_lg->paymentId)?>"  class="btn btn-sm btn-primary"><i class="bi bi-person"></i> Approve</a></td>
                         <?php endif;?>
                         <td><a href="<?=base_url('dashboard/edit/club_due_management/'.$pending_lg->paymentId)?>"  class="btn btn-sm btn-success"><i class="bi bi-person"></i> Edit</a></td>
                        <td><a href="<?=base_url('dashboard/delete/club_due_management/'.$pending_lg->paymentId)?>"  class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Delete</a></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
</div>