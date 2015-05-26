<?php

 class Produk extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->check_isvalidated();
        $this->load->model('mproduk');
        $this->load->model('mkategori');
        $this->load->model('msubkategori');
		$this->load->model('mhuman');
		$this->load->model('msize');
        $this->load->helper(array("form", "date", "url"));
        $this->load->library(array("encrypt", "form_validation", "session"));
        $this->load->library('message');
        $this->form_fields_nullable = array();
    }
    public function index($id=''){ 
        $config = array();
        $config["base_url"]     = base_url() . "admin/produk/index/";
        $config["total_rows"]   = $this->mproduk->record_count();
        $config["per_page"]     = 10;
        $config['first_link']   = 'Awal';
        $config['last_link']    = 'Akhir';
        $config['next_link']    = 'Selanjutnya';
        $config['prev_link']    = 'Sebelumnya';
        $config["uri_segment"]  = 4;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["hasil"] = $this->mproduk->get_records($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
       // $this->output->enable_profiler(TRUE);
        $html = array();
        $html['title']      = "Administrator";
        $html['script']     = $this->load->view('administrator/template/script',null,true);
        $html['header']     = $this->load->view('administrator/template/header',null,true);
        $html['content']    = $this->load->view('administrator/list_produk',$data,true);
        $html['footer']     = $this->load->view('administrator/template/footer',null,true);
        $this->load->view('administrator/template/template',$html);
    }
    public function add(){
        $data = array(); 
        $data['size'] = $this->msize->tampil();
        $data['cats'] = $this->mkategori->tampil();
	    $data['human'] = $this->mhuman->tampil();
        $html = array();
        $html['title']      = "Administrator";
        $html['script']     = $this->load->view('administrator/template/script',null,true);
        $html['header']     = $this->load->view('administrator/template/header',null,true);
        $html['content']    = $this->load->view('administrator/product_add',$data,true);
        $html['footer']     = $this->load->view('administrator/template/footer',null,true);
        $this->load->view('administrator/template/template',$html);
    }
   
    public function update_proccess($id){
        $config['file_name'] = 'produk_'.date('Y_m_d_H_i_s');
        $config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|GIF|jpg|JPG|jpeg|JPEG|png|PNG';
		$config['max_size']	= '8000';
		$config['max_width']  = '4000';
		$config['max_height']  = '2000';
		$this->load->library('upload', $config);
        if($this->_validation()===FALSE){
            $this->session->set_flashdata('message', $this->message->message_error('Gagal Menambah Data'));
            redirect(base_url()."admin/produk");
        }else{
            if($_FILES['userfile']['name'] == "") {                                 
                        $datanya =$this->input->post(); 
                        unset($datanya['submit']);                                            
                        $this->mproduk->update_record($id,$datanya);
                        $this->session->set_flashdata('message', $this->message->message_success('Berhasil Menambah Data'));
                        redirect(base_url()."admin/produk");
            }else{
                if (!$this->upload->do_upload()){
                        echo 'Error Bos';
                        echo $this->upload->display_errors();
                }else{
                    $data = $this->upload->data();
                    $this->_create_thumbnail($data["file_name"]); 
                    $this->_create_mini($data["file_name"]);
                     
                    $inpu=$this->input->post();
                    $inpu['GambarBesar']=$data["file_name"];
                    $this->mproduk->update_record($id,$inpu);
                    $this->session->set_flashdata('message', $this->message->message_success('Berhasil Menambah Data'));
                    // redirect(base_url()."admin/produk");
                }
            }
        }
    }
    
    function do_upload(){
                $config['file_name'] = 'produk_'.date('Y_m_d_H_i_s');
                $config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|GIF|jpg|JPG|jpeg|JPEG|png|PNG';
		$config['max_size']	= '8000';
		$config['max_width']  = '4000';
		$config['max_height']  = '2000';
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload()){
			echo 'Error Bos';
		}else{
			if($this->_validation()===FALSE){ 
                            $this->session->set_flashdata('message', $this->message->message_error('Gagal Menambah Data'));
                            redirect(base_url()."admin/produk");
                        }else{
                            $data = $this->upload->data();
                            $this->_create_thumbnail($data["file_name"]); 
                            $this->_create_mini($data["file_name"]);
                             $data_adalah = $this->input->post();
                             $data_adalah['GambarBesar']=$data['file_name'];
                                                                                       
                             unset($data_adalah['submit']);                             
                           $this->mproduk->add_record($data_adalah);
                            $this->session->set_flashdata('message', $this->message->message_success('Berhasil Menambah Data'));
                            redirect(base_url()."admin/produk");
                        }
		}            
	}
        public function _create_thumbnail($fileName) {
		$this->load->library('image_lib');
		$config['image_library'] = 'gd2';
		$config['source_image'] = './uploads/'.$fileName;
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 212; //640;
		$config['height'] = 192; //480;
		$config['thumb_marker'] = '';
		$config['new_image'] = './uploads/thumb/'.$fileName;
		// echo "#".$config['source_image']."#".$config['new_image'];
		$this->image_lib->initialize($config);
		if(!$this->image_lib->resize()) 
			 echo $this->image_lib->display_errors();
	}
        
        public function _create_mini($fileName) {
		$this->load->library('image_lib');
		$config['image_library'] = 'gd2';
		$config['source_image'] = './uploads/'.$fileName;
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 92; //640;
		$config['height'] = 92; //480;
		$config['thumb_marker'] = '';
		$config['new_image'] = './uploads/mini/'.$fileName;
		// echo "#".$config['source_image']."#".$config['new_image'];
		$this->image_lib->initialize($config);
		if(!$this->image_lib->resize()) 
			 echo $this->image_lib->display_errors();
	}

    
    public function update($id=''){
        $data = array(); 
        
        $data['size'] = $this->msize->tampil();
               
        $data['eta']=$this->mproduk->berapakah_stoknya($id);
        $data['cats']   = $this->mkategori->tampil();
        $data['prd']    = $this->mproduk->get_produk_detail($id);
        $data['human']    = $this->mhuman->tampil();
        $html = array();
        $html['title']      = "Administrator";
        $html['script']     = $this->load->view('administrator/template/script',null,true);
        $html['header']     = $this->load->view('administrator/template/header',null,true);
        $html['content']    = $this->load->view('administrator/product_update',$data,true);
        $html['footer']     = $this->load->view('administrator/template/footer',null,true);
        $this->load->view('administrator/template/template',$html);
    }
    
    public function delete($id){
            $this->mproduk->delete_row($id);
            $this->session->set_flashdata('message', $this->message->message_success('Data Berhasil dihapus'));
            redirect(base_url()."admin/produk");
    }
    
    public function cari() {
       $data = array();
       $data['results']= $this->mproduk->caridata();
       if($data['results']== null){
             $this->session->set_flashdata('message', $this->message->message_error('Data Tidak Ada'));
             redirect(base_url()."admin/produk");
          }else {
             $html = array();
             $html['title']      = "Administrator";
             $html['script']     = $this->load->view('administrator/template/script',null,true);
             $html['header']     = $this->load->view('administrator/template/header',null,true);
             $html['content']    = $this->load->view('administrator/cari_product',$data,true);
             $html['footer']     = $this->load->view('administrator/template/footer',null,true);
             $this->load->view('administrator/template/template',$html); 
          }
    }
   
    function drop_1(){  
        $pari=$this->input->post('pariabel');
        $iye=$this->mkategori->tampil2($pari);
      if(sizeof($iye)>0)
       {?> 
         <table>
         
       <tr>
       <td>Subkategori</td>
       <td>
       <select name="idsubkategori">
       <option value="0" disabled="">Pilih Subkategori</option>
         <?php foreach ($iye as $akjdhas)
         echo "<option value='".$akjdhas['idsubkategori']."'>".$akjdhas['namasubkategori']."</option>";
       ?>
       </select>
       </td>
       </tr>
       
         <?php  }
         else
         {
            echo '<input type="hidden" value="0" name="idsubkategori">';
         } ?>
        </table><button style="position: absolute;top:21%;left: 53%;" style="font-size: 20px;"><span>Simpan</span></button>
   
  <?php  }
    
       
    function drop_2(){  
        $pari=$this->input->post('pariabel');
        $pari2=$this->input->post('pariabel_2');
        $eta=$this->mproduk->berapakah_stoknya($pari,$pari2);
         echo "<table>";
        echo "<tr><th colspan=2>Stok</th></tr>" ;
        foreach($eta as $itu)
        {
            echo "<tr><td>".$itu['ukuran'].'</td> <td>:<input type="text" id="search" size=2 name="ukr_'.$itu['id_'].'" value="'.$itu['stok'].'" /></td></tr>';
        }
        echo "</table>";
                    echo '<button style="position: absolute;top:21%;left: 53%;" style="font-size: 20px;"><span>Simpan</span></button>';
    
    }
    private function check_isvalidated(){
        if(! $this->session->userdata('validated')){
            redirect(base_url().'admin/login');
        }
    }
    public function _validation(){
        $this->form_validation->set_rules('namaproduk','Nama Produk', 'trim|required|xss_clean');
        $this->form_validation->set_rules('harga','Harga', 'trim|required|xss_clean');  
        $this->form_validation->set_rules('ket','Keterangan', 'trim|required|xss_clean');
        $this->form_validation->set_message('required', "Field %s belum Anda isi");
        return $this->form_validation->run();
    }
 }
 ?>