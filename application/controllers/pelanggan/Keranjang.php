<?php
class Keranjang extends CI_Controller
{
    public function index()
    {
        $data['title']          = "Keranjang Belanja";
        $data['barang']         = $this->model_barang->get_data('tb_barang')->result();
        $this->load->view('pelanggan/template/header');
        $this->load->view('pelanggan/template/sidebar');
        $this->load->view('pelanggan/keranjang', $data);
        $this->load->view('pelanggan/template/footer');
    }
    public function add()
    {
        $redirect_page = $this->input->post('redirect_page');
        $data = array(
            'id' => $this->input->post('id'),
            'qty'=> $this->input->post('qty'),
            'price'=> $this->input->post('price'),
            'name'=> $this->input->post('name'),
            'size'=> $this->input->post('size'),
        );
        $this->cart->insert($data);
        redirect($redirect_page);
    }
    public function update()
    {
        $i = 1;

        foreach ($this->cart->contents() as $items) {
            $data = array(
                'rowid' => $items['rowid'],
                'qty'   => $this->input->post($i . '[qty]')
            );
            $this->cart->update($data);
            $i++;
        }
        return redirect('pelanggan/keranjang');
    }
    function removeItem($rowid)
    {
        $remove                 = $this->cart->remove($rowid);
        redirect('pelanggan/keranjang');
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
        $data['belum_bayar']    = $this->model_invoice->belum_bayar();
        $data['diproses']       = $this->model_invoice->diproses();
        $data['dikirim']        = $this->model_invoice->dikirim();
        $data['selesai']        = $this->model_invoice->selesai();
        $is_processed           = $this->model_invoice->index();
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
