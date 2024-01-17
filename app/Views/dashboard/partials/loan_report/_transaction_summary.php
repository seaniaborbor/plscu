<!-- 
	totalLRDpaid_pending
totalLRDpaid_approved
totalUSDpaid_pending
totalUSDpaid_approved

sumOfLrdLoanOutApproved
sumOfLrdLoanOutPending
sumofUsdLoanOutPApproved
sumofUsdLoanOutPending

-->

<div class="row">
	<div class="col-md-8">
		<div class="table-responsive">
			<div class="alert alert-success" role="alert">
			  <h4 class="alert-heading">Important Note</h4>
			  <p>This table below shows the payment summary of creditors(people who took loans) pay aggregation (sum) in the categories of pending and approved with respect to their currencies(LD & USD)</p>
			  <hr>
			  <p class="mb-0">It does not include loan the actual amount taken - only payment </p>
			</div>
			<table class="table table-sm table-stripped table-hover">
				<thead>
					<tr>
						<td>Description</td>
						<td>Value</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Total Liberian Dollars Pending</td>
						<td><?=$totalLRDpaid_pending?></td>
					</tr>
					<tr>
						<td>Total Liberian Dollars Approved</td>
						<td><?=$totalLRDpaid_approved?></td>
					</tr>
					<tr>
						<td>Total United States Dollars Pending</td>
						<td><?=$totalUSDpaid_pending?></td>
					</tr>
					<tr>
						<td>Total United States Dollars Approved</td>
						<td><?=$totalUSDpaid_approved?></td>
					</tr>
				</tbody>
			</table>
		</div>

		<div class="table-responsive">
			<div class="alert alert-info" role="alert">
			  <h4 class="alert-heading">Important Note</h4>
			  <p>This table below shows the summary of loans(money you've credit) aggregation (sum) in the categories of pending and approved with respect to their currencies(LD & USD)</p>
			  <hr>
			  <p class="mb-0">It does not include loan the any amount pay by those who credited </p>
			</div>
			<table class="table table-sm table-stripped table-hover">
				<thead>
					<tr>
						<td>Description</td>
						<td>Value</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Total Loan amount applied for but pending (not yet approved) in LRD</td>
						<td><?=$sumOfLrdLoanOutPending?></td>
					</tr>
					<tr>
						<td>Total Loan amount given Out  (approved) In LRD</td>
						<td><?=$totalLRDpaid_approved?></td>
					</tr>
					<tr>
						<td>Total Loan amount applied for but pending (not yet approved) in USD</td>
						<td><?=$sumofUsdLoanOutPApproved?></td>
					</tr>
					<tr>
						<td>Total Loan amount given Out  (approved) In USD</td>
						<td><?=$sumofUsdLoanOutPApproved?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>