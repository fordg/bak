<?php 
class Edit_account extends CI_Controller{
	public function __construct(){
        parent::__construct();
        $this->load->model('mmember');
		$this->load->model('mproduk');
        $this->load->helper(array("form", "date", "url"));
        $this->load->library(array("encrypt", "form_validation", "session"));
        $this->load->library('message');
		$this->load->library('cart');
        $this->load->model('mhuman');
        $this->load->model('mkategori');
        //$this->form_fields_nullable = array();
    }
	
	public function update(){
		$data = array();
        $data["base_url"]     = base_url() . "account";
        $data["total_rows"]   = $this->mmember->record_count();
		//$data['produksberdasarkan'] = $this->mproduk->kategori($id);
		//$data['kategori'] = $this->mproduk->tampil_kategori(2);
		//$data['kategori1'] = $this->mproduk->tampil_kategori2(1);
		$data['message']  = "produk tidak ada";
        $data['member'] = $this->mmember->get_id($this->session->userdata('memberid'));
		$html = array();
		$html['title'] = "Tamy Putri Imanda";
		$html['meta'] = $this->load->view('meta',null,true);
		$html['css'] = $this->load->view('css',null,true);
		$html['header'] = $this->load->view('header',$data,true);
		$html['container'] = $this->load->view('edit_account',$data,true);
		$html['footer'] = $this->load->view('footer',null,true);
		$html['js'] = $this->load->view('js',null,true);
		$this->load->view('template',$html);
	}
	
	public function update_proccess($id){
                $config['file_name'] = 'ava_'.date('Y_m_d_H_i_s');
                $config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|GIF|jpg|JPG|jpeg|JPEG|png|PNG';
				$config['max_size']	= '8000';
				$config['max_width']  = '1366';
				$config['max_height']  = '1024';
				$this->load->library('upload', $config);
                if($this->_validation()===FALSE){
                            $this->session->set_flashdata('message', $this->message->message_error('Gagal Menambah Data'));
                            echo validation_errors(); //redirect(base_url()."account");
                        }else{
                                if($_FILES['userfile']['name'] == "") {                                 
                                            $datanya = array( 'id_member' => $id,
															   'NamaDepan' => $this->input->post('namadepan'),
															   'NamaBelakang' => $this->input->post('namabelakang'),
															   'email' => $this->input->post('email'),
															   'telepon' => $this->input->post('telepon'),
															   'alamat1' => $this->input->post('alamat1'),
															   'kota' => $this->input->post('kota'),
															   'kodepos' => $this->input->post('kodepos')
															   //'username_member' => $this->input->post('username'),
															   //'password' => $this->input->post('password'),
															   //'ava' => $config['file_name']
                                                          );
                                            $this->mmember->update_record($id,$datanya);
                                            $this->session->set_flashdata('message', $this->message->message_success('Berhasil Menambah Data'));
                                            redirect(base_url()."account");
											//echo 'success';
                                }else{
                                        if (!$this->upload->do_upload()){
                                                echo 'Error Bos';
                                                echo $this->upload->display_errors();
                                        }else{
                                                    $data = $this->upload->data();
                                                    $this->_create_thumbnail($data["file_name"]); 
                                                    $datanya = array( 'id_member' => $id,
																	   'NamaDepan' => $this->input->post('namadepan'),
																	   'NamaBelakang' => $this->input->post('namabelakang'),
																	   'email' => $this->input->post('email'),
																	   'telepon' => $this->input->post('telepon'),
																	   'alamat1' => $this->input->post('alamat1'),
																	   'kota' => $this->input->post('kota'),
																	   'kodepos' => $this->input->post('kodepos'),
																	   //'username_member' => $this->input->post('username'),
																	   //'password' => $this->input->post('password'),
																	   'ava' => $data['file_name']
                                                                  );
                                                    $this->mmember->update_record($id,$datanya);
                                                    $this->session->set_flashdata('message', $this->message->message_success('Berhasil Menambah Data'));
                                                    //echo 'berhasil';//
													redirect(base_url()."account");
                                        }
                                }
                        }
    }
	
