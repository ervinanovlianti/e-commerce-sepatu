<?php
class Keranjang extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Keranjang Belanja";
        $data['barang'] = $this->model_barang->get_data('tb_barang')->result();
        $this->load->view('pelanggan/template/header');
        $this->load->view('pelanggan/template/sidebar');
        $this->load->view('pelanggan/keranjang', $data);
        $this->load->view('pelanggan/template/footer');
    }
    public function tambahKeranjang($id)
    {
        $barang = $this->model_barang->find($id);
        $data = array(
            'id' => $barang->id_barang,
            'qty' => 1,
            'price' => $barang->harga_jual,
            'name' => $barang->nama_barang
        );
        $this->cart->insert($data);
        redirect('pelanggan/dashboard');
    }
    function removeItem($rowid)
    {
        $remove = $this->cart->remove($rowid);
        redirect('pelanggan/keranjang');
    }
    public function update($id)
    {
        $data=array(
            'id'=>$id,
            'qty'=> $this->input->post('qty')
        );

        $this->cart->update($data);
        return redirect('pelanggan/keranjang');
    }
    public function hapusKeranjang($id)
    {

        $this->cart->destroy();
        redirect('pelanggan/keranjang');
    }

    public function pesan()
    {
        $this->load->view('pelanggan/template/header');
        $this->load->view('pelanggan/template/sidebar');
        $this->load->view('pelanggan/formPemesanan');
        $this->load->view('pelanggan/template/footer');
    }
    public function inputPesanan()
    {
        $data['belum_bayar'] = $this->model_invoice->belum_bayar();
        $data['diproses'] = $this->model_invoice->diproses();
        $data['dikirim'] = $this->model_invoice->dikirim();
        $data['selesai'] = $this->model_invoice->selesai();
        $is_processed = $this->model_invoice->index();
        if ($is_processed) {
            $this->cart->destroy();
            $this->load->view('pelanggan/template/header');
            $this->load->view('pelanggan/template/sidebar');
            $this->load->view('pelanggan/dataPesanan', $data);
            $this->load->view('pelanggan/template/footer');
        } else {
            echo "Maaf Pesanan Anda gagal Di proses";
        }
    }
    
}
