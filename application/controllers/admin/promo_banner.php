<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Home controller class
 * This is only viewable to those members that are logged in
 */
 class Promo_banner extends CI_Controller{
    function __construct(){
        parent::__construct();  
        $this->load->library('session');
        $this->load->library('image_lib');
        $this->load->library('message');
    }
    
    function manage()
    {  
        $html = array();
        $html['title']      = "Administrator";
        $html['script']     = $this->load->view('administrator/template/script',null,true);
        $html['header']     = $this->load->view('administrator/template/header',null,true);
        $html['content']    = $this->load->view("administrator/promo_banner",null,true);
        $html['footer']     = $this->load->view('administrator/template/footer',null,true);
        $this->load->view('administrator/template/template',$html);
    }
    public function update($id=''){
        $data = array(); 
        $html = array();
        $html['title']      = "Administrator";
        $html['script']     = $this->load->view('administrator/template/script',null,true);
        $html['header']     = $this->load->view('administrator/template/header',null,true);
        $html['content']    = $this->load->view('administrator/banner_update',null,true);
        $html['footer']     = $this->load->view('administrator/template/footer',null,true);
        $this->load->view('administrator/template/template',$html);
    }
    public function update_proccess()
    {
        $config['file_name'] = "__".$this->uri->segment(4).".jpg";
        $config['upload_path'] =realpath(APPPATH . '../img/banner');
		$config['allowed_types'] = 'gif|GIF|jpg|JPG|jpeg|JPEG|png|PNG';
		$config['max_size']	= '8000';  
        $config['max_width']  = '2024';
        $config['max_height']  = '1768';
        $config['overwrite'] = TRUE;

           
		$this->load->library('upload', $config); $data = $this->upload->data();
                   
                    if($this->upload->do_upload()==TRUE)
                    {
                         $mbnzc=$this->upload->data();
                        
                        $onfig['source_image']	= $data['full_path'];
                        $onfig['maintain_ratio'] = TRUE;
                        $onfig['width'] = 500;
                        $onfig['height'] = ($mbnzc['image_height']/$mbnzc['image_width'])*500; 
                        $this->load->library('image_lib'); 
                        
                    $this->image_lib->clear();
                    $this->image_lib->initialize($onfig);
                    $this->image_lib->resize();
                           $this->session->set_flashdata('gambar', $config['file_name']);
                      
                    redirect(base_url()."admin/promo_banner/crop");
                    }
                    else
                    echo $this->upload->display_errors();
                
    }
    
    public function crop()
    { 
        $data['gambar']= $this->session->flashdata('gambar');
            $html['title']      = "Administrator";
        $html['script']     = $this->load->view('administrator/template/script',null,true);
        $html['header']     = $this->load->view('administrator/template/header',null,true);
        $html['content']    = $this->load->view('administrator/crop_banner',$data,true);
        $html['footer']     = $this->load->view('administrator/template/footer',null,true);
        $this->load->view('administrator/template/template',$html);
       
    }
    
    public function crop_proses()
    {
         
    
     	$targ_w = 305;
     	$targ_h = 166;
	$jpeg_quality = 90;

	$src = $this->input->post("gambal");
	$srssc = $this->input->post("rawgambal");
	$img_r = imagecreatefromjpeg($src);
	$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

	imagecopyresampled($dst_r,$img_r,0,0,$this->input->post("x"),$this->input->post("y"),$targ_w,$targ_h,$this->input->post("w"),$this->input->post("h"));
    
        $conasdas =realpath(APPPATH . '../img/banner/');
        $fotoh = $conasdas."/".substr($srssc,2);	
        
        imagejpeg($dst_r,$fotoh,100);
        
                    redirect(base_url()."admin/promo_banner/manage");
  
    }

 }
