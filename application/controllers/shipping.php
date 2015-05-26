<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Shipping extends CI_Controller{
	function __construct(){
        parent::__construct();
		//$this->check_isvalidated();
        $this->load->library('cart');
        $this->load->model('mmember');
        $this->load->model('mproduk'); 
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('message');
        $this->load->model('mkategori');
        $this->load->model('mhuman');
    }
	
	public function index($msg = NULL){
       $data = array();
        $data['messages'] = $msg;
        $data["base_url"]     = base_url() . "account";
        $data["total_rows"]   = $this->mmember->record_count();
        $data['kategori1']=$this->mkategori->tampil();
		//$data['produksberdasarkan'] = $this->mproduk->kategori($msg);
		//$data['kategori'] = $this->mproduk->tampil_kategori(2);
		//$data['kategori1'] = $this->mproduk->tampil_kategori2(1);
		$data['message']  = "produk tidak ada";
		$html = array();
		$html['title'] = "Tamy Putri Imanda";
		$html['meta'] = $this->load->view('meta',null,true);
		$html['css'] = $this->load->view('css',null,true);
		$html['header'] = $this->load->view('header',$data,true);
		$html['container'] = $this->load->view('shipping',$data,true);
		$html['footer'] = $this->load->view('footer',null,true);
		$html['js'] = $this->load->view('js',null,true);
		$this->load->view('template',$html);
	}

   public function logout(){
        $this->session->sess_destroy();
        redirect(base_url().'login');
   }
}
?>