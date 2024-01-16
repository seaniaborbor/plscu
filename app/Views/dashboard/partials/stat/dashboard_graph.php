<div class="bg-light shadow-sm card-body border m-3">
   <canvas id="myLineChart" width="400" height="400"></canvas>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      // Sample data for the line graph
      var data = {
        labels: ['January', 'February', 'March', 'April', 'May'],
        datasets: [{
          label: 'Monthly Sales',
          data: [50, 80, 60, 100, 75],
          borderColor: '#007bff', // Line color
          borderWidth: 2, // Line width
          fill: false // Do not fill the area under the line
        }]
      };

      // Line graph configuration
      var options = {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
          x: {
            type: 'category',
            labels: data.labels
          },
          y: {
            beginAtZero: true
          }
        }
      };

      // Get the canvas element and create the line graph
      var ctx = document.getElementById('myLineChart').getContext('2d');
      var myLineChart = new Chart(ctx, {
        type: 'line',
        data: data,
        options: options
      });
    });
  </script>
</div>