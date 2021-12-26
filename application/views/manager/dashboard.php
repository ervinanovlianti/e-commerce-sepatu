      <!-- partial -->
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
                            <p class="statistics-title">Pemasukan</p>
                            <h3 class="rate-percentage text-center">
                              <?php
                                $grand_total = 0;

                              foreach ($barang_terjual as $key => $value)
                              $tot_harga = $value->total;
                              $grand_total = $grand_total + $tot_harga;
                              { ?>
                                <div class="badge rounded-pill bg-primary">
                                  Rp. <?php echo number_format($grand_total) ?>
                                </div>
                              <?php } ?>
                            </h3>
                          </div>
                          <div>
                            <p class="statistics-title">Transaksi</p>
                            <h3 class="rate-percentage text-center"><?php echo $transaksi ?></h3>
                          </div>
                          <div>
                            <p class="statistics-title">Semua Barang</p>
                            <h3 class="rate-percentage text-center"><?php echo $barang ?></h3>
                          </div>
                          <div>
                            <p class="statistics-title">Barang Masuk</p>
                            <h3 class="rate-percentage text-center"><?php echo $barangmasuk ?></h3>
                          </div>

                          <div class="d-none d-md-block">
                            <p class="statistics-title">Supplier</p>
                            <h3 class="rate-percentage text-center"><?php echo $supplier ?></h3>
                          </div>
                          <div class="d-none d-md-block">
                            <p class="statistics-title">Pelanggan</p>
                            <h3 class="rate-percentage text-center"><?php echo $pelanggan ?></h3>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->