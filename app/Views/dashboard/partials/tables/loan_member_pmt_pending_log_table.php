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
            <?php if($userData['userRole'] == "SUDO") : ?>
                <th>Delete</th>
            <?php endif; ?>
            
        </tr>
    </thead>
    <tbody>

       
        <?php if(isset($a_member_payment_approvide_log)) : ?>
            <?php foreach ($a_member_payment_approvide_log as $approve_lg) : ?>
                <tr>
                    <!-- Add a data-bs-toggle attribute with value "popover" -->
                    <td ><?=$approve_lg->memberFullName?></td>
                    <td><?=$approve_lg->due_amount?></td>
                    <td><?=$approve_lg->teamMemName?></td>
                    <td><?=$approve_lg->recordedDate?></td>
                    <td>
                            <button class="btn btn-primary btn-sm" type="button" disabled>
                              <i class="bi bi-check"></i> <?=$approve_lg->approved_status?>...</span>
                            </button>
                    </td>
                    <?php if($userData['userRole'] == "SUDO") : ?>
                        <td><a href="#"  class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Delete</a></td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
</div>