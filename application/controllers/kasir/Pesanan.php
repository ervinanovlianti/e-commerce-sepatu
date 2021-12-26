<?php 
    class Pesanan extends CI_Controller{
        public function index()
        {
            $data['invoice'] = $this->model_invoice->pesanan_baru();
            $data['invoice_proses'] = $this->model_invoice->pesanan_diproses();
            $data['invoice_kirim'] = $this->model_invoice->pesanan_dikirim();
            $data['selesai'] = $this->model_invoice->pesanan_selesai();
            $this->load->view('kasir/templates_k/header');
            $this->load->view('kasir/templates_k/sidebar');
            $this->load->view('kasir/pesanan', $data);
            $this->load->view('kasir/templates_k/footer');
        }
        public function proses()
        {
            $data['invoice_proses'] = $this->model_invoice->diproses();
            $this->load->view('kasir/templates_k/header');
            $this->load->view('kasir/templates_k/sidebar');
            $this->load->view('kasir/pesanan', $data);
            $this->load->view('kasir/templates_k/footer');
        }
        public function detail($id_pesanan)
        {
            $data['invoice'] = $this->model_invoice->ambil_id_invoice($id_pesanan);
            $data['pesanan'] = $this->model_invoice->ambil_id_pesanan($id_pesanan);
            $this->load->view('kasir/templates_k/header');
            $this->load->view('kasir/templates_k/sidebar');
            $this->load->view('kasir/detailPesanan', $data);
            $this->load->view('kasir/templates_k/footer');
            
        }
        
        public function prosesPesanan($id_pesanan)
        {
            $data = array(
                'id'    => $id_pesanan,
                'status_pesanan' => '1',
            );
            $this->model_invoice->update_pesanan($data);
            redirect('kasir/pesanan');
        }
        public function kirimPesanan($id_pesanan)
        {
            $data = array(
                'id'    => $id_pesanan,
                'no_resi' => $this->input->post('no_resi'),
                'status_pesanan' => '2',
            );
            $this->model_invoice->update_pesanan($data);
            
            $this->session->set_flashdata('msg', 'Pesanan Berhasil Di Kirim');
            redirect('kasir/pesanan');
        }
    }
?>