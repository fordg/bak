<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Home controller class
 * This is only viewable to those members that are logged in
 */
 class Wilayah extends CI_Controller{
    function __construct(){
        parent::__construct(); 
        $this->load->model('mwilayah');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('message');
    }
    
    function manage()
    {
        $g = ($this->uri->segment(4));
        $h="tampil_".$g;
        $config = array(); 
        $data['result'] = $this->mwilayah->$h();
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
        if($g=='kota')
        {
        $data['prov'] = $this->mwilayah->tampil_provinsi();
        }
        else
        $data='';
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
        $h=$this->mwilayah->add_record($t,$d);
        if($h==1062)
        $this->session->set_flashdata('message', $this->message->message_error('Gagal menambah. Data tersebut sudah ada'));
        else
        $this->session->set_flashdata('message', $this->message->message_success('Berhasil Menambah Data'));
                       
        
        redirect(base_url()."admin/wilayah/manage/$t");
     }
      public function update_provinsi(){
        $id = $this->uri->segment(4);
        $where="idprovinsi = $id";
        $data['record'] = $this->mwilayah->detail($where,'provinsi');
        $html = array();
        $html['title']      = "Administrator";
        $html['script']     = $this->load->view('administrator/template/script',null,true);
        $html['header']     = $this->load->view('administrator/template/header',null,true);
        $html['content']    = $this->load->view('administrator/update_provinsi',$data,true);
        $html['footer']     = $this->load->view('administrator/template/footer',null,true);
        $this->load->view('administrator/template/template',$html);
    }
      public function update_kota(){
        $id = $this->uri->segment(4);
        $where="idkota = $id";
        $data['record'] = $this->mwilayah->detail($where,'kota');
        $data['prov'] = $this->mwilayah->tampil_provinsi();
        $html = array();
        $html['title']      = "Administrator";
        $html['script']     = $this->load->view('administrator/template/script',null,true);
        $html['header']     = $this->load->view('administrator/template/header',null,true);
        $html['content']    = $this->load->view('administrator/update_kota',$data,true);
        $html['footer']     = $this->load->view('administrator/template/footer',null,true);
        $this->load->view('administrator/template/template',$html);
    }
    public function ubah_data()
    {
     $id = $this->uri->segment(4);
     $input=$this->input->post();
     $t= $input['tabel'];
     unset($input['tabel']);
     $h=$this->mwilayah->update_record("id$t",$id,$t,$input);
        if($h==1062)
        $this->session->set_flashdata('message', $this->message->message_error('Gagal merubah. Data tersebut sudah ada'));
        else
        $this->session->set_flashdata('message', $this->message->message_success('Berhasil Menambah Data'));
      
      redirect(base_url()."admin/wilayah/manage/$t");
     
    }
    function hapus()
    {
     $id = $this->uri->segment(5);
     $t = $this->uri->segment(4);
     $h=$this->mwilayah->delete("id$t",$id,$t); 
     if($h==1451)
     $this->session->set_flashdata('message', $this->message->message_error('Gagal menghapus. Data tersebut sudah digunakan pada data lainnya'));
     else
     $this->session->set_flashdata('message', $this->message->message_success('Berhasil menghapus Data'));
     redirect(base_url()."admin/wilayah/manage/$t");
    }
    
    
       public function cari() {
       $data = array(); 
       $t = $this->uri->segment(4);
       $g="cari_$t";
       $data['result']= $this->mwilayah->$g(); 
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


 }
