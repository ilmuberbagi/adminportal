<?php

/**
 * @package    portal.ilmuberbagi.or.id / 2016
 * @author     Sabbana
 * @copyright  Divisi IT IBF
 * @version    1.0
 */
 
defined('BASEPATH') OR exit('No direct script access allowed');

class Asset extends CI_Controller{

	var $data = array();

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('ibf_token_string') == '') redirect('login');
		$this->load->model('Mdl_asset','asset');
	}

	public function index(){
		$this->images();
	}
	
	public function upload(){
		$this->data['title'] = 'Upload Asset';
		$this->data['page'] = 'page/uploader';
		$this->load->view('template', $this->data);
	}
	
	public function do_upload() {
		if(!empty($_FILES)){
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['file_name'] = strtolower(url_title(pathinfo($_FILES['userfile']['name'], PATHINFO_FILENAME), '_'));
			$upload_path = './asset/uploads/';
			$this->load->library('upload', $config);	

			if (!$this->upload->do_upload("userfile")) {
				// $this->remove_dir();
				$error = array('error' => $this->upload->display_errors(),'ori_file' => $_FILES);
				$this->output->set_content_type('application/json')->set_output(json_encode($error));
			} else {
				$data = $this->upload->data();
				
				//set the data for the json array
				$info = new StdClass;
				$info->name = $data['file_name'];
				$info->size = $data['file_size'] * 1024;
				$info->type = $data['file_type'];
				$info->url = $upload_path.'/'.$data['file_name'];
				$info->error = null;

				$files[] = $info;
				clearstatcache();	
				
				if (IS_AJAX) {
					header("Content-Type: application/json");
					echo json_encode(array("files" => $files,'ori_file' => $_FILES, 'multipart' => $mp));
				}else{
					$file_data['upload_data'] = $this->upload->data();
				}
			}
		}
    }
	
	public function images(){
		$this->load->library('pagination');
		
		$this->data['title'] = 'IBF Image Asset';
		$this->data['page'] = 'page/list_asset';
		
		$config = array(
			'base_url'		 => base_url().'asset/images/',
			'total_rows'	 => $this->asset->count_asset(),
			'per_page'		 => 10,
			'full_tag_open'	 => '<ul class="pagination pagination-sm pull-right">',
			'full_tag_close' => '</ul>',
			'cur_tag_open'	 => '<li class="active"><a href="#">',
			'cur_tag_close' => '</a></li>',
			'num_tag_open'	=> '<li>',
			'num_tag_close'	=> '</li>',
			'prev_tag_open' => '<li class="prev">',
			'prev_tag_close' => '</li>',
			'next_tag_open' => '<li class="next">',
			'next_tag_close' => '</li>',
			'prev_link'		=> '<i class="fa fa-chevron-left"></i>',
			'next_link'		=> '<i class="fa fa-chevron-right"></i>',
			'first_link'	=> '',
			'last_link'	=> '',
			'use_page_numbers' => TRUE,

		);
		$offset = $this->uri->segment(3)? ( (($this->uri->segment(3)-1) * $config['per_page'])) : 0;
		$this->pagination->initialize($config);
		$this->data['paging'] = $this->pagination->create_links();
		$this->data['images'] = $this->asset->get_asset_limit($config['per_page'], $offset);
		$this->load->view('template', $this->data);
	}
		
	


}