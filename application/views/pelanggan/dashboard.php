<div class="container-fluid" style="margin-top: 50px;">
    <div class="card" style="margin-bottom: 10px;">
        <div class="card-body">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><i></i>List</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Image</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
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
                                            <a class="btn btn-sm btn-info" href="<?php echo base_url('pelanggan/dashboard/detailData/' . $brg->id_barang) ?>"><i class="mdi mdi-apps"> </i></a>
                                            <a class="btn btn-sm btn-danger" href="<?php echo base_url('pelanggan/keranjang/tambahKeranjang/' . $brg->id_barang) ?>"><i class="mdi mdi-cart-plus"></i></a>
                                        </center>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="row">
                        <?php foreach ($barang as $brg) : ?>
                            <div class="col-sm-2 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="<?php echo base_url('assets/foto/' . $brg->foto) ?>" class="card-img-top" style="width: 50; height:150px"><?php  ?>

                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $brg->nama_barang ?></h5>
                                        <p>Rp. <?php echo number_format($brg->harga_jual, 0, ',', '.') ?></p>
                                        <a class="btn btn-sm btn-danger me-4" href="<?php echo base_url('pelanggan/keranjang/tambahKeranjang/' . $brg->id_barang) ?>"><i class="mdi mdi-cart-plus"></i></a>
                                        <a class="btn btn-sm btn-info" href="<?php echo base_url('pelanggan/dashboard/detailData/' . $brg->id_barang) ?>"><i class="mdi mdi-apps"> Details</i></a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
        </div>