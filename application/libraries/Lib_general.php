<?php

/**
 * @package    portal IBF/libraries - 2016
 * @author     Sabbana
 * @copyright  Ilmu Berbagi Foundation
 * @version    1.0
 */

if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lib_general {

    private $ci;

    function __construct() {
        $this->ci =&get_instance();
    }
	
	public function get_id_from_code($code){
		$this->ci->load->model('Mdl_member','member');
		return $this->ci->member->get_id_from_code($code);
	}

	public function count_article_by_category($id){
		#$this->ci->load->model('Mdl_article','article');
		return 0; #$this->ci->article->count_article_by_category($id);
	}

	public function count_article_by_user($id){
		#$this->ci->load->model('Mdl_article','article');
		return 0; #$this->ci->article->count_article_by_user($id);
	}

	public function count_member_by_region($id){
		#$this->ci->load->model('Mdl_member','member');
		return 0; #$this->ci->member->count_member_by_region($id);
	}

	public function count_member_by_type($id){
		#$this->ci->load->model('Mdl_member','member');
		return 0; #$this->ci->member->count_member_by_type($id);
	}

}