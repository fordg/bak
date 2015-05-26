<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mcontact extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
     public function record_count() {
        return $this->db->count_all("contact");
    }
    public function get_records($limit, $start){
      $this->db->limit($limit, $start);
        $query = $this->db->get("contact");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
     }

     public function add_record($data){
      $this->db->insert('contact', $data);
      return;
     }

     public function update_record($id,$data){
      $this->db->where('id_contact', $id);
      $this->db->update('contact',$data);
     }

     public function delete_row($id){
      $this->db->where('id_contact', $id);
      $this->db->delete('contact');
     }
     public function caridata(){
        $c = $this->input->post('search');
        $this->db->like('NamaDepan', $c);
        $query = $this->db->get ('contact');
        return $query->result(); 
     }
     public function tampil(){
    	//$this->db->from('mahasiswa');
        $query = $this->db->get('contact');
        return $query->result(); 
     }
     public function get_id ($id){
        $sql= "select * from contact where id_contact = '".$id. "'";
        return $this->db->query($sql)->row();
    }
}