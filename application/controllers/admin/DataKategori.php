<?php 
class DataKategori extends CI_Controller{
    public function  __construct()
    {
        parent::__construct();
        if ($this->session->userdata('hak_akses') != '1') {
            $this->session->set_flashdata(
                'pesan',
                'Anda belum login!!!'
            );
            redirect('welcome');
        }
    }
    public function index()
    {
        $data['title'] = "Kategori Barang";
        $data['kategori'] = $this->model_barang->get_data('tb_kategori')->result();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/dataKategori', $data);
        $this->load->view('admin/templates/footer');
    }
}