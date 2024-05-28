          <!-- Modal Logout -->
          <div class="modal fade" id="logoutModal-r" tabindex="-1" role="dialog"
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
                          <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                          <a href="/logout" class="btn btn-primary">Logout</a>
                      </div>
                  </div>
              </div>
          </div>

          <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
              <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                  <i class="fa fa-bars"></i>
              </button>
              <ul class="navbar-nav ml-auto">
                  <?php if ($user_level == 'pic'): ?>
                  <li class="nav-item dropdown no-arrow mx-1">
                      <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-bell fa-fw"></i>
                          <span id="counter-notif" class="badge badge-danger badge-counter"></span>
                      </a>
                      <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                          aria-labelledby="alertsDropdown" id="alertsDropdownMenu">
                          <h6 class="dropdown-header">
                              Alerts Center
                          </h6>
                          <!-- <a class="dropdown-item d-flex align-items-center" href="#">
                              <div class="mr-3">
                                  <div class="icon-circle bg-success">
                                      <i class="fas fa-donate text-white"></i>
                                  </div>
                              </div>
                              <div>
                                  <div class="small text-gray-500">December 7, 2019</div>
                                  $290.29 has been deposited into your account!
                              </div>
                          </a>
                          <a class="dropdown-item d-flex align-items-center" href="#">
                              <div class="mr-3">
                                  <div class="icon-circle bg-warning">
                                      <i class="fas fa-exclamation-triangle text-white"></i>
                                  </div>
                              </div>
                              <div>
                                  <div class="small text-gray-500">December 2, 2019</div>
                                  Spending Alert: We've noticed unusually high spending for your account.
                              </div>
                          </a> -->
                          <div style="cursor: pointer;" id="before-this"
                              class="dropdown-item text-center small text-gray-500" href="#">Mark All
                              as
                              Read</div>
                      </div>
                  </li>
                  <?php endif ?>

                  <div class="topbar-divider d-none d-sm-block"></div>
                  <li class="nav-item dropdown no-arrow">
                      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <img class="img-profile rounded-circle"
                              src="<?= !empty($user_photo) ? 'aset/img/profile/' . $user_photo :'aset/img/boy.png' ?>">
                          <span class="ml-2 d-none d-lg-inline text-white small">
                              <?= $username ?>
                          </span>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                          aria-labelledby="userDropdown">
                          <a class="dropdown-item" href="/profile-<?= $user_id ?>">
                              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                              Profile
                          </a>
                          <?php if ($user_level == 'admin'): ?>
                          <a class="dropdown-item" href="manageaccount">
                              <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                              Account Management
                          </a>
                          <?php endif; ?>

                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal"
                              data-target="#logoutModal-r">
                              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                              Logout
                          </a>
                      </div>
                  </li>
              </ul>
          </nav>

          <script>
document.addEventListener('DOMContentLoaded', function() {
    var dropdownMenu = document.getElementById('alertsDropdownMenu');
    dropdownMenu.addEventListener('click', function(event) {
        event.stopPropagation();
    });
});
          </script>

          <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

          <script>
$.ajax({
    url: '/notification-all',
    type: 'GET',
    success: function(response) {
        response.forEach(item => {
            $(`<a title="mark as read" class="dropdown-item d-flex align-items-center list-item" href="#">
                              <div class="mr-3">
                                  <div class="icon-circle bg-primary">
                                      <i class="fas fa-exclamation-triangle text-white"></i>
                                  </div>
                              </div>
                              <div>
                                  <div class="small text-gray-500">${item.created_at}</div>
                                  <span class="">${item.message}</span>
                              </div>
                          </a>`).insertBefore('#before-this')
        })
        $('.list-item').on('click', function(e) {
            e.preventDefault()
        })

        $('#counter-notif').html(response.length)
    },
    error: function(xhr, status, error) {
        console.error(error);
    }
});

$('#before-this').on('click', function() {
    $.ajax({
        url: '/read-notification-all',
        method: 'POST',
        success: function(response) {
            console.log('ok')
        },
        error: function(xhr, status, error) {
            console.error(xhr);
        }
    });
    $('.list-item').remove()
    $('#counter-notif').html(0)
})
          </script>