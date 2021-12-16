<div class="main-panel">
  <div class="content-wrapper">
    <div class="col-sm-12">
      <div class="home-tab">
        <h2 class="text-center"> <?php echo $title ?> </h2>
      </div>
      <hr>
    </div>
  </div>


  <div class="row">
    <?php foreach ($barang as $b) : ?>
      <div class="col-md-3 grid-margin stretch-card">
        <div class="card">

          <img src="<?php echo base_url('assets/foto/' . $b->foto) ?>" class="card-img-top" style="width: 50;"><?php  ?>
          <div class="card-body">
            <h5 class="card-title"><?php echo $b->nama_barang ?></h5>
            <p class="card-text"><?php echo $b->deskripsi ?></p>
            <p>Rp. <?php echo number_format($b->harga_jual, 0, ',', '.') ?></p>
            <a href="#" class="btn btn-warning">Beli</a>
            <a href="#" class="btn btn-success">Simpan</a>
          </div>

        </div>
      </div>
    <?php endforeach; ?>
  </div>
  <div class="row">
    <?php foreach ($barang as $b) : ?>
      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <img src="<?php echo base_url('assets/foto/' . $b->foto) ?>" class="card-img-top">
          </div>
          <div class="card-body">
            <h5 class="card-title"><?php echo $b->nama_barang ?></h5>
            <p class="card-text"><?php echo $b->deskripsi ?></p>
            <p>Rp. <?php echo number_format($b->harga_jual, 0, ',', '.') ?></p>
            <a href="#" class="btn btn-warning">Beli</a>
            <a href="#" class="btn btn-success">Simpan</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>