<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Home controller class
 * This is only viewable to those members that are logged in
 */
 class Home extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->check_isvalidated();
        $this->load->model('muser');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('message');
    }
    
    public function index(){
        // If the user is validated, then this function will run
        $html = array();
        $html['title']      = "Administrator";
        $html['script']     = $this->load->view('administrator/template/script',null,true);
        $html['header']     = $this->load->view('administrator/template/header',null,true);
        $html['content']    = $this->load->view('administrator/template/content',null,true);
        $html['footer']     = $this->load->view('administrator/template/footer',null,true);
        $this->load->view('administrator/template/template',$html);
        //echo $this->session->userdata('nama');
        //echo '<br /><a href='.base_url().'admin/home/logout>Logout Fool!</a>';
    }
    
    private function check_isvalidated(){
        if(! $this->session->userdata('validated')){
            redirect(base_url().'admin/login');
        }
    }
    public function account(){
        $data = array();
        $data['admin'] = $this->muser->getAdmin();
        $html = array();
        $html['title']      = "Administrator";
        $html['script']     = $this->load->view('administrator/template/script',null,true);
        $html['header']     = $this->load->view('administrator/template/header',null,true);
        $html['content']    = $this->load->view('administrator/acoount',$data,true);
        $html['footer']     = $this->load->view('administrator/template/footer',null,true);
        $this->load->view('administrator/template/template',$html);
    }
    public function update($id = null){
        $data = array();
        $data['admin'] = $this->muser->getAdmin();
        $msg="";
        $html = array();
        $html['title']      = "Administrator";
        $html['script']     = $this->load->view('administrator/template/script',null,true);
        $html['header']     = $this->load->view('administrator/template/header',null,true);
        $html['content']    = $this->load->view('administrator/account_update',$data,true);
        $html['footer']     = $this->load->view('administrator/template/footer',null,true);
        $this->load->view('administrator/template/template',$html);
    }
    public function update_proccess($id = null){

            $namaLengkap    = $this->input->post('namaLengkap');
            $username       = $this->input->post('username');
            $email          = $this->input->post('email');
            $password       = $this->input->post('password');
            $tlp            = $this->input->post('tlp');
            $alamat         = $this->input->post('alamat');
        
        if ($this->_validation() === FALSE){
            $this->session->set_flashdata('message', $this->message->message_error('Data Gagal Diupdate'));
            redirect(base_url()."admin/home/account");
        }else{
            if(empty ($password)){
              $this->muser->updateAdmin($id,$namaLengkap,$username,$email,$tlp,$alamat);
                $data = array();
                $data['admin'] = $this->muser->getAdmin();
                $this->session->set_flashdata('message', $this->message->message_success('Data Berhasil Diupdate'));
                redirect(base_url()."admin/home/account");
            }else{
              $this->muser->update_password($id,$namaLengkap,$username,$email,$password,$tlp,$alamat);
                $data = array();
                $data['admin'] = $this->muser->getAdmin();
                $this->session->set_flashdata('message', $this->message->message_success('Data Berhasil Diupdate'));
                redirect(base_url()."admin/home/account");
            }
        }
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url().'admin/login');
    }
    public function _validation(){
        $this->form_validation->set_rules('namaLengkap','Nama Lengkap', 'trim|required|min_length[6]|xss_clean');
        $this->form_validation->set_rules('username','Username', 'trim|required|min_length[6]|xss_clean');
        $this->form_validation->set_rules('email','Email', 'trim|required|min_length[6]|valid_email|xss_clean');
        $this->form_validation->set_rules('password','Password', 'trim|min_length[6]|xss_clean');
        $this->form_validation->set_rules('tlp','Telepon', 'trim|required|min_length[6]|xss_clean');
        $this->form_validation->set_rules('alamat','Alamat', 'trim|required|min_length[6]|xss_clean');
        return $this->form_validation->run();
    }
 }