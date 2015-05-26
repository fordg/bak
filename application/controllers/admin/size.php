<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Home controller class
 * This is only viewable to those members that are logged in
 */
 class Size extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->check_isvalidated();
        $this->load->model('msize');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('message');
    }
     public function add_size(){
        $data = array();
        $html = array();
        
        $html['title']      = "Administrator";
        $html['script']     = $this->load->view('administrator/template/script',null,true);
        $html['header']     = $this->load->view('administrator/template/header',null,true);
        $html['content']    = $this->load->view('administrator/add_size',$data,true);
        $html['footer']     = $this->load->view('administrator/template/footer',null,true);
        $this->load->view('administrator/template/template',$html);
    }
    
    public function tambah_()
    {  
        $this->msize->tambahin($this->input->post());
                            
        redirect(base_url()."admin/size");
                
        }
    public function index($id=null){
        $config = array();
        $config["base_url"]     = base_url() . "admin/size/index/";
       $data['result'] = $this->msize->tampil();
        $html = array();
        $html['title']      = "Administrator";
        $html['script']     = $this->load->view('administrator/template/script',null,true);
        $html['header']     = $this->load->view('administrator/template/header',null,true);
        $html['content']    = $this->load->view('administrator/size',$data,true);
        $html['footer']     = $this->load->view('administrator/template/footer',null,true);
        $this->load->view('administrator/template/template',$html);
    }
    public function add(){
        $html = array();
        $html['title']      = "Administrator";
        $html['script']     = $this->load->view('administrator/template/script',null,true);
        $html['header']     = $this->load->view('administrator/template/header',null,true);
        $html['content']    = $this->load->view('administrator/category_add',null,true);
        $html['footer']     = $this->load->view('administrator/template/footer',null,true);
        $this->load->view('administrator/template/template',$html);
    }
    public function update($id=null){
        $data = array();
        $data['record'] = $this->msize->get_id($id);
        $html = array();
        $html['title']      = "Administrator";
        $html['script']     = $this->load->view('administrator/template/script',null,true);
        $html['header']     = $this->load->view('administrator/template/header',null,true);
        $html['content']    = $this->load->view('administrator/update_size',$data,true);
        $html['footer']     = $this->load->view('administrator/template/footer',null,true);
        $this->load->view('administrator/template/template',$html);
    }
 
    public function update_proccess($id=null){
            $data = $this->input->post('ukuran_produk'); 
            $okeeh=$this->msize->update_record($id,$data);
             if($okeeh===1062)
              $this->session->set_flashdata('message', $this->message->message_error('Data suda ada')); 
             else
            $this->session->set_flashdata('message', $this->message->message_success('Berhasil Mengubah Data'));
            redirect(base_url()."admin/size");
        
    }
    
    public function delete($id){
            $this->msize->delete_row($id);
            $this->session->set_flashdata('message', $this->message->message_success('Data Berhasil dihapus'));
            redirect(base_url()."admin/size");
    }
    public function cari() {
       $data = array();
       $data['results']= $this->msize->caridata();
       if($data['results']== null){
             $this->session->set_flashdata('message', $this->message->message_error('Data Tidak Ada'));
             redirect(base_url()."admin/size");
          }else {
             $html = array();
             $html['title']      = "Administrator";
             $html['script']     = $this->load->view('administrator/template/script',null,true);
             $html['header']     = $this->load->view('administrator/template/header',null,true);
             $html['content']    = $this->load->view('administrator/cari_category',$data,true);
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
        $this->form_validation->set_rules('ukuran','Nama Kategori', 'trim|required|xss_clean');
        return $this->form_validation->run();
    }
 }
