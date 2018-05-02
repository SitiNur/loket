<?php
class Dashboard_model extends CI_Model{
    public function __construct(){
        $this->load->database();
        parent::__construct();
        
    }

    public function addEvent($event, $dataTicket){
    	$this->db->trans_begin();
    	$this->db->insert('tb_event', $event);
    	$id_event = $this->db->insert_id();

    	for($i=0; $i<sizeof($dataTicket); $i++){
    		$dataTicket[$i]['id_event'] = $id_event;
    		$this->db->insert('tb_ticket', $dataTicket[$i]);
    	}
    	
    	if ($this->db->trans_status() === FALSE){
		    $this->db->trans_rollback();
		    return false;
		}else{
		    $this->db->trans_commit();
		    return true;
		}
    }
}