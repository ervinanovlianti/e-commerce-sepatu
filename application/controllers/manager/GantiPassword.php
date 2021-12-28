<?php
class GantiPassword extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Ganti Password";
        $this->load->view('manager/templates_m/header', $data);
        $this->load->view('manager/templates_m/sidebar');
        $this->load->view('manager/formGantiPassword', $data);
        $this->load->view('manager/templates_m/footer');
    }
    public function gantiPasswordAksi()
    {
        $passBaru = $this->input->post('passBaru');
        $ulangPass = $this->input->post('ulangPass');

        $this->form_validation->set_rules('passBaru', 'password baru', 'required|matches[ulangPass]');
        $this->form_validation->set_rules('ulangPass', 'ulangi password', 'required');

        if ($this->form_validation->run() != FALSE) {
            $data = array('password' => $passBaru);
            $id = array('id_user' => $this->session->userData('id_user'));
            $this->model_barang->update_data('tb_user', $data, $id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                    Password berhasil diubah
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>');
            redirect('welcome');
        } else {
            $data['title'] = "Ganti Password";
            $this->load->view('manager/templates_m/header', $data);
            $this->load->view('manager/templates_m/sidebar');
            $this->load->view('manager/formGantiPassword', $data);
            $this->load->view('manager/templates_m/footer');
        }
    }
}
