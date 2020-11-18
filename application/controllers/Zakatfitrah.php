<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Zakatfitrah extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_zakatfitrah');
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
			$mymuzakki = $this->model_zakatfitrah->viewOrdering('master_muzakki', 'nama', 'asc')->result_array();
			$data = array(
				'page_content' 	=> '/zakatfitrah/view',
				'ribbon' 		=> '<li class="active">Dashboard</li><li>Transaksi Zakat Fitrah</li>',
				'page_name' 	=> 'Transaksi Zakat Fitrah',
				'js' 			=> 'js_file',
				'mymuzakki'		=> $mymuzakki,
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
			$data = $this->input->post('id');
			$my_data = $this->model_zakatfitrah->viewData('master_zakat', $data)->result();
			echo json_encode($my_data);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function tampil()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {

			$my_data = $this->model_zakatfitrah->viewOrderingZakat('master_muzakki', 'id', 'asc')->result_array();
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
				'id_muzakki'  => $this->input->post('e_nama'),
				'cara_terima'  => $this->input->post('e_penerimaan'),
				'tgl_terima'  => $this->input->post('e_tanggal'),
				'total_terima'  => $this->input->post('e_total_v'),
				'deskripsi'  => $this->input->post('e_deskripsi'),
				'norek'  => $this->input->post('e_norek'),
				'updatedAt' => date('Y-m-d H:i:s'),
			);
			$result = $this->model_zakatfitrah->update($data_id, $data, 'master_zakat');
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

			$action = $this->model_zakatfitrah->delete($data_id, 'master_zakat');
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
		$id_zakatfitrah = $this->model_zakatfitrah->joinzakat()->result_array();
		$data = $id_zakatfitrah;
		$no = 1;
		$row = 2;
		if (count($data) > 0) {
			if ($data) {
				$key = array_keys($data[0]);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', 'Nama Muzakki');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B1', 'Cara Terima');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C1', 'Tgl Terima');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D1', 'No Rek');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E1', 'Jenis');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F1', 'Total terima');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G1', 'Deskripsi');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H1', 'Petugas');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I1', 'Jenis Zakat');

				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A2', '15');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B2', 'Tunai');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C2', '2020-10-04');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D2', '5');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E2', '1');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F2', '1500000');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G2', 'import');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H2', '123456');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I2', '');

				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A3', '17');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B3', 'Tunai');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C3', '2020-10-04');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D3', '7');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E3', '1');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F3', '1500000');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G3', 'import');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H3', '123456');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I3', '');

				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('K1', 'Id Muzakki');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L1', 'Nama Muzakki');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('M1', 'Cara Terima');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('M2', 'Transfer');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('M3', 'Tunai');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('N1', 'Tgl Terima');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('O1', 'ID NOREK');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('P1', 'NOREK');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Q1', 'BANK');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('R1', 'Jenis');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('S1', 'Total Terima');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('T1', 'Deskripsi');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('U1', 'Petugas');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('V1', 'Jenis Zakat');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('W1', 'Nama Jenis Zakat');
				foreach ($data as $dataExcel) {
					$id_muzakki = $dataExcel['id_muzakki'];
					$nama = $dataExcel['nama'];
					$tgl_terima = $dataExcel['tgl_terima'];
					$rek = $dataExcel['rek'];
					$nokartu = $dataExcel['nokartu'];
					$namabank = $dataExcel['namabank'];
					$jenis = $dataExcel['jenis'];
					$total_terima = $dataExcel['total_terima'];
					$deskripsi = $dataExcel['deskripsi'];
					$petugas = $dataExcel['petugas'];
					$jenis_zakat = $dataExcel['jenis_zakat'];
					$nama_jenis_zakat = $dataExcel['nama_jenis_zakat'];

					$objPHPExcel->getActiveSheet(0)->getStyle('K' . $row)->getNumberFormat()->setFormatCode('yyyy-mm-dd');
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('K' . $row, $id_muzakki, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('K')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('L' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('L' . $row, $nama, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('L')->setAutoSize(true);


					$objPHPExcel->getActiveSheet(0)->getStyle('N' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('N' . $row, $tgl_terima, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('N')->setAutoSize(true);


					$objPHPExcel->getActiveSheet(0)->getStyle('O' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('O' . $row, $rek, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('O')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('P' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('P' . $row, $nokartu, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('P')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('Q' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('Q' . $row, $namabank, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('Q')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('R' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('R' . $row, $jenis, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('R')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('S' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('S' . $row, $total_terima, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('S')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('T' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('T' . $row, $deskripsi, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('T')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('U' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('U' . $row, $petugas, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('U')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('V' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('V' . $row, $jenis_zakat, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('V')->setAutoSize(true);

					$objPHPExcel->getActiveSheet(0)->getStyle('W' . $row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
					$objPHPExcel->getActiveSheet(0)->setCellValueExplicit('W' . $row, $nama_jenis_zakat, PHPExcel_Cell_DataType::TYPE_STRING);
					$objPHPExcel->getActiveSheet(0)->getColumnDimension('W')->setAutoSize(true);

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
						array_push($empty_message, "No at row "  . $keys . " Id Muzakki Regitrasi harus di isi");
					}
					
					
					

					if (!empty($empty_message)) {
						$ret['msg'] = $empty_message;
						$this->session->set_flashdata('message', '' . json_encode($ret['msg']));
						$result = 2;
					} else {

						$arrayCustomerQuote = array(
							'id_muzakki'  => $value[0],
							'cara_terima'  => $value[1],
							'tgl_terima'  => $value[2],
							'norek'  => $value[3],
							'total_terima' =>$value[5],
							'deskripsi' =>$value[6],
							'jenis'  => 1,
							'petugas'	=> $this->session->userdata('nip'),
							'createdAt' => date('Y-m-d H:i:s')
						);
						$result = $this->model_zakatfitrah->insert($arrayCustomerQuote, 'master_zakat');
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
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
			$data = $this->input->post('id');
			$my_data = $this->model_zakatfitrah->laporan_zakat('master_zakat', $data)->result();
			//echo $this->db->last_query();exit;
			// echo json_encode($my_data);
		
			$this->load->library('pdf');
		
			$this->pdf->setPaper('FOLIO', 'potrait');
			$this->pdf->filename = "Tanda-Terima-Zakatfitrah"."-".date('Y-m-d').".pdf";
			$this->pdf->load_view('zakatfitrah/transaksi_zakatfitrah', $my_data);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	
	}
	// public function laporan_pdf(){
    //     $tgl = $this->mainfunction->tgl_indo(date('Y-m-d'));
    //     $nis = $this->input->post('siswa');
    //     $kelas = $this->input->post('kelas');  
    //     $my_pembsiswa = $this->model_surattagihan->view_siswatg($nis, $kelas)->row();
    //     $thnakad = $this->configfunction->getthnakd();
    //     $this->load->library('pdf');

    //     $setting = $this->model_surattagihan->view('sys_config','id','asc')->row();
    //     if($my_pembsiswa!=null){
    //         $data = array(
    //             'mydata'      => $my_pembsiswa,
    //             'tgl'         => $tgl,
    //             'setting'     => $setting,
    //             'thnakad'     => $thnakad[0]['THNAKAD']

    //         );
    //         $this->pdf->setPaper('FOLIO', 'potrait');
    //         $this->pdf->filename = "Surat-Tagihan".$nis."-".date('Y-m-d').".pdf";
    //         $this->pdf->load_view('pagekasir/surattagihan/laporan', $data);
    //     }else{
    //         $this->session->set_flashdata('cat_success', 'Data Tidak Ditemukan!');
    //         header("Location: ".base_url()."modulkasir/surattagihan");
    //     }
    // }
}
