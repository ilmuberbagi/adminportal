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

	public function count_article_by_category($id){
		$this->ci->load->model('Mdl_article','article');
		return $this->ci->article->count_article_by_category($id);
	}

}