<?php
class DataBarang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        if ($this->session->userdata('hak_akses') != '1') {
            $this->session->set_flashdata(
                'pesan',
                'Anda belum login!!!'
            );
            redirect('welcome');
        }
    }
    public function index()
    {
        $data['title'] = 'Data Semua Barang';
        $data['barang'] = $this->model_barang->get_data('tb_barang')->result();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/dataBarang', $data);
        $this->load->view('admin/templates/footer');
    }
    public function detailData($id)
    {
        $data['title'] = 'Detail Barang';
        $this->load->model('model_barang');
        $detail = $this->model_barang->detail_data($id);
        $data['detail'] = $detail;
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/detailBarang', $data);
        $this->load->view('admin/templates/footer');
    }
    public function tambahData()
    {
        $data['title'] = 'Tambah Data Barang Baru';
        $data['kode'] = $this->model_barang->kodebarang();
        $data['kategori'] = $this->model_barang
            ->get_data('tb_kategori')
            ->result();
        $data['ukuran'] = $this->model_barang->get_data('tb_ukuran')->result();
        $data['supplier'] = $this->model_barang->get_data('tb_supplier')->result();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/tambahDataBarang', $data);
        $this->load->view('admin/templates/footer');
    }
    public function tambahDataAksi()
    {
        $id_barang = $this->input->post('id_barang');
        $nama_barang = $this->input->post('nama_barang');
        $nama_kategori = $this->input->post('nama_kategori');
        $ukuran = $this->input->post('ukuran');
        $stok = $this->input->post('stok');
        $deskripsi = $this->input->post('deskripsi');
        $modal = $this->input->post('modal');
        $id_supplier = $this->input->post('id_supplier');
        $foto = $_FILES['foto']['name'];
        if ($foto = '') {
        } else {
            $config['upload_path'] = './assets/foto';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                echo 'Gambar Gagal Di Upload';
            } else {
                $foto = $this->upload->data('file_name');
            }
        }
        $data = [
            'id_barang'     => $id_barang,
            'nama_barang'   => $nama_barang,
            'nama_kategori' => $nama_kategori,
            'ukuran'        => $ukuran,
            'stok'          => $stok,
            'deskripsi'     => $deskripsi,
            'modal'         => $modal,
            'harga_jual'    => $modal * 1.2,
            'id_supplier'   => $id_supplier,
            'foto'          => $foto,
        ];
        $this->model_barang->insert_data($data, 'tb_barang');
        $this->session->set_flashdata('msg_new','<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    Barang baru berhasil ditambah
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>');
        redirect('admin/dataBarang');
    }
    public function updateData($id)
    {
        $where = ['id_barang' => $id];
        $data['title'] = 'Form Update Data Barang';
        $data['barang'] = $this->db
            ->query("SELECT * FROM tb_barang WHERE id_barang='$id'")
            ->result();
        $data['kategori'] = $this->model_barang
            ->get_data('tb_kategori')
            ->result();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/updateDataBarang', $data);
        $this->load->view('admin/templates/footer');
    }
    public function updateDataAksi()
    {
        $id_barang = $this->input->post('id_barang');
        $nama_barang = $this->input->post('nama_barang');
        $nama_kategori = $this->input->post('nama_kategori');
        $ukuran = $this->input->post('ukuran');
        $stok = $this->input->post('stok');
        $deskripsi = $this->input->post('deskripsi');
        $modal = $this->input->post('modal');
        $id_supplier = $this->input->post('id_supplier');
        $foto = $_FILES['foto']['name'];
        if ($foto = '') {
        } else {
            $config['upload_path'] = './assets/foto';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                echo 'Gambar Gagal Di Upload';
            } else {
                $foto = $this->upload->data('file_name');
            }
        }
        $data = [
            'id_barang' => $id_barang,
            'nama_barang' => $nama_barang,
            'nama_kategori' => $nama_kategori,
            'ukuran' => $ukuran,
            'stok' => $stok,
            'deskripsi' => $deskripsi,
            'modal' => $modal,
            'id_supplier' => $id_supplier,
            'foto' => $foto,
        ];
        $where = [
            'id_barang' => $id_barang,
        ];
        $this->model_barang->update_data('tb_barang', $data, $where);
        $this->session->set_flashdata('msg_new', '<div class="alert alert-info alert-dismissible fade show" role="alert">
                                                    Barang berhasil diupdate
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>');
        redirect('admin/dataBarang');
    }
    public function deleteData($idbarang)
    {
        $where = ['id_barang' => $idbarang];
        $this->model_barang->delete_data($where, 'tb_barang');
        $this->session->set_flashdata('msg_new', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    Barang berhasil dihapus
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>');
        redirect('admin/dataBarang');
    }
}
