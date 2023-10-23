<div class="container-fluid" style="margin-top: 75px; margin-bottom: 100px">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-title">Data Transaksi</div>
                <div class="card-body">
                    <?= $this->session->flashdata('msg_pay')  ?>
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Pesanan Saya</button>
                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Diproses</button>
                            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Dikirim</button>
                            <button class="nav-link" id="nav-kirim-tab" data-bs-toggle="tab" data-bs-target="#nav-kirim" type="button" role="tab" aria-controls="nav-kirim" aria-selected="false">Selesai</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <!-- <?php echo $this->session->flashdata('msg') ?> -->
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <table class="table table-striped table-hover">
                                <tr>
                                    <th>No</th>
                                    <th>Kode Pesanan</th>
                                    <!-- <th>Nama Pemesan</th> -->
                                    <th>Nama Penerima</th>
                                    <th>Tanggal Pesan</th>
                                    <th>Batas Bayar</th>
                                    <th>Total Bayar</th>
                                    <th>Aksi</th>
                                </tr>
                                <?php $no = 1;
                                $tgl_now = date("Y-m-d");
                                foreach ($belum_bayar as $br) : ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td style="width: 10px;"><?php echo $br->kode_pesanan ?></td>
                                        <!-- <td style="width: 20px;"><?php echo $br->nama_pelanggan ?></td> -->
                                        <td style="width: 20px;"><?php echo $br->nama_penerima ?></td>
                                        <td><?php echo $br->tanggal_pesan ?></td>
                                        <td>
                                            <?php if ($tgl_now >= $br->batas_bayar) { ?>
                                                <span class="badge rounded-pill bg-danger">Expired Date</span>
                                            <?php } else { ?>
                                                <?php echo $br->batas_bayar ?>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <h5 class="fw-bold">Rp.<?php echo number_format($br->total, 0, ',', '.') ?></h5>
                                            <?php if ($br->status_bayar == 0) { ?>
                                                <span class="badge rounded-pill bg-warning">Belum Bayar</span>
                                            <?php } else { ?>
                                                <span class="badge rounded-pill bg-success">Sudah Bayar</span>
                                                <br><br>
                                                <span class="badge rounded-pill bg-warning">Menunggu Konfirmasi</span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <center>
                                                <?php if (empty($br->bukti_bayar)) { ?>
                                                    <?php if ($tgl_now >= $br->batas_bayar) { ?>
                                                    <?php } else { ?>
                                                        <a class="btn btn-primary" href="<?php echo base_url('pelanggan/transaksi/pembayaran/' . $br->id) ?>">Bayar</a>
                                                        <a class="btn btn-danger" onclick="return confirm('Yakin Ingin Membatalkan Pesanan?')" href="<?php echo base_url('pelanggan/transaksi/pesananBatal/' . $br->id) ?>">Cancel</a>
                                                    <?php } ?>
                                                <?php } ?>
                                            </center>
                                        </td>
                                    <?php endforeach; ?>
                                    </tr>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <table class="table table-striped table-hover">
                                <tr>
                                    <th>No</th>
                                    <th>Kode Pesanan</th>
                                    <!-- <th>Nama Pemesan</th> -->
                                    <th>Nama Penerima</th>
                                    <th>Tanggal Pesan</th>
                                    <th>Total Bayar</th>
                                </tr>
                                <?php $no = 1;
                                foreach ($diproses as $dp) : ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $dp->kode_pesanan ?></td>
                                        <!-- <td><?php echo $dp->nama_pelanggan ?></td> -->
                                        <td><?php echo $dp->nama_penerima ?></td>
                                        <td><?php echo $dp->tanggal_pesan ?></td>
                                        <td>
                                            <h5 class="fw-bold">Rp. <?php echo number_format($dp->total, 0, ',', '.') ?></h5>
                                            <span class="badge rounded-pill bg-primary">Pesanan Diproses</span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tr>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <table class="table table-striped table-hover">
                                <tr>
                                    <th>Kode Pesanan</th>
                                    <!-- <th>Nama Pemesan</th> -->
                                    <th>Tanggal Pemesanan</th>
                                    <th>Total Bayar</th>
                                    <th>No Resi</th>
                                    <th>Aksi</th>
                                </tr>
                                <?php foreach ($dikirim as $dk) : ?>
                                    <tr>
                                        <td><?php echo $dk->kode_pesanan ?></td>
                                        <!-- <td><?php echo $dk->nama_pelanggan ?></td> -->
                                        <td><?php echo $dk->tanggal_pesan ?></td>
                                        <td>
                                            <h5 class="fw-bold">Rp. <?php echo number_format($dk->total, 0, ',', '.') ?></h5>
                                            <span class="badge rounded-pill bg-primary">Pesanan Dikirim</span>
                                        </td>
                                        <td>
                                            <h5><?= $dk->no_resi ?> </h5>
                                        </td>
                                        <td>
                                            <a class="btn btn-success" onclick="return confirm('Yakin Telah Menerima Pesanan Ini?')" href="<?php echo base_url('pelanggan/transaksi/pesananSelesai/' . $dk->id) ?>">Diterima</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="nav-kirim" role="tabpanel" aria-labelledby="nav-kirim-tab">
                            <table class="table table-striped table-hover">
                                <tr>
                                    <th>Kode Pesanan</th>
                                    <!-- <th>Nama Pemesan</th> -->
                                    <th>Tanggal Pemesanan</th>
                                    <th>Total Bayar</th>
                                    <th>Status</th>
                                </tr>
                                <?php foreach ($selesai as $sl) : ?>
                                    <tr>
                                        <td><?php echo $sl->id ?></td>
                                        <!-- <td><?php echo $sl->nama_pelanggan ?></td> -->
                                        <td><?php echo $sl->tanggal_pesan ?></td>
                                        <td>
                                            <h5 class="fw-bold">Rp. <?php echo number_format($sl->total, 0, ',', '.') ?></h5>
                                        </td>
                                        <td>
                                            <span class="badge rounded-pill bg-danger">Pesanan Selesai</span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Button trigger modal -->