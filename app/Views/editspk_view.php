<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SIMAP - Biddinglist</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="aset/css/sistem.css" rel="stylesheet">
    <link href="aset/css/orderlistpage.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
                        <h1 class="h3 mb-0 text-gray-800">Edit Order</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="orderlistpage">Biddinglist</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Order</li>
                        </ol>
                    </div>


                    <form method="post" action="/edit-spk-<?= $spk['id'] ?>" id="save-spk"
                        enctype="multipart/form-data">

                        <?= csrf_field();?>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="validationDefault01">No. Registrasi</label>
                                <input type="text" class="form-control" id="no_registrasi" name="no_registrasi"
                                    placeholder="<?= !empty($spk['no_registrasi']) ? $spk['no_registrasi']  : "-" ?>"
                                    value="<?= !empty($spk['no_registrasi']) ? $spk['no_registrasi']  : "-" ?>"
                                    required>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Tanggal Dikeluarkan</label>
                                <input type="date" class="form-control" id="keluar" name="keluar"
                                    value="<?= !empty($spk['keluar']) ? $spk['keluar']  : "-" ?>">
                            </div>
                            <div class="form-group col-md-2">
                                <label>Tanggal Diterima</label>
                                <input type="date" class="form-control" id="terima" name="terima"
                                    value="<?= !empty($spk['terima']) ? $spk['terima']  : "-" ?>">
                            </div>
                            <div class="form-group col-md-2">
                                <label>Deadline</label>
                                <input type="date" class="form-control" id="deadline" name="deadline"
                                    value="<?= !empty($spk['deadline']) ? $spk['deadline']  : "-" ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label>Pemesan</label>
                                <input type="text" class="form-control" id="pemesan" name="pemesan"
                                    placeholder="<?= !empty($spk['pemesan']) ? $spk['pemesan']  : "-" ?>"
                                    value="<?= !empty($spk['pemesan']) ? $spk['pemesan']  : "-" ?>">
                            </div>
                        </div>
                        <br>
                        <hr />
                        <div class="form-row">
                            <div class="d-flex flex-column col-md-12">
                                <label>Lampiran</label>
                                <div id="addLampiranContainer" class="">
                                    <?php $countLampiran = 1 ?>
                                    <?php foreach ($lampirans as $lampiran): ?>
                                    <div id="lampiran-card-<?= $countLampiran ?>">
                                        <input type="hidden" name="old-lampiran-<?= $countLampiran ?>"
                                            value="<?= $lampiran['id'] ?>" />
                                        <i class="mr-3 fa fa-xmark close-lampiran" data-id="<?= $countLampiran ?>"
                                            style="cursor: pointer;"></i>
                                        <a href="aset/lampiran/<?= $lampiran['lampiran'] ?>" target="_blank">
                                            <label style="cursor: pointer;" for="input-lampiran-<?= $countLampiran ?>"
                                                class="lampiran-label"
                                                data-id="<?= $countLampiran ?>"><?= $lampiran['lampiran'] ?></label>
                                        </a>
                                    </div>
                                    <?php $countLampiran++ ?>
                                    <?php endforeach ?>
                                    <input type="hidden" id="counting-lampiran" value="<?= $countLampiran ?>" />
                                    <button id="tambah-lampiran" type="button" class="btn btn-light"><i
                                            class="fa-solid fa-plus"></i> Tambah
                                        Lampiran</button>
                                </div>
                            </div>
                        </div>
                        <br>
                        <hr />
                        <div class="form-row">
                            <?php $count = 1 ?>
                            <?php foreach ($pekerjaans as $pekerjaan): ?>
                            <div class="pekerjaan-group col-md-4 mb-3" data-group="<?=$count?>"
                                id="pekerjaan-card-<?=$count?>">
                                <section class="card p-4">
                                    <div class="d-flex justify-content-between">
                                        <input type="text" class="font-weight-bold"
                                            placeholder="<?= !empty($pekerjaan['nama']) ? $pekerjaan['nama']  : "Nama Pekerjaan...." ?>"
                                            value="<?= !empty($pekerjaan['nama']) ? $pekerjaan['nama']  : "Nama Pekerjaan...." ?>"
                                            style="border: none; width: 80%; outline: none; font-size: 20px;"
                                            name="nama-pekerjaan-<?=$count?>" />
                                        <button id="close-pekerjaan" data-target="pekerjaan-card-<?=$count?>"
                                            class="btn btn-danger" type="button"><i
                                                class="fa-solid fa-xmark"></i></button>
                                    </div>
                                    <hr>
                                    <div>
                                        <div class="mt-2">
                                            <label>Kategori Pekerjaan</label>
                                            <input type="hidden" id="old-kategori-pekerjaan-<?= $count ?>"
                                                value="<?= $pekerjaan['kategori'] ?>" />
                                            <div>
                                                <div>
                                                    <input type="radio" id="option-<?=$count?>-1"
                                                        name="kategori-<?=$count?>" value="Prestool"
                                                        <?= $pekerjaan['kategori'] == "Prestool" ? 'checked' : '' ?>>
                                                    <label for="option-<?=$count?>-1">Prestool</label>
                                                </div>
                                                <div>
                                                    <input type="radio" id="option-<?=$count?>-2"
                                                        name="kategori-<?=$count?>" value="Molding"
                                                        <?= $pekerjaan['kategori'] == "Molding" ? 'checked' : '' ?>>
                                                    <label for="option-<?=$count?>-2">Molding</label>
                                                </div>
                                                <div>
                                                    <input type="radio" id="option-<?=$count?>-3"
                                                        name="kategori-<?=$count?>" value="Jig & Fixture"
                                                        <?= $pekerjaan['kategori'] == "Jig & Fixture" ? 'checked' : '' ?>>
                                                    <label for="option-<?=$count?>-3">Jig & Fixture</label>
                                                </div>
                                                <div>
                                                    <input type="radio" id="option-<?=$count?>-4"
                                                        name="kategori-<?=$count?>" value="Pengukuran"
                                                        <?= $pekerjaan['kategori'] == "Pengukuran" ? 'checked' : '' ?>>
                                                    <label for="option-<?=$count?>-4">Pengukuran</label>
                                                </div>
                                                <div>
                                                    <input type="radio" id="option-<?=$count?>-5"
                                                        name="kategori-<?=$count?>" value="Drawing"
                                                        <?= $pekerjaan['kategori'] == "Drawing" ? 'checked' : '' ?>>
                                                    <label for="option-<?=$count?>-5">Drawing</label>
                                                </div>
                                                <div>
                                                    <input type="radio" id="option-<?=$count?>-6"
                                                        name="kategori-<?=$count?>" value="Frais"
                                                        <?= $pekerjaan['kategori'] == "Frais" ? 'checked' : '' ?>>
                                                    <label for="option-<?=$count?>-6">Frais</label>
                                                </div>
                                                <div>
                                                    <input type="radio" id="option-<?=$count?>-7"
                                                        name="kategori-<?=$count?>" value="3D Printing"
                                                        <?= $pekerjaan['kategori'] == "3D Printing" ? 'checked' : '' ?>>
                                                    <label for="option-<?=$count?>-7">3D Printing</label>
                                                </div>
                                                <div>
                                                    <input type="radio" id="option-<?=$count?>-8"
                                                        name="kategori-<?=$count?>"
                                                        value="Finite Element Analysis (FEA)"
                                                        <?= $pekerjaan['kategori'] == "Finite Element Analysis (FEA)" ? 'checked' : '' ?>>
                                                    <label for="option-<?=$count?>-8">Finite Element Analysis
                                                        (FEA)</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <label>Kategori Prodi</label>
                                            <?php foreach($pekerjaan['prodi'] as $prodi): ?>
                                            <input type="hidden" class="old-prodi-<?= $count ?>"
                                                value="<?= $prodi ?>" />
                                            <?php endforeach ?>
                                            <div>
                                                <input type="checkbox" id="check-<?=$count?>-1"
                                                    name="prodi-<?=$count?>[]"
                                                    value="Teknologi Perancangan Perkakas Presisi"
                                                    <?= in_array('Teknologi Perancangan Perkakas Presisi', $pekerjaan['prodi']) ? 'checked' : '' ?>>
                                                <label for="check-<?=$count?>-1">Teknologi Perancangan Perkakas
                                                    Presisi</label><br>

                                                <input type="checkbox" id="check-<?=$count?>-2"
                                                    name="prodi-<?=$count?>[]"
                                                    value="Teknologi Rekayasa Perancangan Manufaktur"
                                                    <?= in_array('Teknologi Rekayasa Perancangan Manufaktur', $pekerjaan['prodi']) ? 'checked' : '' ?>>
                                                <label for="check-<?=$count?>-2">Teknologi Rekayasa Perancangan
                                                    Manufaktur</label><br>

                                                <input type="checkbox" id="check-<?=$count?>-3"
                                                    name="prodi-<?=$count?>[]" value="Rekayasa Perancangan Mesin"
                                                    <?= in_array('Rekayasa Perancangan Mesin', $pekerjaan['prodi']) ? 'checked' : '' ?>>
                                                <label for="check-<?=$count?>-3">Rekayasa Perancangan Mesin</label><br>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <label>Keterangan</label>
                                            <textarea rows="5" class="form-control" id="keterangan"
                                                name="keterangan-<?=$count?>"
                                                placeholder="<?= !empty($pekerjaan['keterangan']) ? $pekerjaan['keterangan']  : "-" ?>"><?= !empty($pekerjaan['keterangan']) ? $pekerjaan['keterangan']  : "-" ?></textarea>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <?php $count++ ?>
                            <?php endforeach ?>
                            <input type="hidden" id="counting" value="<?= $count ?>" />
                            <div id="EditButtonContainer" class="col-md-2 mb-3">
                                <button id="tambah-pekerjaan" type="button" class="btn btn-light"><i
                                        class="fa-solid fa-plus"></i> Tambah
                                    Pekerjaan</button>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-3 mt-4">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                <a href="/biddinglistpage" class="btn btn-primary">Batal</a>
                            </div>
                        </div>
                        <input type="hidden" name="json_data" id="json_data" />
                    </form>
                    <hr />
                    <form action="/delete-spk-<?= $spk['id'] ?>" method="post">
                        <input type="hidden" name="_method" value="delete" />
                        <button type="submit" class="btn btn-danger mb-4">Hapus Spk</button>
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
                    var count = $('#counting').val() + 1
                    var pekerjaan = []
                    var group;

                    $('.pekerjaan-group').each(function() {
                        var groupId = $(this).attr('data-group');
                        var item = {
                            [`group`]: groupId,
                            [`nama`]: $(`input[name="nama-pekerjaan-${groupId}"]`).val(),
                            [`kategori`]: $(`#old-kategori-pekerjaan-${groupId}`).val(),
                            [`prodi`]: [],
                        }
                        $(`.old-prodi-${groupId}`).each(function() {
                            item.prodi.push($(this).val())
                        })

                        pekerjaan.push(item)
                    })

                    var countLampiran = $('#counting-lampiran').val() + 1
                    $('#tambah-lampiran').on('click', function() {
                        $(`                                <div id="lampiran-card-${countLampiran}">
                                    <input id="input-lampiran" class="mb-3" type="file" name="lampiran[]" multiple
                                        required /><i class="fa fa-xmark close-lampiran" data-id="${countLampiran}"
                                        style="cursor: pointer;"></i>
                                </div>`)
                            .insertBefore(`#addLampiranContainer`)
                        countLampiran++

                        $(`.close-lampiran`).off('click')
                        $(`.close-lampiran`).on('click', function() {
                            var id = $(this).data('id')
                            $(`#lampiran-card-${id}`).remove()
                        })
                    })

                    $(`.close-lampiran`).off('click')
                    $(`.close-lampiran`).on('click', function() {
                        var id = $(this).data('id')
                        $(`#lampiran-card-${id}`).remove()
                    })

                    $('#tambah-pekerjaan').on('click', function() {
                        $(` <div class="pekerjaan-group col-md-4 mb-3" data-group="${count}" id="pekerjaan-card-${count}">
                                <section class="card p-4">
                                    <div class="d-flex justify-content-between">
                                        <input type="text" class="font-weight-bold" placeholder="Nama Pekerjaan...."
                                            style="border: none; width: 80%; outline: none; font-size: 20px;" name="nama-pekerjaan-${count}" />
                                        <button id="close-pekerjaan" data-target="pekerjaan-card-${count}"
                                            class="btn btn-danger" type="button"><i
                                                class="fa-solid fa-xmark"></i></button>
                                    </div>
                                    <hr>
                                    <div>
                                        <div class="mt-2">
                                            <label>Kategori Pekerjaan</label>
                                            <div>
                                                <div>
                                                    <input type="radio" id="option-${count}-1" name="kategori-${count}" value="Prestool"
                                                        >
                                                    <label for="option-${count}-1">Prestool</label>
                                                </div>
                                                <div>
                                                    <input type="radio" id="option-${count}-2" name="kategori-${count}" value="Molding">
                                                    <label for="option-${count}-2">Molding</label>
                                                </div>
                                                <div>
                                                    <input type="radio" id="option-${count}-3" name="kategori-${count}"
                                                        value="Jig & Fixture">
                                                    <label for="option-${count}-3">Jig & Fixture</label>
                                                </div>
                                                <div>
                                                    <input type="radio" id="option-${count}-4" name="kategori-${count}" value="Pengukuran">
                                                    <label for="option-${count}-4">Pengukuran</label>
                                                </div>
                                                <div>
                                                    <input type="radio" id="option-${count}-5" name="kategori-${count}" value="Drawing">
                                                    <label for="option-${count}-5">Drawing</label>
                                                </div>
                                                <div>
                                                    <input type="radio" id="option-${count}-6" name="kategori-${count}" value="Frais">
                                                    <label for="option-${count}-6">Frais</label>
                                                </div>
                                                <div>
                                                    <input type="radio" id="option-${count}-7" name="kategori-${count}" value="3D Printing">
                                                    <label for="option-${count}-7">3D Printing</label>
                                                </div>
                                                <div>
                                                    <input type="radio" id="option-${count}-8" name="kategori-${count}"
                                                        value="Finite Element Analysis (FEA)">
                                                    <label for="option-${count}-8">Finite Element Analysis (FEA)</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <label>Kategori Prodi</label>
                                            <div>
                                                <input type="checkbox" id="check-${count}-1" name="prodi-${count}[]"
                                                    value="Teknologi Perancangan Perkakas Presisi">
                                                <label for="check-${count}-1">Teknologi Perancangan Perkakas Presisi</label><br>

                                                <input type="checkbox" id="check-${count}-2" name="prodi-${count}[]"
                                                    value="Teknologi Rekayasa Perancangan Manufaktur">
                                                <label for="check-${count}-2">Teknologi Rekayasa Perancangan
                                                    Manufaktur</label><br>

                                                <input type="checkbox" id="check-${count}-3" name="prodi-${count}[]"
                                                    value="Rekayasa Perancangan Mesin">
                                                <label for="check-${count}-3">Rekayasa Perancangan Mesin</label><br>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <label>Keterangan</label>
                                            <textarea class="form-control" id="keterangan" name="keterangan-${count}"
                                                placeholder="Type Here" rows="5"></textarea>
                                        </div>
                                    </div>
                                </section>
                            </div>`).insertBefore('#EditButtonContainer')

                        var item = {
                            [`group`]: count,
                            [`nama`]: "",
                            [`kategori`]: "",
                            [`prodi`]: [],
                        }
                        group = count

                        pekerjaan.push(item)
                        count++
                    })

                    $(document).on('click', '.pekerjaan-group', function() {
                        group = $(this).attr('data-group')

                        $(`input[name="nama-pekerjaan-${group}"]`).off('input');
                        $(`input[name="kategori-${group}"]`).off('click');
                        $(`input[name="prodi-${group}[]"]`).off('click');

                        $(`input[name="nama-pekerjaan-${group}"]`).on('input', function() {
                            pekerjaan.forEach((item) => {
                                if (item.group == group) {
                                    item.nama = $(this).val()
                                }
                            })
                        })

                        $(`input[name="kategori-${group}"]`).on('click', function() {
                            pekerjaan.forEach((item) => {
                                if (item.group == group) {
                                    item.kategori = $(this).val()
                                }
                            })
                        })

                        var temp = []
                        $(`input[name="prodi-${group}[]"]`).on('click', function() {
                            if ($(this).prop('checked') == true) {
                                pekerjaan.forEach((item) => {
                                    if (item.group == group) {
                                        item.prodi.push($(this).val())
                                    }
                                })
                            } else if ($(this).prop('checked') == false) {
                                pekerjaan.forEach((item) => {
                                    if (item.group == group) {
                                        item.prodi.forEach((x, i) => {
                                            if (x == $(this).val()) {
                                                item.prodi.splice(i, 1)
                                            }
                                        })
                                    }
                                })
                            }
                        })
                    })


                    $(document).on('click', '[data-target^="pekerjaan-card-"]', function() {
                        var targetId = $(this).attr('data-target');
                        $('#' + targetId).remove();
                        var id = targetId.split("-")[2]
                        pekerjaan.forEach((item, index) => {
                            if (item.group == id) {
                                pekerjaan.splice(index, 1)
                            }
                        })
                    });

                    $('#save-spk').on('submit', function(e) {
                        e.preventDefault()

                        var data = {
                            no_registrasi: $('#no_registrasi').val(),
                            keluar: $('#keluar').val(),
                            terima: $('#terima').val(),
                            deadline: $('#deadline').val(),
                            pemesan: $('#pemesan').val(),

                            pekerjaan: pekerjaan
                        }

                        $('#json_data').val(JSON.stringify(data));
                        document.getElementById('save-spk').submit();
                    })
                    </script>
</body>

</html>