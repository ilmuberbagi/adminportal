<?php

/**
 * @package    portal.ilmuberbagi.or.id / 2016
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
	
	public function category($id = ""){
		$this->data['title'] = 'IBF Article Categories';
		$this->data['page'] = 'page/article_category';
		$this->data['categories'] = $this->article->get_article_category();
		if($id !==""){
			$this->data['page'] = 'page/article';
			$this->data['articles'] = $this->article->get_article_category($id);	
		}
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
		if($act){
			$upd = $this->article->update_category_count($data['article_category']);
			if($upd)
				$this->session->set_flashdata('success','Artikel telah berhasil disimpan.');
		}else
			$this->session->set_flashdata('error','Terjadi masalah saat menyimpan data.');
		
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
			'article_date_update' => date('Y-m-d H:i:s'),
			'article_category' => $this->input->post('article_category'),
			'article_tags' => json_encode($tags),
		);
		if($this->session->userdata('privilage')[0]['app_2'] > 1 ||
			$this->session->userdata('id') == $this->input->post('article_author'))
			$data['article_approve'] = $this->input->post('article_approve');
		
		$act = $this->article->update($id, $data);
		if($act){
			$upd = $this->article->update_category_count($data['article_category']);
			if($upd)
				$this->session->set_flashdata('success','Data artikel telah berhasil diupdate.');
		}else
			$this->session->set_flashdata('error','Terjadi masalah saat menyimpan data.');
		redirect('article');
	}
	
	public function image(){
		$this->data['title'] = 'IBF Image Asset';
		$this->data['page'] = 'page/article_category';
		$this->data['categories'] = $this->article->get_article_category();
		$this->load->view('template', $this->data);
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