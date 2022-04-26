Model : Model_data.php
<?php
    class Model_data extends CI_Model
    {
        public function get_data($table)
        {
            return $this->db->get($table);
        }
        public function insert_data($data)
        {
            $this->db->insert($$data);
        }
    }
?>
Controller : Data.php
<?php
    class Data extends CI_Controller
    {
        public function index()
        {
            $data['nilai'] = $this->model_data->get_data('tb_data')->result();
        }
        public function tambahdata()
        {
            $nama = $this->input->post('nama_mahasiswa');
            $nilai_uts = $this->input->post('nilai_uts');
            $nilai_uas = $this->input->post('nilai_uas');

            $data = [
                'nama_mahasiswa' => $nama,
                'nilai_uts' => $nilai_uts,
                'nilai_uas' => $nilai_uas,
            ];
            $this->model_data->insert_data($data, 'tb_barang');
        }
    }
?>
View : Data.php

<form method="post" action="<?php echo base_url('data/tambahdata') ?>">
    <div class="form-group">
        <label>Nama Mahasiswa</label>
        <input type="text" name="nama_mahasiswa" class="form-control">
    </div>
    <div class="form-group">
        <label>Nilai UTS</label>
        <input type="text" name="nilai_uts" class="form-control">
    </div>
    <div class="form-group">
        <label>Nilai UAS</label>
        <input type="text" name="nilai_uas" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary me-2">Submit</button>
</form>
<table class="table">
    <?php $no = 1;
        $total = 0;
        foreach ($nilai as $key => $value) {
            $total = $total + $nilai_uts + $nilai_uas;
        ?>
    <tr>
        <th>Nama Mahasiswa</th>
        <td><?php echo $value->nama_mahasiswa ?></td>
    </tr>
    <tr>
        <th>Nilai UTS</th>
        <td><?php echo $value->nilai_uts ?></td>
    </tr>
    <tr>
        <th>Nilai UAS</th>
        <td><?php echo $value->nilai_uas ?></td>
    </tr>
    <tr>
        <th>Total Nilai</th>
        <td><?php echo $total ?></td> //menampilkan jumlah nilai uts dan nilai uas
    </tr>
    <?php } ?>

</table>