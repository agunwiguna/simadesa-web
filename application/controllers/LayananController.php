<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LayananController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('LayananModel','lm');
	}

	public function index()
	{
		$data = array(
			'title' => 'Kategori Layanan',
			'active_menu_kl' => 'active',
			'layanan' => $this->lm->getDataLayanan()
		);
		$this->load->view('layouts/header',$data);
		$this->load->view('read/v_kategori_layanan',$data);
		$this->load->view('layouts/footer');
	}

	public function store()
	{
		$data = $this->input->post(null,true);
		$res = $this->lm->store_layanan_desa($data);
		if($res>=1){
			$this->session->set_userdata('proses','berhasil');
			redirect('kategori_layanan');
		}else{
			$this->session->set_userdata('gagal_proses','gagal');
			redirect('kategori_layanan');
		}
	}

	public function edit()
	{
		$id_kategori = $this->input->get('id');
		$data = array(
			'content' => $this->lm->getDetailKategori($id_kategori)
		);
		$this->load->view('update/u_kl',$data);
	}

	public function update()
	{
		$id_kategori = $this->input->post('id_kategori');
		$data = $this->input->post(null, true);
		unset($data['id_kategori']);
		$res = $this->lm->update_kl($id_kategori,$data);
		if($res>=1){
			$this->session->set_userdata('proses','berhasil');
			redirect('kategori_layanan');
		}else{
			$this->session->set_userdata('gagal_proses','gagal');
			redirect('kategori_layanan');
		}
	}

	public function destroy($id_kategori)
	{
		$id_kategori = $this->uri->segment(3);
		$id_kategori = array( 'id_kategori' => $id_kategori );
		$res = $this->lm->delete_kl($id_kategori);
		if($res>=1){
			$this->session->set_userdata('proses_hapus','berhasil');
			redirect('kategori_layanan');
		}else{
			$this->session->set_userdata('gagal_proses','gagal');
			redirect('kategori_layanan');
		}
	}

	public function layanan()
	{
		$data = array(
			'title' => 'Layanan Desa',
			'active_menu_ld' => 'active',
			'layanan' => $this->lm->getLayanan()
		);
		$this->load->view('layouts/header',$data);
		$this->load->view('read/v_layanan',$data);
		$this->load->view('layouts/footer');
	}

	public function show_layanan()
	{
		$id_layanan = $this->input->get('id');
		$data = array(
			'layanan' => $this->lm->getDetailLayanan($id_layanan)
		);
		$this->load->view('detail/d_layanan',$data);
	}

	public function hapus_layanan($id_layanan)
	{
		$id_layanan = $this->uri->segment(3);
		$id_layanan = array( 'id_layanan' => $id_layanan );
		$res = $this->lm->delete_layanan($id_layanan);
		if($res>=1){
			$this->session->set_userdata('proses_hapus','berhasil');
			redirect('layanan');
		}else{
			$this->session->set_userdata('gagal_proses','gagal');
			redirect('layanan');
		}
	}

	public function verifikasi_layanan($id_layanan)
	{
		$id_layanan = $this->uri->segment(3);
		$data['status'] = 'Selesai';
		unset($data['id_layanan']);
		$res = $this->lm->update_layanan($id_layanan,$data);
		if($res>=1){
			$this->session->set_userdata('proses','berhasil');
			redirect('layanan');
		}else{
			$this->session->set_userdata('gagal_proses','gagal');
			redirect('layanan');
		}
	}

}

/* End of file LayananController.php */
/* Location: ./application/controllers/LayananController.php */