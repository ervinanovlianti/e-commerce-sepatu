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
                  <!-- <label>Id Barang</label> -->
                  <input type="hidden" name="id_barang" class="form-control" value="<?php echo $kode; ?>" readonly>
                </div>
                <div class="form-group" style="margin-top: 0;">
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
                    <div class="form-check-inline">
                      <?php
                        $mulai = 35;
                        for ($i = $mulai; $i < $mulai + 11; $i++) {
                          echo '<input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="ukuran[]" value="' . $i . '">'; 
                          echo '&nbsp &nbsp';
                          echo '<label class="form-check-label" for="inlineCheckbox1">' . $i . '</label>';
                        echo '&nbsp &nbsp';
                      }
                        ?>
                    </div>
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
                  <label for="">Supplier</label>
                  <select name="id_supplier" class="form-control">
                    <option value="">--Pilih Supplier--</option>
                    <?php foreach ($supplier as $sp) : ?>
                      <option value="<?php echo $sp->id_supplier ?>"><?php echo $sp->nama_supplier ?></option>
                    <?php endforeach; ?>
                  </select>
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