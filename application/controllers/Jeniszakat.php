<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jeniszakat extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_jeniszakat');
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
			

			$data = array(
				'page_content' 	=> '/jeniszakat/view',
				'ribbon' 		=> '<li class="active">Dashboard</li><li>Master Jenis Zakat</li>',
				'page_name' 	=> 'Master Jenis Zakat',
				'js' 			=> 'js_file'
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
                    'nama'  => $this->input->post('nama'),
                    'createdAt' => date('Y-m-d H:i:s'),
                );
                $action = $this->model_jeniszakat->insert($data, 'master_jenis_zakat');
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
            $my_data = $this->model_jeniszakat->view_where('master_jenis_zakat', $data)->result();
            echo json_encode($my_data);
        } else {
            $this->load->view('page/login'); //Memanggil function render_view
        }
	}

	public function tampil()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {

			$my_data = $this->model_jeniszakat->viewOrdering('master_jenis_zakat', 'id', 'asc')->result();
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
                'nama'  => $this->input->post('e_nama'),
                
            );
            $action = $this->model_jeniszakat->update($data_id, $data, 'master_jenis_zakat');
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
			$action = $this->model_jeniszakat->delete($data_id, 'master_jenis_zakat');
			echo json_encode($action);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}
}
