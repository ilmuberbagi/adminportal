<?php

class Member extends CI_Controller{

	var $data = array();

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('ibf_token_string') == '') redirect('login');
		$this->load->model('Mdl_member','member');
	}
	
	public function index(){
		$this->data['title'] = 'IBF Members';
		$this->data['page'] = 'page/member';
		$this->data['members'] = $this->member->get_member();
		$this->load->view('template', $this->data);
	}


}