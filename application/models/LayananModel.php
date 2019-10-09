<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LayananModel extends CI_Model {

	public function getDataLayanan()
	{
		$this->db->select('*');
		$this->db->from('tbl_kategori_layanan');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function store_layanan_desa($data)
	{
		$query = $this->db->insert('tbl_kategori_layanan', $data);
		return $query;
	}

	public function getDetailKategori($id_kategori)
	{
		$this->db->select('*');
		$this->db->from('tbl_kategori_layanan');
		$this->db->where('id_kategori', $id_kategori);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function update_kl($id_kategori,$data){
        $this->db->where(array('id_kategori' => $id_kategori));
        $res = $this->db->update('tbl_kategori_layanan',$data);
        return $res;
    }

    public function delete_kl($where)
	{
		$this->db->where($where);
		$res = $this->db->delete("tbl_kategori_layanan");
		return $res;
	}

	public function getLayanan()
	{
		$this->db->select('*');
		$this->db->from('tbl_layanan a');
		$this->db->join('tbl_kategori_layanan b', 'b.id_kategori = a.id_kategori');
		$this->db->join('tbl_penduduk c', 'c.nik = a.nik');
		$query = $this->db->get();
		return $query->result_array();
	}

}

/* End of file LayananModel.php */
/* Location: ./application/models/LayananModel.php */