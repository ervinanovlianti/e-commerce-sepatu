<body>
  <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-secondary">
    <div class="container-fluid px-4 px-lg-5">
      <div class="text-center navbar-brand justify-content-start">
        <div>
          <a class="navbar-brand" href="">
            SepatuKita
          </a>
        </div>
      </div>
      <div class="collapse navbar-collapse fw-bold">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('pelanggan/dashboard') ?>">Beranda</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Kategori
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="<?php echo base_url('pelanggan/dashboard/kategoriPria') ?>">Sepatu Pria</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('pelanggan/dashboard/kategoriWanita') ?>">Sepatu Wanita</a></li>
            </ul>
          </li>
          <?php if ($this->session->userdata('id_pelanggan')) { ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('pelanggan/transaksi') ?>">
                Transaksi
              </a>
            </li>
          <?php } ?>
        </ul>
        <form class="d-flex" action="<?php echo base_url('pelanggan/dashboard/search') ?>" method="POST">
          <input type="text" name="keyword" class="form-control me-2" placeholder="Search">
          <button class="btn btn-outline-success btn-sm" type="submit">Search</button>
        </form>

        <ul class="navbar-nav ms-auto">
          <?php if ($this->session->userdata('id_pelanggan')) { ?>
            <li class="nav-link">
              <a class="btn btn-sm btn-primary position-relative" href="<?php echo base_url('pelanggan/keranjang') ?>">
                <i class="mdi mdi-cart"></i>
                Keranjang
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                  <?php echo $this->cart->total_items() ?>
                </span>
              </a>
            </li>
          <?php } ?>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <?php if ($this->session->userdata('id_pelanggan')) { ?>

            <li class="nav-link">
              <div>Selamat Datang, <?php echo $this->session->userdata('nama_pelanggan') ?></div>
            </li>
            <li class="nav-link">||</li>
            <li>
              <a class="nav-link" href="<?php echo base_url('login/logout') ?>">
                Logout
              </a>
            </li>
          <?php } else { ?>
            <li>
              <a class="nav-link" href="<?php echo base_url('login') ?>">
                Login
              </a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>