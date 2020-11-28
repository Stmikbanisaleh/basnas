<?php

class Model_rr_penerimaan_manfaat_asnaf extends CI_model
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

    public function view_asnaf($tgl_awal, $tgl_akhir)
    {
        return $this->db->query("SELECT
                                    SUM((SELECT count(mm.nama)
                                            FROM list_mustahik lm
                                            JOIN master_mustahik mm ON mm.id = lm.id_mustahik
                                            WHERE lm.id_program = mp.id)) jumlah_mustahik, mkm.nama
                                FROM
                                master_penyaluran mp
                                JOIN master_kategori_mustahik mkm ON mkm.id = mp.ansaf
                                WHERE mp.createdAt BETWEEN '$tgl_awal' AND '$tgl_akhir'
                                AND mp.is_approve = 2
                                GROUP BY mp.ansaf");
    }

    public function view_sum_asnaf($tgl_awal, $tgl_akhir)
    {
        return $this->db->query("SELECT
                                    SUM((SELECT count(mm.nama)
                                            FROM list_mustahik lm
                                            JOIN master_mustahik mm ON mm.id = lm.id_mustahik
                                            WHERE lm.id_program = mp.id)) jumlah_mustahik
                                FROM
                                master_penyaluran mp
                                JOIN master_kategori_mustahik mkm ON mkm.id = mp.ansaf
                                AND mp.is_approve = 2
                                WHERE mp.createdAt BETWEEN '$tgl_awal' AND '$tgl_akhir'");
    }
}
