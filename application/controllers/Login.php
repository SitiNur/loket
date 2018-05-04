<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct()
		{
			parent::__construct();
			$this->load->model(array('Login_model'));
			$this->load->helper('url');
			
		}

	public function index()
	{
		session_destroy();
		session_start();
		$data['notif']="";
		$this->load->view('login_view', $data);
	}

	public function login(){
		$data['user_name'] = $this->input->post('user_name');
		$pass = $this->input->post('password');
		$salt = 'loket2018';
		$data['password']   = hash('sha256', $pass.$salt);
		$res = $this->Login_model->login($data);
		
		if($res != false){
			$this->session->set_userdata('id_user', $res['id_user']);
			$this->session->set_userdata('first_name', $res['first_name']);

			$data['notif']="login success";
			$this->load->view('Login_view', $data);
		}else{
			$data['notif']="Anda tidak terdaftar!";
			$this->load->view('Login_view', $data);
		}
	}

	public function logout(){
		session_destroy();
		$data['notif']="";
		$this->load->view('Login_view', $data);

	}
}
