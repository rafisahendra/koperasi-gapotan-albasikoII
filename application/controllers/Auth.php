<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('AdminMd');

		
	}

	
	public function index()
	{	
		if($this->session->userdata('email')){
			redirect('HomeCtr');
		}
		
        $validation = $this->form_validation;
		$validation->set_rules($this->AdminMd->rules_login());
		
        if ($validation->run() == false) {
            $this->load->view('auth/login');
        }else{
			$email = $this->input->post('email');
			$pass = $this->input->post('pass');

			$user = $this->db->get_where('admin', array('email' => $email))->row();
			
			if($user->email == $email ){
				if($user->password == md5($pass) ){

					$data_session = [
						'email' => $user->email,
						'level' => $user->level,
						'user'  => $user->nama_lengkap
					];

					$this->session->set_userdata($data_session);
					redirect('HomeCtr/');
					

				}else{
					$this->session->set_flashdata('gagal','Periksa Password Anda Kembali !');
					redirect('Auth');
				}
			}else{
				$this->session->set_flashdata('gagal','Periksa Email Anda Kembali !');
				redirect('Auth');
			}

		}

		
	}



	public function logout(){
		session_destroy();
		redirect('Auth');
	}


	public function error(){
		$this->load->view('auth/error');
	}

}
