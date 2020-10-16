<?php

class Model_lap_penerimaan extends CI_model
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

    public function view_laporan_penerimaan($periode_awal, $periode_akhir, $jenis_penerimaan)
    {
        if(empty($jenis_penerimaan)){
            $where_jenis = "";
        }else{
            $where_jenis = "AND mz.jenis = $jenis_penerimaan";
        }
        return  $this->db->query("SELECT
                                    mm.npwp,
                                    mm.nama,
                                    mz.cara_terima via,
                                    mjp.nama jenis_penerimaan,
                                    mz.tgl_terima,
                                    mz.total_terima
                                FROM
                                    master_zakat mz
                                JOIN master_muzakki mm ON mz.id_muzakki = mm.id
                                JOIN mapping_jenis_penerimaan mjp ON mz.jenis = mjp.id
                                WHERE mz.id_muzakki = mm.id
                                    AND mz.tgl_terima BETWEEN '$periode_awal' AND '$periode_akhir'
        ".$where_jenis);
    }

    public function view_count($table, $data_id)
    {
        return $this->db->query('select IdGuru from ' . $table . ' where IdGuru = ' . $data_id . ' and isdeleted != 1')->num_rows();
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

    function simpan_upload($judul,$image){
        $data = array(
                'gambar' => $image
            );  
        $result= $this->db->insert('tbpengawas',$data);
        return $result;
    }
}
