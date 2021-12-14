<?php 
    class DataPenjualan extends CI_Controller{
        public function index()
        {
            $data['title'] = "Data Penjualan";
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('admin/dataPenjualan', $data);
            $this->load->view('templates/footer');
        }
    }
?>