<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SIMAP - 3D Print Utility</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="aset/css/sistem.css" rel="stylesheet">
    <link href="aset/css/styling.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <?= $this->include('layout/sidebar') ?>
        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- TopBar -->
                <?= $this->include('layout/topbar') ?>
                <!-- Topbar -->

                <!-- Container Fluid-->
                <div class="container-fluid" id="container-wrapper">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">3D Printer Utility</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">3D Print Utility</li>
                        </ol>
                    </div>

                    <!-- Modal Logout -->
                    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to logout?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-primary"
                                        data-dismiss="modal">Cancel</button>
                                    <a href="login.html" class="btn btn-primary">Logout</a>
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
</body>

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="row">
        <div class="col-md-6" style="text-align: center; position: relative;">
            <img src="https://www.applicadindonesia.com/wp-content/uploads/2023/03/Form-3L-front-1.png"
                class="img-fluid" alt="Gambar 1" width="300" height="300"
                style="position: absolute; top: 420%; left: 50%; transform: translate(-50%, -50%);">
            <p class="mb-0"
                style="font-size: 24px; font-weight: regular; color: #666666; margin-bottom: 10000px; position: absolute; top: calc(50% + 250px); left: 50%; transform: translate(-50%, -50%);">
                formlabs</p>
            <p class="mb-0"
                style="font-size: 40px; font-weight: bold; color: #666666; position: absolute; top: calc(50% + 285px); left: 50%; transform: translate(-50%, -50%);">
                Form 3L</p>
            <!-- LED Status -->
            <div class="led" id="statusFormlabs"></div>
        </div>
        <div class="col-md-6" style="text-align: center; position: relative;">
            <img src="https://3dprintersuperstore.com.au/cdn/shop/products/Method_Front_1024_86c1b2b2-e952-47af-b4e4-c8f33876c23f_1400x.png?v=1581294872"
                class="img-fluid" alt="Gambar 2" width="300" height="300"
                style="position: absolute; top: 330%; left: 50%; transform: translate(-50%, -50%);">
            <p class="mb-0"
                style="font-size: 24px; font-weight: regular; color: #666666; margin-bottom: 10000px; position: absolute; top: calc(50% + 250px); left: 50%; transform: translate(-50%, -50%);">
                MakerBot</p>
            <p class="mb-0"
                style="font-size: 40px; font-weight: bold; color: #666666; position: absolute; top: calc(50% + 285px); left: 50%; transform: translate(-50%, -50%);">
                METHOD X</p>
            <!-- LED Status -->
            <div class="led" id="statusMakerBot"></div>
        </div>
    </div>
</div>

<script>
// Online/Offline Status
const statusFormlabs = "online";
const statusMakerBot = "online";

// Fungsi untuk mengubah warna LED
function updateLEDStatus(id, status) {
    const led = document.getElementById(id);
    if (status === "online") {
        led.style.backgroundColor = "green"; // LED menyala hijau jika online
    } else {
        led.style.backgroundColor = "red"; // LED menyala merah jika offline
    }
}

// Panggil fungsi untuk setiap LED
updateLEDStatus("statusFormlabs", statusFormlabs);
updateLEDStatus("statusMakerBot", statusMakerBot);
</script>


<div class="row mt-3">
    <div class="col-md-6" style="width: calc(50% - 1600px); margin-top: 280px;">
        <p class="mb-1">No Registrasi:</p>
        <input type="text" class="form-control" id="text1" placeholder=" ">
        <p class="mb-1 mt-2">PIC Alat:</p>
        <input type="text" class="form-control" id="text2" placeholder=" ">
        <p class="mb-1 mt-2">Progress:</p>
        <input type="text" class="form-control" id="text3" placeholder=" ">
    </div>
    <div class="col-md-6" style="margin-top: 280px;">
        <p class="mb-1">No Registrasi:</p>
        <input type="text" class="form-control" id="text4" placeholder=" ">
        <p class="mb-1 mt-2">PIC Alat:</p>
        <input type="text" class="form-control" id="text5" placeholder=" ">
        <p class="mb-1 mt-2">Progress:</p>
        <input type="text" class="form-control" id="text6" placeholder=" ">
    </div>
</div>


<!-- Modal Logout -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to logout?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                <a href="login.html" class="btn btn-primary">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top


</html>