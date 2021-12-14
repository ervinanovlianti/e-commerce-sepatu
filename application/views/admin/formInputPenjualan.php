      <div class="main-panel">
        <div class="content-wrapper">
          <!-- <div class="col-sm-12">
            <div class="home-tab">
              <h2 class="text-center"> <?php echo $title ?> </h2>
            </div>
            <hr>
          </div> -->
          <div class="row">
            <div class="col-md-9 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="form-group row fw-bold">
                    <div class="col-md-3">
                      <label>No. Transaksi</label>
                      <input type="text" class="form-control" name="no_transaksi" value="<?php echo $kode; ?>" readonly>
                    </div>
                    <div class="col-md-3">
                      <label>Tanggal Transaksi</label>
                      <input type="date" class="form-control">
                    </div>
                    <div class="col-md-3">
                      <label>Pelanggan</label>
                      <input type="text" class="form-control" placeholder="-Optional-">
                    </div>
                    <div class="col-md-3">
                      <label class="text-white">Data Barang</label>
                      <button type="button" class="btn btn-primary btn-icon-text btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="ti-search btn-icon-prepend">
                          Pilih Barang
                        </i>
                      </button>
                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <div class="container-fluid">
                                <table class="table table-striped">
                                  <thead>
                                    <tr>
                                      <th>No</th>
                                      <th>Foto</th>
                                      <th>Kode Barang</th>
                                      <th>Nama Barang</th>
                                      <th>Stok</th>
                                      <th>Harga</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php $no = 1;
                                    foreach ($barang as $brg) : ?>
                                      <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><img src="<?php echo base_url('assets/foto/' . $brg->foto) ?>"></td>
                                        <td><?php echo $brg->id_barang ?></td>
                                        <td><?php echo $brg->nama_barang ?></td>
                                        <td><span class="badge rounded-pill bg-success"><?php echo $brg->stok ?></span></td>
                                        <td>Rp.<?php echo number_format($brg->modal + (0.2 * $brg->modal), 0, ',', '.') ?></td>
                                        <td>
                                          <center>
                                            <a class="btn btn-sm btn-danger" href="<?php echo base_url('admin/inputPenjualan/tambahKeranjang/' . $brg->id_barang) ?>"><i class="mdi mdi-cart-plus"></i></a>
                                          </center>
                                        </td>
                                      </tr>
                                    <?php endforeach; ?>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                            <div class="modal-body">
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary">Simpan</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr>
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h2 class="fw-bold">Total Belanja :</h2>
                  <hr>
                  <h3 class="text-end fw-bold text-danger">Rp. <?php echo number_format($this->cart->total(), 0, ',', '.') ?></h3>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-9 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="card-title">Data Penjualan</div>
                  <!-- <form action="<?php echo base_url() ?>inputPenjualan/ubah_cart" method="post"> -->
                  <?php echo form_open('admin/inputPenjualan/update'); ?>
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Id Barang</th>
                          <th>Nama Barang</th>
                          <th>Harga</th>
                          <th>Jumlah</th>
                          <th>Subtotal</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($this->cart->contents() as $items) : ?>
                          <tr>
                            <td style="width: 20px;"><?php echo $no++ ?></td>
                            <td><?php echo $items['id'] ?></td>
                            <td><?php echo $items['name'] ?></td>
                            <td>
                              <input type="number" class="" name="qty" id="" value="<?php echo $items['qty'] ?>">
                            </td>
                            <td align="right"><?php echo number_format($items['price'], 0, ',', '.')  ?></td>
                            <td align="right"><?php echo number_format($items['subtotal'], 0, ',', '.')  ?></td>
                            <td>
                              <center>
                                <a href=""><i class="mdi mdi-border-color"></i></a>
                              </center>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                        <tr>
                          <td colspan="3">
                            <h2>Total</h2>
                          </td>
                          <td><?php echo $this->cart->total_items() ?></td>
                          <td></td>
                          <td align="right">Rp. <?php echo number_format($this->cart->total(), 0, ',', '.') ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  </form>
                </div>
              </div>

            </div>

            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

                  <h2 class="fw-bold">Total Bayar :</h2>
                  <input type="number" class="form-control" name="total_bayar">
                  <hr>
                  <h2 class="fw-bold">Kembalian :</h2>
                  <hr>
                  <h3 class="text-end fw-bold text-success">Rp. <?php echo number_format($this->cart->total(), 0, ',', '.') ?></h3>
                  <hr>
                  <button class="btn btn-info">Simpan</button>
                </div>
              </div>
            </div>
          </div>
        </div>