@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center my-4">Welcome to the ERP</h1>

        <!-- Quick Stats -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Total Clients</h5>
                        <p class="card-text display-4">{{ $totalClients }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Total Equipment</h5>
                        <p class="card-text display-4">{{ $totalEquipment }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Active Contracts</h5>
                        <p class="card-text display-4">{{ $activeContracts }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Pending Maintenance</h5>
                        <p class="card-text display-4">{{ $pendingMaintenance }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Feature Cards -->
        <div class="row">
            <!-- Clients Card -->
            <div class="col-md-3 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Clients</h5>
                        <p class="card-text">Manage client information.</p>
                        <a href="{{ route('clients.index') }}" class="btn btn-primary">Go to Clients</a>
                    </div>
                </div>
            </div>

            <!-- Equipment Card -->
            <div class="col-md-3 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Equipment</h5>
                        <p class="card-text">Manage equipment inventory.</p>
                        <a href="{{ route('equipment.index') }}" class="btn btn-primary">Go to Equipment</a>
                    </div>
                </div>
            </div>

            <!-- Contracts Card -->
            <div class="col-md-3 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Contracts</h5>
                        <p class="card-text">Manage rental contracts.</p>
                        <a href="{{ route('contracts.index') }}" class="btn btn-primary">Go to Contracts</a>
                    </div>
                </div>
            </div>

            <!-- Maintenance Logs Card -->
            <div class="col-md-3 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Maintenance Logs</h5>
                        <p class="card-text">Track equipment maintenance.</p>
                        <a href="{{ route('maintenance-logs.index') }}" class="btn btn-primary">Go to Maintenance Logs</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-4">
                <canvas id="equipmentStatsChart"></canvas>
            </div>

            <div class="col-md-8">
                <canvas id="profitMarginsChart"></canvas>
            </div>

            <div class="col-md-12">
                <canvas id="outstandingPaymentsChart"></canvas>
            </div>
        </div>

    </div>

    <script>
    // Register the datalabels plugin globally
    Chart.register(ChartDataLabels);

    // Fetch equipment stats via AJAX
    fetch('/statistics/equipment')
        .then(response => response.json())
        .then(data => {
            // Set default font size for the chart
            Chart.defaults.font.size = 16;

            const ctx = document.getElementById('equipmentStatsChart').getContext('2d');
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: data.labels, // Labels for the legend
                    datasets: [{
                        data: data.data, // Data values
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.2)', // Available
                            'rgba(255, 99, 132, 0.2)', // Rented
                            'rgba(255, 206, 86, 0.2)', // Under Maintenance
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(255, 206, 86, 1)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    animation: {
                        duration: 1000,
                        easing: 'easeInOutQuad'
                    },
                    plugins: {
                        legend: {
                            position: 'top', // Legend position
                        },
                        title: {
                            display: true,
                            text: 'Equipment Status', // Chart title
                            font: {
                                size: 20
                            }
                        },
                        // Configure the datalabels plugin
                        datalabels: {
                            color: '#000', // Label text color
                            font: {
                                weight: 'bold', // Make labels bold
                                size: 16 // Label font size
                            },
                            formatter: (value, context) => {
                                // Display the label and value on the chart
                                return `${context.chart.data.labels[context.dataIndex]}\n${value}`;
                            }
                        }
                    }
                },
                plugins: [ChartDataLabels] // Register the plugin
            });
        });

    // Fetch financial stats via AJAX
    fetch('/statistics/financial')
        .then(response => response.json())
        .then(data => {
            // Set default font size for the charts
            Chart.defaults.font.size = 14;

            // Profit Margins Chart
            const profitMarginsCtx = document.getElementById('profitMarginsChart').getContext('2d');
            new Chart(profitMarginsCtx, {
                type: 'bar',
                data: {
                    labels: data.profitMargins.map(item => item.label),
                    datasets: [{
                        label: 'Profit Margin (%)',
                        data: data.profitMargins.map(item => item.profitMargin),
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false,
                        },
                        title: {
                            display: true,
                            text: 'Profit Margins by Equipment',
                            font: {
                                size: 16
                            }
                        },
                        datalabels: {
                            anchor: 'end',
                            align: 'end',
                            color: '#000',
                            font: {
                                weight: 'bold'
                            },
                            formatter: (value) => `${value}%`
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Profit Margin (%)'
                            }
                        }
                    }
                },
                plugins: [ChartDataLabels]
            });

            // Outstanding Payments Chart
            const outstandingPaymentsCtx = document.getElementById('outstandingPaymentsChart').getContext('2d');
            new Chart(outstandingPaymentsCtx, {
                type: 'bar',
                data: {
                    labels: data.outstandingPayments.map(item => item.label),
                    datasets: [{
                        label: 'Outstanding Amount ($)',
                        data: data.outstandingPayments.map(item => item.outstandingAmount),
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    indexAxis: 'y', // Horizontal bar chart
                    plugins: {
                        legend: {
                            display: false,
                        },
                        title: {
                            display: true,
                            text: 'Outstanding Payments by Client',
                            font: {
                                size: 16
                            }
                        },
                        datalabels: {
                            anchor: 'end',
                            align: 'end',
                            color: '#000',
                            font: {
                                weight: 'bold'
                            },
                            formatter: (value) => `$${value}`
                        }
                    },
                    scales: {
                        x: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Outstanding Amount ($)'
                            }
                        }
                    }
                },
                plugins: [ChartDataLabels]
            });
        });
    </script>
@endsection