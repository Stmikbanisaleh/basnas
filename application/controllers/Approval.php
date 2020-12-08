<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Approval extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_approval');
		// $this->load->library('Libs_fpdf');
		if (empty($this->session->userdata('username')) && empty($this->session->userdata('nama'))) {
			$this->session->set_flashdata('category_error', 'Silahkan masukan username dan password');
			redirect('dashboard/login');
		}
	}

	function render_view($data)
	{
		$this->template->load('template', $data); //Display Page
	}

	public function shownpwp()
	{
		$ps = array(
			'id' => $this->input->post('ps')
		);
		$my_data = $this->model_zakatfitrah->view_where('master_muzakki', $ps)->result_array();
		$npwz = $my_data[0]['npwp'];
		echo $npwz;
	}

	public function index()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
			$mypenyaluran = $this->model_approval->viewWhereOrderingpenyalur('master_penyaluran', 'id', 'asc')->result_array();
			$data = array(
				'page_content' 	=> '/approval/view',
				'ribbon' 		=> '<li class="active">Dashboard</li><li>Approval</li>',
				'page_name' 	=> 'Approval Transaksi Penyaluran',
				'js' 			=> 'js_file',
				'mymuzakki'		=> $mypenyaluran,
			);
			$this->render_view($data);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function shownorek()
	{
		$ps = array(
			'id_muzakki' => $this->input->post('ps')
		);
		$my_data = $this->model_zakatfitrah->view_where('master_rekening', $ps)->result_array();
		echo "<option value='0'>--Pilih  --</option>";
		foreach ($my_data as $value) {
			echo "<option value='" . $value['id'] . "'>[" . $value['namabank'] . '-' . $value['nokartu'] . "] </option>";
		}
	}

	public function simpan()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
			$data = array(
				'id_muzakki'  => $this->input->post('nama'),
				'cara_terima'  => $this->input->post('penerimaan'),
				'tgl_terima'  => $this->input->post('tanggal'),
				'total_terima'  => $this->input->post('total_v'),
				'deskripsi'  => $this->input->post('deskripsi'),
				'jenis'  => 1,
				'norek'  => $this->input->post('norek'),
				'createdAt' => date('Y-m-d H:i:s'),
				'petugas'	=> $this->session->userdata('nip')
			);
			$result = $this->model_zakatfitrah->insert($data, 'master_zakat');
			echo json_decode($result);
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
			$my_data = $this->model_approval->view_where('master_penyaluran', $data)->result();
			echo json_encode($my_data);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function tampil()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {

			$my_data = $this->model_approval->viewWhereOrderingpenyalur('master_penyaluran', 'id', 'asc')->result();
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
			$data = array(
				'is_approve'  => $this->input->post('e_status'),
				'jumlah_dana_disetujui'  => $this->input->post('e_total_v'),
				'petugas_approve'  => $this->session->userdata('nip'),
				'updatedAt' => date('Y-m-d H:i:s'),
			);
			$result = $this->model_approval->update($data_id, $data, 'master_penyaluran');
			echo json_decode($result);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function downloadsample()
	{
		set_include_path(APPPATH . 'third_party/PHPExcel/Classes/');
		include 'PHPExcel/IOFactory.php';
		$objPHPExcel = new PHPExcel();
		$id_approve = $this->model_approval->joinapproval()->result_array();
		//echo $this->db->last_query();exit;
		$data = $id_approve;
		$no = 1;
		$row = 2;
		if (count($data) > 0) {
			if ($data) {
				$key = array_keys($data[0]);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', 'ID Penyaluran');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B1', 'Approval');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C1', 'Jumlah Dana Di Setujui');

				//$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A2', '36');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B2', '2');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C2', '10000');

				//$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A3', '37');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B3', '2');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C3', '100000');

				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H1', 'Id Penyaluran');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I1', 'Id Ansaf');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J1', 'Nama Ansaf');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('K1', 'Id Type');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L1', 'Nama Type');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('M1', 'Di Ajukan');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('N1', 'Di Setujui');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('O1', 'Id Approve');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('P1', 'Approve');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('O2', '0');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('P2', 'Unapprove');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('O2', '1');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('P2', 'Approved');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('O3', '2');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('P3', 'Completed');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('O4', '3');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('P4', 'Rejected');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Q1', 'Deskripsi');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('R1', 'Tanggal');

				foreach ($data as $dataExcel) {
					$id = $dataExcel['id_penyalur'];
					$id_ansaf = $dataExcel['ansaf'];
					$nama_ansaf = $dataExcel['nama_ansaf'];
					$id_type = $dataExcel['type'];
					$nama_type = $dataExcel['nama_type'];
					$nominal = $dataExcel['Nominal'];
					$nominal1 = $dataExcel['Nominal2'];
					$deskripsi = $dataExcel['deskripsi'];
					$tanggal = $dataExcel['createdAt'];

					$objPHPExcel->getActiveSheet(0)->getStyle('A' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('A' . $row, $id, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('A')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('H' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('H' . $row, $id, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('H')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('I' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('I' . $row, $id_ansaf, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('I')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('J' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('J' . $row, $nama_ansaf, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('J')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('K' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('K' . $row, $id_type, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('K')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('L' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('L' . $row, $nama_type, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('L')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('M' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('M' . $row, $nominal, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('M')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('N' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('N' . $row, $nominal1, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('N')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('Q' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('Q' . $row, $deskripsi, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('Q')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('R' . $row)->getNumberFormat()->setFormatCode('yyyy-mm-dd');
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('R' . $row, $tanggal, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('R')->setAutoSize(true);

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
						array_push($empty_message, "No at row "  . $keys . " ID harus di isi");
					}
					if (!$value[1]) {
						array_push($empty_message, "No at row "  . $keys . " Approval harus di isi");
					}
					if (!$value[2]) {
						array_push($empty_message, "No at row "  . $keys . " Dana harus di isi");
					}

					if (!empty($empty_message)) {
						$ret['msg'] = $empty_message;
						$this->session->set_flashdata('message', '' . json_encode($ret['msg']));
						$result = 2;
					} else {
						$data_id = array(
							'id'  => $value[0]
						);
						$arrayCustomerQuote = array(
							'is_approve'  => $value[1],
							'jumlah_dana_disetujui'  => $value[2],
							'petugas_approve'  => $this->session->userdata('nip'),
							'updatedAt' => date('Y-m-d H:i:s')
						);
						$result = $this->model_approval->update($data_id, $arrayCustomerQuote, 'master_penyaluran');
						//echo $this->db->last_query();exit;
						//print_r($data_id);exit;
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
	
	public function laporan_pdf()
	{
		$id = $this->input->get('id');
		$urutan = +1;
		$filename = "Kuitansi-Pembayaran". date('Y-m-d');
		$data = array(
			'my_data' => $this->model_approval->laporan_approval('master_penyaluran', $id)->result(),
			'no' => sprintf("%05s", $urutan++),
			'filename'	=> $filename
		);
		$this->load->view('page/approval/kuitansi_pembayaran', $data);
	}

	function laporan_pdf_fpdf()
	{
		$id = $this->input->get('id');
		$urutan = +1;
		$data = array(
			'my_data' => $this->model_approval->laporan_approval('master_penyaluran', $id)->result(),
			'no' => sprintf("%05s", $urutan++)
		);

		//PDF
		$pdf = new FPDF('L', 'mm', array(100, 200));
		$fileName = "Kuitansi-Pembayaran" . "-" . $data['my_data'][0]->mustahik . "-" . date('Y-m-d') . ".pdf";

		$pdf->AddPage();

		$pdf->SetFont('Arial', 'B', 16);
		$pdf->Cell(0, 7, 'KUITANSI PEMBAYARAN', 0, 1, 'C');
		$pdf->Cell(10, 7, '', 0, 1);

		$pdf->MultiCell(190,10,$pdf->WriteHTML('dasas'));



		// $pdf->SetFont('Arial', 'B', 10);
		// $pdf->Cell(10, 6, 'No', 1, 0, 'C');
		// $pdf->Cell(90, 6, 'Nama Pegawai', 1, 0, 'C');
		// $pdf->Cell(120, 6, 'Alamat', 1, 0, 'C');
		// $pdf->Cell(40, 6, 'Telp', 1, 1, 'C');

		// $pdf->SetFont('Arial', '', 10);
		$pdf->Output();
		// $pdf->Output($fileName, 'D'); Auto Download
		//End PDF
	}
}
