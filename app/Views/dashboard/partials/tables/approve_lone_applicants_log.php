<div class="text-dark">
    <h3>Approve Lone Applicants Log</h3>
        <?php //print_r($pending_loan_applicants); //exit(); ?>
</div>
<div class="table-responsive">
    <table id="example" class="table table-striped">
    <thead>
        <tr>
            <th>Member Name</th>
            <th>Loan Amount</th>
            <th>Currency</th>
            <th>Interest</th>
            <th>Submitted By</th>
            <th>Status</th>
            <?php if($userData['userRole'] == "SUDO"): ?>
                <th>Edit</th>
                <th>Delete</th>
            <?php endif;?>
            
        </tr>
    </thead>
    
    <tbody>

       
        <?php if(isset($approved_loan_applicants)) : ?>
            <?php foreach ($approved_loan_applicants as $pending_lg) : ?>
               <?php if($userData['id'] == $pending_lg->regBy || $userData['userRole'] == "SUDO") : ?>
                     <tr>
                        <!-- Add a data-bs-toggle attribute with value "popover" -->
                        <td ><?=$pending_lg->applicantName?></td>
                        <td><?=$pending_lg->loanAmount?></td>
                        <td><?=$pending_lg->currency?></td>
                        <td><?=$pending_lg->interestRate?>%</td>
                        <td><?=$pending_lg->fullName?></td>
                        <td>
                            <i class="bi bi-check2-square"></i>
                            <span class="text-dark"><?=$pending_lg->approv_status?>...</span>
                        </td>
                         <?php if($userData['userRole'] == "SUDO"): ?>
                             <td><a href="<?=base_url('dashboard/edit/club_due_management/'.$pending_lg->applicant_id)?>"  class="btn btn-sm btn-success"><i class="bi bi-pencil"></i> Edit</a></td>
                        <td><a href="<?=base_url('dashboard/del/club_due_management/'.$pending_lg->applicant_id)?>"  class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Delete</a></td>
                          <?php endif;?>
                         
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
</div>