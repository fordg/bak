<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class How_to_order extends CI_Controller{
	function __construct(){
        parent::__construct();
		//$this->check_isvalidated();
        $this->load->library('cart');
        $this->load->model('mmember');
        $this->load->model('mproduk');
        $this->load->model('mkategori');
	$this->load->model('mcontact');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('mhuman');
        $this->load->library('message');
        $this->load->model('mkategori');
    }
	
	public function index(){
        $data = array($cat = NULL );
		$data['produks'] = $this->mproduk->tampil(8);
		$data['kategori1']=$this->mkategori->tampil();
		//$data['produksberdasarkan'] = $this->mproduk->kategori($cat);
		//$data['kategori'] = $this->mproduk->tampil_kategori(2);
		//$data['kategori1'] = $this->mproduk->tampil_kategori2(1);
		$data['message']  = "produk tidak ada";
		$html = array();
		$html['title'] = "Tamy Putri Imanda";
		$html['meta'] = $this->load->view('meta',null,true);
		$html['css'] = $this->load->view('css',null,true);
		$html['header'] = $this->load->view('header',$data,true);
		$html['container'] = $this->load->view('how_to_order',$data,true);
		$html['footer'] = $this->load->view('footer',null,true);
		$html['js'] = $this->load->view('js',null,true);
		$this->load->view('template',$html);
	}
     
	 public function add_proccess(){
        if($this->_validation()===FALSE){
            $this->session->set_flashdata('message', $this->message->message_error('Fail Register'));
			echo 'Error Men';
            //redirect(base_url()."register");
        }else{
            $data = array( 'id_contact' => null,
                           'NamaDepan' => $this->input->post('namadepan'),
						   'NamaBelakang' => $this->input->post('namabelakang'),
						   'email' => $this->input->post('email'),
						   'telepon' => $this->input->post('telepon'),
						   'comment' => $this->input->post('comment')
                          );
            $this->mcontact->add_record($data);
            $this->session->set_flashdata('message', $this->message->message_success('Success'));
			echo 'Thank You';
            redirect(base_url()."contact");
        }
    }
	
	public function _validation(){
        $this->form_validation->set_rules('namadepan','Nama Depan', 'trim|required|xss_clean');
		$this->form_validation->set_rules('namabelakang','Nama Belakang', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email','Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('telepon','Telepon', 'trim|required|xss_clean');
        $this->form_validation->set_rules('comment','Comment', 'trim|xss_clean');
        //$this->form_validation->set_message('required', "Field %s belum Anda isi");
        return $this->form_validation->run();
    }
	    
   	public function logout(){
        $this->session->sess_destroy();
        redirect(base_url().'login');
   	}
}
?>