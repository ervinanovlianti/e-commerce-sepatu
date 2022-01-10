<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Pesanan</div>
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Pesanan Masuk</button>
                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Diproses</button>
                            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Dikirim</button>
                            <button class="nav-link" id="nav-kirim-tab" data-bs-toggle="tab" data-bs-target="#nav-kirim" type="button" role="tab" aria-controls="nav-kirim" aria-selected="false">Selesai</button>

                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <!-- Pesanan Belum Dibayar -->
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                            <?php echo $this->session->flashdata('msg') ?>
                            <table class="table table-striped table-hover">
                                <tr>
                                    <th>Kode Pesanan</th>
                                    <th>Nama Pemesan</th>
                                    <th>Tanggal Pemesanan</th>
                                    <th>Batas Pembayaran</th>
                                    <!-- <th>Total Bayar</th> -->
                                    <th>Aksi</th>
                                </tr>
                                <?php foreach ($invoice as $inv) : ?>
                                    <tr>
                                        <td><?php echo $inv->kode_pesanan ?></td>
                                        <td><?php echo $inv->nama_pelanggan ?></td>
                                        <td><?php echo $inv->tanggal_pesan ?></td>
                                        <!-- <td><?php echo $inv->batas_bayar ?></td> -->
                                        <td>
                                            <h5 class="fw-bold">Rp. <?php echo number_format($inv->total, 0, ',', '.') ?><br></h5>

                                            <?php if ($inv->status_bayar == 0) { ?>
                                                <span class="badge rounded-pill bg-warning">Belum Bayar</span>
                                            <?php } else { ?>
                                                <span class="badge rounded-pill bg-success">Sudah Bayar</span>
                                                <br><br>
                                                <span class="badge rounded-pill bg-primary">Menunggu Konfirmasi</span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php if ($inv->status_bayar == 1) { ?>
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#cek<?= $inv->id  ?>">
                                                    Cek Bukti
                                                </button>
                                                <a class="btn btn-success" href="<?php echo base_url('kasir/pesanan/prosesPesanan/' . $inv->id) ?>">Proses</a>
                                                <a class="btn btn-primary" href="<?php echo base_url('kasir/pesanan/detail/' . $inv->id) ?>">Detail</a>
                                            <?php } ?>



                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <tr>
                                        <th>Kode Pesanan</th>
                                        <th>Nama Pemesan</th>
                                        <th>Tanggal Pemesanan</th>
                                        <th>Total Bayar</th>
                                        <th>Aksi</th>
                                    </tr>
                                    <?php foreach ($invoice_proses as $ip) : ?>
                                        <tr>
                                            <td><?php echo $ip->kode_pesanan ?></td>
                                            <td><?php echo $ip->nama_pelanggan ?></td>
                                            <td><?php echo $ip->tanggal_pesan ?></td>
                                            <td>
                                                <h5 class="fw-bold">Rp. <?php echo number_format($ip->total, 0, ',', '.') ?></h5>
                                                <span class="badge rounded-pill bg-success">Terverifikasi</span><br><br>
                                                <span class="badge rounded-pill bg-primary">Diproses/Dikemas</span>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kirim<?= $ip->id  ?>">
                                                    Kirim
                                                </button>
                                                <a class="btn btn-success" href="<?php echo base_url('kasir/pesanan/detail/' . $ip->id) ?>">Detail</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <table class="table table-striped table-hover">
                                <tr>
                                    <th>Kode Pesanan</th>
                                    <th>Nama Pemesan</th>
                                    <th>Tanggal Pemesanan</th>
                                    <th>Total Bayar</th>
                                    <th>No. Resi</th>
                                </tr>
                                <?php foreach ($invoice_kirim as $ik) : ?>
                                    <tr>
                                        <td><?php echo $ik->kode_pesanan ?></td>
                                        <td><?php echo $ik->nama_pelanggan ?></td>
                                        <td><?php echo $ik->tanggal_pesan ?></td>
                                        <td>
                                            <h5 class="fw-bold">Rp. <?php echo number_format($ik->total, 0, ',', '.') ?><br></h5>

                                            <span class="badge rounded-pill bg-success">Dikirim</span>
                                        </td>
                                        <td><?= $ik->no_resi ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="nav-kirim" role="tabpanel" aria-labelledby="nav-kirim-tab">
                            <table class="table table-striped table-hover">
                                <tr>
                                    <th>Kode Pesanan</th>
                                    <th>Nama Pemesan</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Total Bayar</th>
                                </tr>
                                <?php foreach ($selesai as $sl) : ?>
                                    <tr>
                                        <td><?php echo $sl->kode_pesanan ?></td>
                                        <td><?php echo $sl->nama_pelanggan ?></td>
                                        <td>
                                            <span class="badge rounded-pill bg-success"><?php echo $sl->tgl_selesai ?></span>
                                        </td>
                                        <td>
                                            <h5 class="fw-bold">Rp. <?php echo number_format($sl->total, 0, ',', '.') ?><br></h5>
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



    <!-- Modal -->
    <?php foreach ($invoice_proses as $ip) : ?>
        <div class="modal fade" id="kirim<?= $ip->id  ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Kode Pesanan : <?= $ip->kode_pesanan ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open('kasir/pesanan/kirimPesanan/' . $ip->id) ?>
                        <table class="table">
                            <tr>
                                <th>Jasa Pengiriman</th>
                                <th>:</th>
                                <td><?= $ip->jasa_pengiriman ?></td>
                            </tr>
                            <tr>
                                <th>Nama Penerima</th>
                                <th>:</th>
                                <td><?= $ip->nama_penerima ?></td>
                            </tr>
                            <tr>
                                <th>No. Resi</th>
                                <th>:</th>
                                <td><input name="no_resi" class="form-control" placeholder="No. Resi Pengiriman" required></td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                    <?php echo form_close() ?>

                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- Modal Cek Bukti Pembayaran -->
    <?php foreach ($invoice as $inv) : ?>
        <div class="modal fade" id="cek<?= $inv->id  ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Kode Pesanan : <strong><?= $inv->kode_pesanan ?></strong></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table">

                            <tr>
                                <th>Bank/Akun Tujuan Transfer</th>
                                <th>:</th>
                                <td><?= $inv->tujuan ?></td>
                            </tr>
                            <tr>
                                <th>No Rekening/No.Telp Akun Pengirim</th>
                                <th>:</th>
                                <td><?= $inv->no_rekening ?></td>
                            </tr>
                            <tr>
                                <th>Atas Nama/Nama Akun Pengirim</th>
                                <th>:</th>
                                <td><?= $inv->atas_nama ?></td>
                            </tr>
                            <tr>
                                <th>Bukti Pembayaran</th>
                                <th>:</th>
                            </tr>
                        </table>
                        <img src="<?php echo base_url('assets/bukti_pembayaran/' . $inv->bukti_bayar) ?>" class="img-fluid"><?php  ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>