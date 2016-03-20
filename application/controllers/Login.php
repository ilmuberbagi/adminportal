<?php

/**
 * @package    studio_hub / 2015
 * @author     Sabbana
 * @copyright  Ilmu Berbagi Foundation
 * @version    1.0
 */

if ( ! defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mdl_login');
    }

    public function index() {
		$this->load->view('template/login');
	}
	
 
    public function signout(){
        $this->session->unset_userdata('token_string');
		$this->session->sess_destroy();
        redirect('login');
    }

}