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
			$data = array(
				'tgl_reg'  => $this->input->post('tanggal'),
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
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function tampil_byid()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {

			$data = array(
				'id_pengawas'  => $this->input->post('id'),
			);
			$my_data = $this->model_karyawan->view_where('tbpengawas', $data)->result();
			echo json_encode($my_data);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}

	public function tampil()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {

			$my_data = $this->model_mustahik->viewOrdering('master_mustahik', 'id', 'desc')->result_array();
			echo json_encode($my_data);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
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

			foreach ($allDataInSheet as $ads) {
				if (array_filter($ads)) {
					array_push($data_exist, $ads);
				}
			}
			foreach ($data_exist as $key => $value) {
				if ($key == '0') {
					continue;
				} else {
					$arrayCustomerQuote = array(
						'NOINDUK' => $value[0],
						'NOREG' => $value[1],
						'NMSISWA' => $value[2],
						'TPLHR' => $value[3],
						'TGLHR' => $value[4],
						'JK' => $value[5],
						'AGAMA' => $value[6],
						'TAHUN' => $value[7],
						'PS' => $value[8],
						'KDWARGA' => $value[9],
						'EMAIL' => $value[10],
						'TELP' => $value[11],
						'createdAt'    => date('Y-m-d H:i:s')
					);
					$result = $this->model_karyawan->insert($arrayCustomerQuote, 'tbpengawas');
				}
			}
			if ($result) {
				$result = 1;
			}

			echo json_encode($result);
		} else {
			echo json_encode($result);
		}
	}
	public function update()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {

			$data_id = array(
				'id_pengawas'  => $this->input->post('e_id')
			);
			$config['upload_path']          = './assets/gambar';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['encrypt_name'] = TRUE;
			$password = hash('sha512', md5($this->input->post('e_password')));
			$this->load->library('upload', $config);
			if ($this->upload->do_upload("e_file")) {
				$data = array('upload_data' => $this->upload->data());
				$foto = $data['upload_data']['file_name'];
				$data = array(
					'nip'  => $this->input->post('nip'),
					'nama'  => $this->input->post('nama'),
					'jabatan'  => $this->input->post('jabatan'),
					'username'  => $this->input->post('email'),
					'password'  => $password,
					'level' => $this->input->post('level'),
					'status'  => 1,
					'gambar'  => $foto,
					'updatedAt' => date('Y-m-d H:i:s')
				);
				$result = $this->model_karyawan->update($data_id, $data, 'tbpengawas');
				echo json_decode($result);
			} else {
				$data = array(
					'nip'  => $this->input->post('e_nip'),
					'nama'  => $this->input->post('e_nama'),
					'jabatan'  => $this->input->post('e_jabatan'),
					'username'  => $this->input->post('e_email'),
					'password'  => $password,
					'level' => $this->input->post('e_level'),
					'status'  => $this->input->post('e_status'),
					'gambar'  => null,
					'updatedAt' => date('Y-m-d H:i:s')
				);
				$result = $this->model_karyawan->update($data_id, $data, 'tbpengawas');
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
				'id_pengawas'  => $this->input->post('id')
			);
			$data = array(
				'isdeleted'  => 1,
			);
			$action = $this->model_karyawan->update($data_id, $data, 'tbpengawas');
			echo json_encode($action);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}
}
