<?php

class Model_mustahik extends CI_model
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

	public function getmustahiks($jenis, $nama)
	{
		if ($nama == null || $nama == "") {
			return $this->db->query("SELECT a.*, b.nama as kat_mustahiks from master_mustahik a  join master_kategori_mustahik b on a.kat_mustahik = b.id where a.jenis_mustahik ='" . $jenis . " '");
		} else if ($jenis == null || $jenis == "") {
			return $this->db->query("SELECT a.*, b.nama as kat_mustahiks from master_mustahik a  join master_kategori_mustahik b on a.kat_mustahik = b.id where a.id ='" . $nama . " '");
		} else if ($nama != null || $nama != "" && $jenis != null || $jenis != "") {
			return $this->db->query("SELECT a.*, b.nama as kat_mustahiks from master_mustahik a  join master_kategori_mustahik b on a.kat_mustahik = b.id where id ='" . $nama . "' and jenis_mustahik = '" . $jenis . "'");
		} else {
			return $this->db->query("SELECT a.*, b.nama as kat_mustahiks from master_mustahik a  join master_kategori_mustahik b on a.kat_mustahik = b.id");
		}
	}

	public function getmustahik($table, $order, $ordering)
	{
		return $this->db->query("SELECT a.*,b.nama as kat_mustahiks from $table a join master_kategori_mustahik b on a.kat_mustahik = b.id order by $order $ordering");
	}
	public function joinmustahik()
    {
        return $this->db->query("SELECT mm.id, mm.nama, mm.pendapatan,mm.jenis_mustahik, mm.npwp, mm.tipe_identitas, kat.id as 'id_mustahik', kat.nama as 'kat_mustahik', mm.no_identitas, mm.tgl_reg, mm.kewarganegaraan, foto, mm.tmp_lhr,mm.tgl_lhr,mm.jenis_kelamin, mm.jenis_mustahik, p.id as 'id_pekerjaan',p.nama 'pekerjaan', mm.status_pernikahan, pen.id as 'id_pendidikan', pen.nama as 'pendidikan', mm.alamat, pro.id as 'id_provinsi', pro.proptbpro as 'provinsi', mm.kab_kota, mm.desa_kelurahan, mm.kode_pos, j.id as 'id_jenisusaha', j.nama as 'jenis_usaha', mm.kecamatan, mm.status_rumah,mm.telp, mm.fax, mm.handphone, mm.email, mm.website
		from master_mustahik mm
		LEFT JOIN master_kategori_mustahik kat on kat.id = mm.kat_mustahik
		LEFT JOIN master_pekerjaan p on p.id = mm.pekerjaan
		LEFT JOIN master_pendidikan pen on pen.id = mm.status_pendidikan
		LEFT JOIN master_provinsi pro on pro.id = mm.provinsi
		LEFT JOIN master_jenis_usaha j on j.id = mm.jenis_usaha
		where mm.isdeleted != 1
		ORDER BY mm.id desc");
	}

	public function getprovinsi()
	{
		return $this->db->query("SELECT id,name FROM provinces ORDER BY name");
	}

	public function getprovinsiById($id)
	{
		return $this->db->query("SELECT id,name FROM provinces where id = $id ORDER BY name");
	}

	public function getkota($id)
	{
		return $this->db->query("SELECT id,name FROM regencies WHERE province_id ='$id' ORDER BY name");
	}

	public function getkec($id)
	{
		return $this->db->query("SELECT id,name FROM districts WHERE regency_id ='$id' ORDER BY name");
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
	public function view_where_noisdelete($data, $table)
    {
        $this->db->where($data);
        return $this->db->get($table);
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

	function simpan_upload($judul, $image)
	{
		$data = array(
			'gambar' => $image
		);
		$result = $this->db->insert('tbpengawas', $data);
		return $result;
	}

	// public function getprovinsi()
	// {
	// 	return $this->db->query("SELECT kode,nama FROM wilayah_2020 WHERE CHAR_LENGTH(kode)=2 ORDER BY nama");
	// }

	// public function getkota($id)
	// {
	// 	return $this->db->query("SELECT kode,nama FROM wilayah_2020 WHERE LEFT(kode,'2')='$id' AND CHAR_LENGTH(kode)=5 ORDER BY nama");
	// }

	// public function getkecamatan()
	// {
	// 	return $this->db->query("SELECT kode,nama FROM wilayah_2020 WHERE LEFT(kode,'5')='32.03' AND CHAR_LENGTH(kode)=8 ORDER BY nama");
	// }
}
