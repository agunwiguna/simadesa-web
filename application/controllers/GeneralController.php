<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GeneralController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MasterModel','mm');
		$this->load->model('NewsModel','nm');
	}

	public function index()
	{
		$data = array(
			'perangkatDesa' => $this->mm->getDataPerangkatDesa(),
			'infoHotBerita' => $this->nm->getHotLatestDataNews(),
			'infoBerita' => $this->nm->getLatestDataNews(),
			'title' => 'Home'
		);
		$this->load->view('general/secure');
		$this->load->view('general/header',$data);
		$this->load->view('general/home',$data);
		$this->load->view('general/footer');
	}

}