<?php 

class UserProfil extends CI_Controller{
    public function index()
    {
        $data['title'] = "Profil User";
        $this->load->view('pelanggan/template/header');
        $this->load->view('pelanggan/template/sidebar');
        $this->load->view('pelanggan/userProfil',$data);
        $this->load->view('pelanggan/template/footer');
    }
}
