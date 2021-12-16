      <div class="main-panel">
        <div class="content-wrapper">
          <?php echo form_open('users/Keranjang/updateItem') ?>
          <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>

          <script>
            // Update item quantity
            function updateCartItem(obj, rowid) {
              $.get("<?php echo base_url('cart/updateItemQty/'); ?>", {
                rowid: rowid,
                qty: obj.value
              }, function(resp) {
                if (resp == 'ok') {
                  location.reload();
                } else {
                  alert('Cart update failed, please try again.');
                }
              });
            }
          </script>
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Id Barang</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Barang</th>
                        <th>Harga</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; ?>
                      <?php foreach ($this->cart->contents() as $items) : ?>
                        <tr>
                          <td><?php echo $items['id'] ?></td>
                          <td><?php echo $items['name'] ?></td>
                          <td width=30px""><input type="number" name="qty<?php echo $i++ ?>" class="form-control" value="<?php echo $items['qty'] ?>"></td>
                          <td align="right">Rp. <?php echo number_format($items['price'], 0, ',', '.')  ?></td>
                          <td align="right">Rp. <?php echo number_format($items['subtotal'], 0, ',', '.')  ?></td>
                          <td>
                            <center>
                              <a class="btn btn-sm btn-danger" href="<?php echo base_url('users/keranjang/removeItem/'.$items['rowid']) ?>"><i class="mdi mdi-close"></i></a>
                            </center>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                      <tr>
                        <td colspan="2">
                          <h2>Total</h2>
                        </td>
                        <td><?php echo $this->cart->total_items() ?></td>
                        <td></td>
                        <td align="right">Rp. <?php echo number_format($this->cart->total(), 0, ',', '.') ?></td>
                        <td>
                        </td>
                      </tr>
                    </tbody>

                  </table>
                </div>
                <button class="btn btn-primary ">Update</button>

              </div>
            </div>

          </div>

          <?php echo form_close() ?>
        </div>