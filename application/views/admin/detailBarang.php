<div class="main-panel">
  <div class="content-wrapper">
    <div class="col-sm-12">
      <div class="home-tab">
        <h2 class="text-center"> <?php echo $title ?> </h2>
      </div>
      <hr>
    </div>
    <div class="card">
      <div class="row">
        <div class="col-md-4">
          <!-- <div class="card"> -->
          <div class="card-body">
            <img src="<?php echo base_url('assets/foto/' . $detail->foto) ?>" class="card-img-top">
          </div>
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <tr>
                  <th style="width: 5px;">Id Barang</th>
                  <td><?php echo $detail->id_barang ?></td>
                </tr>
                <tr>
                  <th>Nama Barang</th>
                  <td><?php echo $detail->nama_barang ?></td>
                </tr>
                <tr>
                  <th>Kategori</th>
                  <td><?php echo $detail->nama_kategori ?></td>
                </tr>
                <tr>
                  <th>Ukuran</th>
                  <td><?php echo $detail->ukuran ?></td>
                </tr>
                <tr>
                  <th>Stok</th>
                  <td><?php echo $detail->stok ?></td>
                </tr>
                <tr>
                  <th>Harga Beli</th>
                  <td>Rp. <?php echo number_format($detail->modal, 0, ',', '.') ?></td>
                </tr>
                <tr>
                  <th>Harga Jual</th>
                  <td>Rp. <?php echo number_format($detail->modal + (0.2 * $detail->modal), 0, ',', '.') ?></td>
                </tr>
                <tr>
                  <th>Deskripsi</th>
                  <td><?php echo $detail->deskripsi ?></td>
                </tr>
              </table>

            </div>
            <!-- <a class="btn btn-primary btn-md mt-5" href="<?php echo base_url('admin/dataBarang') ?>"> Kembali</a> -->

          </div>
        </div>
      </div>
    </div>
  </div>