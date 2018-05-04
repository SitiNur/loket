<?php
class Dashboard_model extends CI_Model{
    public function __construct(){
        $this->load->database();
        parent::__construct();
        
    }
    public function getLocationOption(){
        $query = $this->db->get('tb_location');
        $result = $query->result_array();
        return $result;
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

    public function detailEvent($id_event){
    	$this->db->select('*');
        $this->db->where(array('id_event'=> $id_event));
        $this->db->from('tb_event');
        $query = $this->db->get();
        $result['event'] = $query->row_array();
        $num_rows = $query->num_rows();

        if($num_rows > 0) {
	        $query = $this->db->get_where('tb_ticket', array('id_event' => $id_event));
            $result['ticket'] = $query->result_array();

            return $result;
        } 
        return false;
    }

    public function updateEvent($id_event, $event, $dataTicket){
    	$this->db->trans_begin();

		$this->db->where('id_event', $id_event);
		$this->db->update('tb_event', $event);

        $this->db->delete('tb_ticket', array('id_event' => $id_event));  

    	for($i=0; $i<sizeof($dataTicket); $i++){
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

    public function deleteEvent($id_event){
        $this->db->trans_begin();

        
        $this->db->delete('tb_event', array('id_event' => $id_event));  
        $this->db->delete('tb_ticket', array('id_event' => $id_event));
        
        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return false;
        }else{
            $this->db->trans_commit();
            return true;
        }
    }
}