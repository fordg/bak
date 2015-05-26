<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class mongkir extends CI_Model{
    public function __construct(){
        parent::__construct();
 }

     public function add_record($data){
     $db_debug = $this->db->db_debug;
     $this->db->db_debug = true;
     $this->db->insert("ongkos_kirim", $data);
     return $this->db->_error_number();
      
     }
     
       function update($id,$data)
    {
        $this->db->where('id_ongkos_kirim',$id);
        $this->db->update('ongkos_kirim',$data);
    }


     function update_record($kota,$service,$biaya,$waktu)
    {
     $this->db->query("UPDATE ongkos_kirim SET biaya ='$biaya', waktu='$waktu' where kota='$kota' and service='$service'");    
    } 
    public function caridata($c,$num,$offset){ 
        $this->db->like('kota', $c); 
        $query = $this->db->get('ongkos_kirim',$num,$offset);
       
        return $query->result(); 
     }
     
     public function total_row($c)
     {
         
         $this->db->like('kota', $c); 
         return $query = $this->db->get('ongkos_kirim')->result();
      
     }
     
     
     public function delete_row($id){
      $this->db->where('id_ongkos_kirim', $id);
      $this->db->delete('ongkos_kirim');
     }
     
      public function get_id ($id){
        $sql= "select * from ongkos_kirim where id_ongkos_kirim = '".$id. "'";
        return $this->db->query($sql)->row();
    }
}