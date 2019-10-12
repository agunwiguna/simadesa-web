<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GeneralController extends CI_Controller {

	public function index()
	{
		$data = array(
			'title' => 'Home'
		);
		$this->load->view('general/secure');
		$this->load->view('general/header',$data);
		$this->load->view('general/home',$data);
		$this->load->view('general/footer');
	}

}