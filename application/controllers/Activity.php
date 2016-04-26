<?php

/**
* @package    mitrakomunitas.ilmuberbagi.or.id / 2016
* @author     Puguh
* @copyright  Divisi IT IBF
* @version    1.0
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Activity extends CI_Controller{

	var $data = array();

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('ibf_token_string') == '') redirect('login');
		$this->load->model("Mdl_activity","activity");
		$this->data['privilage'] = $this->session->userdata('privilage');
	}

	public function index(){
		$this->data['title'] 	= 'IBF Aktifitas';
		$this->data['page'] 	= 'page/activity';
		$this->data['activity'] = $this->activity->get_activity();
		$this->load->view('template', $this->data);
	}

	public function create(){
		$this->data['title'] 	= 'IBF Activity : Tambah Aktivitas';
		$this->data['page'] 	= 'page/activity_detail';
		$this->load->view('template', $this->data);
	}

		public function insert(){
		$date_start 	= str_replace('/','-',$this->input->post('date_start'));
		$date_end 		= str_replace('/','-',$this->input->post('date_end'));
		$time_start 	= $this->input->post('time_start');
		$time_end 		= $this->input->post('time_end');
		/* insert data saja */
			$data = array(
				'activity_name' 		=> $this->input->post('activity_name'),
				'activity_location' 	=> $this->input->post('activity_location'),
				'activity_lat'		 	=> $this->input->post('lat'),
				'activity_long'		 	=> $this->input->post('long'),
				'activity_google_address' => $this->input->post('city'),
				'activity_pic' 			=> $this->input->post('activity_pic'),
				'activity_participant' 	=> $this->input->post('is_participant'),
				'activity_description' 	=> $this->input->post('activity_description'),
				'activity_image'	 	=> $this->input->post('activity_image'),
				'activity_date_start'	=> date ("Y-m-d",strtotime($date_start))." ".$time_start,
				'activity_date_end' 	=> date ("Y-m-d",strtotime($date_end))." ".$time_end,
				'activity_create_date'	=> date('Y-m-d H:i:s'),
				'activity_update_date'	=> date('Y-m-d H:i:s')
				);
			print_r($data);
			exit();
			// $act = $this->activity->insert($data);
		if($act){
			$this->session->set_flashdata('success','Data aktivitas telah berhasil diupdate.');
		}else{
			$this->session->set_flashdata('error','Terjadi masalah saat menyimpan data.');
		}
		redirect('activity');
	}
/* --- old insert ----
	public function insert(){
		$date_start 	= str_replace('/','-',$this->input->post('date_start'));
		$date_end 		= str_replace('/','-',$this->input->post('date_end'));
		$time_start 	= $this->input->post('time_start');
		$time_end 		= $this->input->post('time_end');

		if (isset($_FILES['activity_image']) && !empty($_FILES['activity_image']['name']))
		{
		insert data dan gambar 
			$config	= array(
				'upload_path'	=> 	'./assets/img/img_activity/',
				'allowed_types'	=>	'gif|jpg|png|jpeg|bmp',
				'max_size'		=> 	'2048',
				'max_height'	=>	'768'
				);
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('activity_image'))
			{
				$this->session->set_flashdata('error','Terjadi masalah saat menyimpan gambar.');
			}
			else
			{
				$file = $this->upload->data();
				$data = array(
					'activity_name' 		=> $this->input->post('activity_name'),
					'activity_location' 	=> $this->input->post('activity_location'),
					'activity_lat'		 	=> $this->input->post('lat'),
					'activity_long'		 	=> $this->input->post('long'),
					'activity_google_address' => $this->input->post('city'),
					'activity_pic' 			=> $this->input->post('activity_pic'),
					'activity_participant' 	=> $this->input->post('is_participant'),
					'activity_description' 	=> $this->input->post('activity_description'),
					'activity_date_start'	=> date ("Y-m-d",strtotime($date_start))." ".$time_start,
					'activity_date_end' 	=> date ("Y-m-d",strtotime($date_end))." ".$time_end,
					'activity_image'	 	=> $file['file_name'],
					'activity_create_date'	=> date('Y-m-d H:i:s'),
					'activity_update_date'	=> date('Y-m-d H:i:s')
					);
				$act = $this->activity->insert($data);
			} 
		}
		else{
		insert data saja 
			$data = array(
				'activity_name' 		=> $this->input->post('activity_name'),
				'activity_location' 	=> $this->input->post('activity_location'),
				'activity_lat'		 	=> $this->input->post('lat'),
				'activity_long'		 	=> $this->input->post('long'),
				'activity_google_address' => $this->input->post('city'),
				'activity_pic' 			=> $this->input->post('activity_pic'),
				'activity_participant' 	=> $this->input->post('is_participant'),
				'activity_description' 	=> $this->input->post('activity_description'),
				'activity_date_start'	=> date ("Y-m-d",strtotime($date_start))." ".$time_start,
				'activity_date_end' 	=> date ("Y-m-d",strtotime($date_end))." ".$time_end,
				'activity_create_date'	=> date('Y-m-d H:i:s'),
				'activity_update_date'	=> date('Y-m-d H:i:s')
				);
			$act = $this->activity->insert($data);
		}
		if($act){
			$this->session->set_flashdata('success','Data aktivitas telah berhasil diupdate.');
		}else{
			$this->session->set_flashdata('error','Terjadi masalah saat menyimpan data.');
		}
		redirect('activity');
	}

------ **** ----- */

	public function detail($id){
		$this->data['activity'] = $this->activity->get_activity($id);
		$this->data['title'] 	= 'IBF Activity : '.$this->data['activity'][0]['activity_name'];
		$this->data['page']		= 'page/activity_detail';
		$this->load->view('template', $this->data);
	}

	public function update(){
		$id 			= $this->input->post('activity_id');
		$date_start 	= str_replace('/','-',$this->input->post('date_start'));
		$date_end 		= str_replace('/','-',$this->input->post('date_end'));
		$time_start 	= $this->input->post('time_start');
		$time_end 		= $this->input->post('time_end');
		$current_image	= $this->input->post('current_image');

			$data = array(
				'activity_name' 		=> $this->input->post('activity_name'),
				'activity_location' 	=> $this->input->post('activity_location'),
				'activity_lat'		 	=> $this->input->post('lat'),
				'activity_long'		 	=> $this->input->post('long'),
				'activity_google_address' => $this->input->post('city'),
				'activity_pic' 			=> $this->input->post('activity_pic'),
				'activity_participant' 	=> $this->input->post('is_participant'),
				'activity_description' 	=> $this->input->post('activity_description'),
				'activity_image'	 	=> $this->input->post('activity_image'),
				'activity_date_start'	=> date ("Y-m-d",strtotime($date_start))." ".$time_start,
				'activity_date_end' 	=> date ("Y-m-d",strtotime($date_end))." ".$time_end,
				'activity_update_date'	=> date('Y-m-d H:i:s')
				);
			
			$act = $this->activity->update($id, $data);

		if($act){
			$this->session->set_flashdata('success','Data aktivitas telah berhasil diupdate.');
		}else{
			$this->session->set_flashdata('error','Terjadi masalah saat menyimpan data.');
		}
		redirect('activity');
	}

	public function delete($id){
		$data 	= $this->activity->get_activity($id);
        $act 	= $this->activity->delete($id);
		if($act){
			unlink('./assets/img/img_activity/' . $data[0]['activity_image']);
			$this->session->set_flashdata('success','Data aktivitas telah berhasil dihapus.');
		}else{
			$this->session->set_flashdata('error','Terjadi masalah saat menghapus data.');
		}
		redirect('activity');
	}
}