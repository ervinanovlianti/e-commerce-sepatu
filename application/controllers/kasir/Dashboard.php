<?php 

class Dashboard extends CI_Controller{
    public function index()
    {
        $barang = $this->db->query("SELECT * FROM tb_barang");
        $barang_masuk= $this->db->query("SELECT * FROM tb_barang_masuk");
        $supplier = $this->db->query("SELECT * FROM tb_supplier");
        $pelanggan = $this->db->query("SELECT * FROM tb_pelanggan");
        $transaksi = $this->db->query("SELECT * FROM tb_transaksi");
        $data['barang'] = $barang->num_rows();
        $data['barangmasuk'] = $barang_masuk->num_rows();
        $data['supplier'] = $supplier->num_rows();
        $data['pelanggan'] = $pelanggan->num_rows();
        $data['transaksi'] = $transaksi->num_rows();
        $this->load->view('kasir/templates_k/header');
        $this->load->view('kasir/templates_k/sidebar');
        $this->load->view('kasir/dashboard', $data);
        $this->load->view('kasir/templates_k/footer');

    }
}
