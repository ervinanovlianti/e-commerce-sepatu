<?php 

class Dashboard extends CI_Controller{
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
        $data['title'] = "Dashboard";

        $barang = $this->db->query("SELECT * FROM tb_barang");
        $barang_masuk= $this->db->query("SELECT * FROM tb_barang_masuk");
        $supplier = $this->db->query("SELECT * FROM tb_supplier");
        $pelanggan = $this->db->query("SELECT * FROM tb_pelanggan");
        $transaksi = $this->db->query("SELECT * FROM tb_transaksi");
        $data['barang'] = $barang->num_rows();
        $data['barangmasuk'] = $barang_masuk->num_rows();
        $data['supplier'] = $supplier->num_rows();
        $data['pelanggan'] = $pelanggan->num_rows();
        $data['transaksi'] = $transaksi->num_rows();
        $this->load->view('kasir/templates_k/header');
        $this->load->view('kasir/templates_k/sidebar');
        $this->load->view('kasir/dashboard', $data);
        $this->load->view('kasir/templates_k/footer');

    }
}
