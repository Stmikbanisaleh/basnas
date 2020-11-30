<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lap_penerimaan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_lap_penerimaan');
		$this->load->library('mainfunction');
	}

	function render_view($data)
	{
		$this->template->load('template', $data); //Display Page
	}

	public function index()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
			$myjabatan = $this->model_lap_penerimaan->viewOrdering('users', 'ID', 'asc')->result_array();
			$data = array(
				'page_content' 	=> '/lap_penerimaan/view',
				'ribbon' 		=> '<li class="active">Dashboard</li><li>Laporan Penerimaan</li>',
				'page_name' 	=> 'Laporan Penerimaan',
				'js' 			=> 'js_file',
				'myjabatan'		=> $myjabatan,
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
			$mymuzaki = $this->model_lap_penerimaan->viewOrdering('users', 'ID', 'asc')->result_array();
			$mydata = $this->model_lap_penerimaan->view_laporan_penerimaan($this->input->post('periode_awal'), $this->input->post('periode_akhir'), $this->input->post('jenis_penerimaan'))->result_array();
			$data = array(
				'mydata' => $mydata
			);
			

			$this->pdf->setPaper('FOLIO', 'potrait');
			$this->pdf->load_view('page/lap_penerimaan/laporan_pdf', $data);
			$this->pdf->stream("Slip Gaji " . $tgl . ".pdf", array("Attachment" => true));

		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}
}
