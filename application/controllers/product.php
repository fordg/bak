<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Product extends CI_Controller{
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
	
	public function index(){
		$data = array();
        $data['produks'] = $this->mproduk->tampil(8);
		$html = array();
		$html['title'] = "Tamy Putri Imanda";
		$html['meta'] = $this->load->view('meta',null,true);
		$html['css'] = $this->load->view('css',null,true);
		$html['header'] = $this->load->view('header',null,true);
		$html['container'] = $this->load->view('product',$data,true);
		$html['footer'] = $this->load->view('footer',null,true);
		$html['js'] = $this->load->view('js',null,true);
		$this->load->view('template',$html);
	}
	
	public function detail($id){
		$data = array();
        $data['produks'] = $this->mproduk->get_id($id);
		$html = array();
		$html['title'] = "Tamy Putri Imanda";
		$html['meta'] = $this->load->view('meta',null,true);
		$html['css'] = $this->load->view('css',null,true);
		$html['header'] = $this->load->view('header',null,true);
		$html['container'] = $this->load->view('detail_product',$data,true);
		$html['footer'] = $this->load->view('footer',null,true);
		$html['js'] = $this->load->view('js',null,true);
		$this->load->view('template',$html);
	}
}
?>