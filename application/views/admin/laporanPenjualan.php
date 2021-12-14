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
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Filter Data</h4>
                        <p class="card-description">Harap filter data berdasarkan bulan dan tahun terlebih dahulu
                        </p>
                        <div class="form-group row fw-bold">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="row-sm-6">
                                        <label>Bulan</label>
                                        <input type="date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="row-sm-6">
                                        <label>Tahun</label>
                                        <input type="date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="row-sm-6">
                                        <label>Aksi</label>
                                        <div class="input-group-append">
                                            <a class="btn btn-sm btn-primary" type="button">Generate</a>
                                            <a class="btn btn-sm btn-primary" type="button">Input Penjualan</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h4 class="card-title">Data Penjualan</h4>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="button" class="btn btn-outline-danger btn-icon-text">
                                    <i class="ti-upload btn-icon-prepend"></i>
                                    Excel
                                </button>
                                <button type="button" class="btn btn-outline-info btn-icon-text">
                                    Print
                                    <i class="ti-printer btn-icon-append"></i>
                                </button>
                            </div>
                            <div class="table-responsive mt-4">
                                <div class="col-md-12">
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
                                            <!-- <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td> -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Akhir Konten -->
    </div>