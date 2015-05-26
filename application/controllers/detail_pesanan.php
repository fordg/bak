<?php 
class Detail_pesanan extends CI_Controller{
    function __construct(){
        parent::__construct();
		//$this->check_isvalidated();
        $this->load->library('cart');
        $this->load->model('mmember');
        $this->load->model('mproduk');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('mhuman');
        $this->load->model('mkategori');
        $this->load->library('message');
    }
	public function index(){
	    
		$html = array();
		$html['title'] = "Tamy Putri Imanda";
        $data['cart']=$this->cart->contents();
		$html['meta'] = $this->load->view('meta',null,true);
		$html['css'] = $this->load->view('css',null,true);
       
        $z['total_item_in_cart']=$this->mproduk->total_item_cart();
		$html['header'] = $this->load->view('header',$z,true);
		$html['container'] = $this->load->view('detail_pesanan',$data,true);
		$html['footer'] = $this->load->view('footer',null,true);
		$html['js'] = $this->load->view('js',null,true);
		$this->load->view('template',$html);
        //$this->session->sess_destroy();
        //var_dump($this->session->all_userdata());   
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
             
        redirect(base_url().'cart','refresh');
	}
    function update_cart(){
      	$total = $this->cart->total_items();
		$item = $this->input->post('rowid');
		$qty = $this->input->post('qty'); 
		$_qty = $this->input->post('_qty'); 
			$data = array(
			'rowid' => $item,
			'qty'   => $_qty-$qty); 
                  if($this->cart->update($data)==TRUE)
			      $this->mproduk->stokisisasi($this->input->post('kodebarang'),$this->input->post('size'),$this->input->post('qty'));                
         
        
        
		redirect(base_url().'cart','refresh');
	}
}
?>