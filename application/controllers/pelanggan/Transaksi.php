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
    public function pembayaran($id)
    {
        $data['invoice'] = $this->model_invoice->ambil_id_invoice($id);
        $this->load->view('pelanggan/template/header');
        $this->load->view('pelanggan/template/sidebar');
        $this->load->view('pelanggan/formPembayaran', $data);
        $this->load->view('pelanggan/template/footer');
    }
    public function bayars($id)
    {
        $this->form_validation->set_rules('no_rekening', 'No Rekening', 'required', array('required' => '%s Harus Diisi !!!'));
        $this->form_validation->set_rules('atas_nama', 'Atas Nama', 'required', array('required' => '%s Harus Diisi !!!'));
        $this->form_validation->set_rules('bukti_bayar', 'Bukti Bayar', 'required', array('required' => '%s Harus Diisi !!!'));

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/bukti_pembayaran';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->upload->initialize($config);
            $field_name = 'bukti_bayar';
            if (!$this->upload->do_upload($field_name)) {
                redirect('pelanggan/transaksi');
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/bukti_pembayaran/' . $upload_data['upload']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id' => $id,
                    'no_rekening' => $this->input->post('no_rekening'),
                    'atas_nama' => $this->input->post('atas_nama'),
                    'bukti_bayar' => $upload_data['uploads']['file_name'],
                    'status_bayar' => '1',
                );
                $this->model_invoice->upload_buktibayar($data);
                $this->session->set_flashdata('pesan', 'Bukti Pembayaran Berhasil diupload');
            }
        }
    }
    public function bayar($id)
    {
            // $jenis_pembayaran = $this->input->post('jenis_pembayaran');
            $no_rekening = $this->input->post('no_rekening');
            $atas_nama = $this->input->post('atas_nama');
            $bukti_bayar = $_FILES['bukti_bayar']['name'];
            if ($bukti_bayar = '') {
            } else {
                $config['upload_path'] = './assets/bukti_pembayaran';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('bukti_bayar')) {
                    echo 'Gambar Gagal Di Upload';
                } else {
                    $bukti_bayar = $this->upload->data('file_name');
                }
            }
            $data = [
                'id' => $id,
                // 'jenis_pembayaran' => $jenis_pembayaran,
                'no_rekening' => $no_rekening,
                'atas_nama' => $atas_nama, 
                'bukti_bayar' => $bukti_bayar,
                'status_bayar' => '1', 
            ];
            $this->model_invoice->upload_buktibayar($data);
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
    public function pesananBatal($id)
    {
        $this->model_invoice->pesanan_batal($id);
        redirect('pelanggan/transaksi');
    }
    }
?>
