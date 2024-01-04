<?php 
function calculateTotalAmount($rate, $amount) {
    // Calculate total amount using the formula (rate * amount) + amount
    $totalAmount = (($rate/100) * $amount) + $amount;

    return ceil($totalAmount);
}

?>

<?php //print_r($loan_payment_log); ?>
<div class="table-responsive">
       <table id="example3" class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Loan Amt</th>
            <th>Rate</th>
            <th>Total to pay</th>
            <th>Amt Paid</th>
            <th>Balance</th>
            <th>Status</th>
            <th>More</th>
        </tr>
    </thead>
    <tbody>
        <?php if(isset($total_pmt_per_aplicnt)) : ?>
            <?php foreach ($total_pmt_per_aplicnt as $pmt_pr_plicant) : ?>
                <tr>
                    <!-- Add a data-bs-toggle attribute with value "popover" -->
                    <td data-bs-toggle="popover" data-bs-trigger="hover" data-bs-placement="top" data-bs-html="true" data-bs-content="<img src='<?=base_url('uploads/'.$pmt_pr_plicant->applicantImg)?>' alt='User Image' width='100'>"><?=$pmt_pr_plicant->fullName?></td>
                    <td><?=$pmt_pr_plicant->loanAmount.''.$pmt_pr_plicant->currency?></td>
                    <td><?=$pmt_pr_plicant->interestRate.'%'?></td>
                    <td><?=calculateTotalAmount($pmt_pr_plicant->interestRate, $pmt_pr_plicant->loanAmount)?></td>
                    <td><?=$pmt_pr_plicant->total_pmt?></td>
                    <td><?=calculateTotalAmount($pmt_pr_plicant->interestRate, $pmt_pr_plicant->loanAmount) - $pmt_pr_plicant->total_pmt?></td>
                    <td><i class="bi fw-bold bi-x text-danger"></i></td>
                    <td><a href="<?=base_url('dashboard/loanmanager/view_profile/'.$pmt_pr_plicant->id)?>" class="btn btn-sm btn-success"><i class="bi bi-person"> </i>Profile</button></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
</div>

<!-- 
    Array ( [0] => stdClass Object ( [id] => 7 [serial_no] => QFBmqk [amount] => 0 [pmtCurrency] => LRD [loggedBy] => 1 [loggedDate] => 2023-12-29 11:19:33 [fullName] => Jane Doe [gender] => Male [applicantImg] => 1703855165_45be5fdc859e88d364c3.jpg [phone] => 0775577736 [email] => admin@gmail.com [address] => new georgia gulf [mem_serial] => 4 [loanAmount] => 676 [currency] => LRD [loanStartDate] => 2023-12-30 [loanEndDate] => 2023-12-30 [interestRate] => 444 [loan_aggrement_form] => 1703855165_054707c5b04c3d672397.jpg [regBy] => 1 [lstEdited] => 2023-12-29 05:06:05 [pmtStatus] => complete [total_pmt] => 55 ) )
    -->