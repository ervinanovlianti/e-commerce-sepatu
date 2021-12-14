<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-sm-12">
            <div class="home-tab">
                <h2 class="text-center"> <?php echo $title ?> </h2>
            </div>
            <hr>
        </div>
        <div class="row">
            <div class="col-md-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <img style="width: 100%;" src="<?php echo  base_url('assets/foto_user/') . $this->session->userdata('foto_user') ?>" alt="Profile image"> </a>

                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            Biodata User
                        </div>
                        <table class="table mb-6">
                            <tr>
                                <th>Nama Lengkap</th>
                                <td>
                                    <?php echo $this->session->userdata('nama') ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Username</th>
                                <td>
                                    <?php echo $this->session->userdata('username') ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    <?php echo $this->session->userdata('role') ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td>
                                    <?php echo $this->session->userdata('jk') ?>
                                </td>
                            </tr>
                            <tr>
                            </tr>

                        </table>

                    </div>
                </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
                <div class="card">

                    <div class="card-body">
                        <div class="card-title">
                            Pengaturan
                        </div>
                        <button class="btn btn-info">Update Data</button>
                        <button class="btn btn-primary">Ganti Password</button>
                    </div>
                </div>
            </div>

        </div>

    </div>