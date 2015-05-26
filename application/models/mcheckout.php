<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mcheckout extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
      public function masukin($table,$data){
      $this->db->insert($table, $data);  
     }
     
         public function teang(){
              date_default_timezone_set('Asia/Jakarta');
              
             $now= date("ym");
             $now=substr($now,1);
             $nso= date("Y-m");   
// echo "select kode_transaksi from pemesanan where SUBSTRING(waktu,1,7) = '$nso' order by kode_transaksi asc limit 0,1";
             $g=$this->db->query("select kode_transaksi from pemesanan where SUBSTRING(waktu,1,7) = '$nso' order by kode_transaksi asc limit 0,1")->result(); 
                                  if( sizeof($g)==0)
                                  {
                                     $no=$now."1";
                                   }
                                   else
                                        {  
                                  $no=substr($g[0]->kode_transaksi,3,strlen($g[0]->kode_transaksi)-3);
                                  $no=$no+1;  
                                  $no=$now.$no;
                                        } 
                                       return  $no;
               
         }
         
      public function kurangin_stok_dong_bro($ukurin,$qty,$kodprod){
       
           $g=$this->db->query("UPDATE produk SET $ukurin = $ukurin - " . $qty  . " WHERE kodeproduk = '" . $kodprod."'"); 
       
    }
    
    public function lihat_stok_cukup_teu($ukurin,$qty,$kode){
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
    
     public function history_order($id){ 
        
        $sql= "select * from pemesanan where id_member = '".$id. "'";
        return $this->db->query($sql)->result();
     }
     
     public function daftar_bank()
     {
        return $this->db->get('bank')->result();
        
     }
     
}