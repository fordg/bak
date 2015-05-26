<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Home controller class
 * This is only viewable to those members that are logged in
 */
 class Bank extends CI_Controller{
    function __construct(){
        parent::__construct(); 
        $this->load->model('mbank');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('message');
    }
    
    function manage()
    { 
        $data['tampil']=$this->mbank->tampil();
        $html = array();
        $html['title']      = "Administrator";
        $html['script']     = $this->load->view('administrator/template/script',null,true);
        $html['header']     = $this->load->view('administrator/template/header',null,true);
        $html['content']    = $this->load->view("administrator/list_bank",$data,true);
        $html['footer']     = $this->load->view('administrator/template/footer',null,true);
        $this->load->view('administrator/template/template',$html);
    }
    public function add_data()
    {
        
        $html = array();
        $html['title']      = "Administrator";
        $html['script']     = $this->load->view('administrator/template/script',null,true);
        $html['header']     = $this->load->view('administrator/template/header',null,true);
        $html['content']    = $this->load->view("administrator/add_bank",null,true);
        $html['footer']     = $this->load->view('administrator/template/footer',null,true);
        $this->load->view('administrator/template/template',$html);
    }
     public function tambah_()
     { 
         $d = $this->input->post(); 
         $h=$this->mbank->add_record($d);
       
        redirect(base_url()."admin/bank/manage");
     }
    function hapus()
    {
        $id = $this->uri->segment(4); 
        $h=$this->mbank->delete($id); 
        if($h==1451)
            $this->session->set_flashdata('message', $this->message->message_error('Gagal menghapus. Data tersebut sudah digunakan pada data lainnya'));
        else
            $this->session->set_flashdata('message', $this->message->message_success('Berhasil menghapus Data'));
            redirect(base_url()."admin/bank/manage/");
    }

}
