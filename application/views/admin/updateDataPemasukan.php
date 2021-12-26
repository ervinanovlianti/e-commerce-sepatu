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
                            <?php foreach ($barangmasuk as $bm) : ?>
                                <form class="forms-sample" method="post" action="<?php echo base_url('admin/dataPemasukan/updateDataAksi') ?>" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Id Barang Masuk</label>
                                        <input type="text" class="form-control" name="id_barangmasuk" value="<?php echo $bm->id_barangmasuk ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Masuk</label>
                                        <input type="date" class="form-control" name="tanggal_masuk" value="<?php echo $bm->tanggal_masuk ?>">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Kode Barang</label>
                                        <select class="form-control" name="id_barang">
                                            <option value="<?php echo $bm->id_barang ?>"><?php echo $bm->id_barang ?></option>
                                            <?php foreach ($barang as $b) : ?>
                                                <option value="<?php echo $b->id_barang ?>"><?php echo $b->id_barang ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah Masuk</label>
                                        <input type="number" class="form-control" name="stok" value="<?php echo $bm->stok ?>">
                                    </div>
                                    <div class="form-group">
                                        <!-- <label>Keterangan</label> -->
                                        <input type="hidden" class="form-control" name="keterangan" value="Update Stok" readonly>
                                    </div>
                                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                                </form>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>