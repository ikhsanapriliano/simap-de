<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SIMAP - Donelist</title>
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

    .table-cell-modal-number {
        padding: 8px 16px;
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
                <!-- TopBar -->
                <?= $this->include('layout/topbar') ?>
                <!-- Topbar -->
                <!-- Container Fluid-->
                <div class="container-fluid" id="container-wrapper">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Done List</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./dashboard">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Done List</li>
                        </ol>
                    </div>

                    <div class="row">
                        <!-- Datatables -->
                        <div class="col-lg-12">
                            <div class="card mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary"></h6>
                                    <!-- <a href="spk" class="btn btn-primary" style="background-color: #277ab1; color: white;"><i class="fa fa-plus"></i>&nbsp; Add Order</a>
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
                                    <div class="table-responsive p-3">
                                        <table class="table align-items-center table-flush" id="dataTable">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>No</th>
                                                    <th>No.regis</th>
                                                    <th>Keluar</th>
                                                    <th>Terima</th>
                                                    <th>Pemesan</th>
                                                    <th>Pekerjaan</th>
                                                    <th>Kategori</th>
                                                    <th>Prodi</th>
                                                    <th>Deadline</th>
                                                    <th>Lampiran</th>
                                                    <th>PIC</th>
                                                    <th>Helper</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <!-- managed -->
                                                <?php foreach ($data as $item):?>
                                                <div class="modal fade" tabindex="-1" role="dialog"
                                                    id="prodi-<?= $i ?>">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Daftar Prodi</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="table-flex-modal">
                                                                    <!-- Header Row -->
                                                                    <div class="table-row-modal table-header-modal">
                                                                        <div class="table-cell-modal-number">No.</div>
                                                                        <div class="table-cell-modal">Nama Prodi</div>
                                                                    </div>
                                                                    <!-- Data Rows -->
                                                                    <?php $p = 1 ?>
                                                                    <?php foreach ($item['prodi'] as $prodi): ?>
                                                                    <div class="table-row-modal">
                                                                        <div class="table-cell-modal-number"
                                                                            style="padding-right: 27px; margin-left: 7px;">
                                                                            <?= $p++ ?>
                                                                        </div>
                                                                        <div class="table-cell-modal">
                                                                            <?= $prodi ?>
                                                                        </div>
                                                                    </div>
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
                                                <div class="modal fade" tabindex="-1" role="dialog"
                                                    id="lampiran-<?= $i ?>">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Daftar Lampiran</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <div class="table-flex-modal">
                                                                    <!-- Header Row -->
                                                                    <div class="table-row-modal table-header-modal">
                                                                        <div class="table-cell-modal-number">No.</div>
                                                                        <div class="table-cell-modal">Lampiran</div>
                                                                        <div class="table-cell-modal-number"
                                                                            style="padding-right: 58px;">Aksi</div>
                                                                    </div>
                                                                    <!-- Data Rows -->
                                                                    <?php $la = 1 ?>
                                                                    <?php foreach ($item['lampiran'] as $lampiran): ?>
                                                                    <div class=" table-row-modal">
                                                                        <div class="table-cell-modal-number"
                                                                            style="padding-right: 27px; margin-left: 7px;">
                                                                            <?= $la++ ?>
                                                                        </div>
                                                                        <div class="table-cell-modal">
                                                                            <a target="_blank"
                                                                                href="aset/lampiran/<?= $lampiran['file'] ?>"><?= $lampiran['fileName'] ?></a>
                                                                        </div>
                                                                        <div class="table-cell-modal-number">
                                                                            <a download
                                                                                href="aset/lampiran/<?= $lampiran['file'] ?>"><button
                                                                                    class="btn btn-success">Unduh</button></a>
                                                                        </div>
                                                                    </div>
                                                                    <?php endforeach ?>
                                                                    <?php if (!empty($item['lampiran'])): ?>
                                                                    <form action="/download-all-<?= $item['spk_id'] ?>"
                                                                        method="post">
                                                                        <div class="d-flex justify-content-end">
                                                                            <button type="submit"
                                                                                class="btn btn-primary mt-2 mr-3"
                                                                                style="width: 30%;">Unduh Semua</button>
                                                                        </div>
                                                                    </form>
                                                                    <?php else: ?>
                                                                    <p>Tidak ada lampiran.</p>
                                                                    <?php endif ?>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" tabindex="-1" role="dialog"
                                                    id="helper-<?= $i ?>">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Daftar Helper</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="table-flex-modal">
                                                                    <!-- Header Row -->
                                                                    <div class="table-row-modal table-header-modal">
                                                                        <div class="table-cell-modal-number">No.</div>
                                                                        <div class="table-cell-modal-number"
                                                                            style="min-width: 28%;">Nip</div>
                                                                        <div class="table-cell-modal">Nama Pekerja</div>
                                                                    </div>
                                                                    <!-- Data Rows -->
                                                                    <?php $he = 1 ?>
                                                                    <?php foreach ($item['helper'] as $helper): ?>
                                                                    <div class="table-row-modal">
                                                                        <div class="table-cell-modal-number"
                                                                            style="padding-right: 27px; margin-left: 7px;">
                                                                            <?= $he++ ?>
                                                                        </div>
                                                                        <div class="table-cell-modal-number"
                                                                            style="min-width: 28%;">
                                                                            <?= $helper['nip'] ?>
                                                                        </div>
                                                                        <div class="table-cell-modal">
                                                                            <?= $helper['nama'] ?>
                                                                        </div>
                                                                    </div>
                                                                    <?php endforeach ?>
                                                                </div>

                                                                <?php if (empty($item['helper'])): ?>
                                                                Helper belum ditambahkan.
                                                                <?php endif ?>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" tabindex="-1" role="dialog"
                                                    id="selesai-<?= $i ?>">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">
                                                                    Detail Penyelesaian
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="table-flex-modal">
                                                                    <!-- Header Row -->
                                                                    <div class="table-row-modal table-header-modal">
                                                                        <div class="table-cell-modal-number"
                                                                            style="width: 24%;">mulai</div>
                                                                        <div class="table-cell-modal-number"
                                                                            style="width: 24%;">selesai</div>
                                                                        <div class="table-cell-modal">Total Waktu
                                                                            Pengerjaan
                                                                        </div>
                                                                    </div>
                                                                    <!-- Data Rows -->
                                                                    <div class="table-row-modal">
                                                                        <div class="table-cell-modal-number"
                                                                            style="width: 24%;">
                                                                            <?= $item['mulai'] ?>
                                                                        </div>
                                                                        <div class="table-cell-modal-number"
                                                                            style="width: 24%;">
                                                                            <?= $item['selesai'] ?>
                                                                        </div>
                                                                        <div class="table-cell-modal">
                                                                            <?= $item['interval'] ?>
                                                                        </div>
                                                                    </div>
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
                                                    <td><?= $item['no_registrasi'] != null ? $item['no_registrasi'] : '-' ?>
                                                    </td>
                                                    <td><?= $item['keluar'] != null ? $item['keluar'] : '-' ?></td>
                                                    <td><?= $item['terima'] != null ? $item['terima'] : '-' ?></td>
                                                    <td><?= $item['pemesan'] != null ? $item['pemesan'] : '-' ?></td>
                                                    <td><?= $item['pekerjaan'] != null ? $item['pekerjaan'] : '-' ?>
                                                    </td>
                                                    <td><?= $item['kategori'] != null ? $item['kategori'] : '-' ?></td>
                                                    <td><button data-id="<?= $i ?>" type="button"
                                                            class="btn btn-primary btn-prodi">Lihat</button></td>
                                                    <td><?= $item['deadline'] != null ? $item['deadline'] : '-' ?></td>
                                                    <td><button data-id="<?= $i ?>" type="button"
                                                            class="btn btn-primary btn-lampiran">Lihat</button>
                                                    </td>
                                                    <td><?= $item['pic'] != null ? $item['pic'] : '-' ?></td>
                                                    <td><button data-id="<?= $i ?>" type="button"
                                                            class="btn btn-primary btn-helper">Lihat</button></td>
                                                    <td>
                                                        <section>
                                                            <button title="Klik untuk lihat detail"
                                                                class="btn btn-success d-flex align-items-center btn-selesai"
                                                                data-id="<?= $i ?>"><i
                                                                    class="fa fa-check mr-1"></i>Selesai</button>
                                                        </section>
                                                    </td>
                                                </tr>
                                                <?php $i++ ?>
                                                <?php endforeach;?>
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
                                $(".btn-prodi").on('click', function() {
                                    var id = $(this).data("id")
                                    $(`#prodi-${id}`).modal('show');
                                })
                                $(".btn-lampiran").on('click', function() {
                                    var id = $(this).data("id")
                                    $(`#lampiran-${id}`).modal('show');
                                })

                                $(".btn-helper").on('click', function() {
                                    var id = $(this).data("id")
                                    $(`#helper-${id}`).modal('show');
                                })
                                $(".btn-selesai").on('click', function() {
                                    var id = $(this).data("id")
                                    $(`#selesai-${id}`).modal('show');
                                })
                            });
                            </script>


</body>

</html>