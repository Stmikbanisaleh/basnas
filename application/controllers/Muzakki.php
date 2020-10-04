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
			if ($result) {
				$datarek = array(
					'id_muzakki'  => $this->input->post('e_id'),
					'nama'  => $this->input->post('nama3'),
					'alamat'  => $this->input->post('alamat3'),
					'no_kartu'  => $this->input->post('no_kartu'),
					'nama_bank'  => $this->input->post('nama_bank'),
					'createdAt' => date('Y-m-d H:i:s')
				);
				$results = $this->model_muzakki->insert($data, 'master_rekening');
			}
			echo json_decode($results);
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
			$data = array(
				'tgl_reg'  => $this->input->post('e_tanggal'),
				'nama'  => $this->input->post('e_nama'),
				'npwp'  => $this->input->post('e_npwp'),
				'tipe_identitas'  => $this->input->post('e_tipe_identitas'),
				'no_identitas'  => $this->input->post('e_idn'),
				'kewarganegaraan'  => $this->input->post('e_warganegara'),
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
		$idmuzakki = $this->model_muzakki->joinmuzakki()->result_array();
		$data = $idmuzakki;
		$no = 1;
		$row = 2;
		if (count($data) > 0) {
			if ($data) {
				$key = array_keys($data[0]);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', 'Tanggal Reg');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B1', 'Nama Muzakki');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C1', 'NPWP');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D1', 'Tipe Identitas');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E1', 'No. Identitas');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F1', 'Kewarganegraan');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G1', 'Tempat Lahir');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H1', 'Tanggal Lahir');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I1', 'Jenis Kelamin');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J1', 'Pekerjaan');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('K1', 'Status Pernikahan');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L1', 'Status Pendidikan');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('M1', 'Alamat');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('N1', 'Provinsi');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('O1', 'Kab / Kota');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('P1', 'Kecamatan');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Q1', 'Desa/Kelurahan');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('R1', 'Kode Pos');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('S1', 'Status Rumah');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('T1', 'No. Telp');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('U1', 'Fax');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('V1', 'Handphone');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('W1', 'Email');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('X1', 'Website');

				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A2', '2020-10-06');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B2', 'IQBAL');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C2', '01000000000131');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D2', 'KTP');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E2', '32000102113233');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F2', 'WNI');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G2', 'Bekasi');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H2', '1997-10-01');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I2', 'L');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J2', '2');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('K2', '2');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L2', '4');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('M2', 'Jl. Testing Raya No 1111');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('N2', '2201');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('O2', 'Bekasi');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('P2', 'Tambun Utara');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Q2', 'Satria Jaya');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('R2', '17510');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('S2', '1');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('T2', '123456789');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('U2', '4456324474');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('V2', '777777777');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('W2', 'school.gemanurani@gmail.com');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('X2', 'gemanurani.com');

				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A3', '2020-10-06');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B3', 'ARMERIA');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C3', '010000000131');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D3', 'PASPORT');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E3', '32000102113233');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F3', 'WNA');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G3', 'Bekasi');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H3', '1997-07-01');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I3', 'P');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J3', '2');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('K3', '2');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L3', '4');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('M3', 'Jl. Testing Raya No 1111');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('N3', '2201');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('O3', 'Bekasi');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('P3', 'Tambun Utara');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Q3', 'Satria Jaya');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('R3', '17510');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('S3', '1');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('T3', '123456789');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('U3', '4456324474');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('V3', '777777777');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('W3', 'school.gemanurani@gmail.com');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('X3', 'gemanurani.com');

				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AA1', 'Tanggal Reg');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AB1', 'Nama Muzakki');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AC1', 'NPWP');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AD1', 'Tipe Identitas');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AE1', 'No. Identitas');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AF1', 'Kewarganegraan');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AG1', 'Tempat Lahir');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AH1', 'Tanggal Lahir');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AI1', 'Jenis Kelamin');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AJ1', 'ID Pekerjaan');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AK1', 'Pekerjaan');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AL1', 'ID Pernikahan');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AM1', 'Status Pernikahan');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AL2', '1');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AM2', 'Lajang');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AL3', '2');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AM3', 'Menikah');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AN1', 'ID Pendidikan');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AO1', 'Status Pendidikan');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AP1', 'Alamat');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AQ1', 'ID Provinsi');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AR1', 'Provinsi');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AS1', 'Kab / Kota');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AT1', 'Kecamatan');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AU1', 'Desa/Kelurahan');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AV1', 'Kode Pos');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AW1', 'ID Status Rumah');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AX1', 'Status Rumah');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AW2', '1');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AX2', 'Milik Sendiri');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AW3', '2');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AX3', 'Milik Orang Tua');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AY1', 'No. Telp');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('AZ1', 'Fax');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('BA1', 'Handphone');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('BB1', 'Email');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('BC1', 'Website');
				foreach ($data as $dataExcel) {
					$tgl_reg = $dataExcel['tgl_reg'];
					$nama = $dataExcel['nama'];
					$npwp = $dataExcel['npwp'];
					$tipe_identitas = $dataExcel['tipe_identitas'];
					$no_identitas = $dataExcel['no_identitas'];
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

					$objPHPExcel->getActiveSheet(0)->getStyle('AA' . $row)->getNumberFormat()->setFormatCode('yyyy-mm-dd');
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AA' . $row, $tgl_reg, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('AA')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('AB' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AB' . $row, $nama, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('AB')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('AC' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AC' . $row, $npwp, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('AC')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('AD' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AD' . $row, $tipe_identitas, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('AD')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('AE' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AE' . $row, $no_identitas, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('AE')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('AF' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AF' . $row, $kewarganegaraan, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('AF')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('AG' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AG' . $row, $tmp_lhr, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('AG')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('AH' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AH' . $row, $tgl_lhr, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('AH')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('AI' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AI' . $row, $jenis_kelamin, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('AI')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('AJ' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AJ' . $row, $id_pekerjaan, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('AJ')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('AK' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AK' . $row, $pekerjaan, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('AK')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('AN' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AN' . $row, $id_pendidikan, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('AN')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('AO' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AO' . $row, $pendidikan, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('AO')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('AP' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AP' . $row, $alamat, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('AP')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('AQ' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AQ' . $row, $id_provinsi, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('AQ')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('AR' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AR' . $row, $provinsi, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('AR')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('AS' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AS' . $row, $kab_kota, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('AS')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('AT' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AT' . $row, $kecamatan, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('AT')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('AR' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AR' . $row, $desa_kelurahan, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('AR')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('AU' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AU' . $row, $kode_pos, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('AU')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('AV' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AV' . $row, $kecamatan, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('AV')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('AY' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AY' . $row, $telp, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('AY')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('AZ' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('AZ' . $row, $fax, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('AZ')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('BA' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('BA' . $row, $handphone, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('BA')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('BB' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('BB' . $row, $email, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('BB')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('BC' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('BC' . $row, $website, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('BC')->setAutoSize(true);
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
						array_push($empty_message, "No at row "  . $keys . " Pekerjaan harus di isi");
					}
					if (!$value[10]) {
						array_push($empty_message, "No at row "  . $keys . " Status Nikah harus di isi");
					}

					if (!$value[11]) {
						array_push($empty_message, "No at row "  . $keys . " Status Pendidikan harus di isi");
					}

					if (!$value[12]) {
						array_push($empty_message, "No at row "  . $keys . " Alamat harus di isi");
					}

					if (!$value[13]) {
						array_push($empty_message, "No at row "  . $keys . " Provinsi harus di isi");
					}

					if (!$value[14]) {
						array_push($empty_message, "No at row "  . $keys . " Kabupaten/Kota harus di isi");
					}

					if (!$value[15]) {
						array_push($empty_message, "No at row "  . $keys . " Kecamatan harus di isi");
					}

					if (!$value[16]) {
						array_push($empty_message, "No at row "  . $keys . " Desa/Kelurahan harus di isi");
					}
					if (!$value[17]) {
						array_push($empty_message, "No at row "  . $keys . " Kode Pos harus di isi");
					}
					if (!$value[18]) {
						array_push($empty_message, "No at row "  . $keys . " Status Rumah harus di isi");
					}
					if (!$value[21]) {
						array_push($empty_message, "No at row "  . $keys . " Handphone harus di isi");
					}
					if (!$value[22]) {
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
							'npwp'  => $value[2],
							'tipe_identitas'  => $value[3],
							'no_identitas'  => $value[4],
							'kewarganegaraan'  => $value[5],
							'tmp_lhr'  => $value[6],
							'tgl_lhr'  => $value[7],
							'jenis_kelamin'  => $value[8],
							'pekerjaan'  => $value[9],
							'status_pernikahan'  => $value[10],
							'status_pendidikan'  => $value[11],
							'alamat'  => $value[12],
							'provinsi'  => $value[13],
							'kab_kota'  => $value[14],
							'kecamatan'  => $value[15],
							'desa_kelurahan'  => $value[16],
							'kode_pos'  => $value[17],
							'status_rumah'  => $value[18],
							'handphone'  => $value[21],
							'email'  => $value[22],
							'createdAt' => date('Y-m-d H:i:s')
						);
						$result = $this->model_muzakki->insert($arrayCustomerQuote, 'master_muzakki');
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
