<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class AlatController extends CI_Controller {
    
        public function __construct()
        {
            parent::__construct();

            if ($this->session->userdata("logged")<>1) {
            redirect(site_url('login'));
            }

            $this->load->model('AlatModel','am');
	    }

        public function index()
        {
            $data = array(
                'title' => 'Data Alat',
			    'active_menu_alat' => 'active',
			    'alat' => $this->am->getAll()
            );

            $this->load->view('layouts/header',$data);
		    $this->load->view('read/v_alat',$data);
		    $this->load->view('layouts/footer');
        }

        public function store()
        {
            if($this->am->save()){
                $this->session->set_userdata('proses','berhasil');
            } else {
                $this->session->set_userdata('gagal_proses','gagal');
            }
            redirect('data_alat','refresh');
        }

        public function delete($id)
        {
            if($this->am->delete($id)){
                $this->session->set_userdata('proses_hapus','berhasil');
            } else {
                $this->session->set_userdata('gagal_proses','gagal');
            }
            redirect('data_alat','refresh');
        }

        public function edit()
        {
            $id = $this->input->get('id');
            $data = array(
                'content' => $this->am->getById($id)
            );
            $this->load->view('update/u_data_alat',$data);
        }

        public function update()
        {
            if($this->am->update()){
                $this->session->set_userdata('proses','berhasil');
            } else {
                $this->session->set_userdata('gagal_proses','gagal');
            }
            redirect('data_alat','refresh');
        }
    
    }
    
    /* End of file AlatController.php */
    