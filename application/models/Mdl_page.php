<?php

class Mdl_page extends CI_Model{

	public function __construct(){
		parent::__construct();
	}
	
	public function getAllPage(){
		$sql = "select tb_pages order by label ASC";
		return $this->db->query($sql)->result_array();
	}

	public function getPage($label){
		$sql = "select tb_pages where label = '$label'";
		return $this->db->query($sql)->result_array();
	}
	
	public function create($data){
		return $this->db->insert('tb_pages', $data);
	}
	
	public function update($id, $data){
		$this->db->where('id', $id);
		return $this->db->update('tb_pages', $data);
	}
	
	public function delete($id){
		$this->db->where('id', $id);
		return $this->db->delete('tb_pages');
	}

}


