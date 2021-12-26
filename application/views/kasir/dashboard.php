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

                    <div>
                      <p class="statistics-title">Pesanan Baru</p>
                      <h3 class="rate-percentage text-center"><?php echo $pesanan_baru ?></h3>
                    </div>
                    <div>
                      <p class="statistics-title">Pesanan Diproses</p>
                      <h3 class="rate-percentage text-center"><?php echo $pesanan_diproses ?></h3>
                    </div>
                    <div>
                      <p class="statistics-title">Pesanan Dikirim</p>
                      <h3 class="rate-percentage text-center"><?php echo $pesanan_dikirim ?></h3>
                    </div>
                    <div class="d-none d-md-block">
                      <p class="statistics-title">Pesanan Selesai</p>
                      <h3 class="rate-percentage text-center"><?php echo $pesanan_selesai ?></h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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



  </div>