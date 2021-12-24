<?php 
    class DataPemasukan extends CI_Controller{
    public function  __construct()
    {
        parent::__construct();
        if ($this->session->userdata('hak_akses') != '1') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Anda belum login!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>');
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
        $data['supplier'] = $this->model_barang->get_data('tb_supplier')->result();
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
        $id_supplier            = $this->input->post('id_supplier');
        $id_barang              = $this->input->post('id_barang');
        $stok                   = $this->input->post('stok');
        $keterangan             = $this->input->post('keterangan');
        
        $data = array (
            'id_barangmasuk'    => $id_barangmasuk,
            'tanggal_masuk'     => $tanggal_masuk,
            'id_supplier'       => $id_supplier,
            'id_barang'         => $id_barang,
            'stok'              => $stok,
            'keterangan'        => $keterangan,
        );
        $this->model_barang->insert_data($data, 'tb_barang_masuk');
        redirect('admin/dataPemasukan');
    }
    
        public function updateData($id)
        {
            $where = array('id_user' => $id);
            $data['title'] = "Form Update Data User";
            $data['supplier'] = $this->model_barang->get_data('tb_supplier')->result();
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
            $id_supplier            = $this->input->post('id_supplier');
            $id_barang              = $this->input->post('id_barang');
            $stok                   = $this->input->post('stok');
            $keterangan             = $this->input->post('keterangan');

            $data = array(
                'id_barangmasuk'    => $id,
                'tanggal_masuk'     => $tanggal_masuk,
                'id_supplier'       => $id_supplier,
                'id_barang'         => $id_barang,
                'stok'              => $stok,
                'keterangan'        => $keterangan,
            );
                $where = array(
                    'id_barangmasuk' => $id
                );
                $this->model_barang->update_data('tb_barang_masuk', $data, $where);
                redirect('admin/dataPemasukan');
            }

        public function deleteData($id)
        {
            $where = array('id_barangmasuk' => $id);
            $this->model_barang->delete_data($where, 'tb_barang_masuk');
            redirect('admin/dataPemasukan');
        }
    }
