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
                            <!-- <h4 class="card-title">Form Input Barang Masuk</h4> -->
                            <form class="forms-sample" method="post" action="<?php echo base_url('admin/dataPemasukan/tambahDataAksi') ?>" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Id Barang Masuk</label>
                                    <input type="text" class="form-control" name="id_barangmasuk" value="<?php echo $kode; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Masuk</label>
                                    <input type="date" class="form-control" name="tanggal_masuk">
                                </div>
                                <div class="form-group">
                                    <label>Id Supplier</label>
                                    <select class="form-control" name="id_supplier">
                                        <option>--Pilih Supplier--</option>
                                        <?php foreach ($supplier as $s) : ?>
                                            <option value="<?php echo $s->id_supplier ?>"><?php echo $s->id_supplier ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kode Barang</label>
                                    <select class="form-control" name="id_barang">
                                        <option>--Pilih Barang--</option>
                                        <?php foreach ($barang as $b) : ?>
                                            <option value="<?php echo $b->id_barang ?>"><?php echo $b->id_barang ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Masuk</label>
                                    <input type="number" class="form-control" name="stok">
                                </div>
                                <div class="form-group">
                                    <!-- <label>Keterangan</label> -->
                                    <input type="hidden" class="form-control" name="keterangan" value="Tambah Stok" readonly>
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>