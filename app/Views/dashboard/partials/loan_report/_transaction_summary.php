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
						<td>From</td>
						<td>To</td>
						<td>Value</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Total loan payment in Liberian Dollars Pending</td>
						<td><?=$startingDate?></td>
						<td><?=$endingDate?></td>
						<td><?=$totalLRDpaid_pending?></td>
					</tr>
					<tr>
						<td>Total loan payment in Liberian Dollars Approved</td>
						<td><?=$startingDate?></td>
						<td><?=$endingDate?></td>
						<td><?=$totalLRDpaid_approved?></td>
					</tr>
					<tr>
						<td>Total loan payment in United States Dollars Pending</td>
						<td><?=$startingDate?></td>
						<td><?=$endingDate?></td>
						<td><?=$totalUSDpaid_pending?></td>
					</tr>
					<tr>
						<td>Total loan payment in United States Dollars Approved</td>
						<td><?=$startingDate?></td>
						<td><?=$endingDate?></td>
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
						<td>From</td>
						<td>To</td>
						<td>Value</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Total Loan amount applied for but pending (not yet approved) in LRD</td>
						<td><?=$startingDate?></td>
						<td><?=$endingDate?></td>
						<td><?=$sumOfLrdLoanOutPending?></td>
					</tr>
					<tr>
						<td>Total Loan amount given Out  (approved) In LRD</td>
						<td><?=$startingDate?></td>
						<td><?=$endingDate?></td>
						<td><?=$sumOfLrdLoanOutApproved?></td>
					</tr>
					<tr>
						<td>Total Loan amount applied for but pending (not yet approved) in USD</td>
						<td><?=$startingDate?></td>
						<td><?=$endingDate?></td>
						<td><?=$sumofUsdLoanOutPApproved?></td>
					</tr>
					<tr>
						<td>Total Loan amount given Out  (approved) In USD</td>
						<td><?=$startingDate?></td>
						<td><?=$endingDate?></td>
						<td><?=$sumofUsdLoanOutPApproved?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	<div class="col-md-4">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-6">
						<h1 class="text-success"><?=$sumOfLrdLoanOutApproved-$totalLRDpaid_approved?></h1>
						<h4>LRD Profit/Loss Statment</h4>
						<p class="lead ">The Amount above is the difference between the total loan given out and the payment made by borrowers between <?=$startingDate?> to <?=$endingDate?>. Base on the figure above, you experience a
						 <?php if($sumOfLrdLoanOutApproved < $totalLRDpaid_approved){ echo "loss of "; }else{ echo " profit of "; } echo $sumOfLrdLoanOutApproved-$totalLRDpaid_approved; ?>  </p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>