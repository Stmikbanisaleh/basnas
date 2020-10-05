<?php

class Model_approval extends CI_model
{
    public function view($table)
    {
        return $this->db->get($table);
    }

	public function viewWhereOrderingpenyalur($table, $order, $ordering)
    {
        return $this->db->query("SELECT a.*,b.nama as ansaf,c.nama as type ,CONCAT('Rp. ',FORMAT(a.jumlah_dana,2)) Nominal, CONCAT('Rp. ',FORMAT(a.jumlah_dana_disetujui,2)) Nominal2 from $table a join master_kategori_mustahik b on a.ansaf = b.id
		join master_type c on a.type = c.id order by $order $ordering ");
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

	public function viewOrderingZakat($table, $order, $ordering)
    {
        return $this->db->query("SELECT a.nama,b.*, CONCAT('Rp. ',FORMAT(b.total_terima,2)) Nominal from $table a join master_zakat b on a.id = b.id_muzakki where b.jenis = 1 order by $order $ordering");
	}
	
	public function viewData($table, $id){
		return $this->db->query("SELECT a.*, b.npwp,c.id as id_kartu from $table a join master_muzakki b on a.id_muzakki = b.id 
		join master_rekening c on a.id_muzakki = c.id_muzakki where a.id = $id ");
	}

    public function view_where($table, $data)
    {
        $this->db->where($data);
        return $this->db->get($table);
    }

    public function view_karyawan()
    {
        return  $this->db->query('select *,IF(a.status = 1, "Aktif", "Tidak") as statusv2,b.NAMAJABATAN as nmjabatan from tbpengawas a join msjabatan b on a.jabatan = b.ID
        ');
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

}
