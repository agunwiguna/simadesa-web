<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model {

	public function login($username,$password) {
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query =  $this->db->get('tbl_akun');
		return $query->num_rows();
	}

	public function data_login($username,$password) {
		$this->db->select('*');
		$this->db->from('tbl_akun a');
		$this->db->join('tbl_penduduk b', 'b.nik = a.nik');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$this->db->where('level', 'admin');
		return $this->db->get()->row();
	}

}

/* End of file AuthModel.php */
/* Location: ./application/models/AuthModel.php */