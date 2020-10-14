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
	public function downloadsample()
	{
		set_include_path(APPPATH . 'third_party/PHPExcel/Classes/');
		include 'PHPExcel/IOFactory.php';
		$objPHPExcel = new PHPExcel();
		$id_mustahik = $this->model_mustahik->joinmustahik()->result_array();
		$data = $id_mustahik;
		$no = 1;
		$row = 2;
		if (count($data) > 0) {
			if ($data) {
				$key = array_keys($data[0]);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', 'Tanggal Reg');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B1', 'Nama Mustahik');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C1', 'Pendapatan');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D1', 'NPWP');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E1', 'Tipe Identitas');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F1', 'Jenis Mustahik');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G1', 'Kategori Mustahik');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H1', 'No. Identitas');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I1', 'Kewarganegraan');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J1', 'Tempat Lahir');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('K1', 'Tanggal Lahir');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L1', 'Jenis Kelamin');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('M1', 'Pekerjaan');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('N1', 'Status Pernikahan');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('O1', 'Status Pendidikan');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('P1', 'Alamat');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Q1', 'Provinsi');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('R1', 'Kab / Kota');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('S1', 'Kecamatan');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('T1', 'Desa/Kelurahan');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('U1', 'Kode Pos');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('V1', 'Status Rumah');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('W1', 'No. Telp');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('X1', 'Fax');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Y1', 'Handphone');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Z1', 'Email');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AA1', 'Website');

				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A2', '2020-10-06');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B2', 'IQBAL');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C2', '4000000');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D2', '01000000000131');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E2', 'KTP');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F2', 'Individu');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G2', '3');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H2', '32000102113233');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I2', 'WNI');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J2', 'Bekasi');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('K2', '1997-10-01');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L2', 'L');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('M2', '2');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('N2', '2');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('O2', '4');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('P2', 'Jl. Testing Raya No 1111');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Q2', '2201');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('R2', 'Bekasi');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('S2', 'Tambun Utara');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('T2', 'Satria Jaya');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('U2', '17510');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('V2', '1');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('W2', '123456789');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('X2', '4456324474');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Y2', '777777777');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Z2', 'school.gemanurani@gmail.com');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AA2', 'gemanurani.com');

				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A3', '2020-10-06');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B3', 'ARMERIA');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C3', '4000000');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D3', '010000000131');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E3', 'PASPORT');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F3', 'Lembaga');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G3', '3');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H3', '32000102113233');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I3', 'WNA');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J3', 'Bekasi');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('K3', '1997-07-01');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L3', 'P');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('M3', '2');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('N3', '2');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('O3', '4');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('P3', 'Jl. Testing Raya No 1111');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Q3', '2201');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('R3', 'Bekasi');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('S3', 'Tambun Utara');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('T3', 'Satria Jaya');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('U3', '17510');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('V3', '1');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('W3', '123456789');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('X3', '4456324474');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Y3', '777777777');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Z3', 'school.gemanurani@gmail.com');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AA3', 'gemanurani.com');

				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AD1', 'Tanggal Reg');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AE1', 'Nama Muzakki');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AF1', 'Penapatan');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AG1', 'NPWP');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AH1', 'Tipe Identitas');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AI1', 'Id Jenis Mustahik');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AJ1', 'Jenis Mustahik');
				
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AJ2', 'Individu');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AJ3', 'Lembaga');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AK1', 'Id Mustahik');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AL1', 'Kategori Mustahik');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AM1', 'No. Identitas');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AN1', 'Kewarganegraan');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AO1', 'Tempat Lahir');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AP1', 'Tanggal Lahir');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AQ1', 'Jenis Kelamin');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AR1', 'ID Pekerjaan');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AS1', 'Pekerjaan');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AT1', 'ID Pernikahan');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AU1', 'Status Pernikahan');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AT2', '1');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AU2', 'Lajang');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AT3', '2');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AU3', 'Menikah');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AV1', 'ID Pendidikan');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AW1', 'Status Pendidikan');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AX1', 'Alamat');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AY1', 'ID Provinsi');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AZ1', 'Provinsi');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('BA1', 'Kab / Kota');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('BB1', 'Kecamatan');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('BC1', 'Desa/Kelurahan');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('BD1', 'Kode Pos');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('BE1', 'ID Status Rumah');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('BF1', 'Status Rumah');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('BE2', '1');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('BF2', 'Milik Sendiri');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('BE3', '2');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('BF3', 'Milik Orang Tua');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('BG1', 'No. Telp');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('BH1', 'Fax');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('BI1', 'Handphone');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('BJ1', 'Email');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('BK1', 'Website');
				foreach ($data as $dataExcel) {
					$tgl_reg = $dataExcel['tgl_reg'];
					$nama = $dataExcel['nama'];
					$pendapatan = $dataExcel['pendapatan'];
					$npwp = $dataExcel['npwp'];
					$tipe_identitas = $dataExcel['tipe_identitas'];
					$id_mustahik = $dataExcel['id_musthaik'];
					$kat_mustahik = $dataExcel['kat_mustahik'];
					$no_identitas = $dataExcel['no_identitas'];
					$kewarganegaraan = $dataExcel['kewarganegaraan'];
					$tmp_lhr = $dataExcel['tmp_lhr'];
					$tgl_lhr = $dataExcel['tgl_lhr'];
					$jenis_kelamin = $dataExcel['jenis_kelamin'];
					$id_pekerjaan = $dataExcel['id_pekerjaan'];
					$pekerjaan = $dataExcel['pekerjaan'];
					$id_pendidikan = $dataExcel['id_pendidikan'];
					$pendidikan = $dataExcel['pendidikan'];
					$alamat = $dataExcel['alamat'];
					$id_provinsi = $dataExcel['id_provinsi'];
					$provinsi = $dataExcel['provinsi'];
					$kab_kota = $dataExcel['kab_kota'];
					$desa_kelurahan = $dataExcel['desa_kelurahan'];
					$kode_pos = $dataExcel['kode_pos'];
					$kecamatan = $dataExcel['kecamatan'];
					$telp = $dataExcel['telp'];
					$fax = $dataExcel['fax'];
					$handphone = $dataExcel['handphone'];
					$email = $dataExcel['email'];
					$website = $dataExcel['website'];

					$objPHPExcel->getActiveSheet(0)->getStyle('AD' . $row)->getNumberFormat()->setFormatCode('yyyy-mm-dd');
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AD' . $row, $tgl_reg, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('AD')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('AE' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AE' . $row, $nama, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('AE')->setAutoSize(true);


					$objPHPExcel->getActiveSheet(0)->getStyle('AF' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AF' . $row, $pendapatan, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('AF')->setAutoSize(true);


					$objPHPExcel->getActiveSheet(0)->getStyle('AG' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AG' . $row, $npwp, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('AG')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('AH' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AH' . $row, $tipe_identitas, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('AH')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('AK' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AK' . $row, $id_mustahik, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('AK')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('AL' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AL' . $row, $kat_mustahik, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('AL')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('AM' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AM' . $row, $no_identitas, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('AM')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('AN' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AN' . $row, $kewarganegaraan, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('AN')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('AO' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AO' . $row, $tmp_lhr, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('AO')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('AP' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AP' . $row, $tgl_lhr, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('AP')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('AQ' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AQ' . $row, $jenis_kelamin, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('AQ')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('AR' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AR' . $row, $id_pekerjaan, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('AR')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('AM' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AM' . $row, $pekerjaan, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('AM')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('AS' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AS' . $row, $id_pendidikan, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('AS')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('AV' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AV' . $row, $pendidikan, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('AV')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('AW' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AW' . $row, $alamat, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('AW')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('AX' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AX' . $row, $id_provinsi, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('AX')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('AY' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AY' . $row, $provinsi, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('AY')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('AZ' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AZ' . $row, $kab_kota, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('AZ')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('BA' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('BA' . $row, $kecamatan, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('BA')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('BB' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('BB' . $row, $desa_kelurahan, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('BB')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('BC' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('BC' . $row, $kode_pos, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('BC')->setAutoSize(true);

					// $objPHPExcel->getActiveSheet(0)->getStyle('AV' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					// $objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AV' . $row, $kecamatan, PHPExcel_Cell_DataType::TYPE_STRING);
					// $objPHPExcel->getActiveSheet(0)->getColumnDimension('AV')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('BG' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('BG' . $row, $telp, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('BG')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('BH' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('BH' . $row, $fax, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('BH')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('BI' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('BI' . $row, $handphone, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('BI')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('BJ' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('BJ' . $row, $email, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('BJ')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('BK' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('BK' . $row, $website, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('BK')->setAutoSize(true);
					$row++;
					$no++;
				}
				header('Content-Type: application/vnd.ms-excel; charset=utf-8');
				header('Content-Disposition: attachment; filename=report.xls');
				header('Cache-Control: max-age=0');
				ob_end_clean();
				ob_start();
				$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
				$filename = 'Sample' . 'csv';
				$objWriter->save('php://output');
			}
		}
	}
	

	public function import()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
			$files = $_FILES;
			$file = $files['file'];
			$fname = $file['tmp_name'];
			$file = $_FILES['file']['name'];
			$fname = $_FILES['file']['tmp_name'];
			$ext = explode('.', $file);
			/** Include path **/
			set_include_path(APPPATH . 'third_party/PHPExcel/Classes/');
			/** PHPExcel_IOFactory */
			include 'PHPExcel/IOFactory.php';
			$objPHPExcel = PHPExcel_IOFactory::load($fname);
			$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, false, true);
			$data_exist = [];
			$empty_message = [];

			foreach ($allDataInSheet as $ads) {
				if (array_filter($ads)) {
					array_push($data_exist, $ads);
				}
			}
			foreach ($data_exist as $keys => $value) {
				if ($keys == '0') {
					continue;
				} else {
					if (!$value[0]) {
						array_push($empty_message, "No at row "  . $keys . " Tanggal Regitrasi harus di isi");
					}
					if (!$value[1]) {
						array_push($empty_message, "No at row "  . $keys . " Nama harus di isi");
					}
					if (!$value[2]) {
						array_push($empty_message, "No at row "  . $keys . "Pendapatan harus di isi");
					}
					if (!$value[3]) {
						array_push($empty_message, "No at row "  . $keys . "NPWP harus di isi");
					}
					if (!$value[4]) {
						array_push($empty_message, "No at row "  . $keys . " Tipe Identitas harus di isi");
					}
					if (!$value[5]) {
						array_push($empty_message, "No at row "  . $keys . " Jenis Mustahik harus di isi");
					}
					if (!$value[6]) {
						array_push($empty_message, "No at row "  . $keys . " Kategori harus di isi");
					}
					if (!$value[7]) {
						array_push($empty_message, "No at row "  . $keys . " No. Identitas Sekolah harus di isi");
					}
					if (!$value[8]) {
						array_push($empty_message, "No at row "  . $keys . "Kewarganegaraan harus di isi");
					}

					if (!$value[9]) {
						array_push($empty_message, "No at row "  . $keys . "Tempat Lahir harus di isi");
					}

					if (!$value[10]) {
						array_push($empty_message, "No at row "  . $keys . "Tanggal Lahir harus di isi");
					}

					if (!$value[11]) {
						array_push($empty_message, "No at row "  . $keys . " Jenis Kelamin harus di isi");
					}
					if (!$value[12]) {
						array_push($empty_message, "No at row "  . $keys . " Pekerjaan harus di isi");
					}
					if (!$value[13]) {
						array_push($empty_message, "No at row "  . $keys . " Status Nikah harus di isi");
					}

					if (!$value[14]) {
						array_push($empty_message, "No at row "  . $keys . " Status Pendidikan harus di isi");
					}

					if (!$value[15]) {
						array_push($empty_message, "No at row "  . $keys . " Alamat harus di isi");
					}

					if (!$value[16]) {
						array_push($empty_message, "No at row "  . $keys . " Provinsi harus di isi");
					}

					if (!$value[17]) {
						array_push($empty_message, "No at row "  . $keys . " Kabupaten/Kota harus di isi");
					}

					if (!$value[18]) {
						array_push($empty_message, "No at row "  . $keys . " Kecamatan harus di isi");
					}

					if (!$value[19]) {
						array_push($empty_message, "No at row "  . $keys . " Desa/Kelurahan harus di isi");
					}
					if (!$value[20]) {
						array_push($empty_message, "No at row "  . $keys . " Kode Pos harus di isi");
					}
					if (!$value[21]) {
						array_push($empty_message, "No at row "  . $keys . " Status Rumah harus di isi");
					}
					if (!$value[24]) {
						array_push($empty_message, "No at row "  . $keys . " Handphone harus di isi");
					}
					if (!$value[25]) {
						array_push($empty_message, "No at row "  . $keys . " Email harus di isi");
					}

					if (!empty($empty_message)) {
						$ret['msg'] = $empty_message;
						$this->session->set_flashdata('message', '' . json_encode($ret['msg']));
						$result = 2;
					} else {

						$arrayCustomerQuote = array(
							'tgl_reg'  => $value[0],
							'nama'  => $value[1],
							'pendapatan'  => $value[2],
							'npwp'  => $value[3],
							'tipe_identitas'  => $value[4],
							'jenis_mustahik' =>$value[5],
							'kat_mustahik' =>$value[6],
							'no_identitas'  => $value[7],
							'kewarganegaraan'  => $value[8],
							'tmp_lhr'  => $value[9],
							'tgl_lhr'  => $value[10],
							'jenis_kelamin'  => $value[11],
							'pekerjaan'  => $value[12],
							'status_pernikahan'  => $value[13],
							'status_pendidikan'  => $value[14],
							'alamat'  => $value[15],
							'provinsi'  => $value[16],
							'kab_kota'  => $value[17],
							'kecamatan'  => $value[18],
							'desa_kelurahan'  => $value[19],
							'kode_pos'  => $value[20],
							'status_rumah'  => $value[21],
							'handphone'  => $value[24],
							'email'  => $value[25],
							'createdAt' => date('Y-m-d H:i:s')
						);
						$result = $this->model_mustahik->insert($arrayCustomerQuote, 'master_mustahik');
						$result = 1;
					}
				}
			}
			echo json_encode($result);
		} else {
			$result = 0;
			echo json_encode($result);
		}
	}
}
