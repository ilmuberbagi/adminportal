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
		$username = $this->security->xss_clean($this->input->post('member_username'));
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
		
		$this->load->library('recaptcha');
		$recaptcha = $this->input->post('g-recaptcha-response');
        if (!empty($recaptcha)) {
            $response = $this->recaptcha->verifyResponse($recaptcha);
            if (isset($response['success']) and $response['success'] === true) {
				$count = $this->member->count_member_per_year();
				$this->load->helper('misc');
				$pass = generatePassword(8,4);
				$code = generate_code_member($count+1);
				$data = array(
					'member_name'	=> $name,
					'member_email'	=> $email,
					'member_username'	=> $username,
					'member_password'	=> md5($pass),
					'member_ibf_code'	=> $code,
					'member_status'		=> 0,
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
					# create privilage default user
					$data = array('member_id' => $member_id);
					$cp = $this->member->create_privilage($data);				
					if($cp){
						# sending emil
						$this->load->library('Lib_mailer');
						$this->lib_mailer->init();
						$bcc = array(
							'email' => 'sabbana.azmi@kompas.com',
							'name'	=> 'Sabbana Azmi'
						);
						$result = array(
							'password'	=> $pass,
							'username'	=> $username,
							'name'		=> $name,
							'code'		=> $code,
						);
						$message = $this->load->view('template/mailer/createUser', $result, TRUE);
						$send = $this->lib_mailer->sendmail(array('email'=>$email), 'Portal Ilmu Berbagi', $message, '', $bcc);
						if($send){
							$this->session->set_flashdata('success','<b>Selamat,</b> Anda telah terdaftar sebagai Member Ilmu Berbagi Foundation. Silakan lakukan aktivasi akun Anda di alamat email yang Anda daftarkan. Salam Berbagi...');
						}else{
							$this->session->set_flashdata('warning','<b>Peringatan!</b> Anda telah terdaftar sebagai Member Ilmu Berbagi Fondation. Pengiriman link konfirmasi ke alamat email gagal.');
						}
					}
				}
			}else{
				$this->session->set_flashdata('warning','<b>Peringatan,</b> Mohon untuk memastikan Anda bukan robot, dengan mengikuti instruksi capcha yang diberikan!');
			}
        }else{
			$this->session->set_flashdata('warning','<b>Peringatan,</b> Mohon untuk memastikan Anda bukan robot, dengan mengecek capcha yang telah disediakan!');
		}
		redirect('register');
	}
	
	/**
	 * reset password 
	 * @email
	 */
	 
	public function reset_password(){
		$email = $this->input->post('email');
		$this->load->library('Lib_mailer');
		$this->lib_mailer->init();
		# get data member:
		$data = $this->mdl_login->get_member_by_email($email);
		if(!empty($data)){
			$bcc = array(
				'email' => 'sabbana.azmi@kompas.com',
				'name'	=> 'Sabbana Azmi'
			);
			$this->load->helper('misc');
			$result = array(
				'password'	=> generatePassword(8, 4),
				'username'	=> $data[0]['member_username'],
				'name'		=> $data[0]['member_name'],
				'code'		=> $data[0]['member_ibf_code'],
			);
			
			# update password
			$this->load->model('Mdl_member','member');
			$act = $this->member->update($data[0]['member_id'], array('member_password' => md5($result['password'])));
			if($act){
				$message = $this->load->view('template/mailer/password_reset', $result, TRUE);
				$this->lib_mailer->sendmail(array('email'=>$email), 'Portal Ilmu Berbagi', $message, '', $bcc);
				$msg = '<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h4><i class="icon fa fa-check"></i> Success!</h4>Reset password portal telah berhasil diset ulang. Kami telah mengirim password baru Anda ke email yang Anda masukkan.</div>';
				$this->session->set_flashdata('invalid',$msg);
			}
		}else{
			$msg = '<div class="alert alert-warning alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-warning"></i> Invalid!</h4>Email yang Anda masukkan tidak terdaftar sebagai member ilmu berbagi. Silakan hubungi Administrator.</div>';
			$this->session->set_flashdata('invalid',$msg);
		}
		redirect('reset');
	}
	
	public function activation($token){
		$act = $this->mdl_login->account_activation($token);
		if($act){
			$msg = '<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Sukses!</h4>Akun member Portal Ilmu Berbagi Anda telah aktif. Silakan gunakan akun Anda untuk masuk ke halaman portal Ilmuberbagi.</div>';
			$this->session->set_flashdata('invalid',$msg);
		}else{
			$msg = '<div class="alert alert-warning alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-warning"></i> Peringatan!</h4>Terjadi masalah saat melakukan aktivasi akun Anda. Mohon hubungi Administrator.</div>';
			$this->session->set_flashdata('invalid',$msg);
		}
		redirect('login');
	}
	
    public function signout(){
        $this->session->unset_userdata('token_string');
		$this->session->sess_destroy();
        redirect('login');
    }

}
