<?php

class Model_rek_koran extends CI_model
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

    public function view_rek_koran($periode_awal, $periode_akhir, $muzaki)
    {
        if(empty($muzaki)){
            $where_muzaki = "";
        }else{
            $where_muzaki = "AND mm.npwp = $muzaki";
        }
        return  $this->db->query("SELECT DISTINCT
                                    mm.npwp,
                                    mm.nama,
                                    mm.alamat,
                                    mp.proptbpro provinsi
                                FROM
                                    master_zakat mz
                                JOIN master_muzakki mm ON mz.id_muzakki = mm.id
                                JOIN mapping_jenis_penerimaan mjp ON mz.jenis = mjp.id
                                JOIN master_provinsi mp ON mp.id = mm.provinsi
                                WHERE mz.id_muzakki = mm.id
                                    AND mz.tgl_terima BETWEEN '$periode_awal' AND '$periode_akhir'
        ".$where_muzaki);
    }

    public function view_laporan_rek_koran($periode_awal, $periode_akhir, $muzaki)
    {
        if(empty($muzaki)){
            $where_muzaki = "";
        }else{
            $where_muzaki = "AND mm.npwp = $muzaki";
        }
        return  $this->db->query("SELECT
                                    mm.npwp,
                                    mm.nama,
                                    mm.alamat,
                                    mp.proptbpro provinsi,
                                    mz.cara_terima via,
                                    mjp.nama jenis_penerimaan,
                                    mz.tgl_terima,
                                    mz.total_terima
                                FROM
                                    master_zakat mz
                                JOIN master_muzakki mm ON mz.id_muzakki = mm.id
                                JOIN mapping_jenis_penerimaan mjp ON mz.jenis = mjp.id
                                JOIN master_provinsi mp ON mp.id = mm.provinsi
                                WHERE mz.id_muzakki = mm.id
                                    AND mz.tgl_terima BETWEEN '$periode_awal' AND '$periode_akhir'
        ".$where_muzaki);
    }

    public function view_muzaki($muzaki)
    {
        return  $this->db->query("SELECT
                                    mm.npwp,
                                    mm.nama,
                                    mm.alamat,
                                    mp.proptbpro provinsi
                                FROM
                                master_muzakki mm
                                JOIN master_provinsi mp ON mm.provinsi = mp.id
                                WHERE mm.npwp = '$muzaki'
        ");
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
}
