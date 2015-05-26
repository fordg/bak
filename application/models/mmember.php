<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mmember extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
     public function record_count() {
        return $this->db->count_all("member");
    }
    public function get_records($limit, $start){
      $this->db->limit($limit, $start);
        $query = $this->db->get("member");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
     }

     public function add_record($data){
      $this->db->insert('member', $data);
      return;
     }

     public function update_record($id,$data){
      $this->db->where('id_member', $id);
      $this->db->update('member',$data);
     }

     public function delete_row($id){
      $this->db->where('id_member', $id);
      $this->db->delete('member');
     }
     public function caridata(){
        $c = $this->input->post('search');
        $this->db->like('NamaDepan', $c);
        $query = $this->db->get ('member');
        return $query->result(); 
     }
     public function tampil(){
    //$this->db->from('mahasiswa');
        $query = $this->db->get('member');
        return $query->result(); 
     }
     public function get_id ($id){
        $sql= "select * from member where id_member = '".$id. "'";
        return $this->db->query($sql)->row();
    }
}