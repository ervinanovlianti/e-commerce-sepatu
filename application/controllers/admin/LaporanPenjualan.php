<?php 
    class LaporanPenjualan extends CI_Controller{
        public function index()
        {
            $data['title'] = "Laporan Penjualan";
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('admin/laporanPenjualan', $data);
            $this->load->view('templates/footer');
        }
    }
?>