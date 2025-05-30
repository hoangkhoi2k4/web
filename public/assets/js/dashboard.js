 // Example chart with Chart.js

 var ctx = document.getElementById('myTopChart').getContext('2d');

 var myChart = new Chart(ctx, {
     data: {
         labels: ['Dự án A', 'Dự án B', 'Dự án C', 'Dự án D', 'Dự án E'],
         datasets: [{
             label: 'Tiến độ công việc (%)',
             type: 'bar',
             data: [89, 75, 70, 65, 60],
             backgroundColor: '#3498db',
             borderColor: '#2980b9',
             borderWidth: 1
         }]
     },
     options: {
         responsive: true,
         plugins: {
             legend: {
                 position: 'top',
                 align: 'center' 
             }
         }
     }
 });

 var cty = document.getElementById('myBadChart').getContext('2d');
 var myChart = new Chart(cty, {
     data: {
         labels: ['Dự án A', 'Dự án B', 'Dự án C', 'Dự án D', 'Dự án E'],
         datasets: [{
             label: 'Tiến độ công việc (%)',
             type: 'line',
             data: [30, 25, 24, 20, 15],
             backgroundColor: '#3498db',
             borderColor: '#2980b9',
             borderWidth: 1
         }]
     },
     options: {
         responsive: true,
         plugins: {
             legend: {
                 position: 'top',
                 align: 'center' 
             }
         }
     }
 });