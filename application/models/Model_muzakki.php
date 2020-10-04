<?php

class Model_muzakki extends CI_model
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

	public function getmuzakki($jenis, $nama)
	{
		if ($nama == null || $nama == "") {
			return $this->db->query("SELECT * from master_muzakki where jenis_muzakki ='" . $jenis . "'");
		} else if ($jenis == null || $jenis == "") {
			return $this->db->query("SELECT * from master_muzakki where id ='" . $nama . "'");
		} else if ($nama != null || $nama != "" && $jenis != null || $jenis != "") {
			return $this->db->query("SELECT * from master_muzakki where id ='" . $nama . "' and jenis_muzakki = '" . $jenis . "'");
		} else {
			return $this->db->query("SELECT * from master_muzakki");
		}
	}

	public function joinmuzakki()
    {
        return $this->db->query("SELECT m.id, m.nama, m.npwp, m.no_identitas, m.tipe_identitas, m.tgl_reg, m.kewarganegaraan, m.foto, m.tmp_lhr, m.tgl_lhr, m.jenis_kelamin,m.jenis_muzakki, m.status_pernikahan,m.alamat, p.id as 'id_pekerjaan',p.nama as 'pekerjaan',pen.id as 'id_pendidikan', pen.nama as 'pendidikan', prov.id 'id_provinsi',prov.kotatbpro,prov.proptbpro as 'provinsi', m.kab_kota, m.desa_kelurahan, m.kode_pos, m.kecamatan,m.status_rumah,m.telp,m.fax,m.handphone,m.email,m.website
		from master_muzakki m
		JOIN master_pekerjaan p on p.id = m.pekerjaan
		JOIN master_pendidikan pen on pen.id = m.status_pendidikan
		JOIN master_provinsi prov on prov.id = m.provinsi
        where m.isdeleted != 1
        ORDER by m.id desc ");
	}
	
	public function view_where_join($table, $data)
	{
		return $this->db->query("Select a.*, b.nama from $table a join master_muzakki b on a.id_muzakki = b.id where id_muzakki = $data");
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
