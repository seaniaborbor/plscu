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
    <div class="text-dark">
        <?php //print_r($due_payment_pending_log); exit(); ?>
    </div>
    <tbody>

       
        <?php if(isset($a_member_payment_pending_log)) : ?>
            <?php foreach ($a_member_payment_pending_log as $pending_lg) : ?>
                 <?php if($userData['id'] == $pending_lg->last_edited_by || $userData['userRole'] == "SUDO") : ?>
                    <tr>
                        <!-- Add a data-bs-toggle attribute with value "popover" -->
                        <td ><?=$pending_lg->memberFullName?></td>
                        <td><?=$pending_lg->due_amount?></td>
                        <td><?=$pending_lg->teamMemName?></td>
                        <td><?=$pending_lg->recordedDate?></td>
                        <td>
                                  <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                                  <span role="status"><?=$pending_lg->approved_status?>...</span>
                        </td>
                         <?php if($userData['userRole'] == "SUDO") : ?>
                <td><a href="#"  class="btn btn-sm btn-success"><i class="bi bi-person"></i> Edit</a></td>
                        <td><a href="#"  class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Delete</a></td>
            <?php endif; ?>
                        
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
</div>