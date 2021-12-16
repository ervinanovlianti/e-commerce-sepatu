<?php 
    class InputPenjualan extends CI_Controller{
    public function  __construct()
    {
        parent::__construct();
        if ($this->session->userdata('hak_akses') != '2') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Anda belum login!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect('welcome');
        }
    }
        public function index()
        {
            $data['title'] = "Input Penjualan";
            $data['kode'] = $this->model_barang->kodetransaksi();
            $data['pelanggan'] = $this->model_barang->get_data('tb_pelanggan')->result();
            $data['barang'] = $this->model_barang->get_data('tb_barang')->result();
            $this->load->view('kasir/templates_k/header');
            $this->load->view('kasir/templates_k/sidebar');
            $this->load->view('kasir/formInputPenjualan', $data);
            $this->load->view('kasir/templates_k/footer');
        }
        public function tambahKeranjang($id)
        {
            $barang = $this->model_barang->find($id);
            $data = array(
                'id' => $barang->id_barang,
                'qty' => 1,
                'price' => $barang->modal,
                'name' => $barang->nama_barang
            );
            $this->cart->insert($data);
            redirect('kasir/inputPenjualan');
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
            redirect('kasir/inputPenjualan');
        }
        public function update()
        {
            $this->cart->update($_POST);
            redirect('kasir/inputPenjualan');
        }
        
    }
?>