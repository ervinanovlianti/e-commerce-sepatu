<div class="main-panel">
  <div class="content-wrapper">
    <div class="col-sm-12">
      <div class="home-tab">
        <h2 class="text-center"> <?php echo $title ?> </h2>
      </div>
      <hr>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal Masuk</th>
                  <th>Id Pemasukan</th>
                  <th>Id Barang</th>
                  <th>Jumlah Masuk</th>
                  <th>Supplier</th>
                  <th>Keterangan</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                foreach ($barangmasuk as $bm) : ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $bm->tanggal_masuk ?></td>
                    <td><?php echo $bm->id_barangmasuk ?></td>
                    <td><?php echo $bm->id_barang ?></td>
                    <td><span class="badge rounded-pill bg-success"><?php echo $bm->stok ?></span></td>
                    <td><?php echo $bm->id_supplier ?></td>
                    <td><span class="badge rounded-pill bg-warning"><?php echo $bm->keterangan ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>