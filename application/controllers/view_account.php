<?php 
class View_account extends CI_Controller{
	 function __construct(){
        parent::__construct();
        $this->load->model('mmember');
		$this->load->model('mproduk');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('message');
		$this->load->library('cart');
        $this->load->model('mkategori');
        $this->load->model('mhuman');
    }
	
	public function detail(){
	   
		$data = array();
        $data["total_rows"]   = $this->mmember->get_id($this->session->userdata('memberid'));
        $data["base_url"]     = base_url() . "account";
		//$data['produksberdasarkan'] = $this->mproduk->kategori($id);
		//$data['kategori'] = $this->mproduk->tampil_kategori(2);
		//$data['kategori1'] = $this->mproduk->tampil_kategori2(1);
		$data['message']  = "produk tidak ada";
		$html = array();
		$html['title'] = "Tamy Putri Imanda";
		$html['meta'] = $this->load->view('meta',null,true);
		$html['css'] = $this->load->view('css',null,true);
		$html['header'] = $this->load->view('header',$data,true);
		$html['container'] = $this->load->view('view_account',$data,true);
		$html['footer'] = $this->load->view('footer',null,true);
		$html['js'] = $this->load->view('js',null,true);
		$this->load->view('template',$html);
	}
}
?>