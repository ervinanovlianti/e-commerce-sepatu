<div class="main-panel">
    <div class="content-wrapper">
        <div class="card" style="margin-bottom: 10px;">
            <div class="card-body">
                <div class="card-title">Detail Pesanan
                    <div class="btn btn-success">No. Invoice: <?php echo $invoice->id ?></div>
                </div>
                <table class="table table-bordered table-hover table-striped">
                    <tr>
                        <th>Id Produk</th>
                        <th>NAMA PRODUK</th>
                        <th>JUMLAH PESANAN</th>
                        <th>HARGA SATUAN</th>
                        <th>SUB TOTAL</th>
                    </tr>
                    <?php
                    $total = 0;
                    foreach ($pesanan as $psn) :
                        $subtotal = $psn->jumlah * $psn->harga;
                        $total += $subtotal;
                    ?>
                        <tr>
                            <td><?php echo $psn->id_barang ?></td>
                            <td><?php echo $psn->nama_barang ?></td>
                            <td><?php echo $psn->jumlah ?></td>
                            <td align="right"><?php echo number_format($psn->harga, 0, ',', '.') ?></td>
                            <td align="right"><?php echo number_format($subtotal, 0, ',', '.') ?></td>

                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="4" align="right">Grand Total</td>
                        <td align="right">Rp. <?php echo number_format($total, 0, ',', '.') ?></td>
                    </tr>
                    <tr>
                        <td align="right" colspan="5">
                            <a class="btn btn-primary" href="<?php echo base_url('kasir/pesanan') ?>">Back</a>
                        </td>
                    </tr>
                </table>

            </div>
        </div>
        
    </div>
