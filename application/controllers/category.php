<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Category extends CI_Controller{
	function __construct(){
        parent::__construct();
		//$this->check_isvalidated();
        $this->load->library('cart');
        $this->load->model('mmember');
        $this->load->model('mproduk');
        $this->load->model('mhuman');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('message');
        $this->load->model('mkategori');
    }
	public function human($cat){
		$data = array();
        $data['produks'] = $this->mproduk->kategori($cat);
		$html = array();
		$html['title'] 		= "Tamy Putri Imanda";
		$html['meta'] 		= $this->load->view('meta',null,true);
		$html['css'] 		= $this->load->view('css',null,true);
		$html['header'] 	= $this->load->view('header',null,true);
		$html['container'] 	= $this->load->view('product',$data,true);
		$html['footer'] 	= $this->load->view('footer',null,true);
		$html['js'] 		= $this->load->view('js',null,true);
		$this->load->view('template',$html);
	}
	public function detail_kategori(){
	    $subkategori=$this->uri->segment(4);
        $kategori=$this->uri->segment(3); 
		$data = array();
        
        if($subkategori===FALSE)
        {
       	     $data['produksberdasarkan'] = $this->mproduk->kategori($kategori);
    }
        else
       		$data['produksberdasarkan'] = $this->mproduk->kategori_subkategori($kategori,$subkategori);
    
            
//		$data['kategori'] = $this->mproduk->tampil_kategori(2);
	//	$data['kategori1'] = $this->mproduk->tampil_kategori2($gg);
		$data['message']  = "produk tidak ada";
		$html['title'] 		= "Tamy Putri Imanda";
		$html['meta'] 		= $this->load->view('meta',null,true);
		$html['css'] 		= $this->load->view('css',null,true);
		$html['header'] 	= $this->load->view('header',$data,true);
		$html['container'] 	= $this->load->view('produk_berdasarkan',$data,true);
		$html['footer'] 	= $this->load->view('footer',null,true);
		$html['js'] 		= $this->load->view('js',null,true);
		$this->load->view('template',$html);
	}
}