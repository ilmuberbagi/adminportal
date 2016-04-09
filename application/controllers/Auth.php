<?php

/**
 * @package    mitrakomunitas.ilmuberbagi.or.id / 2016
 * @author     Sabbana
 * @copyright  Divisi IT IBF
 * @version    1.0
 */
 
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	var $data = array();
	
	function __construct(){
		parent::__construct();
		$this->load->model("Mdl_login","model");
		define('AUTH_API_URL','http://localhost/ibf/services/auth/');
	}
	
	public function index(){
		$datapost = array(
			'username' => $this->security->xss_clean($this->input->post('username')),
			'password' => $this->security->xss_clean($this->input->post('password')),
		);
		$app = $this->security->xss_clean($this->input->post('app'));
		$postdata = http_build_query(array('api_kode' => 1000, 'api_datapost' => $datapost));
		$param = array('http' =>
			array(
				'method'  => 'POST',
				'header'  => 'Content-type: application/x-www-form-urlencoded',
				'content' => $postdata
			));
		$context  = stream_context_create($param);
		$user = json_decode(file_get_contents(AUTH_API_URL.'user', false, $context), true);
		$priv = array();
		if(!empty($user)){
			$postdata = http_build_query(array('api_kode' => 2000, 'api_datapost' => array('member_id' => $user[0]['member_id'])));
			$param = array('http' =>
				array(
					'method'  => 'POST',
					'header'  => 'Content-type: application/x-www-form-urlencoded',
					'content' => $postdata
				));
			$context  = stream_context_create($param);
			$priv = json_decode(file_get_contents(AUTH_API_URL.'user', false, $context), true);
			# create session
			$create_session = array(
				'id'			=> $user[0]['member_id'],
				'ibf_token_string'	=> 'IBF'.md5($user[0]['member_id']),
				'email'			=> $user[0]['member_email'],
				'username'		=> $datapost['username'],
				'name'			=> $user[0]['member_name'],
				'avatar'		=> $user[0]['member_image_profile'],
				'type'			=> $user[0]['member_type'],
				'ibf_code'		=> $user[0]['member_ibf_code'],
				'privilage'		=> $priv[0],
			);
			$this->session->set_userdata($create_session);
			redirect('dashboard');
		}else{
			print_r($this->session->all_userdata());
			$msg = '<div class="alert alert-warning alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> ditolak!</h4>Username dan atau password yang Anda masukkan tidak valid.</div>';
			$this->session->set_flashdata('invalid', $msg);
			redirect('login');
		}
		
	}
	
	private function director($app){
		switch($app){
			case 'portal': 
		}
	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}

}