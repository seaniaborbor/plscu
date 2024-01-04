<div class="table-responsive">
    <?php //print_r($loan_payment_log); ?>
<table id="example" class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Amount Paid</th>
            <th>Currency</th>
            <th>Recorded By</th>
            <th>Payment Date</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php if(isset($loan_payment_log)) : ?>
            <?php foreach ($loan_payment_log as $loan_log) : ?>
                <tr>
                    <!-- Add a data-bs-toggle attribute with value "popover" -->
                    <td data-bs-toggle="popover" data-bs-trigger="hover" data-bs-placement="top" data-bs-html="true" data-bs-content="<img src='<?=base_url('uploads/'.$loan_log->applicantImg)?>' alt='User Image' width='100'>"><?=$loan_log->payBy?></td>
                    <td><?=$loan_log->amount?></td>
                    <td><?=$loan_log->currency?></td>
                    <td><?=$loan_log->fullName?></td>
                    <td><?=$loan_log->loggedDate?></td>
                    <td><a href="/dashboard/edit/log_loan_payment/<?=$loan_log->payment_id?>" class="btn btn-sm btn-success"><i class="bi bi-pencil"></i> Edit</a></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
</div>