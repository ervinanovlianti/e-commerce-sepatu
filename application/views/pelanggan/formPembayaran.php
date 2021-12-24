    <div class="container-fluid" style="margin-top: 100px; margin-bottom: 100px;">
        <div class="row justify-content-md-center">
            <div class="col-6 grid-margin center-card">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            No. Rekening Toko
                        </div>
                        <div class="card-header">
                            Silahkan Transfer Uang Ke No. Rekening Di Bawah Ini Sebesar :
                        </div>
                        <div class="card-body">
                            <h1 class="text-primary">Rp. <?php echo $invoice->total ?></h1>
                        </div>
                        <table class="table bordered table-striped">
                            <?php  ?>
                            <tr>
                                <th>Bank</th>
                                <th>No. Rekening</th>
                                <th>Atas Nama</th>
                            </tr>
                            <tr>
                                <td>BRI</td>
                                <td>88818181818</td>
                                <td>Ervina Novlianti</td>
                            </tr>
                            <tr>
                                <td>BNI</td>
                                <td>1234567890</td>
                                <td>Ervina Novlianti</td>
                            </tr>
                            <tr>
                                <td>DANA</td>
                                <td>081234567890</td>
                                <td>Ervina Novlianti</td>
                            </tr>
                            <tr>
                                <td>GOPAY</td>
                                <td>081234567890</td>
                                <td>Ervina Novlianti</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-6 grid-margin center-card">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Konfirmasi Pembayaran</div>
                        <form class="forms-sample" method="post" action="<?php echo base_url('pelanggan/transaksi/bayar') ?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <!-- <label>No. Invoice</label> -->
                                <input type="hidden" class="form-control" name="id_pesanan" value="<?php echo $invoice->id ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Jenis Pembayaran</label>
                                <select class="form-control" name="jenis_pembayaran">
                                    <option selected>Pilih Jenis Pembayaran Anda</option>
                                    <option value="BRI-xxxxxxxxx">BRI-xxxxxxxx</option>
                                    <option value="BNI">BNI-xxxxxxxx</option>
                                    <option value="DANA-081234567890">DANA-081234567890</option>
                                    <option value="GOPAY-081234567890">GOPAY-081234567890</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>No Rekening</label>
                                <input type="text" class="form-control" name="no_rekening">
                            </div>
                            <div class="form-group">
                                <label>Atas Nama</label>
                                <input type="text" class="form-control" name="nama">
                            </div>
                            <div class="form-group">
                                <label>Upload Bukti Transfer</label>
                                <input type="file" class="form-control" name="bukti_pembayaran">
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>