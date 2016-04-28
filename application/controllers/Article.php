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
		$this->data['privilage'] = $this->session->userdata('privilage');
		// print_r($this->data['privilage']);
	}
	
	public function index(){
		$this->data['title'] = 'IBF Articles';
		$this->data['page'] = 'page/article';
		$id = $this->session->userdata('id');
		$this->data['articles'] = $this->article->get_article_by_member($id);
		if($this->data['privilage']['app_2'] > 1)
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
	
	public function sv_category(){
		$data = array(
			'category_name' => $this->security->xss_clean($this->input->post('category_name'))
		);
		$act = $this->article->create_category($data);
		if($act) $this->session->set_flashdata('success','Kategori artikel baru telah berhasil disimpan.');
		else $this->session->set_flashdata('error','Terjadi kesalahan saat menyimpan data.');
		redirect('article/category');
	}

	public function upd_category(){
		$id = $this->input->post('category_id');
		$data = array(
			'category_name' => $this->security->xss_clean($this->input->post('category_name'))
		);
		$act = $this->article->update_category($id, $data);
		if($act) $this->session->set_flashdata('success','Kategori artikel telah berhasil diupdate.');
		else $this->session->set_flashdata('error','Terjadi kesalahan saat menyimpan data.');
		redirect('article/category');
	}

	public function detail($id){
		$this->data['article'] = $this->article->get_article($id);
		$this->data['categories'] = $this->article->get_article_category();
		$this->data['title'] = 'IBF Articles : '.$this->data['article'][0]['article_title'];
		$this->load->model('Mdl_member','member');
		$this->data['members'] = $this->member->get_member();
		$this->data['page'] = 'page/article_detail';
		$this->load->view('template', $this->data);
	}
	
	public function create(){
		$this->data['categories'] = $this->article->get_article_category();
		$this->data['title'] = 'IBF Articles : New Article';
		$this->data['page'] = 'page/article_detail';
		$this->load->model('Mdl_member','member');
		$this->data['members'] = $this->member->get_member();
		$this->load->view('template', $this->data);
	}
	
	public function insert(){
		$tags = explode(',',$this->input->post('tags'));
		$priv = $this->session->userdata('privilage');
		$data = array(
			'article_title' => $this->input->post('article_title'),
			'article_content' => $this->input->post('article_content'),
			'article_author' => $this->input->post('article_author'),
			'article_image' => $this->input->post('article_image'),
			'article_date_input' => date('Y-m-d H:i:s'),
			'article_date_update' => date('Y-m-d H:i:s'),
			'article_category' => $this->input->post('article_category'),
			'article_tags' => json_encode($tags)
		);
		if($priv['app_2'] > 1 ||
			$this->session->userdata('id') == $this->input->post('article_author'))
			$data['article_approve'] = $this->input->post('article_approve');
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
		$priv = $this->session->userdata('privilage');
		$date = str_replace('/','-',$this->input->post('article_date'));
		$data = array(
			'article_title' => $this->input->post('article_title'),
			'article_content' => $this->input->post('article_content'),
			'article_image' => $this->input->post('article_image'),
			'article_author' => $this->input->post('article_author'),
			'article_date_update' => date('Y-m-d H:i:s'),
			'article_category' => $this->input->post('article_category'),
			'article_tags' => json_encode($tags),
		);
		if($priv['app_2'] > 1 ||
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
	
	public function delete(){
		$id = $this->input->post('article_id');
		$act = $this->article->delete($id);
		if($act){
			$this->session->set_flashdata('success','Data artikel telah berhasil dihapus.');
		}else
			$this->session->set_flashdata('error','Terjadi masalah saat menghapus data.');
		redirect('article');
	}
	
	public function image(){
		$this->data['title'] = 'IBF Image Asset';
		$this->data['page'] = 'page/article_category';
		$this->data['categories'] = $this->article->get_article_category();
		$this->load->view('template', $this->data);
	}
	


}