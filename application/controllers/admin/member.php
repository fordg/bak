<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Home controller class
 * This is only viewable to those members that are logged in
 */
 class Member extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->check_isvalidated();
        $this->load->model('mmember');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('message');
    }
    public function index($id =''){
        $config = array();
        $config["base_url"]     = base_url() . "admin/member/index/";
        $config["total_rows"]   = $this->mmember->record_count();
        $config["per_page"]     = 10;
        $config['first_link']   = 'Awal';
        $config['last_link']    = 'Akhir';
        $config['next_link']    = 'Selanjutnya';
        $config['prev_link']    = 'Sebelumnya';
        $config["uri_segment"]  = 4;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["results"] = $this->mmember->get_records($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        
        $html = array();
        $html['title']      = "Administrator";
        $html['script']     = $this->load->view('administrator/template/script',null,true);
        $html['header']     = $this->load->view('administrator/template/header',null,true);
        $html['content']    = $this->load->view('administrator/list_member',$data,true);
        $html['footer']     = $this->load->view('administrator/template/footer',null,true);
        $this->load->view('administrator/template/template',$html);
    }
    public function detail($id=''){
        $data = array();
        $data['data'] = $this->mmember->get_id($id);
        $html = array();
        $html['title']      = "Administrator";
        $html['script']     = $this->load->view('administrator/template/script',null,true);
        $html['header']     = $this->load->view('administrator/template/header',null,true);
        $html['content']    = $this->load->view('administrator/member_detail',$data,true);
        $html['footer']     = $this->load->view('administrator/template/footer',null,true);
        $this->load->view('administrator/template/template',$html);
    }
    private function check_isvalidated(){
        if(! $this->session->userdata('validated')){
            redirect(base_url().'admin/login');
        }
    }
 }