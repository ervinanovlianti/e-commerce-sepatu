<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function index()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Form Login";
            $this->load->view('login');
            $this->load->view('admin/templates/header', $data);
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $cek = $this->model_barang->cek_login($username, $password);
            if ($cek == FALSE) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong>Username atau Password Salah</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
					</button>
				</div>');
                redirect('welcome');
            } else {
                $this->session->set_userdata('hak_akses', $cek->hak_akses);
                $this->session->set_userdata('nama', $cek->nama);
                $this->session->set_userdata('username', $cek->username);
                $this->session->set_userdata('foto_user', $cek->foto_user);
                $this->session->set_userdata('id_user', $cek->id_user);
                $this->session->set_userdata('role', $cek->role);
                $this->session->set_userdata('jk', $cek->jk);
                switch ($cek->hak_akses) {
                    case 1:
                        redirect('admin/dashboard');
                        break;
                    case 2:
                        redirect('kasir/dashboard');
                        break;
                    case 3:
                        redirect('manager/dashboard');
                        break;
                    case 4:
                        redirect('users/dashboard');
                        break;
                    default:
                        break;
                }
            }
        }
    }
    public function _rules()
    {
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('welcome');
    }
}
