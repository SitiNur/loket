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
		// $event= array(
		// 	'id_user' => $this->input->post('id_user'),
		// 	'title' => $this->input->post('title'),
		// 	'description' => $this->input->post('description'),
		// 	'datetime' => $this->input->post('datetime'),
		// 	'location' => $this->input->post('location'),
			
		// );

		$ticket = array();
		$price = array();
		// foreach ($this->input->post('ticket') as $i) {
		// 	array_push($ticket, $i);
		// }

		// foreach ($this->input->post('price') as $i) {
		// 	array_push($price, $i);
		// }
		// $dataTicket = array(
		// 	'ticket' => $ticket,
		// 	'price' => $price
		// );
		print_r(($this->input->post('b')));
		//$this->Dashboard_model->addEvent($event, $ticket);
	
	}

}