<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MitigasiController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata("logged")<>1) {
	      redirect(site_url('login'));
	    }

		$this->load->model('MitigasiModel','mm');
	}

	public function index()
	{
		$data = array(
			'title' => 'Mitigasi Bencana',
			'active_menu_mitigasi' => 'active',
			'mitigasi' => $this->mm->getDataMitigasi()
		);
		$this->load->view('layouts/header',$data);
		$this->load->view('read/v_mitigasi',$data);
		$this->load->view('layouts/footer');
	}

	public function create()
	{
		$data = array(
			'title' => 'Mitigasi Bencana',
			'active_menu_mitigasi' => 'active'
		);
		$this->load->view('layouts/header',$data);
		$this->load->view('create/c_mitigasi');
		$this->load->view('layouts/footer');
	}

	public function store()
	{
		$data = $this->input->post(null,true);
		$res = $this->mm->store_mitigasi($data);
		if($res>=1){
			$this->session->set_userdata('proses','berhasil');
			redirect('mitigasi');
		}else{
			$this->session->set_userdata('gagal_proses','gagal');
			redirect('mitigasi');
		}
	}

	public function edit()
	{
		$id_mitigasi = $this->uri->segment(3);
		$data = array(
			'title' => 'Ubah Info Mitigasi',
			'active_menu_mitigasi' => 'active',
			'konten' => $this->mm->getDetailMitigasi($id_mitigasi)
		);
		$this->load->view('layouts/header',$data);
		$this->load->view('update/u_mitigasi',$data);
		$this->load->view('layouts/footer');
	}

	public function update()
	{
		$id_mitigasi = $this->input->post('id_mitigasi');
		$data = $this->input->post(null, true);
		unset($data['id_mitigasi']);
		$res = $this->mm->update_mitigasi($id_mitigasi,$data);
		if($res>=1){
			$this->session->set_userdata('proses','berhasil');
			redirect('mitigasi');
		}else{
			$this->session->set_userdata('gagal_proses','gagal');
			redirect('mitigasi');
		}
	}

	public function destroy($id_mitigasi)
	{
		$id_mitigasi = $this->uri->segment(3);
		$id_mitigasi = array( 'id_mitigasi' => $id_mitigasi );
		$res = $this->mm->delete_mitigasi($id_mitigasi);
		if($res>=1){
			$this->session->set_userdata('proses_hapus','berhasil');
			redirect('mitigasi');
		}else{
			$this->session->set_userdata('gagal_proses','gagal');
			redirect('mitigasi');
		}
	}

}

/* End of file MitigasiController.php */
/* Location: ./application/controllers/MitigasiController.php */