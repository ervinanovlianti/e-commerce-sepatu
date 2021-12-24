<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-sm-12">
            <div class="home-tab">
                <h2 class="text-center"> <?php echo $title ?> </h2>
            </div>
            <hr>
            <div class="row justify-content-md-center">
                <div class="col-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <?php $no = 1;
                            foreach ($barang as $brg) : ?>
                                <form class="forms-sample" method="post" action="<?php echo base_url('admin/dataBarang/updateDataAksi') ?>" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Id Barang</label>
                                        <input type="text" name="id_barang" class="form-control" value="<?php echo $brg->id_barang ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Brand</label>
                                        <input type="text" class="form-control" name="nama_barang" value="<?php echo $brg->nama_barang ?>">
                                    </div>
                                   
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select name="nama_kategori" class="form-control">
                                            <option value="<?php echo $brg->nama_kategori ?>"><?php echo $brg->nama_kategori ?></option>
                                            <?php foreach ($kategori as $k) : ?>
                                                <option value="<?php echo $k->nama_kategori ?>"><?php echo $k->nama_kategori ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Stok</label>
                                        <input type="number" class="form-control" name="stok" value="<?php echo $brg->stok ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <input type="text" class="form-control" name="deskripsi" value="<?php echo $brg->deskripsi ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Harga Beli</label>
                                        <input type="number" class="form-control" name="modal" value="<?php echo $brg->modal ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Foto</label>
                                        <input type="file" class="form-control" name="foto">
                                    </div>

                                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                                </form>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>