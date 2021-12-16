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
                        <a class="btn btn-outline-success" href=""> Tambah Ukuran </a>
                        <table class="table table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Jenis Ukuran</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($ukuran as $u) : ?>
                                    <tr class="text-center">
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $u->ukuran ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->