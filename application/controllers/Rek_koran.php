<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rek_koran extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_rek_koran');
		$this->load->library('mainfunction');
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
			$mymuzaki = $this->model_rek_koran->viewOrdering('master_muzakki', 'ID', 'asc')->result_array();
			$data = array(
				'page_content' 	=> '/rek_koran/view',
				'ribbon' 		=> '<li class="active">Dashboard</li><li>Laporan Rekening Koran</li>',
				'page_name' 	=> 'Rekening Koran',
				'js' 			=> 'js_file',
				'mymuzaki'		=> $mymuzaki,
			);
			$this->render_view($data);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function laporan()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
			$tgl = $this->mainfunction->tgl_indo(date('Y-m-d'));
			$this->load->library('pdf');

			$mydata = $this->model_rek_koran->view_rek_koran($this->input->get('periode_awal'), $this->input->get('periode_akhir'), $this->input->get('muzaki'))->result_array();

			$mymuzaki = $this->model_rek_koran->view_muzaki($this->input->get('muzaki'))->row();

			$data = array(
				'mydata' => $mydata,
				'mymuzaki' => $mymuzaki
			);

			$this->pdf->setPaper('FOLIO', 'potrait');
			$this->pdf->load_view('page/rek_koran/laporan_pdf', $data);
			$this->pdf->stream("Slip Gaji " . $tgl . ".pdf", array("Attachment" => true));

		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function tampil_byid()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {

			echo json_encode($this->input->post());exit;

			$data = array(
				'id_pengawas'  => $this->input->post('id'),
			);
			$my_data = $this->model_karyawan->view_where('tbpengawas', $data)->result();
			echo json_encode($my_data);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function tampil()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {

			$my_data = $this->model_rek_koran->view_rek_koran($this->input->post('periode_awal'), $this->input->post('periode_akhir'), $this->input->post('muzaki'))->result_array();
			echo json_encode($my_data);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}
	
}
