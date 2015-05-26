<?php 
class Checkout extends CI_Controller{
	function __construct(){
            parent::__construct();
            //$this->check_isvalidated();
            $this->load->library('cart');
            $this->load->model('mmember');
            $this->load->model('mproduk');
            $this->load->model('mcheckout');
        $this->load->model('mhuman');
            $this->load->library('js_palid');
            $this->load->library('form_validation');
            $this->load->library('session');
            $this->load->library('message');
        $this->load->model('mkategori');
            $this->check_isvalidated();
    }
	public function index($id){
		$data = array();
        $data["base_url"]     = base_url() . "account";
        $data["total_rows"]   = $this->mmember->record_count();
		//$data['produksberdasarkan'] = $this->mproduk->kategori($id);
		//$data['kategori'] = $this->mproduk->tampil_kategori(2);
		//$data['kategori1'] = $this->mproduk->tampil_kategori2(1);
		$data['message']  = "produk tidak ada";
        $data['member'] = $this->mmember->get_id($id);
		$html = array();
		$html['title'] = "Tamy Putri Imanda";
		$html['meta'] = $this->load->view('meta',null,true);
		$html['css'] = $this->load->view('css',null,true);
		$html['header'] = $this->load->view('header',$data,true);
		$html['container'] = $this->load->view('checkout',$data,true);
		$html['footer'] = $this->load->view('footer',null,true);
		$html['js'] = $this->load->view('js',null,true);
		$this->load->view('template',$html);
	}
    public function go(){
        $data = array(); 
        $data['member'] = $this->mmember->get_id($member=$this->session->userdata('memberid'));
        
         $a=array('id'=>'nama','msg'=>'tidak valid');
        $b=array('id'=>'komplit','msg'=>'tidak valid');
        $c=array('id'=>'kodepos','msg'=>'tidak valid');
        $d=array('id'=>'alamat','msg'=>'tidak valid');
        $data['validate']=$this->js_palid->kudu_isi(array($c,$b,$a,$d)).
                            $this->js_palid->kudu_nomer(array($c));
       
        $data['cart']=$this->cart->contents();
        $html = array();
		$html['title'] = "Tamy Putri Imanda";
		$html['meta'] = $this->load->view('meta',null,true);
		$html['css'] = $this->load->view('css',null,true);
		$html['header'] = $this->load->view('header',null,true);
		$html['js'] = $this->load->view('js',null,true);
		$html['container'] = $this->load->view('checkout',$data,true);
		$html['footer'] = $this->load->view('footer',null,true);
		$this->load->view('template',$html);
    }
        private function check_isvalidated(){
            if(!$this->session->userdata('tervalidasi')){
                redirect(base_url().'login');
            }
        }
        
    function suggest()
    { 
        
         $keyword=$this->input->get('q');
         $data = $this->db->query("SELECT distinct(kota) FROM ongkos_kirim where kota like '%$keyword%' ;")->result_array();
         
         foreach ($data as $key=>$value)
          { 
			if (strpos(strtolower($value['kota']), $keyword) !== false) 
                echo ucfirst(strtolower($value['kota']))."\n"; 
          }
        
    }
    
    function ambil_biaya()
    {
          $kota=$this->input->post('katahati');
          $data = $this->db->query("SELECT * FROM ongkos_kirim where kota ='$kota' ")->result_array();
          $r=0;
     	  foreach ($data as $key=>$value) {  
                echo    '<table>';
                echo    '<tr><td>';
                echo    '<input type="radio" name="ongkos_kilim" id="ukim_'.$r.'"  class="cekbok css-checkbox" value="'.$value['id_ongkos_kirim'].'" />
                         <label for="ukim_'.$r.'" name="demo_lbl_'.$r.'" class="css-label"></td>';
                echo    '</tr>';
                
                echo    '<tr>'; 
                    echo'<td><i>service<i></td>';
                    echo'<td>: '.strtoupper($value['service']).'</td>';
                echo    '</tr>';
                
                echo    '<tr>'; 
                    echo'<td><i>biaya<i></td>';
                    echo'<td>: IDR. '.number_format ($value['biaya'],0,",",",").' / KG</td>';
                    echo'</tr><tr>';
                    echo'<td><i>lama pengiriman<i></td>';
                    echo'<td>: '.$value['waktu'].'  </td>';
                echo    '</tr>';
                
                echo    '</table>'; 
          
    		        
    $r++;
    }
    echo '<input type="submit" value="simpan" />';
    
            
      }
      
      
        function proses()
        {
             $input=$this->input->post();
           
            
            if($input['ongkos_kilim']=='')
            redirect(base_url().'checkout/go');
            
            
            $tolber=0;
            foreach($this->cart->contents() as $c=>$d)
            {
                $tolber=$tolber+$d['berat'];
                $g=array('name'=>$d['name'],'size'=>$d['size'],'harga'=>$d['price'],'qty'=>$d['qty']);
                //var_dump($g);  
            } 
            $data = $this->db->query("SELECT * FROM ongkos_kirim where id_ongkos_kirim =".$this->input->post('ongkos_kilim')." ")->result();
             
            
            
            $tolber=ceil($tolber);
            $subbayar=$tolber*$data[0]->biaya;
            $total_bayar= $this->cart->total()+$subbayar;
            date_default_timezone_set('Asia/Jakarta');
            $waktu=date("Y-m-d H:i:s");
            //var_dump($this->input->post());
          
           $input['id_member']= $this->session->userdata('memberid');
           $input['waktu']= $waktu; 
           $input['status']= 'pemesanan'; 
           
           $input['total_bayar']=$total_bayar;
        
           $input['total_ongkir']=$subbayar;
          
           $input['kode_transaksi'] = $this->mcheckout->teang();
              
            $input['service']=$data[0]->service;
            unset($input['ongkos_kilim']);
            $this->mcheckout->masukin('pemesanan',$input);
            $bbb=0;
            foreach($this->cart->contents() as $c=>$d)
            {
                
                       $ggg=$this->mproduk->ukurannya_adalah(substr($d['size'],4)); 
                       
                $tolber=$tolber+$d['berat'];
                $g=array('kode_transaksi'=>$input['kode_transaksi'],'namaproduk'=>$d['name'],'size'=>$ggg->ukuran_produk,'harga'=>$d['price'],'qty'=>$d['qty']);
               $this->mcheckout->masukin('pemesanan_detail',$g);
                $iauhs=$this->mcheckout->lihat_stok_cukup_teu($d['size'],$g['qty'],$d['id']);
              
              if($iauhs<0)
                {
                    $proo=$this->mproduk->get_id($d['id']);
                    $iniah_yang_gagal_dibeli=array('nama'=>$proo->NamaProduk,'size'=>$ggg->ukuran_produk,'qty'=>$g['qty']+$iauhs);
                    $bbb++;        
                }   
                
                $auishjn[]=$iniah_yang_gagal_dibeli;
               
                             
            } 
             if($bbb!=0)
                {
                     $this->session->set_flashdata('produk_telah_payu',$auishjn);
                    redirect(base_url().'cart');    
                }
           $this->cart->destroy();
                 $this->session->set_flashdata('checkout_berhasil', $input['kode_transaksi']);
                        
          redirect(base_url().'account');
            
            
            
            
        }
        
                function yuk() 
  {
    var_dump($this->mcheckout->teang());
  }  
    
}
?>