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
		$this->data['privilage'] = $this->session->userdata('privilage');
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
        $upload_path_url = base_url() . 'assets/img/uploads/';

        $config['upload_path'] = FCPATH . 'assets/img/uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = '2048'; # Max size 2 MB

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $existingFiles = get_dir_file_info($config['upload_path']);
            $foundFiles = array();
            $f=0;
            foreach ($existingFiles as $fileName => $info) {
              if($fileName!='thumbs'){//Skip over thumbs directory
                //set the data for the json array   
                $foundFiles[$f]['name'] = $fileName;
                $foundFiles[$f]['size'] = $info['size'];
                $foundFiles[$f]['url'] = $upload_path_url . $fileName;
                $foundFiles[$f]['thumbnailUrl'] = $upload_path_url . 'thumbs/' . $fileName;
                $foundFiles[$f]['deleteUrl'] = base_url() . 'asset/deleteImage/' . $fileName;
                $foundFiles[$f]['deleteType'] = 'DELETE';
                $foundFiles[$f]['error'] = null;
                $f++;
              }
            }
            $this->output->set_content_type('application/json')->set_output(json_encode(array('files' => $foundFiles)));
        } else {
            $data = $this->upload->data();
            // to re-size for thumbnail images un-comment and set path here and in json array
            $config = array();
            $config['image_library'] = 'gd2';
            $config['source_image'] = $data['full_path'];
            $config['create_thumb'] = TRUE;
            $config['new_image'] = $data['file_path'] . 'thumbs/';
            $config['maintain_ratio'] = TRUE;
            $config['thumb_marker'] = '';
            $config['width'] = 150;
            $config['height'] = 150;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

			
            //set the data for the json array
            $info = new StdClass;
            $info->name = $data['file_name'];
            $info->size = $data['file_size'] * 1024;
            $info->type = $data['file_type'];
            $info->url = $upload_path_url . $data['file_name'];
            // I set this to original file since I did not create thumbs.  change to thumbnail directory if you do = $upload_path_url .'/thumbs' .$data['file_name']
            $info->thumbnailUrl = $upload_path_url . 'thumbs/' . $data['file_name'];
            $info->deleteUrl = base_url() . 'asset/deleteImage/' . $data['file_name'];
            $info->deleteType = 'DELETE';
            $info->error = null;

            $files[] = $info;
						# set data and save to database
			# ======================================
			$data_image = array(
				'asset_name'	=> $info->name,
				'asset_url'		=> $this->config->item('image_upload_url').$info->name,
				'asset_url_thumb'	=> $this->config->item('image_upload_url_thumb').$info->name,
				'asset_create_date'	=> date('Y-m-d H:i:s')
			);
			$this->asset->save_asset($data_image);

            //this is why we put this in the constants to pass only json data
            if (IS_AJAX) {
                echo json_encode(array("files" => $files));
            } else {
				redirect('asset');
            }
        }
    }
	
	public function images(){
		$this->load->library('pagination');
		
		$this->data['title'] = 'IBF Image Asset';
		$this->data['page'] = 'page/list_asset';
		
		$config = array(
			'base_url'		 => base_url().'asset/images/page/',
			'total_rows'	 => $this->asset->count_asset(),
			'per_page'		 => 12,
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
		$offset = $this->uri->segment(4)? ( (($this->uri->segment(4)-1) * $config['per_page'])) : 0;
		$this->pagination->initialize($config);
		$this->data['paging'] = $this->pagination->create_links();
		$this->data['images'] = $this->asset->get_asset_limit($config['per_page'], $offset);
		$this->load->view('template', $this->data);
	}
		
	
	public function deleteImage($file) {//gets the job done but you might want to add error checking and security
        $success = unlink(FCPATH . 'assets/img/uploads/' . $file);
        $success = unlink(FCPATH . 'assets/img/uploads/thumbs/' . $file);
        //info to see if it is doing what it is supposed to
   		$info = new StdClass;
        $info->sucess = $success;
        $info->path = base_url() . 'assets/img/uploads/' . $file;
        $info->file = is_file(FCPATH . 'assets/img/uploads/' . $file);

        if (IS_AJAX) {
            //I don't think it matters if this is set but good for error checking in the console/firebug
            echo json_encode(array($info));
        } else {
            //here you will need to decide what you want to show for a successful delete        
            $file_data['delete_data'] = $file;
            $this->load->view('admin/delete_success', $file_data);
        }
    }
	
	# ajax request
	public function get_all_asset(){
		echo $this->asset->get_all_asset_ajax();
	}


}