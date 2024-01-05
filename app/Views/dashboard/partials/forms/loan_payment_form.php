<div class="card mb-3">
		<div class="card-header bg-success text-white">
			<h3>Log a new loan payment</h3>
		</div>
		<div class="card-body">
			<form method="post" action="/dashboard/log_loan_payment">
				<div class="row align-items-center">
				<div class="col-3">
					<div class="form-group">
						<label>Loan Serial </label>
						<input type="text" value="<?= set_value('serial_no')?>" name="serial_no" class="border-success form-control">
						<?php if(isset($lonePaymentLogValidation) && $lonePaymentLogValidation->hasError('serial_no')) : ?>
				           <div class="text-danger"><?=$lonePaymentLogValidation->getError('serial_no')?></div>
				        <?php endif; ?>
					</div>
				</div>
				<div class="col-3">
					<div class="form-group">
						<label>Amount</label>
						<input type="number" value="<?= set_value('mount')?>" min='0' name="mount" class="border-success form-control">
						<?php if(isset($lonePaymentLogValidation) && $lonePaymentLogValidation->hasError('mount')) : ?>
				           <div class="text-danger"><?=$lonePaymentLogValidation->getError('mount')?></div>
				        <?php endif; ?>
					</div>
				</div>
				<div class="col-3">
					<div class="form-group ">
						<label>Loan Currency</label>
						<select class="form-control border-success" name="pmtCurrency" >
							<option value="">Choose</option>
							<option <?=set_select('pmtCurrency', 'LRD')?> value="LRD">Liberian Dollars</option>
							<option <?=set_select('pmtCurrency', 'USD')?> value="USD">United States Dollars</option>
						</select>
						<?php if(isset($lonePaymentLogValidation) && $lonePaymentLogValidation->hasError('pmtCurrency')) : ?>
				           <div class="text-danger"><?=$lonePaymentLogValidation->getError('pmtCurrency')?></div>
				        <?php endif; ?>
					</div>
				</div>
				<div class="col-3">
					<div class="form-group  pt-4">
						<button class="btn pull-right w-100 btn-success ">Record Payment</button>
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>