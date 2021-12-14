<?php
class DataBarang extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Data Semua Produk";
        $data['barang'] = $this->model_barang->get_data('tb_barang')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/dataBarang', $data);
        $this->load->view('templates/footer');
    }
    public function detailData($id)
    {
        $data['title'] = "Detail Produk";
        $this->load->model('model_barang');
        $detail = $this->model_barang->detail_data($id);
        $data['detail'] = $detail;
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/detailBarang', $data);
        $this->load->view('templates/footer');
    }
    public function tambahData()
    {
        $data['title'] = "Tambah Data Barang Baru";
        $data['kategori'] = $this->model_barang->get_data('tb_kategori')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/tambahDataBarang', $data);
        $this->load->view('templates/footer');
    }
    public function tambahDataAksi()
    {
        $id_barang         = $this->input->post('id_barang');
        $nama_barang          = $this->input->post('nama_barang');
        $nama_kategori              = $this->input->post('nama_kategori');
        $stok                   = $this->input->post('stok');
        $deskripsi                   = $this->input->post('deskripsi');
        $modal                  = $this->input->post('modal');
        $foto           = $_FILES['foto']['name'];
        if ($foto = '') {
        } else {
            $config['upload_path'] = './assets/foto';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                echo "Gambar Gagal Di Upload";
            } else {
                $foto = $this->upload->data('file_name');
            }
        }

        $data = array(
            'id_barang'    => $id_barang,
            'nama_barang'     => $nama_barang,
            'nama_kategori'         => $nama_kategori,
            'stok'              => $stok,
            'deskripsi'              => $deskripsi,
            'modal'             => $modal,
            'foto'        => $foto,
        );
        $this->model_barang->insert_data($data, 'tb_barang');
        redirect('admin/dataBarang');
    }
    public function updateData($id)
    {
        $where = array('id_barang' => $id);
        $data['title'] = "Form Update Data Barang";
        $data['barang'] = $this->db->query("SELECT * FROM tb_barang WHERE id_barang='$id'")->result();
        $data['kategori'] = $this->model_barang->get_data('tb_kategori')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin/updateDataBarang', $data);
        $this->load->view('templates/footer');
    }
    public function updateDataAksi()
    {
        $id_barang      = $this->input->post('id_barang');
        $nama_barang    = $this->input->post('nama_barang');
        $nama_kategori  = $this->input->post('nama_kategori');
        $stok           = $this->input->post('stok');
        $deskripsi      = $this->input->post('deskripsi');
        $modal          = $this->input->post('modal');
        $foto           = $_FILES['foto']['name'];
        if ($foto = '') {
        } else {
            $config['upload_path'] = './assets/foto';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                echo "Gambar Gagal Di Upload";
            } else {
                $foto = $this->upload->data('file_name');
            }
        }

        $data = array(
            'id_barang'         => $id_barang,
            'nama_barang'       => $nama_barang,
            'nama_kategori'     => $nama_kategori,
            'stok'              => $stok,
            'deskripsi'         => $deskripsi,
            'modal'             => $modal,
            'foto'              => $foto,
        );

        $where = array(
            'id_barang' => $id_barang
        );
        $this->model_barang->update_data('tb_barang', $data, $where);
        redirect('admin/dataBarang');
    }
    public function deleteData($idbarang)
    {
        $where = array('id_barang' => $idbarang);
        $this->model_barang->delete_data($where, 'tb_barang');
        redirect('admin/dataBarang');
    }
}

