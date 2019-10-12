<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PotensiModel extends CI_Model {

	public function getDataPotensi()
	{
		$this->db->select('*');
		$this->db->from('tbl_potensi');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function store_potensi($data)
	{
		$query = $this->db->insert('tbl_potensi', $data);
		return $query;
	}

	public function getDetailPotensi($id_potensi)
	{
		$this->db->select('*');
		$this->db->from('tbl_potensi');
		$this->db->where('id_potensi', $id_potensi);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function update_potensi($id_potensi,$data){
        $this->db->where(array('id_potensi' => $id_potensi));
        $res = $this->db->update('tbl_potensi',$data);
        return $res;
    }

    public function getDataUsulan()
    {
    	$this->db->select('*');
		$this->db->from('tbl_usulan a');
		$this->db->join('tbl_penduduk b', 'b.nik = a.nik');
		$query = $this->db->get();
		return $query->result_array();
    }

    public function getDetailUsulan($id_usulan)
	{
		$this->db->select('*');
		$this->db->from('tbl_usulan a');
		$this->db->join('tbl_penduduk b', 'b.nik = a.nik');
		$this->db->where('id_usulan', $id_usulan);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function delete_usulan($where)
	{
		$this->db->where($where);
		$res = $this->db->delete("tbl_usulan");
		return $res;
	}

	public function getAllInvestor()
	{
		$this->db->select('*');
		$this->db->from('tbl_investor');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function store_investor($data)
	{
		$query = $this->db->insert('tbl_investor', $data);
		return $query;
	}

	public function update_investor($id_investor,$data){
        $this->db->where(array('id_investor' => $id_investor));
        $res = $this->db->update('tbl_investor',$data);
        return $res;
    }

    public function getDetailInvestor($id_investor)
	{
		$this->db->select('*');
		$this->db->from('tbl_investor');
		$this->db->where('id_investor', $id_investor);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function delete_investor($where)
	{
		$this->db->where($where);
		$res = $this->db->delete("tbl_investor");
		return $res;
	}

	public function getAllUmkm()
	{
		$this->db->select('*');
		$this->db->from('tbl_umkm a');
		$this->db->join('tbl_penduduk b', 'b.nik = a.nik');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function store_umkm($data)
	{
		$query = $this->db->insert('tbl_umkm', $data);
		return $query;
	}

	public function update_umkm($id_umkm,$data){
        $this->db->where(array('id_umkm' => $id_umkm));
        $res = $this->db->update('tbl_umkm',$data);
        return $res;
    }

    public function getDetailUmkm($id_umkm)
	{
		$this->db->select('*');
		$this->db->from('tbl_umkm a');
		$this->db->join('tbl_penduduk b', 'b.nik = a.nik');
		$this->db->where('id_umkm', $id_umkm);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function delete_umkm($where)
	{
		$this->db->where($where);
		$res = $this->db->delete("tbl_umkm");
		return $res;
	}

	public function update_usulan($id_usulan,$data){
        $this->db->where(array('id_usulan' => $id_usulan));
        $res = $this->db->update('tbl_usulan',$data);
        return $res;
    }	

}

/* End of file PotensiModel.php */
/* Location: ./application/models/PotensiModel.php */