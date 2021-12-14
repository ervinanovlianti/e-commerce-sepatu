<?php 
class DataKategori extends CI_Controller{
    public function index(){
        $data['title'] = "Kategori Barang";
        $data['kategori'] = $this->model_barang->get_data('tb_kategori')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/dataKategori', $data);
        $this->load->view('templates/footer');
    }
}