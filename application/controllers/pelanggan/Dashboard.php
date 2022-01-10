<?php 

class Dashboard extends CI_Controller{
    
    public function index()
    {
        $data['barang'] = $this->db->query("SELECT * FROM tb_barang ORDER BY id_barang DESC")->result();
        $data['ukuran'] = $this->model_barang->get_databarang();
        $this->load->view('pelanggan/template/header');
        $this->load->view('pelanggan/template/sidebar');
        $this->load->view('pelanggan/dashboard', $data);
        $this->load->view('pelanggan/template/footer');

    }
    public function detailData($id)
    {
        $data['title'] = 'Detail Produk';
        // $this->load->model('model_barang');
        $data['detail'] = $this->model_barang->detail_data($id);
        // $data['detail'] = $detail;
        $this->load->view('pelanggan/template/header');
        $this->load->view('pelanggan/template/sidebar');
        $this->load->view('pelanggan/detailBarang', $data);
        $this->load->view('pelanggan/template/footer');
    }
    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['barang'] = $this->model_barang->get_keyword($keyword);
        $this->load->view('pelanggan/template/header');
        $this->load->view('pelanggan/template/sidebar');
        $this->load->view('pelanggan/dashboard', $data);
        $this->load->view('pelanggan/template/footer');
    
    }
    public function kategoriPria()
    {
        $data['SP'] = $this->model_barang->sepatuPria();
        $this->load->view('pelanggan/template/header');
        $this->load->view('pelanggan/template/sidebar');
        $this->load->view('pelanggan/sepatuPria', $data);
        $this->load->view('pelanggan/template/footer');
    }
    public function kategoriWanita()
    {
        $data['SW'] = $this->model_barang->sepatuWanita();
        $this->load->view('pelanggan/template/header');
        $this->load->view('pelanggan/template/sidebar');
        $this->load->view('pelanggan/sepatuWanita', $data);
        $this->load->view('pelanggan/template/footer');
    }
}
