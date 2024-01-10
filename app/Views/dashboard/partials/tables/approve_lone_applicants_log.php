<div class="text-dark">
    <h3 class="mb-3">Approve Lone Applicants Log</h3>
        <?php //print_r($pending_loan_applicants); //exit(); ?>
</div>
<div class="table-responsive">
    <table id="example" class="table table-striped">
    <thead>
        <tr>
            <th>Member Name</th>
            <th>Serial No</th>
            <th>Loan Amount</th>
            <th>Currency</th>
            <th>Interest</th>
            <th>Submitted By</th>
            <th>Profile</th>
        </tr>
    </thead>
    
    <tbody>

       
        <?php if(isset($approved_loan_applicants)) : ?>
            <?php foreach ($approved_loan_applicants as $pending_lg) : ?>
                     <tr>
                        <!-- Add a data-bs-toggle attribute with value "popover" -->
                        <td ><?=$pending_lg->applicantName?></td>
                        <td ><?=$pending_lg->serial_no?></td>
                        <td><?=$pending_lg->loanAmount?></td>
                        <td><?=$pending_lg->currency?></td>
                        <td><?=$pending_lg->interestRate?>%</td>
                        <td><?=$pending_lg->fullName?></td>
                        <td><a href="<?=base_url('dashboard/loanmanager/view_profile/'.$pending_lg->applicant_id)?>"  class="btn btn-sm btn-primary"><i class="bi bi-person"></i> Member Profile</a></td>
                                                
                    </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
</div>