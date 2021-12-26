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
        $pesanan_baru = $this->db->query("SELECT * FROM tb_pesanan  WHERE  status_pesanan = 0");
        $pesanan_diproses = $this->db->query("SELECT * FROM tb_pesanan  WHERE  status_pesanan = 1");
        $pesanan_dikirim = $this->db->query("SELECT * FROM tb_pesanan  WHERE  status_pesanan = 2");
        $pesanan_selesai = $this->db->query("SELECT * FROM tb_pesanan  WHERE  status_pesanan = 3");
        $data['barang_terjual'] = $this->model_barang->barang_terjual();
        $data['pesanan_baru'] = $pesanan_baru->num_rows();
        $data['pesanan_diproses'] = $pesanan_diproses->num_rows();
        $data['pesanan_dikirim'] = $pesanan_dikirim->num_rows();
        $data['pesanan_selesai'] = $pesanan_selesai->num_rows();

        $this->load->view('kasir/templates_k/header');
        $this->load->view('kasir/templates_k/sidebar');
        $this->load->view('kasir/dashboard', $data);
        $this->load->view('kasir/templates_k/footer');

    }
}
