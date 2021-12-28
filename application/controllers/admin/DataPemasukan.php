<?php 
    class DataPemasukan extends CI_Controller{
    public function  __construct()
    {
        parent::__construct();
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
        $data['title'] = "Riwayat Data Barang Masuk";
        $data['barangmasuk'] = $this->model_barang->get_data('tb_barang_masuk')->result();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/dataPemasukan', $data);
        $this->load->view('admin/templates/footer');
    }
    public function tambahStok()
    {
        $data['title'] = "Tambah Stok Barang";
        $data['kode'] = $this->model_barang->kodebarangmasuk();
        $data['barang'] = $this->model_barang->get_data('tb_barang')->result();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/tambahStokBarang', $data);
        $this->load->view('admin/templates/footer');
    }
    public function tambahDataAksi()
    {
        $id_barangmasuk         = $this->input->post('id_barangmasuk');
        $tanggal_masuk          = $this->input->post('tanggal_masuk');
        $id_barang              = $this->input->post('id_barang');
        $stok                   = $this->input->post('stok');
        $keterangan             = $this->input->post('keterangan');
        $data = array (
            'id_barangmasuk'    => $id_barangmasuk,
            'tanggal_masuk'     => $tanggal_masuk,
            'id_barang'         => $id_barang,
            'stok'              => $stok,
            'keterangan'        => $keterangan,
        );
        $this->model_barang->insert_data($data, 'tb_barang_masuk');
        $this->session->set_flashdata('msg_stok', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    Stok barang berhasil ditambah
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>');
        redirect('admin/dataPemasukan');
    }
    
    public function updateData($id)
    {
        $where = array('id_user' => $id);
        $data['title'] = "Form Update Data User";
        $data['barang'] = $this->model_barang->get_data('tb_barang')->result();
        $data['barangmasuk'] = $this->db->query("SELECT * FROM tb_barang_masuk WHERE id_barangmasuk='$id'")->result();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/updateDataPemasukan', $data);
        $this->load->view('admin/templates/footer');
    }
    public function updateDataAksi()
    {
        $id         = $this->input->post('id_barangmasuk');
        $tanggal_masuk          = $this->input->post('tanggal_masuk');
        $id_barang              = $this->input->post('id_barang');
        $stok                   = $this->input->post('stok');
        $keterangan             = $this->input->post('keterangan');

        $data = array(
            'id_barangmasuk'    => $id,
            'tanggal_masuk'     => $tanggal_masuk,
            'id_barang'         => $id_barang,
            'stok'              => $stok,
            'keterangan'        => $keterangan,
        );
            $where = array(
                'id_barangmasuk' => $id
            );
            $this->model_barang->update_data('tb_barang_masuk', $data, $where);
        $this->session->set_flashdata('msg_stok', '<div class="alert alert-info alert-dismissible fade show" role="alert">
                                                    Stok barang berhasil diupdate
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>');

            redirect('admin/dataPemasukan');
        }

    public function deleteData($id)
    {
        $where = array('id_barangmasuk' => $id);
        $this->model_barang->delete_data($where, 'tb_barang_masuk');
        $this->session->set_flashdata('msg_stok', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    Stok barang berhasil dihapus
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>');

        redirect('admin/dataPemasukan');
    }
    }
