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

	public function showprovinsi()
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: b0cca0b7827f71b3ffe565525c503f6e"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			$data = json_decode($response, true);
			$prov = $data['rajaongkir']['results'];
		echo "<option value=''>--Pilih Data --</option>";
		foreach ($prov as $key => $value) {
		echo "<option value='" . $value['province_id'] . "'> " . $value['province'] . " </option>";
		}
		}
	
	}


	public function showkab()
	{
		$province = $this->input->post('provinsi');
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=$province",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: ab093838b7365c96fb5a6d8683a8b32d"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			$data = json_decode($response, true);
			$prov = $data['rajaongkir']['results'];
			echo "<option value=''>--Pilih Data --</option>";
			foreach ($prov as $key => $value) {
			echo "<option value='" . $value['city_id'] . "'> " .$value['type'] ." ". $value['city_name'] . " </option>";
		}
		}
	}


	public function showkec()
	{
		$province = $this->input->post('provinsi');
		$cityid = $this->input->post('cityid');
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://pro.rajaongkir.com/api/subdistrict?city=$cityid",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: ab093838b7365c96fb5a6d8683a8b32d"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			$data = json_decode($response, true);
			$prov = $data['rajaongkir']['results'];
			echo "<option value=''>--Pilih Data --</option>";
			foreach ($prov as $key => $value) {
			echo "<option value='" . $value['subdistrict_id'] . "'>  " . $value['subdistrict_name'] . " </option>";
		}
		}
	}

	public function showprovinsibyid()
	{
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: b0cca0b7827f71b3ffe565525c503f6e"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			$data = json_decode($response, true);
			$prov = $data['rajaongkir']['results'];
			echo "<option value=''>--Pilih Data --</option>";
		foreach ($prov as $key => $value) {
			echo "<option value='" . $value['province_id'] . "'> " . $value['province'] . " </option>";
			}
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
				'id_muzakki'  => $this->input->post('er_id')
			);

			$data = array(
				'nokartu'  => $this->input->post('no_kartu'),
				'namabank'  => $this->input->post('nama_bank'),
				'updatedAt' => date('Y-m-d H:i:s')
			);
			// print_r($data_id);exit;
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
			//Image
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
	public function downloadsample()
	{
		set_include_path(APPPATH . 'third_party/PHPExcel/Classes/');
		include 'PHPExcel/IOFactory.php';
		$objPHPExcel = new PHPExcel();
		$pekerjaan = $this->model_muzakki->viewOrdering('master_pekerjaan','id','asc')->result_array();
		$pendidikan = $this->model_muzakki->viewOrdering('master_pendidikan','id','asc')->result_array();
		$kepemilikan = $this->model_muzakki->viewOrdering('master_kepemilikan','id','asc')->result_array();
		$data = $pekerjaan;
		$no = 1;
		$row = 2;
		$row2 = 2;
		$row3 = 2;
		if (count($data) > 0) {
			if ($data) {
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', 'Tanggal Reg');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B1', 'Nama Muzakki');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C1', 'NPWP');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D1', 'Tipe Identitas');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E1', 'No. Identitas');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F1', 'Kewarganegraan');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G1', 'Tempat Lahir');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H1', 'Tanggal Lahir');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I1', 'Jenis Kelamin');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J1', 'Jenis Muzakki');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('K1', 'Pekerjaan');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L1', 'Status Pernikahan');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('M1', 'Status Pendidikan');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('N1', 'Alamat');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('O1', 'Provinsi');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('P1', 'Kab / Kota');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Q1', 'Kecamatan');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('R1', 'Desa/Kelurahan');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('S1', 'Kode Pos');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('T1', 'Status Rumah');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('U1', 'No. Telp');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('V1', 'Fax');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('W1', 'Handphone');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('X1', 'Email');
				

				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A2', '2020-10-06');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B2', 'John Doe');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C2', '10000000130');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D2', 'KTP');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E2', '32000102113232');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F2', 'WNI');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G2', 'Bekasi');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H2', '1997-10-01');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I2', 'L');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J2', 'Individu');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('K2', '2');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L2', '2');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('M2', '4');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('N2', 'Jl. Testing Raya No 1111');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('O2', '2201');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('P2', 'Bekasi');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Q2', 'Tambun Utara');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('R2', 'Satria Jaya');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('S2', '17510');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('T2', '1');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('U2', '123456789');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('V2', '4456324474');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('W2', '777777777');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('X2', 'testing@gmail.com');

				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A3', '2020-10-06');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B3', 'Jane Doe');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C3', '010000000131');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D3', 'PASPORT');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E3', '32000102113233');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F3', 'WNA');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G3', 'Bekasi');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H3', '1997-07-01');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I3', 'P');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J3', 'Lembaga');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('K3', '2');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L3', '2');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('M3', '4');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('N3', 'Jl. Testing Raya No 1111');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('O3', '2201');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('P3', 'Bekasi');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Q3', 'Tambun Utara');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('R3', 'Satria Jaya');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('S3', '17510');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('T3', '1');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('U3', '123456789');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('V3', '4456324474');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('W3', '777777777');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('X3', 'test@gmail.com');


				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AA1', 'Id Pekerjaan');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AB1', 'Nama Pekerjaan');

				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AC1', 'Id Pernikahan');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AD1', 'Status Pernikahan');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AC2', '1');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AD2', 'Lajang');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AC3', '2');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AD3', 'Menikah');

				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AE1', 'Id Pendidikan');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AF1', 'Nama Pendidikan');

				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AG1', 'Id Kepemilikan');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AH1', 'Nama Kepemilikan');

				foreach ($data as $dataExcel) {
					$idpekerjaan = $dataExcel['id'];
					$namapekerjaan = $dataExcel['nama'];
					$objPHPExcel->getActiveSheet(0)->getStyle('AA' . $row)->getNumberFormat()->setFormatCode('yyyy-mm-dd');
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AA' . $row, $idpekerjaan, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('AA')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('AB' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AB' . $row, $namapekerjaan, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('AB')->setAutoSize(true);
					$row++;
				}

				foreach ($pendidikan as $dataExcelP){
					$idpendidikan = $dataExcelP['id'];
					$namapendidikan = $dataExcelP['nama'];

					$objPHPExcel->getActiveSheet(0)->getStyle('AE' . $row2)->getNumberFormat()->setFormatCode('yyyy-mm-dd');
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AE' . $row2, $idpendidikan, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('AE')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('AF' . $row2)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AF' . $row2, $namapendidikan, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('AF')->setAutoSize(true);
					$row2++;
				}

				foreach ($kepemilikan as $dataExcelK){
					$idkepemilikan = $dataExcelK['id'];
					$namakepemilikan = $dataExcelK['nama'];

					$objPHPExcel->getActiveSheet(0)->getStyle('AG' . $row3)->getNumberFormat()->setFormatCode('yyyy-mm-dd');
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AG' . $row3, $idkepemilikan, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('AG')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('AH' . $row3)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AH' . $row3, $namakepemilikan, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('AH')->setAutoSize(true);
					$row3++;
				}

				header('Content-Type: application/vnd.ms-excel; charset=utf-8');
				header('Content-Disposition: attachment; filename=Format_upload_muzakki.xls');
				header('Cache-Control: max-age=0');
				ob_end_clean();
				ob_start();
				$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
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
						array_push($empty_message, "No at row "  . $keys . "NPWP harus di isi");
					}
					if (!$value[3]) {
						array_push($empty_message, "No at row "  . $keys . " Tipe Identitas harus di isi");
					}
					if (!$value[4]) {
						array_push($empty_message, "No at row "  . $keys . " No. Identitas Sekolah harus di isi");
					}
					if (!$value[5]) {
						array_push($empty_message, "No at row "  . $keys . "Kewarganegaraan harus di isi");
					}

					if (!$value[6]) {
						array_push($empty_message, "No at row "  . $keys . "Tempat Lahir harus di isi");
					}

					if (!$value[7]) {
						array_push($empty_message, "No at row "  . $keys . "Tanggal Lahir harus di isi");
					}

					if (!$value[8]) {
						array_push($empty_message, "No at row "  . $keys . " Jenis Kelamin harus di isi");
					}
					if (!$value[9]) {
						array_push($empty_message, "No at row "  . $keys . " Jenis Muzakki harus di isi");
					}
					if (!$value[10]) {
						array_push($empty_message, "No at row "  . $keys . " Pekerjaan harus di isi");
					}
					if (!$value[11]) {
						array_push($empty_message, "No at row "  . $keys . " Status Nikah harus di isi");
					}

					if (!$value[12]) {
						array_push($empty_message, "No at row "  . $keys . " Status Pendidikan harus di isi");
					}

					if (!$value[13]) {
						array_push($empty_message, "No at row "  . $keys . " Alamat harus di isi");
					}

					if (!$value[14]) {
						array_push($empty_message, "No at row "  . $keys . " Provinsi harus di isi");
					}

					if (!$value[15]) {
						array_push($empty_message, "No at row "  . $keys . " Kabupaten/Kota harus di isi");
					}

					if (!$value[16]) {
						array_push($empty_message, "No at row "  . $keys . " Kecamatan harus di isi");
					}

					if (!$value[17]) {
						array_push($empty_message, "No at row "  . $keys . " Desa/Kelurahan harus di isi");
					}
					if (!$value[18]) {
						array_push($empty_message, "No at row "  . $keys . " Kode Pos harus di isi");
					}
					if (!$value[19]) {
						array_push($empty_message, "No at row "  . $keys . " Status Rumah harus di isi");
					}
					if (!$value[22]) {
						array_push($empty_message, "No at row "  . $keys . " Handphone harus di isi");
					}
					if (!$value[23]) {
						array_push($empty_message, "No at row "  . $keys . " Email harus di isi");
					}

					if (!empty($empty_message)) {
						$ret['msg'] = $empty_message;
						$this->session->set_flashdata('message', '' . json_encode($ret['msg']));
						$result = 2;
					} else {
						$data_id = array(
							'no_identitas'  => $value[4]
						);
						$arrayCustomerQuote = array(
							'tgl_reg'  => $value[0],
							'nama'  => $value[1],
							'npwp'  => $value[2],
							'tipe_identitas'  => $value[3],
							'no_identitas'  => $value[4],
							'kewarganegaraan'  => $value[5],
							'tmp_lhr'  => $value[6],
							'tgl_lhr'  => $value[7],
							'jenis_kelamin'  => $value[8],
							'jenis_muzakki'  => $value[9],
							'pekerjaan'  => $value[10],
							'status_pernikahan'  => $value[11],
							'status_pendidikan'  => $value[12],
							'alamat'  => $value[13],
							'provinsi'  => $value[14],
							'kab_kota'  => $value[15],
							'kecamatan'  => $value[16],
							'desa_kelurahan'  => $value[17],
							'kode_pos'  => $value[18],
							'status_rumah'  => $value[19],
							'handphone'  => $value[22],
							'email'  => $value[23],
							'createdAt' => date('Y-m-d H:i:s')
						);
						$cek = $this->model_muzakki->view_where_noisdelete($data_id, 'master_muzakki')->num_rows();
						if($cek > 0) {
							$result = $this->model_muzakki->update($data_id, $arrayCustomerQuote, 'master_muzakki');
						}else{
							$result = $this->model_muzakki->insert($arrayCustomerQuote, 'master_muzakki');
							$id = $this->db->insert_id();
							$datarek = array(
								'id_muzakki'  => $id,
								'createdAt' => date('Y-m-d H:i:s')
							);
							$results = $this->model_muzakki->insert($datarek, 'master_rekening');
						}
						//$result = 1;
					}
				}
			}
			if ($result) {
                $result = 1;
            }
			echo json_encode($result);
		} else {
			$result = 0;
			echo json_encode($result);
		}
	}

	public function getprovinsi()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {

			$myprovinsi = $this->model_muzakki->getprovinsi()->result_array();
			echo json_encode($myprovinsi);

		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function getkota()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {

			$myprovinsi = $this->model_muzakki->getkota($this->input->post('id_provinsi'))->result_array();
			echo json_encode($myprovinsi);

		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}
}
