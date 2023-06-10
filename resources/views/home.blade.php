@extends('layouts.app')

@section('content')
    <style>
        .packageChart {
            height: 410px;
            width: 410px
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                    <div class="card-header">Thống kê gói</div>

                    <div class="card-body">
                        <div class="chart-container"style="width: 400px;">
                            <canvas id="packageChart"></canvas>
                        </div>
                        <div class="chart-type">
                            <button id="barChartBtn" class="btn btn-primary">Hình cột <i class="fa-solid fa-chart-column" style="color: #ffffff;"></i></button>
                            <button id="lineChartBtn" class="btn btn-primary">Biểu đồ đường <i class="fa-solid fa-chart-line" style="color: #ffffff;"></i></button>
                            <button id="pieChartBtn" class="btn btn-primary">Hình tròn <i class="fa-solid fa-chart-pie" style="color: #ffffff;"></i></button>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('package.statistics') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-2 grid_box1">
                                <div class="form-group">
                                    <label for="start_date_static">Từ ngày:</label>
                                    <input type="date" id="start_date_static" name="start_date_static"
                                        class="form-control" value="{{ $startDate ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-2 grid_box1">
                                <div class="form-group">
                                    <label for="end_date_static">Đến ngày:</label>
                                    <input type="date" id="end_date_static" name="end_date_static" class="form-control"
                                        value="{{ $endDate ?? '' }}">
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <button type="submit" style="margin-top: -32px;" class="btn btn-primary">Chọn <i class="fa-sharp fa-solid fa-arrow-right" style="color: #ffffff;"></i></button>
                        </div>
                    </form>




                </div>
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    var ctx = document.getElementById('packageChart').getContext('2d');
                    var packageChart;

                    // Hàm tạo biểu đồ Bar Chart
                    function createBarChart() {
                        packageChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: {!! json_encode($packageNames) !!},
                                datasets: [{
                                    label: 'Package Statistics',
                                    data: {!! json_encode($packageCounts) !!},
                                    backgroundColor: {!! json_encode(array_values($colors)) !!},
                                    borderColor: {!! json_encode(array_values($colors)) !!},
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        precision: 0,
                                        stepSize: 1
                                    }
                                }
                            }
                        });
                    }

                    // Hàm tạo biểu đồ Line Chart
                    function createLineChart() {
                        packageChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: {!! json_encode($packageNames) !!},
                                datasets: [{
                                    label: 'Package Statistics',
                                    data: {!! json_encode($packageCounts) !!},
                                    backgroundColor: {!! json_encode(array_values($colors)) !!},
                                    borderColor: {!! json_encode(array_values($colors)) !!},
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        precision: 0,
                                        stepSize: 1
                                    }
                                }
                            }
                        });
                    }

                    // Hàm tạo biểu đồ Pie Chart
                    function createPieChart() {
                        packageChart = new Chart(ctx, {
                            type: 'pie',
                            data: {
                                labels: {!! json_encode($packageNames) !!},
                                datasets: [{
                                    label: 'Package Statistics',
                                    data: {!! json_encode($packageCounts) !!},
                                    backgroundColor: {!! json_encode(array_values($colors)) !!},
                                    borderColor: {!! json_encode(array_values($colors)) !!},
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: {
                                        position: 'top',
                                    },
                                    title: {
                                        display: true,
                                        text: 'Package Statistics'
                                    }
                                }
                            }
                        });
                    }

                    // Mặc định tạo Bar Chart khi trang được tải
                    createBarChart();

                    // Xử lý sự kiện click nút Bar Chart
                    document.getElementById('barChartBtn').addEventListener('click', function() {
                        packageChart.destroy(); // Xóa biểu đồ hiện tại
                        createBarChart(); // Tạo lại biểu đồ Bar Chart
                    });

                    // Xử lý sự kiện click nút Line Chart
                    document.getElementById('lineChartBtn').addEventListener('click', function() {
                        packageChart.destroy(); // Xóa biểu đồ hiện tại
                        createLineChart(); // Tạo lại biểu đồ Line Chart
                    });

                    // Xử lý sự kiện click nút Pie Chart
                    document.getElementById('pieChartBtn').addEventListener('click', function() {
                        packageChart.destroy(); // Xóa biểu đồ hiện tại
                        createPieChart(); // Tạo lại biểu đồ Pie Chart
                    });
                </script>
            </div>
        </div>
    </div>
@endsection
