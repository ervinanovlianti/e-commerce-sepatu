<?php 

class UserProfil extends CI_Controller{
    public function index()
    {
        $data['title'] = "Profil User";
        $this->load->view('manager/templates_m/header');
        $this->load->view('manager/templates_m/sidebar');
        $this->load->view('manager/userProfil',$data);
        $this->load->view('manager/templates_m/footer');
    }
}
