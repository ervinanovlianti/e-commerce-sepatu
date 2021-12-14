<?php
class DataUkuran extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Ukuran Barang";
        $data['ukuran'] = $this->model_barang->get_data('tb_ukuran')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/dataUkuran', $data);
        $this->load->view('templates/footer');
    }
}
