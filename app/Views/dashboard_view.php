<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SIMAP - Dashboard</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="aset/css/sistem.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <?= $this->include('layout/sidebar')  ?>
        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- TopBar -->
                <?= $this->include('layout/topbar')  ?>
                <!-- Topbar -->
                <!-- Container Fluid-->
                <div class="container-fluid" id="container-wrapper">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./dashboard">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </div>

                    <div class="row mb-3">
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">All Order</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $order ?></div>
                                            <div class="mt-2 mb-0 text-muted text-xs">
                                                <a href="orderlistpage">Lihat Detail</a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-shopping-bag fa-2x text-primary"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">Bidding</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $bidding ?></div>
                                            <div class="mt-2 mb-0 text-muted text-xs">
                                                <a href="biddinglistpage">Lihat Detail</a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-success"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- New User Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">On Progress</div>
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $progress ?>
                                            </div>
                                            <div class="mt-2 mb-0 text-muted text-xs">
                                                <a href="progressform">Lihat Detail</a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-cogs fa-2x text-info"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">Done</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $done ?></div>
                                            <div class="mt-2 mb-0 text-muted text-xs">
                                                <a href="donelistpage">Lihat Detail</a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-flag fa-2x text-warning"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Bar Chart -->
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header py-3 d-flex align-items-center justify-content-between">
                                    <h6 class="text-xs font-weight-bold text-uppercase mb-1"
                                        style="text-align : center; width: 20%">Data Order</h6>
                                    <div style="width: 100%;" class="d-flex justify-content-end">
                                        <input id="order-input" class="form-control" style="width: 25%;" type="number"
                                            value="2024" />
                                    </div>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area" style="text-align: center">
                                        <center>
                                            <canvas id="myBarChart"></canvas>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Bar Chart -->
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="text-xs font-weight-bold text-uppercase mb-1"
                                        style="text-align : center; width: 25%">Data Workers</h6>
                                    <div style="width: 100%;" class="d-flex justify-content-end">
                                        <input id="worker-input" class="form-control" style="width: 25%;" type="number"
                                            value="2024" />
                                    </div>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <!-- <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i> -->
                                        </a>
                                        <!-- <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header"></div>
                      <a class="dropdown-item" href="#">Unduh Chart</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div> -->
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area" style="text-align: center">
                                        <center>
                                            <canvas id="myBarChart1"></canvas>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div style="margin-left: 11px;">
                            <div class="card shadow">
                                <div class="card-header tabel-judul">
                                    <h6 class="text-xs font-weight-bold text-uppercase mb-1"
                                        style="text-align : center">Kategori Pekerjaan</h6>
                                </div>
                                <div class="card-body">
                                    <div class="">
                                        <center>
                                            <canvas id="myPieChart"></canvas>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Scroll to top -->
                        <a class="scroll-to-top rounded" href="#page-top">
                            <i class="fas fa-angle-up"></i>
                        </a>

                        <script src="vendor/jquery/jquery.min.js"></script>
                        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
                        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
                        <script src="js/ruang-admin.min.js"></script>
                        <script src="vendor/chart.js/Chart.min.js"></script>
                        <script src="js/demo/chart-area-demo.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


                        <script>
                        // Doughnut Chart
                        var dataPekerjaan = []
                        $.ajax({
                            url: '/countpekerjaan',
                            type: 'POST',
                            dataType: 'json',
                            contentType: 'application/json',
                            success: function(response) {
                                for (let item in response) {
                                    dataPekerjaan.push(response[item])
                                }

                                const pieData = {
                                    labels: [
                                        'PRESTOOL',
                                        'MOLDING',
                                        'JIG & FIXTURE',
                                        'PENGUKURAN',
                                        'DRAWING',
                                        'FRAIS',
                                        '3D PRINTING',
                                        'FINITE ELEMENT ANALYSIS (FEA)'
                                    ],
                                    datasets: [{
                                        label: 'Total',
                                        data: dataPekerjaan,
                                        backgroundColor: [
                                            'rgb(255, 99, 132)',
                                            'rgb(54, 162, 235)',
                                            'rgb(255, 205, 86)',
                                            'rgb(155, 223, 196)',
                                            'rgb(184, 123, 191)',
                                            'rgb(200, 100, 150)',
                                            'rgb(124, 165, 121)',
                                            'rgb(199, 124, 91)',
                                        ],
                                        hoverOffset: 4
                                    }]
                                };

                                const pieConfig = {
                                    type: 'doughnut',
                                    data: pieData,
                                };

                                var myPieChart = new Chart(
                                    document.getElementById('myPieChart'),
                                    pieConfig
                                );
                            },
                            error: function(xhr, status, error) {
                                console.log('Terjadi kesalahan: ' + error);
                            }
                        });

                        // Bar Chart Order
                        var orderData = [];
                        var myBarChart;

                        function fetchOrderData(year) {
                            orderData = []
                            $.ajax({
                                url: '/countorder',
                                type: 'POST',
                                dataType: 'json',
                                contentType: 'application/json',
                                data: JSON.stringify({
                                    yearOrder: year
                                }),
                                success: function(response) {
                                    for (let item in response) {
                                        orderData.push(response[item])
                                    }

                                    const barLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Agu',
                                        'Sep', 'Okt', 'Nov', 'Des'
                                    ];
                                    const barData = {
                                        labels: barLabels,
                                        datasets: [{
                                            label: 'Data Order',
                                            data: orderData,
                                            backgroundColor: [
                                                'rgba(255, 99, 132)',
                                                'rgba(255, 159, 64)',
                                                'rgba(255, 205, 86)',
                                                'rgba(75, 192, 192)',
                                                'rgba(54, 162, 235)',
                                                'rgba(153, 102, 255)',
                                                'rgba(205, 94, 122)',
                                                'rgba(255, 140, 133)',
                                                'rgba(255, 205, 86)',
                                                'rgba(175, 53, 100)',
                                                'rgba(122, 122, 235)',
                                                'rgba(141, 112, 255)'
                                            ],
                                            borderWidth: 1
                                        }]
                                    };

                                    const barConfig = {
                                        type: 'bar',
                                        data: barData,
                                        options: {
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    };

                                    if (myBarChart) {
                                        myBarChart
                                            .destroy(); // Destroy the existing chart before creating a new one
                                    }

                                    myBarChart = new Chart(
                                        document.getElementById('myBarChart'),
                                        barConfig
                                    );
                                },
                                error: function(xhr, status, error) {
                                    console.log('Terjadi kesalahan: ' + error);
                                }
                            });
                        }

                        fetchOrderData('2024');

                        $('#order-input').on('change', function() {
                            const yearOrder = $(this).val();
                            fetchOrderData(yearOrder);
                        });

                        // Bar Chart Workers
                        var workerData = [];
                        var myBarChartWorker;

                        function fetchWorkerData(year) {
                            workerData = [];
                            $.ajax({
                                url: '/countworker',
                                type: 'POST',
                                dataType: 'json',
                                contentType: 'application/json',
                                data: JSON.stringify({
                                    yearOrder: year
                                }),
                                success: function(response) {
                                    for (let item in response) {
                                        workerData.push(response[item]);
                                    }

                                    const barLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Agu',
                                        'Sep', 'Okt', 'Nov', 'Des'
                                    ];
                                    const barData = {
                                        labels: barLabels,
                                        datasets: [{
                                            label: 'Data Workers',
                                            data: workerData,
                                            backgroundColor: [
                                                'rgba(255, 99, 132)',
                                                'rgba(255, 159, 64)',
                                                'rgba(255, 205, 86)',
                                                'rgba(75, 192, 192)',
                                                'rgba(54, 162, 235)',
                                                'rgba(153, 102, 255)',
                                                'rgba(205, 94, 122)',
                                                'rgba(255, 140, 133)',
                                                'rgba(255, 205, 86)',
                                                'rgba(175, 53, 100)',
                                                'rgba(122, 122, 235)',
                                                'rgba(141, 112, 255)'
                                            ],
                                            borderWidth: 1
                                        }]
                                    };

                                    const barConfig = {
                                        type: 'bar',
                                        data: barData,
                                        options: {
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    };

                                    if (myBarChartWorker) {
                                        myBarChartWorker
                                            .destroy(); // Destroy the existing chart before creating a new one
                                    }

                                    myBarChartWorker = new Chart(
                                        document.getElementById('myBarChart1'),
                                        barConfig
                                    );
                                },
                                error: function(xhr, status, error) {
                                    console.log('Terjadi kesalahan: ' + error);
                                }
                            });
                        }

                        // Call fetchWorkerData with an initial year
                        fetchWorkerData('2024');

                        $('#worker-input').on('change', function() {
                            const yearWorker = $(this).val();
                            fetchWorkerData(yearWorker);
                        });
                        </script>



</body>

</html>