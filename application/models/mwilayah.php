<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mwilayah extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
     public function record_count() {
        return $this->db->count_all("kategori");
    }
    public function get_records($limit, $start){
      $this->db->limit($limit, $start);
        $query = $this->db->get("kategori");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
     }

     public function add_record($table,$data){
     $db_debug = $this->db->db_debug;
     $this->db->db_debug = false;
     $this->db->insert($table, $data);
     return $this->db->_error_number();
      
     }

     function update_record($pk,$id,$table,$data)
    {
        $db_debug = $this->db->db_debug;
        $this->db->db_debug = false;
        $this->db->where($pk,$id);
        $this->db->update($table,$data);
        
     return $this->db->_error_number();
    } 
    public function cari_provinsi(){
        $c = $this->input->post('search');
        $this->db->like("namaprovinsi", $c);
        $query = $this->db->get('provinsi');
        return $query->result_array(); 
     }
      public function cari_kota(){
         $c = $this->input->post('search');
      
          $sql= "select k.*,p.namaprovinsi from kota k, provinsi p where k.idprovinsi = p.idprovinsi and namakota like '%$c%' ";
        return $this->db->query($sql)->result_array();
  
          }
     public function tampil_provinsi(){
    //$this->db->from('mahasiswa');
        $query = $this->db->get("provinsi");
        return $query->result_array(); 
     }
      public function tampil_kota(){
    //$this->db->from('mahasiswa');
        $sql= "select k.*,p.namaprovinsi from kota k, provinsi p where k.idprovinsi = p.idprovinsi ";
        return $this->db->query($sql)->result_array();
  
     }
    
     function detail($where,$table)
    {
        $this->db->where($where);
        return $this->db->get($table)->result();
    }
    public function get_distinc(){
        $sql= "SELECT * FROM ukuran";
        return $this->db->query($sql)->result();
    }
    
     function delete($pk,$id,$table)
    {
        
        $db_debug = $this->db->db_debug;
        $this->db->db_debug = false;
        $this->db->where($pk,$id);
        $this->db->delete($table);
        return $this->db->_error_number();
    }
}