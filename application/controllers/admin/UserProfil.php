<?php 

class UserProfil extends CI_Controller{
    public function index()
    {
        $data['title'] = "Profil User";
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/userProfil',$data);
        $this->load->view('templates/footer');

    }
}
