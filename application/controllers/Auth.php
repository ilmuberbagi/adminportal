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
	}

	public function index(){
		$username = $this->security->xss_clean($this->input->post('username'));
		$password = $this->security->xss_clean($this->input->post('password'));
		$login = $this->model->get_user($username, $password);
		if ($login){
			foreach($login as $data){
				$create_session = array(
					'ibf_token_string' 	=> 'IBF'.md5($password),
					'email'			=> $data['member_email'],
					'username'		=> $username,
					'name'			=> $data['member_name'],										
				);
				$this->session->set_userdata($create_session);
				redirect('dashboard');
			}
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
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}

}