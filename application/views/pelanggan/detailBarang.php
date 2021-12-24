<!-- <div class="main-panel"> -->
<div class="container-fluid" style="margin-top: 100px; margin-bottom: 100px;">
  <div class="row justify-content-md-center">

    <div class="col-md-9 grid-margin stretch-card" style="margin-bottom: 100px;">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <h4 class="card-title">Detail Produk</h4>
            <div class="col-md-3">
              <img src="<?php echo base_url('assets/foto/' . $detail->foto) ?>" class="card-img-top">
            </div>
            <div class="col-md-9">
              <table class="table table-striped">
                <tr>
                  <td>Nama Product</td>
                  <td>:</td>
                  <td><strong><?php echo $detail->nama_barang ?></strong></td>
                </tr>
                <tr>
                  <td>Deskripsi</td>
                  <td>:</td>
                  <td><strong><?php echo $detail->deskripsi ?></strong></td>
                </tr>
                <tr>
                  <td>Ukuran</td>
                  <td>:</td>
                  <td><strong><?php echo $detail->ukuran ?></strong></td>
                </tr>
                <tr>
                  <td>Kategori</td>
                  <td>:</td>
                  <td><strong><?php echo $detail->nama_kategori ?></strong></td>
                </tr>
                <tr>
                  <td>Harga</td>
                  <td>:</td>
                  <td><strong><?php echo $detail->harga_jual ?></strong></td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>