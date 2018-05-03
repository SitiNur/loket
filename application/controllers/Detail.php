<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends CI_Controller {
	function __construct()
		{
			parent::__construct();
			$this->load->model(array('Dashboard_model'));
			$this->load->helper('url');
			
		}

	public function index($id_event){
		$id_event = base64_decode($id_event);
		$data = $this->Dashboard_model->detailEvent($id_event);
		if($data != false){
			print_r(array('return'=>'true', 'data'=> $data));
		}else{
			print_r(array('return'=>'false'));
		}
	}
}