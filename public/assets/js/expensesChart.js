// charts.js

document.addEventListener('DOMContentLoaded', function () {
  // MonthlyExpensesChart---------------------------------------------------
  var ctxMonthly = document.getElementById('monthlyExpensesChart').getContext('2d');
  var monthlyLabels = JSON.parse(document.getElementById('monthlyLabels').textContent);
  var monthlyData = JSON.parse(document.getElementById('monthlyData').textContent);

  var monthlyExpensesChart = new Chart(ctxMonthly, {
      type: 'line',
      data: {
          labels: monthlyLabels,
          datasets: [{
              label: 'Monthly Expenses',
              data: monthlyData,
              backgroundColor: 'rgba(54, 162, 235, 0.2)',
              borderColor: 'rgba(54, 162, 235, 1)',
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
  });

  // DailyExpensesChart-----------------------------------------------------------
  var ctxDaily = document.getElementById('dailyExpensesChart').getContext('2d');
  var dailyLabels = JSON.parse(document.getElementById('dailyLabels').textContent);
  var dailyData = JSON.parse(document.getElementById('dailyData').textContent);

  var dailyExpensesChart = new Chart(ctxDaily, {
      type: 'line',
      data: {
          labels: dailyLabels,
          datasets: [{
              label: 'Daily Expenses',
              data: dailyData,
              backgroundColor: 'rgba(255, 99, 132, 0.2)',
              borderColor: 'rgba(255, 99, 132, 1)',
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
  });
});
