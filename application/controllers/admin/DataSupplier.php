<?php 
class DataSupplier extends CI_Controller{
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
        $data['title'] = "Data Supplier";
        $data['supplier'] = $this->model_barang->get_data('tb_supplier')->result();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/dataSupplier', $data);
        $this->load->view('admin/templates/footer');
    }
    public function tambahsupplier()
    {
        $data['title'] = "Form Tambah Data Supplier";
        $data['kode'] = $this->model_barang->kodesupplier();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/tambahDataSupplier', $data);
        $this->load->view('admin/templates/footer');
    }
    public function inputdata()
    {
        if ($_POST) {
            $idsupplier     = $this->input->post('id_supplier');
            $supplier       = $this->input->post('nama_supplier');
            $notelp         = $this->input->post('notelp_supplier');
            $alamat         = $this->input->post('alamat_supplier');
            $foto           = $_FILES ['foto_supplier']['name'];
                if ($foto = ''){
                }else{
                    $config ['upload_path'] = './assets/foto_supplier';
                    $config ['allowed_types'] = 'jpg|jpeg|png|gif';
        
                    $this->load->library('upload', $config);
                    if(!$this->upload->do_upload('foto_supplier')){
                        echo "Gambar Gagal Di Upload";
                    }else{
                        $foto=$this->upload->data('file_name');
                    }
                }
            $data = array (
                'id_supplier'       => $idsupplier,
                'nama_supplier'     => $supplier,
                'notelp_supplier'  => $notelp,
                'alamat_supplier'  => $alamat,
                'foto_supplier'    => $foto,
            );
            $this->model_barang->insert_data($data, 'tb_supplier');
            redirect('admin/dataSupplier');
        }
    }
    public function updateData($id)
    {
        $where = array('id_supplier' => $id);
        $data['title'] = "Form Update Data Supplier";
        $data['supplier'] = $this->db->query("SELECT * FROM tb_supplier WHERE id_supplier='$id'")->result();
        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/updateDataSupplier', $data);
        $this->load->view('admin/templates/footer');
    }
    public function updateDataAksi()
        {
            $id         = $this->input->post('id_supplier');
            $nama       = $this->input->post('nama_supplier');
            $notelp     = $this->input->post('notelp_supplier');
            $alamat     = $this->input->post('alamat_supplier');
            $foto       = $_FILES['foto_supplier']['name'];
            if ($foto){
                $config ['encrypt_name']      = TRUE;
                $config ['upload_path']      = './assets/foto_supplier';
                $config ['allowed_types']    = 'jpg|jpeg|png|tiff';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('foto_supplier')) {
                    $foto=$this->upload->data('file_name');
                    $this->db->set('foto_supplier', $foto);
                }else {
                    echo $this->upload->display_errors();
                }
            }

            $data = array(
                'nama_supplier'    => $nama,
                'notelp_supplier'  => $notelp,
                'alamat_supplier'    => $alamat,
                'foto_supplier'    => $foto,
            );

            $where = array(
                'id_supplier' => $id
            );
            $this->model_barang->update_data('tb_supplier', $data, $where);
            redirect('admin/dataSupplier');
        }            
        
        public function deleteData($idsupplier)
        {
                $where = array('id_supplier' => $idsupplier);
                $this->model_barang->delete_data($where, 'tb_supplier');
                redirect('admin/dataSupplier');
        }
}
