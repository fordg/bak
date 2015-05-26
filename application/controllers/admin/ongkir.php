<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Home controller class
 * This is only viewable to those members that are logged in
 */
 class Ongkir extends CI_Controller{
    function __construct(){
        parent::__construct();  
        $this->load->model('mongkir');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('message');
        $this->load->library('js_palid');
    }
     public function hapus($id){
            $this->mongkir->delete_row($id);
            $this->session->set_flashdata('message', $this->message->message_success('Data Berhasil dihapus'));
            redirect(base_url()."admin/ongkir/upload");
    }
    
     public function update($id=null){
        $data = array();
        $data['record'] = $this->mongkir->get_id($id);
        $html = array();
        $html['title']      = "Administrator";
        $html['script']     = $this->load->view('administrator/template/script',null,true);
        $html['header']     = $this->load->view('administrator/template/header',null,true);
        $html['content']    = $this->load->view('administrator/update_ongkir',$data,true);
        $html['footer']     = $this->load->view('administrator/template/footer',null,true);
        $this->load->view('administrator/template/template',$html);
    }
    
        public function update_($id=null){
            
            $input=$this->input->post();
            $id=$input['id_ongkos_kirim'];
            unset($input['id_ongkos_kirim']);
            $this->mongkir->update($id,$input);
            $this->session->set_flashdata('message', $this->message->message_success('Berhasil Mengubah Data'));
            redirect(base_url()."admin/ongkir/upload");
        }
    
    function add_data()
    {
     
        $html['title']      = "Administrator";
        $html['script']     = $this->load->view('administrator/template/script',null,true);
        $html['header']     = $this->load->view('administrator/template/header',null,true);
        $html['content']    = $this->load->view("administrator/add_ongkir",null,true);
        $html['footer']     = $this->load->view('administrator/template/footer',null,true);
        $this->load->view('administrator/template/template',$html);
    }
    
    function tambah_()
    {
        
        
            $this->mongkir->add_record($this->input->post());
            $this->session->set_flashdata('message', $this->message->message_success('Berhasil Menambah Data'));
            redirect(base_url()."admin/ongkir/upload");
     
        
    }
    
    
    function upload()
    {
     
        $html['title']      = "Administrator";
        $html['script']     = $this->load->view('administrator/template/script',null,true);
        $html['header']     = $this->load->view('administrator/template/header',null,true);
        $html['content']    = $this->load->view("administrator/upload_ongkir",null,true);
        $html['footer']     = $this->load->view('administrator/template/footer',null,true);
        $this->load->view('administrator/template/template',$html);
    }
    
    function upload_proses()
    {
        $config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'xls';
		$config['max_size']	= '500000'; 

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
            var_dump($error);
 
		}
        $g=$this->upload->data(); 
        $pathToFile = './uploads/' . $g['file_name'];
    include $_SERVER['DOCUMENT_ROOT']."siteteh/excel_reader2.php";
    $data = new Spreadsheet_Excel_Reader($pathToFile);
    

// membaca jumlah baris dari data excel
if($this->input->post('dari')!='' or $this->input->post('sampai')!='')
{
    $dari=$this->input->post('dari');
    $sampai=$this->input->post('sampai');
}
else
{
    $sampai = $data->rowcount($sheet_index=0);
    $dari=1;
}
// nilai awal counter untuk jumlah data yang sukses dan yang gagal diimport
  $sukses = 0;
  $gagal = 0;

// import data excel mulai baris ke-2 (karena baris pertama adalah nama kolom)
for ($i=$dari; $i<=$sampai; $i++)
{ 
  // membaca data nama (kolom ke-2)
  $kota = $data->val($i, 2);
  // membaca data alamat (kolom ke-3)
  $waktu = $data->val($i, 5);
  
  // membaca data alamat (kolom ke-4)
  $biaya = $data->val($i, 3);
  
  // membaca data alamat (kolom ke-5)
  $service = $data->val($i, 4);
  
  if($service=='' and $biaya=='' and $waktu=='' and $kota=='')
  continue;
  
  $dataadalah=array('biaya'=>$biaya,'service'=>$service,'kota'=>$kota,'waktu'=>$waktu);  
  
  // setelah data dibaca, sisipkan ke dalam tabel mhs
  if($this->input->post('mau_ngapain')=='tambah')
  {
    $this->mongkir->add_record($dataadalah); 
  }
  else
  { 
    $this->mongkir->update_record($kota,$service,$biaya,$waktu);  
  }      
//  $query = "INSERT INTO mhs VALUES (null,'$biaya', '$service', '$kota','$lama')";
  //echo $query."<br />";

  // jika proses insert data sukses, maka counter $sukses bertambah
  // jika gagal, maka counter $gagal yang bertambah 
}

    unlink($pathToFile);
           redirect(base_url()."admin/home");
 
 }
 
    public function cari()
    { 
        
        $id=$this->uri->segment(5);
        
        if($this->uri->segment(4)!='')
        $g=$this->uri->segment(4);
        else
        $g = ($this->input->post('search'));
        
        $config = array();  
        $jml = $this->mongkir->total_row($g);  
        // $config['total_rows'] = $jml->num_rows();   
		 $config['base_url'] = base_url()."admin/ongkir/cari/$g";
		 $config['uri_segment'] = 5;
		 $config['total_rows'] = sizeof($jml); 
		 $config['per_page'] = '10';
		 $config['first_page'] = 'Awal';
		 $config['last_page'] = 'Akhir';
		 $config['next_page'] = '&laquo;';
		 $config['prev_page'] = '&raquo;'; 
		 $this->pagination->initialize($config); 
		 $data['halaman'] = $this->pagination->create_links(); 
		 $data['tampil'] = $this->mongkir->caridata($g,$config['per_page'], $id);

           $html = array();
        $html['title']      = "Administrator";
        $html['script']     = $this->load->view('administrator/template/script',null,true);
        $html['header']     = $this->load->view('administrator/template/header',null,true);
        $html['content']    = $this->load->view('administrator/list_ongkir',$data,true);
        $html['footer']     = $this->load->view('administrator/template/footer',null,true);
        $this->load->view('administrator/template/template',$html);
    }
  }
