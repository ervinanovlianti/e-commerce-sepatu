<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Login </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <h3 class="text-center fw-bold">Sepatu Kita</h3>
                            </div>
                            <h4>Selamat Datang</h4>
                            <h6 class="fw-light">Silahkan Registrasi Akun Terlebih Dahulu.</h6>
                            <form class="pt-3" method="POST" action="<?php echo base_url('login/registerAksi') ?>">
                                <div class="form-group">

                                    <input type="hidden" class="form-control form-control-lg" name="id_pelanggan" value="<?php echo $kode; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Lengkap</label>

                                    <input type="text" class="form-control form-control-lg" placeholder="Nama Lengkap Anda" name="nama_pelanggan">
                                </div>
                                <div class="form-group">
                                    <label for="">E-mail</label>

                                    <input type="email" class="form-control form-control-lg" placeholder="Username" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>

                                    <input type="password" class="form-control form-control-lg" placeholder="Password" name="password">
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" href="">REGISTER</button>
                                </div>

                                <div class="text-center mt-4 fw-light">
                                    Sudah Punya Akun?<a href="<?php echo base_url('login') ?>" class="text-primary">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?php echo base_url() ?>assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="<?php echo base_url() ?>assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?php echo base_url() ?>assets/js/off-canvas.js"></script>
    <script src="<?php echo base_url() ?>assets/js/hoverable-collapse.js"></script>
    <script src="<?php echo base_url() ?>assets/js/template.js"></script>
    <script src="<?php echo base_url() ?>assets/js/settings.js"></script>
    <script src="<?php echo base_url() ?>assets/js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>