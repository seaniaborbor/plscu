<div class="table-responsive">
    <table id="example2" class="table table-striped">
    <thead>
        <tr>
            <th>Applicant Name</th>
            <th>Loan Amount</th>
            <th>Currency</th>
            <th>Interest Rate</th>
            <th>Taken Date</th>
            <th>End Date</th>
            <th>Registered By</th>
            <th>More</th>
        </tr>
    </thead>
    <div class="text-dark">
        <?php //print_r($loan_applicant_log); ?>
    </div>
    <tbody>
        <?php if(isset($loan_applicant_log)) : ?>
            <?php foreach ($loan_applicant_log as $app_licant_log) : ?>
                <tr>
                    <!-- Add a data-bs-toggle attribute with value "popover" -->
                    <td data-bs-toggle="popover" data-bs-trigger="hover" data-bs-placement="top" data-bs-html="true" data-bs-content="<img src='<?=base_url('uploads/'.$app_licant_log->applicantImg)?>' alt='Applicant Image' width='100'>"><?=$app_licant_log->applicantName?></td>
                    <td><?=$app_licant_log->loanAmount?></td>
                    <td><?=$app_licant_log->currency?></td>
                    <td><?=$app_licant_log->interestRate?></td>
                    <td><?=$app_licant_log->loanStartDate?></td>
                    <td><?=$app_licant_log->loanEndDate?></td>
                    <td><?=$app_licant_log->mem_serial?></td>
                    <td><a href="<?=base_url('/dashboard/loanmanager/view_profile/'.$app_licant_log->applicant_id)?>"  class="btn btn-sm btn-success"><i class="bi bi-person"></i> Profile</a></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
</div>