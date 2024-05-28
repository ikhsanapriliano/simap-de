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
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
  <style>
    .file-input-wrapper {
      position: relative;
      overflow: hidden;
      display: inline-block;
    }

    .file-input-wrapper input[type="file"] {
      font-size: 5px;
      position: absolute;
      z-index: 10;
      background-color: red;
      bottom: 0;
      right: 0;
      left: 0;
      top: 0;
      opacity: 0;
      cursor: pointer;
    }

    .img-container {
        height: 150px;
        width: 150px;
        border-radius: 50%;
        background-color: #dddddd;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .img-container img {
        height: 100%;
        width: 100%;
        object-fit: cover;
    }

    .btn-img {
        border-radius: 50%;
        position: absolute;
        right: 0;
        bottom: 0;
    }
  </style>

</head>

<body id="page-top">
<div id="wrapper">
<?php if (!empty(session()->getFlashdata('editSuccess'))): ?>
  <div class="modal fade" tabindex="-1" role="dialog" id="editModal">
    <div class="modal-dialog" role="document">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Edit Success! </strong><?=  session()->getFlashdata('editSuccess') ?>
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
            <h1 class="h3 mb-0 text-gray-800">Profile</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./dashboard">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
          </div>
          <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3">
                <form action="/changePhoto-<?= $data['id'] ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PATCH">  
                <div class="file-input-wrapper">
                    <input type="file" id="file-input" name="photo" required>
                    <div class="custom-file-button">
                        <div class="img-container">
                            <img src="<?= !empty($data['photo']) ? 'aset/img/profile/' . $data['photo'] : 'aset/img/boy.png' ?>" id="profile-img">
                            <div class="btn btn-primary btn-img" id="btn-img">
                                <i class="fa fa-paint-brush"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $pError = session()->getFlashdata('pError') ?>
                <?php if (!empty($pError['photo'])): ?>
                    <p class="text-danger">
                        <?= $pError['photo'] ?>
                    </p>
                <?php endif ?>

                <div class="mt-2 text-center mx-1"><button class="btn btn-primary profile-button" id="savePhoto" type="submit" hidden><i class="fa fa-save"></i>&nbsp;Simpan</button></div>

                <a href="/profile-<?= $data['id'] ?>">
                    <div class="mt-2 text-center mx-1 mb-2"><button class="btn btn-danger profile-button" id="cancelPhoto" type="button" hidden><i class="fa fa-ban"></i>&nbsp; Batalkan</button></div>
                </a>
                </form>
                <span class="font-weight-bold"><?= $data['nama'] ?></span>
                <span class="text-black-50"><?= $data['username'] ?></span>
                <span> </span>
            </div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                    <?php $nipError = session()->getFlashdata('nipError') ?>
                    <div class="col-md-12"><label class="labels">NIP</label><input id="nip" type="text" class="form-control <?= !empty($nipError) ? 'is-invalid' : '' ?>" placeholder="<?= !empty($data['nip']) ? $data['nip'] : '-' ?>" disabled></div>
                    <?php if (!empty($nipError)): ?>
                    <p class="col-md-12 text-danger">
                        <?= $nipError ?>
                    </p>
                    <?php endif ?>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12"><label class="labels">Nama</label><input id="nama" type="text" class="form-control" placeholder="<?= $data['nama'] ?>" disabled></div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12"><label class="labels">User Level</label>
                    <input id="hiddenUserLevel" type="hidden" value="<?= $data['user_level'] ?>" />
                    <select id="user_level" type="text" class="form-control" disabled>
                    <option id="worker" value="worker">worker</option>
                    <option id="pic" value="pic">pic</option>
                    <option id="ppc" value="ppc">ppc</option>
                    <option id="admin" value="admin">admin</option>
                    <option id="user" value="user">user</option>
                    </select>
                </div>
                </div>
                <div class="row mt-2">
                    <?php $errors = session()->getFlashdata('errors') ?>
                    <div class="col-md-12"><label class="labels">Username</label><input id="username" type="text" class="form-control <?= !empty($errors['username']) ? 'is-invalid' : "" ?>" placeholder="<?= $data['username'] ?>" disabled></div>
                    <?php if (!empty($errors['username'])): ?>
                    <p class="col-md-12 text-danger">
                        <?= 'Username sudah dipakai.' ?>
                    </p>
                    <?php endif ?>
                </div>
                <?php if ($user_level == 'admin'): ?> 
                <div class="row d-flex justify-content-center align-items-center">
                <div class="mt-4 text-center mx-1"><button class="btn btn-primary profile-button" id="editProfile" type="button"><i class="fa fa-paint-brush"></i>&nbsp;Edit</button></div>
                <div class="mt-4 text-center mx-1"><button class="btn btn-danger profile-button" id="deleteProfile" type="button" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i>&nbsp; Hapus</button></div>

                <form action="/editProfile-<?= $data['id'] ?>" method="post">
                    <input type="hidden" name="_method" value="PATCH">   
                    <input id="edit-nip" type="hidden" name="nip" />
                    <input id="edit-nama" type="hidden" name="nama" />
                    <input id="edit-userlevel" type="hidden" name="user_level" />
                    <input id="edit-username" type="hidden" name="username" />
                    <div class="mt-4 text-center mx-1"><button class="btn btn-primary profile-button" id="saveProfile" type="submit" hidden><i class="fa fa-save"></i>&nbsp;Simpan</button></div>
                </form>
                <a href="/profile-<?= $data['id'] ?>">
                    <div class="mt-4 text-center mx-1"><button class="btn btn-danger profile-button" id="cancelProfile" type="submit" hidden><i class="fa fa-ban"></i>&nbsp; Batalkan</button></div>
                </a >

                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      Are you sure want to delete this account?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form action="/deleteaccount-<?= $data['id'] ?>" method="post">
            <input type="hidden" name="_method" value="DELETE">       
            <button type="submit" class="btn btn-danger">Delete Account</button>
        </form>
      </div>
    </div>
  </div>
