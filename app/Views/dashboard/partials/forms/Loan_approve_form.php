	<div class="form-group mb-3">
	    <label>Date on which loan is given out</label>
			<input type="date" name="loanStartDate" value="<?= set_value('loanStartDate')?>"  class="form-control" >
	    <?php if (isset($validation) && $validation->hasError('loanStartDate')) : ?>
	        <div class="text-danger"><?= $validation->getError('loanStartDate') ?></div>
	    <?php endif; ?>
	</div>

	<div class="form-group mb-3">
	    <label>Date on which loan ends</label>
			<input type="date" name="loanEndDate" value="<?= set_value('loanEndDate')?>"  class="form-control" >
	    <?php if (isset($validation) && $validation->hasError('loanEndDate')) : ?>
	        <div class="text-danger"><?= $validation->getError('loanEndDate') ?></div>
	    <?php endif; ?>
	</div>