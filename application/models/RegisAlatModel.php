<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class RegisAlatModel extends CI_Model {
    
        private $table_registrasi = 'tbl_regis_alat';
        private $table_alat = 'tbl_alat';
        private $table_penduduk = 'tbl_penduduk';

        public function getRegis($id=null)
        {
            $this->db->select('*');
            $this->db->from($this->table_registrasi);
            $this->db->join($this->table_alat, $this->table_registrasi.'.id_alat = '.$this->table_alat.'.id_alat', 'left');
            $this->db->join($this->table_penduduk, $this->table_registrasi.'.nik = '.$this->table_penduduk.'.nik', 'left');
            if($id){
                $this->db->where('id_registrasi', $id);
            }
            return $this->db->get()->result_array();
        }
        
        public function delete($id)
        {
            $this->db->where('id_alat', $id);
            if($this->db->delete($this->table_registrasi)){
                return true;
            } else {
                return false;
            }
        }
    
    }
    
    /* End of file RegisAlatModel.php */
    