</div>
                </div>
                <?php endif ?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Additional Data</h4>
                </div>
                <?php $errorsAdditional = session()->getFlashdata('errorsAdditional') ?>
                <div class="row mt-2">
                    <div class="col-md-12"><label class="labels">Email</label><input id="email" type="text" class="form-control" placeholder="<?= !empty($data['email']) ? $data['email'] : '-' ?>" disabled></div>
                    <?php if (!empty($errorsAdditional['email'])): ?>
                    <p class="col-md-12 text-danger">
                        <?= $errorsAdditional['email'] ?>
                    </p>
                    <?php endif ?>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12"><label class="labels">No Telepon</label><input id="no_telepon" type="text" class="form-control" placeholder="<?= !empty($data['no_telepon']) ? $data['no_telepon'] : '-' ?>" disabled></div>
                    <?php if (!empty($errorsAdditional['no_telepon'])): ?>
                    <p class="col-md-12 text-danger">
                        <?= $errorsAdditional['no_telepon'] ?>
                    </p>
                    <?php endif ?>
                </div>
                <?php $emptyAdditional = session()->getFlashdata('emptyAdditional') ?>
                <?php if (!empty($emptyAdditional)): ?>
                    <p class="col-md-12 text-danger">
                        <?= $emptyAdditional ?>
                    </p>
                    <?php endif ?>
                <div class="row d-flex justify-content-center align-items-center">
                <div class="mt-4 text-center mx-1"><button id="ubahAdditional" class="btn btn-primary profile-button" type="button"><i class="fa fa-paint-brush"></i>&nbsp;Edit</button></div>
                <form action="/editAdditionalData-<?= $data['id'] ?>" method="post">
                    <input type="hidden" name="_method" value="PATCH">   
                    <input id="edit-email" type="hidden" name="email" />
                    <input id="edit-no-telepon" type="hidden" name="no_telepon" />
                    <div class="mt-4 text-center mx-1"><button class="btn btn-primary profile-button" id="saveAdditional" type="submit" hidden><i class="fa fa-save"></i>&nbsp;Simpan</button></div>
                </form>
                <a href="/profile-<?= $data['id'] ?>">
                    <div class="mt-4 text-center mx-1"><button class="btn btn-danger profile-button" id="cancelAdditional" type="submit" hidden><i class="fa fa-ban"></i>&nbsp; Batalkan</button></div>
                </a>
            </div>

                <div class="d-flex justify-content-between align-items-center mb-3 mt-5">
                    <h4 class="text-right">Change Password</h4>
                </div>
                <form action="/changePassword-<?= $data['id'] ?>" method="post">
                <?php $cpErrors = session()->getFlashdata('cpErrors') ?>
                <input type="hidden" name="_method" value="PATCH">   
                <div class="row form-group has-validation">
                    <div class="col-md-12"><label class="labels">New Password</label><input name="newPassword" type="password" class="form-control <?= !empty($cpErrors['newPassword']) ? 'is-invalid' : '' ?>" placeholder="Type Here" id="validationServerNewPassword" aria-describedby="inputGroupPrepend3 validationServerNewPasswordFeedback" required></div>
                    <div id="validationServerNewPasswordFeedback" class="col-md-12 text-danger">
                        <?= !empty($cpErrors['newPassword']) ? $cpErrors['newPassword'] : '' ?>
                    </div>
                </div>
                <div class="row mt-2 form-group has-validation">
                    <div class="col-md-12"><label class="labels">Confirm New Password</label><input name="confirmNewPassword" type="password" class="form-control <?= !empty($cpErrors['confirmNewPassword']) ? 'is-invalid' : '' ?>" placeholder="Type Here" id="validationServerConfirmNewPassword" aria-describedby="inputGroupPrepend3 validationServerConfirmNewPasswordFeedback" required></div>
                    <div id="validationServerConfirmNewPasswordFeedback" class="col-md-12 text-danger">
                        <?= !empty($cpErrors['confirmNewPassword']) ? $cpErrors['confirmNewPassword'] : '' ?>
                    </div>
                </div>
                <div class="row d-flex justify-content-center align-items-center">
                <?php $emptyChangePassword = session()->getFlashdata('emptyChangePassword') ?>
                <?php if (!empty($emptyChangePassword)): ?>
                    <p class="col-md-12 text-danger">
                        <?= $emptyChangePassword ?>
                    </p>
                    <?php endif ?>
                <div class="mt-4 text-center mx-1"><button class="btn btn-primary profile-button" type="submit"><i class="fa fa-save"></i>&nbsp;Simpan</button></div>
                </div>
                </form>
            </div>
        </div>
        
    </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function(){
      $('#user_level').children().each(function(index, element){
        if ($('#hiddenUserLevel').val() == $(element).val()) {
            $(element).attr('selected', true)
        }
      });
      $('#editModal').modal('show');
    });

    $('#editProfile').on('click', function() {
        $('#editProfile').attr('hidden', true)
        $('#deleteProfile').attr('hidden', true)
        $('#saveProfile').attr('hidden', false)
        $('#cancelProfile').attr('hidden', false)

        if ($('#user_level').val() == 'admin' || $('#user_level').val() == 'user') {
            $('#nip').attr('disabled', true)
        } else {
            $('#nip').attr('disabled', false)
        }

        $('#nama').attr('disabled', false)
        $('#user_level').attr('disabled', false)
        $('#username').attr('disabled', false)
    })

    $('#saveProfile').on('click', function() {
        $('#edit-nip').val($('#nip').val());
        $('#edit-nama').val($('#nama').val());
        $('#edit-userlevel').val($('#user_level').val());
        $('#edit-username').val($('#username').val());
    })

    $('#user_level').on('change', function() {
        if ($('#user_level').val() == 'admin' || $('#user_level').val() == 'user') {
            $('#nip').val(null)
            $('#nip').attr('placeholder', '-')
            $('#nip').attr('readonly', true)
        } else {
            $('#nip').attr('disabled', false)
        }
    })
    
    $('#ubahAdditional').on('click', function() {
        $('#ubahAdditional').attr('hidden', true)
        $('#saveAdditional').attr('hidden', false)
        $('#cancelAdditional').attr('hidden', false)

        $('#email').attr('disabled', false)
        $('#no_telepon').attr('disabled', false)
    })

    $('#saveAdditional').on('click', function() {
        $('#edit-email').val($('#email').val());
        $('#edit-no-telepon').val($('#no_telepon').val());
    })

    $('#file-input').on('mouseenter', function() {
        $('#btn-img').removeClass('btn-primary')
        $('#btn-img').addClass('btn-dark')
    }).on('mouseleave', function() {
        $('#btn-img').removeClass('btn-dark')
        $('#btn-img').addClass('btn-primary')
    })
    
    $('#file-input').on('change', function(e) {
        var file = e.target.files[0]
        if (file) {
            var reader = new FileReader()
            reader.onload = function (event) {
                $('#profile-img').attr('src', event.target.result)
            }
            reader.readAsDataURL(file)
        }
        $('#savePhoto').attr('hidden', false)
        $('#cancelPhoto').attr('hidden', false)
    })

    $('#validationServerNewPassword').on('keydown', function(e) {
        if (e.key === " ") {
            e.preventDefault()
        }
    })

    $('#validationServerConfirmNewPassword').on('keydown', function(e) {
        if (e.key === " ") {
            e.preventDefault()
        }
    })
</script>


</body>

</html>