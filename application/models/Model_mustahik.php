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
			return $this->db->query("SELECT * from master_mustahik where jenis_mustahik ='" . $jenis . "'");
		} else if ($jenis == null || $jenis == "") {
			return $this->db->query("SELECT * from master_mustahik where id ='" . $nama . "'");
		} else if ($nama != null || $nama != "" && $jenis != null || $jenis != "") {
			return $this->db->query("SELECT * from master_mustahik where id ='" . $nama . "' and jenis_mustahik = '" . $jenis . "'");
		} else {
			return $this->db->query("SELECT * from master_mustahik");
		}
	}

	public function getmustahik($table, $order, $ordering)
	{
		// $this->db->order_by($order, $ordering);
		return $this->db->query("SELECT a.*,b.nama as kat_mustahiks from $table a join master_kategori_mustahik b on a.kat_mustahik = b.id order by $order $ordering");
	}

	public function getprovinsi()
	{
		return $this->db->query("SELECT id, proptbpro from master_provinsi group by proptbpro order by proptbpro asc");
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

	function simpan_upload($judul, $image)
	{
		$data = array(
			'gambar' => $image
		);
		$result = $this->db->insert('tbpengawas', $data);
		return $result;
	}
}
