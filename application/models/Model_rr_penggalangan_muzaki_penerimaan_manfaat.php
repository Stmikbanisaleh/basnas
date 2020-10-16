<?php

class Model_rr_penggalangan_muzaki_penerimaan_manfaat extends CI_model
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

    public function view_penggalangan_muzaki($tgl_awal, $tgl_akhir)
    {
        return $this->db->query("SELECT
                                    q.column_a,
                                    SUM(nominal_individu) nominal_individu,
                                    SUM(nominal_lembaga) nominal_lembaga
                                FROM(
                                        SELECT
                                            mtl.column_a,
                                            mtl.column_b,
                                            (SELECT
                                            COUNT(mm.id)
                                            FROM
                                                master_zakat mz
                                                JOIN master_muzakki mm ON mm.id = mz.id_muzakki
                                                WHERE mz.tgl_terima BETWEEN '$tgl_awal' AND '$tgl_akhir'
                                                AND mz.jenis = mtl.column_b
                                                AND mm.jenis_muzakki = 'Individu'
                                                GROUP BY mm.id) nominal_individu,
                                            (SELECT
                                                COUNT(mm.id)
                                            FROM
                                                master_zakat mz
                                                JOIN master_muzakki mm ON mm.id = mz.id_muzakki
                                                WHERE mz.tgl_terima BETWEEN '$tgl_awal' AND '$tgl_akhir'
                                                AND mz.jenis = mtl.column_b
                                                AND mm.jenis_muzakki = 'Lembaga'
                                                GROUP BY mm.id) nominal_lembaga
                                        FROM
                                        mapping_table_header mth
                                        JOIN mapping_table_lines mtl ON mth.kd_mapping = mtl.kd_mapping_header
                                        WHERE mth.kd_mapping = 'LAP_PENGGALANGAN_MUZAKI'
                                ) q
                                GROUP BY q.column_a");
    }

    public function view_sum_penggalangan_muzaki($tgl_awal, $tgl_akhir)
    {
        return $this->db->query("SELECT
                                    q.column_a,
                                    SUM(nominal_individu) nominal_individu,
                                    SUM(nominal_lembaga) nominal_lembaga
                                FROM(
                                        SELECT
                                        mth.kd_mapping,
                                            mtl.column_a,
                                            mtl.column_b,
                                            (SELECT
                                            COUNT(mm.id)
                                            FROM
                                                master_zakat mz
                                                JOIN master_muzakki mm ON mm.id = mz.id_muzakki
                                                WHERE mz.tgl_terima BETWEEN '$tgl_awal' AND '$tgl_akhir'
                                                AND mz.jenis = mtl.column_b
                                                AND mm.jenis_muzakki = 'Individu'
                                                GROUP BY mm.id) nominal_individu,
                                            (SELECT
                                                COUNT(mm.id)
                                            FROM
                                                master_zakat mz
                                                JOIN master_muzakki mm ON mm.id = mz.id_muzakki
                                                WHERE mz.tgl_terima BETWEEN '$tgl_awal' AND '$tgl_akhir'
                                                AND mz.jenis = mtl.column_b
                                                AND mm.jenis_muzakki = 'Lembaga'
                                                GROUP BY mm.id) nominal_lembaga
                                        FROM
                                        mapping_table_header mth
                                        JOIN mapping_table_lines mtl ON mth.kd_mapping = mtl.kd_mapping_header
                                        WHERE mth.kd_mapping = 'LAP_PENGGALANGAN_MUZAKI'
                                ) q
                                GROUP BY q.kd_mapping");
    }

    public function view_bidang($tgl_awal, $tgl_akhir)
    {
        return $this->db->query("SELECT
                                    msp.bidang,
                                    (SELECT count(mm.nama)
                                        FROM list_mustahik lm
                                        JOIN master_mustahik mm ON mm.id = lm.id_mustahik
                                        WHERE lm.id_program = mp.id
                                        AND mm.jenis_mustahik = 'Individu') jml_mustahik_individu,
                                    (SELECT count(mm.nama)
                                        FROM list_mustahik lm
                                        JOIN master_mustahik mm ON mm.id = lm.id_mustahik
                                        WHERE lm.id_program = mp.id
                                        AND mm.jenis_mustahik = 'Lembaga') jml_mustahik_lembaga
                                FROM
                                master_penyaluran mp
                                JOIN master_sub_program msp ON msp.id = mp.id_program
                                WHERE mp.createdAt BETWEEN '$tgl_awal' AND '$tgl_akhir'
                                GROUP BY msp.bidang");
    }

    public function view_sum_bidang($tgl_awal, $tgl_akhir)
    {
        return $this->db->query("SELECT
                                    SUM((SELECT count(mm.nama)
                                        FROM list_mustahik lm
                                        JOIN master_mustahik mm ON mm.id = lm.id_mustahik
                                        WHERE lm.id_program = mp.id
                                        AND mm.jenis_mustahik = 'Individu')) jml_mustahik_individu,
                                    SUM((SELECT count(mm.nama)
                                        FROM list_mustahik lm
                                        JOIN master_mustahik mm ON mm.id = lm.id_mustahik
                                        WHERE lm.id_program = mp.id
                                        AND mm.jenis_mustahik = 'Lembaga')) jml_mustahik_lembaga
                                FROM
                                master_penyaluran mp
                                JOIN master_sub_program msp ON msp.id = mp.id_program
                                WHERE mp.createdAt BETWEEN '$tgl_awal' AND '$tgl_akhir'");
    }
}
