<div class="card mb-3 border-3 ">
		<div class="card-header shadow-lg">
			<h3>Log a new loan payment</h3>
		</div>
		<div class="card-body">
			<form method="post" action="/dashboard/loan_payments">
				<div class="row align-items-center">
				<div class="col-md-12 mb-3">
					<div class="form-group">
						<label>Loan Serial </label>
						<input type="text" value="<?= set_value('serial_no')?>" name="serial_no" class="form-control-lg form-control">
						<?php if(isset($lonePaymentLogValidation) && $lonePaymentLogValidation->hasError('serial_no')) : ?>
				           <div class="text-danger"><?=$lonePaymentLogValidation->getError('serial_no')?></div>
				        <?php endif; ?>
					</div>
				</div>
				<div class="col-md-12 mb-3">
					<div class="form-group">
						<label>Amount</label>
						<input type="number" value="<?= set_value('mount')?>" min='0' name="mount" class="form-control-lg form-control">
						<?php if(isset($lonePaymentLogValidation) && $lonePaymentLogValidation->hasError('mount')) : ?>
				           <div class="text-danger"><?=$lonePaymentLogValidation->getError('mount')?></div>
				        <?php endif; ?>
					</div>
				</div>
				<div class="col-md-12 mb-3">
					<div class="form-group ">
						<label>Loan Currency</label>
						<select class="form-control form-control-lg" name="pmtCurrency" >
							<option value="">Choose</option>
							<option <?=set_select('pmtCurrency', 'LRD')?> value="LRD">Liberian Dollars</option>
							<option <?=set_select('pmtCurrency', 'USD')?> value="USD">United States Dollars</option>
						</select>
						<?php if(isset($lonePaymentLogValidation) && $lonePaymentLogValidation->hasError('pmtCurrency')) : ?>
				           <div class="text-danger"><?=$lonePaymentLogValidation->getError('pmtCurrency')?></div>
				        <?php endif; ?>
					</div>
				</div>
				<div class="col-md-12 mb-3">
					<div class="form-group  pt-4">
						<button class="btn pull-right   btn-success ">Record Payment</button>
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>