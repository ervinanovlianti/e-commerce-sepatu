      <!-- <div class="main-panel"> -->
      <div class="container-fluid" style="margin-top: 100px;">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="card-title"><?= $title; ?></div>
              <div class="table-responsive">
                <?= form_open('pelanggan/keranjang/update'); ?>
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr class="text-center">
                      <!-- <th>Id</th> -->
                      <th>Nama Barang</th>
                      <th style="width: 200px;">Ukuran</th>
                      <th style="width: 50px;">Jumlah Barang</th>
                      <th>Harga</th>
                      <th>Subtotal</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($this->cart->contents() as $items) : ?>
                      <tr>
                        <td><?= $items['name']; ?></td>
                        <td><?= $items['size']; ?></td>
                        <td><?= form_input(array(
                              'name' => $i . '[qty]',
                              'value' => $items['qty'],
                              'maxlength' => '3',
                              'min' => '0',
                              'type' => 'number',
                              'class' => 'form-control',
                              'size' => '5'
                            )); ?>
                        </td>
                        <td align="right">Rp. <?= number_format($items['price'], 0, ',', '.'); ?></td>
                        <td align="right">Rp. <?= number_format($items['subtotal'], 0, ',', '.'); ?></td>
                        <td>
                          <center>
                            <a class="btn btn-sm btn-danger" href="<?= base_url('pelanggan/keranjang/removeItem/' . $items['rowid']); ?>"><i class="mdi mdi-close"></i></a>
                          </center>
                        </td>
                      </tr>
                      <?php $i++; ?>
                    <?php endforeach; ?>
                    <tr>
                      <td colspan="2">
                        <h2>Total</h2>
                      </td>
                      <td class="text-center"><?= $this->cart->total_items(); ?></td>
                      <td></td>
                      <td align="right">Rp. <?= number_format($this->cart->total(), 0, ',', '.'); ?></td>

                    </tr>
                    <tr>
                      <td colspan="6" align="right">
                        <button type="submit" class="btn btn-primary me-4">Update</button>
                        <a class="btn btn-warning me-4" href="<?= base_url('pelanggan/dashboard'); ?>">Lanjut Belanja</a>
                        <a class="btn btn-success" href="<?= base_url('pelanggan/keranjang/pesan'); ?>">Check Out</a>
                      </td>
                    </tr>
                    <?= form_close(); ?>
                  </tbody>
                </table>

              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- <script type="text/javascript">
        $(document).ready(function() {
            $(".itemQty").on('change', function() {
              var el = $(this).closest('tr');

              var pid = $el.find('.pid').val();
              var price = $el.find('.pprice').val();
              var qty = $el.find('.itemQty').val();
              console.log(qty);

              $.ajax({
                url: 'action.php',
                method: 'post',
                cache: false,
                data: {
                  qty: qty,
                  pid: pid,
                  pprice: pprice
                },
                success: function(response) {
                  console.log(response);
                }

              });
            });

            load_cart_item_number();

            function load_cart_item_number() {});

        }
      </script> -->