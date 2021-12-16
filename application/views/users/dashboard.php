    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Gambar</th>
                                    <th>Nama Barang</th>
                                    <th>Ukuran</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($barang as $brg) : ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td>
                                            <img class="img-sm rounded-10" src="<?php echo base_url('assets/foto/' . $brg->foto) ?>" alt="">
                                        </td>
                                        <td><?php echo $brg->nama_barang ?></td>
                                        <td><?php echo $brg->ukuran ?></td>
                                        <td>Rp.<?php echo number_format($brg->harga_jual, 0, ',', '.') ?></td>
                                        <td>
                                            <center>
                                                <a class="btn btn-sm btn-info" href=""><i class="mdi mdi-apps"> </i></a>
                                                <a class="btn btn-sm btn-danger" href="<?php echo base_url('users/keranjang/tambahKeranjang/' . $brg->id_barang) ?>"><i class="mdi mdi-cart-plus"></i></a>
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
        <!-- content-wrapper ends -->