<?php	

class Dashboard extends CI_Controller{

	var $data = array();

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('ibf_token_string') == '') redirect('login');
		$this->data['privilage'] = $this->session->userdata('privilage');
	}
	
	public function index(){
		$this->load->model('Mdl_member','member');
		$this->load->model('Mdl_article','article');
		$this->data['page'] = 'page/home';
		$id = $this->session->userdata('id');
		$this->data['count_member'] = $this->member->count_member();
		$this->data['count_article'] = $this->article->count_article($id);
		if($this->data['privilage']['app_2'] > 1)
			$this->data['count_article'] = $this->article->count_article();
		
		$this->load->view('template', $this->data);
	}


}