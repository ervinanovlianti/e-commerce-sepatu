<?php 

class Dashboard extends CI_Controller{
    public function  __construct()
    {
        parent::__construct();
        if ($this->session->userdata('hak_akses') != '3') {
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
        $barang = $this->db->query("SELECT * FROM tb_barang");
        $barang_masuk= $this->db->query("SELECT * FROM tb_barang_masuk");
        $supplier = $this->db->query("SELECT * FROM tb_supplier");
        $pelanggan = $this->db->query("SELECT * FROM tb_pelanggan");
        $data['barang'] = $barang->num_rows();
        $data['barangmasuk'] = $barang_masuk->num_rows();
        $data['supplier'] = $supplier->num_rows();
        $data['pelanggan'] = $pelanggan->num_rows();
        $this->load->view('manager/templates_m/header');
        $this->load->view('manager/templates_m/sidebar');
        $this->load->view('manager/dashboard', $data);
        $this->load->view('manager/templates_m/footer');

    }
}
