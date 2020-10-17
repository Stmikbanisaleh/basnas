<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pp_zakat_kabupaten_kota extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_pp_zakat_kabupaten_kota');
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
			$myprogram = $this->model_pp_zakat_kabupaten_kota->viewOrdering('master_sub_program', 'id', 'asc')->result_array();
			$data = array(
				'page_content' 	=> '/pp_zakat_kabupaten_kota/view',
				'ribbon' 		=> '<li class="active">Dashboard</li><li>Laporan</li><li>Rencana dan Realisasi PBiaya Operasional Fungsi</li>',
				'page_name' 	=> 'BELUM',
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
			$myzakatmaal = $this->model_pp_zakat_kabupaten_kota->view_sum_zakat_maal($post_tgl_akhir, $post_tgl_akhir)->result_array();
			$myzakatfitrah = $this->model_pp_zakat_kabupaten_kota->view_sum_zakat_fitrah($post_tgl_akhir, $post_tgl_akhir)->result_array();
			$myinfaq = $this->model_pp_zakat_kabupaten_kota->view_sum_infaq($post_tgl_akhir, $post_tgl_akhir)->result_array();
			$mymuzaki = $this->model_pp_zakat_kabupaten_kota->view_sum_data_muzaki($post_tgl_akhir, $post_tgl_akhir)->result_array();
			$mybidang = $this->model_pp_zakat_kabupaten_kota->view_sum_bidang($post_tgl_akhir, $post_tgl_akhir)->result_array();
			$myasnaf = $this->model_pp_zakat_kabupaten_kota->view_sum_asnaf($post_tgl_akhir, $post_tgl_akhir)->result_array();
			$tgl_awal = $this->mainfunction->gettgl_indo($post_tgl_awal);
			$tgl_akhir = $this->mainfunction->gettgl_indo($post_tgl_akhir);
			$data = array(
				'myzakatmaal'		=> $myzakatmaal,
				'myzakatfitrah'		=> $myzakatfitrah,
				'myinfaq'		=> $myinfaq,
				'mymuzaki'		=> $mymuzaki,
				'mybidang'		=> $mybidang,
				'myasnaf'		=> $myasnaf,
				'post_tgl_awal'	=> $post_tgl_awal,
				'post_tgl_akhir'=> $post_tgl_akhir,
				'tgl_awal'		=> $tgl_awal,
				'tgl_akhir'		=> $tgl_akhir
			);
			$this->load->view('page/pp_zakat_kabupaten_kota/laporan', $data);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
    }

}