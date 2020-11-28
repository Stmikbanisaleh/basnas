<?php

class Model_pp_zakat_kabupaten_kota extends CI_model
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

    public function view_sum_zakat_maal($tgl_awal, $tgl_akhir)
    {
        return $this->db->query("SELECT
                                    SUM(mz.total_terima) total_terima
                                FROM
                                master_zakat mz
                                WHERE mz.tgl_terima BETWEEN '$tgl_awal' AND '$tgl_akhir'
                                AND mz.jenis = 2");
    }

    public function view_sum_zakat_fitrah($tgl_awal, $tgl_akhir)
    {
        return $this->db->query("SELECT
                                    SUM(mz.total_terima) total_terima
                                FROM
                                master_zakat mz
                                WHERE mz.tgl_terima BETWEEN '$tgl_awal' AND '$tgl_akhir'
                                AND mz.jenis = 1");
    }

    public function view_sum_infaq($tgl_awal, $tgl_akhir)
    {
        return $this->db->query("SELECT
                                    SUM(mz.total_terima) total_terima
                                FROM
                                master_zakat mz
                                WHERE mz.tgl_terima BETWEEN '$tgl_awal' AND '$tgl_akhir'
                                AND mz.jenis = 3");
    }

    public function view_sum_data_muzaki($tgl_awal, $tgl_akhir)
    {
        return $this->db->query("SELECT a.jumlah_muzaki_perorangan, b.jumlah_muzaki_lembaga FROM
                                (
                                    SELECT
                                        COUNT(mz.id) jumlah_muzaki_perorangan
                                    FROM
                                    master_zakat mz
                                    JOIN master_muzakki mm ON mm.id = mz.id_muzakki
                                    WHERE mz.tgl_terima BETWEEN '$tgl_awal' AND '$tgl_akhir'
                                    AND mm.jenis_muzakki = 'Individu'
                                ) a, 
                                (
                                    SELECT
                                        COUNT(mz.id) jumlah_muzaki_lembaga
                                    FROM
                                    master_zakat mz
                                    JOIN master_muzakki mm ON mm.id = mz.id_muzakki
                                    WHERE mz.tgl_terima BETWEEN '$tgl_awal' AND '$tgl_akhir'
                                    AND mm.jenis_muzakki = 'Lembaga'
                                ) b");
    }

    public function view_sum_bidang($tgl_awal, $tgl_akhir)
    {
        return $this->db->query("SELECT
                                    mp.id, msp.bidang, SUM(mp.jumlah_dana) jumlah_dana
                                FROM
                                master_penyaluran mp
                                JOIN master_sub_program msp ON msp.id = mp.id_program
                                WHERE mp.createdAt BETWEEN '$tgl_awal' AND '$tgl_akhir'
                                AND mp.is_approve = 2
                                GROUP BY msp.bidang");
    }

    public function view_sum_asnaf($tgl_awal, $tgl_akhir)
    {
        return $this->db->query("SELECT
                                mp.id, SUM(mp.jumlah_dana) jumlah_dana, mkm.nama
                                FROM
                                master_penyaluran mp
                                JOIN master_kategori_mustahik mkm ON mkm.id = mp.ansaf
                                WHERE mp.createdAt BETWEEN '$tgl_awal' AND '$tgl_akhir'
                                AND mp.is_approve = 2
                                GROUP BY mp.ansaf");
    }
}
