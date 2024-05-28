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
            <h1 class="h3 mb-0 text-gray-800">Add Order</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="orderlistpage">Orderlist</a></li>
              <li class="breadcrumb-item active" aria-current="page">Add Order</li>
            </ol>
          </div>


          <form method="post" action="/spk/save">
            <?= csrf_field();?>
            <div class="form-row">
              <div class="col-md-4 mb-3">
                <label for="validationDefault01">No. Registrasi</label>
                <input type="text" class="form-control" id="validationDefault01" name="noregistrasi" placeholder="Type Here" required>
              </div>
              <div class="form-group col-md-2">
                <label>Tanggal Dikeluarkan</label>
                <input type="date" class="form-control" name="tanggaldikeluarkan" placeholder="Type Here">
              </div>
              <div class="form-group col-md-2">
                <label>Tanggal Diterima</label>
                <input type="date" class="form-control" name="tanggalditerima" placeholder="Type Here">
              </div>
              <div class="form-group col-md-2">
                <label>Tanggal Penyerahan</label>
                <input type="date" class="form-control" name="targetpenyerahan" placeholder="Type Here">
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-4 mb-3">
                <label>Pemesan</label>
                <input type="text" class="form-control" name="pemesan" placeholder="Type Here">
              </div>
              <div class="col-md-4 mb-3">
                <label>Nama Pekerjaan</label>
                <input type="text" class="form-control" name="pekerjaan" placeholder="Type Here">
              </div>
              <div class="col-md-4 mb-3">
                <label>Kategori Pekerjaan</label>
                <select type="text" class="form-control" name="kategoripekerjaan" placeholder="Kategori pekerjaan">
                  <option value="">Pilih Pekerjaan</option>
                  <option value="3D Printing">3D Printing</option>
                  <option value="3D Scanning">3D Scanning</option>
                  <option value="Pengukuran">Pengukuran</option>
                </select>
              </div>
              <div class="col-md-4 mb-3">
                <label>Kategori Prodi</label>
                <select type="text" class="form-control" name="kategoriprodi" placeholder="Kategori prodi">
                  <option value="">Pilih Prodi</option>
                  <option value="Prodi 1">Prodi 1</option>
                  <option value="Prodi 2">Prodi 2</option>
                  <option value="Prodi 3">Prodi 3</option>
                </select>
              </div>
              <div class="col-md-4 mb-3">
                <label>Penanggung Jawab</label>
                <input type="text" class="form-control" name="penanggungjawab" placeholder="Type Here">
              </div>
              <div class="col-md-4 mb-3">
                <label>Anggota Tim</label>
                <input type="text" class="form-control" name="anggotatim" placeholder="Type Here">
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-4 mb-3">
                <label>Status</label>
                <select type="text" class="form-control" name="status" placeholder="Status">
                  <option value="">Status</option>
                  <option value="Selesai">Selesai</option>
                  <option value="Belum Selesai">Belum Selesai</option>
                </select>
              </div>
              <div class="col-md-4 mb-3">
                <label>Progres</label>
                <select type="text" class="form-control" name="progres" >
                  <option value="">Pilih Persentase</option>
                  <option value="0%">0%</option>
                  <option value="25%">25%</option>
                  <option value="50%">50%</option>
                  <option value="75%">75%</option>
                  <option value="100%">100%</option>
                </select>
              </div>
              <div class="col-md-4 mb-3">
                <label>Keterangan</label>
                <input type="text" class="form-control" name="keterangan" placeholder="Type Here">
              </div>
              <div class="form-group col-md-2">
                <label>Tanggal Selesai</label>
                <input type="date" class="form-control" name="tanggalselesai" placeholder="Type Here">
              </div>
            </div>
            <br>
            <center>
              <button type="submit" class="btn btn-primary">Submit</button>
              <a href="orderlistpage" class="btn btn-primary">Batal</a>
            </center>
          </form>

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

</html>