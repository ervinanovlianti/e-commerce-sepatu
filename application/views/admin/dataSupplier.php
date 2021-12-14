      <!-- partial -->
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
                <a type="button" class="btn btn-outline-success" href="<?php echo base_url('admin/dataSupplier/tambahsupplier') ?>">Tambah Supplier</a>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr class="text-center">
                        <th>No</th>
                        <th>Id Supplier</th>
                        <th>Nama Supplier</th>
                        <th>No. Telp</th>
                        <th>Alamat</th>
                        <th>Foto</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1;
                      foreach ($supplier as $s) : ?>
                        <tr>
                          <td><?php echo $no++ ?></td>
                          <td><?php echo $s->id_supplier ?></td>
                          <td><?php echo $s->nama_supplier ?></td>
                          <td><?php echo $s->notelp_supplier ?></td>
                          <td><?php echo $s->alamat_supplier ?></td>
                          <td><img src="<?php echo base_url('assets/foto_supplier/' . $s->foto_supplier) ?>"></td>
                          <td>
                            <center>
                              <a class="btn btn-sm btn-success" href="<?php echo base_url('admin/dataSupplier/updateData/' . $s->id_supplier) ?>"><i class="mdi mdi-border-color"></i></a>
                              <a onclick="return confirm('Yakin Ingin Menghapus Data?')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/dataSupplier/deleteData/' . $s->id_supplier) ?>"><i class="mdi mdi-delete"></i></a>
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