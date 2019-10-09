<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NewsController extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata("logged")<>1) {
	      redirect(site_url('login'));
	    }
		
		$this->load->model('NewsModel','nm');
	}

	public function index()
	{
		$data = array(
			'title' => 'Info Desa',
			'active_menu_info' => 'active',
			'news' => $this->nm->getDataNews()
		);
		$this->load->view('layouts/header',$data);
		$this->load->view('read/v_news',$data);
		$this->load->view('layouts/footer');
	}

	public function create()
	{
		$data = array(
			'title' => 'Tulis Info',
			'active_menu_info' => 'active'
		);
		$this->load->view('layouts/header',$data);
		$this->load->view('create/c_news');
		$this->load->view('layouts/footer');
	}

	public function store()
	{
		$config = array(
			'upload_path'		=> 'src/info_desa/',
			'allowed_types'		=> 'gif|jpg|png',
			'max_size'			=> 100000
		);
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('image')){
			$this->session->set_userdata('gagal_proses','gagal');
			redirect('info');
		}else{
			$data = array(
				'judul' => $this->input->post('judul'),
				'deskripsi' => $this->input->post('deskripsi'),
				'created_at' => date("Y-m-d"),
				'image' => $this->upload->data('file_name'), 
			);
			$res = $this->nm->store_news($data);
			if($res>=1){
				$this->session->set_userdata('proses','berhasil');
				redirect('info');
			}else{
				$this->session->set_userdata('gagal_proses','gagal');
				redirect('info');
			}
		}
	}

	public function show()
	{
		$id_info = $this->input->get('id');
		$data = array(
			'content' => $this->nm->getDetailNews($id_info)
		);
		$this->load->view('detail/d_news',$data);
	}

	public function edit($id_info)
	{
		$id_info = $this->uri->segment(3);
		$data = array(
			'title' => 'Ubah Info Desa',
			'active_menu_info' => 'active',
			'news' => $this->nm->getDetailNews($id_info)
		);
		$this->load->view('layouts/header',$data);
		$this->load->view('update/u_news',$data);
		$this->load->view('layouts/footer');
	}

	public function update_berita()
	{
		$id_info = $this->input->post('id_info');
		if ($_FILES['image']['name']){
			$config = array(
				'upload_path'		=> 'src/info_desa/',
				'allowed_types'		=> 'gif|jpg|png',
				'max_size'			=> 10000
			);
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('image')){
				$this->session->set_userdata('gagal_proses','gagal');
				redirect('info');
			}else{
				$ambildata = $this->nm->getDetailNews($id_info);
				foreach($ambildata as $foto){
					unlink('src/info_desa/'.$foto['image']);
				}
				$data = $this->input->post(null, true);
				unset($data['id_info']);
				$data['image'] = $this->upload->data('file_name');
				$res = $this->nm->update_news($id_info,$data);
				$error_db = $this->db->error('message');
				if($res>=1){
					$this->session->set_userdata('proses','berhasil');
					redirect('info');
				}
				else{
					$this->session->set_userdata('gagal_proses','gagal');
					redirect('info');
				}
			}
		}else{ 
			$data = $this->input->post(null, true);
			unset($data['id_info']);
			$res = $this->nm->update_news($id_info,$data);
			if($res>=1){
				$this->session->set_userdata('proses','berhasil');
				redirect('info');
			}else{
				$this->session->set_userdata('gagal_proses','gagal');
				redirect('info');
			}
		}
	}

	public function destroy($id_info)
	{
		$id_info = $this->uri->segment(3);
        $this->db->where('id_info',$id_info);
        $get_image_file=$this->db->get('tbl_info')->row();
        @unlink('src/info_desa/'.$get_image_file->image);
        $this->db->where('id_info',$id_info);
        $this->db->delete('tbl_info');
        $this->session->set_userdata('proses_hapus','berhasil');
		redirect('info');
	}

	//Upload image summernote
    function upload_image(){
    	$this->load->library('upload');
        if(isset($_FILES["image"]["name"])){
            $config['upload_path'] = 'src/summernote/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->upload->initialize($config);
            if(!$this->upload->do_upload('image')){
                $this->upload->display_errors();
                return FALSE;
            }else{
                $data = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='src/summernote/'.$data['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= TRUE;
                $config['quality']= '60%';
                $config['width']= 800;
                $config['height']= 800;
                $config['new_image']= 'src/summernote/'.$data['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                echo base_url().'src/summernote/'.$data['file_name'];
            }
        }
    }

    function delete_image(){
    	$src = $this->input->post('src');
    	$file_name = str_replace(base_url(), '', $src);
    	if(unlink($file_name)){
    		echo 'File Delete Successfully';
    	}
    }

}

/* End of file NewsController.php */
/* Location: ./application/controllers/NewsController.php */