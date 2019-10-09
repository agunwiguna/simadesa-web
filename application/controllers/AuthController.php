<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('AuthModel','auth');
	}

	public function index()
	{
		$this->load->view('auth/v_login');
	}

	public function login()
	{
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$login = $this->auth->login($this->input->post('username'), md5($this->input->post('password')));

			if ($login == 1) {
				$row = $this->auth->data_login($this->input->post('username'), md5($this->input->post('password')));
				$data = array(
					'logged' => TRUE,
					'username' => $row->username,
					'nama' => $row->nama,
				);
				$this->session->set_userdata($data);

				//$this->session->set_userdata('sukses_login','sukses');
				redirect(site_url('dashboard'));
			} else {
				$this->session->set_userdata('gagal_proses','gagal');
				$this->index();
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

}

/* End of file AuthController.php */
/* Location: ./application/controllers/AuthController.php */