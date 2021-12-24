      <div class="main-panel">
        <div class="content-wrapper">
          <div class="col-sm-12">
            <div class="home-tab">
              <h2 class="text-center"> <?php echo $title ?> </h2>
            </div>
            <hr>
          </div>
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Kategori</th>
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
                          <td><?php echo $brg->nama_kategori ?></td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>


        </div>
        <!-- content-wrapper ends -->