<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('model_akun');
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

    public function index()
    {
        if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {
            $jab = $this->model_jabatan->viewOrdering('master_jabatan', 'id', 'asc')->result_array();

            $data = array(
                'page_content'     => '/akun/view',
                'ribbon'         => '<li class="active">Dashboard</li><li>Master Akun</li>',
                'page_name'     => 'Master Akun',
                'js'             => 'js_file',
                'jab'           => $jab
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
                'id'  => $this->input->post('id'),
                'nip'  => $this->input->post('nip'),
                'nama'  => $this->input->post('nama'),
                'jabatan'  => $this->input->post('jabatan'),
                'username'  => $this->input->post('email'),
                'email'    => $this->input->post('email'),
                'password'  => hash('sha512', md5($this->input->post('password'))),
                'level' => $this->input->post('level'),
                'status'  => 1,
                'createdAt' => date('Y-m-d H:i:s'),
			);

			$validation = array(
                'nip'  => $this->input->post('nip')
			);
			$cek = $this->model_akun->viewWhereOrdering('users', $validation, 'id', 'asc')->num_rows();
			if($cek > 0){
				echo json_encode(401);
			} else {
				$action = $this->model_akun->insert($data, 'users');
				echo json_encode($action);
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
            $my_data = $this->model_akun->view_where('users', $data)->result();
            echo json_encode($my_data);
        } else {
            $this->load->view('page/login'); //Memanggil function render_view
        }
    }

    public function tampil()
    {
        if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {

            $my_data = $this->model_akun->view_user()->result_array();
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
                'nip'  => $this->input->post('e_nip'),
                'nama'  => $this->input->post('e_nama'),
                'jabatan'  => $this->input->post('e_jabatan'),
                'username'  => $this->input->post('e_email'),
                'password'  => hash('sha512', md5($this->input->post('e_password'))),
                'level' => $this->input->post('e_level'),
                'status'  => $this->input->post('e_status'),
                'updatedAt' => date('Y-m-d H:i:s'),
            );
            $action = $this->model_akun->update($data_id, $data, 'users');
            echo json_encode($action);
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
            $action = $this->model_akun->delete($data_id, 'users');
            echo json_encode($action);
        } else {
            $this->load->view('page/login'); //Memanggil function render_view
        }
    }
}
