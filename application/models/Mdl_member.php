<?php

class Mdl_member extends CI_Model{

	public function get_member($id = ''){
		$sql = "select a.*, c.member_type, b.member_image_profile from ibf_member a 
			left join ibf_member_detail b on a.member_id = b.member_id
			left outer join ibf_member_type c on b.member_type = c.type_id";
		if($id != ''){
			$sql = "select a.*, c.member_type, b.member_image_profile from ibf_member a 
				left join ibf_member_detail b on a.member_id = b.member_id
				left outer join ibf_member_type c on b.member_type = c.type_id
				where a.member_id = '$id'";
		}
		return $this->db->query($sql)->result_array();
	}
	
	public function get_user_privilage($user_id){
		$sql = "select * from ibf_privilage where member_id = '$user_id'";
		return $this->db->query($sql)->result_array();
	}
}


