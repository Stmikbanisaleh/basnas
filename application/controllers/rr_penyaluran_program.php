<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rr_penyaluran_program extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_rr_penyaluran_program');
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
			$myprogram = $this->model_rr_penyaluran_program->viewOrdering('master_sub_program', 'id', 'asc')->result_array();
			$data = array(
				'page_content' 	=> '/rr_penyaluran_program/view',
				'ribbon' 		=> '<li class="active">Dashboard</li><li>Laporan</li><li>Rencana dan Realisasi Penyaluran Program</li>',
				'page_name' 	=> 'Laporan Rencana dan Realisasi Penyaluran Berdasarkan Program',
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
			$myprogram = $this->model_rr_penyaluran_program->view_program($post_tgl_awal, $post_tgl_akhir)->result_array();
			$tgl_awal = $this->mainfunction->gettgl_indo($post_tgl_awal);
			$tgl_akhir = $this->mainfunction->gettgl_indo($post_tgl_akhir);
			$data = array(
				'myprogram'		=> $myprogram,
				'post_tgl_awal'	=> $post_tgl_awal,
				'post_tgl_akhir'=> $post_tgl_akhir,
				'tgl_awal'		=> $tgl_awal,
				'tgl_akhir'		=> $tgl_akhir
			);
			$this->load->view('page/rr_penyaluran_program/laporan', $data);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
    }

}