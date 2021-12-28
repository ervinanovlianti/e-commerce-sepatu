<?php 
class DataPelanggan extends CI_Controller{
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
    public function index(){
        $data['title'] = "Data Pelanggan";
        $data['pelanggan'] = $this->model_barang->get_data('tb_pelanggan')->result();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/dataPelanggan', $data);
        $this->load->view('admin/templates/footer');
    }
}
?>