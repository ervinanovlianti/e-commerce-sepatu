<?php 
    class InputPenjualan extends CI_Controller{
        public function index()
        {
            $data['title'] = "Input Penjualan";
            $data['kode'] = $this->model_barang->kodetransaksi();
            $data['pelanggan'] = $this->model_barang->get_data('tb_pelanggan')->result();
            $data['barang'] = $this->model_barang->get_data('tb_barang')->result();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('admin/formInputPenjualan', $data);
            $this->load->view('templates/footer');
        }
        public function tambahKeranjang($id)
        {
            $barang = $this->model_barang->find($id);
            $data = array(
                'id' => $barang->id_barang,
                'qty' => 1,
                'price' => $barang->harga_jual,
                'name' => $barang->nama_barang
            );
            $this->cart->insert($data);
            redirect('admin/inputPenjualan');
        }
        public function ubahKeranjang()
        {
            $cart_info = $_POST['cart'];
            foreach ($cart_info as $id => $cart) {
                $rowid = $cart['rowid'];
                $qty = $cart['qty'];
                $price = $cart['price'];
                $amount = $price * $cart['qty'];
                $data = array (
                    'rowid' =>$rowid,
                    'qty'   =>$qty,
                    'price' => $price,
                    'amount'=> $amount
                );
                $this->cart->update($data);
            }
            redirect('admin/inputPenjualan');
        }
        public function update()
        {
            $this->cart->update($_POST);
            redirect('admin/inputPenjualan');
        }
        
    }
?>