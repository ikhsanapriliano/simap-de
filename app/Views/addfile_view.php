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
                        <h1 class="h3 mb-0 text-gray-800">Add File</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="filestorage">File Storage</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add File</li>
                        </ol>
                    </div>

                    <section>
                        <form action="/savefile" method="post" enctype="multipart/form-data">
                            <div class="file">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="control-label">Upload File PDF</label>
                                            <div class="preview-zone hidden">
                                                <div class="box box-solid">
                                                    <div class="box-header with-border">
                                                        <div><b>Preview</b></div>
                                                        <div class="box-tools pull-right">
                                                            <button data-id="pdf" type="button"
                                                                class="btn btn-danger btn-xs remove-preview">
                                                                <i class="fa fa-times"></i> Batal
                                                            </button>
                                                        </div>
                                                        <embed class="mt-3" id="pdf-preview" src=""
                                                            type="application/pdf" hidden />
                                                    </div>
                                                    <div class="box-body"></div>
                                                </div>
                                            </div>
                                            <div class="dropzone-wrapper">
                                                <div class="dropzone-desc">
                                                    <i class="glyphicon glyphicon-download-alt"></i>
                                                    <p>Choose an pdf file or drag it here.</p>
                                                </div>
                                                <input id="pdf-input" type="file" name="pdf" class="dropzone"
                                                    accept="application/pdf">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="control-label">Upload File Zip</label>
                                            <div class="preview-zone hidden">
                                                <div class="box box-solid">
                                                    <div class="box-header with-border">
                                                        <div><b>Preview</b></div>
                                                        <div class="box-tools pull-right">
                                                            <button data-id="zip" type="button"
                                                                class="btn btn-danger btn-xs remove-preview">
                                                                <i class="fa fa-times"></i> Batal
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="box-body"></div>
                                                </div>
                                            </div>
                                            <div class="dropzone-wrapper">
                                                <div class="dropzone-desc">
                                                    <i class="glyphicon glyphicon-download-alt"></i>
                                                    <p>Choose an zip file or drag it here.</p>
                                                </div>
                                                <input type="file" name="zip" class="dropzone"
                                                    accept="application/zip,.rar">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <center>
                                    <div class="col-md-4 mb-3">
                                        <label>No. Registrasi</label>
                                        <input type="text" class="form-control" name="no_registrasi"
                                            placeholder="Type Here" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label>Pemesan</label>
                                        <input required type="text" class="form-control" name="pemesan"
                                            placeholder="Type Here">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label>Nama Pekerjaan</label>
                                        <input required type="text" class="form-control" name="pekerjaan"
                                            placeholder="Type Here">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary pull-right">Upload</button>
                                        </div>
                                </center>
                            </div>
                </div>
                </form>
                </section>

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
                function readFile(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            var htmlPreview =
                                '<p>' + input.files[0].name + '</p>';
                            var wrapperZone = $(input).parent();
                            var previewZone = $(input).parent().parent().find('.preview-zone');
                            var boxZone = $(input).parent().parent().find('.preview-zone').find('.box').find(
                                '.box-body');

                            wrapperZone.removeClass('dragover');
                            previewZone.removeClass('hidden');
                            boxZone.empty();
                            boxZone.append(htmlPreview);
                        };

                        reader.readAsDataURL(input.files[0]);
                    }
                }

                function reset(e) {
                    e.wrap('<form>').closest('form').get(0).reset();
                    e.unwrap();
                }
                $(".dropzone").change(function() {
                    readFile(this);
                });
                $('.dropzone-wrapper').on('dragover', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    $(this).addClass('dragover');
                });
                $('.dropzone-wrapper').on('dragleave', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    $(this).removeClass('dragover');
                });

                $('.remove-preview').on('click', function() {
                    var boxZone = $(this).parents('.preview-zone').find('.box-body');
                    var previewZone = $(this).parents('.preview-zone');
                    var dropzone = $(this).parents('.form-group').find('.dropzone');
                    boxZone.empty();
                    previewZone.addClass('hidden');
                    reset(dropzone);

                    var id = $(this).data('id')
                    console.log($(`#${id}-input`).val())
                    $(`#${id}-preview`).attr('hidden', true);
                });

                $('#pdf-input').on('change', function() {
                    var file = this.files[0];
                    if (file) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('#pdf-preview').attr('src', e.target.result);
                            $('#pdf-preview').attr('hidden', false);
                        };
                        reader.readAsDataURL(file);
                    }
                })
                </script>
</body>

</html>