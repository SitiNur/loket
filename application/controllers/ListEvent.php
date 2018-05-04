<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ListEvent extends CI_Controller {
	function __construct()
		{
			parent::__construct();
			$this->load->model(array('ListEvent_model'));
			$this->load->helper('url');
			
		}

	public function index()
	{
		$data['list_event'] = $this->ListEvent_model->ListEvent();
		$this->load->view('listEvent_view', $data);
		
	}
}