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
    function updateItem()
    {
        $update = 0;

        // Get cart item info
        $rowid = $this->input->get('rowid');
        $qty = $this->input->get('qty');

        // Update item in the cart
        if (!empty($rowid) && !empty($qty)) {
            $data = array(
                'rowid' => $rowid,
                'qty'   => $qty
            );
            $update = $this->cart->update($data);
        }

        // Return response
        echo $update ? 'ok' : 'Data berhasil Di update';
        redirect('pelanggan/keranjang');
    }

    function removeItem($rowid)
    {
        // Remove item from cart
        $remove = $this->cart->remove($rowid);

        // Redirect to the cart page
        redirect('pelanggan/keranjang');
    }
    public function update($rowid)
    {
        $data=array(
            'rowid'=>$rowid,
            'qty'=> $this->input->post('qty')
        );

        $this->cart->update($data);
        return redirect('pelanggan/keranjang');
    }
    public function updated()
    {
        $i =1;
        foreach($this->cart->contents() as $items){
            $data = array(
                'rowid' => $items['rowid'],
                'qty'   => $this->request->getPost('qty'.$i++)
            );
            $this->cart->update($data);

        }
        return redirect('pelanggan/keranjang');
    }
    public function hapusKeranjang($id)
    {

        $this->cart->destroy();
        redirect('pelanggan/keranjang');
    }

    public function pembayaran()
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
