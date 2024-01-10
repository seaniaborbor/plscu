
  <!-- Include Chart.js from CDN -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Create a canvas element to render the chart -->
  <canvas id="myBarChart" width="400" height="200"></canvas>

  <script>
    // Sample data for the bar chart
    var data = {
      labels: [

            'Total Due Payments LRD', 
            'Total Due Payments USD', 
            'Total Loan Payment LRD', 
            'Total Loan Payments USD'
      ],
      datasets: [{
        label: 'Monthly Sales',
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          // 'rgba(153, 102, 255, 0.2)',
          // 'rgba(255, 159, 64, 0.2)',
          // 'rgba(255, 0, 0, 0.2)',
          // 'rgba(0, 255, 0, 0.2)',
          // 'rgba(0, 0, 255, 0.2)',
          // 'rgba(128, 0, 128, 0.2)',
          // 'rgba(255, 165, 0, 0.2)',
          // 'rgba(0, 128, 128, 0.2)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          // 'rgba(153, 102, 255, 1)',
          // 'rgba(255, 159, 64, 1)',
          // 'rgba(255, 0, 0, 1)',
          // 'rgba(0, 255, 0, 1)',
          // 'rgba(0, 0, 255, 1)',
          // 'rgba(128, 0, 128, 1)',
          // 'rgba(255, 165, 0, 1)',
          // 'rgba(0, 128, 128, 1)'
        ],
        /* 
            total_club_members
            total_loan_applicants
            total_due_pmnt_lrd
            total_due_pmnt_usd
            total_loan_pmnt_lrd
            total_loan_pmnt_usd

            total_due_pmnt_pending_lrd
            total_due_pmnt_pending_usd
            total_loan_pmnt_pending_lrd
            total_loan_pmnt_pending_usd

            total_club_members_pending
            total_loan_applicants_pending
          */
        borderWidth: 1,
        data: [
            <?=$total_due_pmnt_lrd?>,
            <?=$total_due_pmnt_usd?>,
            <?=$total_loan_pmnt_lrd?>,
            <?=$total_loan_pmnt_usd?>
        ]
      }]
    };

    // Chart configuration
    var options = {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    };

    // Get the canvas element
    var ctx = document.getElementById('myBarChart').getContext('2d');

    // Create the bar chart
    var myBarChart = new Chart(ctx, {
      type: 'bar',
      data: data,
      options: options
    });
  </script>