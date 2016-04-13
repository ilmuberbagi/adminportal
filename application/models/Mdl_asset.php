<?php

class Mdl_asset extends CI_Model{

	public function __construct(){
		parent::__construct();
	}
	
	public function get_asset_limit($num = 10, $offset = 0){
		$this->db->select('*');
		$this->db->order_by("asset_create_date", "DESC"); 
		$query = $this->db->get('ibf_asset', $num, $offset)->result_array();
		return $query;
	}

	public function count_asset(){
		$sql = "select count(*) as jml from ibf_asset";
		$data = $this->db->query($sql)->result_array();
		return $data[0]['jml'];
	}
}


