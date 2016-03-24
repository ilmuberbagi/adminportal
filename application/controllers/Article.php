<?php

/**
 * @package    mitrakomunitas.ilmuberbagi.or.id / 2016
 * @author     Sabbana
 * @copyright  Divisi IT IBF
 * @version    1.0
 */
 
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller{

	var $data = array();

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('ibf_token_string') == '') redirect('login');
		$this->load->model('Mdl_article','article');
	}
	
	public function index(){
		$this->data['title'] = 'IBF Articles';
		$this->data['page'] = 'page/article';
		$this->data['articles'] = $this->article->get_article();
		$this->load->view('template', $this->data);
	}
	
	public function category(){
		$this->data['title'] = 'IBF Article Categories';
		$this->data['page'] = 'page/article_category';
		$this->data['categories'] = $this->article->get_article_category();
		$this->load->view('template', $this->data);
	}
	
	public function detail($id){
		$this->data['article'] = $this->article->get_article($id);
		$this->data['categories'] = $this->article->get_article_category();
		$this->data['title'] = 'IBF Articles : '.$this->data['article'][0]['article_title'];
		$this->data['page'] = 'page/article_detail';
		$this->load->view('template', $this->data);
	}
	
	public function create(){
		$this->data['categories'] = $this->article->get_article_category();
		$this->data['title'] = 'IBF Articles : New Article';
		$this->data['page'] = 'page/article_detail';
		$this->load->view('template', $this->data);
	}
	
	public function insert(){
		$tags = explode(',',$this->input->post('tags'));
		$data = array(
			'article_title' => $this->input->post('article_title'),
			'article_content' => $this->input->post('article_content'),
			'article_author' => $this->input->post('article_author'),
			'article_date_input' => date('Y-m-d H:i:s'),
			'article_category' => $this->input->post('article_category'),
			'article_tags' => json_encode($tags)
		);
		$act = $this->article->insert($data);
		if($act)
			$this->session->set_flashdata('success','The Article has been saved.');
		else
			$this->session->set_flashdata('error','Trouble while saving article.');
		
		redirect('article');
	}	
	
	public function update(){
		$id = $this->input->post('article_id');
		$tags = explode(',',$this->input->post('tags'));
		$date = str_replace('/','-',$this->input->post('article_date'));
		$data = array(
			'article_title' => $this->input->post('article_title'),
			'article_content' => $this->input->post('article_content'),
			'article_author' => $this->input->post('article_author'),
			'article_date_update' => date('Y-m-d H:i:s', strtotime($date)),
			'article_category' => $this->input->post('article_category'),
			'article_tags' => json_encode($tags)
		);
		$act = $this->article->update($id, $data);
		if($act)
			$this->session->set_flashdata('success','The Article has been updated.');
		else
			$this->session->set_flashdata('error','Trouble while updating article.');
		redirect('article');
	}
	
	public function get_image_from_dir(){
		$handle = opendir('./assets/img/thumbs/');
        while($file = readdir($handle)){
            if($file !== '.' && $file !== '..'){
                echo '<img src="'.base_url().'assets/img/thumbs/'.$file.'" border="0" />';
            }
        }
	}


}