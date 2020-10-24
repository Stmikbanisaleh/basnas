<?php

class Model_rr_penerimaan_dan_penggunaan_hak_amil extends CI_model
{
    public function view($table)
    {
        return $this->db->get($table);
    }

    public function viewOrdering($table, $order, $ordering)
    {
        $this->db->order_by($order, $ordering);
        return $this->db->get($table);
    }

    public function viewWhereOrdering($table, $data, $order, $ordering)
    {
        $this->db->where($data);
        $this->db->order_by($order, $ordering);
        return $this->db->get($table);
    }

    public function view_where($table, $data)
    {
        $this->db->where($data);
        return $this->db->get($table);
    }

    public function insert($data, $table)
    {
        $result = $this->db->insert($table, $data);
        return $result;
    }

    function update($where, $data, $table)
    {
        $this->db->where($where);
        return $this->db->update($table, $data);
    }

    function delete($where, $table)
    {
        $this->db->where($where);
        return $this->db->delete($table);
    }

    function truncate($table)
    {
        $this->db->truncate($table);
    }

    public function view_zakat($tgl_awal, $tgl_akhir)
    {
        return $this->db->query("SELECT
                                    mt.nama, mp.jumlah_dana
                                FROM
                                master_penyaluran mp
                                JOIN master_kategori_mustahik mkm ON mkm.id = mp.ansaf
                                JOIN master_type mt on mt.id = mp.type
                                WHERE mp.createdAt BETWEEN '$tgl_awal' AND '$tgl_akhir'
                                AND mp.is_approve = 2
                                AND mp.ansaf = 3
                                AND mt.id = 1
                                GROUP BY mt.id");
    }

    public function view_infaq($tgl_awal, $tgl_akhir)
    {
        return $this->db->query("SELECT
                                    mt.nama, mp.jumlah_dana
                                FROM
                                master_penyaluran mp
                                JOIN master_kategori_mustahik mkm ON mkm.id = mp.ansaf
                                JOIN master_type mt on mt.id = mp.type
                                WHERE mp.createdAt BETWEEN '$tgl_awal' AND '$tgl_akhir'
                                AND mp.is_approve = 2
                                AND mp.ansaf = 3
                                AND mt.id = 2
                                GROUP BY mt.id");
    }

    public function view_total_penerimaan($tgl_awal, $tgl_akhir)
    {
        return $this->db->query("SELECT
                                    SUM(mp.jumlah_dana) jumlah_dana
                                FROM
                                master_penyaluran mp
                                JOIN master_kategori_mustahik mkm ON mkm.id = mp.ansaf
                                JOIN master_type mt on mt.id = mp.type
                                WHERE mp.createdAt BETWEEN '$tgl_awal' AND '$tgl_akhir'
                                AND mp.is_approve = 2
                                AND mp.ansaf = 3");
    }
}
