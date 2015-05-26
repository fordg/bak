<?php 
class Login extends CI_Controller{
	function __construct(){
        parent::__construct();
        // Load the model
        $this->load->library('cart');
        $this->load->model('mmember');
        $this->load->model('mproduk');
        $this->load->model('mkategori');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('message');
        $this->load->model('mhuman');
        $this->load->model('mloginmember');
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
		$html['container'] = $this->load->view('login',$data,true);
		$html['footer'] = $this->load->view('footer',null,true);
		$html['js'] = $this->load->view('js',null,true);
		$this->load->view('template',$html);
    }
	
	public function process(){
        // Validate the user can login
        $result = $this->mloginmember->validate();
        // Now we verify the result
        if(! $result){
            // If user did not validate, then show them login page again
            $data=array();
            $data['messages'] = '<font color=red>Invalid username and/or password.</font><br />';
            redirect(base_url().'login', 'refresh');
			echo 'error bos';
        }else{
            redirect(base_url().'main');
        }        
    }
}
?>