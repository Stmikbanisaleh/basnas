<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sub_program extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
        $this->load->model('model_sub_program');
        $this->load->model('model_program');
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
			$prog = $this->model_program->viewOrdering('master_program', 'id', 'asc')->result_array();

			$data = array(
				'page_content' 	=> '/sub_program/view',
				'ribbon' 		=> '<li class="active">Dashboard</li><li>Master Sub Program</li>',
				'page_name' 	=> 'Master Sub Program',
                'js' 			=> 'js_file',
                'prog'          => $prog
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
                    'id_master_program'  => $this->input->post('id_master_program'),
					'deskripsi'  => $this->input->post('deskripsi'),
					'bidang'  => $this->input->post('bidang'),
                    'createdAt' => date('Y-m-d H:i:s'),
                );
                $action = $this->model_sub_program->insert($data, 'master_sub_program');
                echo json_encode($action);
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
            $my_data = $this->model_sub_program->view_where('master_sub_program', $data)->result();
            echo json_encode($my_data);
        } else {
            $this->load->view('page/login'); //Memanggil function render_view
        }
	}

	public function tampil()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {

			$my_data = $this->model_sub_program->getprog('id', 'asc')->result();
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
                'id_master_program'  => $this->input->post('e_id_master_program'),
				'deskripsi'  => $this->input->post('e_deskripsi'),
				'bidang'  => $this->input->post('e_bidang'),
                'updatedAt' => date('Y-m-d H:i:s'),
            );
            $action = $this->model_sub_program->update($data_id, $data, 'master_sub_program');
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
			$action = $this->model_sub_program->delete($data_id, 'master_sub_program');
			echo json_encode($action);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}
}
