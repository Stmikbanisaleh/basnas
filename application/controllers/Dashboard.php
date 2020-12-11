<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('model_jabatan');
		$this->load->model('Model_dashboard');
	}

	function render_view($data)
	{	
		$this->template->load('template', $data); //Display Page
	}
	function crousel()
	{
		$this->load->view('crouselmenu');
	}

	public function index()
	{
		// echo date('Y-m-d H:i:s');
		$jabatan = $this->model_jabatan->view('master_jabatan')->result_array();
		$data1 = array('jabatan' => $jabatan);
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
			//$jabatan = $this->model_jabatan->view('master_jabatan')->result_array();
			$countfitrah = $this->Model_dashboard->getZakatFitrah();
			$countmaal = $this->Model_dashboard->getZakatMaal();
			$countinfaq = $this->Model_dashboard->getInfaq();
			$grafikMasuk = $this->Model_dashboard->getGrafikMasuk()->result_array();
			$getGrafikKeluar = $this->Model_dashboard->getGrafikKeluar()->result_array();
			$data = array(
				'page_content' 	=> 'dashboard',
				'ribbon' 		=> '<li class="active">Dashboard</li>',
				'page_name' 	=> 'Dashboard',
				'countfitrah'	=> $countfitrah,
				'countmaal'		=> $countmaal,
				'countinfaq'	=> $countinfaq,
				'grafikMasuk'	=> $grafikMasuk,
				'getGrafikKeluar'	=> $getGrafikKeluar,
			);
			$this->render_view($data); //Memanggil function render_view
		} else {
			$this->load->view('page/login',$data1); //Memanggil function render_view
		}
	}

	public function login()
	{
		$email = $this->input->post('email');
		$jabatan = $this->input->post('jabatan');
		$password = hash('sha512',md5($this->input->post('password')));
		$query = $this->db->query("select * from users where nip ='" . $email . "' and password = '".$password."' and status = 1");
		if ($query->num_rows() == 1) {
			$data = $query->result_array();
			$this->load->library('Configfunction');
			foreach ($data as $value) {
				$insert_log = $this->configfunction->insertlog($value['nama'],$value['nip'], date('Y-m-d H:i:s'),$this->input->ip_address());
				$data = [
					'username' => $value['username'],
					'nama' => $value['nama'],
					'nip' => $value['nip'],
					'jabatan' => $value['jabatan'],
					'level' => $value['level'],
				];
			}
			$this->session->set_userdata($data);
			redirect('dashboard/index');
		} else {
			$this->session->set_flashdata('category_error', 'Email atau password salah');
			redirect('dashboard/index');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('dashboard/index');
	}

	private function _send_email($token, $type)
	{
		require 'assets/PHPMailer/PHPMailerAutoload.php';


		$mail = new PHPMailer;

		// Konfigurasi SMTP
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'dummyarif3228@gmail.com';
		$mail->Password = '1234dummy';
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587;
		$mail->setFrom('dummyarif3228@gmail.com');
		// Menambahkan penerima
		$mail->addAddress($this->input->post('email'));
		// Menambahkan beberapa penerima
		if ($type == 'verify') {
			// Subjek email
			$mail->Subject = 'Manajemen Teknologi LAPAN - Verifikasi akun';

			// Mengatur format email ke HTML
			$mail->isHTML(true);

			// Konten/isi email
			$mailContent = 'Klik untuk aktivasi <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>';

			$mail->Body = $mailContent;
			// Menambahakn lampiran
			//$mail->addAttachment('berita/'.$file);
			//$mail->addAttachment('lmp/file2.png', 'nama-baru-file2.png'); //atur nama baru

		}

		// Kirim email
		if (!$mail->send()) {
			$pes = 'Pesan tidak dapat dikirim.';
			$mai = 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			$pes = 'Pesan telah terkirim';
		}
	}

	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('msuser', ['email' => $email])->row_array();

		if ($user) {
			$user_token  = $this->db->get_where('msusertoken', ['token' => $token])->row_array();

			if ($user_token) {
				$this->db->set('is_active', 3);
				$this->db->where('email', $email);
				$this->db->update('msuser');

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Aktivasi berhasil,silahkan Login</div>');
				redirect('auth');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Aktivasi gagal,token salah</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Aktivasi gagal,User salah</div>');
			redirect('auth');
		}
	}
}
