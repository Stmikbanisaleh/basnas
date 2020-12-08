<?php

class Model_penyaluranlangsung extends CI_model
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

	public function laporan_approval($table, $id)
    {
        return $this->db->query("SELECT p.id, p.deskripsi as deskripsi , CONCAT('Rp. ',FORMAT(p.jumlah_dana,2)) Nominal,q.nama as pj
        from $table p
        LEFT JOIN master_program m on p.id_program = m.id 
	 	LEFT JOIN master_sub_program n on m.id = n.id_master_program
		LEFT JOIN master_kategori_mustahik o on p.ansaf = o.id
		LEFT JOIN master_mustahik q on p.pic = q.id
		where p.id = $id");
		
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

		return $this->db->query("Select a.*,CONCAT('Rp. ',FORMAT(a.jumlah_dana,2)) Nominal, c.nama as ansaf, b.nama as type from master_penyaluran a join master_type b on a.type = b.id
		join master_kategori_mustahik c on a.ansaf = c.id where 1=1 $penyalur $status $tipe $jenis $periode");
	}
	
    public function viewWhereOrdering($table, $data, $order, $ordering)
    {
        $this->db->where($data);
        $this->db->order_by($order, $ordering);
        return $this->db->get($table);
	}
	
	public function viewWhereOrderingpenyalur($table, $order, $ordering)
    {
        return $this->db->query("SELECT a.*,b.nama as ansaf,c.nama as type ,CONCAT('Rp. ',FORMAT(a.jumlah_dana,2)) Nominal from $table a join master_kategori_mustahik b on a.ansaf = b.id
		join master_type c on a.type = c.id
        WHERE a.id_program is null
        order by $order $ordering ");
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
    public function trx_penyaluranlangsung()
    {
        return $this->db->query("SELECT p.id,kat.id as 'id_ansaf', kat.nama as 'kategori_mustahik',m.nama as 'mustahik',p.jumlah_dana, p.jumlah_dana_disetujui, p.deskripsi
        from master_penyaluran p
        LEFT JOIN master_kategori_mustahik kat on p.ansaf = kat.id
        LEFT JOIN master_mustahik m on kat.id = m.kat_mustahik");
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
