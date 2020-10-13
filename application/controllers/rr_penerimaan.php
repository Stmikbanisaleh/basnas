<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rr_penerimaan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_rr_penerimaan');
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
			$myprogram = $this->model_rr_penerimaan->viewOrdering('master_sub_program', 'id', 'asc')->result_array();
			$data = array(
				'page_content' 	=> '/rr_penerimaan/view',
				'ribbon' 		=> '<li class="active">Dashboard</li><li>Laporan Rencana dan Realisasi Penerimaan</li>',
				'page_name' 	=> 'Laporan Rena',
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
			$myprogram = $this->model_rr_penerimaan->view_program($post_tgl_akhir, $post_tgl_akhir)->result_array();
			$tgl_awal = $this->mainfunction->gettgl_indo($post_tgl_awal);
			$tgl_akhir = $this->mainfunction->gettgl_indo($post_tgl_akhir);
			$data = array(
				'page_content' 	=> '/rr_penerimaan/view',
				'ribbon' 		=> '<li class="active">Dashboard</li><li>Laporan Rencana dan Realisasi Penerimaan</li>',
				'page_name' 	=> 'Laporan Rena',
				'js' 			=> 'js_file',
				'myprogram'		=> $myprogram,
				'post_tgl_awal'	=> $post_tgl_awal,
				'post_tgl_akhir'=> $post_tgl_akhir,
				'tgl_awal'		=> $tgl_awal,
				'tgl_akhir'		=> $tgl_akhir
			);
			$this->load->view('page/rr_penerimaan/laporan', $data);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
    }

}