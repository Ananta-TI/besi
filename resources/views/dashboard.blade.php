<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-700">
                    <h1 class="text-3xl font-bold mb-6">Dashboard</h1>

                    <!-- Statistik -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
                        <!-- Total Products -->
                        <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                            <h2 class="text-xl font-semibold">Total Products</h2>
                            <p class="text-4xl font-bold text-blue-500">{{ $totalProducts }}</p>
                        </div>

                        <!-- Total Contacts -->
                        <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                            <h2 class="text-xl font-semibold">Total Contacts</h2>
                            <p class="text-4xl font-bold text-green-500">{{ $totalContacts }}</p>
                        </div>

                        <!-- Total Articles -->
                        <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                            <h2 class="text-xl font-semibold">Total Articles</h2>
                            <p class="text-4xl font-bold text-red-500">{{ $totalArticles }}</p>
                        </div>
                        <!-- Diagram Batang -->
                        <div class="bg-gray-100 p-6 rounded-lg shadow-md mb-8">
                            <h2 class="text-xl font-semibold mb-4">Bar Chart: Data Distribution</h2>
                            <div class="flex justify-center">
                                <canvas id="barChart" class="w-64 h-64"></canvas>
                            </div>
                        </div>

                        <!-- Diagram Lingkaran -->
                        <div class="bg-gray-100 p-6 rounded-lg shadow-md mb-8">
                            <h2 class="text-xl font-semibold mb-4">Pie Chart: Data Distribution</h2>
                            <div class="flex justify-center">
                                <canvas id="pieChart" class="w-64 h-64"></canvas>
                            </div>
                        </div>

                        <!-- Diagram Garis -->
                        <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                            <h2 class="text-xl font-semibold mb-4">Line Chart: Data Trends</h2>
                            <div class="flex justify-center">
                                <canvas id="lineChart" class="w-64 h-64"></canvas>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Script untuk Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
      // Bar Chart
      const barCtx = document.getElementById('barChart').getContext('2d');
      const barChart = new Chart(barCtx, {
          type: 'bar', // Diagram Batang
          data: {
              labels: ['Products', 'Contacts', 'Articles'],
              datasets: [{
                  label: 'Total Data',
                  data: [{{ $totalProducts }}, {{ $totalContacts }}, {{ $totalArticles }}],
                  backgroundColor: [
                      'rgba(54, 162, 235, 0.7)', // Blue
                      'rgba(75, 192, 192, 0.7)', // Green
                      'rgba(255, 99, 132, 0.7)'  // Red
                  ],
                  borderColor: [
                      'rgba(54, 162, 235, 1)', // Blue
                      'rgba(75, 192, 192, 1)', // Green
                      'rgba(255, 99, 132, 1)'  // Red
                  ],
                  borderWidth: 1
              }]
          },
          options: {
              responsive: true,
              maintainAspectRatio: false,
              scales: {
                  y: {
                      beginAtZero: true
                  }
              },
              plugins: {
                  legend: {
                      position: 'top',
                  }
              }
          }
      });

      // Pie Chart
      const pieCtx = document.getElementById('pieChart').getContext('2d');
      const pieChart = new Chart(pieCtx, {
          type: 'pie', // Diagram Lingkaran
          data: {
              labels: ['Products', 'Contacts', 'Articles'],
              datasets: [{
                  label: 'Total Data',
                  data: [{{ $totalProducts }}, {{ $totalContacts }}, {{ $totalArticles }}],
                  backgroundColor: [
                      'rgba(54, 162, 235, 0.7)', // Blue
                      'rgba(75, 192, 192, 0.7)', // Green
                      'rgba(255, 99, 132, 0.7)'  // Red
                  ],
                  borderColor: [
                      'rgba(54, 162, 235, 1)', // Blue
                      'rgba(75, 192, 192, 1)', // Green
                      'rgba(255, 99, 132, 1)'  // Red
                  ],
                  borderWidth: 1
              }]
          },
          options: {
              responsive: true,
              maintainAspectRatio: false,
              plugins: {
                  legend: {
                      position: 'top',
                  }
              }
          }
      });

      // Line Chart
      const lineCtx = document.getElementById('lineChart').getContext('2d');
      const lineChart = new Chart(lineCtx, {
          type: 'line', // Diagram Garis
          data: {
              labels: ['Products', 'Contacts', 'Articles'],
              datasets: [{
                  label: 'Total Data Trends',
                  data: [{{ $totalProducts }}, {{ $totalContacts }}, {{ $totalArticles }}],
                  borderColor: 'rgba(75, 192, 192, 1)',
                  backgroundColor: 'rgba(75, 192, 192, 0.2)',
                  fill: true,
                  tension: 0.4,
                  borderWidth: 2
              }]
          },
          options: {
              responsive: true,
              maintainAspectRatio: false,
              plugins: {
                  legend: {
                      position: 'top',
                  }
              }
          }
      });
    </script>
</x-app-layout>
