<?php

/**
 * @package    portal.ilmuberbagi.or.id / 2016
 * @author     Puguh
 * @copyright  Divisi IT IBF
 * @version    1.0
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_partner extends CI_Model{

	public function get_partner($id = ''){
		$sql = "SELECT * from ibf_partner";
		if($id != ''){
			$sql = "SELECT * from ibf_partner where partner_id = '$id'";
		}
		return $this->db->query($sql)->result_array();
	}

	public function insert($data){
		return $this->db->insert('ibf_partner', $data);
	}

	public function update($id, $data){
		$this->db->where('partner_id', $id);
		return $this->db->update('ibf_partner', $data);
	}

	public function delete($id){
		$this->db->where('partner_id', $id);
		return $this->db->delete('ibf_partner');
	}
}