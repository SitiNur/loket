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

	public function detailEvent(){
		$id_event = $this->input->post('id_event');
		$data = $this->Dashboard_model->detailEvent($id_event);
		if($data != false){
			echo json_encode(array('return'=>'true', 'data'=> $data));
		}else{
			echo json_encode(array('return'=>'false'));
		}
	}

	public function updateEvent(){
		$id_event = $this->input->post('id_event');
		echo $id_event;
		$event= array(
			'title' => $this->input->post('title'),
			'description' => $this->input->post('description'),
			'datetime' => $this->input->post('datetime'),
			'location' => $this->input->post('location'),
		);

		$typeTicket = intval($this->input->post('typeTicket'));
		$id_ticket = $this->input->post('id_ticket');
		$id_ticket = explode(',', $id_ticket);
		$ticket = $this->input->post('ticket');
		$ticket = explode(',', $ticket);
		$price = $this->input->post('price');
		$price = explode(',', $price);
		$dataTicket = array();
		
		for($i=0; $i<$typeTicket; $i++){
			$dataTicket[$i] = array(
				'id_ticket' =>$id_ticket[$i],
				'name' => $ticket[$i],
				'price' => $price[$i],
			); 
			echo json_encode($dataTicket[$i]);
		}
		
		// if($this->Dashboard_model->updateEvent($id_event, $event, $dataTicket)){
		// 	echo json_encode(array('return'=>'true'));
		// }else{
		// 	echo json_encode(array('return'=>'false'));
		// }
	
	}
}