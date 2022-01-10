<div class="main-panel">
    <div class="content-wrapper">
        <div class="card" style="margin-bottom: 10px;">
            <div class="card-body">
                <div class="card-title">Detail Pesanan
                    <div class="btn btn-success">Kode Pesanan: <?php echo $invoice->kode_pesanan ?></div>
                </div>
                <table class="table table-bordered table-hover table-striped">
                    <tr>
                        <th>Id Barang</th>
                        <th>Nama Barang</th>
                        <th>Ukuran</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Sub Total</th>
                    </tr>
                    <?php
                    $total = 0;
                    $total_item = 0;
                    foreach ($pesanan as $psn) :
                        $subtotal = $psn->jumlah * $psn->harga;
                        $total += $subtotal;
                        $total_item += $psn->jumlah;
                    ?>
                        <tr>
                            <td><?php echo $psn->id_barang ?></td>
                            <td><?php echo $psn->nama_barang ?></td>
                            <td><?php echo $psn->ukuran ?></td>
                            <td><?php echo $psn->jumlah ?></td>
                            <td align="right"><?php echo number_format($psn->harga, 0, ',', '.') ?></td>
                            <td align="right"><?php echo number_format($subtotal, 0, ',', '.') ?></td>

                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="3" align="left">Total</td>
                        <td><?php echo $total_item ?></td>
                        <td colspan="2" align="right">Rp. <?php echo number_format($total, 0, ',', '.') ?></td>
                    </tr>
                    <tr>
                    </tr>
                    <tr>
                        <td align="right" colspan="7">
                            <a class="btn btn-primary" href="<?php echo base_url('kasir/pesanan') ?>">Back</a>
                        </td>
                    </tr>
                </table>

            </div>
        </div>

    </div>