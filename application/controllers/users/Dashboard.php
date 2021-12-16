<?php 

class Dashboard extends CI_Controller{
    
    public function index()
    {
        $data['barang'] = $this->model_barang->get_data('tb_barang')->result();
        $this->load->view('users/template/header');
        $this->load->view('users/template/sidebar');
        $this->load->view('users/dashboard', $data);
        $this->load->view('users/template/footer');

    }
}
