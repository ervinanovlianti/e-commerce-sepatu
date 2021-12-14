<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Input Penjualan</h4>
        <p class="card-description">
          <!-- A simple suggestion engine -->
        </p>
        <div class="form-group row fw-bold">
          <div class="col-md-3">
            <label>Kasir</label>
            <input type="text" class="form-control">
          </div>
          <div class="col-md-3">
            <label>No. Transaksi</label>
            <input type="text" class="form-control" placeholder="Name" readonly>
          </div>
          <div class="col-md-3">
            <label>Tanggal Transaksi</label>
            <input type="date" class="form-control">
          </div>
          <div class="col-md-3">
            <label>Pelanggan</label>
            <input type="text" class="form-control" placeholder="-Optional-">
          </div>
        </div>
        <hr>
        <h4 class="card-title">Tambah Produk</h4>
        <div class="form-group row fw-bold">
          <div class="col-md-3">
            <label for="">Kode Produk</label>
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Kode Produk">
              <div class="input-group-append">
                <a class="btn btn-sm btn-primary" type="button">Cari</a>
              </div>
            </div>
          </div>
          <div class="col-md-9">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>KODE PRODUK</th>
                  <th>NAMA PRODUK</th>
                  <th>HARGA</th>
                  <th>JUMLAH</th>
                  <th>SUB TOTAL</th>
                  <th>AKSI</th>
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
              <thead>
                <tr class="table-info">
                  <th colspan="5" class="text-end">Total Belanja : Rp. </th>
                  <th></th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Menampilkan produk dalam card -->
<div class="row">
  <?php foreach ($barang as $b) : ?>
    <div class="col-md-3 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <img src="<?php echo base_url('assets/foto/' . $b->foto) ?>" class="card-img-top" style="width: 50;"><?php  ?>
          <div class="card-body">
            <h5 class="card-title"><?php echo $b->nama_barang ?></h5>
            <p class="card-text"><?php echo $b->deskripsi ?></p>
            <p>Rp. <?php echo number_format($b->harga_jual, 0, ',', '.') ?></p>
            <a href="#" class="btn btn-warning"><i class="mdi mdi-cart-outline">Beli</i></a>
            <a href="#" class="btn btn-success"><i class="mdi mdi-cart-plus"></i>Tambah</a>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>


$foto = $_FILES ['foto']['name'];
if ($foto = ''){

}else{
$config ['upload_path'] = './assets/foto';
$config ['allowed_types'] = 'jpg|jpeg|png|gif';

$this->load->library('upload', $config);
if(!$this->upload->do_upload('foto')){
echo "Gambar Gagal Di Upload";
}else{
$foto=$this->upload->data('file_name');
}
}

<div class="table-responsive pt-3">
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>KODE PRODUK</th>
        <th>NAMA PRODUK</th>
        <th>HARGA</th>
        <th>JUMLAH</th>
        <th>SUB TOTAL</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; ?>
      <td><?php echo $no++ ?></td>
      <td>
        <select class="form-control" name="kode_barang">
          <option>Pilih</option>
          <?php foreach ($barang as $b) : ?>
            <option value="<?php echo $b->kode_barang ?>"><?php echo $b->kode_barang ?></option>
          <?php endforeach; ?>
        </select>
      </td>
      <td><input type="text" name="nama_barang" id=""></td>
      <td></td>
      <td></td>
      <td></td>
    </tbody>
    <thead>
      <tr class="table-info">
        <th colspan="7" class="text-start">Quantity : </th>
      </tr>
      <tr class="table-info">
        <th colspan="7" class="text-start">Total Bayar : Rp. </th>
      </tr>
      <tr class="table-info">
        <th colspan="7" class="text-start" aria-readonly="">Total Belanja : Rp. </th>
      </tr>
    </thead>
  </table>
</div>