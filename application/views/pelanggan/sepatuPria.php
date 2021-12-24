<div class="container-fluid" style="margin-top: 100px;">
    <div class="row">
        <?php foreach ($SP as $sp) : ?>
            <div class="col-sm-2 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <img src="<?php echo base_url('assets/foto/' . $sp->foto) ?>" class="card-img-top" style="width: 50; height:150px"><?php  ?>

                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $sp->nama_barang ?></h5>
                        <p>Rp. <?php echo number_format($sp->harga_jual, 0, ',', '.') ?></p>
                        <a class="btn btn-sm btn-danger" href="<?php echo base_url('pelanggan/keranjang/tambahKeranjang/' . $sp->id_barang) ?>"><i class="mdi mdi-cart-plus"></i></a>
                        <a class="btn btn-sm btn-info" href="<?php echo base_url('pelanggan/dashboard/detailData/' . $sp->id_barang) ?>"><i class="mdi mdi-apps"> Details</i></a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>