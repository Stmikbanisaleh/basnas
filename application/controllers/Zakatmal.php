<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Zakatmal extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_zakatmal');
		if (empty($this->session->userdata('username')) && empty($this->session->userdata('nama'))) {
			$this->session->set_flashdata('category_error', 'Silahkan masukan username dan password');
			redirect('dashboard/login');
		}
	}

	function render_view($data)
	{
		$this->template->load('template', $data); //Display Page
	}

	public function shownorek()
	{
		$ps = array(
			'id_muzakki' => $this->input->post('ps')
		);
		$my_data = $this->model_zakatmal->view_where('master_rekening', $ps)->result_array();
		echo "<option value='0'>--Pilih  --</option>";
		foreach ($my_data as $value) {
			echo "<option value='" . $value['id'] . "'>[" . $value['namabank'] . '-' . $value['nokartu'] . "] </option>";
		}
	}

	public function shownpwp()
	{
		$ps = array(
			'id' => $this->input->post('ps')
		);
		$my_data = $this->model_zakatmal->view_where('master_muzakki', $ps)->result_array();
		$npwz = $my_data[0]['npwp'];
		echo $npwz;
	}

	public function index()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
			$mymuzakki = $this->model_zakatmal->viewOrdering('master_muzakki', 'nama', 'asc')->result_array();
			$myjeniszakat = $this->model_zakatmal->viewOrdering('master_jenis_zakat', 'nama', 'asc')->result_array();
			$data = array(
				'page_content' 	=> '/zakatmal/view',
				'ribbon' 		=> '<li class="active">Dashboard</li><li>Transaksi Zakat Maal</li>',
				'page_name' 	=> 'Transaksi Zakat Maal',
				'js' 			=> 'js_file',
				'mymuzakki'		=> $mymuzakki,
				'myjeniszakat'	=> $myjeniszakat
			);
			$this->render_view($data);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function simpan()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
			$data = array(
				'id_muzakki'  => $this->input->post('nama'),
				'cara_terima'  => $this->input->post('penerimaan'),
				'tgl_terima'  => $this->input->post('tanggal'),
				'total_terima'  => $this->input->post('total_v'),
				'jenis_zakat'  => $this->input->post('jeniszakat'),
				'jenis'  => 2,
				'norek'  => $this->input->post('norek'),
				'createdAt' => date('Y-m-d H:i:s'),
				'petugas'	=> $this->session->userdata('nip')
			);
			$result = $this->model_zakatmal->insert($data, 'master_zakat');
			echo json_decode($result);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function tampil_byid()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
			$id  = $this->input->post('id');
			$my_data = $this->model_zakatmal->viewData('master_zakat', $id)->result();
			echo json_encode($my_data);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function tampil()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
			$my_data = $this->model_zakatmal->viewOrderingZakat('master_muzakki', 'id', 'asc')->result_array();
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
				'id_muzakki'  => $this->input->post('e_nama'),
				'cara_terima'  => $this->input->post('e_penerimaan'),
				'tgl_terima'  => $this->input->post('e_tanggal'),
				'total_terima'  => $this->input->post('e_total_v'),
				'jenis_zakat'  => $this->input->post('e_jeniszakat'),
				'norek'  => $this->input->post('e_norek'),
				'updatedAt' => date('Y-m-d H:i:s'),
			);
			$result = $this->model_zakatmal->update($data_id, $data, 'master_zakat');
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
	
			$action = $this->model_zakatmal->delete($data_id, 'master_zakat');
			echo json_encode($action);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}
}
