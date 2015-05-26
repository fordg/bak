<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mkategori extends CI_Model{
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

     public function add_record($data){
      $this->db->insert('kategori', $data);
      return $this->db->insert_id();
     }

     public function update_record($id,$data){
      $query = $this->db->query("UPDATE kategori SET namaKategori = '$data' WHERE id_kategori = '$id'");
      return $query;
     }

     public function delete_row($id){
        
        $db_debug = $this->db->db_debug;
     $this->db->db_debug = false;
      $this->db->where('id_kategori', $id);
      $this->db->delete('kategori');
       
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
        $query = $this->db->get('kategori');
        return $query->result(); 
     }
     
     public function tampil2($c){  
        
        $this->db->where('id_kategori',$c);
        return $query = $this->db->get ('subkategori')->result_array();
     }
      public function tampil3($id){
              $sql= "select * from ukuran where id_kategori <> '".$id. "'";
        return $this->db->query($sql)->result_array();
   
     }
     public function get_id ($id){
        $sql= "select id_kategori,namaKategori from kategori where id_kategori = '".$id. "'";
        return $this->db->query($sql)->row();
    }
    public function get_distinc(){
        $sql= "SELECT * FROM ukuran";
        return $this->db->query($sql)->result();
    }
}