<?php

class Model_rr_penyaluran_asnaf extends CI_model
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

    public function view_program($tgl_awal, $tgl_akhir)
    {
        return $this->db->query("SELECT mpe.type, mt.nama, sum(mpe.jumlah_dana) jumlah_dana
                                FROM
                                    master_type mt
                                JOIN master_penyaluran mpe ON mt.id = mpe.type
                                WHERE mpe.createdAt between  '$tgl_awal' AND '$tgl_akhir'
                                AND mpe.is_approve = 2
                                GROUP BY mpe.type
                                ORDER BY mpe.type");
    }

    public function view_type_infaq($tgl_awal, $tgl_akhir)
    {
        return $this->db->query("SELECT
                                    b.nama,
                                    SUM(a.Jumlah_dana) as total
                                from master_penyaluran a
                                join master_kategori_mustahik b on a.ansaf = b.id
                                WHERE a.createdAt BETWEEN '$tgl_awal' AND '$tgl_akhir'
                                AND a.is_approve = 2
                                    and a.type = 1
                                group by a.ansaf
                                ORDER BY a.ansaf");
    }

    public function view_by_ansaf($tgl_awal, $tgl_akhir, $type)
    {
        return $this->db->query("SELECT
                                    b.nama,
                                    SUM(a.Jumlah_dana) as total
                                from master_penyaluran a
                                join master_kategori_mustahik b on a.ansaf = b.id
                                WHERE a.createdAt BETWEEN '$tgl_awal' AND '$tgl_akhir'
                                AND a.is_approve = 2
                                    and a.type = $type
                                group by a.ansaf
                                ORDER BY a.ansaf");
    }
}
