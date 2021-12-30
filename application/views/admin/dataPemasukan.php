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
              <?= $this->session->flashdata('msg_stok')  ?>
          <!-- Tambah Data Barang Baru -->
          <!-- <a class="btn btn-success " href="<?php echo base_url('admin/dataBarang/tambahData') ?>"> Tambah Baru </a> -->
          <!-- Tambah Stok Barang Yang sudah Terdaftar -->
          <a class="btn btn-success" href="<?php echo base_url('admin/dataPemasukan/tambahStok') ?>"> Tambah Stok </a>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal Masuk</th>
                  <th>Id Pemasukan</th>
                  <th>Id Barang</th>
                  <th>Jumlah Masuk</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                foreach ($barangmasuk as $bm) : ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $bm->tanggal_masuk ?></td>
                    <td><?php echo $bm->id_barangmasuk ?></td>
                    <td><?php echo $bm->id_barang ?></td>
                    <td><span class="badge rounded-pill bg-success">+<?php echo $bm->stok ?></span></td>
                    <td><span class="badge rounded-pill bg-warning"><?php echo $bm->keterangan ?></td>
                    <td>
                      <center>
                        <!-- <a class="btn btn-sm btn-info" href=""><i class="mdi mdi-apps"></i></a> -->
                        <a class="btn btn-sm btn-success" href="<?php echo base_url('admin/dataPemasukan/updateData/' . $bm->id_barangmasuk) ?>"><i class="mdi mdi-border-color"></i></a>
                        <a onclick="return confirm('Yakin Ingin Menghapus Data?')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/dataPemasukan/deleteData/' . $bm->id_barangmasuk) ?>"><i class="mdi mdi-delete"></i></a>
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