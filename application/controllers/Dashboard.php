<?php

class Dashboard extends CI_Controller{

	var $data = array();

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('ibf_token_string') == '') redirect('login');
	}
	
	public function index(){
		$this->data['page'] = 'home';
		$this->session->set_flashdata('success','Welcome to IBF Admin Template');
		$this->load->view('template', $this->data);
	}


}