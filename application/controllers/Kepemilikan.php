<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kepemilikan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_kepemilikan');
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
				'page_content' 	=> '/kepemilikan/view',
				'ribbon' 		=> '<li class="active">Dashboard</li><li>Master Kepemilikan</li>',
				'page_name' 	=> 'Master Kepemilikan',
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
                $action = $this->model_kepemilikan->insert($data, 'master_kepemilikan');
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
            $my_data = $this->model_kepemilikan->view_where('master_kepemilikan', $data)->result();
            echo json_encode($my_data);
        } else {
            $this->load->view('page/login'); //Memanggil function render_view
        }
	}

	public function tampil()
	{
		if ($this->session->userdata('username') != null && $this->session->userdata('nama') != null) {

			$my_data = $this->model_kepemilikan->viewOrdering('master_kepemilikan', 'id', 'asc')->result();
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
            $action = $this->model_kepemilikan->update($data_id, $data, 'master_kepemilikan');
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
			$action = $this->model_kepemilikan->delete($data_id, 'master_kepemilikan');
			echo json_encode($action);
		} else {
			$this->load->view('page/login'); //Memanggil function render_view
		}
	}
}
