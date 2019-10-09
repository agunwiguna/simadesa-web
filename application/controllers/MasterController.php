<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata("logged")<>1) {
	      redirect(site_url('login'));
	    }

		$this->load->model('MasterModel','mm');
	}

	public function index()
	{
		$data = array(
			'title' => 'Data Penduduk',
			'active_menu_penduduk' => 'active',
			'penduduk' => $this->mm->getDataPenduduk()
		);
		$this->load->view('layouts/header',$data);
		$this->load->view('read/v_penduduk',$data);
		$this->load->view('layouts/footer');
	}

	public function show_penduduk()
	{
		$nik = $this->input->get('id');
		$data = array(
			'content' => $this->mm->getDetailPenduduk($nik)
		);
		$this->load->view('detail/d_penduduk',$data);
	}

	public function delete_penduduk($nik)
	{
		$nik = $this->uri->segment(3);
		$nik = array( 'nik' => $nik );
		$res = $this->mm->delete_penduduk($nik);
		if($res>=1){
			$this->session->set_userdata('proses_hapus','berhasil');
			redirect('penduduk');
		}
		else{
			$this->session->set_userdata('gagal_proses','gagal');
			redirect('penduduk');
		}	
	}

	public function perangkat_desa()
	{
		$data = array(
			'title' => 'Perangkat Desa',
			'active_menu_perangkat' => 'active',
			'konten' => $this->mm->getDataPerangkatDesa()
		);
		$this->load->view('layouts/header',$data);
		$this->load->view('read/v_perangkat_desa',$data);
		$this->load->view('layouts/footer');
	}

	public function store_pd()
	{
		$config = array(
			'upload_path'		=> 'src/perangkat_desa/',
			'allowed_types'		=> 'gif|jpg|png',
			'max_size'			=> 100000
		);
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('foto')){
			$this->session->set_userdata('gagal_proses','gagal');
			redirect('perangkat_desa');
		}else{
			$data = $this->input->post(null, true);
			$data['foto'] = $this->upload->data('file_name');
			$res = $this->mm->store_perangkat_desa($data);
			if($res>=1){
				$this->session->set_userdata('proses','berhasil');
				redirect('perangkat_desa');
			}else{
				$this->session->set_userdata('gagal_proses','gagal');
				redirect('perangkat_desa');
			}
		}
	}

	public function show_pd()
	{
		$id = $this->input->get('id');
		$data = array(
			'content' => $this->mm->getDetailPd($id)
		);
		$this->load->view('detail/d_pd',$data);
	}

	public function edit_pd()
	{
		$id = $this->input->get('id');
		$data = array(
			'content' => $this->mm->getDetailPd($id)
		);
		$this->load->view('update/u_pd',$data);
	}

	public function update_pd()
	{
		$id = $this->input->post('id');
		if ($_FILES['foto']['name']){
			$config = array(
				'upload_path'		=> 'src/perangkat_desa/',
				'allowed_types'		=> 'gif|jpg|png',
				'max_size'			=> 10000
			);
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('foto')){
				$this->session->set_userdata('gagal_proses','gagal');
				redirect('perangkat_desa');
			}else{
				$ambildata = $this->mm->getDetailPd($id);
				foreach($ambildata as $foto){
					unlink('src/perangkat_desa/'.$foto['foto']);
				}
				$data = $this->input->post(null, true);
				unset($data['id']);
				$data['foto'] = $this->upload->data('file_name');
				$res = $this->mm->update_pd($id,$data);
				$error_db = $this->db->error('message');
				if($res>=1){
					$this->session->set_userdata('proses','berhasil');
					redirect('perangkat_desa');
				}
				else{
					$this->session->set_userdata('gagal_proses','gagal');
					redirect('perangkat_desa');
				}
			}
		}else{ 
			$data = $this->input->post(null, true);
			unset($data['id']);
			$res = $this->mm->update_pd($id,$data);
			if($res>=1){
				$this->session->set_userdata('proses','berhasil');
				redirect('perangkat_desa');
			}else{
				$this->session->set_userdata('gagal_proses','gagal');
				redirect('perangkat_desa');
			}
		}
	}

	public function destroy_pd($id)
	{
		$id = $this->uri->segment(3);
        $this->db->where('id',$id);
        $get_image_file=$this->db->get('tbl_perangkat_desa')->row();
        @unlink('src/perangkat_desa/'.$get_image_file->foto);
        $this->db->where('id',$id);
        $this->db->delete('tbl_perangkat_desa');
        $this->session->set_userdata('proses_hapus','berhasil');
		redirect('perangkat_desa');
	}

}

/* End of file MasterController.php */
/* Location: ./application/controllers/MasterController.php */