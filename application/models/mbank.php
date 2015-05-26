<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mbank extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
       public function tampil(){
    //$this->db->from('mahasiswa');
        $query = $this->db->get("bank");
        return $query->result_array(); 
     }
      public function add_record($data){
     $db_debug = $this->db->db_debug;
     $this->db->db_debug = true;
     $this->db->insert('bank',$data);
     return $this->db->_error_number();
      
     }
  function delete($id)
    {
        
        $db_debug = $this->db->db_debug;
        $this->db->db_debug = true;
        $this->db->where('idbank',$id);
        $this->db->delete('bank');
        return $this->db->_error_number();
    }
}