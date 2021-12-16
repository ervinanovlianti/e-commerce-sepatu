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
              <form class="forms-sample" method="post" action="<?php echo base_url('admin/dataBarang/tambahDataAksi') ?>" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Id Barang</label>
                  <input type="text" name="id_barang" class="form-control" value="<?php echo $kode; ?>" readonly>
                </div>
                <div class="form-group">
                  <label>Nama Barang</label>
                  <input type="text" class="form-control" name="nama_barang" required>
                </div>
                <div class="form-group">
                  <label>Kategori</label>
                  <select class="form-control" name="nama_kategori" required>
                    <option value="">--Pilih Kategori--</option>
                    <?php foreach ($kategori as $k) : ?>
                      <option value="<?php echo $k->nama_kategori ?>"><?php echo $k->nama_kategori ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Ukuran</label>
                  <div class="form-group">
                    <?php foreach ($ukuran as $sz) : ?>
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="ukuran" value="<?php echo $sz->ukuran ?>">
                          <?php echo $sz->ukuran ?>
                        </label>
                      </div>
                    <?php endforeach; ?>
                  </div>
                </div>
                <div class="form-group">
                  <label>Stok</label>
                  <input type="number" class="form-control" name="stok" required>
                </div>
                <div class="form-group">
                  <label>Deskripsi</label>
                  <input type="text" class="form-control" name="deskripsi" required>
                </div>
                <div class="form-group">
                  <label>Harga Beli</label>
                  <input type="number" class="form-control" name="modal" required>
                </div>
                <div class="form-group">
                  <input type="hidden" class="form-control" name="harga_jual" required>
                </div>
                <div class="form-group">
                  <label>Foto</label>
                  <input type="file" class="form-control" name="foto" required>
                </div>

                <button type="submit" class="btn btn-primary me-2">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>