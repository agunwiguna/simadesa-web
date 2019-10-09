<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NewsModel extends CI_Model {

	public function getDataNews()
	{
		$this->db->select('*');
		$this->db->from('tbl_info');
		$this->db->order_by('id_info', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function store_news($data)
	{
		$query = $this->db->insert('tbl_info', $data);
		return $query;
	}

	public function getDetailNews($id_info)
	{
		$this->db->select('*');
		$this->db->from('tbl_info');
		$this->db->where('id_info', $id_info);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function update_news($id_info,$data){
        $this->db->where(array('id_info' => $id_info));
        $res = $this->db->update('tbl_info',$data);
        return $res;
    }

}

/* End of file NewsModel.php */
/* Location: ./application/models/NewsModel.php */