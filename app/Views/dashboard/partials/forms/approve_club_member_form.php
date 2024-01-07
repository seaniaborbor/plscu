<div class="card">
    <div class="card-header text-dark">
        <h5>Approve Club Member</h5>
    </div>
    <form method="post" action="<?=base_url('/dashboard/approve/membership/'.$member_profile[0]->memberSerialNo)?>">
            <div class="card-body text-dark">
            <div class="form-group mb-3">
                <label>Registration Fees </label>
                <input type="number" name="regFees" value="<?= set_value('regFees')?>"  class="form-control" >
                <?php if(isset($validation) && $validation->hasError('regFees')) : ?>
                   <div class="text-danger"><?=$validation->getError('regFees')?></div>
                <?php endif; ?>
            </div>

            <div class="form-group mb-3">
            <label>Registration Requirement Fees Payment Status</label>
            <select class="form-control" name="regFeesStatus">
                <option value="">Choose</option>
                <option <?= set_select('regFeesStatus', 'Complete') ?> value="Complete">Not paid in full</option>
                <option <?= set_select('regFeesStatus', 'Incomplete') ?> value="Incomplete">Paid in full</option>
            </select>
            <?php if (isset($validation) && $validation->hasError('regFeesStatus')) : ?>
                <div class="text-danger"><?= $validation->getError('regFeesStatus') ?></div>
            <?php endif; ?>
        </div>


            <div class="form-group mb-3">
            <label>Account Activation Status</label>
            <select class="form-control" name="accountStatus">
                <option value="">Choose</option>
                <option <?= set_select('accountStatus', 'Pending') ?> value="Pending">Pending</option>
                <option <?= set_select('accountStatus', 'Deactivated') ?> value="Approved">Approved</option>
            </select>
            <?php if (isset($validation) && $validation->hasError('accountStatus')) : ?>
                <div class="text-danger"><?= $validation->getError('accountStatus') ?></div>
            <?php endif; ?>
        </div>

        <button class="btn btn-success">Accept Applicant</button>
    </form>
    </div>
</div>