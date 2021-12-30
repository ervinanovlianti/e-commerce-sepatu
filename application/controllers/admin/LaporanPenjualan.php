<?php
class LaporanPenjualan extends CI_Controller
{
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
        $data['title'] = "Laporan Penjualan";
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/laporanPenjualan', $data);
        $this->load->view('admin/templates/footer');
    }
    
    public function cetak_lap_harian()
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
        $this->load->view('admin/cetakLaporanHarian', $data);
    }
    public function cetak_lap_bulanan()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $data = array(
            'bulan' => $bulan,
            'tahun' => $tahun,
        );
        $data['title'] = "Laporan Harian";
        $data['laporan'] = $this->model_barang->lap_bulanan($bulan, $tahun);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/cetakLaporanBulanan', $data);
    }
    public function cetak_lap_tahunan()
    {
        $tahun = $this->input->post('tahun');
        $data = array(
            'tahun' => $tahun,
        );
        $data['title'] = "Laporan Tahunan";
        $data['laporan'] = $this->model_barang->lap_tahunan($tahun);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/cetakLaporanTahunan', $data);
    }
}
