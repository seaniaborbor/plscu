<?php $this->extend('dashboard/partials/layout')?>

<?=$this->section('main')?>

<div class="row">
	<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Holy guacamole!</strong> Your Report is ready
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<!-- 
	get_all_report_payment_log
total_pending_lrd
total_pending_usd
total_approved_lrd
total_approved_usd

-->

	<div class="col-md-4">
		<table class="table table-hover table-stripped">
			<thead>
				<tr>
				<td>Date</td>
				<td>Transaction Description</td>
				<td>Value</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?=$startingDate." - ".$endingDate?></td>
					<td>Total Liberian Dollars Saved (Pending)</td>
					<td><?=$total_pending_lrd?></td>
				</tr>

				<tr>
					<td><?=$startingDate." - ".$endingDate?></td>
					<td>Total Liberian Dollars Saved (Approved)</td>
					<td><?=$total_approved_lrd?></td>
				</tr>

				<tr>
					<td><?=$startingDate." - ".$endingDate?></td>
					<td>Total United States Dollars Saved (Pending)</td>
					<td><?=$total_pending_usd?></td>
				</tr>

				<tr>
					<td><?=$startingDate." - ".$endingDate?></td>
					<td>Total United States Dollars Saved (Approved)</td>
					<td><?=$total_approved_usd?></td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="col-md-8">
		<?php include('partials/club_report/_club_payment_summary_by_individual.php'); ?>
	</div>
</div>

<?=$this->endSection()?>