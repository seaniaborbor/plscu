<?php $this->extend('dashboard/partials/layout')?>

<?=$this->section('main')?>
	<div class="row">

		<div class="col-md-8 pt-2">
			<div class="card ">
				<div class="card-header ">
					<h2 class="text-success">Edit loan payment of <?=$client_profile[0]->applicantName?> </h2>
				</div>

				<div class="card-body">				
					 <form method="post" action="/dashboard/edit/log_loan_payment/<?=$data_to_edit['id']?>">
						<div class="row align-items-center">
						<div class="col-md-8 mb-3">
							<div class="form-group">
								<label>Loan Serial </label>
								<input type="text" value="<?=$data_to_edit['serial_no']?>" name="serial_no" class="form-control form-control-lg">
								<?php if(isset($lonePaymentLogValidation) && $lonePaymentLogValidation->hasError('serial_no')) : ?>
						           <div class="text-danger"><?=$lonePaymentLogValidation->getError('serial_no')?></div>
						        <?php endif; ?>
							</div>
						</div>
						<div class="col-md-8 mb-3">
							<div class="form-group">
								<label>Amount</label>
								<input type="number" value="<?=$data_to_edit['amount']?>" min='0' name="mount" class="form-control form-control-lg">
								<?php if(isset($lonePaymentLogValidation) && $lonePaymentLogValidation->hasError('mount')) : ?>
						           <div class="text-danger"><?=$lonePaymentLogValidation->getError('mount')?></div>
						        <?php endif; ?>
							</div>
						</div>
						<div class="col-md-8 mb-3">
							<div class="form-group ">
								<label>Loan Currency</label>
								<select class="form-control form-control-lg " name="pmtCurrency" >
									<option value="">Choose</option>
									<option <?=set_select('pmtCurrency', $data_to_edit['pmtCurrency'])?> value="LRD">Liberian Dollars</option>
									<option <?=set_select('pmtCurrency', $data_to_edit['pmtCurrency'])?> value="USD">United States Dollars</option>
								</select>
								<?php if(isset($lonePaymentLogValidation) && $lonePaymentLogValidation->hasError('pmtCurrency')) : ?>
						           <div class="text-danger"><?=$lonePaymentLogValidation->getError('pmtCurrency')?></div>
						        <?php endif; ?>
							</div>
						</div>
						<div class="col-md-8 mb-3">
							<div class="form-group  pt-4">
								<button class="btn pull-right  btn-success ">Update Record</button>
							</div>
						</div>
					</div>
					</form> 
				</div>
			</div>
		</div>

		<div class="col-md-4 pt-2">
			<div class="card shadow-lg">
				<div class="card-body">
					  <?php include('partials/loan_applicant_profile.php'); ?>
				</div>
			</div>
		</div>

	</div>
<?=$this->endSection()?>