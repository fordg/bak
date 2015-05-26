<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Home controller class
 * This is only viewable to those members that are logged in
 */
 class Subkategori extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->check_isvalidated();
        $this->load->model('mkategori');
        $this->load->model('msubkategori');
        $this->load->model('msize');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('message');
        $this->load->library('js_palid');
    }
    public function index($id=null){
        $config = array();
        $config["base_url"]     = base_url() . "admin/subkategori/index/";
        $config["total_rows"]   = $this->msubkategori->record_count();
        $config["per_page"]     = 10;
        $config['first_link']   = 'Awal';
        $config['last_link']    = 'Akhir';
        $config['next_link']    = 'Selanjutnya';
        $config['prev_link']    = 'Sebelumnya';
        $config["uri_segment"]  = 4;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["results"] = $this->msubkategori->get_records($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        //var_dump( $this->mkategori->record_count());
        $html = array();
        $html['title']      = "Administrator";
        $html['script']     = $this->load->view('administrator/template/script',null,true);
        $html['header']     = $this->load->view('administrator/template/header',null,true);
        $html['content']    = $this->load->view('administrator/list_subkategori',$data,true);
        $html['footer']     = $this->load->view('administrator/template/footer',null,true);
        $this->load->view('administrator/template/template',$html);
    }
    public function add(){
        
           $c=array('id'=>'subk'); 
			    $d=array('id'=>'kate'); 
	          
         $data['palid']=$this->js_palid->kudu_isi(array($c)).$this->js_palid->kudu_pilih(array($d));
        $html = array();
        $html['title']      = "Administrator";
          $data['cats'] = $this->mkategori->tampil();
	           
        $html['script']     = $this->load->view('administrator/template/script',null,true);
        $html['header']     = $this->load->view('administrator/template/header',null,true);
        $html['content']    = $this->load->view('administrator/add_subkategori',$data,true);
        $html['footer']     = $this->load->view('administrator/template/footer',null,true);
        $this->load->view('administrator/template/template',$html);
    }
    public function update($id=null){
        $data = array();
               $data['cats'] = $this->mkategori->tampil();
	  
     
        $data['record'] = $this->msubkategori->get_id($id);
        $html = array();
        $html['title']      = "Administrator";
        $html['script']     = $this->load->view('administrator/template/script',null,true);
        $html['header']     = $this->load->view('administrator/template/header',null,true);
        $html['content']    = $this->load->view('administrator/update_subkategori',$data,true);
        $html['footer']     = $this->load->view('administrator/template/footer',null,true);
        $this->load->view('administrator/template/template',$html);
    }
     public function update_ukuran($id=null){
        $data = array();
        $data['record'] = $this->msize->get_id($id);
        $html = array();
        $html['title']      = "Administrator";
        $html['script']     = $this->load->view('administrator/template/script',null,true);
        $html['header']     = $this->load->view('administrator/template/header',null,true);
        $html['content']    = $this->load->view('administrator/update_ukuran',$data,true);
        $html['footer']     = $this->load->view('administrator/template/footer',null,true);
        $this->load->view('administrator/template/template',$html);
    }
    public function add_proccess(){
        
         $this->msubkategori->add_record($this->input->post());
                            
                            
               redirect(base_url()."admin/subkategori");
        
    }
    public function update_proccess($id=null){

             $askdas=$this->msubkategori->update_record($id,$this->input->post());
            $this->session->set_flashdata('message', $this->message->message_success('Berhasil Mengubah Data'));

            redirect(base_url()."admin/subkategori");
         
    }
    
    public function delete($id){
     
            $this->msubkategori->delete_row($id);
        $this->session->set_flashdata('message', $this->message->message_success('Data Berhasil dihapus'));
          redirect(base_url()."admin/subkategori");
        
    }
    public function cari() {
       $data = array();
       $data['results']= $this->mkategori->caridata();
       if($data['results']== null){
             $this->session->set_flashdata('message', $this->message->message_error('Data Tidak Ada'));
             redirect(base_url()."admin/subkategori");
          }else {
             $html = array();
             $html['title']      = "Administrator";
             $html['script']     = $this->load->view('administrator/template/script',null,true);
             $html['header']     = $this->load->view('administrator/template/header',null,true);
             $html['content']    = $this->load->view('administrator/cari_subkategori',$data,true);
             $html['footer']     = $this->load->view('administrator/template/footer',null,true);
             $this->load->view('administrator/template/template',$html); 
          }
    }
    private function check_isvalidated(){
        if(! $this->session->userdata('validated')){
            redirect(base_url().'admin/login');
        }
    }
    public function _validation(){
        $this->form_validation->set_rules('namakategori','Nama Kategori', 'trim|required|xss_clean');
        return $this->form_validation->run();
    }
 }
