<?php 
    class Model_barang extends CI_Model{
        public function get_data($table){
            return $this->db->get($table);
        }
        public function insert_data($data, $table){
            // $this->ukuran = implode(',', $this->input->post('ukuran', true));
            $this->db->insert($table, $data);
        }

        public function update_data($table, $data, $where){
            $this->db->update($table, $data, $where);
        }
        public function delete_data($where, $table)
        {
            $this->db->where($where);
            $this->db->delete($table);
        }
        public function detail_data($id = NULL)
        {
            $query = $this->db->get_where('tb_barang', array('id_barang' => $id))->row();
            return $query;
        }
        public function kodebarang()
        {
            $this->db->select('RIGHT(tb_barang.id_barang, 2) as id_barang', FALSE);
            $this->db->order_by('id_barang','DESC');
            $this->db->limit(1);
            $query = $this->db->get('tb_barang');
            if ($query->num_rows() <> 0) {
                # cek kode jika telah tersedia
                $data = $query->row();
                $kode = intval($data->id_barang) + 1;
            }else{
                $kode = 1; //cek jika kode belum terdapat pada tabel
            }
                $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
                $kodeunik = "SPT"."-".$batas; // format kode
                return $kodeunik;
        }       
        public function kode()
        {
            $this->db->select('RIGHT(tb_pelanggan.id_pelanggan, 2) as id_pelanggan', FALSE);
            $this->db->order_by('id_pelanggan','DESC');
            $this->db->limit(1);
            $query = $this->db->get('tb_pelanggan');
            if ($query->num_rows() <> 0) {
                # cek kode jika telah tersedia
                $data = $query->row();
                $kode = intval($data->id_pelanggan) + 1;
            }else{
                $kode = 1; //cek jika kode belum terdapat pada tabel
            }
                $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
                $kodeunik = "PLG"."-".$batas; // format kode
                return $kodeunik;
        }       
        public function kodesupplier()
        {
            $this->db->select('RIGHT(tb_supplier.id_supplier, 2) as id_supplier', FALSE);
            $this->db->order_by('id_supplier','DESC');
            $this->db->limit(1);
            $query = $this->db->get('tb_supplier');
            if ($query->num_rows() <> 0) {
                # cek kode jika telah tersedia
                $data = $query->row();
                $kode = intval($data->id_supplier) + 1;
            }else{
                $kode = 1; //cek jika kode belum terdapat pada tabel
            }
                $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
                $kodeunik = "SPL"."-".$batas; // format kode
                return $kodeunik;
        }       
        public function kodebarangmasuk()
        {
            $this->db->select('RIGHT(tb_barang_masuk.id_barangmasuk, 2) as id_barangmasuk', FALSE);
            $this->db->order_by('id_barangmasuk','DESC');
            $this->db->limit(1);
            $query = $this->db->get('tb_barang_masuk');
            if ($query->num_rows() <> 0) {
                # cek kode jika telah tersedia
                $data = $query->row();
                $kode = intval($data->id_barangmasuk) + 1;
            }else{
                $kode = 1; //cek jika kode belum terdapat pada tabel
            }
                $tgl=date('Ymd');
                $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
                $kodeunik = "BRM"."-".$tgl."-".$batas; // format kode
                return $kodeunik;
        }       
        public function kodetransaksi()
        {
            $this->db->select('RIGHT(tb_transaksi.no_transaksi, 2) as no_transaksi', FALSE);
            $this->db->order_by('no_transaksi','DESC');
            $this->db->limit(1);
            $query = $this->db->get('tb_transaksi');
            if ($query->num_rows() <> 0) {
                # cek kode jika telah tersedia
                $data = $query->row();
                $kode = intval($data->no_transaksi) + 1;
            }else{
                $kode = 1; //cek jika kode belum terdapat pada tabel
            }
                $tgl=date('Ymd');
                $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
                $kodeunik = "TRX"."-".$tgl."-".$batas; // format kode
                return $kodeunik;
        }       
        public function kodeuser()
        {
            $this->db->select('RIGHT(tb_user.id_user, 2) as id_user', FALSE);
            $this->db->order_by('id_user','DESC');
            $this->db->limit(1);
            $query = $this->db->get('tb_user');
            if ($query->num_rows() <> 0) {
                # cek kode jika telah tersedia
                $data = $query->row();
                $kode = intval($data->id_user) + 1;
            }else{
                $kode = 1; //cek jika kode belum terdapat pada tabel
            }
                $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
                $kodeunik = "USR"."-".$batas; // format kode
                return $kodeunik;
        }

        public function cek_login()
        {
            $username = set_value('username');
            $password = set_value('password');

            $result = $this->db->where('username', $username)
            ->where('password', $password)
            ->limit(1)
                ->get('tb_user');
            if ($result->num_rows() > 0) {
                return $result->row();
            } else {
                return FALSE;
            }
        }

        public function find($id)
        {
            $result = $this->db->where('id_barang', $id)
                            ->limit(1)
                            ->get('tb_barang');
            if($result->num_rows() > 0){
                return $result->row();
            }else{
                return array();
            }
        }
    }
?>