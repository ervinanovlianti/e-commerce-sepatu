<div class="main-panel">
  <div class="content-wrapper">
    <div class="col-sm-12">
      <div class="home-tab">
        <h2 class="text-center"> <?php echo $title ?> </h2>
      </div>
      <hr>
    </div>
    <div class="row justify-content-md-center">
      <div class="col-6 grid-margin center-card">
        <div class="card">
          <div class="card-body">
            <!-- <h4 class="card-title">Form Tambah Barang</h4> -->
            <form class="forms-sample" method="post" action="<?php echo base_url('admin/dataSupplier/inputdata') ?>" enctype="multipart/form-data">
              <div class="form-group">
                <label>Id Supplier</label>
                <input type="text" class="form-control" name="id_supplier" value="<?php echo $kode; ?>" readonly>
              </div>
              <div class="form-group">
                <label>Nama Supplier</label>
                <input type="text" class="form-control" name="nama_supplier">
              </div>
              <div class="form-group">
                <label>No Telp Supplier</label>
                <input type="text" class="form-control" name="notelp_supplier">
              </div>
              <div class="form-group">
                <label>Alamat Supplier</label>
                <input type="text" class="form-control" name="alamat_supplier">
              </div>
              <div class="form-group">
                <label>Foto</label>
                <input type="file" class="form-control" name="foto_supplier">
              </div>
              <button type="submit" class="btn btn-primary me-2">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>