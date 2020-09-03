<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Zakatfitrah extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_zakatfitrah');
		if (empty($this->session->userdata('username')) && empty($this->session->userdata('nama'))) {
			$this->session->set_flashdata('category_error', 'Silahkan masukan username dan password');
			redirect('dashboard/login');
		}
	}

	function render_view($data)
	{
		$this->template->load('template', $data); //Display Page
	}

	public function shownpwp()
	{
		$ps = array(
			'id' => $this->input->post('ps')
		);
		$my_data = $this->model_zakatfitrah->view_where('master_muzakki', $ps)->result_array();
		$npwz = $my_data[0]['npwp'];
		echo $npwz;
	}

	public function index()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
			$mymuzakki = $this->model_zakatfitrah->viewOrdering('master_muzakki', 'nama', 'asc')->result_array();
			$data = array(
				'page_content' 	=> '/zakatfitrah/view',
				'ribbon' 		=> '<li class="active">Dashboard</li><li>Transaksi Zakat Fitrah</li>',
				'page_name' 	=> 'Transaksi Zakat Fitrah',
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
		$my_data = $this->model_zakatfitrah->view_where('master_rekening', $ps)->result_array();
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
				'createdAt' => date('Y-m-d H:i:s'),
				'petugas'	=> $this->session->userdata('nip')
			);
			$result = $this->model_zakatfitrah->insert($data, 'master_zakatfitrah');
			echo json_decode($result);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function tampil_byid()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
			$data = $this->input->post('id');
			$my_data = $this->model_zakatfitrah->viewData('master_zakatfitrah', $data)->result();
			echo json_encode($my_data);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function tampil()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {

			$my_data = $this->model_zakatfitrah->viewOrderingZakat('master_muzakki', 'id', 'asc')->result_array();
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
			$result = $this->model_zakatfitrah->update($data_id, $data, 'master_zakatfitrah');
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

			$action = $this->model_zakatfitrah->delete($data_id, 'master_zakatfitrah');
			echo json_encode($action);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}
}
