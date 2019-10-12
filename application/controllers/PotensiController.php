<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PotensiController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if ($this->session->userdata("logged")<>1) {
	      redirect(site_url('login'));
	    }

	    $this->load->model('PotensiModel','pm');
	}

	public function index()
	{
		$data = array(
			'title' => 'Potensi Desa',
			'active_menu_potensi' => 'active',
			'potensi' => $this->pm->getDataPotensi()
		);
		$this->load->view('layouts/header',$data);
		$this->load->view('read/v_potensi',$data);
		$this->load->view('layouts/footer');
	}

	public function store()
	{
		$config = array(
			'upload_path'		=> 'src/potensi/',
			'allowed_types'		=> 'gif|jpg|png',
			'max_size'			=> 100000
		);
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('image')){
			$this->session->set_userdata('gagal_proses','gagal');
			redirect('potensi');
		}else{
			$data = $this->input->post(null, true);
			$data['image'] = $this->upload->data('file_name');
			$res = $this->pm->store_potensi($data);
			if($res>=1){
				$this->session->set_userdata('proses','berhasil');
				redirect('potensi');
			}else{
				$this->session->set_userdata('gagal_proses','gagal');
				redirect('potensi');
			}
		}
	}

	public function show()
	{
		$id_potensi = $this->input->get('id');
		$data = array(
			'content' => $this->pm->getDetailPotensi($id_potensi)
		);
		$this->load->view('detail/d_potensi',$data);
	}

	public function edit()
	{
		$id_potensi = $this->input->get('id');
		$data = array(
			'content' => $this->pm->getDetailPotensi($id_potensi)
		);
		$this->load->view('update/u_potensi',$data);
	}

	public function update()
	{
		$id_potensi = $this->input->post('id_potensi');
		if ($_FILES['image']['name']){
			$config = array(
				'upload_path'		=> 'src/potensi/',
				'allowed_types'		=> 'gif|jpg|png',
				'max_size'			=> 10000
			);
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('image')){
				$this->session->set_userdata('gagal_proses','gagal');
				redirect('potensi');
			}else{
				$ambildata = $this->pm->getDetailPotensi($id_potensi);
				foreach($ambildata as $foto){
					unlink('src/potensi/'.$foto['image']);
				}
				$data = $this->input->post(null, true);
				unset($data['id_potensi']);
				$data['image'] = $this->upload->data('file_name');
				$res = $this->pm->update_potensi($id_potensi,$data);
				$error_db = $this->db->error('message');
				if($res>=1){
					$this->session->set_userdata('proses','berhasil');
					redirect('potensi');
				}
				else{
					$this->session->set_userdata('gagal_proses','gagal');
					redirect('potensi');
				}
			}
		}else{ 
			$data = $this->input->post(null, true);
			unset($data['id_potensi']);
			$res = $this->pm->update_potensi($id_potensi,$data);
			if($res>=1){
				$this->session->set_userdata('proses','berhasil');
				redirect('potensi');
			}else{
				$this->session->set_userdata('gagal_proses','gagal');
				redirect('potensi');
			}
		}
	}

	public function destroy($id_potensi)
	{
		$id_potensi = $this->uri->segment(3);
        $this->db->where('id_potensi',$id_potensi);
        $get_image_file=$this->db->get('tbl_potensi')->row();
        @unlink('src/potensi/'.$get_image_file->image);
        $this->db->where('id_potensi',$id_potensi);
        $this->db->delete('tbl_potensi');
        $this->session->set_userdata('proses_hapus','berhasil');
		redirect('potensi');
	}

	public function usulan()
	{
		$data = array(
			'title' => 'Usulan Warga',
			'active_menu_usulan' => 'active',
			'usulan' => $this->pm->getDataUsulan()
		);
		$this->load->view('layouts/header',$data);
		$this->load->view('read/v_usulan',$data);
		$this->load->view('layouts/footer');
	}

	public function show_usulan()
	{
		$id_usulan = $this->input->get('id');
		$data = array(
			'content' => $this->pm->getDetailUsulan($id_usulan)
		);
		$this->load->view('detail/d_usulan',$data);
	}

	public function destroy_usulan()
	{
		$id_usulan = $this->uri->segment(3);
		$id_usulan = array( 'id_usulan' => $id_usulan );
		$res = $this->pm->delete_usulan($id_usulan);
		if($res>=1){
			$this->session->set_userdata('proses_hapus','berhasil');
			redirect('usulan');
		}else{
			$this->session->set_userdata('gagal_proses','gagal');
			redirect('usulan');
		}
	}

	public function investor()
	{
		$data = array(
			'title' => 'Investor Desa',
			'active_menu_inv' => 'active',
			'investor' => $this->pm->getAllInvestor()
		);
		$this->load->view('layouts/header',$data);
		$this->load->view('read/v_investor',$data);
		$this->load->view('layouts/footer');
	}

	public function store_investor()
	{
		$data = $this->input->post(null,true);
		$res = $this->pm->store_investor($data);
		if($res>=1){
			$this->session->set_userdata('proses','berhasil');
			redirect('investor');
		}else{
			$this->session->set_userdata('gagal_proses','gagal');
			redirect('investor');
		}
	}

	public function show_investor()
	{
		$id_investor = $this->input->get('id');
		$data = array(
			'content' => $this->pm->getDetailInvestor($id_investor)
		);
		$this->load->view('detail/d_investor',$data);
	}

	public function edit_investor()
	{
		$id_investor = $this->input->get('id');
		$data = array(
			'content' => $this->pm->getDetailInvestor($id_investor)
		);
		$this->load->view('update/u_investor',$data);
	}

	public function update_investor()
	{
		$id_investor = $this->input->post('id_investor');
		$data = $this->input->post(null, true);
		unset($data['id_investor']);
		$res = $this->pm->update_investor($id_investor,$data);
		if($res>=1){
			$this->session->set_userdata('proses','berhasil');
			redirect('investor');
		}else{
			$this->session->set_userdata('gagal_proses','gagal');
			redirect('investor');
		}
	}

	public function destroy_investor($id_investor)
	{
		$id_investor = $this->uri->segment(3);
		$id_investor = array( 'id_investor' => $id_investor );
		$res = $this->pm->delete_investor($id_investor);
		if($res>=1){
			$this->session->set_userdata('proses_hapus','berhasil');
			redirect('investor');
		}else{
			$this->session->set_userdata('gagal_proses','gagal');
			redirect('investor');
		}
	}

	public function umkm()
	{
		$data = array(
			'title' => 'Perekonomian Desa',
			'active_menu_umkm' => 'active',
			'umkm' => $this->pm->getAllUmkm()
		);
		$this->load->view('layouts/header',$data);
		$this->load->view('read/v_umkm',$data);
		$this->load->view('layouts/footer');
	}

	public function show_umkm()
	{
		$id_umkm = $this->input->get('id');
		$data = array(
			'content' => $this->pm->getDetailUmkm($id_umkm)
		);
		$this->load->view('detail/d_umkm',$data);
	}


	public function destroy_umkm($id_umkm)
	{
		$id_umkm = $this->uri->segment(3);
		$id_umkm = array( 'id_umkm' => $id_umkm );
		$res = $this->pm->delete_umkm($id_umkm);
		if($res>=1){
			$this->session->set_userdata('proses_hapus','berhasil');
			redirect('umkm');
		}else{
			$this->session->set_userdata('gagal_proses','gagal');
			redirect('umkm');
		}
	}

	public function verifikasi_usulan($id_usulan)
	{
		$id_usulan = $this->uri->segment(3);
		$data['status'] = 'Sudah ditangani';
		unset($data['id_usulan']);
		$res = $this->pm->update_usulan($id_usulan,$data);
		if($res>=1){
			$this->session->set_userdata('proses','berhasil');
			redirect('usulan');
		}else{
			$this->session->set_userdata('gagal_proses','gagal');
			redirect('usulan');
		}
	}


}

/* End of file PotensiController.php */
/* Location: ./application/controllers/PotensiController.php */