<div class="main-panel">
  <div class="content-wrapper">
    <div class="col-sm-12">
      <div class="home-tab">
        <h2 class="text-center"> <?php echo $title ?> </h2>
      </div>
      <hr>
    </div>
    <div class="row justify-content-md-center">
      <div class="col-6 grid-margin">
        <div class="card">
          <div class="card-body">
            <!-- <h4 class="card-title">Form Tambah Barang</h4> -->
            <form class="forms-sample" method="post" action="<?php echo base_url('admin/dataPelanggan/inputdata') ?>" enctype="multipart/form-data">
              <div class="form-group">
                <label>Id Pelanggan</label>
                <input type="text" class="form-control" name="id_pelanggan" value="<?php echo $kode; ?>" readonly>
              </div>
              <div class="form-group">
                <label>Nama Pelanggan</label>
                <input type="text" class="form-control" name="nama_pelanggan">
              </div>
              <div class="form-group">
                <label>No Telp Pelanggan</label>
                <input type="text" class="form-control" name="notelp_pelanggan">
              </div>
              <div class="form-group">
                <label>Alamat Pelanggan</label>
                <input type="text" class="form-control" name="alamat_pelanggan">
              </div>
              <button type="submit" class="btn btn-primary me-2">Submit</button>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>