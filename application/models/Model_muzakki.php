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
