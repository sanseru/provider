<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

		function __construct(){
		parent::__construct();		
		$this->load->model('Login_model');
		}

	public function index()
	{
		$this->load->view('auth/login');

	}


		function login_validation()
	{

			$username = $this->input->post('username',TRUE);
			$password = $this->input->post('password',TRUE);
			$where = array(
					'username' => $username,
					'password' => md5($password)
					);

	// $cek = $this->Login_model->cek_login("tbl_user",$where)->num_rows();
	$cek = $this->Login_model->cek_login("tbl_user",$where);
	$rows = $cek->num_rows();//$rows is a INT
	if($rows > 0){
        $cek = $cek->row_array();//now u get an Array
		$data_session = array(
			'nama' => $username,
			'first_name' => $cek['first_name'],
			'user_id' => $cek['user_id'],
			'email' => $cek['email'],
			'password' => $cek['password'],
			'status' => "login",
			// 'nama2' => $cek,
			);
		$this->session->set_userdata($data_session);
		redirect(site_url("Welcome"));
	}else{
		echo "Username dan password salah !";

					
	}
}

function logout(){
	$this->session->sess_destroy();
	redirect(site_url("Login"));
	}
}

