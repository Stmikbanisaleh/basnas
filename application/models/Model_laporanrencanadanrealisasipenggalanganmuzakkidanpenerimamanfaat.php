<?php

class Model_laporanrencanadanrealisasipenggalanganmuzakkidanpenerimamanfaat extends CI_model
{
	public function getmasterprogram()
	{
		return $this->db->query("SELECT a.id, a.nama,sum(jumlah_dana_disetujui) as disetujui,sum(jumlah_dana) as direncanakan  from master_program a join master_penyaluran b on a.id = b.id_program_utama group by a.id");
	}

	public function laporanrencanadanrealisasipenggalanganmuzakkidanpenerimamanfaat($periode_awal, $periode_akhir, $is_approve, $id)
	{
		return $this->db->query("SELECT a.id, a.deskripsi,SUM(b.jumlah_dana) as direncanakan ,SUM(b.jumlah_dana_disetujui) as disetujui from master_sub_program a 
	   left join master_penyaluran b on a.id = b.id_program 
	   where b.createdAt BETWEEN '" . $periode_awal . "' and '" . $periode_akhir . "' 
	   AND b.id_program_utama = '$id'
	   AND b.is_approve ='$is_approve' GROUP BY b.id_program");
	}

	
}
