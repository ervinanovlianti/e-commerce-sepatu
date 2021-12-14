<?php
class DataUser extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Data User";
        $data['user'] = $this->model_barang->get_data('tb_user')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/dataUser', $data);
        $this->load->view('templates/footer');
    }
    public function tambahData()
    {
        $data['title'] = "Form Tambah Data User";
        $data['kode'] = $this->model_barang->kodeuser();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/tambahDataUser', $data);
        $this->load->view('templates/footer');
    }
    public function tambahDataAksi()
    {
        if ($_POST) {
            $id     = $this->input->post('id_user');
            $nama       = $this->input->post('nama');
            $username         = $this->input->post('username');
            $password         = $this->input->post('password');
            $role         = $this->input->post('role');
            $jk         = $this->input->post('jk');
            $hak_akses         = $this->input->post('hak_akses');
            $foto           = $_FILES['foto_user']['name'];
            if ($foto = '') {
            } else {
                $config['upload_path'] = './assets/foto_user';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('foto_user')) {
                    echo "Gambar Gagal Di Upload";
                } else {
                    $foto = $this->upload->data('file_name');
                }
            }
            $data = array(
                'id_user'       => $id,
                'nama'     => $nama,
                'username'  => $username,
                'password'  => $password,
                'role'    => $role,
                'jk'    => $jk,
                'hak_akses'    => $hak_akses,
                'foto_user'    => $foto,
            );
            $this->model_barang->insert_data($data, 'tb_user');
            redirect('admin/dataUser');
        }
    }
    public function updateData($id)
    {
        $where = array('id_user' => $id);
        $data['title'] = "Form Update Data User";
        $data['user'] = $this->db->query("SELECT * FROM tb_user WHERE id_user='$id'")->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin/updateDataUser', $data);
        $this->load->view('templates/footer');
    }
    public function updateDataAksi()
    {
        $id     = $this->input->post('id_user');
        $nama       = $this->input->post('nama');
        $username         = $this->input->post('username');
        $password         = $this->input->post('password');
        $role         = $this->input->post('role');
        $jk         = $this->input->post('jk');
        $hak_akses         = $this->input->post('hak_akses');

        $foto           = $_FILES['foto_user']['name'];
        if ($foto = '') {
        } else {
            $config['upload_path'] = './assets/foto_user';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto_user')) {
                echo "Gambar Gagal Di Upload";
            } else {
                $foto = $this->upload->data('file_name');
            }
        }
        $data = array(
            'id_user'       => $id,
            'nama'     => $nama,
            'username'  => $username,
            'password'  => $password,
            'role'    => $role,
            'jk'    => $jk,
            'hak_akses'    => $hak_akses,
            'foto_user'    => $foto,
        );
        $where = array(
            'id_user' => $id
        );
        $this->model_barang->update_data('tb_user', $data, $where);
        redirect('admin/dataUser');
    }

    public function deleteData($id)
    {
        $where = array('id_user' => $id);
        $this->model_barang->delete_data($where, 'tb_user');
        redirect('admin/dataUser');
    }
}
