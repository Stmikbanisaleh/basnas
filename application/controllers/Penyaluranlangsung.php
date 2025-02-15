<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penyaluranlangsung extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_penyaluranlangsung');
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
		$penyalur = $this->input->post('penyalur');
		$status = $this->input->post('status');
		$tipe = $this->input->post('tipe');
		$jenis = $this->input->post('jenis');
		$periode_awal = $this->input->post('periode_awal');
		$periode_akhir = $this->input->post('periode_akhir');
		$result = $this->model_penyaluranlangsung->getpenyaluran($penyalur, $status, $tipe, $jenis, $periode_awal, $periode_akhir)->result();
		echo json_encode($result);
	}

	public function index()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
			$mykategorimustahik = $this->model_penyaluranlangsung->viewOrdering('master_kategori_mustahik', 'nama', 'asc')->result_array();
			$mytype = $this->model_penyaluranlangsung->viewOrdering('master_type', 'nama', 'asc')->result_array();
			$mysubprogram = $this->model_penyaluranlangsung->viewOrdering('master_sub_program', 'deskripsi', 'asc')->result_array();
			$mymustahik = $this->model_penyaluranlangsung->viewOrdering('master_mustahik', 'nama', 'asc')->result_array();
			$data = array(
				'page_content' 	=> '/penyaluranlangsung/view',
				'ribbon' 		=> '<li class="active">Dashboard</li><li>Penyaluran Langsung</li>',
				'page_name' 	=> 'Penyaluran Langsung',
				'js' 			=> 'js_file',
				'mykategorimustahik'		=> $mykategorimustahik,
				'mysubprogram'		=> $mysubprogram,
				'mytype'		=> $mytype,
				'mymustahik'	=> $mymustahik
			);
			$this->render_view($data);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function simpan()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
			$config_proposal['upload_path'] = './assets/file/penyaluran/program';
			$config_proposal['overwrite'] = TRUE;
			$config_proposal['encrypt_name'] = FALSE;
			$config_proposal["allowed_types"] = 'pdf';
			$config_proposal["max_size"] = 4096;
			$this->load->library('upload', $config_proposal);
			$asd = $this->upload->do_upload("proposal");
			$file_proposal = null;
			if ($asd) {
				$upload_data = $this->upload->data();
				$file_proposal = $upload_data['file_name'];
			}

			$data = array(
				'createdAt'  => $this->input->post('tanggal2'),
				'jumlah_dana'  => $this->input->post('total_v'),
				'ansaf'  => $this->input->post('tipe2'),
				'document_proposal'  => $file_proposal,
				'type'  => $this->input->post('jenis2'),
				'pic'  => $this->input->post('pic'),
				'deskripsi' => $this->input->post('deskripsi'),
				'petugas'	=> $this->session->userdata('nip')
			);
			$result = $this->model_penyaluranlangsung->insert($data, 'master_penyaluran');
			echo json_decode($result);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function simpan2()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
			$data = array(
				'createdAt' => date('Y-m-d H:i:s'),
				'id_program'  => $this->input->post('e_id2'),
				'id_mustahik'  => $this->input->post('nama3'),
			);
			$cek = $this->model_penyaluranlangsung->cek($this->input->post('nama3'), $this->input->post('e_id2'));
			if ($cek == 0) {
				$result = $this->model_penyaluranlangsung->insert($data, 'list_mustahik');
				echo json_decode($result);
			} else {
				echo 401;
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
			$my_data = $this->model_penyaluranlangsung->view_where('master_penyaluran', $data)->result();
			echo json_encode($my_data);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function tampil_byidprogram()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
			$data = $this->input->post('id');
			$my_data = $this->model_penyaluranlangsung->view_where2('list_mustahik', $data)->result();
			echo json_encode($my_data);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function laporan_pdf()
	{
		$id = $this->input->get('id');
		$urutan = +1;
		$filename = "Bukti-pengajuan-proposal-". date('Y-m-d');
		$data = array(
			'my_data' => $this->model_penyaluranlangsung->laporan_approval('master_penyaluran', $id)->result(),
			'no' => sprintf("%05s", $urutan++),
			'filename'	=> $filename
		);
		$this->load->view('page/penyaluranlangsung/buktipenerimaan', $data);
	}

	public function tampil_byidprogram2()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
			$data = array(
				'id'  => $this->input->post('id'),
			);
			$my_data = $this->model_penyaluranlangsung->view_where('master_penyaluran', $data)->result();
			echo json_encode($my_data);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function tampil()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {

			$my_data = $this->model_penyaluranlangsung->viewWhereOrderingpenyalur('master_penyaluran', 'id', 'asc')->result_array();
			echo json_encode($my_data);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function update()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
			$config_proposal['upload_path'] = './assets/file/penyaluran/program';
			$config_proposal['overwrite'] = TRUE;
			$config_proposal['encrypt_name'] = FALSE;
			$config_proposal["allowed_types"] = 'pdf';
			$config_proposal["max_size"] = 4096;
			$this->load->library('upload', $config_proposal);
			$upload_proposal = $this->upload->do_upload("asdf");
			$file_proposal = null;
			if ($upload_proposal) {
				$upload_data = $this->upload->data();
				$file_proposal = $upload_data['file_name'];
			}

			if($file_proposal!=null){
				$nama_proposal = $file_proposal;
			}else{
				$nama_proposal = $this->input->post('e_proposal_hide');
			}

			$data_id = array(
				'id'  => $this->input->post('e_id')
			);

			$data = array(
				'createdAt'  => $this->input->post('e_tanggal2'),
				'jumlah_dana'  => $this->input->post('e_total_v'),
				'ansaf'  => $this->input->post('e_tipe2'),
				'document_proposal' => $nama_proposal,
				'pic' => $this->input->post('e_pic'),
				'type'  => $this->input->post('e_jenis2'),
				'deskripsi' => $this->input->post('e_deskripsi'),
			);

			$result = $this->model_penyaluranlangsung->update($data_id, $data, 'master_penyaluran');
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
			$action = $this->model_penyaluranlangsung->delete($data_id, 'master_penyaluran');
			echo json_encode($action);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function delete2()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {

			$data_id = array(
				'id'  => $this->input->post('id')
			);
			$action = $this->model_penyaluranlangsung->delete($data_id, 'list_mustahik');
			echo json_encode($action);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}
	// function download_template(){
	// 	$id = $this->input->post('id');
	// 	$asdf = $this->input->post('asdf');
	// 	$this->downloadsample($id, $asdf);
	// 	$this->downloadsample2($id, $asdf);

	// }
	public function downloadsample()
	{
		set_include_path(APPPATH . 'third_party/PHPExcel/Classes/');
		include 'PHPExcel/IOFactory.php';
		$objPHPExcel = new PHPExcel();
		$ad = $this->model_penyaluranlangsung->trx_penyaluranlangsung()->result_array();
		$mykategorimustahik = $this->model_penyaluranlangsung->viewOrdering('master_kategori_mustahik', 'nama', 'asc')->result_array();
		$mytype = $this->model_penyaluranlangsung->viewOrdering('master_type', 'nama', 'asc')->result_array();

		$mymustahik = $this->model_penyaluranlangsung->viewOrdering('master_mustahik', 'nama', 'asc')->result_array();
		$data = array(
			'ad' => $ad,
			'mykategorimustahik'		=> $mykategorimustahik,
			'mytype'		=> $mytype,
			'mymustahik'		=> $mymustahik
		);
		$no = 1;
		$row = 2;
		if (count($data) > 0) {
			if ($data) {
				$key = array_keys($data[0]);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', 'Id Asnaf');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B1', 'Jumlah Dana');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C1', 'Type');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D1', 'Deskripsi');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E1', 'CreatedAt');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F1', 'Id Mustahik');

				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A2', '3');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B2', '1500000');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C2', '1');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D2', 'test import');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E2', '2020-10-16');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F2', '17');

				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A3', '1');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B3', '1500000');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C3', '2');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D3', 'import penyaluran');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E3', '2020-10-16');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F3', '16');

				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H1', 'ID Mustahik');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I1', 'Mustahik');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J1', 'Kategori Mustahik');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('K1', 'ID Ansaf');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L1', 'Nama Ansaf');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('M1', 'Id Jenis Dana');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('N1', 'Jenis Dana');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('O1', 'ID ANSAF');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('P1', 'Kategori Mustahik');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Q1', 'Jumlah Dana');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('R1', 'Jumlah Dana Disetujui');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('S1', 'Deskripsi');

				foreach ($mymustahik as $dataExcel) {
					$id_mus = $dataExcel['id'];
					$nama3 = $dataExcel['nama'];
					$kat_mustahik = $dataExcel['kat_mustahik'];
					$objPHPExcel->getActiveSheet(0)->getStyle('H' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('H' . $row, $id_mus, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('H')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('I' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('I' . $row, $nama3, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('I')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('J' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('J' . $row, $kat_mustahik, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('J')->setAutoSize(true);

					$row++;
					$no++;
				}

				foreach ($mykategorimustahik as $dataExcel2) {
					$id = $dataExcel2['id'];
					$nama2 = $dataExcel2['nama'];

					$objPHPExcel->getActiveSheet(0)->getStyle('K' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('K' . $row, $id, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('K')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('L' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('L' . $row, $nama2, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('L')->setAutoSize(true);

					$row++;
					$no++;
				}

				foreach ($mytype as $dataExcel1) {

					$id = $dataExcel1['id'];
					$nama6 = $dataExcel1['nama'];


					$objPHPExcel->getActiveSheet(0)->getStyle('M' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('M' . $row, $id, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('M')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('N' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('N' . $row, $nama6, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('N')->setAutoSize(true);

					$row++;
					$no++;
				}

				foreach ($ad as $dataExcel1) {

					$id = $dataExcel1['id_ansaf'];
					$kategori_mustahik = $dataExcel1['kategori_mustahik'];
					$jumlah_dana = $dataExcel1['jumlah_dana'];
					$jumlah_dana_disetujui = $dataExcel1['jumlah_dana_disetujui'];
					$deskripsi = $dataExcel1['deskripsi'];


					$objPHPExcel->getActiveSheet(0)->getStyle('O' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('O' . $row, $id, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('O')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('P' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('P' . $row, $kategori_mustahik, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('P')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('Q' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('Q' . $row, $jumlah_dana, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('Q')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('R' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('R' . $row, $jumlah_dana_disetujui, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('R')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('S' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('S' . $row, $deskripsi, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('S')->setAutoSize(true);

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
						array_push($empty_message, "No at row "  . $keys . " Id Ansaf Regitrasi harus di isi");
					}
					if (!$value[1]) {
						array_push($empty_message, "No at row "  . $keys . " Dana harus di isi");
					}
					if (!$value[2]) {
						array_push($empty_message, "No at row "  . $keys . "Type harus di isi");
					}
					

					if (!empty($empty_message)) {
						$ret['msg'] = $empty_message;
						$this->session->set_flashdata('message', '' . json_encode($ret['msg']));
						$result = 2;
					} else {

						$arrayCustomerQuote = array(
							'ansaf'  => $value[0],
							'jumlah_dana'  => $value[1],
							'type'  => $value[2],
							'deskripsi' => $value[3],
							'createdAt'  => $value[4],
							'petugas'	=> $this->session->userdata('nip'),
						);
						$result = $this->model_penyaluranlangsung->insert($arrayCustomerQuote, 'master_penyaluran');
						$result = 1;
						$id = $this->db->insert_id();
						//print_r($id);exit;
						if ($id) {
							$arrayCustomerQuotedetail = array(
								'id_program' => $id,
								'id_mustahik' => $value[5],
								'createdAt'	=> date('Y-m-d H:i:s')
							);
							$result = $this->model_penyaluranlangsung->insert($arrayCustomerQuotedetail, 'list_mustahik');
							$result = 1;
						}
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
