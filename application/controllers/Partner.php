<?php

/**
* @package    mitrakomunitas.ilmuberbagi.or.id / 2016
* @author     Puguh
* @copyright  Divisi IT IBF
* @version    1.0
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Partner extends CI_Controller{

	var $data = array();

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('ibf_token_string') == '') redirect('login');
		$this->load->model("Mdl_partner","partner");
		$this->data['privilage'] = $this->session->userdata('privilage');
	}

	public function index(){
		$this->data['title'] 	= 'IBF Partner';
		$this->data['page'] 	= 'page/partner';
		$this->data['partner'] 	= $this->partner->get_partner();
		$this->load->view('template', $this->data);
	}

	public function create(){
		$this->data['title'] 	= 'IBF Partner : Tambah Partner';
		$this->data['page'] 	= 'page/partner_detail';
		$this->load->view('template', $this->data);
	}

	public function insert(){
		if (isset($_FILES['company_logo']) && !empty($_FILES['company_logo']['name'])){
			// insert data dan gambar 
			$config	= array(
				'upload_path'	=> 	'./assets/img/partner/',
				'allowed_types'	=>	'gif|jpg|png|jpeg|bmp',
				'max_size'		=> 	'2048',
				'max_height'	=>	'768'
			);
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('company_logo')){
				$this->session->set_flashdata('error','Terjadi masalah saat menyimpan gambar.');
			}else{
				$file = $this->upload->data();
				$data = array(
					'partner_name' 	=> $this->input->post('partner_name'), 
					'company' 		=> $this->input->post('company'),
					'company_logo'	=> $file['file_name'],
					'phone' 		=> $this->input->post('phone'),
					'email' 		=> $this->input->post('email')
				);
			} 
		}else{
			// insert data saja 
			$data = array(
				'partner_name' 	=> $this->input->post('partner_name'), 
				'company' 		=> $this->input->post('company'),
				'phone' 		=> $this->input->post('phone'),
				'email' 		=> $this->input->post('email')
			);
		}
		$act = $this->partner->insert($data);
		if($act) $this->session->set_flashdata('success','Data partner telah berhasil disimpan.');
		else $this->session->set_flashdata('error','Terjadi masalah saat menyimpan data.');
		redirect('partner');
	}


	public function detail($id){
		$this->data['partner'] = $this->partner->get_partner($id);
		$this->data['title'] 	= 'IBF Partner : '.$this->data['partner'][0]['partner_name'];
		$this->data['page']		= 'page/partner_detail';
		$this->load->view('template', $this->data);
	}


	public function update(){
		$id 			= $this->input->post('partner_id');
		$current_data	= $this->partner->get_partner($id);

		# update data dan gambar 
		if (isset($_FILES['company_logo']) && !empty($_FILES['company_logo']['name']))
		{	
			# if null image
			if (!is_null($current_data[0]['company_logo'])){
				unlink('./assets/img/partner/' . $current_data[0]['company_logo']);
			}
			$config	= array(
				'upload_path'	=> 	'./assets/img/partner/',
				'allowed_types'	=>	'gif|jpg|png|jpeg|bmp',
				'max_size'		=> 	'2048',
				'max_height'	=>	'768'
				);
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('company_logo'))
			{
				$this->session->set_flashdata('error','Terjadi masalah saat menyimpan gambar.');
			} else {
				$file = $this->upload->data();
				$data = array(
					'partner_name' 	=> $this->input->post('partner_name'), 
					'company' 		=> $this->input->post('company'),
					'company_logo'	=> $file['file_name'],
					'phone' 		=> $this->input->post('phone'),
					'email' 		=> $this->input->post('email')
					);
			}
		}
		# remove image
		elseif (empty($_POST['name_logo'])) {
			unlink('./assets/img/partner/'.$current_data[0]['company_logo']);
			$data = array(
				'partner_name' 	=> $this->input->post('partner_name'), 
				'company' 		=> $this->input->post('company'),
				'company_logo'	=> NULL,
				'phone' 		=> $this->input->post('phone'),
				'email' 		=> $this->input->post('email')
				);
		}
		# update data saja 
		else{
			$data = array(
				'partner_name' 	=> $this->input->post('partner_name'), 
				'company' 		=> $this->input->post('company'),
				'phone' 		=> $this->input->post('phone'),
				'email' 		=> $this->input->post('email')
				);
		}

		$act = $this->partner->update($id, $data);

		if($act){
			$this->session->set_flashdata('success','Data partner telah berhasil diupdate.');
		}else{
			$this->session->set_flashdata('error','Terjadi masalah saat menyimpan data.');
		}
		redirect('partner');
	}

	public function delete($id){
		$data 	= $this->partner->get_partner($id);
		$act 	= $this->partner->delete($id);
		if($act){
			unlink('./assets/img/partner/' . $data[0]['company_logo']);
			$this->session->set_flashdata('success','Data partner telah berhasil dihapus.');
		}else{
			$this->session->set_flashdata('error','Terjadi masalah saat menghapus data.');
		}
		redirect('partner');
	}
}