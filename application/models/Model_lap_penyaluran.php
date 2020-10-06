<?php

class Model_lap_penyaluran extends CI_model
{
	public function getmasterprogram()
	{
		return $this->db->query("SELECT a.id, a.nama,sum(jumlah_dana_disetujui) as disetujui,sum(jumlah_dana) as direncanakan  from master_program a join master_penyaluran b on a.id = b.id_program_utama group by a.id");
	}

	public function getlaporanrencanarealisasiberdasarkanprogram($periode_awal, $periode_akhir, $is_approve, $id)
	{
		return $this->db->query("SELECT a.id, a.deskripsi,SUM(b.jumlah_dana) as direncanakan ,SUM(b.jumlah_dana_disetujui) as disetujui from master_sub_program a 
	   left join master_penyaluran b on a.id = b.id_program 
	   where b.createdAt BETWEEN '" . $periode_awal . "' and '" . $periode_akhir . "' 
	   AND b.id_program_utama = '$id'
	   AND b.is_approve ='$is_approve' GROUP BY b.id_program");
	}

	public function getlaporanrencanarealisasiberdasarkanasnaf($periode_awal, $periode_akhir, $is_approve, $id)
	{
		return $this->db->query("SELECT a.id, a.deskripsi,SUM(b.jumlah_dana) as direncanakan ,SUM(b.jumlah_dana_disetujui) as disetujui from master_sub_program a 
	   left join master_penyaluran b on a.id = b.id_program 
	   where b.createdAt BETWEEN '" . $periode_awal . "' and '" . $periode_akhir . "' 
	   AND b.id_program_utama = '$id'
	   AND b.is_approve ='$is_approve' GROUP BY b.id_program");
	}

	public function getfakirrencana($periode_awal, $periode_akhir)
	{
		return $this->db->query("SELECT count(a.id) as direncanakan,(SELECT count(a.id) from master_penyaluran a where a.createdAt between '".$periode_awal."' and '".$periode_akhir."' and is_approve = 2 and ansaf = 1 ) as disetujui
		 from master_penyaluran a where a.createdAt between '".$periode_awal."' and '".$periode_akhir."' and ansaf = 1  ");
	}

	public function getamilrencana($periode_awal, $periode_akhir)
	{
		return $this->db->query("SELECT count(a.id) as direncanakan,(SELECT count(a.id) from master_penyaluran a where a.createdAt between '".$periode_awal."' and '".$periode_akhir."' and is_approve = 2 and ansaf = 3 ) as disetujui
		 from master_penyaluran a where a.createdAt between '".$periode_awal."' and '".$periode_akhir."' and ansaf = 3  ");
	}

	public function master_kategori_mustahik()
	{
		return $this->db->query("SELECT count(b.id) as direncanakan,(SELECT count(id) from master_penyaluran where is_approve = 2) as disetujui  from master_kategori_mustahik a join master_penyaluran b on a.id = b.ansaf");
	}


}
