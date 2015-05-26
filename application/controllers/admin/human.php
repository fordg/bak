<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Home controller class
 * This is only viewable to those members that are logged in
 */
 class Human extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->check_isvalidated();
        $this->load->model('mhuman');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('message');
    }
    public function index($id=null){
        $config = array();
        $config["base_url"]     = base_url() . "admin/human/index/";
        $config["total_rows"]   = $this->mhuman->record_count();
        $config["per_page"]     = 10;
        $config['first_link']   = 'Awal';
        $config['last_link']    = 'Akhir';
        $config['next_link']    = 'Selanjutnya';
        $config['prev_link']    = 'Sebelumnya';
        $config["uri_segment"]  = 4;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["results"] = $this->mhuman->get_records($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        
        $html = array();
        $html['title']      = "Administrator";
        $html['script']     = $this->load->view('administrator/template/script',null,true);
        $html['header']     = $this->load->view('administrator/template/header',null,true);
        $html['content']    = $this->load->view('administrator/human',$data,true);
        $html['footer']     = $this->load->view('administrator/template/footer',null,true);
        $this->load->view('administrator/template/template',$html);
    }
    public function add(){
        $html = array();
        $html['title']      = "Administrator";
        $html['script']     = $this->load->view('administrator/template/script',null,true);
        $html['header']     = $this->load->view('administrator/template/header',null,true);
        $html['content']    = $this->load->view('administrator/human_add',null,true);
        $html['footer']     = $this->load->view('administrator/template/footer',null,true);
        $this->load->view('administrator/template/template',$html);
    }
    public function update($id=null){
        $data = array();
        $data['record'] = $this->mhuman->get_id($id);
        $html = array();
        $html['title']      = "Administrator";
        $html['script']     = $this->load->view('administrator/template/script',null,true);
        $html['header']     = $this->load->view('administrator/template/header',null,true);
        $html['content']    = $this->load->view('administrator/human_update',$data,true);
        $html['footer']     = $this->load->view('administrator/template/footer',null,true);
        $this->load->view('administrator/template/template',$html);
    }
    public function add_proccess(){
        if($this->_validation()===FALSE){
            $this->session->set_flashdata('message', $this->message->message_error('Gagal Menambah Data'));
            redirect(base_url()."admin/human");
        }else{
            $data = array( 'id_human' => null,
                           'namaHuman' => $this->input->post('namahuman')
                          );
            $this->mhuman->add_record($data);
            $this->session->set_flashdata('message', $this->message->message_success('Berhasil Menambah Data'));
            redirect(base_url()."admin/human");
        }
    }
    public function update_proccess($id=null){
        $data = $this->input->post('namahuman');
        if($this->_validation()===FALSE){
            $this->session->set_flashdata('message', $this->message->message_error('Gagal Meng Update Data'));
            redirect(base_url()."admin/human");
        }else{
            $this->mhuman->update_record($id,$data);
            $this->session->set_flashdata('message', $this->message->message_success('Berhasil Mengubah Data'));
            redirect(base_url()."admin/human");
        }
    }
    
    public function delete($id){
            $this->mhuman->delete_row($id);
            $this->session->set_flashdata('message', $this->message->message_success('Data Berhasil dihapus'));
            redirect(base_url()."admin/human");
    }
    public function cari() {
       $data = array();
       $data['results']= $this->mhuman->caridata();
       if($data['results']== null){
             $this->session->set_flashdata('message', $this->message->message_error('Data Tidak Ada'));
             redirect(base_url()."admin/human");
          }else {
             $html = array();
             $html['title']      = "Administrator";
             $html['script']     = $this->load->view('administrator/template/script',null,true);
             $html['header']     = $this->load->view('administrator/template/header',null,true);
             $html['content']    = $this->load->view('administrator/cari_human',$data,true);
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
        $this->form_validation->set_rules('namahuman','Nama Human', 'trim|required|xss_clean');
        return $this->form_validation->run();
    }
 }
