<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SIMAP - Workers</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="aset/css/sistem.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-xxxxxx" crossorigin="anonymous" />
    <style>
    .modal-dialog-wide {
        max-width: 90%;
    }

    .table-flex-modal {
        display: flex;
        flex-direction: column;
        width: 100%;
    }

    .table-row-modal {
        display: flex;
        flex-direction: row;
        border-bottom: 1px solid #ddd;
    }

    .table-header-modal {
        font-weight: bold;
        background-color: #f8f9fa;
    }

    .table-cell-modal {
        flex: 1;
        padding: 8px 16px;
        min-width: 100px;
        /* Adjust this value based on your needs */
    }

    /* Ensure inputs and buttons do not stretch */
    .table-cell-modal input {
        width: 100%;
        box-sizing: border-box;
    }

    .table-cell-modal button {
        width: 100%;
        box-sizing: border-box;
    }
    </style>
</head>

<body id="page-top">
    <div id="wrapper">


        <!-- Sidebar -->
        <?= $this->include('layout/sidebar') ?>
        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- success modal -->
                <?php if (!empty(session()->getFlashdata('success'))): ?>
                <div class="modal fade" tabindex="-1" role="dialog" id="successModal">
                    <div class="modal-dialog" role="document">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Action Success! </strong><?=  session()->getFlashdata('success') ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
                <?php endif ?>

                <!-- success modal -->
                <?php if (!empty(session()->getFlashdata('failed'))): ?>
                <div class="modal fade" tabindex="-1" role="dialog" id="failedModal">
                    <div class="modal-dialog" role="document">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Action Failed! </strong><?=  session()->getFlashdata('failed') ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
                <?php endif ?>

                <!-- TopBar -->
                <?= $this->include('layout/topbar') ?>
                <!-- Topbar -->

                <!-- Container Fluid-->
                <div class="container-fluid" id="container-wrapper">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Workers Monitor</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./dashboard">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Workers</li>
                        </ol>
                    </div>

                    <div class="row">
                        <!-- Datatables -->
                        <div class="col-lg-12">
                            <div class="card mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary"></h6>
                                </div>
                                <div class="table-responsive p-3">
                                    <table class="table align-items-center table-flush" id="dataTable">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>No</th>
                                                <th>NIP</th>
                                                <th>User Level</th>
                                                <th>Nama</th>
                                                <th>No. Regis</th>
                                                <th>Pekerjaan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1 ?>
                                            <?php foreach ($data as $item): ?>

                                            <!-- modal pekerjaan -->
                                            <div class="modal fade" tabindex="-1" role="dialog"
                                                id="pekerjaan-<?= $i ?>">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">List Pekerjaan</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body container">
                                                            <div class="table-flex-modal">
                                                                <!-- Header Row -->
                                                                <div class="table-row-modal table-header-modal">
                                                                    <div class="table-cell-modal">No.</div>
                                                                    <div class="table-cell-modal">Pekerjaan</div>
                                                                    <div class="table-cell-modal">Kategori</div>
                                                                    <div class="table-cell-modal">Progress</div>
                                                                    <div class="table-cell-modal">Aksi</div>
                                                                </div>
                                                                <!-- Data Rows -->
                                                                <?php $x = 1 ?>
                                                                <?php foreach ($item['pekerjaan'] as $pekerjaan): ?>
                                                                <div class="table-row-modal">
                                                                    <div class="table-cell-modal">
                                                                        <?= $x ?>
                                                                    </div>
                                                                    <div class="table-cell-modal">
                                                                        <?= $pekerjaan['pekerjaan'] ?>
                                                                    </div>
                                                                    <div class="table-cell-modal">
                                                                        <?= $pekerjaan['kategori'] ?></div>
                                                                    <form action="/editprogress-<?= $pekerjaan['id'] ?>"
                                                                        method="post">
                                                                        <div
                                                                            class="table-cell-modal d-flex align-items-center">
                                                                            <input class="mr-1 px-1"
                                                                                style="border-top: none; border-right: none; border-left: none;"
                                                                                type="number"
                                                                                name="input-<?= $pekerjaan['id'] ?>"
                                                                                value="<?= $pekerjaan['progress'] ?>" />
                                                                            %
                                                                        </div>
                                                                        <div class="table-cell-modal">
                                                                            <button type="submit"
                                                                                class="btn btn-warning">Update</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <?php $x++ ?>
                                                                <?php endforeach ?>
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
                                                <td><?= $i ?></td>
                                                <td><?= $item['nip'] ?></td>
                                                <td><?= $item['user_level'] ?></td>
                                                <td><?= $item['nama'] ?></td>
                                                <td><?= $item['no_registrasi'] ?></td>
                                                <td><button type="button" data-id="<?= $i ?>"
                                                        class="btn btn-primary btn-pekerjaan">Lihat</button></td>
                                            </tr>
                                            <?php $i++ ?>
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
                            $('#failedModal').modal('show');
                        });
                        $('.btn-pekerjaan').on('click', function() {
                            var id = $(this).data('id')
                            $(`#pekerjaan-${id}`).modal('show');
                        })
                        </script>
</body>

</html>