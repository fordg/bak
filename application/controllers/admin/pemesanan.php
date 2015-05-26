<?php

 class Pemesanan extends CI_Controller{
    public function __construct(){
        parent::__construct(); 
        $this->load->model('mproduk');
        $this->load->model('mpemesanan');
		$this->load->model('mhuman'); 
        $this->load->library( "session");
        $this->load->library('message');
        $this->form_fields_nullable = array();
    }
    public function index($id=NULL){
        $config = array(); 
        $jml = $this->db->get('pemesanan');  
         $config['total_rows'] = $jml->num_rows();  

 $config['uri_segment'] = 4;
 $config['base_url'] = base_url().'admin/pemesanan/index';
 $config['total_rows'] = $jml->num_rows(); 
 $config['per_page'] = '15';
 $config['first_page'] = 'Awal';
 $config['last_page'] = 'Akhir';
 $config['next_page'] = '&laquo;';
 $config['prev_page'] = '&raquo;';
 
 $this->pagination->initialize($config); 
 $data['halaman'] = $this->pagination->create_links(); 
 $data['tampil'] = $this->mpemesanan->tampil($config['per_page'], $id);

           $html = array();
        $html['title']      = "Administrator";
        $html['script']     = $this->load->view('administrator/template/script',null,true);
        $html['header']     = $this->load->view('administrator/template/header',null,true);
        $html['content']    = $this->load->view('administrator/list_pemesanan',$data,true);
        $html['footer']     = $this->load->view('administrator/template/footer',null,true);
        $this->load->view('administrator/template/template',$html);
    }
    
    public function detail()
    { 
        $g = ($this->uri->segment(4));
        
        $data['bijilin']=$this->mpemesanan->detail($g);
        $data['pesannanna']=$this->mpemesanan->belanjaan($g);
        $html['title']      = "Administrator";
        $html['script']     = $this->load->view('administrator/template/script',null,true);
        $html['header']     = $this->load->view('administrator/template/header',null,true);
        $html['content']    = $this->load->view('administrator/detail_pemesanan',$data,true);
        $html['footer']     = $this->load->view('administrator/template/footer',null,true);
        $this->load->view('administrator/template/template',$html);
    }
    
       public function cari() {
        $cari=($this->input->post('search')); 
       $data['bijilin']= $this->mpemesanan->detail($cari); 
       if($data['bijilin']== null){
             $this->session->set_flashdata('message', $this->message->message_error('Data Tidak Ada'));
             redirect(base_url()."admin/pemesanan/");
          }else {
            
        $data['pesannanna']=$this->mpemesanan->belanjaan($cari);
             $html = array();
             $html['title']      = "Administrator";
             $html['script']     = $this->load->view('administrator/template/script',null,true);
             $html['header']     = $this->load->view('administrator/template/header',null,true);
             $html['content']    = $this->load->view("administrator/detail_pemesanan",$data,true);
             $html['footer']     = $this->load->view('administrator/template/footer',null,true);
             $this->load->view('administrator/template/template',$html); 
          }
    }
    
    public function update_status()
    {            $status_baru= $this->uri->segment(4);
                 $id= $this->uri->segment(5);
               
                  $status_lama= $this->mpemesanan->status($id) ; 
               if($status_lama[0]->status=='pembatalan')
               $this->mpemesanan->update_stok($id,"-");
               else                                 
               if($status_baru=='pembatalan')
               $this->mpemesanan->update_stok($id,"+");
                
                   $data=array('status'=>$status_baru);
                   $this->mpemesanan->update($id,$data);
           
             $this->session->set_flashdata('message', $this->message->message_success('Data berhasil diubah'));
             redirect(base_url()."admin/pemesanan/detail/$id");
    }
    
 }
 ?>