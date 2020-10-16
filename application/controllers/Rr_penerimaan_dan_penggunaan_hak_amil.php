<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rr_penerimaan_dan_penggunaan_hak_amil extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_rr_penerimaan_dan_penggunaan_hak_amil');
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
			$myprogram = $this->model_rr_penerimaan_dan_penggunaan_hak_amil->viewOrdering('master_sub_program', 'id', 'asc')->result_array();
			$data = array(
				'page_content' 	=> '/rr_penerimaan_dan_penggunaan_hak_amil/view',
				'ribbon' 		=> '<li class="active">Dashboard</li><li>Laporan</li><li>Laporan Rencana dan Realisasi Penerimaan dan Penggunaan Hak Amil</li>',
				'page_name' 	=> 'Laporan Rencana dan Realisasi Penerimaan dan Penggunaan Hak Amil',
				'js' 			=> 'js_file',
				'myprogram'		=> $myprogram,
			);
			$this->render_view($data);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
    }

    public function laporan()
	{
        if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
			$post_tgl_awal = $this->input->post('periode_awal');
			$post_tgl_akhir = $this->input->post('periode_akhir');
			$myzakat = $this->model_rr_penerimaan_dan_penggunaan_hak_amil->view_zakat($post_tgl_akhir, $post_tgl_akhir)->result_array();
			$myinfaq = $this->model_rr_penerimaan_dan_penggunaan_hak_amil->view_infaq($post_tgl_akhir, $post_tgl_akhir)->result_array();
			$mytotal_penerimaan = $this->model_rr_penerimaan_dan_penggunaan_hak_amil->view_total_penerimaan($post_tgl_akhir, $post_tgl_akhir)->result_array();


			$tgl_awal = $this->mainfunction->gettgl_indo($post_tgl_awal);
			$tgl_akhir = $this->mainfunction->gettgl_indo($post_tgl_akhir);
			$data = array(
				'myzakat'		=> $myzakat,
				'myinfaq'		=> $myinfaq,
				'mytotal_penerimaan'	=> $mytotal_penerimaan,
				'post_tgl_awal'	=> $post_tgl_awal,
				'post_tgl_akhir'=> $post_tgl_akhir,
				'tgl_awal'		=> $tgl_awal,
				'tgl_akhir'		=> $tgl_akhir
			);
			$this->load->view('page/rr_penerimaan_dan_penggunaan_hak_amil/laporan', $data);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
    }

}