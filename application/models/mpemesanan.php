<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mpemesanan extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    
      public function tampil($num, $offset){
      //$this->db->from('mahasiswa');
        $this->db->order_by('waktu', 'DESC');
        $query = $this->db->get('pemesanan',$num,$offset);
        return $query->result(); 
     }
     
          function detail($where)
    { 
        
        $sql= "select p.*,CONCAT(m.namadepan,'  ',m.namabelakang) 'namamember',m.email  
                from pemesanan p,member m 
                where p.kode_transaksi = '$where' and m.id_member=p.id_member ";
        return $this->db->query($sql)->result();                
      
    }
      function belanjaan($where)
    { 
        $g=$this->db->where('kode_transaksi', $where); 
         return $query = $this->db->get('pemesanan_detail')->result();
      
    }
     function status($where)
    { 
        $g=$this->db->where('kode_transaksi', $where); 
         return $query = $this->db->get('pemesanan')->result();
      
    }
    
     function update($id,$data)
    {
        $this->db->where('kode_transaksi',$id);
        $this->db->update('pemesanan',$data);
    }
    
     function update_stok($id,$operator)
    {
         
         $g=$this->db->where('kode_transaksi', $id); 
         $query = $this->db->get('pemesanan_detail')->result();
        for($i=0; $i<sizeof($query);$i++)
        {
           $s="SELECT * FROM ukuran where ukuran_produk=".$query[$i]->size;
            $qy=$this->db->query($s)->row();
            $uuuuuu="ukr_".$qy->id;
          
             $this->db->query("UPDATE produk SET ". $uuuuuu ."=". $uuuuuu ."$operator".  $query[$i]->qty  . " WHERE namaproduk = '" . $query[$i]->namaProduk."'");
     
      } 
    }
    
     function membatalkan_pesanan_yang_sudah_kadalauarsa_bro()
     {
            $s="SELECT * FROM pemesanan WHERE waktu <= now() - INTERVAL 3  DAY and status = 'pemesanan'";
            $query=$this->db->query($s)->row();
                  for($i=0; $i<sizeof($query);$i++)
                {
                  $this->db->query("update pemesanan set status = 'pembatalan' WHERE kode_transaksi='".$query->kode_transaksi."'");  
                  $this->update_stok($query->kode_transaksi,"+");  
                 
                } 
     }
     
     function taimstem($timestamp)
    {
     $bulan=array('','januari','februari','maret','april','mei','juni','juli','agustus','september','oktober','november','desember');
    
    $bulannaon=substr($timestamp,5,2);
    $bulannaon=ltrim($bulannaon, "0");
    
      
   return substr($timestamp,8,2). ' ' .$bulan[$bulannaon].' '.substr($timestamp,0,4).' pukul '.substr($timestamp,11,5);
     
    }
    
    
    
    
    
     
}