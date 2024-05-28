<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SIMAP - Manage Account</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="aset/css/sistem.css" rel="stylesheet">
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
                        <h1 class="h3 mb-0 text-gray-800">Add Account</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="manageaccount">Account Management</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Order</li>
                        </ol>
                    </div>

                    <form method="post" action="/addaccount">
                        <?php $nipError = session()->getFlashdata('nipError') ?>
                        <div class="form-group has-validation">
                            <div class="col-md-2">
                                <label>NIP</label>
                                <input type="text" class="form-control <?= !empty($nipError) ? 'is-invalid' : '' ?>"
                                    name="nip" placeholder="Type Here" id="nip"
                                    aria-describedby="inputGroupPrepend3 validationServerNIPFeedback">
                                <div id="validationNipFeedback" class="invalid-feedback">
                                    <?= !empty($nipError) ? $nipError : '' ?>
                                </div>
                            </div>
                            <br>
                            <div class="col-md-2">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="nama" placeholder="Type Here" id="nama"
                                    required>
                            </div>
                            <br>
                            <div class="col-md-2">
                                <label>User Level</label>
                                <select type="text" class="form-control" name="user_level" id="userlevel" required>
                                    <!-- <option value="">Pilih Level</option> -->
                                    <option value="worker">worker</option>
                                    <option value="admin">admin</option>
                                    <option value="pic">pic</option>
                                    <option value="ppc">ppc</option>
                                    <option value="user">user</option>
                                </select>
                            </div>
                            <br>
                            <div class="col-md-2">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" placeholder="-" id="username"
                                    required readonly>
                            </div>
                            <br>
                            <div class="col-md-2">
                                <label>Password</label>
                                <input type="text" class="form-control" name="password" placeholder="Type Here"
                                    required>
                            </div>
                            <br>
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="/manageaccount" class="btn btn-primary">Batal</a>
                        </div>
                    </form>

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
                    <script>
                    var userLevel = document.getElementById('userlevel');
                    var nip = document.getElementById('nip');
                    var nama = document.getElementById('nama');
                    var username = document.getElementById('username');
                    userLevel.addEventListener('change', function() {
                        if (userLevel.value == 'user' || userLevel.value == 'admin') {
                            nip.disabled = true;
                            nip.placeholder = '-';
                            nip.value = '-';
                        } else {
                            nip.disabled = false;
                            nip.placeholder = 'Type Here';
                        }
                    });
                    nama.addEventListener('input', function() {
                        var chars = "abcdefghijklmnopqrstuvwxyz";
                        var nums = "0123456789";
                        var identifier = chars.charAt(Math.floor(Math.random() * chars.length)) +
                            nums.charAt(Math.floor(Math.random() * chars.length)) +
                            chars.charAt(Math.floor(Math.random() * chars.length)) +
                            nums.charAt(Math.floor(Math.random() * chars.length)) +
                            chars.charAt(Math.floor(Math.random() * chars.length))
                        var firstName = nama.value.split(" ");
                        username.value = identifier + "_" + firstName[0];
                        username.placeholder = identifier + "_" + firstName[0];
                    });
                    </script>
</body>

</html>