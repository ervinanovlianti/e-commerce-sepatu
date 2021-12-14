      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="col-sm-12">
            <div class="home-tab">
              <h2 class="text-center"> <?php echo $title ?> </h2>
            </div>
            <hr>
          </div>
          <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <a class="btn btn-outline-success"href=""> Tambah Kategori </a>

                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Kategori</th>
                      <th>Kode Kategori</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;
                    foreach ($kategori as $k) : ?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $k->kode_kategori ?></td>
                        <td><?php echo $k->nama_kategori ?></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>

              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->