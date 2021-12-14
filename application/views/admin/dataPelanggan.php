    <!-- partial -->
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
                        <!-- <h4 class="card-title">Data Supplier</h4> -->
                        <a type="button" class="btn btn-outline-success" href="<?php echo base_url('admin/dataPelanggan/tambahData') ?>">Tambah Pelanggan</a>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Id Pelanggan</th>
                                        <th>Nama Pelanggan</th>
                                        <th>No. Telp</th>
                                        <th>Alamat</th>
                                        <!-- <th>Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($pelanggan as $p) : ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $p->id_pelanggan ?></td>
                                            <td><?php echo $p->nama_pelanggan ?></td>
                                            <td><?php echo $p->notelp_pelanggan ?></td>
                                            <td><?php echo $p->alamat_pelanggan ?></td>
                                            <!-- <td>
                                                <center>
                                                    <a class="btn btn-sm btn-success" href=""><i class="mdi mdi-border-color"></i></a>
                                                    <a onclick="return confirm('Yakin Ingin Menghapus Data?')" class="btn btn-sm btn-danger" href=""><i class="mdi mdi-delete"></i></a>
                                                </center>
                                            </td> -->
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->