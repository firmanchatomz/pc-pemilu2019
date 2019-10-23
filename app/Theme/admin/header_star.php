<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Star Admin Template</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href=<?= base_url('theme/staradmin/vendors/iconfonts/mdi/css/materialdesignicons.min.css')?>>
  <link rel="stylesheet" href=<?= base_url('theme/staradmin/vendors/css/vendor.bundle.base.css')?>>
  <link rel="stylesheet" href=<?= base_url('theme/staradmin/vendors/css/vendor.bundle.addons.css')?>>

  <link rel="stylesheet" href=<?= base_url('theme/staradmin/vendors/iconfonts/font-awesome/css/font-awesome.css')?>>
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href=<?= base_url('theme/staradmin/css/style.css')?>>
  <!-- endinject -->
  <link rel="shortcut icon" href=<?= base_url('assets/img/fc.ico')?>>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="index.html">
          <img src=<?= base_url('theme/staradmin/images/logo.svg')?> alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="index.html">
          <img src=<?= base_url('theme/staradmin/images/logo-mini.svg')?> alt="logo" />
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
          <li class="nav-item">
            <a href="#" class="nav-link">Schedule
              <span class="badge badge-primary ml-1">New</span>
            </a>
          </li>
          <li class="nav-item active">
            <a href="#" class="nav-link">
              <i class="mdi mdi-elevation-rise"></i>Reports</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="mdi mdi-bookmark-plus-outline"></i>Score</a>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <i class="mdi mdi-file-document-box"></i>
              <span class="count">7</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
              <div class="dropdown-item">
                <p class="mb-0 font-weight-normal float-left">You have 7 unread mails
                </p>
                <span class="badge badge-info badge-pill float-right">View all</span>
              </div>
              <?php 
              $info = [['nama' => 'Firman','time' => '1 Minutes ago','pesan' => 'The meeting is cancelled'], ['nama' => 'Chatomz','time' => '7 Minutes ago','pesan' => 'Open your email now!'],['nama' => 'Firman Chatomz','time' => '23 Minutes ago','pesan' => 'The meeting is amazing']];
              foreach ($info as $row): ?>
              <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src=<?= base_url('assets/img/chatomz.jpg')?> alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content flex-grow">
                    <h6 class="preview-subject ellipsis font-weight-medium text-dark"><?php echo $row['nama'] ?>
                      <span class="float-right font-weight-light small-text"><?php echo $row['time'] ?></span>
                    </h6>
                    <p class="font-weight-light small-text">
                      <?php echo $row['pesan'] ?>
                    </p>
                  </div>
                </a>
              <?php endforeach ?>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-bell"></i>
              <span class="count">4</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <a class="dropdown-item">
                <p class="mb-0 font-weight-normal float-left">You have 4 new notifications
                </p>
                <span class="badge badge-pill badge-warning float-right">View all</span>
              </a>
                <?php
                 $notif = [
                            ['notif' => 'Application Error','pesan' => 'Just now','icon' => 'mdi-alert-circle-outline'], 
                            ['notif' => 'Settings','pesan' => 'Private message','icon' => 'mdi-comment-text-outline'],
                            ['notif' => 'New user registration','pesan' => '2 days ago','icon' => 'mdi-email-outline']
                          ];

                foreach ($notif as $row): ?>
                  
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-success">
                      <i class="mdi <?php echo $row['icon'] ?> mx-0"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-medium text-dark"><?php echo $row['notif'] ?></h6>
                    <p class="font-weight-light small-text">
                      <?php echo $row['pesan'] ?>
                    </p>
                  </div>
                </a>
                <?php endforeach ?>
            </div>
          </li>
          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text">Hello, Firman Chatomz !</span>
              <img class="img-xs rounded-circle" src=<?= base_url('assets/img/chatomz.jpg')?> alt="Profile image">
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <a class="dropdown-item p-0">
                <div class="d-flex border-bottom">
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                    <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                  </div>
                </div>
              </a>
              <a class="dropdown-item mt-2">
                Manage Accounts
              </a>
              <a class="dropdown-item">
                Change Password
              </a>
              <a class="dropdown-item">
                Check Inbox
              </a>
              <a class="dropdown-item">
                Sign Out
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <img src=<?= base_url('assets/img/chatomz.jpg')?> alt="profile image">
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">Firman Chatomz</p>
                  <div>
                    <small class="designation text-muted">Manager</small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
              <button class="btn btn-success btn-block">New Project
                <i class="mdi mdi-plus"></i>
              </button>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href=<?= base_url('home/index#home')?>>
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Basic UI Elements</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href=<?= base_url('home/index#buttons')?>>Buttons</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href=<?= base_url('home/index#typography')?>>Typography</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href=<?= base_url('home/index#form')?>>
              <i class="menu-icon mdi mdi-backup-restore"></i>
              <span class="menu-title">Form elements</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href=<?= base_url('home/index#chart')?>>
              <i class="menu-icon mdi mdi-chart-line"></i>
              <span class="menu-title">Charts</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href=<?= base_url('home/index#tables')?>>
              <i class="menu-icon mdi mdi-table"></i>
              <span class="menu-title">Tables</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href=<?= base_url('home/index#icons')?>>
              <i class="menu-icon mdi mdi-sticker"></i>
              <span class="menu-title">Icons</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="menu-icon mdi mdi-restart"></i>
              <span class="menu-title">Multi Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="#"> Page 1 </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> Page 2 </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> Page 3 </a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">