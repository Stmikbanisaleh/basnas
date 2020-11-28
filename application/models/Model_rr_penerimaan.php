<?php

class Model_rr_penerimaan extends CI_model
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

    public function view_zakat_mall_individu($tgl_awal, $tgl_akhir)
    {
        return $this->db->query("SELECT
                                    SUM(mz.total_terima) total_terima
                                FROM
                                master_zakat mz
                                JOIN master_muzakki mm ON mm.id = mz.id_muzakki
                                WHERE mz.tgl_terima BETWEEN '$tgl_awal' AND '$tgl_akhir'
                                AND mm.jenis_muzakki = 'Individu'
                                AND mz.jenis = 2");
    }

    public function view_zakat_mall_badan($tgl_awal, $tgl_akhir)
    {
        return $this->db->query("SELECT
                                    SUM(mz.total_terima) total_terima
                                FROM
                                master_zakat mz
                                JOIN master_muzakki mm ON mm.id = mz.id_muzakki
                                WHERE mz.tgl_terima BETWEEN '$tgl_awal' AND '$tgl_akhir'
                                AND mm.jenis_muzakki = 'Lembaga'
                                AND mz.jenis = 2");
    }

    public function view_zakat_fitrah($tgl_awal, $tgl_akhir)
    {
        return $this->db->query("SELECT
                                    SUM(mz.total_terima) total_terima
                                FROM
                                master_zakat mz
                                JOIN master_muzakki mm ON mm.id = mz.id_muzakki
                                WHERE mz.tgl_terima BETWEEN '$tgl_awal' AND '$tgl_akhir'
                                AND mz.jenis = 1");
    }

    public function view_infaq_individu($tgl_awal, $tgl_akhir)
    {
        return $this->db->query("SELECT
                                    SUM(mz.total_terima) total_terima
                                FROM
                                master_zakat mz
                                JOIN master_muzakki mm ON mm.id = mz.id_muzakki
                                WHERE mz.tgl_terima BETWEEN '$tgl_awal' AND '$tgl_akhir'
                                AND mm.jenis_muzakki = 'Individu'
                                AND mz.jenis = 3");
    }

    public function view_infaq_badan($tgl_awal, $tgl_akhir)
    {
        return $this->db->query("SELECT
                                    SUM(mz.total_terima) total_terima
                                FROM
                                master_zakat mz
                                JOIN master_muzakki mm ON mm.id = mz.id_muzakki
                                WHERE mz.tgl_terima BETWEEN '$tgl_awal' AND '$tgl_akhir'
                                AND mm.jenis_muzakki = 'Lembaga'
                                AND mz.jenis = 3");
    }

    public function view_sum_zakat($tgl_awal, $tgl_akhir)
    {
        return $this->db->query("SELECT
                                    SUM(mz.total_terima) total_terima
                                FROM
                                master_zakat mz
                                JOIN master_muzakki mm ON mm.id = mz.id_muzakki
                                WHERE mz.tgl_terima BETWEEN '$tgl_awal' AND '$tgl_akhir'
                                AND mz.jenis IN (1,2)");
    }

    public function view_sum_infaq($tgl_awal, $tgl_akhir)
    {
        return $this->db->query("SELECT
                                    SUM(mz.total_terima) total_terima
                                FROM
                                master_zakat mz
                                JOIN master_muzakki mm ON mm.id = mz.id_muzakki
                                WHERE mz.tgl_terima BETWEEN '$tgl_awal' AND '$tgl_akhir'
                                AND mz.jenis = 3");
    }

    public function view_program($tgl_awal, $tgl_akhir)
    {
        return $this->db->query("SELECT mp.id, mp.nama, sum(mpe.jumlah_dana) jumlah_dana
                                FROM
                                master_program mp
                                JOIN master_penyaluran mpe ON mp.id = mpe.id_program_utama
                                WHERE mpe.createdAt BETWEEN '$tgl_awal' AND '$tgl_akhir'
                                GROUP BY
                                mp.id, mp.nama");
    }

    public function view_sub_program($tgl_awal, $tgl_akhir, $id_program)
    {
        return $this->db->query("SELECT msp.deskripsi, sum(mpe.jumlah_dana) jumlah_dana
                                FROM
                                    master_sub_program msp
                                JOIN master_penyaluran mpe ON msp.id = mpe.id_program
                                WHERE mpe.createdAt BETWEEN '$tgl_awal' AND '$tgl_akhir'
                                    AND mpe.id_program_utama = $id_program
                                GROUP BY msp.id, msp.deskripsi
                                ORDER BY msp.deskripsi");
    }
}
