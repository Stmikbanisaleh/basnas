<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penyaluranprogram extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_penyaluranprogram');
		if (empty($this->session->userdata('username')) && empty($this->session->userdata('nama'))) {
			$this->session->set_flashdata('category_error', 'Silahkan masukan username dan password');
			redirect('dashboard/login');
		}
	}

	function render_view($data)
	{
		$this->template->load('template', $data); //Display Page
	}

	public function search()
	{
		$penyalur = $this->input->post('penyalur');
		$status = $this->input->post('status');
		$tipe = $this->input->post('tipe');
		$jenis = $this->input->post('jenis');
		$periode_awal = $this->input->post('periode_awal');
		$periode_akhir = $this->input->post('periode_akhir');
		$result = $this->model_penyaluranprogram->getpenyaluran($penyalur, $status, $tipe, $jenis, $periode_awal, $periode_akhir)->result();
		echo json_encode($result);
	}

	public function index()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
			$mykategorimustahik = $this->model_penyaluranprogram->viewOrdering('master_kategori_mustahik', 'nama', 'asc')->result_array();
			$mysubprogram = $this->model_penyaluranprogram->viewOrdering('master_sub_program', 'deskripsi', 'asc')->result_array();
			$mytype = $this->model_penyaluranprogram->viewOrdering('master_type', 'nama', 'asc')->result_array();
			$myprogram = $this->model_penyaluranprogram->viewOrdering('master_program', 'nama', 'asc')->result_array();
			$mymustahik = $this->model_penyaluranprogram->viewOrdering('master_mustahik', 'nama', 'asc')->result_array();
			$data = array(
				'page_content' 	=> '/penyaluranprogram/view',
				'ribbon' 		=> '<li class="active">Dashboard</li><li>Penyaluran Program</li>',
				'page_name' 	=> 'Penyaluran Program',
				'js' 			=> 'js_file',
				'mykategorimustahik'		=> $mykategorimustahik,
				'myprogram'		=> $myprogram,
				'mytype'		=> $mytype,
				'mysubprogram'		=> $mysubprogram,
				'mymustahik'	=> $mymustahik
			);
			$this->render_view($data);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function showsubprogram()
	{
		$ps = array(
			'id_master_program' => $this->input->post('ps')
		);
		$my_data = $this->model_penyaluranprogram->view_where('master_sub_program', $ps)->result_array();
		echo "<option value='0'>-- Pilih --</option>";
		foreach ($my_data as $value) {
			echo "<option value='" . $value['id'] . "'>[" . $value['deskripsi']. "] </option>";
		}
	}

	public function showsubprogram2()
	{
		$ps = array(
			'id' => $this->input->post('ps')
		);
		$my_data = $this->model_penyaluranprogram->view_where('master_sub_program', $ps)->result_array();
		echo "<option value='0'>-- Pilih --</option>";
		foreach ($my_data as $value) {
			echo "<option value='" . $value['id'] . "'>[" . $value['deskripsi']. "] </option>";
		}
	}

	public function simpan()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
			$data = array(
				'createdAt'  => $this->input->post('tanggal2'),
				'jumlah_dana'  => $this->input->post('total_v'),
				'id_program'  => $this->input->post('programs'),
				'id_program_utama'  => $this->input->post('programu'),
				'ansaf'  => $this->input->post('tipe2'),
				'type'  => $this->input->post('jenis2'),
				'deskripsi' => $this->input->post('deskripsi'),
				'petugas'	=> $this->session->userdata('nip')
			);
			$result = $this->model_penyaluranprogram->insert($data, 'master_penyaluran');
			echo json_decode($result);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function simpan2()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
			$data = array(
				'createdAt' => date('Y-m-d H:i:s'),
				'id_program'  => $this->input->post('e_id2'),
				'id_mustahik'  => $this->input->post('nama3'),
			);
			$cek = $this->model_penyaluranprogram->cek($this->input->post('nama3'), $this->input->post('e_id2'));
			if($cek == 0){
				$result = $this->model_penyaluranprogram->insert($data, 'list_mustahik');
				echo json_decode($result);
			} else {
				echo 401;
			}
	
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function tampil_byid()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {

			$data = array(
				'id'  => $this->input->post('id'),
			);
			$my_data = $this->model_penyaluranprogram->view_where('master_penyaluran', $data)->result();
			echo json_encode($my_data);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function tampil_byidprogram()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
			$data = $this->input->post('id');
			$my_data = $this->model_penyaluranprogram->view_where2('list_mustahik', $data)->result();
			echo json_encode($my_data);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function tampil_byidprogram2()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
			$data = array(
				'id'  => $this->input->post('id'),
			);
			$my_data = $this->model_penyaluranprogram->view_where('master_penyaluran', $data)->result();
			echo json_encode($my_data);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function tampil()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {

			$my_data = $this->model_penyaluranprogram->viewWhereOrderingpenyalur('master_penyaluran', 'id', 'asc')->result_array();
			echo json_encode($my_data);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function update()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {

			$data_id = array(
				'id'  => $this->input->post('e_id')
			);

			$data = array(
				'createdAt'  => $this->input->post('e_tanggal2'),
				'jumlah_dana'  => $this->input->post('e_total_v'),
				'id_program_utama'  => $this->input->post('e_programu'),
				'ansaf'  => $this->input->post('e_tipe2'),
				'id_program'  => $this->input->post('e_programs'),
				'type'  => $this->input->post('e_jenis2'),
				'deskripsi' => $this->input->post('e_deskripsi'),
			);

			$result = $this->model_penyaluranprogram->update($data_id, $data, 'master_penyaluran');
			echo json_decode($result);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function delete()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {

			$data_id = array(
				'id'  => $this->input->post('id')
			);
			$action = $this->model_penyaluranprogram->delete($data_id, 'master_penyaluran');
			echo json_encode($action);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function delete2()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {

			$data_id = array(
				'id'  => $this->input->post('id')
			);
			$action = $this->model_penyaluranprogram->delete($data_id, 'list_mustahik');
			echo json_encode($action);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}
}
