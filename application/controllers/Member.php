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
		$this->data['count_member'] = $this->member->count_member();
		$this->load->view('template', $this->data);
	}
	
	public function detail($code){
		$this->data['page'] = 'page/member_detail';
		$this->data['member'] = $this->member->get_member($code);
		// print_r($this->data['member']); die();
		$this->data['title'] = 'IBF Member : '.$this->data['member'][0]['member_name'];
		$this->load->view('template', $this->data);
	}


}