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
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Data Penjualan Harian</h4>
            <?php echo form_open('admin/dataPenjualan') ?>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Tanggal</label>
                  <select class="form-control" name="tanggal">
                    <?php
                    $mulai = 1;
                    for ($i = $mulai; $i < $mulai + 31; $i++) {
                      echo '<option value="' . $i . '">' . $i . '</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Bulan</label>
                  <select class="form-control" name="bulan">
                    <?php
                    $mulai = 1;
                    for ($i = $mulai; $i < $mulai + 12; $i++) {
                      echo '<option value="' . $i . '">' . $i . '</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Tahun</label>
                  <select class="form-control" name="tahun">
                    <?php
                    $mulai = date('Y');
                    for ($i = $mulai; $i < $mulai + 5; $i++) {
                      echo '<option value="' . $i . '">' . $i . '</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>
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
            <h4 class="card-title">Data Penjualan Harian Per : <strong><?php echo $tanggal ?>/<?php echo $bulan ?>/<?php echo $tahun ?></strong></h4>

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
                        <th>NAMA PRODUK</th>
                        <th>HARGA</th>
                        <th>JUMLAH</th>
                        <th>PELANGGAN</th>
                        <th>SUB TOTAL</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php $no = 1;
                      foreach ($laporan as $lp) : ?>
                        <tr>
                          <td><?php echo $no++ ?></td>
                          <td><?php echo $lp->tanggal_pesan ?></td>
                          <td><?php echo $lp->kode_pesanan ?></td>
                          <td><?php echo $lp->nama_barang ?></td>
                          <td><?php echo $lp->harga ?></td>
                          <td><?php echo $lp->jumlah ?></td>
                          <td><?php echo $lp->nama_pelanggan ?></td>
                          <td>
                            <?php if (empty($lp->bukti_pembayaran)) { ?>
                              <span class="badge rounded-pill bg-warning">Belum Bayar</span>
                            <?php } else { ?>
                              <span class="badge rounded-pill bg-success">Sudah Bayar</span>
                              <br><br>
                              <span class="badge rounded-pill bg-warning">Menunggu Konfirmasi</span>
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