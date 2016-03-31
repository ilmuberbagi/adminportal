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
	
	public function reset(){
		$this->load->view('template/reset');
	}
	
	public function register(){
		$this->load->model('Mdl_member','member');
		$data['types'] = $this->member->get_member_types();
		$data['region'] = $this->member->get_regions();
		$this->load->view('template/register', $data);
	}
	
	public function proc_register(){
		$this->load->model('Mdl_member','member');
		
		$name = $this->security->xss_clean($this->input->post('member_name'));
		$place = $this->security->xss_clean($this->input->post('member_birthplace'));
		$birthdate = str_replace('/','-', $this->security->xss_clean($this->input->post('member_birthdate')));
		$education = $this->security->xss_clean($this->input->post('member_education'));
		$gender = $this->input->post('member_gender');
		$job = $this->security->xss_clean($this->input->post('member_job'));
		$skills = $this->security->xss_clean($this->input->post('member_skills'));
		$description = $this->security->xss_clean($this->input->post('member_description'));
		$region = $this->input->post('member_region');
		$type = $this->input->post('member_type');
		$phone = $this->security->xss_clean($this->input->post('member_phone'));
		$email = $this->security->xss_clean($this->input->post('member_email'));
		$address = $this->security->xss_clean($this->input->post('member_address'));
		$fb = $this->security->xss_clean($this->input->post('member_fb'));
		$tw = $this->security->xss_clean($this->input->post('member_twitter'));
		$website = $this->security->xss_clean($this->input->post('member_website'));
		$motivation = $this->security->xss_clean($this->input->post('member_reason'));
		$username = $this->security->xss_clean($this->input->post('member_username'));
		$password = $this->security->xss_clean($this->input->post('member_password'));
		
		$count = $this->member->count_member_per_year();
		
		$data = array(
			'member_name'	=> $name,
			'member_email'	=> $email,
			'member_username'	=> $username,
			'member_password'	=> md5($password),
			'member_ibf_code'	=> generate_code_member($count+1),
		);
		$member_id = $this->member->create_user($data);
		
		$detailuser = array(
			'member_id'	=> $member_id,
			'member_birthplace'	=> $place,
			'member_birth_date'	=> date('Y-m-d', strtotime($birthdate)),
			'member_education'	=> $education,
			'member_gender'	=> $gender,
			'member_job'	=> $job,
			'member_skills'	=> $skills,
			'member_description'	=> $description,
			'member_region'	=> $region,
			'member_type'	=> $type,
			'member_phone'	=> $phone,
			'member_address'	=> $address,
			'member_facebook'	=> $fb,
			'member_twitter'	=> $tw,
			'member_blog'	=> $website,
			'member_motivation'	=> $motivation,
			'member_reg_year'	=> date('Y'),
			'member_date_input'	=> date('Y-m-d H:i:s'),
			'member_date_update'	=> date('Y-m-d H:i:s'),
		);
		
		$act = $this->member->insert($detailuser);
		if($act){
			/*
			$this->load->library('Lib_mailer');
			$this->lib_mailer->init();
			# message body
			$param = array(
				'name' 		=> $data['member_name'],
				'username'	=> $data['member_username'],
				'password'	=> $password,
			);
			$bcc = array(
				'email' => 'sabbana.a7@gmail.com',
				'name'	=> 'Sabbana Azmi'
			);
			$cc = array(
				'email'	=> 'info@ilmuberbagi.or.id',
				'name'	=> 'Ilmu Berbagi Foundation'
			);

			$message = $this->load->view('template/mailer/createUser', $param, TRUE);
			$this->lib_mailer->sendmail(array('email'=>$email), 'Selamat Datang di Mitra Komunitas IBF', $message, $cc, $bcc);
			*/
			$this->session->set_flashdata('success','<b>Selamat,</b> Anda telah terdaftar sebagai Member Ilmu Berbagi Foundation. Kami telah mengirimkan email akun akun Anda yang dapat digunakan untuk masuk dan menggunakan layanan-layanan kami. Salam Berbagi!');
		}
		redirect('register');
	}
	
    public function signout(){
        $this->session->unset_userdata('token_string');
		$this->session->sess_destroy();
        redirect('login');
    }

}
