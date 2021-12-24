<?php
class Transaksi extends CI_Controller
{
    public function index()
    {
        $data['belum_bayar'] = $this->model_invoice->belum_bayar();
        $data['diproses'] = $this->model_invoice->diproses();
        $data['dikirim'] = $this->model_invoice->dikirim();
        $data['selesai'] = $this->model_invoice->selesai();
        $this->load->view('pelanggan/template/header');
        $this->load->view('pelanggan/template/sidebar');
        $this->load->view('pelanggan/dataPesanan', $data);
        $this->load->view('pelanggan/template/footer');
    }
    public function pembayaran($id_pesanan)
    {
        $data['invoice'] = $this->model_invoice->ambil_id_invoice($id_pesanan);
        $data['pesanan'] = $this->model_invoice->ambil_id_pesanan($id_pesanan);
        $this->load->view('pelanggan/template/header');
        $this->load->view('pelanggan/template/sidebar');
        $this->load->view('pelanggan/formPembayaran',$data);
        $this->load->view('pelanggan/template/footer');
    }
    public function bayar()
    {
            $id_pesanan = $this->input->post('id_pesanan');
            $jenis_pembayaran = $this->input->post('jenis_pembayaran');
            $no_rekening = $this->input->post('no_rekening');
            $nama = $this->input->post('nama');
            $bukti_bayar = $_FILES['bukti_pembayaran']['name'];
            if ($bukti_bayar = '') {
            } else {
                $config['upload_path'] = './assets/bukti_pembayaran';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('bukti_pembayaran')) {
                    echo 'Gambar Gagal Di Upload';
                } else {
                    $bukti_bayar = $this->upload->data('file_name');
                }
            }
            $data = [
                'id_pesanan' => $id_pesanan,
                'jenis_pembayaran' => $jenis_pembayaran,
                'no_rekening' => $no_rekening,
                'nama' => $nama, 
                'bukti_pembayaran' => $bukti_bayar, 
            ];
            $this->model_barang->insert_data($data, 'tb_pembayaran');
            redirect('pelanggan/transaksi');
        }
    public function pesananSelesai($id_pesanan)
    {
        $data = array(
            'id'    => $id_pesanan,
            'status_pesanan' => '3',
        );
        $this->model_invoice->update_pesanan($data);

        $this->session->set_flashdata('msg', 'Pesanan Berhasil Di Kirim');
        redirect('pelanggan/transaksi');
    }
    }
?>
