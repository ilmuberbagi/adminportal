<?php

class Mdl_login extends CI_Model{

	public function __construct(){
		parent::__construct();
	}
	
	public function get_user($user, $pass){
		$pass = md5($pass);
		$sql = "select a.*, c.member_type, b.member_image_profile, b.member_reg_year from ibf_member a 
				left join ibf_member_detail b on a.member_id = b.member_id
				left outer join ibf_member_type c on b.member_type = c.type_id 
				where a.member_username = '$user' and a.member_password = '$pass' and a.member_status = 1";
		return $this->db->query($sql)->result_array();
	}
	
	public function get_user_privilage($user_id){
		$sql = "select * from ibf_privilage where member_id = '$user_id'";
		return $this->db->query($sql)->result_array();
	}
	
	public function get_member_by_email($email){
		$sql = "select a.*, c.member_type, b.member_image_profile, b.member_reg_year from ibf_member a 
				left join ibf_member_detail b on a.member_id = b.member_id
				left outer join ibf_member_type c on b.member_type = c.type_id 
				where a.member_email = '$email'";
		return $this->db->query($sql)->result_array();
	}
	
	public function account_activation($token){
		$sql = "update ibf_member set member_status = 1 where member_password = '$token'";
		return $this->db->query($sql);
	}
	
	
}


