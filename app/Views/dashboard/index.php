<?php $this->extend('dashboard/partials/layout')?>

<?=$this->section('main')?>

<?php include('partials/stat/dashboard_summary_cards.php'); ?>

<div class="row">

	<div class="col-md-4">
		<div class="card">
			<div class="card-body">
				<?php include('partials/stat/dashboard_graph.php'); ?>
			</div>
		</div>
	</div>

	<div class="col-md-8">
		<div class="card">
			<div class="card-header">
				 <ul class="nav nav-pills" id="myTabs">
				    <li class="nav-item">
				      <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home">Club Payments</a>
				    </li>
				    <li class="nav-item">
				      <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile">Loan Payment</a>
				    </li>
				    <li class="nav-item">
				      <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact">Team Members</a>
				    </li>
				  </ul>
			</div>
			<div class="card-body text-dark">
				  <div class="tab-content text-dark mt-2">
				    <div class="tab-pane text-dark fade show active" id="home">
				      <h3>Club Membership Saving Payments Log Aggregations</h3>
				     <?php include('partials/stat/club_payment_summary_table.php'); ?>
				    </div>
				    <div class="tab-pane fade text-dark" id="profile">
				      <h3>Loan Payment Summary Table</h3>
				      <?php include('partials/stat/loan_payment_summary_table.php'); ?>
				    </div>
				    <div class="tab-pane fade text-dark" id="contact">
				      <h3>Team Members - Agents</h3>
				      <?php include('partials/stat/team_members_table.php'); ?> 
				    </div>
				  </div>
			</div>
		</div>
	</div>

</div>


<?=$this->endSection()?>