<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mustahik extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_mustahik');
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
		$jenis = $this->input->post('kat_mustahik');
		$nama = $this->input->post('nama2');
		$result = $this->model_mustahik->getmustahiks($jenis, $nama)->result();
		echo json_encode($result);
	}

	public function index()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
			$mypekerjaan = $this->model_mustahik->viewOrdering('master_pekerjaan', 'id', 'asc')->result_array();
			$mypendidikan = $this->model_mustahik->viewOrdering('master_pendidikan', 'id', 'asc')->result_array();
			$myprovinsi = $this->model_mustahik->getprovinsi()->result_array();
			$mykepemilikan = $this->model_mustahik->viewOrdering('master_kepemilikan', 'id', 'asc')->result_array();
			$mynama = $this->model_mustahik->viewOrdering('master_mustahik', 'nama', 'asc')->result_array();
			$mykatmustahik = $this->model_mustahik->viewOrdering('master_kategori_mustahik', 'nama', 'asc')->result_array();
			$myusaha = $this->model_mustahik->viewOrdering('master_jenis_usaha', 'nama', 'asc')->result_array();
			$data = array(
				'page_content' 	=> '/mustahik/view',
				'ribbon' 		=> '<li class="active">Dashboard</li><li>Master Mustahik</li>',
				'page_name' 	=> 'Master Mustahik',
				'js' 			=> 'js_file',
				'mypekerjaan'		=> $mypekerjaan,
				'mypendidikan'		=> $mypendidikan,
				'myprovinsi'		=> $myprovinsi,
				'mykepemilikan'		=> $mykepemilikan,
				'mynama'		=> $mynama,
				'mykatmustahik' => $mykatmustahik,
				'myusaha' => $myusaha
			);
			$this->render_view($data);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function simpan()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
			$config['upload_path'] = './assets/image/mustahik'; 
			// $config['file_name'] = 'filename';
			$config['overwrite'] = TRUE;
			$config['encrypt_name'] = TRUE;
			$config["allowed_types"] = 'jpg|jpeg|png|gif';
			$config["max_size"] = 4096;
			// $config["max_width"] = 400;
			// $config["max_height"] = 400;
			$this->load->library('upload', $config);
			$do_upload = $this->upload->do_upload("foto");
			if ($do_upload) {
				$upload_data = $this->upload->data();
				$file_name = $upload_data['file_name'];
				$data = array(
					'tgl_reg'  => date('Y-m-d H:i:s'),
					'kat_mustahik'  => $this->input->post('kat_mustahik'),
					'nama'  => $this->input->post('nama'),
					'pendapatan'  => $this->input->post('pendapatan_v'),
					'tipe_identitas'  => $this->input->post('tipe_identitas'),
					'tgl_lhr'  => $this->input->post('tgl_lhr'),
					'jenis_mustahik'  => $this->input->post('jenis_mustahik'),
					'no_identitas'  => $this->input->post('idn'),
					'tmp_lhr'  => $this->input->post('tempat_lahir'),
					'jenis_kelamin'  => $this->input->post('jk'),
					'kewarganegaraan'  => $this->input->post('warganegara'),
					'jenis_usaha'  => $this->input->post('ju'),
					'foto'	=> $file_name,
					'alamat'  => $this->input->post('alamat'),
					'provinsi'  => $this->input->post('provinsi'),
					'kab_kota'  => $this->input->post('kab_kot'),
					'kecamatan'  => $this->input->post('kec'),
					'desa_kelurahan'  => $this->input->post('desa'),
					'kode_pos'  => $this->input->post('kode_pos'),
					'telp'  => $this->input->post('telp_mustahik'),
					'fax'  => $this->input->post('fax_mustahik'),
					'handphone'  => $this->input->post('hp_mustahik'),
					'email'  => $this->input->post('email'),
					'website'  => $this->input->post('website'),
					'createdAt' => date('Y-m-d H:i:s')
				);
				$result = $this->model_mustahik->insert($data, 'master_mustahik');
				echo json_decode($result);
			} else {
				$data = array(
					'tgl_reg'  => date('Y-m-d H:i:s'),
					'kat_mustahik'  => $this->input->post('kat_mustahik'),
					'nama'  => $this->input->post('nama'),
					'pendapatan'  => $this->input->post('pendapatan_v'),
					'tipe_identitas'  => $this->input->post('tipe_identitas'),
					'tgl_lhr'  => $this->input->post('tgl_lhr'),
					'jenis_mustahik'  => $this->input->post('jenis_mustahik'),
					'no_identitas'  => $this->input->post('idn'),
					'tmp_lhr'  => $this->input->post('tempat_lahir'),
					'jenis_kelamin'  => $this->input->post('jk'),
					'kewarganegaraan'  => $this->input->post('warganegara'),
					'jenis_usaha'  => $this->input->post('ju'),
					'alamat'  => $this->input->post('alamat'),
					'provinsi'  => $this->input->post('provinsi'),
					'kab_kota'  => $this->input->post('kab_kot'),
					'kecamatan'  => $this->input->post('kec'),
					'desa_kelurahan'  => $this->input->post('desa'),
					'kode_pos'  => $this->input->post('kode_pos'),
					'telp'  => $this->input->post('telp_mustahik'),
					'fax'  => $this->input->post('fax_mustahik'),
					'handphone'  => $this->input->post('hp_mustahik'),
					'email'  => $this->input->post('email'),
					'website'  => $this->input->post('website'),
					'createdAt' => date('Y-m-d H:i:s')
				);
				$result = $this->model_mustahik->insert($data, 'master_mustahik');
				echo json_decode($result);
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
			$my_data = $this->model_mustahik->view_where('master_mustahik', $data)->result();
			echo json_encode($my_data);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function tampil()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {

			$my_data = $this->model_mustahik->getmustahik('master_mustahik', 'id', 'desc')->result_array();
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
			$config['upload_path'] = './assets/image/mustahik';
			$config['overwrite'] = TRUE;
			$config['encrypt_name'] = TRUE;
			$config["allowed_types"] = 'jpg|jpeg|png|gif';
			$config["max_size"] = 4096;
			$this->load->library('upload', $config);
			$do_upload = $this->upload->do_upload("e_foto");
			$file_name = null;
			if ($do_upload) {
				$upload_data = $this->upload->data();
				$file_name = $upload_data['file_name'];
			}
			if (empty($_FILES['userfile']['name'])) {
				$data = array(
					'kat_mustahik'  => $this->input->post('e_kat_mustahik'),
					'nama'  => $this->input->post('e_nama'),
					'pendapatan'  => $this->input->post('e_pendapatan_v'),
					'tipe_identitas'  => $this->input->post('e_tipe_identitas'),
					'tgl_lhr'  => $this->input->post('e_tgl_lhr'),
					'jenis_mustahik'  => $this->input->post('e_jenis_mustahik'),
					'no_identitas'  => $this->input->post('e_idn'),
					'tmp_lhr'  => $this->input->post('e_tempat_lahir'),
					'jenis_kelamin'  => $this->input->post('e_jk'),
					'kewarganegaraan'  => $this->input->post('e_warganegara'),
					'jenis_usaha'  => $this->input->post('e_ju'),
					'alamat'  => $this->input->post('e_alamat'),
					'provinsi'  => $this->input->post('e_provinsi'),
					'kab_kota'  => $this->input->post('e_kab_kot'),
					'kecamatan'  => $this->input->post('e_kec'),
					'desa_kelurahan'  => $this->input->post('e_desa'),
					'kode_pos'  => $this->input->post('e_kode_pos'),
					'telp'  => $this->input->post('e_telp_mustahik'),
					'fax'  => $this->input->post('e_fax_mustahik'),
					'handphone'  => $this->input->post('e_hp_mustahik'),
					'email'  => $this->input->post('e_email'),
					'website'  => $this->input->post('e_website'),
					'updatedAt' => date('Y-m-d H:i:s')
				);
				$result = $this->model_mustahik->update($data_id, $data, 'master_mustahik');
				echo json_decode($result);
			}else{
				$data = array(
					'kat_mustahik'  => $this->input->post('e_kat_mustahik'),
					'nama'  => $this->input->post('e_nama'),
					'pendapatan'  => $this->input->post('e_pendapatan_v'),
					'tipe_identitas'  => $this->input->post('e_tipe_identitas'),
					'tgl_lhr'  => $this->input->post('e_tgl_lhr'),
					'jenis_mustahik'  => $this->input->post('e_jenis_mustahik'),
					'no_identitas'  => $this->input->post('e_idn'),
					'tmp_lhr'  => $this->input->post('e_tempat_lahir'),
					'jenis_kelamin'  => $this->input->post('e_jk'),
					'kewarganegaraan'  => $this->input->post('e_warganegara'),
					'jenis_usaha'  => $this->input->post('e_ju'),
					'foto'	=> $file_name,
					'alamat'  => $this->input->post('e_alamat'),
					'provinsi'  => $this->input->post('e_provinsi'),
					'kab_kota'  => $this->input->post('e_kab_kot'),
					'kecamatan'  => $this->input->post('e_kec'),
					'desa_kelurahan'  => $this->input->post('e_desa'),
					'kode_pos'  => $this->input->post('e_kode_pos'),
					'telp'  => $this->input->post('e_telp_mustahik'),
					'fax'  => $this->input->post('e_fax_mustahik'),
					'handphone'  => $this->input->post('e_hp_mustahik'),
					'email'  => $this->input->post('e_email'),
					'website'  => $this->input->post('e_website'),
					'updatedAt' => date('Y-m-d H:i:s')
				);
				$result = $this->model_mustahik->update($data_id, $data, 'master_mustahik');
				echo json_decode($result);
			}

			
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
			
			$action = $this->model_mustahik->delete($data_id, 'master_mustahik');
			echo json_encode($action);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}
}
