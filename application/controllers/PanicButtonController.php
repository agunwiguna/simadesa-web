<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PanicButtonController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if ($this->session->userdata("logged")<>1) {
	      redirect(site_url('login'));
	    }
	}

	public function index()
	{
		
	}

}

/* End of file PanicButtonController.php */
/* Location: ./application/controllers/PanicButtonController.php */