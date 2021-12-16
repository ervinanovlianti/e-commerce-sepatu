<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div>
          <a class="navbar-brand brand-logo" href="">
            <img src="<?php echo base_url() ?>assets/images/logo.svg" alt="logo" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="index.html">
            <img src="<?php echo base_url() ?>assets/images/logo-mini.svg" alt="logo" />
          </a>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-top">
        <ul class="navbar-nav">
          <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text">Welcome, <span class="text-black fw-bold"><?php echo $this->session->userdata('nama') ?></span></h1>
            <h3 class="welcome-sub-text">Anda Login Sebagai <span class="text-black fw-bold"><?php echo $this->session->userdata('role') ?></span> </h3>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item d-none d-lg-block">
            <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
              <span class="input-group-addon input-group-prepend border-right">
                <span class="icon-calendar input-group-text calendar-icon"></span>
              </span>
              <input type="text" class="form-control">
            </div>
          </li>
          <li class="nav-item">
            <form class="search-form" action="#">
              <i class="icon-search"></i>
              <input type="search" class="form-control" placeholder="Search Here" title="Search here">
            </form>
          </li>
          <li class="nav-item dropdown d-none d-lg-block user-dropdown">
            <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <img class="img-xs rounded-circle" src="<?php echo  base_url('assets/foto_user/') . $this->session->userdata('foto_user') ?>" alt="Profile image"> </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <div class="dropdown-header text-center">
                <img class="img-md rounded-circle" style="width: 30px;" src="<?php echo  base_url('assets/foto_user/') . $this->session->userdata('foto_user') ?>" alt="Profile image">
                <p class="mb-1 mt-3 font-weight-semibold"><?php echo $this->session->userdata('nama') ?></p>
                <p class="fw-light text-muted mb-0"><?php echo $this->session->userdata('username') ?></p>
              </div>
              <a class="dropdown-item" href="<?php echo base_url('admin/userProfil') ?>"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile </a>
              <a class="dropdown-item" href="<?php echo base_url('welcome/logout') ?>"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Log Out</a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <!-- <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme">
            <div class="img-ss rounded-circle bg-light border me-3"></div>Light
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border me-3"></div>Dark
          </div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div> -->
      <!-- partial -->
      <!-- sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('admin/dashboard') ?>">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <!-- <li class="nav-item nav-category">Data Master</li> -->
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('admin/dataBarang') ?>">
              <i class="menu-icon mdi mdi-briefcase"></i>
              <span class="menu-title">Data Barang</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#master" aria-expanded="false" aria-controls="master">
              <i class="menu-icon mdi mdi-folder-multiple"></i>
              <span class="menu-title">Master Data</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="master">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/dataKategori') ?>">Kategori</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/dataUkuran') ?>">Ukuran</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/dataSupplier') ?>">Supplier</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/dataPelanggan') ?>">Pelanggan</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/dataUser') ?>">User</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-briefcase-download"></i>
              <span class="menu-title">Pemasukan</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/dataPemasukan') ?>">Data Pemasukan</a></li>
                <!-- <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/inputPemasukan') ?>">Input Pemasukan</a></li> -->
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="menu-icon mdi mdi-briefcase-upload"></i>
              <span class="menu-title">Penjualan</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="<?php echo base_url('admin/dataPenjualan') ?>">Data Penjualan</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo base_url('admin/inputPenjualan') ?>">Input Penjualan</a></li>
              </ul>
            </div>
          </li>
          <!-- <li class="nav-item nav-category">Report</li> -->
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
              <i class="menu-icon mdi mdi-clipboard-text"></i>
              <span class="menu-title">Laporan</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/laporanPenjualan') ?>">Barang</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/laporanPenjualan') ?>">Pemasukan</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('admin/laporanPenjualan') ?>">Penjualan</a></li>
              </ul>
            </div>
          </li>

          <!-- <li class="nav-item nav-category">Setting</li> -->
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('admin/userProfil') ?>">
              <i class="menu-icon mdi mdi-account-circle-outline"></i>
              <span class="menu-title">User</span>
            </a>
          </li>
        </ul>
      </nav>