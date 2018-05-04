<?php
class ListEvent_model extends CI_Model{
    public function __construct(){
        $this->load->database();
        parent::__construct();
        
    }

    public function ListEvent(){
    	$query = $this->db->get('tb_event');
        $result = $query->result_array();

        // $i = 0;
        // foreach ($result as $row) {
        //     $query = $this->db->get_where('tb_ticket', array('id_event' => $row['id_event']));
        //     $result[$i]['ticket'] = $query->result_array();
        //     $i++;
        // }

        return $result;
    }

}