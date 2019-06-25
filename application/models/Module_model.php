<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Module_model extends CI_Model {
	public function addAuthor($data)
	{
		return $this->db->insert("tbl_author", $data);
		echo $this->db->last_query();
	}
	public function getAuthor()
	{
		$this->db->select('*');
		$this->db->from('tbl_author');
		$i=$this->db->get();
		$this->db->order_by('user_added','desc');
		//echo $this->db->last_query();
		return $i->result_array();
	}
	public function editAuthor($a_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_author');
		$this->db->where('id',$a_id);
		$i=$this->db->get();
		//echo $this->db->last_query();
		return $i->result_array();
	}
	public function search_author($a_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_author');
		$this->db->where('id',$a_id);
		$i=$this->db->get();
		//echo $this->db->last_query();
		return $i->result_array();
	}
	public function search_text($keyword)
	{
		$this->db->select('*');
		$this->db->from('tbl_author');
		$this->db->like('title', $keyword);
		$this->db->or_like('description', $keyword);
		$this->db->or_like('author', $keyword);
		$this->db->where('id',$a_id);
		$i=$this->db->get();
		//echo $this->db->last_query();
		return $i->result_array();
	}
	public function updateAuthor($a_id,$data){

		$this->db->where('id',$a_id);
		$i=$this->db->update('tbl_author',$data);
				//echo $this->db->last_query(); exit;
		return $i;

	}
}

