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
        $this->db->select('id_event, title, description, datetime, location');
        $this->db->where(array('id_user'=> $id_user));
        $this->db->from('tb_event');
        $this->db->join('tb_location', 'tb_event.id_location = tb_location.id_location');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function checkUser($data = array()){
        $this->db->select('id_user');
        $this->db->from('tb_user');
        $this->db->where(array('oauth_provider'=>$data['oauth_provider'],'oauth_uid'=>$data['oauth_uid']));
        $prevQuery = $this->db->get();
        $prevCheck = $prevQuery->num_rows();
        
        if($prevCheck > 0){
            $prevResult = $prevQuery->row_array();
            $data['modified'] = date("Y-m-d H:i:s");
            $update = $this->db->update('tb_user',$data,array('id_user'=>$prevResult['id_user']));
            $userID = $prevResult['id_user'];
        }else{
            $data['created'] = date("Y-m-d H:i:s");
            $data['modified'] = date("Y-m-d H:i:s");
            $insert = $this->db->insert('tb_user',$data);
            $userID = $this->db->insert_id();
        }

        return $userID?$userID:FALSE;
    }
}