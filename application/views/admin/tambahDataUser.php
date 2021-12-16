<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-sm-12">
            <div class="home-tab">
                <h2 class="text-center"> <?php echo $title ?> </h2>
            </div>
            <hr>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-6 grid-margin center-card">
                <div class="card">
                    <div class="card-body">
                        <!-- <h4 class="card-title">Form Tambah Barang</h4> -->
                        <form class="forms-sample" method="post" action="<?php echo base_url('admin/dataUser/tambahDataAksi') ?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Id User</label>
                                <input type="text" class="form-control" name="id_user" value="<?php echo $kode; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama">
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="form-group">
                                <label for="">Status User</label>
                                <select class="form-control" name="role">
                                    <option selected>Pilih Status User</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Kasir">Kasir</option>
                                    <option value="Manager">Manager</option>
                                    <option value="User">User</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <select name="jk" class="form-control">
                                    <option value="">--Pilih Jenis Kelamin--</option>
                                    <option value="Laki-laki">Laki laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Hak Akses</label>
                                <select name="hak_akses" class="form-control">
                                    <option value="">--Pilih Hak Akses--</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Kasir</option>
                                    <option value="3">Manager</option>
                                    <option value="4">User</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Foto</label>
                                <input type="file" class="form-control" name="foto_user">
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>