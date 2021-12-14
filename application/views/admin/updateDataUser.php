<div class="main-panel">
  <div class="content-wrapper">
    <div class="col-sm-12">
      <div class="home-tab">
        <h2 class="text-center"> <?php echo $title ?> </h2>
      </div>
      <hr>
    </div>
    <div class="row justify-content-md-center">
      <div class="col-6 grid-margin center-card">
        <div class="card">
          <div class="card-body">
            <?php foreach ($user as $us) : ?>
              <!-- <h4 class="card-title">Form Tambah Barang</h4> -->
              <form class="forms-sample" method="post" action="<?php echo base_url('admin/dataUser/updateDataAksi') ?>" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Id Supplier</label>
                  <input type="text" class="form-control" name="id_user" value="<?php echo $us->id_user ?>" readonly>
                </div>
                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" class="form-control" name="nama" value="<?php echo $us->nama ?>">
                </div>
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" name="username" value="<?php echo $us->username ?>">
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password" value="<?php echo $us->password ?>">
                </div>
                <div class="form-group">
                  <label for="">Status User</label>
                  <select class="form-control" name="role">
                    <option value="<?php echo $us->role ?>"><?php echo $us->role ?></option>
                    <option value="admin">Admin</option>
                    <option value="kasir">Kasir</option>
                    <option value="manager">Manager</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Jenis Kelamin</label>
                  <select name="jk" class="form-control">
                    <option value="<?php echo $us->jk ?>"><?php echo $us->jk ?></option>
                    <option value="Laki-laki">Laki laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Foto</label>
                  <input type="file" class="form-control" name="foto_user">
                </div>
                <button type="submit" class="btn btn-primary me-2">Submit</button>
              </form>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>