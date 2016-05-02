<?php

/**
 * @package    portal.ilmuberbagi.or.id / 2016
 * @author     Sabbana
 * @copyright  Divisi IT IBF
 * @version    1.0
 */
 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_activity extends CI_Model{

	public function get_activity($id = ''){
		$sql = "SELECT * from ibf_activity WHERE activity_date_end <= NOW()";
		if($id != ''){
			$sql = "SELECT * from ibf_activity where activity_id = '$id'";
		}
		return $this->db->query($sql)->result_array();
	}

	public function get_agenda($id = ''){
		$sql = "SELECT * from ibf_activity WHERE activity_date_start >= NOW()";
		if($id != ''){
			$sql = "SELECT * from ibf_activity where activity_id = '$id'";
		}
		return $this->db->query($sql)->result_array();
	}
	
	public function count_agenda(){
		$sql = "SELECT * from ibf_activity WHERE activity_date_start >= NOW()";
		return $this->db->query($sql)->num_rows();
	}

	public function count_activity(){
		$sql = "SELECT * from ibf_activity WHERE activity_date_end <= NOW()";
		return $this->db->query($sql)->num_rows();
	}

	public function insert($data){
		return $this->db->insert('ibf_activity', $data);
	}

	public function update($id, $data){
		$this->db->where('activity_id', $id);
		return $this->db->update('ibf_activity', $data);
	}

	public function delete($id){
		$this->db->where('activity_id', $id);
		return $this->db->delete('ibf_activity');
	}
}