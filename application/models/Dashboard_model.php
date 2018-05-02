<?php
class Dashboard_model extends CI_Model{
    public function __construct(){
        $this->load->database();
        parent::__construct();
        
    }

    public function addEvent($data){
    	
    	$this->db->insert('tb_event', $data);

    }
}