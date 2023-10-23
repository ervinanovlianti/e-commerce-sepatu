<div class="container-fluid" style="margin-top: 100px;">
    <div class="row">
        <?php foreach ($SP as $sp) : ?>
            <div class="col-sm-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <img src="<?php echo base_url('assets/foto/' . $sp->foto) ?>" class="card-img-top" style="width: 50; height:150px"><?php  ?>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $sp->nama_barang ?></h5>
                        <p>Harga : Rp. <?php echo number_format($sp->harga_jual, 0, ',', '.') ?></p>
                        <p>Stok :
                            <?php if ($sp->stok != 0) { ?>
                                <span class="badge rounded-pill bg-info"><?php echo $sp->stok ?></span>
                            <?php } else { ?>
                                <span class="badge rounded-pill bg-warning">Kosong</span>
                            <?php } ?>
                        </p>
                        <p>Ukuran : <?php echo $sp->ukuran ?></p>
                        <a class="btn btn-sm btn-danger" href="<?php echo base_url('pelanggan/keranjang/tambahKeranjang/' . $sp->id_barang) ?>"><i class="mdi mdi-cart-plus"></i>Keranjang</a>
                        <a class="btn btn-sm btn-info" href="<?php echo base_url('pelanggan/dashboard/detailData/' . $sp->id_barang) ?>"><i class="mdi mdi-apps"> </i>Detail</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>