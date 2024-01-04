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
        <?php if(isset($payment_history)) : ?>
            <?php foreach ($payment_history as $pmt_log) : ?>
                <tr>
                    <!-- Add a data-bs-toggle attribute with value "popover" -->
                    <td data-bs-toggle="popover" data-bs-trigger="hover" data-bs-placement="top" data-bs-html="true" data-bs-content="<img src='<?=base_url('uploads/'.$pmt_log->applicantImg)?>' alt='User Image' width='100'>"><?=$pmt_log->payBy?></td>
                    <td><?=$pmt_log->amount?></td>
                    <td><?=$pmt_log->currency?></td>
                    <td><?=$pmt_log->fullName?></td>
                    <td><?=$pmt_log->loggedDate?></td>
                    <td><a href="/dashboard/edit/log_loan_payment/<?=$pmt_log->payment_id?>" class="btn btn-sm btn-success"><i class="bi bi-pencil"></i> Edit</a></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
