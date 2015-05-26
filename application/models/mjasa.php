<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mjasa extends CI_Model{
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
     $this->db->db_debug = true;
     $this->db->insert($table, $data);
     return $this->db->_error_number();
      
     }
    function tampil_ongkos_kirim()
    {
        $sql= "select o.*,j.nama_jasa_pengiriman, p.nama_paket_jasa , pr .namaprovinsi ,k.namakota
               from paket_jasa p, jasa_pengiriman j, ongkos_kirim o, kota k, provinsi pr
               where o.id_paket_jasa = p.id_paket_jasa and j.id_jasa_pengiriman = p.id_jasa_pengiriman and k.idkota = o.idkota and k.idprovinsi=pr.idprovinsi ";
        return $this->db->query($sql)->result_array(); 
    }
     function update_record($pk,$id,$table,$data)
    {
        $db_debug = $this->db->db_debug;
        $this->db->db_debug = false;
        $this->db->where($pk,$id);
        $this->db->update($table,$data);  
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
     public function tampil_jasa_pengiriman(){
    //$this->db->from('mahasiswa');
        $query = $this->db->get("jasa_pengiriman");
        return $query->result_array(); 
     }
      public function tampil_paket_jasa(){
    //$this->db->from('mahasiswa');
        $sql= "select p.*,j.nama_jasa_pengiriman from paket_jasa p, jasa_pengiriman j where j.id_jasa_pengiriman = p.id_jasa_pengiriman ";
        return $this->db->query($sql)->result_array();
  
     }
    
     function detail($where,$table)
    {
        $this->db->where($where);
        return $this->db->get($table)->result();
    }
   
    function custom_view($query)
    {
        $query=$this->db->query("$query");
        return $query->result_array();
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