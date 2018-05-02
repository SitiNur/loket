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
		if(!isset($_SESSION)){
			session_start();
		}

		$data['notif']="";
		$this->load->view('login_view');
	}

	public function login(){
		$data['user_name'] = $this->input->post('user_name');
		$pass = $this->input->post('password');
		$salt = 'loket2018';
		$data['password']   = hash('sha256', $pass.$salt);
		$res = $this->Login_model->login($data);
		
		if($res != false){
			$arr = array(
				'id_user'=>$res['id_user'],
			);
			$this->session->set_userdata($arr);
			$data['result'] = $this->Login_model->getListEvent($res['id_user']);
			$this->load->view('dashboard_view', $data);
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
