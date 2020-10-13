<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Muzakki extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_muzakki');
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
			$mypekerjaan = $this->model_muzakki->viewOrdering('master_pekerjaan', 'id', 'asc')->result_array();
			$mypendidikan = $this->model_muzakki->viewOrdering('master_pendidikan', 'id', 'asc')->result_array();
			$myprovinsi = $this->model_muzakki->getprovinsi()->result_array();
			$mykepemilikan = $this->model_muzakki->viewOrdering('master_kepemilikan', 'id', 'asc')->result_array();
			$mynama = $this->model_muzakki->viewOrdering('master_muzakki', 'nama', 'asc')->result_array();

			$data = array(
				'page_content' 	=> '/muzakki/view',
				'ribbon' 		=> '<li class="active">Dashboard</li><li>Master Muzakki</li>',
				'page_name' 	=> 'Master Muzakki',
				'js' 			=> 'js_file',
				'mypekerjaan'		=> $mypekerjaan,
				'mypendidikan'		=> $mypendidikan,
				'myprovinsi'		=> $myprovinsi,
				'mykepemilikan'		=> $mykepemilikan,
				'mynama'		=> $mynama,
			);
			$this->render_view($data);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function simpan()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
			$config['upload_path'] = './assets/image/muzakki'; 
			// $config['file_name'] = 'filename';
			$config['overwrite'] = TRUE;
			$config['encrypt_name'] = TRUE;
			$config["allowed_types"] = 'jpg|jpeg|png|gif';
			$config["max_size"] = 4096;
			// $config["max_width"] = 400;
			// $config["max_height"] = 400;
			$this->load->library('upload', $config);
			$do_upload = $this->upload->do_upload("file");
			if ($do_upload) {
				$upload_data = $this->upload->data();
				$file_name = $upload_data['file_name'];
				$data = array(
					'tgl_reg'  => $this->input->post('tanggal'),
					'nama'  => $this->input->post('nama'),
					'npwp'  => $this->input->post('npwp'),
					'tipe_identitas'  => $this->input->post('tipe_identitas'),
					'no_identitas'  => $this->input->post('idn'),
					'kewarganegaraan'  => $this->input->post('warganegara'),
					'foto'	=> $file_name,
					'tmp_lhr'  => $this->input->post('tempat_lahir'),
					'tgl_lhr'  => $this->input->post('tgl_lhr'),
					'jenis_kelamin'  => $this->input->post('jk'),
					'jenis_muzakki'  => $this->input->post('jenis_m'),
					'pekerjaan'  => $this->input->post('kerja'),
					'status_pernikahan'  => $this->input->post('status'),
					'status_pendidikan'  => $this->input->post('pendidikan'),
					'alamat'  => $this->input->post('alamat'),
					'provinsi'  => $this->input->post('provinsi'),
					'kab_kota'  => $this->input->post('kab_kot'),
					'kecamatan'  => $this->input->post('kec'),
					'desa_kelurahan'  => $this->input->post('desa'),
					'kode_pos'  => $this->input->post('kode_pos'),
					'status_rumah'  => $this->input->post('kepemilikan'),
					'telp'  => $this->input->post('telp_mizakki'),
					'fax'  => $this->input->post('fax_muzakki'),
					'handphone'  => $this->input->post('hp_muzakki'),
					'email'  => $this->input->post('email'),
					'website'  => $this->input->post('website'),
					'createdAt' => date('Y-m-d H:i:s')
				);
				$result = $this->model_muzakki->insert($data, 'master_muzakki');
				$id_muzakki = $this->db->insert_id();

				if ($result) {
					$datarek = array(
						'id_muzakki'  => $id_muzakki,
						'createdAt' => date('Y-m-d H:i:s')
					);
					$results = $this->model_muzakki->insert($datarek, 'master_rekening');
				}
				echo json_decode($result);

			}else{
				$data = array(
					'tgl_reg'  => $this->input->post('tanggal'),
					'nama'  => $this->input->post('nama'),
					'npwp'  => $this->input->post('npwp'),
					'tipe_identitas'  => $this->input->post('tipe_identitas'),
					'no_identitas'  => $this->input->post('idn'),
					'kewarganegaraan'  => $this->input->post('warganegara'),
					'tmp_lhr'  => $this->input->post('tempat_lahir'),
					'tgl_lhr'  => $this->input->post('tgl_lhr'),
					'jenis_kelamin'  => $this->input->post('jk'),
					'jenis_muzakki'  => $this->input->post('jenis_m'),
					'pekerjaan'  => $this->input->post('kerja'),
					'status_pernikahan'  => $this->input->post('status'),
					'status_pendidikan'  => $this->input->post('pendidikan'),
					'alamat'  => $this->input->post('alamat'),
					'provinsi'  => $this->input->post('provinsi'),
					'kab_kota'  => $this->input->post('kab_kot'),
					'kecamatan'  => $this->input->post('kec'),
					'desa_kelurahan'  => $this->input->post('desa'),
					'kode_pos'  => $this->input->post('kode_pos'),
					'status_rumah'  => $this->input->post('kepemilikan'),
					'telp'  => $this->input->post('telp_mizakki'),
					'fax'  => $this->input->post('fax_muzakki'),
					'handphone'  => $this->input->post('hp_muzakki'),
					'email'  => $this->input->post('email'),
					'website'  => $this->input->post('website'),
					'createdAt' => date('Y-m-d H:i:s')
				);
				$result = $this->model_muzakki->insert($data, 'master_muzakki');
				$id_muzakki = $this->db->insert_id();

				if ($result) {
					$datarek = array(
						'id_muzakki'  => $id_muzakki,
						'createdAt' => date('Y-m-d H:i:s')
					);
					$results = $this->model_muzakki->insert($datarek, 'master_rekening');
				}
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
			$my_data = $this->model_muzakki->view_where('master_muzakki', $data)->result();
			echo json_encode($my_data);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function tampil_byidrekening()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
			$id = $this->input->post('id');
			$my_data = $this->model_muzakki->view_where_join('master_rekening', $id)->result();
			echo json_encode($my_data);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function search()
	{
		$jenis = $this->input->post('kat_muzakki');
		$nama = $this->input->post('nama2');
		$result = $this->model_muzakki->getmuzakki($jenis, $nama)->result();
		echo json_encode($result);
	}

	public function tampil()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {

			$my_data = $this->model_muzakki->viewOrdering('master_muzakki', 'id', 'desc')->result_array();
			echo json_encode($my_data);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function simpanrekening()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {

			$data_id = array(
				'id_muzakki'  => $this->input->post('e_id')
			);

			$data = array(
				'nokartu'  => $this->input->post('no_kartu'),
				'namabank'  => $this->input->post('nama_bank'),
				'updatedAt' => date('Y-m-d H:i:s')
			);
			$result = $this->model_muzakki->update($data_id, $data, 'master_rekening');
			echo json_decode($result);
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
			$config['upload_path'] = './assets/image/muzakki';
			$config['overwrite'] = TRUE;
			$config['encrypt_name'] = TRUE;
			$config["allowed_types"] = 'jpg|jpeg|png|gif';
			$config["max_size"] = 4096;
			$this->load->library('upload', $config);
			$do_upload = $this->upload->do_upload("e_file");
			$file_name = null;
			if ($do_upload) {
				$upload_data = $this->upload->data();
				$file_name = $upload_data['file_name'];
			}
			if ($file_name==null) {
				$data = array(
					'tgl_reg'  => $this->input->post('e_tanggal'),
					'nama'  => $this->input->post('e_nama'),
					'npwp'  => $this->input->post('e_npwp'),
					'tipe_identitas'  => $this->input->post('e_tipe_identitas'),
					'no_identitas'  => $this->input->post('e_idn'),
					'kewarganegaraan'  => $this->input->post('e_warganegara'),
					'foto'	=> $file_name,
					'jenis_muzakki'  => $this->input->post('e_jenis_m'),
					'tmp_lhr'  => $this->input->post('e_tempat_lahir'),
					'tgl_lhr'  => $this->input->post('e_tgl_lhr'),
					'jenis_kelamin'  => $this->input->post('e_jk'),
					'pekerjaan'  => $this->input->post('e_kerja'),
					'status_pernikahan'  => $this->input->post('e_status'),
					'status_pendidikan'  => $this->input->post('e_pendidikan'),
					'alamat'  => $this->input->post('e_alamat'),
					'provinsi'  => $this->input->post('e_provinsi'),
					'kab_kota'  => $this->input->post('e_kab_kot'),
					'kecamatan'  => $this->input->post('e_kec'),
					'desa_kelurahan'  => $this->input->post('e_desa'),
					'kode_pos'  => $this->input->post('e_kode_pos'),
					'status_rumah'  => $this->input->post('e_kepemilikan'),
					'telp'  => $this->input->post('e_telp_mizakki'),
					'fax'  => $this->input->post('e_fax_muzakki'),
					'handphone'  => $this->input->post('e_hp_muzakki'),
					'email'  => $this->input->post('e_email'),
					'website'  => $this->input->post('e_website'),
					'updatedAt' => date('Y-m-d H:i:s')
				);
				$result = $this->model_muzakki->update($data_id, $data, 'master_muzakki');
				echo json_decode($result);
			}else{
				$data = array(
					'tgl_reg'  => $this->input->post('e_tanggal'),
					'nama'  => $this->input->post('e_nama'),
					'npwp'  => $this->input->post('e_npwp'),
					'tipe_identitas'  => $this->input->post('e_tipe_identitas'),
					'no_identitas'  => $this->input->post('e_idn'),
					'kewarganegaraan'  => $this->input->post('e_warganegara'),
					'foto'	=> $file_name,
					'jenis_muzakki'  => $this->input->post('e_jenis_m'),
					'tmp_lhr'  => $this->input->post('e_tempat_lahir'),
					'tgl_lhr'  => $this->input->post('e_tgl_lhr'),
					'jenis_kelamin'  => $this->input->post('e_jk'),
					'pekerjaan'  => $this->input->post('e_kerja'),
					'status_pernikahan'  => $this->input->post('e_status'),
					'status_pendidikan'  => $this->input->post('e_pendidikan'),
					'alamat'  => $this->input->post('e_alamat'),
					'provinsi'  => $this->input->post('e_provinsi'),
					'kab_kota'  => $this->input->post('e_kab_kot'),
					'kecamatan'  => $this->input->post('e_kec'),
					'desa_kelurahan'  => $this->input->post('e_desa'),
					'kode_pos'  => $this->input->post('e_kode_pos'),
					'status_rumah'  => $this->input->post('e_kepemilikan'),
					'telp'  => $this->input->post('e_telp_mizakki'),
					'fax'  => $this->input->post('e_fax_muzakki'),
					'handphone'  => $this->input->post('e_hp_muzakki'),
					'email'  => $this->input->post('e_email'),
					'website'  => $this->input->post('e_website'),
					'updatedAt' => date('Y-m-d H:i:s')
				);
				$result = $this->model_muzakki->update($data_id, $data, 'master_muzakki');
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
			$action = $this->model_muzakki->delete($data_id, 'master_muzakki');
			$action = $this->model_muzakki->delete($data_id, 'master_rekening');
			echo json_encode($action);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}
}
