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
	
	public function edit($code){
		$this->data['member'] = $this->member->get_member($code);
		$this->data['page'] = 'page/member_form';
		$this->data['title'] = 'IBF Member : '.$this->data['member'][0]['member_name'];
		$this->data['types'] = $this->member->get_member_types();
		$this->data['region'] = $this->member->get_regions();
		$this->load->view('template', $this->data);
	}
	
	public function detail($code){
		$this->load->model('Mdl_article','article');
		$this->data['page'] = 'page/member_detail';
		$this->data['articles'] = $this->article->get_article_by_member($this->lib_general->get_id_from_code($code));
		$this->data['member'] = $this->member->get_member($code);
		$this->data['title'] = 'IBF Member : '.$this->data['member'][0]['member_name'];
		$this->load->view('template', $this->data);
	}

	public function region($region = ""){
		$this->data['title'] = 'IBF Region';
		$this->data['page'] = 'page/region';
		$this->data['region'] = $this->member->get_region();
		if($region !== ""){
			$this->data['page'] = 'page/member';
			$this->data['members'] = $this->member->get_region($region);
		}
		$this->load->view('template', $this->data);
	}
	
	public function type($type = ""){
		$this->data['title'] = 'IBF Member Types';
		$this->data['page'] = 'page/member_type';
		$this->data['types'] = $this->member->get_member_type();
		if($type !== ""){
			$this->data['page'] = 'page/member';
			$this->data['members'] = $this->member->get_member_type($type);
		}
		$this->load->view('template', $this->data);		
	}
	
	public function privilage(){
		$this->data['title'] = 'IBF Members';
		$this->data['page'] = 'page/privilage';
		$this->data['apps'] = $this->member->get_apps();
		$this->data['members'] = $this->member->get_user_privilage();
		$this->load->view('template', $this->data);
	}


}