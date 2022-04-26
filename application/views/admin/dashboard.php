<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-sm-12">
        <div class="home-tab">
          <div class="justify-content-between border-bottom">
            <h3 class="text-center">Overview</h3>
          </div>
          <div class="tab-content tab-content-basic">
            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
              <div class="row">
                <div class="col-sm-12">
                  <div class="statistics-details d-flex align-items-center justify-content-between">
                    <div class="d-none d-md-block">
                      <p class="statistics-title">Invoices</p>
                      <h3 class="rate-percentage text-center">
                        <?php
                        $grand_total = 0;
                        foreach ($barang_terjual as $key => $value) {
                          $tot_harga = $value->total;
                          $grand_total = $grand_total + $tot_harga;
                        ?>
                        <?php } ?>
                        <div class="badge rounded-pill bg-primary">
                          Rp. <?php echo number_format($grand_total) ?>
                        </div>
                      </h3>
                    </div>
                    <!-- <div>
                      <p class="statistics-title">Jumlah Barang</p>
                      <h3 class="rate-percentage text-center"><?php echo $barang ?></h3>
                    </div> -->
                    <div>
                      <p class="statistics-title">Barang Masuk</p>
                      <h3 class="rate-percentage text-center"><?php echo $barangmasuk ?></h3>
                    </div>

                    <div class="d-none d-md-block">
                      <p class="statistics-title">Barang Keluar</p>
                      <h3 class="rate-percentage text-center"><?php echo $supplier ?></h3>
                    </div>
                    <div class="d-none d-md-block">
                      <p class="statistics-title">Pelanggan</p>
                      <h3 class="rate-percentage text-center"><?php echo $pelanggan ?></h3>
                    </div>
                    <!-- <div class="d-none d-md-block">
                      <p class="statistics-title">User</p>
                      <h3 class="rate-percentage text-center"><?php echo $user ?></h3>
                    </div> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <hr>
        </div>
      </div>
    </div>
    <div class="row flex-grow">
      <div class="col-4 grid-margin stretch-card">
        <div class="card card-rounded">
          <div class="card-body">
            <div class="d-sm-flex justify-content-between align-items-start">
              <div>
                <h4 class="card-title card-title-dash">Stok Minim</h4>
              </div>
            </div>
            <div class="table-responsive  mt-1">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Nama Barang</th>
                    <th>Stok</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($stok_minim as $key => $value) { ?>
                    <tr>
                      <td>
                        <?php echo $value->nama_barang ?>

                      </td>
                      <td>
                        <div class="badge rounded-pill bg-warning">
                          <?php echo $value->stok ?>
                        </div>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="col-4 grid-margin stretch-card">
        <div class="card card-rounded">
          <div class="card-body">
            <div class="d-sm-flex justify-content-between align-items-start">
              <div>
                <h4 class="card-title card-title-dash">Barang Terjual</h4>
              </div>
            </div>
            <div class="table-responsive  mt-1">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($barang_terjual as $key => $value) { ?>
                    <tr>
                      <td>
                        <?php echo $value->nama_barang ?>

                      </td>
                      <td>
                        <div class="badge rounded-pill bg-primary">
                          <?php echo $value->jumlah ?>
                        </div>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-4 grid-margin stretch-card">
        <div class="card card-rounded">
          <div class="card-body">
            <div class="d-sm-flex justify-content-between align-items-start">
              <div>
                <h4 class="card-title card-title-dash">Barang Masuk</h4>
              </div>
            </div>
            <div class="table-responsive  mt-1">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($barang_masuk as $key => $value) { ?>
                    <tr>
                      <td>
                        <?php echo $value->nama_barang ?>
                      </td>
                      <td class="text-center">
                        <div class="badge rounded-pill bg-info">
                          <?php echo $value->stok ?>
                        </div>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>