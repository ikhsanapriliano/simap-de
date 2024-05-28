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
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

</head>

<body id="page-top">
    <div id="wrapper">
        <!-- delete modal -->
        <?php if (!empty(session()->getFlashdata('delSuccess'))): ?>
        <div class="modal fade" tabindex="-1" role="dialog" id="delModal">
            <div class="modal-dialog" role="document">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Delete Success! </strong><?=  session()->getFlashdata('delSuccess') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
        <?php endif ?>

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
                        <h1 class="h3 mb-0 text-gray-800">Manage Account</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./dashboard">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Account</li>
                        </ol>
                    </div>

                    <div class="row">
                        <!-- Datatables -->
                        <div class="col-lg-12">
                            <div class="card mb-4 p-3">
                                <div class="card-header d-flex flex-row align-items-center justify-content-between"
                                    style="padding-right: 0; padding-left:0;">
                                    <h6 class="m-0 font-weight-bold text-primary"></h6>
                                    <a href="addaccount" class="btn btn-primary"
                                        style="background-color: #277ab1; color: white;"><i
                                            class="fa fa-plus"></i>&nbsp; Add Account</a>
                                </div>
                                <!-- <div class="col-lg-2">
                  <div class="btn" role="group">
                  <button id="exportDropdown" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Export
                  </button>
                  <div class="dropdown-menu" aria-labelledby="exportDropdown">
                    <a class="dropdown-item" id="exportExcel" href="#">Excel</a>
                    <a class="dropdown-item" id="exportPdf" href="#">PDF</a>
                    <a class="dropdown-item" id="exportPrint" href="#">Print</a>
                  </div>
                  </div>
                </div> -->
                                <div class="table-responsive">
                                    <table class="table align-items-center table-flush" id="dataTable">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>No</th>
                                                <th>NIP</th>
                                                <th>Nama</th>
                                                <th>User Level</th>
                                                <th>Username</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1 ?>
                                            <?php foreach ($data as $item): ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><?= $item['nip'] != null ? $item['nip'] : '-' ?></td>
                                                <td><?= $item['nama'] ?></td>
                                                <td><?= $item['user_level'] ?></td>
                                                <td><?= $item['username'] ?></td>
                                                <td><a href="/profile-<?= $item['id'] ?>"><button type="button"
                                                            class="btn btn-primary">Lihat Profil</button></a></td>
                                            </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
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
                        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js">
                        </script>

                        <!-- DataTables -->
                        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
                        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

                        <!-- DataTables Buttons extension and its dependencies -->
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js">
                        </script>

                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js">
                        </script>
                        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
                        <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
                        <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
                        <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
                        <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>

                        <script>
                        $(document).ready(function() {
                            $('#dataTable').DataTable({
                                dom: 'lBfrtip', // Only buttons for exporting
                                buttons: [{
                                        extend: 'copy',
                                        className: 'btn btn-secondary'
                                    },
                                    {
                                        extend: 'excel',
                                        className: 'btn btn-secondary'
                                    },
                                    {
                                        extend: 'pdf',
                                        className: 'btn btn-secondary'
                                    },
                                    {
                                        extend: 'print',
                                        className: 'btn btn-secondary'
                                    }
                                ],
                                paging: true,
                                pageLength: 5,
                                lengthMenu: [5, 10, 20, 50, 100]
                            });
                            $('#dataTable_length').find('label').css("margin-right", "10px")
                            $('#delModal').modal('show');
                        });
                        </script>


</body>

</html>