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
                                    SUM(nominal_individu),
                                    SUM(nominal_lembaga)
                                FROM(
                                        SELECT
                                            mtl.column_a,
                                            mtl.column_b,
                                            (SELECT
                                                SUM(mz.total_terima)
                                            FROM
                                                master_zakat mz
                                                JOIN master_muzakki mm ON mm.id = mz.id_muzakki
                                                WHERE mz.tgl_terima BETWEEN '$tgl_awal' AND '$tgl_akhir'
                                                AND mz.jenis = mtl.column_b
                                                AND mm.jenis_muzakki = 'Individu') nominal_individu,
                                            (SELECT
                                                SUM(mz.total_terima)
                                            FROM
                                                master_zakat mz
                                                JOIN master_muzakki mm ON mm.id = mz.id_muzakki
                                                WHERE mz.tgl_terima BETWEEN '$tgl_awal' AND '$tgl_akhir'
                                                AND mz.jenis = mtl.column_b
                                                AND mm.jenis_muzakki = 'Lembaga') nominal_lembaga
                                        FROM
                                        mapping_table_header mth
                                        JOIN mapping_table_lines mtl ON mth.kd_mapping = mtl.kd_mapping_header
                                        WHERE mth.kd_mapping = 'LAP_PENGGALANGAN_MUZAKI'
                                ) q
                                GROUP BY q.column_a");
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
