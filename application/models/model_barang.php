<?php 
    class Model_barang extends CI_Model{
        public function get_data($table){
            return $this->db->get($table);
        }
        public function insert_data($data, $table){
            $this->db->insert($table, $data);
        }

        public function update_data($table, $data, $where){
            $this->db->update($table, $data, $where);
        }
        public function update_pembayaran($id){
            $this->db->where('id', $id);
            $this->db->update('tb_pesanan');
        }
        public function delete_data($where, $table)
        {
            $this->db->where($where);
            $this->db->delete($table);
        }
        public function get_databarang()
        {
            $this->db->select('*');
            $this->db->from('tb_barang');
            return $this->db->get()->result();
        }
        public function detail_data($id = NULL)
        {
            $this->db->select('*');
            $this->db->from('tb_barang');
            $this->db->where('id_barang', $id);
            return $this->db->get()->row();
        }
        public function barang_masuk()
        {
            $this->db->select('*');
            $this->db->from('tb_barang_masuk');
            $this->db->join('tb_barang', 'tb_barang_masuk.id_barang = tb_barang.id_barang');
            return $this->db->get()->result();
        }
        public function stok_minim()
        {
            $this->db->select('*');
            $this->db->from('tb_barang');
            $this->db->where('stok <=5');
            return $this->db->get()->result();
        }
        public function barang_terjual()
        {
            $this->db->select('*');
            $this->db->from('tb_pesanan');
            $this->db->join('tb_detail_pesanan', 'tb_pesanan.id = tb_detail_pesanan.id_pesanan');
            $this->db->join('tb_barang', 'tb_barang.id_barang = tb_detail_pesanan.id_barang');
            $this->db->where('status_pesanan !=0');
            return $this->db->get()->result();
        }
        public function pemasukan()
        {
            $this->db->select('*');
            $this->db->from('tb_pesanan');
            $this->db->where('status_pesanan !=0');
            return $this->db->get()->result();
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
        public function cek_login_pelanggan()
        {
            $email = set_value('email');
            $password = set_value('password');

            $result = $this->db->where('email', $email)
            ->where('password', $password)
            ->limit(1)
                ->get('tb_pelanggan');
            if ($result->num_rows() > 0) {
                return $result->row();
            } else {
                return FALSE;
            }
        }
        public function get_keyword($keyword)
        {
            $this->db->select('*');
            $this->db->from('tb_barang');
            $this->db->like('nama_barang', $keyword);
            $this->db->or_like('nama_kategori', $keyword);
            return $this->db->get()->result();
        }
        public function sepatuPria()
        {
            $this->db->select('*');
            $this->db->from('tb_barang');
            $this->db->where('nama_kategori', 'Sepatu Pria');
            return $this->db->get()->result();
        }
        public function sepatuWanita()
        {
            $this->db->select('*');
            $this->db->from('tb_barang');
            $this->db->where('nama_kategori', 'Sepatu Wanita');
            return $this->db->get()->result();
        }

        public function lap_harian($tanggal, $bulan, $tahun)
        {
            $this->db->select('*');
            $this->db->from('tb_pesanan');
            $this->db->join('tb_detail_pesanan', 'tb_pesanan.id = tb_detail_pesanan.id_pesanan');
            $this->db->where('DAY(tb_pesanan.tanggal_pesan)', $tanggal);
            $this->db->where('MONTH(tb_pesanan.tanggal_pesan)', $bulan);
            $this->db->where('YEAR(tb_pesanan.tanggal_pesan)', $tahun);
            return $this->db->get()->result();
        }
        public function data_harian($tanggal, $bulan, $tahun)
        {
            $this->db->select('*');
            $this->db->from('tb_pesanan');
            $this->db->where('DAY(tb_pesanan.tanggal_pesan)', $tanggal);
            $this->db->where('MONTH(tb_pesanan.tanggal_pesan)', $bulan);
            $this->db->where('YEAR(tb_pesanan.tanggal_pesan)', $tahun);
            return $this->db->get()->result();
        }
        public function lap_bulanan($bulan, $tahun)
        {
            $this->db->select('*');
            $this->db->from('tb_pesanan');
            $this->db->where('MONTH(tb_pesanan.tanggal_pesan)', $bulan);
            $this->db->where('YEAR(tb_pesanan.tanggal_pesan)', $tahun);
            $this->db->where('status_pesanan != 0');
            return $this->db->get()->result();
        }
        public function lap_tahunan($tahun)
        {
            $this->db->select('*');
            $this->db->from('tb_pesanan');
            $this->db->where('YEAR(tb_pesanan.tanggal_pesan)', $tahun);
            $this->db->where('status_pesanan != 0');
            return $this->db->get()->result();
        }

        public function kategori_sepatu()
        {
            $this->db->group_by('nama_kategori');
            $this->db->select('nama_kategori');
            $this->db->select("count(*) as total");
            return $this->db->from('tb_barang')->get()->result();
        }
    }
