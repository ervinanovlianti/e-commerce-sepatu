<?php
class DataBarang extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Data Semua Produk";
        $data['barang'] = $this->model_barang->get_data('tb_barang')->result();
        $this->load->view('kasir/templates_k/header');
        $this->load->view('kasir/templates_k/sidebar');
        $this->load->view('kasir/dataBarang', $data);
        $this->load->view('kasir/templates_k/footer');
    }
}

