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
		define('AUTH_API_URL','http://localhost/ibf/adminportal/api/auth/');
	}

	public function index(){
		$username = $this->security->xss_clean($this->input->post('username'));
		$password = $this->security->xss_clean($this->input->post('password'));
		$app = $this->security->xss_clean($this->input->post('app'));
		$user = $this->model->get_user($username, $password);
		if (!empty($user)){
			$priv = $this->model->get_user_privilage($user[0]['member_id']);
			$create_session = array(
				'ibf_token_string' 	=> 'IBF'.md5($password),
				'email'			=> $user[0]['member_email'],
				'id'			=> $user[0]['member_id'],
				'username'		=> $username,
				'name'			=> $user[0]['member_name'],
				'avatar'		=> $user[0]['member_image_profile'],
				'type'			=> $user[0]['member_type'],
				'ibf_code'		=> $user[0]['member_ibf_code'],
				'privilage'		=> $priv,
			);
			$this->session->set_userdata($create_session);
			// print_r($this->session->all_userdata());die();
			redirect('dashboard');
		}
		else{
			$msg = '<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Refused!</h4>
                    Invalid username or password.
                  </div>';
				  
			$this->session->set_flashdata('invalid', $msg);
			redirect('login');
		}
	}
	
	public function api_auth(){
		$username = $this->security->xss_clean($this->input->post('username'));
		$password = $this->security->xss_clean($this->input->post('password'));
		$app = $this->security->xss_clean($this->input->post('app'));
		$postdata = http_build_query(
			array(
				'api_kode'	=> 1000, 
				'api_datapost' => array($username, $password),
			)
		);
		$param = array('http' =>
			array(
				'method'  => 'POST',
				'header'  => 'Content-type: application/x-www-form-urlencoded',
				'content' => $postdata
			));
		$context  = stream_context_create($param);
		$user = json_decode(file_get_contents(AUTH_API_URL.'auth_user', false, $context), true);
		print_r($user);
		$create_session = array(
			'ibf_token_string'	=> 'IBF'.sha1($user[0]['member_id']),
			'email'			=> $user[0]['member_email'],
			'username'		=> $username,
			'name'			=> $user[0]['member_name'],
			'avatar'		=> $user[0]['member_image_profile'],
			'type'			=> $user[0]['member_type'],
		);
		$this->session->set_userdata($create_session);
		print_r($this->session->all_userdata());

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