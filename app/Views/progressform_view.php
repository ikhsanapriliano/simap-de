<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SIMAP - Orderlist</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="aset/css/sistem.css" rel="stylesheet">
    <link href="aset/css/orderlistpage.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
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
                        <h1 class="h3 mb-0 text-gray-800">Progress Form</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./dashboard">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Progress Form</li>
                        </ol>
                    </div>

                    <div class="row">

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
                        <div class="table-responsive p-3">
                            <table class="table align-items-center table-flush" id="dataTable">
                                <thead class="thead-light">

                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>No.Regis</th>
                                        <th>Pemesan</th>
                                        <th>Pekerjaan</th>
                                        <th>Kategori</th>
                                        <th>Deadline</th>
                                        <th>PIC</th>
                                        <th>Status</th>
                                        <th>Progres</th>
                                        <th>Keterangan</th>
                                        <th>Tanggal Selesai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($data as $item): ?>
                                    <div class="modal fade" tabindex="-1" role="dialog" id="keterangan-<?= $i ?>">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Keterangan</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div>
                                                        <?= !empty($item['keterangan']) ? $item['keterangan'] : '-' ?>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <tr>
                                        <th><?= $i ?></th>
                                        <th><?= $item['no_registrasi'] ?></th>
                                        <th><?= $item['pemesan'] ?></th>
                                        <th><?= $item['pekerjaan'] ?></th>
                                        <th><?= $item['kategori'] ?></th>
                                        <th><?= $item['deadline'] ?></th>
                                        <th><?= $item['pic'] ?></th>
                                        <th><?= $item['status'] ?></th>
                                        <th><?= $item['progress'] ?> %</th>
                                        <th><button class="btn btn-primary btn-keterangan"
                                                data-id="<?= $i ?>">Lihat</button></th>
                                        <th><?= !empty($item['selesai']) ? $item['selesai'] : '-' ?></th>
                                    </tr>
                                    <?php $i++ ?>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
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
                        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js">
                        </script>
                        <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js">
                        </script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js">
                        </script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js">
                        </script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js">
                        </script>
                        <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js">
                        </script>
                        <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js">
                        </script>
                        <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js">
                        </script>

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
                            $(".btn-keterangan").on('click', function() {
                                var id = $(this).data("id")
                                $(`#keterangan-${id}`).modal('show');
                            })
                        });
                        </script>


</body>

</html>