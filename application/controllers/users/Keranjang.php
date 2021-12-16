<?php
class Keranjang extends CI_Controller
{
   
    public function index()
    {
        $data['title'] = "Keranjang Belanja";
        $data['barang'] = $this->model_barang->get_data('tb_barang')->result();
        $this->load->view('users/template/header');
        $this->load->view('users/template/sidebar');
        $this->load->view('users/keranjang', $data);
        $this->load->view('users/template/footer');
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
        redirect('users/dashboard');
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
        redirect('users/keranjang');
    }

    function removeItem($rowid)
    {
        // Remove item from cart
        $remove = $this->cart->remove($rowid);

        // Redirect to the cart page
        redirect('users/keranjang');
    }
    public function update($rowid)
    {
        $data=array(
            'rowid'=>$rowid,
            'qty'=> $this->input->post('qty')
        );

        $this->cart->update($data);
        return redirect('user/keranjang');
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
        return redirect('user/keranjang');
    }
    public function hapusKeranjang($id)
    {

        $this->cart->destroy();
        redirect('users/keranjang');
    }
}
