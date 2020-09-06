<?php

class Model_lap_penyaluran extends CI_model
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

    public function view_laporan_penyaluran($periode_awal, $periode_akhir, $is_approve)
    {
        if(empty($is_approve)){
            $where_approve = "";
        }else{
            $where_approve = "AND mpe.is_approve = $is_approve";
        }
        return  $this->db->query("SELECT mpr.nama as program,
                                        msp.deskripsi,
                                        mty.nama jenis_data,
                                        mkm.nama asnaf,
                                        mpe.deskripsi,
                                        mpe.createdAt,
                                        mpe.is_approve,
                                        mpe.jumlah_dana
                                FROM master_penyaluran mpe
                                JOIN master_program mpr ON mpr.id =   mpe.id_program
                                JOIN master_sub_program msp ON msp.id_master_program = mpr.id
                                JOIN master_type mty ON mty.id = mpe.type
                                JOIN master_kategori_mustahik mkm ON mkm.id = mpe.ansaf
                                WHERE mpe.createdAt BETWEEN '$periode_awal' AND '$periode_akhir'
        ".$where_approve);
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
