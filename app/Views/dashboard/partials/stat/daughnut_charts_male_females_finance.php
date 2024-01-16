<div class="card shadow-lg">
  <div class="card-body">
    
  <canvas id="myDoughnutChart" width="400" height="400"></canvas>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      // Sample data for the doughnut chart
      var data = {
        labels: ['Red', 'Yellow', 'Green'],
        datasets: [{
          data: [30, 40, 30],
          backgroundColor: ['#007bff;', '#00ff00', '#007bff']
        }]
      };

      // Doughnut chart configuration
      var options = {
        cutout: '70%', // Adjust the cutout percentage as needed
        responsive: true,
        maintainAspectRatio: false
      };

      // Get the canvas element and create the doughnut chart
      var ctx = document.getElementById('myDoughnutChart').getContext('2d');
      var myDoughnutChart = new Chart(ctx, {
        type: 'doughnut',
        data: data,
        options: options
      });
    });
  </script>
  </div>
</div>