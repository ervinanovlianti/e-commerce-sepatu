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
                  <input type="text" name="id_barang" class="form-control">
                </div>
                <div class="form-group">
                  <label>Nama Barang</label>
                  <input type="text" class="form-control" name="nama_barang">
                </div>
                <div class="form-group">
                  <label>Kategori</label>
                  <select class="form-control" name="nama_kategori">
                    <option>--Pilih Barang--</option>
                    <?php foreach ($kategori as $k) : ?>
                      <option value="<?php echo $k->nama_kategori ?>"><?php echo $k->nama_kategori ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Stok</label>
                  <input type="number" class="form-control" name="stok">
                </div>
                <div class="form-group">
                  <label>Deskripsi</label>
                  <input type="text" class="form-control" name="deskripsi">
                </div>

                <div class="form-group">
                  <label>Harga Beli</label>
                  <input type="number" class="form-control" name="modal">
                </div>
                <div class="form-group">
                  <label>Foto</label>
                  <input type="file" class="form-control" name="foto">
                </div>
                
                <button type="submit" class="btn btn-primary me-2">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>