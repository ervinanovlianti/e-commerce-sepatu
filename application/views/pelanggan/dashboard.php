<div class="container-fluid" style="margin: 25px;">
    <!-- <div class="card" style="margin-bottom: 120px;"> -->
        <!-- <div class="card-body"> -->
            <div class="row" style="margin-top: 100px;">
                <?php foreach ($barang as $key => $value) { ?>
                    <div class="col-sm-3 grid-margin stretch-card">
                        <?php
                        echo
                        form_open('pelanggan/keranjang/add');
                        echo form_hidden('id', $value->id_barang);
                        echo form_hidden('qty', 1);
                        echo form_hidden('price', $value->harga_jual);
                        echo form_hidden('name', $value->nama_barang);
                        echo form_hidden('size', $value->ukuran);
                        echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
                        ?>
                        <div class="card">
                            <div class="card-body">
                                <img src="<?php echo base_url('assets/foto/' . $value->foto) ?>" class="card-img-top" style="width: 50; height:150px"><?php  ?>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $value->nama_barang ?></h5>
                                <p>Harga : Rp. <?php echo number_format($value->harga_jual, 0, ',', '.') ?></p>
                                <p>Stok :
                                    <?php if ($value->stok != 0) { ?>
                                        <span class="badge rounded-pill bg-info"><?php echo $value->stok ?></span>
                                    <?php } else { ?>
                                        <span class="badge rounded-pill bg-warning">Kosong</span>
                                    <?php } ?>
                                </p>
                                <p>Ukuran : <?php echo $value->ukuran ?></p>
                                <button type="submit" class="btn btn-danger btn-sm"><i class="mdi mdi-cart-plus"></i>Keranjang</button>
                                <a class="btn btn-sm btn-info" href="<?php echo base_url('pelanggan/dashboard/detailData/' . $value->id_barang) ?>"><i class="mdi mdi-apps"> </i>Detail</a>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                <?php } ?>
            </div>
        <!-- </div> -->
    <!-- </div> -->