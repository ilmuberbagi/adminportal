<?php

class Mdl_member extends CI_Model{

	public function get_member($code = ''){
		$sql = "select a.*, b.member_type, b.member_image_profile, b.member_reg_year, c.region_name 
			from ibf_member a left join ibf_member_detail b on a.member_id = b.member_id 
			left outer join ibf_region c on b.member_region = c.region_id 
			order by a.member_id DESC";
		if($code != ''){
			$sql = "select * from ibf_member a 
				left join ibf_member_detail b on a.member_id = b.member_id
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

	public function get_user_privilage($user_id = ""){
		$sql = "select a.*, b.member_name, b.member_ibf_code from ibf_privilage a 
				left join ibf_member b on a.member_id = b.member_id 
				order by b.member_name ASC";
		if($user_id !== "")
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
	public function get_region($region=""){
		$sql = "select * from ibf_region order by region_name ASC";
		if($region !== ""){
			$sql = "select a.*, c.region_name, b.member_image_profile, b.member_reg_year from ibf_member a 
				left join ibf_member_detail b on a.member_id = b.member_id
				left outer join ibf_region c on b.member_region = c.region_id
				where b.member_region = '$region' order by a.member_id DESC";
		}
		return $this->db->query($sql)->result_array();
	}
	
	public function count_member_by_region($id){
		$sql = "select count(member_id) as total from ibf_member_detail where member_region = '$id'";
		$data = $this->db->query($sql)->result_array();
		return $data[0]['total'];
	}
	
	public function create_region($data){
		return $this->db->insert('ibf_region', $data);
	}
	
	public function update_region($id, $data){
		$this->db->where('region_id', $id);;
		return $this->db->update('ibf_region', $data);
	}
	public function update_wilayah_count($id){
		$sql = "select count(member_id) as jml from ibf_member_detail where member_region = '$id'";
		$data = $this->db->query($sql)->result_array();
		$sqlUpdate = "update ibf_region set count_member = '".($data[0]['jml'])."' where region_id = '$id'";
		return $this->db->query($sqlUpdate);
	}
	
	#  type model
	public function get_member_type($type = ""){
		$sql = "select * from ibf_member_type order by member_type ASC";
		if($type !== ""){
			$sql = "select a.*, c.member_type, b.member_image_profile, b.member_reg_year from ibf_member a 
				left join ibf_member_detail b on a.member_id = b.member_id
				left outer join ibf_member_type c on b.member_type = c.type_id 
				where b.member_type = '$type' order by a.member_id DESC";
		}
		return $this->db->query($sql)->result_array();
	}
	
	public function count_member_by_type($type){
		$sql = "select member_id from ibf_member_detail where member_type like '%$type%'";
		$count = $this->db->query($sql)->num_rows();
		return $count;
	}
	
	# ibf apps
	public function get_apps(){
		return $this->db->get('ibf_app')->result_array();
	}
	
	
	# write/update
	public function insert($data){
		return $this->db->insert('ibf_member_detail', $data);
	}
	
	public function update($id, $data){
		$this->db->where('member_id', $id);
		return $this->db->update('ibf_member', $data);
	}
	
	public function update_data_user($id, $data){
		$this->db->where('member_id', $id);
		return $this->db->update('ibf_member_detail', $data);
	}
	
	public function create_user($data){
		$this->db->insert('ibf_member', $data);
		return $this->db->insert_id();
	}
	
	public function create_privilage($data){
		return $this->db->insert('ibf_privilage', $data);
	}
	
	public function set_privilage($id, $data){
		$this->db->where('member_id', $id);
		return $this->db->update('ibf_privilage', $data);		
	}
	
	# delete model
	public function delete_member($id){
		$this->db->where('member_id', $id);
		return $this->db->delete('ibf_member');
	}
}


