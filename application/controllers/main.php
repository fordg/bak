<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Main extends CI_Controller{
	function __construct(){
        parent::__construct();
		//$this->check_isvalidated();
        $this->load->library('cart');
        $this->load->model('mmember');
        $this->load->model('mpemesanan');
        $this->load->model('mkategori');
        $this->load->model('mproduk');
        $this->load->model('msize');
        $this->load->model('mhuman');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('message');
        $this->load->library('js_palid');
    }
	
	public function index(){
	   $this->mpemesanan->membatalkan_pesanan_yang_sudah_kadalauarsa_bro();
        $z['total_item_in_cart']=$this->mproduk->total_item_cart();
		$z['kategori1']=$this->mkategori->tampil();
        $data = array();
        $data['produks'] = $this->mproduk->tampil(9);
		$html = array();
		$html['title'] = "Tamy Putri Imanda";
		$html['meta'] = $this->load->view('meta',null,true);
		$html['css'] = $this->load->view('css',null,true);
		$html['header'] = $this->load->view('header',$z,true);
		$html['container'] = $this->load->view('container',$data,true);
		$html['footer'] = $this->load->view('footer',null,true);
		$html['js'] = $this->load->view('js',null,true);
		$this->load->view('template',$html);
	}
        
    public function detail($id){
        
	   $this->mpemesanan->membatalkan_pesanan_yang_sudah_kadalauarsa_bro();
        $z['total_item_in_cart']=$this->mproduk->total_item_cart();
        $data = array();
        $data['produks']    = $this->mproduk->get_id($id); 
          
        $data['ukurin']=$this->mproduk->berapakah_stoknya($id);
     
         //$this->session->sess_destroy();
      	$html = array();
		$html['title']      = "Tamy Putri Imanda";
		$html['meta']       = $this->load->view('meta',null,true);
		$html['css']        = $this->load->view('css',null,true);
		$html['header']     = $this->load->view('header',$z,true);
		$html['container']  = $this->load->view('detail_product',$data,true);
		$html['footer']     = $this->load->view('footer',null,true);
		$html['js']         = $this->load->view('js',null,true);
		$this->load->view('template',$html);
        //$this->session->sess_destroy();
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
   
   	public function add_cart_qty(){
                $ketemu=FALSE;
                $id=$this->input->post('kodeproduk');  
                $cart = $this->mproduk->get_id($id); 
                //meneang, apakah item sudah ada di cart
                foreach($this->cart->contents() as $items)
                { 
                    		$rowid = md5($id.$this->input->post('size'));
	
                        if($items['rowid'] == $rowid)
                         {
                                
                                    $ketemu= TRUE; 
                                    $_qty=$items['qty'];
                                 
                         }
                        else
                         {
                           $ketemu= FALSE; 
                         } 
                }
         
            if($ketemu==TRUE)
            { 
                $data2 =array (
                  	'rowid' => $rowid,
                	'qty' => $this->input->post('qty')+$_qty
            	);
              
                if($this->cart->update($data2)==TRUE)
				$this->mproduk->stokisisasi($id,$this->input->post('size'),"-".$this->input->post('qty'));                
            }          
			else
            { 
            	$data = array(
                 'id'   => $cart->kodeProduk,
                'qty'     => $this->input->post('qty'),
                'price'   => $cart->harga, 
                'name'    => $cart->NamaProduk, 
                'size'     => $this->input->post('size'),
                'berat'     => $this->input->post('berat'),
                'gambar' => $cart->GambarBesar,
                       'options' => array('Size' => $this->input->post('size')),                
                );
                if($this->cart->insert($data)==TRUE)
                $this->mproduk->stokisisasi($id,$data['size'],"-".$data['qty']);                
              }
              
                redirect(base_url().'cart');
             
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
   
	public function chain_stok(){ 
	   
		if(isset($_POST['fungsi']))
    	{
        	if($_POST['fungsi']=='change_stok')
        	{
                $c=array('id'=>'qty','msg'=>'Quantity tidak boleh kosong'); 
			    $d=array('id'=>'qty','msg'=>'Quantity tidak valid'); 
	            $tersedia_berapa_siki=$this->mproduk->stokisisasi($_POST['kodbar'],$_POST['ukuran']);       
			    $datavalidate=$this->js_palid->kudu_isi(array($c)).$this->js_palid->kudu_nomer(array($d)).$this->js_palid->ulah_leuwih('qty','maaf, stok kami untuk ukuran pada produk ini tidak mencukupi',$tersedia_berapa_siki);
                if($tersedia_berapa_siki==0)
				{
            		echo "stok produk untuk ukuran ini telah habis.";
           		}
           		else
           		{ 
		    		echo $datavalidate;
            		echo '<input type="text" class="qty" name="qty" id="qty" value="1"/>';
            		echo '<div class="pull-left">
				  		  <button class="btn theme" > Add To Cart</button>
                  		  </div>
				 		 ';
           		}
        	}
		}
   	}  
    
    	public function ningali(){ 
	   
	           $tersedia_berapa_siki=$this->mproduk->stokisisasi('91l2j','ukr_43');       
			    var_dump($tersedia_berapa_siki);
   	}  
    
   
}
?>