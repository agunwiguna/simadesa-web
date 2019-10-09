<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class AlatModel extends CI_Model {
    
        private $table = 'tbl_alat';

        public $id_alat;
        public $key_alat;
        public $status;

        public function getAll(){
            return $this->db->get($this->table)->result_array();
        }

        public function getById($id){
            $this->db->where('id_alat', $id);
            return $this->db->get($this->table)->result_array();
        }
        
        public function save(){
            $post = $this->input->post();
            $this->id_alat = '';
            $this->key_alat = $post['key_alat'];
            $this->status = $post['status'];
            if($this->db->insert($this->table, $this)){
                return true;
            } else {
                return false;
            }
        }

        public function delete($id)
        {
            $this->db->where('id_alat', $id);
            if($this->db->delete($this->table)){
                return true;
            } else {
                return false;
            }
        }

        public function update()
        {
            $post = $this->input->post();
            $this->id_alat = $post['id_alat'];
            $this->key_alat = $post['key_alat'];
            $this->status = $post['status'];
            if($this->db->update($this->table, $this,['id_alat'=>$this->id_alat])){
               return true; 
            } else {
                return false;
            }
        }
    }
    
    /* End of file AlatModel.php */
    