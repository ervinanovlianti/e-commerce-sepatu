<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <hr>
                <h4 class="card-title">Data Penjualan</h4>
                
                <div class="d-grid gap-2 d-md-flex justify-content-md-end" style="margin-bottom: 20px;">
                        <!-- <button type="button" class="btn btn-outline-danger btn-icon-text">
                            <i class="ti-upload btn-icon-prepend"></i>
                            Excel
                        </button> -->
                        <a type="button" class="btn btn-outline-info btn-icon-text" href="<?php echo base_url('admin/laporanPenjualan/cetak_lap_harian')  ?>">
                            Print
                            <i class="ti-printer btn-icon-append"></i>
                        </a>
                </div>
                <div class="alert alert-warning">
                    Menampilkan Data Penjualan Per : <span class="font-weight-bold"><?php echo $tanggal ?>,<span class="fw-bold"><?php echo $bulan ?>,</span>
                        Tahun: <span class="font-weight-bold"><?php echo $tahun ?></span>
                </div>
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
                                Data masih kosong, silahkan input data kehadiran pada bulan dan tahun yang Anda pilih.
                            </span>

                        <?php } ?>
                    </div>
                </div>

            </div>
        </div>
    </div>