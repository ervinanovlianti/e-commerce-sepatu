<?php 

class UserProfil extends CI_Controller{
    public function index()
    {
        $data['title'] = "Profil User";
        $this->load->view('kasir/templates_k/header');
        $this->load->view('kasir/templates_k/sidebar');
        $this->load->view('kasir/userProfil',$data);
        $this->load->view('kasir/templates_k/footer');

    }
}
