<?php

/**
 * @package    portal.ilmuberbagi.or.id / 2016
 * @author     Sabbana
 * @copyright  Divisi IT IBF
 * @version    1.0
 */
 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_article extends CI_Model{

	public function get_article($id = ''){
		$sql = "select a.*, b.category_name, c.member_name from ibf_article a 
				left join ibf_article_category b on a.article_category = b.category_id
				left join ibf_member c on a.article_author = c.member_id where a.article_title != '' and a.article_content != '' order by a.article_date_input DESC";
		if($id != ''){
			$sql = "select a.*, b.category_name, c.member_name from ibf_article a 
				left join ibf_article_category b on a.article_category = b.category_id
				left join ibf_member c on a.article_author = c.member_id 
				where a.article_id = '$id'";
		}
		return $this->db->query($sql)->result_array();
	}

	# count article by :
	# all article
	public function count_article($id=null){
		$res = $this->db->get('ibf_article')->num_rows();
		if($id != null){
			$this->db->where('article_author', $id);
			return $this->db->get('ibf_article')->num_rows();
		}
		return $res;
			
	}
	
	public function delete($id){
		$this->db->where('article_id', $id);
		return $this->db->delete('ibf_article');
	}
	
	# by category
	public function count_article_by_category($id){
		$this->db->where('article_category', $id);
		return $this->db->get('ibf_article')->num_rows();
	}
	
	# by user
	public function count_article_by_user($id){
		$this->db->where('article_author', $id);
		return $this->db->get('ibf_article')->num_rows();
	}
	
	public function insert($data){
		return $this->db->insert('ibf_article', $data);
	}
	
	public function update($id, $data){
		$this->db->where('article_id', $id);
		return $this->db->update('ibf_article', $data);
	}
	
	# article categories
	public function get_article_category($id=''){
		$sql = "select * from ibf_article_category order by category_name ASC";
		if($id != ''){
			$sql = "select a.*, b.category_name, c.member_name from ibf_article a 
				left join ibf_article_category b on a.article_category = b.category_id
				left join ibf_member c on a.article_author = c.member_id 
				where (a.article_title != '' and a.article_content != '') and a.article_category = '$id'
				order by a.article_date_input DESC";
		}
		return $this->db->query($sql)->result_array();
	}
	
	public function create_category($data){
		return $this->db->insert('ibf_article_category', $data);
	}

	public function update_category($id, $data){
		$this->db->where('category_id', $id);
		return $this->db->update('ibf_article_category', $data);
	}

	public function update_category_count($id){
		$sql = "select count(article_id) as jml from ibf_article where article_category = '$id'";
		$data = $this->db->query($sql)->result_array();
		$sqlUpdate = "update ibf_article_category set count_article = '".($data[0]['jml'])."' where category_id = '$id'";
		return $this->db->query($sqlUpdate);
	}
	
	public function get_article_by_member($id='', $limit = null){
		$sql = "select * from ibf_article where article_author = '$id' order by article_date_update";
		if($limit != null)
			$sql = "select * from ibf_article where article_author = '$id' order by article_date_update limit 0, $limit";
		return $this->db->query($sql)->result_array();
	}
	
	
}


