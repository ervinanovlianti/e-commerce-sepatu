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
                <a class="btn btn-outline-success" href="<?php echo base_url('admin/dataBarang/tambahData') ?>"> Tambah Data </a>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Ukuran</th>
                        <th>Stok</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Kategori</th>
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
                          <td><?php echo $brg->ukuran ?></td>
                          <td><span class="badge rounded-pill bg-success"><?php echo $brg->stok ?></span></td>
                          <!-- <td><?php echo $brg->deskripsi ?></td> -->
                          <td>Rp.<?php echo number_format($brg->modal, 0, ',', '.') ?></td>
                          <td>Rp.<?php echo number_format($brg->harga_jual , 0, ',', '.') ?></td>
                          <td><?php echo $brg->nama_kategori ?></td>
                          <td>
                            <center>
                              <a class="btn btn-sm btn-info" href="<?php echo base_url('admin/dataBarang/detailData/' . $brg->id_barang) ?>"><i class="mdi mdi-apps"></i></a>
                              <a class="btn btn-sm btn-success" href="<?php echo base_url('admin/dataBarang/updateData/' . $brg->id_barang) ?>"><i class="mdi mdi-border-color"></i></a>
                              <a onclick="return confirm('Yakin Ingin Menghapus Data?')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/dataBarang/deleteData/'.$brg->id_barang) ?>"><i class="mdi mdi-delete"></i></a>
                            </center>
                          </td>
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