<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Home controller class
 * This is only viewable to those members that are logged in
 */
 class Jasa extends CI_Controller{
    function __construct(){
        parent::__construct(); 
        $this->load->model('mjasa');
        $this->load->model('mwilayah');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('message');
        $this->load->library('js_palid');
    }
    
    function manage()
    {
        $g = ($this->uri->segment(4));
        $h="tampil_".$g;
        $config = array(); 
        $data['result'] = $this->mjasa->$h();
        $html = array();
        $html['title']      = "Administrator";
        $html['script']     = $this->load->view('administrator/template/script',null,true);
        $html['header']     = $this->load->view('administrator/template/header',null,true);
        $html['content']    = $this->load->view("administrator/list_$g",$data,true);
        $html['footer']     = $this->load->view('administrator/template/footer',null,true);
        $this->load->view('administrator/template/template',$html);
    }
    public function add_data()
    {
        $g = ($this->uri->segment(4)); 
        if($g!='jasa_pengiriman')
        {
            if($g=='ongkos_kirim')
            {
                $data['prov'] = $this->mwilayah->tampil_provinsi();
                $data['jasa_pengiriman'] = $this->mjasa->tampil_jasa_pengiriman();
                
                $a=array('id'=>'id_jasa_pengiriman','msg'=>'');
                $b=array('id'=>'idprovinsi','msg'=>'');
                $c=array('id'=>'biaya','msg'=>'');
                $d=array('id'=>'lama','msg'=>'');
                $data['validate']=$this->js_palid->kudu_pilih(array($a,$b)).$this->js_palid->kudu_isi(array($c,$d));
            }
            else
            {
                $data['jasa_pengiriman'] = $this->mjasa->tampil_jasa_pengiriman();
                $a=array('id'=>'id_jasa_pengiriman','msg'=>'');
                $b=array('id'=>'nama_paket_jasa','msg'=>'');
                $data['validate']=$this->js_palid->kudu_pilih(array($a)).$this->js_palid->kudu_isi(array($b));

            }
        }
        else
       { 
            $data['validate']=$this->js_palid->kudu_isi(array($a=array('id'=>'nama_paket_jasa','msg'=>'')));
       }  
        
        $html = array();
        $html['title']      = "Administrator";
        $html['script']     = $this->load->view('administrator/template/script',null,true);
        $html['header']     = $this->load->view('administrator/template/header',null,true);
        $html['content']    = $this->load->view("administrator/add_$g",$data,true);
        $html['footer']     = $this->load->view('administrator/template/footer',null,true);
        $this->load->view('administrator/template/template',$html);
    }
     public function tambah_()
     { 
        $d = $this->input->post();
        $t = $this->input->post('tabel');
        unset($d['tabel']); 
        $h=$this->mjasa->add_record($t,$d);
        if($h==1062)
        $this->session->set_flashdata('message', $this->message->message_error('Gagal menambah. Data tersebut sudah ada'));
        else
        if($h==0)
        $this->session->set_flashdata('message', $this->message->message_success('Berhasil Menambah Data'));
            
        redirect(base_url()."admin/jasa/manage/$t");
     }
       public function update_jasa_pengiriman(){
        $id = $this->uri->segment(4);
        $where="id_jasa_pengiriman = $id";
        $data['validate']=$this->js_palid->kudu_isi(array($a=array('id'=>'nama_paket_jasa','msg'=>'')));

        $data['record'] = $this->mjasa->detail($where,'jasa_pengiriman');
        $html = array();
        $html['title']      = "Administrator";
        $html['script']     = $this->load->view('administrator/template/script',null,true);
        $html['header']     = $this->load->view('administrator/template/header',null,true);
        $html['content']    = $this->load->view('administrator/update_jasa_pengiriman',$data,true);
        $html['footer']     = $this->load->view('administrator/template/footer',null,true);
        $this->load->view('administrator/template/template',$html);
    }
  
   public function update_ongkos_kirim(){
        $id = $this->uri->segment(4);
        $where="id_ongkos_kirim = $id";
        $data['kota'] = $this->mwilayah->tampil_kota();
        $data['provinsi'] = $this->mwilayah->tampil_provinsi();
        $data['jasapengiriman'] = $this->mjasa->tampil_jasa_pengiriman(); 
        $data['record'] = $this->mjasa->detail($where,'ongkos_kirim'); 
        
        $where='idkota = '.$data['record'][0]->idkota;
        $data['provinsi_dari_kota'] = $this->mwilayah->detail($where,'kota');  
        
        $where='id_paket_jasa = '.$data['record'][0]->id_paket_jasa; 
        $data['jasapengiriman_dari_paketjasa']= $this->mjasa->detail($where,'paket_jasa'); 
          $data['validate']=$this->js_palid->kudu_isi(array(array('id'=>'biaya','msg'=>''),array('id'=>'lama','msg'=>'')));
       
        $html = array();
        $html['title']      = "Administrator";
        $html['script']     = $this->load->view('administrator/template/script',null,true);
        $html['header']     = $this->load->view('administrator/template/header',null,true);
        $html['content']    = $this->load->view('administrator/update_ongkos_kirim',$data,true);
        $html['footer']     = $this->load->view('administrator/template/footer',null,true);
        $this->load->view('administrator/template/template',$html);
    }
  
      public function update_paket_jasa(){
        $id = $this->uri->segment(4);
        $where="id_paket_jasa = $id";
        $data['record'] = $this->mjasa->detail($where,'paket_jasa');
        $data['validate']=$this->js_palid->kudu_isi(array($a=array('id'=>'nama_paket_jasa','msg'=>'')));
        $data['prov'] = $this->mjasa->tampil_jasa_pengiriman();
        
        $html = array();
        $html['title']      = "Administrator";
        $html['script']     = $this->load->view('administrator/template/script',null,true);
        $html['header']     = $this->load->view('administrator/template/header',null,true);
        $html['content']    = $this->load->view('administrator/update_paket_jasa',$data,true);
        $html['footer']     = $this->load->view('administrator/template/footer',null,true);
        $this->load->view('administrator/template/template',$html);
    }
    public function ubah_data()
    {
     $id = $this->uri->segment(4);
     $input=$this->input->post();
     $t= $input['tabel'];
     unset($input['tabel']);
     $h=$this->mjasa->update_record("id_$t",$id,$t,$input);
        if($h==1062)
        $this->session->set_flashdata('message', $this->message->message_error('Gagal merubah. Data tersebut sudah ada'));
        else
        $this->session->set_flashdata('message', $this->message->message_success('Berhasil Menambah Data'));
      
     redirect(base_url()."admin/jasa/manage/$t");
     
    }
    function hapus()
    {
     $id = $this->uri->segment(5);
     $t = $this->uri->segment(4);
     $h=$this->mjasa->delete("id_$t",$id,$t); 
     if($h==1451)
     $this->session->set_flashdata('message', $this->message->message_error('Gagal menghapus. Data tersebut sudah digunakan pada data lainnya'));
     else
     $this->session->set_flashdata('message', $this->message->message_success('Berhasil menghapus Data'));
     redirect(base_url()."admin/jasa/manage/$t");
    }
    
    
       public function cari() {
       $data = array(); 
       $t = $this->uri->segment(4);
       $g="cari_$t";
       $data['result']= $this->mjasa->$g(); 
       if($data['result']== null){
             $this->session->set_flashdata('message', $this->message->message_error('Data Tidak Ada'));
             redirect(base_url()."admin/wilayah/manage/$t");
          }else {
            
             $html = array();
             $html['title']      = "Administrator";
             $html['script']     = $this->load->view('administrator/template/script',null,true);
             $html['header']     = $this->load->view('administrator/template/header',null,true);
             $html['content']    = $this->load->view("administrator/list_$t",$data,true);
             $html['footer']     = $this->load->view('administrator/template/footer',null,true);
             $this->load->view('administrator/template/template',$html); 
          }
    }

     function chain_ongkos_kirim()
    {
        $input=$this->input->post();
         if($input['fungsi']=='change_paket_jasa')
                {
                $id_jasa_pengiriman=$input['id_jasa_pengiriman'];
                $w="id_jasa_pengiriman = $id_jasa_pengiriman";
                $data_jasa_pengiriman = $this->mjasa->detail($w,'paket_jasa');
                $a=array('id'=>'id_paket_jasa','msg'=>'');
                $data_validate=$this->js_palid->kudu_pilih(array($a));
                echo $data_validate ;
                ?> 
                          
                      <label id="selek">
                      <select style="width: 270px;" id="id_paket_jasa" name="id_paket_jasa">
                      <option value="0" > Pilih Paket Jasa </option>
                      <?php 
                     foreach ($data_jasa_pengiriman as $pj)
                       echo "<option value=".$pj->id_paket_jasa.">".$pj->nama_paket_jasa."</option>";  
                            
                      ?>
                      </select>
                      </label>
                      
                      
                <?php 
                } 
                else
                if($input['fungsi']=='change_provinsi')
                {
                $idprovinsi=$input['idprovinsi'];
                $ew="idprovinsi = $idprovinsi";
                $data_kota = $this->mjasa->detail($ew,'kota');
                      
                $a=array('id'=>'idkota','msg'=>'');
               
                $data_validate=$this->js_palid->kudu_pilih(array($a));
                echo $data_validate ;

                ?> 
                
                          
                      <label id="selek">
                      <select style="width: 270px;" name="idkota" id="idkota">
                      <option value="0">Pilih Kota</option> 
                      <?php 
                     foreach ($data_kota as $kota)
                       echo "<option value=".$kota->idkota.">".$kota->namakota."</option>";  
                            
                      ?>
                      </select>
                      </label>
                      
                 <?php      
                }
                 else
                if($input['fungsi']=='ready_provinsi')
                {
                                 
                    $where='id_ongkos_kirim = '.$input['id_ongkir'];
                    $koca = $this->mwilayah->detail($where,'ongkos_kirim');  
                    $idprovinsi=$input['idprovinsi'];
                    $ew="idprovinsi = $idprovinsi";
                    $data_kota = $this->mjasa->detail($ew,'kota');
                    
               
                ?> 
                          
                      <label id="selek">
                      <select style="width: 270px;"  name="idkota">
                      <?php 
                     foreach ($data_kota as $kota)
                     if($koca[0]->idkota==$kota->idkota)
                     echo "<option selected='' value=".$kota->idkota.">".$kota->namakota."</option>";  
                     else
                     echo "<option value=".$kota->idkota.">".$kota->namakota."</option>";  
                            
                      ?>
                      </select>
                      </label>
                      
                 <?php      
                }
                else
                if($input['fungsi']=='ready_paket_jasa')
                {
                    
                    $where='id_ongkos_kirim = '.$input['id_ongkir'];
                    $pak_jas = $this->mwilayah->detail($where,'ongkos_kirim');  
                    $id_jasa_pengiriman=$input['id_jasa_pengiriman'];
                    $w="id_jasa_pengiriman = $id_jasa_pengiriman";
                    $data_jasa_pengiriman = $this->mjasa->detail($w,'paket_jasa');
                ?> 
                          
                      <label id="selek">
                      <select style="width: 270px;" id="idsub" name="id_paket_jasa">
                      <?php 
                      foreach ($data_jasa_pengiriman as $pj)
                      if($pak_jas[0]->id_paket_jasa==$pj->id_paket_jasa)
                        echo "<option selected='' value=".$pj->id_paket_jasa.">".$pj->nama_paket_jasa."</option>";  
                      else
                        echo "<option value=".$pj->id_paket_jasa.">".$pj->nama_paket_jasa."</option>";  
                            
                      ?>
                      </select>
                      </label>
                      
                      
                <?php 
                } 
        
                
                echo '<button style="position: absolute;bottom:305px;left: 535px;" class="simpan_chain"  style="font-size: 15px;"><span>Simpan</span></button>';
    } 

    

 }
