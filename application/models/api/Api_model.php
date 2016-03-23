<?php

class Api_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}
	
	public function auth($user, $pass){
		$pass = md5($pass);
		$sql = "select a.*, c.member_type, b.member_image_profile from ibf_member a 
				left join ibf_member_detail b on a.member_id = b.member_id
				left outer join ibf_member_type c on b.member_type = c.type_id 
				where a.member_username = '$user' and a.member_password = '$pass'";
		return $this->db->query($sql)->result_array();
	}
	
	public function get_user_privilage($user_id){
		$sql = "select * from ibf_privilage where member_id = '$user_id'";
		return $this->db->query($sql)->result_array();
	}
	
}


