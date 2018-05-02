<?php
class Login_model extends CI_Model{
    public function __construct(){
        $this->load->database();
        parent::__construct();
        
    }

    function login($data){
    	$this->db->select('id_user, first_name, last_name');
        $this->db->where(array('user_name'=> $data['user_name'], 'password'=> $data['password']));
        $this->db->from('tb_user');
        $query = $this->db->get();
        $num_rows = $query->num_rows();

        $result=false;
        if($num_rows > 0) {
             $result = $query->row_array();
        } 
        return $result;
    }

    function getListEvent($id_user){
        $this->db->select('id_event, title, description, datetime, location, category');
        $this->db->where(array('id_user'=> $id_user));
        $this->db->from('tb_event');
        $this->db->join('tb_category', 'tb_category.id_category = tb_event.id_category');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

}