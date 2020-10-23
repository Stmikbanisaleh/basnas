<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_profile');
		$this->load->model('model_jabatan');
		if (empty($this->session->userdata('username')) && empty($this->session->userdata('nama'))) {
            $this->session->set_flashdata('category_error', 'Silahkan masukan username dan password');
            redirect('dashboard/login');
        }
	}

	function render_view($data)
	{
		$this->template->load('template', $data); //Display Page
	}


	public function datadiri()
    {
        if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
			$where = array(
				'nip' => $this->session->userdata('nip'));
			$mydata = $this->model_profile->viewWhereOrdering('users',$where);
            $data = array(
                'page_content'     => 'profile/editprofile',
                'ribbon'         => '<li class="active">Dashboard</li><li>Edit Profile</li>',
                'page_name'     => 'Edit Profile',
				'js'             => 'js_file',
				'nip' => $mydata->nip,
				'nama' => $mydata->nama,
				'email' => $mydata->email,
				'password' => $mydata->password,
            );
            $this->render_view($data);
        } else {
            $this->load->view('page/login'); //Memanggil function render_view
        }
	}
	public function update()
    {
        if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
			
            $data_id = array(
                'nip'  => $this->input->post('e_nip')
			);
			$password = hash('sha512',md5($this->input->post('password')));
			print_r($password);exit;
            $data = array(
                'nama'  => $this->input->post('e_nama'),
                'jabatan'  => $this->input->post('e_jabatan'),
                'email'  => $this->input->post('e_email'),
                'password'  => $password,
                'updatedAt' => date('Y-m-d H:i:s'),
            );
            $this->model_profile->update($data_id, $data, 'users');
			//echo json_encode($action);
			redirect(site_url('dashboard'));  //Display Page
        } else {
            $this->load->view('page/login'); //Memanggil function render_view
        }
    }
}
