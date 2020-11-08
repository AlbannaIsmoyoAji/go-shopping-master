<?php
defined('BASEPATH') OR exit('No Direct Script Access Allowed');

class Auth_model extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get($table)
    {
        $res = $this->db->get($table);
        return $res->result_array();
    }
    
    public function Insert($table,$data)
    {
        $res = $this->db->insert($table, $data); 
        return $res; 
    }
 
    public function Update($table, $data, $where)
    {
        $res = $this->db->update($table, $data, $where);
        return $res;
    }
 
    public function Delete($table, $where)
    {
        $res = $this->db->delete($table, $where);
        return $res;
    }

    public function GetWhere($table, $data)
    {
        $res=$this->db->get_where($table, $data);
        return $res->result_array();
    }

    public function CekLogin($table, $data)
    {
        $res=$this->db->get_where($table, $data);
        return $res;
    }

    
}


?>