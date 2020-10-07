<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_laporanrencanarealisasiberdasarkanasnaf extends CI_Controller
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
				'page_content' 	=> '/laporanrencanarealisasiberdasarkanasnaf/view',
				'ribbon' 		=> '<li class="active">Dashboard</li><li>Laporan Penyaluran Rencana dan Realisasi Berdsarkan Asnaf </li>',
				'page_name' 	=> 'Laporan Penyaluran Rencana dan Realisasi Berdsarkan Asnaf',
				'js' 			=> 'js_file',
			);
			$this->render_view($data);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function laporanrencanarealisasiberdasarkanasnaf()
	{

		set_include_path(APPPATH . 'third_party/PHPExcel/Classes/');
		include 'PHPExcel/IOFactory.php';
		$objPHPExcel = new PHPExcel();
		$periode_awal = $this->input->post('periode_awal');
		$periode_akhir = $this->input->post('periode_akhir');
		$masterprogram = $this->model_lap_penyaluran->master_kategori_mustahik()->result_array();
		$no = 1;
		$row = 2;
		if (count($masterprogram) > 0) {
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', 'NO');
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B1', 'KETERANGAN');
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C1', 'RENCANA (Rp)');
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D1', 'REALISASI (Rp)');
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E1', 'CAPAIAN (Rp)');
			foreach ($masterprogram as $program) {
				$direncanakan = $program['direncanakan'];
				$disetujui = $program['disetujui'];

				$fakir = $this->model_lap_penyaluran->getfakirrencana($periode_awal, $periode_akhir)->result_array();
				$amil = $this->model_lap_penyaluran->getamilrencana($periode_awal, $periode_akhir)->result_array();
				$mualaf = $this->model_lap_penyaluran->getmualafrencana($periode_awal, $periode_akhir)->result_array();
				$riqob = $this->model_lap_penyaluran->getriqobrencana($periode_awal, $periode_akhir)->result_array();

				$objPHPExcel->getActiveSheet(0)->getStyle('A' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
				$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('A' . $row, $no, PHPExcel_Cell_DataType::TYPE_STRING);
				$objPHPExcel->getActiveSheet(0)->getColumnDimension('A')->setAutoSize(true);

				$objPHPExcel->getActiveSheet(0)->getStyle('B' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
				$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('B' . $row, 'Penerima Manfaat Berdasarkan Asnaf', PHPExcel_Cell_DataType::TYPE_STRING);
				$objPHPExcel->getActiveSheet(0)->getColumnDimension('B'.$row)->setAutoSize(true);
				$objPHPExcel->getActiveSheet(0)->getStyle('B'.$row)->getFont()->setBold( true );

				$objPHPExcel->getActiveSheet(0)->getStyle('C' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
				$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('C' . $row, $direncanakan, PHPExcel_Cell_DataType::TYPE_STRING);
				$objPHPExcel->getActiveSheet(0)->getColumnDimension('C')->setAutoSize(true);

				$objPHPExcel->getActiveSheet(0)->getStyle('D' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
				$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('D' . $row, $disetujui, PHPExcel_Cell_DataType::TYPE_STRING);
				$objPHPExcel->getActiveSheet(0)->getColumnDimension('D')->setAutoSize(true);

				$objPHPExcel->getActiveSheet(0)->getStyle('A3')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
				$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('A3', '1.1', PHPExcel_Cell_DataType::TYPE_STRING);

				$objPHPExcel->getActiveSheet(0)->getStyle('B3')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
				$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('B3', 'Penerima Manfaat Asnaf Fakir Miskin', PHPExcel_Cell_DataType::TYPE_STRING);

				$objPHPExcel->getActiveSheet(0)->getStyle('C3')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
				$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('C3', $fakir[0]['direncanakan'], PHPExcel_Cell_DataType::TYPE_STRING);
				$objPHPExcel->getActiveSheet(0)->getColumnDimension('C')->setAutoSize(true);

				$objPHPExcel->getActiveSheet(0)->getStyle('D3')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
				$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('D3', $fakir[0]['disetujui'], PHPExcel_Cell_DataType::TYPE_STRING);

				$objPHPExcel->getActiveSheet(0)->getStyle('A4')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
				$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('A4', '1.2', PHPExcel_Cell_DataType::TYPE_STRING);
				$objPHPExcel->getActiveSheet(0)->getColumnDimension('A4')->setAutoSize(true);

				$objPHPExcel->getActiveSheet(0)->getStyle('B4')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
				$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('B4', 'Penerima Manfaat Asnaf Amil', PHPExcel_Cell_DataType::TYPE_STRING);

				$objPHPExcel->getActiveSheet(0)->getStyle('C4')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
				$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('C4', $amil[0]['direncanakan'], PHPExcel_Cell_DataType::TYPE_STRING);

				$objPHPExcel->getActiveSheet(0)->getStyle('D4')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
				$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('D4', $amil[0]['disetujui'], PHPExcel_Cell_DataType::TYPE_STRING);

				$objPHPExcel->getActiveSheet(0)->getStyle('A5')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
				$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('A5', '1.3', PHPExcel_Cell_DataType::TYPE_STRING);
				$objPHPExcel->getActiveSheet(0)->getColumnDimension('A5')->setAutoSize(true);

				$objPHPExcel->getActiveSheet(0)->getStyle('B5')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
				$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('B5', 'Penerima Manfaat Mualaf', PHPExcel_Cell_DataType::TYPE_STRING);

				$objPHPExcel->getActiveSheet(0)->getStyle('C5')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
				$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('C5', $mualaf[0]['direncanakan'], PHPExcel_Cell_DataType::TYPE_STRING);

				$objPHPExcel->getActiveSheet(0)->getStyle('D5')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
				$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('D5', $mualaf[0]['disetujui'], PHPExcel_Cell_DataType::TYPE_STRING);

				$objPHPExcel->getActiveSheet(0)->getStyle('A6')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
				$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('A6', '1.4', PHPExcel_Cell_DataType::TYPE_STRING);

				$objPHPExcel->getActiveSheet(0)->getStyle('B6')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
				$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('B6', 'Penerima Manfaat Riqob', PHPExcel_Cell_DataType::TYPE_STRING);

				$objPHPExcel->getActiveSheet(0)->getStyle('C6')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
				$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('C6', $riqob[0]['direncanakan'], PHPExcel_Cell_DataType::TYPE_STRING);

				$objPHPExcel->getActiveSheet(0)->getStyle('D6')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
				$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('D6', $riqob[0]['disetujui'], PHPExcel_Cell_DataType::TYPE_STRING);


				$objPHPExcel->getActiveSheet(0)->getStyle('A7')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
				$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('A7', '1.5', PHPExcel_Cell_DataType::TYPE_STRING);

				$objPHPExcel->getActiveSheet(0)->getStyle('B7')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
				$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('B7', 'Penerima Manfaat Gharimin', PHPExcel_Cell_DataType::TYPE_STRING);

				$objPHPExcel->getActiveSheet(0)->getStyle('C7')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
				$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('C7', $riqob[0]['direncanakan'], PHPExcel_Cell_DataType::TYPE_STRING);

				$objPHPExcel->getActiveSheet(0)->getStyle('D7')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
				$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('D7', $riqob[0]['disetujui'], PHPExcel_Cell_DataType::TYPE_STRING);

			}
			$row++;
			$no++;
			header('Content-Type: application/vnd.ms-excel; charset=utf-8');
			header('Content-Disposition: attachment; filename=Laporan_Penyaluran_Rencana_dan_Realisasi_Berdasarkan_Asnaf.xls');
			header('Cache-Control: max-age=0');
			ob_end_clean();
			ob_start();
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
			$filename = 'Sample' . 'csv';
			$objWriter->save('php://output');
		}
	}
}
