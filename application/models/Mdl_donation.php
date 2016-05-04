<?php

/**
 * @package    portal.ilmuberbagi.or.id / 2016
 * @author     Puguh
 * @copyright  Divisi IT IBF
 * @version    1.0
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_donation extends CI_Model{

	public function get_donation($id = ''){
		$sql = "SELECT * from ibf_donation";
		if($id != ''){
			$sql = "SELECT * from ibf_donation where donation_id = '$id'";
		}
		return $this->db->query($sql)->result_array();
	}

	public function get_donator($id = ''){
		$sql = "SELECT * from ibf_donator";
		if($id != ''){
			$sql = "SELECT * from ibf_donator where donator_id = '$id'";
		}
		return $this->db->query($sql)->result_array();
	}
}