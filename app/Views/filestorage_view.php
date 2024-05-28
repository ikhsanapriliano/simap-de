<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SIMAP - File Storage</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="aset/css/sistem.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-xxxxxx" crossorigin="anonymous" />
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- success modal -->
        <?php if (!empty(session()->getFlashdata('action'))): ?>
        <div class="modal fade" tabindex="-1" role="dialog" id="successModal">
            <div class="modal-dialog" role="document">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Action Success! </strong><?=  session()->getFlashdata('action') ?>
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
                        <h1 class="h3 mb-0 text-gray-800">File List</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./dashboard">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">File Storage</li>
                        </ol>
                    </div>

                    <div class="row">
                        <!-- Datatables -->
                        <div class="col-lg-12">
                            <div class="card mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary"></h6>
                                    <a href="addfile" class="btn btn-primary"
                                        style="background-color: #277ab1; color: white;"><i
                                            class="fa fa-plus"></i>&nbsp; Add File</a>
                                </div>
                                <div class="table-responsive p-3">
                                    <table class="table align-items-center table-flush" id="dataTable">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>No</th>
                                                <th>No.regis</th>
                                                <th>Pemesan</th>
                                                <th>Nama Pekerjaan</th>
                                                <th>File PDF</th>
                                                <th>File Zip</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1 ?>
                                            <?php foreach ($data as $item): ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= $item['no_registrasi'] ?></td>
                                                <td><?= $item['pemesan'] ?></td>
                                                <td><?= $item['pekerjaan'] ?></td>
                                                <td>
                                                    <a href="aset/storage/pdf/<?= $item['pdf'] ?>" download>
                                                        <?= !empty($item['pdfName']) ? $item['pdfName'] : '-' ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="aset/storage/zip/<?= $item['zip'] ?>" download>
                                                        <?= !empty( $item['zipName']) ?  $item['zipName'] : '-' ?>
                                                    </a>
                                                </td>
                                                <td class="d-flex">
                                                    <form action="editfilestorage-<?= $item['id'] ?>" method="get">
                                                        <button title="edit file" type="submit"
                                                            class="btn btn-warning mr-1"><i
                                                                class="fa fa-paint-brush"></i></button>
                                                    </form>
                                                    <form action="deletefile-<?= $item['id'] ?>" method="post">
                                                        <button title="hapus file" type="submit"
                                                            class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
                            $('#successModal').modal('show');
                        });
                        </script>
</body>

</html>