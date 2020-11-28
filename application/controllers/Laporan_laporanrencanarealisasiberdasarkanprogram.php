<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_laporanrencanarealisasiberdasarkanprogram extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_lap_penyaluran');
		$this->load->library('mainfunction');
	}

	function render_view($data)
	{
		$this->template->load('template', $data); //Display Page
	}

	public function index()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
			$data = array(
				'page_content' 	=> '/lap_penyaluran/view',
				'ribbon' 		=> '<li class="active">Dashboard</li><li>Laporan Penyaluran Rencana dan Realisasi Berdasarkan Program</li>',
				'page_name' 	=> 'Laporan Penyaluran Rencana dan Realisasi Berdasarkan Program',
				'js' 			=> 'js_file',
			);
			$this->render_view($data);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function laporanrencanarealisasiberdasarkanprogram()
	{

		set_include_path(APPPATH . 'third_party/PHPExcel/Classes/');
		include 'PHPExcel/IOFactory.php';
		$objPHPExcel = new PHPExcel();
		$periode_awal = $this->input->post('periode_awal');
		$periode_akhir = $this->input->post('periode_akhir');
		$status = $this->input->post('is_approve');
		$masterprogram = $this->model_lap_penyaluran->getmasterprogram()->result_array();
		$no = 1;
		$row = 2;
		$no2 = 1;
		if (count($masterprogram) > 0) {
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', 'NO');
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B1', 'KETERANGAN');
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C1', 'RENCANA (Rp)');
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D1', 'REALISASI (Rp)');
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E1', 'CAPAIAN (Rp)');
			foreach ($masterprogram as $program) {
				$namaprogram = $program['nama'];
				$direncanakan = $program['direncanakan'];
				$disetujui = $program['disetujui'];

				$objPHPExcel->getActiveSheet(0)->getStyle('A' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
				$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('A' . $row, $no, PHPExcel_Cell_DataType::TYPE_STRING);
				$objPHPExcel->getActiveSheet(0)->getColumnDimension('A')->setAutoSize(true);

				$objPHPExcel->getActiveSheet(0)->getStyle('B' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
				$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('B' . $row, $namaprogram, PHPExcel_Cell_DataType::TYPE_STRING);
				$objPHPExcel->getActiveSheet(0)->getColumnDimension('B'.$row)->setAutoSize(true);
				$objPHPExcel->getActiveSheet(0)->getStyle('B'.$row)->getFont()->setBold( true );

				$objPHPExcel->getActiveSheet(0)->getStyle('C' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
				$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('C' . $row, $direncanakan, PHPExcel_Cell_DataType::TYPE_STRING);
				$objPHPExcel->getActiveSheet(0)->getColumnDimension('C')->setAutoSize(true);

				$objPHPExcel->getActiveSheet(0)->getStyle('D' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
				$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('D' . $row, $disetujui, PHPExcel_Cell_DataType::TYPE_STRING);
				$objPHPExcel->getActiveSheet(0)->getColumnDimension('D')->setAutoSize(true);

				$subprogram = $this->model_lap_penyaluran->getlaporanrencanarealisasiberdasarkanprogram($periode_awal, $periode_akhir, $status, $program['id'])->result_array();
				$no3 = 1;
				foreach ($subprogram as $value) {
					$row = $row + 1;
					$sub = $value['deskripsi'];
					$subdirencanakan = $value['direncanakan'];
					$subdisetujui = $value['disetujui'];

					$objPHPExcel->getActiveSheet(0)->getStyle('A' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('A' . $row, $no2 . '.' . $no3, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('A')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('B' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('B' . $row, $sub, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('B')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('C' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('C' . $row, $subdirencanakan, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('C')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('D' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('D' . $row, $subdisetujui, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('D')->setAutoSize(true);
					$no3++;
				}
				$no2++;
				$row++;
				$no++;

			}
			$row++;
			$no++;
			header('Content-Type: application/vnd.ms-excel; charset=utf-8');
			header('Content-Disposition: attachment; filename=Laporan_Penyaluran_Rencana_dan_Realisasi_Berdasarkan_Program.xls');
			header('Cache-Control: max-age=0');
			ob_end_clean();
			ob_start();
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
			$filename = 'Sample' . 'csv';
			$objWriter->save('php://output');
		}
	}
}
