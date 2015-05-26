<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mproduk extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
    }
     public function record_count() {
        return $this->db->count_all("produk");
    }
    public function get_records($limit, $start){    
        $this->db->limit($limit, $start);
        $query = $this->db->query("SELECT p.idsubkategori,p.* ,k.namaKategori  
                                FROM produk p,kategori k 
                                WHERE  p.id_kategori = k.id_kategori 
        
                                ");
   
 
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
     }

     public function add_record($data){
      $this->db->insert('produk', $data);
      return;
     }
      

     public function update_record($id,$data){
      $this->db->where('kodeProduk', $id);
      $this->db->update('produk',$data);
     }

     public function delete_row($id){
      $this->db->where('kodeProduk', $id);
      $this->db->delete('produk');
     }
     
     public function ukurannya_adalah($id){
      $this->db->where('id', $id);
      return  $query = $this->db->get('ukuran')->row();
     }
     public function caridata(){
        $c = $this->input->post('search');
        $this->db->like('NamaProduk', $c);
        $query = $this->db->get('vproduk');
        return $query->result(); 
     }
     public function tampil($limit){
    //$this->db->from('mahasiswa');
        $this->db->limit($limit);
        $query = $this->db->get('produk');
        return $query->result(); 
     }
     public function get_id ($id){
        $sql= "select * from produk where KodeProduk = '".$id. "'";
        return $this->db->query($sql)->row();
    }
    public function get_all (){
        $sql= "select * from produk";
        return $this->db->query($sql)->row();
    }
    public function get_produk_detail($id){
        $sql = $this->db->query("SELECT p.* ,k.namaKategori, h.namaHuman
                                FROM produk p,kategori k, human h
                                WHERE  p.id_kategori = k.id_kategori and p.id_human = h.id_human and p.kodeproduk='$id'
        
                                ");
        return $sql->row();
    }
 
    public function stokisisasi($kode,$ukurin,$operasi=NULL)
    {
   $nilai_cuy=0;
          if($this->cart->contents()!==FALSE)
         {
            FOREACH($this->cart->contents() as $hole)
            {
                if($hole['id']==$kode)
                 $nilai_cuy=$hole['qty'];
            }
            
         }
 
 
   $ss=$this->db->query("select $ukurin from produk where kodeProduk= '" . $kode."'")->row(); 
    return  $ss->$ukurin-$nilai_cuy;
    } 
    
    function total_item_cart()
    {
        $u=$this->session->userdata('cart_contents'); 
    	    $v='';
            if($u)
            {
                 $v=0;
           
                foreach($u as $k){
                if(is_array($k)==TRUE){
                    if($k['rowid'])
                        $v++;
                    }
               }
            }        
        return $v;
    }
      public function berapakah_stoknya($kodepro){  
        $this->load->model('msize');
      $hahaha=$this->msize->tampil();
      
      foreach($hahaha as $wkwkwkw)
      {
        $apa= $wkwkwkw['id'];
        $sql= "select  ukr_$apa from produk where kodeproduk = '".$kodepro. "'";
        $ggg= $this->db->query($sql)->result_array(); 
               
      $return[]=array('stok'=>$ggg[0]["ukr_$apa"],'ukuran'=>$wkwkwkw['ukuran_produk'],'id_'=>$apa);
     
      }
     return $return;
    
     }
	
	public function kategori($kategori){
        $query = $this->db->query("SELECT * FROM produk p, kategori k WHERE p.id_kategori=k.id_kategori AND p.id_kategori='$kategori'");
		return $query->result();
    }
    
    	public function kategori_subkategori($kategori,$subkategori){
         $query = $this->db->query("SELECT * FROM produk p, kategori k WHERE p.id_kategori=k.id_kategori AND p.id_kategori='$kategori' and p.idsubkategori='$subkategori'");
		return $query->result();
    }
	public function tampil_kategori($id){
		$query = $this->db->query("SELECT p.id_kategori AS id_kategori, k.namaKategori AS namaKategori, h.id_human AS id_human FROM kategori k, produk p, human h where p.id_kategori=k.id_kategori AND h.id_human=p.id_human AND p.id_human='$id'");
		return $query->result();
	}
	public function tampil_kategori2($id){

		$query = $this->db->query("
        
        select * from produk where id_kategori=$id
        ");
		return $query->result();
	}
    
//    public function drop(){
//        $query = $this->db->query("SELECT * FROM two_drops WHERE tier_one='$drop_var'");
//    }
}
