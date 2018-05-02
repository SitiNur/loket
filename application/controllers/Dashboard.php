<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct()
		{
			parent::__construct();
			$this->load->model(array('Login_model', 'Dashboard_model'));
			$this->load->helper('url');
			
		}

	public function index()
	{
		$data['result'] = $this->Login_model->getListEvent($res['id_user']);
		$this->load->view('dashboard_view', $data);
	}

	public function addEvent(){
		$event= array(
			'id_user' => $this->input->post('id_user'),
			'title' => $this->input->post('title'),
			'description' => $this->input->post('description'),
			'datetime' => $this->input->post('datetime'),
			'location' => $this->input->post('location'),
			
		);

		$typeTicket = intval($this->input->post('typeTicket'));
		$ticket = $this->input->post('ticket');
		$ticket = explode(',', $ticket);
		$price = $this->input->post('price');
		$price = explode(',', $price);
		$dataTicket = array();
		
		for($i=0; $i<$typeTicket; $i++){
			$dataTicket[$i] = array(
				'name' => $ticket[$i],
				'price' => $price[$i],
			); 
		}
		
		if($this->Dashboard_model->addEvent($event, $dataTicket)){
			echo json_encode(array('return'=>'true'));
		}else{
			echo json_encode(array('return'=>'false'));
		}
	
	}

}