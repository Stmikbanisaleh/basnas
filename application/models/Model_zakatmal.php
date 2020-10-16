<?php

class Model_zakatmal extends CI_model
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

	public function viewData($table, $id){
		return $this->db->query("SELECT a.*, b.npwp,c.id as id_kartu from $table a join master_muzakki b on a.id_muzakki = b.id 
		join master_rekening c on a.id_muzakki = c.id_muzakki where a.id = $id ");
    }
    public function joinzakatmal()
    {
        return $this->db->query("SELECT a.id,m.nama,a.cara_terima,a.tgl_terima,rr.id_muzakki,rr.id as 'rek',rr.nokartu,rr.namabank, a.jenis, a.total_terima, a.deskripsi, a.petugas, c.id as 'jenis_zakat', c.nama as 'nama_jenis_zakat'
        FROM master_zakat a
        LEFT JOIN master_rekening rr on a.id_muzakki = rr.id_muzakki
        LEFT JOIN master_jenis_zakat c on a.jenis_zakat = c.id
        LEFT JOIN  master_muzakki m on m.id = rr.id_muzakki
        where a.jenis= 2");
	}
	
	public function viewOrderingZakat($table, $order, $ordering)
    {
        return $this->db->query("SELECT a.nama,b.*, CONCAT('Rp. ',FORMAT(b.total_terima,2)) Nominal from $table a join master_zakat b on a.id = b.id_muzakki where b.jenis = 2 order by $order $ordering");
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

    function simpan_upload($judul,$image){
        $data = array(
                'gambar' => $image
            );  
        $result= $this->db->insert('tbpengawas',$data);
        return $result;
    }
}
