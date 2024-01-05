

<div class="table-responsive">
    <table id="example2" class="table table-striped">
    <thead>
        <tr>
            <th>Member Name</th>
            <th>Amount Paid</th>
            <th>Logged By</th>
            <th>Date</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>


        <?php if(isset($due_payment_approved_log)) : ?>
            <?php foreach ($due_payment_approved_log as $pending_lg) : ?>
                <?php if($userData['id'] == $pending_lg->recordedBy || $userData['userRole'] == "SUDO") : ?>
                    <tr>
                    <!-- Add a data-bs-toggle attribute with value "popover" -->
                    <td ><?=$pending_lg->memberFullName?></td>
                    <td><?=$pending_lg->due_amount?></td>
                    <td><?=$pending_lg->teamMemName?></td>
                    <td><?=$pending_lg->recordedDate?></td>
                    <td>
                            <button class="btn btn-success btn-sm" type="button" disabled>
                              <i class="bi bi-check2-square"></i> <?=$pending_lg->approved_status?></span>
                            </button>
                    </td>
                    <td><a href="#"  class="btn btn-sm btn-success"><i class="bi bi-person"></i> Edit</a></td>
                    <td><a href="#"  class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Delete</a></td>
                </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
</div>