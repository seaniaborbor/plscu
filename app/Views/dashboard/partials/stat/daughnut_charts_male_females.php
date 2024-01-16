
  <canvas id="myDoughnutChart" width="400" height="400"></canvas>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      // Sample data for the doughnut chart
      var data = {
        labels: ['Red', 'Yellow', 'Green'],
        datasets: [{
          data: [30, 40, 30],
          backgroundColor: ['#ff0000', '#ffff00', '#00ff00']
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