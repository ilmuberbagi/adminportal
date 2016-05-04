<?php

/**
* @package    mitrakomunitas.ilmuberbagi.or.id / 2016
* @author     Puguh
* @copyright  Divisi IT IBF
* @version    1.0
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Donation extends CI_Controller{

	var $data = array();

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('ibf_token_string') == '') redirect('login');
		$this->load->model("Mdl_donation","donation");
		$this->data['privilage'] = $this->session->userdata('privilage');
	}

	public function index(){
		$this->data['title'] 	= 'IBF Donasi';
		$this->data['page'] 	= 'page/donation';
		$this->data['donation'] 	= $this->donation->get_donation();
		$this->load->view('template', $this->data);
	}

	public function donator(){
		$this->data['title'] 	= 'IBF Donatur';
		$this->data['page'] 	= 'page/donator';
		$this->data['donator'] 	= $this->donation->get_donator();
		$this->load->view('template', $this->data);
	}

}