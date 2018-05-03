<?php
class Detail_model extends CI_Model{
    public function __construct(){
        $this->load->database();
        parent::__construct();
        
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

}