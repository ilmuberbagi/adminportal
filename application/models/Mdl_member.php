<?php

class Mdl_member extends CI_Model{

	public function get_member($code = ''){
		$sql = "select a.*, c.member_type, b.member_image_profile, b.member_reg_year from ibf_member a 
			left join ibf_member_detail b on a.member_id = b.member_id
			left outer join ibf_member_type c on b.member_type = c.type_id order by a.member_id DESC";
		if($code != ''){
			$sql = "select * from ibf_member a 
				left join ibf_member_detail b on a.member_id = b.member_id
				left outer join ibf_member_type c on b.member_type = c.type_id
				left outer join ibf_region d on b.member_region = d.region_id
				where a.member_ibf_code = '$code'";
		}
		return $this->db->query($sql)->result_array();
	}
	
	public function count_member(){
		return $this->db->get('ibf_member')->num_rows();
	}
	
	public function get_member_types(){
		$sql = "select * from ibf_member_type order by type_id ASC";
		return $this->db->query($sql)->result_array();
	}
	
	public function get_regions(){
		$sql = "select * from ibf_region order by region_id ASC";
		return $this->db->query($sql)->result_array();
	}
	
	public function count_member_per_year(){
		$sql = "select member_id from ibf_member_detail where YEAR(member_date_input) = YEAR(current_date)";
		$count = $this->db->query($sql)->num_rows();
		return $count;
	}

	public function get_user_privilage($user_id){
		$sql = "select * from ibf_privilage where member_id = '$user_id'";
		return $this->db->query($sql)->result_array();
	}
	
	public function get_id_from_code($code){
		$sql = "select member_id from ibf_member where member_ibf_code = '$code'";
		$data = $this->db->query($sql)->result_array();
		if(!empty($data))
			return $data[0]['member_id'];
		else return null;
	}
	
	# region and member type 
	public function get_region(){
		$sql = "select * from ibf_region order by region_name ASC";
		return $this->db->query($sql)->result_array();
	}
	
	public function count_member_by_region($id){
		$sql = "select member_id from ibf_member_detail where member_region = '$id'";
		$count = $this->db->query($sql)->num_rows();
		return $count;
	}
	
	public function get_member_type(){
		$sql = "select * from ibf_member_type order by member_type ASC";
		return $this->db->query($sql)->result_array();
	}
	
	
	# write/update
	public function insert($data){
		return $this->db->insert('ibf_member_detail', $data);
	}
	
	public function create_user($data){
		$this->db->insert('ibf_member', $data);
		return $this->db->insert_id();
	}
	
}


