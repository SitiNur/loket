<?php
class ListEvent_model extends CI_Model{
    public function __construct(){
        $this->load->database();
        parent::__construct();
        
    }

    public function ListEvent(){
    	$query = $this->db->get('tb_event');
        $result = $query->result_array();
        return $result;
    }

}