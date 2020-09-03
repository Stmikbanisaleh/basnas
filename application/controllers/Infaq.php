<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Infaq extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_infaq');
		if (empty($this->session->userdata('username')) && empty($this->session->userdata('nama'))) {
			$this->session->set_flashdata('category_error', 'Silahkan masukan username dan password');
			redirect('dashboard/login');
		}
	}

	function render_view($data)
	{
		$this->template->load('template', $data); //Display Page
	}

	public function index()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
			$mymuzakki = $this->model_infaq->viewOrdering('master_muzakki', 'nama', 'asc')->result_array();
			$data = array(
				'page_content' 	=> '/infaq/view',
				'ribbon' 		=> '<li class="active">Dashboard</li><li>Transaksi Infaq</li>',
				'page_name' 	=> 'Transaksi Infaq',
				'js' 			=> 'js_file',
				'mymuzakki'		=> $mymuzakki,
			);
			$this->render_view($data);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function shownorek()
	{
		$ps = array(
			'id_muzakki' => $this->input->post('ps')
		);
		$my_data = $this->model_infaq->view_where('master_rekening', $ps)->result_array();
		echo "<option value='0'>--Pilih  --</option>";
		foreach ($my_data as $value) {
			echo "<option value='" . $value['id'] . "'>[" . $value['namabank'] . '-' . $value['nokartu'] . "] </option>";
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
				'deskripsi'  => $this->input->post('deskripsi'),
				'norek'  => $this->input->post('norek'),
				'jenis'  => 3,
				'createdAt' => date('Y-m-d H:i:s'),
				'petugas'	=> $this->session->userdata('nip')
			);
			$result = $this->model_infaq->insert($data, 'master_zakat');
			echo json_decode($result);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function tampil_byid()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {

			$data = $this->input->post('id');
			$my_data = $this->model_infaq->viewData('master_zakat', $data)->result();
			echo json_encode($my_data);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function tampil()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
			$my_data = $this->model_infaq->viewOrderingZakat('master_muzakki', 'id', 'asc')->result_array();
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
				'deskripsi'  => $this->input->post('e_deskripsi'),
				'norek'  => $this->input->post('e_norek'),
				'updatedAt' => date('Y-m-d H:i:s'),
			);
			$result = $this->model_infaq->update($data_id, $data, 'master_zakat');
			echo json_decode($result);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function shownpwp()
	{
		$ps = array(
			'id' => $this->input->post('ps')
		);
		$my_data = $this->model_infaq->view_where('master_muzakki', $ps)->result_array();
		$npwz = $my_data[0]['npwp'];
		echo $npwz;
	}

	public function delete()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {

			$data_id = array(
				'id'  => $this->input->post('id')
			);

			$action = $this->model_infaq->delete($data_id, 'master_zakat');
			echo json_encode($action);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}
}
