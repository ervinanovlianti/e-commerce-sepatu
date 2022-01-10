<?php 
    class Model_invoice extends CI_Model{
        public function index()
        {
            date_default_timezone_set('Asia/Makassar');
            $kode_pesanan           = $this->input->post('kode_pesanan');
            $id_pelanggan           = $this->input->post('id_pelanggan');
            $nama_pelanggan          = $this->input->post('nama_pelanggan');
            $nama_penerima  = $this->input->post('nama_penerima');
            $alamat         = $this->input->post('alamat');
            $notelp         = $this->input->post('notelp');
            $jasa_pengiriman         = $this->input->post('jasa_pengiriman');
            $total         = $this->input->post('total');

            $pesanan = array (
                'kode_pesanan' => $kode_pesanan,
                'id_pelanggan' => $id_pelanggan,
                'nama_pelanggan' => $nama_pelanggan,
                'nama_penerima' => $nama_penerima,
                'alamat' => $alamat,
                'notelp' => $notelp,
                'jasa_pengiriman' => $jasa_pengiriman,
                'tanggal_pesan' => date('Y-m-d H:i:s'),
                'batas_bayar' => date('Y-m-d H:i:s', mktime(date('H'), date('i'), date('s'), 
                date('m'), date('d') + 1, date('Y'))),
                'total' => $total,
            );
            $this->db->insert('tb_pesanan', $pesanan);
            $id_pesanan = $this->db->insert_id();

            foreach ($this->cart->contents() as $item) {
                $data = array(
                    'id_pesanan'        => $id_pesanan,
                    'id_barang'         => $item['id'],
                    'nama_barang'       => $item['name'],
                    'ukuran'            => $item['size'],
                    'jumlah'            => $item['qty'],
                    'harga'             => $item['price'],
                );
                $this->db->insert('tb_detail_pesanan', $data);
            }
            return TRUE;
        }

        public function belum_bayar()
        {
            $this->db->select('*');
            $this->db->from('tb_pesanan');
            $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
            $this->db->where('status_pesanan = 0',);
            return $this->db->get()->result();
        }
        public function diproses()
        {
            $this->db->select('*');
            $this->db->from('tb_pesanan');
            $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
            $this->db->where('status_pesanan = 1',);
            return $this->db->get()->result();
        }
        public function dikirim()
        {
            $this->db->select('*');
            $this->db->from('tb_pesanan');
            $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
            $this->db->where('status_pesanan = 2',);
            return $this->db->get()->result();
        }
        public function selesai()
        {
            $this->db->select('*');
            $this->db->from('tb_pesanan');
            $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));

            $this->db->where('status_pesanan = 3',);
            return $this->db->get()->result();
        }

        public function ambil_id_invoice($id)
        {
            $result = $this->db->where('id', $id)->limit(1)->get('tb_pesanan');
            if ($result->num_rows() > 0) {
                return $result->row();
            }else{
                return false;
            }
        }
        public function ambil_id_pesanan($id_pesanan)
        {
            $result = $this->db->where('id_pesanan', $id_pesanan)->get('tb_detail_pesanan');
            if ($result->num_rows() > 0) {
                return $result->result();
            }else{
                return false;
            }
        }
        public function update_pesanan($data)
        {
            $this->db->where('id', $data['id']);
            $this->db->update('tb_pesanan', $data);     
        }
        public function upload_buktibayar($data)
        {
            $this->db->where('id', $data['id']);
            $this->db->update('tb_pesanan', $data);     
        }
        public function pesanan_batal($id)
        {
            $this->db->query("DELETE tb_pesanan, tb_detail_pesanan FROM tb_pesanan, tb_detail_pesanan 
            WHERE tb_pesanan.id=tb_detail_pesanan.id_pesanan AND tb_pesanan.id= $id");
            
        }
        public function pesanan_baru()
        {
            $this->db->select('*');
            $this->db->from('tb_pesanan');
            $this->db->where('status_pesanan = 0');
            return $this->db->get()->result();
        }
        public function pesanan_diproses()
        {
            $this->db->select('*');
            $this->db->from('tb_pesanan');
            $this->db->where('status_pesanan = 1',);
            return $this->db->get()->result();
        }
        public function pesanan_dikirim()
        {
            $this->db->select('*');
            $this->db->from('tb_pesanan');

            $this->db->where('status_pesanan = 2',);
            return $this->db->get()->result();
        }
        public function pesanan_selesai()
        {
            $this->db->select('*');
            $this->db->from('tb_pesanan');
            $this->db->where('status_pesanan = 3',);
            return $this->db->get()->result();
        }

    }
