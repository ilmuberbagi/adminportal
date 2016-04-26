<?php

class Mdl_asset extends CI_Model{

	public function __construct(){
		parent::__construct();
	}
	
	public function get_asset_limit($num = 10, $offset = 0){
		$this->db->select('*');
		$this->db->order_by("asset_create_date", "DESC"); 
		$query = $this->db->get('ibf_asset', $num, $offset)->result_array();
		return $query;
	}

	public function get_all_asset_ajax(){
		$sql = "select asset_id, asset_name, asset_url, asset_url_thumb from ibf_asset order by asset_create_date DESC";
		$query = $this->db->query($sql)->result_array();
		$res = '<div class="row">';
		if(!empty($query)){ foreach($query as $data){
			$img = $data['asset_url_thumb'] ? $data['asset_url_thumb'] : $data['asset_url'];
			$res .= '<div class="thumb col-sm-6 col-md-3" onclick="return choose(\''.$data['asset_url'].'\')">
						<img class="img-responsive" src="'.$img.'" alt="'.$data['asset_name'].'">
					</div>';
		}}
		$res .= '</div>';
		return $res;
	}

	public function search_image_ajax($name){
		$sql = "select asset_id, asset_name, asset_url, asset_url_thumb from ibf_asset where asset_name like '%$name%'
				order by asset_create_date DESC";
		$query = $this->db->query($sql)->result_array();
		$res = '<div class="row"><div class="col-md-12">';
		if(!empty($query)){ foreach($query as $data){
			$res .= '<div class="col-lg-2 col-md-2 col-xs-6 thumb">
						<a class="thumbnail">
							<span class="btn btn-sm select" data-value="'.$data['asset_url'].'"><i class="fa fa-hand-o-down"></i></span>
							<img class="img-responsive" src="'.$data['asset_url_thumb'].'" alt="'.$data['asset_name'].'">
						</a>
					</div>';
		}}else{
			$res .= 'Image tidak ditemukan.';
		}
		$res .= '</div></div>';
		return $res;
	}

	public function count_asset(){
		$sql = "select count(*) as jml from ibf_asset";
		$data = $this->db->query($sql)->result_array();
		return $data[0]['jml'];
	}
	
	public function save_asset($data){
		return $this->db->insert('ibf_asset', $data);
	}
}


