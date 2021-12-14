<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-sm-12">
            <div class="home-tab">
                <h2 class="text-center"> <?php echo $title ?> </h2>
            </div>
            <hr>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-info mb-4" href="<?php echo base_url('admin/dataUser/tambahData') ?>"> Tambah User</a>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Id User</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Status</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($user as $us) : ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $us->id_user ?></td>
                                        <td><?php echo $us->nama ?></td>
                                        <td><?php echo $us->username ?></td>
                                        <td><?php echo $us->role ?></td>
                                        <td><?php echo $us->jk ?></td>
                                        <td>
                                            <img src="<?php echo base_url('assets/foto_user/' . $us->foto_user) ?>">
                                        </td>
                                        <td>
                                            <center>
                                                <a class="btn btn-sm btn-success" href="<?php echo base_url('admin/dataUser/updateData/' . $us->id_user) ?>"><i class="mdi mdi-border-color"></i></a>
                                                <a onclick="return confirm('Yakin Ingin Menghapus Data?')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/dataUser/deleteData/' . $us->id_user) ?>"><i class="mdi mdi-delete"></i></a>
                                            </center>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>