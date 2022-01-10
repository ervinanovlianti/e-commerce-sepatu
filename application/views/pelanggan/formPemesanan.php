<div class="container-fluid" style="margin-top: 100px; margin-bottom: 100px;">
    <div class="row">
        <div class="col-6 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Detail Pesanan</div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Barang</th>
                                    <th>Ukuran</th>
                                    <th>Jumlah Barang</th>
                                    <th>Harga</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($this->cart->contents() as $items) : ?>
                                    <tr>
                                        <td width="20px"><?php echo $no++ ?></td>
                                        <td><?php echo $items['name'] ?></td>
                                        <td><?php echo $items['size'] ?></td>
                                        <td align="center" width="30px"><?php echo $items['qty'] ?></td>
                                        <td align="right">Rp. <?php echo number_format($items['price'], 0, ',', '.')  ?></td>
                                        <td align="right">Rp. <?php echo number_format($items['subtotal'], 0, ',', '.')  ?></td>

                                    </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <td colspan="3">
                                        <h6>Total</h6>
                                    </td>
                                    <td align="center"><?php echo $this->cart->total_items() ?></td>
                                    <td></td>
                                    <td align="right">Rp. <?php echo number_format($this->cart->total(), 0, ',', '.') ?></td>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="row">

                    </div>

                </div>
            </div>
        </div>
        <div class="col-6 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Data Penerima</div>
                    <form class="forms-sample" method="post" action="<?php echo base_url('pelanggan/keranjang/inputPesanan') ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <!-- <label>Id User</label> -->
                            <input type="hidden" class="form-control" name="id_pelanggan" value="<?php echo $this->session->userdata('id_pelanggan') ?>" readonly>
                        </div>
                        <div class="form-group">
                            <!-- <label>Kode Pesanan</label> -->
                            <input type="hidden" class="form-control" name="kode_pesanan" value="<?php echo date('dmY') . random_string('alnum', 8) ?>" readonly>
                        </div>
                        <div class="form-group">
                            <!-- <label>Total Bayar</label> -->
                            <input type="hidden" class="form-control" name="total" value="<?php echo $this->cart->total() ?>" readonly>
                        </div>
                        <div class="form-group">
                            <!-- <label>Nama Pemesan</label> -->
                            <input type="hidden" class="form-control" name="nama_pelanggan" value="<?php echo $this->session->userdata('nama_pelanggan') ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nama Penerima</label>
                            <input type="text" class="form-control" name="nama_penerima" required>
                            <p style="color: red;">*masukkan nama penerima pesanan anda)</p>
                        </div>
                        <div class="form-group">
                            <label>Alamat Lengkap</label>
                            <input type="text" class="form-control" name="alamat" required>
                            <p style="color: red;">*masukkan alamat lengkap tujuan(jl/rt/rt)</p>
                        </div>
                        <div class="form-group">
                            <label>No. Telepon</label>
                            <input type="text" class="form-control" name="notelp" required>
                            <p style="color: red;">*masukkan no.telepon/no.wa yang dapat dihubungi)</p>
                        </div>
                        <div class="form-group">
                            <label>Jasa Pengiriman</label>
                            <select name="jasa_pengiriman" class="form-control" required>
                                <option value="">Pilih Opsi Pengiriman</option>
                                <option value="JNE">JNE</option>
                                <option value="JNT">JNT</option>
                                <option value="POS">POS</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>