<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Msubkategori extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
     public function record_count() {
        return $this->db->count_all("kategori");
    }
    public function get_records($limit, $start){
      $this->db->limit($limit, $start);
                   $sql= "select k.namaKategori,s.* from kategori k,subkategori s where k.id_kategori= s.id_kategori";
  
        $query = $this->db->query($sql);
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
     }

     public function add_record($data){
      $this->db->insert('subkategori', $data);
      return $this->db->insert_id();
     }

     public function update_record($id,$data){
       $this->db->where('idsubkategori',$id);
        $this->db->update("subkategori",$data); 
     return $this->db->_error_number();
     }

     public function delete_row($id){
        
        $db_debug = $this->db->db_debug;
     $this->db->db_debug = false;
      $this->db->where('idsubkategori', $id);
      $this->db->delete('subkategori');
       
     return $this->db->_error_number();
   
     }
     public function caridata(){
        $c = $this->input->post('search');
        $this->db->like('namaKategori', $c);
        $query = $this->db->get ('kategori');
        return $query->result(); 
     }
       public function caridata2($c){ 
        $this->db->where('namaKategori', $c);
        $query = $this->db->get ('kategori')->result();
        if(sizeof($query)!=0) 
        {
            return $query[0]->id_kategori;
        }
        else 
            return FALSE;
     }
     public function tampil(){ 
              $sql= "select k.namaKategori,s* from kategori k,subkategori s ";
        return $this->db->query($sql)->row();
 
     }
     
     public function tampil2($c){  
        return $query = $this->db->get ('ukuran')->result_array();
     }
      public function tampil3($id){
              $sql= "select * from ukuran where id_kategori <> '".$id. "'";
        return $this->db->query($sql)->result_array();
   
     }
     public function get_id ($id){

        $sql= "select k.namaKategori,s.* from subkategori s, kategori k where k.id_kategori = s.id_kategori and s.idsubkategori='".$id. "'";
        return $this->db->query($sql)->row();
    }
    public function get_distinc(){
        $sql= "SELECT * FROM ukuran";
        return $this->db->query($sql)->result();
    }
}