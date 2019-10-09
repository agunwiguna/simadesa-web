<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MitigasiModel extends CI_Model {

	public function getDataMitigasi()
	{
		$this->db->select('*');
		$this->db->from('tbl_mitigasi');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function store_mitigasi($data)
	{
		$query = $this->db->insert('tbl_mitigasi', $data);
		return $query;
	}

	public function getDetailMitigasi($id_mitigasi)
	{
		$this->db->select('*');
		$this->db->from('tbl_mitigasi');
		$this->db->where('id_mitigasi', $id_mitigasi);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function update_mitigasi($id_mitigasi,$data){
        $this->db->where(array('id_mitigasi' => $id_mitigasi));
        $res = $this->db->update('tbl_mitigasi',$data);
        return $res;
    }

    public function delete_mitigasi($where)
	{
		$this->db->where($where);
		$res = $this->db->delete("tbl_mitigasi");
		return $res;
	}

}

/* End of file MitigasiModel.php */
/* Location: ./application/models/MitigasiModel.php */