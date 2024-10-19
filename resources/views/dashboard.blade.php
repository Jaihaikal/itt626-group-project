@extends('template')

@section('content')
    @if (auth()->check() && auth()->user()->role === 'admin')
        <div class="container">
            <div class="col-12">
                <div class="card card-background card-background-after-none align-items-start mt-4 mb-5">
                    <div class="full-background"
                        style="background-image: url('../assets/img/header-blue-purple.jpg')"></div>
                    <div class="card-body text-start p-4 w-100">
                        <h3 class="text-white mb-2">Welcome Back</h3>
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <div class="col-lg-12 col-md-6 mb-md-0 mb-5">
                    <div class="card shadow-xs border h-100">
                        <div class="card-header pb-0">
                            <h6 class="font-weight-semibold text-lg mb-3">Expenses Chart</h6>
                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic radio toggle button group">
                                <button class="btn btn-primary toggle-chart" data-chart="monthly">Monthly</button>
                                <button class="btn btn-primary toggle-chart" data-chart="daily">Daily</button>
                            </div>
                        </div>
                        <div class="card-body py-3">
                            <div class="chart mb-2">
                                <canvas id="expensesChart" class="chart-canvas" height="90"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border shadow-xs mb-0">

            {{-- <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Monthly Expenses</div>

                        <div class="card-body">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center mt-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Daily Expenses</div>

                        <div class="card-body">
                            <canvas id="dailyExpensesChart" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div> --}}

        </div>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('expensesChart').getContext('2d');
            var monthlyLabels = {!! $monthlyLabels !!};
            var monthlyData = {!! $monthlyData !!};
            var dailyLabels = {!! $dailyLabels !!};
            var dailyData = {!! $dailyData !!};

            var expensesChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: monthlyLabels,
                    datasets: [{
                        label: 'Monthly Expenses',
                        data: monthlyData,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 2,
                        pointBackgroundColor: 'rgba(54, 162, 235, 1)',
                        // pointBorderColor: '#fff',
                        pointHoverBackgroundColor: '#fff',
                        pointHoverBorderColor: 'rgba(54, 162, 235, 1)'
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

            // Toggle between monthly and daily charts
            document.querySelectorAll('.toggle-chart').forEach(function(button) {
                button.addEventListener('click', function() {
                    var chartType = this.getAttribute('data-chart');
                    var chartData, chartLabels, chartLabel;

                    if (chartType === 'monthly') {
                        chartData = monthlyData;
                        chartLabels = monthlyLabels;
                        chartLabel = 'Monthly Expenses';
                    } else if (chartType === 'daily') {
                        chartData = dailyData;
                        chartLabels = dailyLabels;
                        chartLabel = 'Daily Expenses';
                    }

                    expensesChart.data.datasets[0].data = chartData;
                    expensesChart.data.labels = chartLabels;
                    expensesChart.data.datasets[0].label = chartLabel;
                    expensesChart.update();
                });
            });
        });
    </script>


    {{-- <script>
        // MonthlyExpensesChart---------------------------------------------------
        var ctxMonthly = document.getElementById('monthlyExpensesChart').getContext('2d');
        var monthlyLabels = {!! $monthlyLabels !!};
        var monthlyData = {!! $monthlyData !!};

        var monthlyExpensesChart = new Chart(ctxMonthly, {
            type: 'line',
            data: {
                labels: monthlyLabels,
                datasets: [{
                    label: 'Monthly Expenses',
                    data: monthlyData,
                    backgroundColor: 'rgba(54, 162, 235, 0.1)',
                    borderColor: 'rgba(54, 162, 235, 0.6)',
                    borderWidth: 1,
                    pointRadius: 3,
                    pointBackgroundColor: 'rgba(54, 162, 235, 0.6)',
                    pointBorderColor: 'rgba(54, 162, 235, 0.6)',
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: 'rgba(54, 162, 235, 1)',
                    pointHoverBorderColor: 'rgba(54, 162, 235, 1)'
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(200, 200, 200, 0.1)',
                            borderDash: [2, 2]
                        },
                        ticks: {
                            color: '#666',
                            font: {
                                size: 12
                            }
                        }
                    },
                    x: {
                        grid: {
                            color: 'rgba(200, 200, 200, 0.1)',
                            borderDash: [2, 2]
                        },
                        ticks: {
                            color: '#666',
                            font: {
                                size: 12
                            }
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.7)',
                        titleFont: {
                            size: 12
                        },
                        bodyFont: {
                            size: 10
                        },
                        xPadding: 10,
                        yPadding: 10,
                        displayColors: false
                    }
                },
                responsive: true,
                maintainAspectRatio: false
            }
        });

        //DailyExpensesChart-----------------------------------------------------------
        var ctxDaily = document.getElementById('dailyExpensesChart').getContext('2d');
        var dailyLabels = {!! $dailyLabels !!};
        var dailyData = {!! $dailyData !!};

        var dailyExpensesChart = new Chart(ctxDaily, {
            type: 'line',
            data: {
                labels: dailyLabels,
                datasets: [{
                    label: 'Daily Expenses',
                    data: dailyData,
                    backgroundColor: 'rgba(255, 99, 132, 0.1)',
                    borderColor: 'rgba(255, 99, 132, 0.6)',
                    borderWidth: 1,
                    pointRadius: 3,
                    pointBackgroundColor: 'rgba(255, 99, 132, 0.6)',
                    pointBorderColor: 'rgba(255, 99, 132, 0.6)',
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: 'rgba(255, 99, 132, 1)',
                    pointHoverBorderColor: 'rgba(255, 99, 132, 1)'
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(200, 200, 200, 0.1)',
                            borderDash: [2, 2]
                        },
                        ticks: {
                            color: '#666',
                            font: {
                                size: 12
                            }
                        }
                    },
                    x: {
                        grid: {
                            color: 'rgba(200, 200, 200, 0.1)',
                            borderDash: [2, 2]
                        },
                        ticks: {
                            color: '#666',
                            font: {
                                size: 12
                            }
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.7)',
                        titleFont: {
                            size: 12
                        },
                        bodyFont: {
                            size: 10
                        },
                        xPadding: 10,
                        yPadding: 10,
                        displayColors: false
                    }
                },
                responsive: true,
                maintainAspectRatio: false
            }
        });
    </script> --}}
@endsection
