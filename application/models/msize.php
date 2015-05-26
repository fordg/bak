<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Msize extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
     public function record_count() {
        return $this->db->count_all("size");
    }
     public function tambahin($data){
      
       $query=$this->db->insert('ukuran',$data);         
       $iiid=$this->db->insert_id();
     $this->db->query("ALTER TABLE  `produk`  ADD  `ukr_$iiid`  INT NULL");
      return $this->db->_error_number();
                  
      }

     public function update_record($id,$data){
        
        $db_debug = $this->db->db_debug;
     $this->db->db_debug = false;
      $query = $this->db->query("UPDATE ukuran SET ukuran_produk = '$data' WHERE id = '$id'");
          return $this->db->_error_number();
      }

     public function delete_row($id){ 
        $idii="ukr_".$id;
        $this->db->query("delete from ukuran WHERE id = '$id'");
        $this->db->query("ALTER TABLE  `produk`  DROP  `$idii`");
        
        
     }
    
     public function tampil(){
        $query = $this->db->get('ukuran');
        return $query->result_array(); 
     }
     public function get_id ($id){
            $this->db->where('id', $id);
        return $query = $this->db->get ('ukuran')->row();
  
    }
     
            
}