<?php 
    class DataPenjualan extends CI_Controller{
    public function  __construct()
    {
        parent::__construct();
        if ($this->session->userdata('hak_akses') != '1') {
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
        $tanggal = $this->input->post('tanggal');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $data = array(
            'tanggal' => $tanggal,
            'bulan' => $bulan,
            'tahun' => $tahun,
        );
        $data['title'] = "Laporan Harian";
        $data['laporan'] = $this->model_barang->lap_harian($tanggal, $bulan, $tahun);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/dataPenjualan', $data);
        $this->load->view('admin/templates/footer');
    }
    public function penjualana()
    {
        $tanggal = $this->input->post('tanggal');
        $bulan = $this->input->post('bulan');
        $data = array(
            'tanggal' => $tanggal,
            'bulan' => $bulan,
        );
        $data['title'] = "Data Penjualan";
        $data['laporan'] = $this->db->query("SELECT * FROM tb_pesanan
			WHERE tanggal_pesan
			BETWEEN '" . $tanggal . "' AND '" . $bulan . "'")->result();
        // $data['laporan'] = $this->model_barang->data_harian($tanggal, $bulan, $tahun);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/dataPenjualan', $data);
        $this->load->view('admin/templates/footer');
    }
    }
