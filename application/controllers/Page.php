<?php

class Page extends CI_Controller{

	var $data = array();
	
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$this->data['page'] = 'page/list';
		$this->load->view('inspinia', $this->data);
	}


}