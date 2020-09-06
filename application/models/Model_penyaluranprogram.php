<?php

class Model_penyaluranprogram extends CI_model
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

	public function getpenyaluran($penyalur, $status, $tipe, $jenis, $periode_awal, $periode_akhir)
    {
		if($penyalur != null || $penyalur !=""){
			$penyalur = "and type = $penyalur";
		} else {
			$penyalur = "";
		}
		if($status != null || $status != ""){
			$status = "and is_approve = $status";
		} else {
			$status = "";
		}
		if($tipe != null || $tipe != ""){
			$tipe = "and ansaf = $tipe";
		} else {
			$tipe = "";
		} 
		if ($jenis != null || $jenis != ""){
			$jenis = "and type = $jenis";
		} else {
			$jenis = "";
		}
		if($periode_awal !=null || $periode_awal != ""){
			$periode = "and a.createdAt between '".$periode_awal."'  and '".$periode_akhir."'";
		} else {
			$periode = "";
		}

		return $this->db->query("Select d.deskripsi as program,a.*,CONCAT('Rp. ',FORMAT(a.jumlah_dana,2)) Nominal, c.nama as ansaf, b.nama as type from master_penyaluran a join master_type b on a.type = b.id
		join master_kategori_mustahik c on a.ansaf = c.id
		join  master_sub_program d on a.id_program = d.id where 1=1 $penyalur $status $tipe $jenis $periode");
	}
	
    public function viewWhereOrdering($table, $data, $order, $ordering)
    {
        $this->db->where($data);
        $this->db->order_by($order, $ordering);
        return $this->db->get($table);
	}
	
	public function viewWhereOrderingpenyalur($table, $order, $ordering)
    {
        return $this->db->query("SELECT d.deskripsi as program, a.*,b.nama as ansaf,c.nama as type ,CONCAT('Rp. ',FORMAT(a.jumlah_dana,2)) Nominal from $table a join master_kategori_mustahik b on a.ansaf = b.id
		join master_type c on a.type = c.id
		join  master_sub_program d on a.id_program = d.id where id_program IS NOT NULL order by $order $ordering ");
    }

	public function cek($nama, $idprogram)
    {
        return $this->db->query("SELECT * from list_mustahik where id_program = $idprogram and id_mustahik = $nama")->num_rows();
	}
	
    public function view_where($table, $data)
    {
        $this->db->where($data);
        return $this->db->get($table);
	}
	
	public function view_where2($table, $data)
    {
        return $this->db->query("SELECT a.*,b.nama,b.alamat,b.jenis_mustahik from $table a join master_mustahik b on a.id_mustahik = b.id where id_program = $data ");
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
