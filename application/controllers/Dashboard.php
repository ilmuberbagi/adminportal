<?php

class Dashboard extends CI_Controller{

	var $data = array();

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('ibf_token_string') == '') redirect('login');
	}
	
	public function index(){
		$this->load->model('Mdl_member','member');
		$this->load->model('Mdl_article','article');
		
		$this->data['page'] = 'page/home';
		$this->data['count_member'] = $this->member->count_member();
		$this->data['count_article'] = $this->article->count_article();
		$this->load->view('template', $this->data);
	}


}