<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mhuman extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
     public function record_count() {
        return $this->db->count_all("human");
    }
    public function get_records($limit, $start){
      $this->db->limit($limit, $start);
        $query = $this->db->get("human");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
     }

     public function add_record($data){
      $this->db->insert('human', $data);
      return;
     }

     public function update_record($id,$data){
      $query = $this->db->query("UPDATE human SET namaHuman = '$data' WHERE id_human = '$id'");
      return $query;
     }

     public function delete_row($id){
      $this->db->where('id_human', $id);
      $this->db->delete('human');
     }
     public function caridata(){
        $c = $this->input->post('search');
        $this->db->like('namaHuman', $c);
        $query = $this->db->get ('human');
        return $query->result(); 
     }
     public function tampil(){
    //$this->db->from('mahasiswa');
        $query = $this->db->get('human');
        return $query->result(); 
     }
     public function get_id ($id){
        $sql= "select id_human,namaHuman from human where id_human = '".$id. "'";
        return $this->db->query($sql)->row();
    }
    public function get_distinc(){
        $sql= "SELECT * FROM ukuran";
        return $this->db->query($sql)->result();
    }
}