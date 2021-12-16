<?php 
class DataPelanggan extends CI_Controller{
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
    public function index(){
        $data['title'] = "Data Pelanggan";
        $data['pelanggan'] = $this->model_barang->get_data('tb_pelanggan')->result();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/dataPelanggan', $data);
        $this->load->view('admin/templates/footer');
    }
    public function tambahData()
    {
        $data['title'] = "Form Tambah Data Pelanggan";
        $data['kode'] = $this->model_barang->kode();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/tambahDataPelanggan', $data);
        $this->load->view('admin/templates/footer');
    }
    public function inputdata()
    {
        if ($_POST) {
            $id = $this->input->post('id_pelanggan');
            $nama = $this->input->post('nama_pelanggan');
            $notelp = $this->input->post('notelp_pelanggan');
            $alamat = $this->input->post('alamat_pelanggan');

            $data = array (
                'id_pelanggan'    => $id,
                'nama_pelanggan' => $nama,
                'notelp_pelanggan'  => $notelp,
                'alamat_pelanggan'  => $alamat
            );
            $this->model_barang->insert_data($data, 'tb_pelanggan');
            redirect('admin/dataPelanggan');
        }
    }
}
?>