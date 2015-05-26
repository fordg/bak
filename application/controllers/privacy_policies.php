<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Privacy_policies extends CI_Controller{
	function __construct(){
        parent::__construct();
		//$this->check_isvalidated();
        $this->load->library('cart');
        $this->load->model('mmember');
        $this->load->model('mproduk');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('message');
        $this->load->model('mhuman');
        $this->load->model('mkategori');
    }
	
	public function index($msg = NULL){
       $data = array();
        $data['messages'] = $msg;
        $data["base_url"]     = base_url() . "account";
        $data["total_rows"]   = $this->mmember->record_count();
		//$data['produksberdasarkan'] = $this->mproduk->kategori($msg);
		//$data['kategori'] = $this->mproduk->tampil_kategori(2);
		//$data['kategori1'] = $this->mproduk->tampil_kategori2(1);
		$data['message']  = "produk tidak ada";
		$html = array();
		$html['title'] = "Tamy Putri Imanda";
		$html['meta'] = $this->load->view('meta',null,true);
		$html['css'] = $this->load->view('css',null,true);
		$html['header'] = $this->load->view('header',$data,true);
		$html['container'] = $this->load->view('privacy_policies',$data,true);
		$html['footer'] = $this->load->view('footer',null,true);
		$html['js'] = $this->load->view('js',null,true);
		$this->load->view('template',$html);
	}
        
    public function detail($id){
        $data = array();
        $data['produks']    = $this->mproduk->get_id($id);
		$html = array();
		$html['title']      = "Tamy Putri Imanda";
		$html['meta']       = $this->load->view('meta',null,true);
		$html['css']        = $this->load->view('css',null,true);
		$html['header']     = $this->load->view('header',null,true);
		$html['container']  = $this->load->view('detail_product',$data,true);
		$html['footer']     = $this->load->view('footer',null,true);
		$html['js']         = $this->load->view('js',null,true);
		$this->load->view('template',$html);
	}
	
	public function add_cart($id){      
                $cart = $this->mproduk->get_id($id);
                $data = array(
                       'id'   => $cart->kodeProduk,
                       'qty'     => 1,
                       'price'   => $cart->harga,
                       'gambar'  => $cart->GambarBesar,
                       'name'    => $cart->NamaProduk,
                    );

                $this->cart->insert($data);
                redirect(base_url().'main');
   	}
   
   	public function add_cart_qty($id){
               
                $cart = $this->mproduk->get_id($id);
                $data = array(
                       'id'   => $cart->kodeProduk,
                       'qty'     => $this->input->post('qty'),
                       'price'   => $cart->harga,
                       'gambar'  => $cart->GambarBesar,
                       'name'    => $cart->NamaProduk,
                    );

                $this->cart->insert($data);
                redirect(base_url().'main');
   	}
	
	private function check_isvalidated(){
            if(!$this->session->userdata('tervalidasi')){
                redirect(base_url().'main');
            }
        }
	public function delete_cart($kode){

            $data = array(
                       'rowid'   => $kode,
                       'qty'     => 0,
                       'price'   => 0,
                       'gambar'  => 0,
                       'name'    => 0,
                    );
            $this->cart->update($data);
             
            redirect(base_url().'main','refresh');
	}
	
   public function account(){
        $data = array();
        $data['admin'] = $this->mmember->getMember();
        $html = array();
		$html['title'] = "Tamy Putri Imanda";
		$html['meta'] = $this->load->view('meta',null,true);
		$html['css'] = $this->load->view('css',null,true);
		$html['header'] = $this->load->view('header',null,true);
        $html['container']    = $this->load->view('acoount',$data,true);
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