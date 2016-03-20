<?php

class Mdl_login extends CI_Model{

	public function __construct(){
		parent::__construct();
	}
	
	public function get_user($user, $pass){
		$pass = md5($pass);
		$sql = "select * from ibf_member where member_username = '$user' and member_password = '$pass'";
		return $this->db->query($sql)->result_array();
	}

}


