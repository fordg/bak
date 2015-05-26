<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Home controller class
 * This is only viewable to those members that are logged in
 */
 class Category extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->check_isvalidated();
        $this->load->model('mkategori');
        $this->load->model('msize');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('message');
    }
    public function index($id=null){
        $config = array();
        $config["base_url"]     = base_url() . "admin/category/index/";
        $config["total_rows"]   = $this->mkategori->record_count();
        $config["per_page"]     = 10;
        $config['first_link']   = 'Awal';
        $config['last_link']    = 'Akhir';
        $config['next_link']    = 'Selanjutnya';
        $config['prev_link']    = 'Sebelumnya';
        $config["uri_segment"]  = 4;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["results"] = $this->mkategori->get_records($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        //var_dump( $this->mkategori->record_count());
        $html = array();
        $html['title']      = "Administrator";
        $html['script']     = $this->load->view('administrator/template/script',null,true);
        $html['header']     = $this->load->view('administrator/template/header',null,true);
        $html['content']    = $this->load->view('administrator/category',$data,true);
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
        $data['record'] = $this->mkategori->get_id($id);
        $html = array();
        $html['title']      = "Administrator";
        $html['script']     = $this->load->view('administrator/template/script',null,true);
        $html['header']     = $this->load->view('administrator/template/header',null,true);
        $html['content']    = $this->load->view('administrator/update_category',$data,true);
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
        if($this->_validation()===FALSE){
            $this->session->set_flashdata('message', $this->message->message_error('Gagal Menambah Data'));
            redirect(base_url()."admin/category");
        }else{
            $data = array( 'id_kategori' => null,
                           'namaKategori' => $this->input->post('namakategori')
                          );
                          
                                                    
           $teang_hela=$this->mkategori->caridata2($this->input->post('namakategori'));
           if(($teang_hela)==FALSE)
            {
                $kdajshdakshd=$this->mkategori->add_record($data); 
            }
            else
            {
                $kdajshdakshd=$teang_hela;
            }
            foreach($this->input->post('ukuran_produk') as $ukr)
            {
                if($ukr!='')
                {
                $data_adalah=array('ukuran_produk'=>$ukr,'id_kategori'=>$kdajshdakshd);
                $this->msize->tambahin($data_adalah);
                }
            }
            
            $this->session->set_flashdata('message', $this->message->message_success('Berhasil Menambah Data'));
          redirect(base_url()."admin/category");
        }
    }
    public function update_proccess($id=null){
        $data = $this->input->post('namakategori');
        if($this->_validation()===FALSE){
            $this->session->set_flashdata('message', $this->message->message_error('Gagal Meng Update Data'));
            redirect(base_url()."admin/category");
        }else{
            $this->mkategori->update_record($id,$data);
            $this->session->set_flashdata('message', $this->message->message_success('Berhasil Mengubah Data'));
            redirect(base_url()."admin/category");
        }
    }
    
    public function delete($id){
        $ukuran__=$this->msize->yang_id_kategorinya($id);
          if( $this->mkategori->delete_row($id)==1451)
          {
            $this->session->set_flashdata('message', $this->message->message_error('Gagal menghapus. Data tersebut sudah digunakan pada data lainnya'));
            redirect(base_url()."admin/category");
          }
        else
       {
        foreach($ukuran__ as $as)
        {
            $this->msize->delete_row('ukr_'.$as['id']);
        }
            $this->mkategori->delete_row($id);
        $this->session->set_flashdata('message', $this->message->message_success('Data Berhasil dihapus'));
          redirect(base_url()."admin/category");
        }
    }
    public function cari() {
       $data = array();
       $data['results']= $this->mkategori->caridata();
       if($data['results']== null){
             $this->session->set_flashdata('message', $this->message->message_error('Data Tidak Ada'));
             redirect(base_url()."admin/category");
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
        $this->form_validation->set_rules('namakategori','Nama Kategori', 'trim|required|xss_clean');
        return $this->form_validation->run();
    }
 }
