<?php 
class Edit_username extends CI_Controller{
	public function __construct(){
        parent::__construct();
        $this->load->model('mmember');
		$this->load->model('mproduk');
        $this->load->helper(array("form", "date", "url"));
        $this->load->library(array("encrypt", "form_validation", "session"));
        $this->load->library('message');
        $this->load->model('mhuman');
		$this->load->library('cart');
        //$this->form_fields_nullable = array();
        $this->load->model('mkategori');
    }
	
	public function update($id=null){
		$data = array();
        $data['member'] = $this->mmember->get_id($this->session->userdata('memberid'));
        $data["base_url"]     = base_url() . "account";
        $data["total_rows"]   = $this->mmember->record_count();
		//$data['produksberdasarkan'] = $this->mproduk->kategori($id);
		//$data['kategori'] = $this->mproduk->tampil_kategori(2);
		//$data['kategori1'] = $this->mproduk->tampil_kategori2(1);
		$data['message']  = "produk tidak ada";
		$html = array();
		$html['title'] = "Tamy Putri Imanda";
		$html['meta'] = $this->load->view('meta',null,true);
		$html['css'] = $this->load->view('css',null,true);
		$html['header'] = $this->load->view('header',$data,true);
		$html['container'] = $this->load->view('edit_username',$data,true);
		$html['footer'] = $this->load->view('footer',null,true);
		$html['js'] = $this->load->view('js',null,true);
		$this->load->view('template',$html);
	}
	
	public function update_proccess($id=''){
        $data = array('username_member'=>$this->input->post('username'),
					  'password'=>$this->salt($this->input->post('password'))
					  );
		if($this->_validation()===FALSE){
            $this->session->set_flashdata('message', '<font color=red>Password not Matched</font>');
            redirect(base_url()."edit_username/update/".$this->session->userdata('memberid'));
        }else{
            $this->mmember->update_record($id,$data);
            $this->session->set_flashdata('message', $this->message->message_success('Berhasil Mengubah Data'));
            redirect(base_url()."account");
        }
    }
	
	public function add(){
        $html = array();
		$html['title'] = "Tamy Putri Imanda";
		$html['meta'] = $this->load->view('meta',null,true);
		$html['css'] = $this->load->view('css',null,true);
		$html['header'] = $this->load->view('header',null,true);
		$html['container'] = $this->load->view('privacy_policies',null,true);
		$html['footer'] = $this->load->view('footer',null,true);
		$html['js'] = $this->load->view('js',null,true);
		$this->load->view('template',$html);
    }
	public function salt($value){
		$salt =')!@%$AcaKKaduL+^%#';
        $encrypt = md5($salt . $value);
        return $encrypt;
	}
	public function _validation(){
		$this->form_validation->set_rules('username','Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password','Password', 'trim|required|xss_clean');
		$this->form_validation->set_rules('con_password', 'Password Confirmation', 'trim|required|matches[password]');
        $this->form_validation->set_message('required', "Field %s belum Anda isi");
        return $this->form_validation->run();
    }
}
?>