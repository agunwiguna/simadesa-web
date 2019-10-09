<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata("logged")<>1) {
	      redirect(site_url('login'));
	    }
	}

	public function index()
	{
		$data = array(
			'title' => 'Dashboard',
			'active_menu_db' => 'active' 
		);
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/content',$data);
		$this->load->view('layouts/footer');
	}

}

/* End of file HomeController.php */
/* Location: ./application/controllers/HomeController.php */