<div class="main-panel">
  <div class="content-wrapper">
    <div class="col-sm-12">
      <div class="home-tab">
        <h2 class="text-center"> <?php echo $title ?> </h2>
      </div>
      <hr>
    </div>
    <!-- Isi Konten Halaman Disini -->
    <div class="row">
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Data Penjualan Harian</h4>
            <?php echo form_open('admin/dataPenjualan/penjualan') ?>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Dari Tanggal</label>
                  <input type="date" name="tanggal" id="" class="form-control">
                    $mulai = 1;
                    for ($i = $mulai; $i < $mulai + 31; $i++) {
                      echo '<option value="' . $i . '">' . $i . '</option>';
                    }
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Sampai Tanggal</label>
                  <input type="date" name="bulan" id="" class="form-control">
                  
                    $mulai = 1;
                    for ($i = $mulai; $i < $mulai + 12; $i++) {
                      echo '<option value="' . $i . '">' . $i . '</option>';
                    }
                </div>
              </div>
                    $mulai = date('Y');
                    for ($i = $mulai; $i < $mulai + 5; $i++) {
                      echo '<option value="' . $i . '">' . $i . '</option>';
                    }
                </div>
              </div> -->
              <div class="col-md-12">
                <div class="d-grid">
                  <button type="submit" class="btn btn-primary btn-block">Generate</button>
                </div>
              </div>
            </div>
            <?php echo form_close() ?>
          </div>
        </div>
      </div>
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Data Penjualan Dari Tanggal : <strong><?php echo $tanggal ?> Sampai <?php echo $bulan ?></strong></h4>
            <div class="table-responsive mt-4">
              <div class="col-md-12">
                <?php
                $jml_data = count($laporan);
                if ($jml_data > 0) {
                ?>
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>NO.</th>
                        <th>TANGGAL</th>
                        <th>KODE TRANSAKSI</th>
                        <th>TOTAL</th>
                        <th>PELANGGAN</th>
                        <th>STATUS BAYAR</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1;
                      foreach ($laporan as $lp) : ?>
                        <tr>
                          <td><?php echo $no++ ?></td>
                          <td><?php echo $lp->tanggal_pesan ?></td>
                          <td><?php echo $lp->kode_pesanan ?></td>
                          <td>
                            <?php if ($lp->status_bayar != 0) { ?>
                              <?php echo $lp->total ?></td>
                        <?php } ?>
                        <td><?php echo $lp->nama_pelanggan ?></td>
                        <td>
                          <?php if ($lp->status_bayar == 0) { ?>
                            <span class="badge rounded-pill bg-warning">Belum Bayar</span>
                          <?php } else { ?>
                            <?php if ($lp->status_pesanan == 0) { ?>
                              <span class="badge rounded-pill bg-success">Sudah Bayar</span>
                              <br><br>
                              <span class="badge rounded-pill bg-warning">Menunggu Konfirmasi</span>
                            <?php } elseif ($lp->status_pesanan == 1) { ?>
                              <span class="badge rounded-pill bg-info">Pesanan Diproses</span>
                            <?php } elseif ($lp->status_pesanan == 2) { ?>
                              <span class="badge rounded-pill bg-success">Pesanan Dikirim</span>
                            <?php } elseif ($lp->status_pesanan == 3) { ?>
                              <span class="badge rounded-pill bg-danger">Pesanan Selesai</span>
                            <?php } ?>
                          <?php } ?>
                        </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                <?php } else { ?>
                  <span class="badge badge-danger"><i class="fas fa-info-circle"></i>
                    Data masih kosong, silahkan filter data terlebih dahulu berdasarkan tanggal, bulan dan tahun.
                  </span>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Akhir Konten -->
  </div>