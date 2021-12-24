<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $title ?></title>
    <style type="text/css">
        body {
            font-family: Arial;
            color: black;
        }
    </style>
</head>

<body>
    <center>
        <h1>TOKO SEPATU KITA</h1>
        <hr style="width: 500px;">
        <h2 class="fw-bold">Laporan Penjualan Per <?php echo $bulan  ?>/<?php echo $tahun  ?></h2>
    </center>
    <?php
    if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
        $bulan = $_GET['bulan'];
        $tahun = $_GET['tahun'];
    } else {
        $bulan = date('m');
        $tahun = date('Y');
    }

    ?>

    <table class="table table-bordered"">
        <tr>
            <th  class=" text-center">NO.</th>
        <th class="text-center">TANGGAL PESANAN</th>
        <th class="text-center">KODE TRANSAKSI</th>
        <th class="text-center">NAMA PELANGGAN</th>
        <th class="text-center" style="width:50px">GRAND TOTAL</th>
        </tr>
        <?php $no = 1;
        $grand_total = 0;
        foreach ($laporan as $key => $value) {
            $grand_total = $grand_total + $value->total;
        ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $value->tanggal_pesan ?></td>
                <td><?php echo $value->kode_pesanan ?></td>
                <td><?php echo $value->nama_pelanggan ?></td>
                <td>
                    Rp. <?php echo number_format($value->total,0)  ?>
                </td>
            </tr>
        <?php } ?>
    </table>
    <h3 style="margin-top: 20px;">Grand Total : Rp.<?php echo number_format($grand_total,0) ?></h3>
    <table width="100%">
        <tr>
            <td></td>
            <td width="200px">
                <p>Gowa, <?php echo date("d M Y") ?><br>Finance</p>
                <br>
                <br>
                <p>_____________________</p>
            </td>
        </tr>
    </table>
</body>

</html>
<script type="text/javascript">
    window.print();
</script>