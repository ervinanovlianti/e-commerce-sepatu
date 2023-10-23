<div class="container-fluid" style="margin-top: 100px;">
    <div class="row">
        <?php foreach ($SW as $sw) : ?>
            <div class="col-sm-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <img src="<?php echo base_url('assets/foto/' . $sw->foto) ?>" class="card-img-top" style="width: 50; height:150px"><?php  ?>

                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $sw->nama_barang ?></h5>
                        <p>Harga : Rp. <?php echo number_format($sw->harga_jual, 0, ',', '.') ?></p>
                        <p>Stok :
                            <?php if ($sw->stok != 0) { ?>
                                <span class="badge rounded-pill bg-info"><?php echo $sw->stok ?></span>
                            <?php } else { ?>
                                <span class="badge rounded-pill bg-warning">Kosong</span>
                            <?php } ?>
                        </p>
                        <p>Ukuran : <?php echo $sw->ukuran ?></p>

                        <a class="btn btn-sm btn-danger" href="<?php echo base_url('-pelanggan/keranjang/tambahKeranjang/' . $sw->id_barang) ?>"><i class="mdi mdi-cart-plus"></i>Keranjang</a>
                        <a class="btn btn-sm btn-info" href="<?php echo base_url('-pelanggan/dashboard/detailData/' . $sw->id_barang) ?>"><i class="mdi mdi-apps"> </i>Detail</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>