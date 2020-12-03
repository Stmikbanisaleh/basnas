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
		$muzakki = $this->model_zakatfitrah->viewOrdering('master_muzakki','id','asc')->result_array();
		$data = $muzakki;
		$no = 1;
		$row = 2;
		if (count($data) > 0) {
			if ($data) {
				$key = array_keys($data[0]);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', 'ID Muzakki');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B1', 'Cara Terima');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C1', 'Tgl Terima');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D1', 'No Rek');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E1', 'Jenis');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F1', 'Total terima');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G1', 'Deskripsi');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H1', 'Petugas');

				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A2', '15');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B2', 'Tunai');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C2', '2020-10-04');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D2', '5');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E2', '1');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F2', '1500000');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G2', 'import');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H2', '123456');

				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A3', '17');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B3', 'Tunai');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C3', '2020-10-04');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D3', '7');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E3', '1');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F3', '1500000');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G3', 'import');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H3', '123456');

				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('K1', 'Id Jenis');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L1', 'Nama Jenis');
		
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('K2', '1');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L2', 'Zakat Fitrah');
			
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('K3', '2');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L3', 'Zakat Mal');

				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('K4', '3');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L4', 'Infaq');

				header('Content-Type: application/vnd.ms-excel; charset=utf-8');
				header('Content-Disposition: attachment; filename=Format_upload_transaksi_zakat_fitrah.xls');
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
			set_include_path(APPPATH . 'third_party/PHPExcel/Classes/');
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
							'total_terima' => $value[5],
							'deskripsi' => $value[6],
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
		$id = $this->input->get('id');
		$mydata = $this->model_zakatfitrah->laporan_zakat('master_zakat', $id)->result();
		$filename = "Tanda-Terima-Zakatfitrah". "-" .$mydata[0]->nama . "-" . date('Y-m-d');
		$data = array(
			'my_data' => $mydata,
			'filename'	=> $filename
		);
		$this->load->view('page/zakatfitrah/transaksi_zakatfitrah', $data);
	}
}
