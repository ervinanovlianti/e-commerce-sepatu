<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function index()
    {
        $this->_rules_pelanggan();

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Form Login Pelanggan";
            $this->load->view('loginPelanggan');
            $this->load->view('pelanggan/template/header', $data);
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $cek = $this->model_barang->cek_login_pelanggan($email, $password);
            if ($cek == FALSE) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    Email atau Password salah
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>');
                redirect('login');
            } else {
                $this->session->set_userdata('nama_pelanggan', $cek->nama_pelanggan);
                $this->session->set_userdata('id_pelanggan', $cek->id_pelanggan);
                redirect('pelanggan/dashboard');
            }
        }
    }
    public function register()
    {
            $data['title'] = "Form Register";
            $data['kode'] = $this->model_barang->kode();
            $this->load->view('register', $data);
            $this->load->view('pelanggan/template/header', $data);
    }
    public function registerAksi()
    {
        $id     = $this->input->post('id_pelanggan');
        $nama       = $this->input->post('nama_pelanggan');
        $email         = $this->input->post('email');
        $password         = $this->input->post('password');

        $data = array(
            'id_pelanggan'       => $id,
            'nama_pelanggan'     => $nama,
            'email'  => $email,
            'password'  => $password,
        );
        $this->model_barang->insert_data($data, 'tb_pelanggan');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                    Registrasi akun berhasil!!!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>');
        redirect('login');
    }
    public function _rules_pelanggan()
    {
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