	public function add($cat=NULL){
		$data = array();
        $data["base_url"]     = base_url() . "account";
        $data["total_rows"]   = $this->mmember->record_count();
		//$data['produksberdasarkan'] = $this->mproduk->kategori($cat);
		//$data['kategori'] = $this->mproduk->tampil_kategori(2);
		//$data['kategori1'] = $this->mproduk->tampil_kategori2(1);
		$data['message']  = "produk tidak ada";
        $html = array();
		$html['title'] = "Tamy Putri Imanda";
		$html['meta'] = $this->load->view('meta',null,true);
		$html['css'] = $this->load->view('css',null,true);
		$html['header'] = $this->load->view('header',$data,true);
		$html['container'] = $this->load->view('edit_account',$data,true);
		$html['footer'] = $this->load->view('footer',null,true);
		$html['js'] = $this->load->view('js',null,true);
		$this->load->view('template',$html);
    }

    function do_upload($id=null){
                $config['file_name'] = 'ava_'.date('Y_m_d_H_i_s');
                $config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|GIF|jpg|JPG|jpeg|JPEG|png|PNG';
				$config['max_size']	= '8000';
				$config['max_width']  = '1366';
				$config['max_height']  = '1024';
				$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload()){
			echo $this->upload->display_errors();
		}else{
			if($this->_validation()===FALSE){
                            $this->session->set_flashdata('message', $this->message->message_error('Gagal Menambah Data'));
                            redirect(base_url()."account");
                        }else{
								$data = $this->upload->data();
								$this->_create_thumbnail($data["file_name"]); 
								$datanya = array( 'id_member' => $id,
							   'NamaDepan' => $this->input->post('namadepan'),
							   'NamaBelakang' => $this->input->post('namabelakang'),
							   'email' => $this->input->post('email'),
							   'telepon' => $this->input->post('telepon'),
							   'alamat1' => $this->input->post('alamat1'),
							   'kota' => $this->input->post('kota'),
							   'kodepos' => $this->input->post('kodepos'),
							   'username' => $this->input->post('username'),
							   'password' => $this->input->post('password'),
							   'ava' => $config['file_name']
                                          );
                            $this->mmember->update_record($id,$datanya);
                            $this->session->set_flashdata('message', $this->message->message_success('Thank you for register'));
                            redirect(base_url()."account");
                        }
		}            
	}
	
    public function _create_thumbnail($fileName) {
		$this->load->library('image_lib');
		$config['image_library'] = 'gd2';
		$config['source_image'] = './uploads/'.$fileName;
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 100; //640;
		$config['height'] = 100; //480;
		$config['thumb_marker'] = '';
		$config['new_image'] = './uploads/thumb/thumb_'.$fileName;
		// echo "#".$config['source_image']."#".$config['new_image'];
		$this->image_lib->initialize($config);
		if(!$this->image_lib->resize()) 
			 echo $this->image_lib->display_errors();
	}
	
	public function add_proccess(){
        if($this->_validation()===FALSE){
            $this->session->set_flashdata('message', $this->message->message_error('Fail Register'));
			echo 'Erro Jing';
            //redirect(base_url()."register");
        }else{
            $data = array( 'id_member' => null,
                           'NamaDepan' => $this->input->post('namadepan'),
						   'NamaBelakang' => $this->input->post('namabelakang'),
						   'email' => $this->input->post('email'),
						   'telepon' => $this->input->post('telepon'),
						   'alamat1' => $this->input->post('alamat1'),
						   'kota' => $this->input->post('kota'),
						   'kodepos' => $this->input->post('kodepos'),
						   'username_member' => $this->input->post('username'),
						   'password' => $this->input->post('password'),
						   'ava' => 'gambar.jpg'
                          );
            $this->mmember->add_record($data);
            $this->session->set_flashdata('message', $this->message->message_success('Success'));
            redirect(base_url()."register");
        }
    }
	
	public function _validation(){
        $this->form_validation->set_rules('namadepan','Nama Depan', 'trim|required|xss_clean');
		$this->form_validation->set_rules('namabelakang','Nama Belakang', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email','Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('telepon','Telepon', 'trim|required|xss_clean');
        $this->form_validation->set_rules('alamat1','Alamat', 'trim|xss_clean');
        $this->form_validation->set_rules('kota','Kota', 'trim|required|xss_clean');
		$this->form_validation->set_rules('kodepos','Kode Pos', 'trim|required|xss_clean');
		//$this->form_validation->set_rules('username','Username', 'trim|required|xss_clean');
		//$this->form_validation->set_rules('password','Password', 'trim|required|xss_clean');
		//$this->form_validation->set_rules('con_password', 'Password Confirmation', 'trim|required|matches[password]');
        //$this->form_validation->set_message('required', "Field %s belum Anda isi");
        return $this->form_validation->run();
    }
}
?>