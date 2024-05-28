<ul class="navbar-nav sidebar sidebar-light accordion <?= !empty($untoggled) ? '' : 'toggled' ?>" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-icon">
            <img src="aset/img/logo/polman.png">
        </div>
        <div class="sidebar-brand-text mx-3">SIMAP-DE</div>
    </a>
    <li id="dashboard" class="nav-item">
        <a class="nav-link" href="dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li id="orderlistpage" class="nav-item">
        <a class="nav-link" href="orderlistpage">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Orderlist</span></a>
    </li>
    <li id="progressform" class="nav-item">
        <a class="nav-link" href="progressform">
            <i class="fas fa-fw fa-clipboard-list"></i>
            <span>Progress Form</span></a>
    </li>
    <li id="filestorage" class="nav-item">
        <a class="nav-link" href="filestorage">
            <i class="fas fa-fw fa-folder"></i>
            <span>File Storage</span></a>
    </li>
    <li id="3dprint" class="nav-item">
        <a class="nav-link" href="3dprint">
            <i class="fas fa-fw fa-cog"></i>
            <span>3D Printer Utility</span></a>
    </li>
    <li id="worker" class="nav-item">
        <a class="nav-link" href="worker">
            <i class="fas fa-fw fa-user"></i>
            <span>Workers</span></a>
    </li>
    <li id="biddinglistpage" class="nav-item">
        <a class="nav-link" href="/biddinglistpage">
            <i class="fas fa-fw fa-plus"></i>
            <span>Bidding List</span></a>
    </li>
    <li id="donelistpage" class="nav-item">
        <a class="nav-link" href="/donelistpage">
            <i class="fas fa-fw fa-flag"></i>
            <span>Done List</span></a>
    </li>
</ul>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
var currentPathName = window.location.pathname.split('/')[1]
$(`#${currentPathName}`).addClass('bg-secondary')
$(`#${currentPathName}`).children('a').addClass('text-white')
$(`#${currentPathName}`).children('a').children('i').addClass('text-white')
</script>