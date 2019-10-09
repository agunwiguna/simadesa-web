<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterModel extends CI_Model {

	public function getDataPenduduk()
	{
		$this->db->select('*');
		$this->db->from('tbl_penduduk a');
		$this->db->join('tbl_akun b', 'b.nik = a.nik');
		$this->db->where('level', 'warga');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getDetailPenduduk($nik)
	{
		$this->db->select('*');
		$this->db->from('tbl_penduduk');
		$this->db->where('nik', $nik);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function delete_penduduk($where)
	{
		$this->db->where($where);
		$res = $this->db->delete("tbl_penduduk");
		return $res;
	}

	public function getDataPerangkatDesa()
	{
		$this->db->select('*');
		$this->db->from('tbl_perangkat_desa');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function store_perangkat_desa($data)
	{
		$query = $this->db->insert('tbl_perangkat_desa', $data);
		return $query;
	}

	public function getDetailPd($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_perangkat_desa');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function update_pd($id,$data){
        $this->db->where(array('id' => $id));
        $res = $this->db->update('tbl_perangkat_desa',$data);
        return $res;
    }

}

/* End of file MasterModel.php */
/* Location: ./application/models/MasterModel.php */