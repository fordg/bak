<?php 
class Account extends CI_Controller{
	 function __construct(){
        parent::__construct();
        $this->load->model('mmember');
		$this->load->model('mproduk');
        $this->load->model('mhuman');
		$this->load->model('mcheckout');
        $this->load->model('mkategori');
		$this->load->model('mpemesanan');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('js_palid');
        $this->load->library('message');
		$this->load->library('cart');
    }
	
	public function index($cat=NULL){
	   $mss=$this->session->flashdata('checkout_berhasil');

       if($mss!=FALSE)
       {
        $belanjaan=$this->mpemesanan->belanjaan("$mss");
        $ini_belanjaan=$this->mpemesanan->detail("$mss");
        
        $mmber=$this->mmember->get_id($this->session->userdata('memberid'));
        
        $body ="<p><img src='http://127.0.0.1/siteteh/img/email.png'></p>";
        $body.="<hr style='background:#ec3970'>";
        $body.="<h2>Hai ".$mmber->NamaDepan." ".$mmber->NamaBelakang."</h2>";
        $body.="<h4><p>Anda telah melakukan pemesanan ";
        $body.="<br />dengan kode pemesanan <b>$mss</b>";
        $body.="<br />pada ".$this->mpemesanan->taimstem($ini_belanjaan[0]->waktu).", dengan rincian sebagai berikut;</p></h4>";
       
       
        
       $body.= "<table style='font-weight:bold;margin:0 0 20px 40px;background:#f9f9f9;border-collapse: collapse;border:1px solid #777;'>
                  <tr style='font-weight:bold'> 
                    <td style='padding:2px 10px 0 10px'><b>Nama Produk</b></td>
                    <td style='padding:2px 10px 0 10px'><b>Harga</b></td>
                    <td style='padding:2px 10px 0 10px'><b>Ukuran</b></td>
                    <td style='padding:2px 10px 0 10px'><b>Qty</b></td>
                    <td style='padding:2px 10px 0 10px'><b>Subtotal</b></td> 
                   </tr>";
                   
            foreach($belanjaan as $bbb)
            {
                $body.="<tr style='border-top:1px solid #aaa'>"; 
                $body.="<td style='border-right:1px solid #aaa;padding:1px 10px 1px 10px'>".$bbb->namaProduk."</td>"; 
                $body.="<td style='border-right:1px solid #aaa;padding:2px 10px 1px 10px'>Rp. ".number_format(($bbb->harga),0,",",".")."</td>"; 
                $body.="<td style='border-right:1px solid #aaa;padding:2px 10px 1px 10px'>".substr($bbb->size,0,6)."</td>"; 
                $body.="<td style='border-right:1px solid #aaa;padding:2px 10px 1px 10px'>".$bbb->qty."</td>"; 
                $body.="<td style='border-right:1px solid #aaa;padding:2px 10px 1px 10px'>Rp. ".number_format(($bbb->qty*$bbb->harga),0,",",".")."</td>"; 
                
                $body.="</tr>";
            }
            $body.="</table>";
            $body.="total ongkos kirim :Rp. ".number_format(($ini_belanjaan[0]->total_ongkir),0,",",".");
            $body.="<h4>total yang harus anda bayar :Rp. ".number_format(($ini_belanjaan[0]->total_bayar),0,",",".");
            $body.="<h4>Segeralah melakukan transfer ke daftar akun bank dibawah ini:</h4>";
            $body.= ' <table style="font-weight:bold;margin-left:0px;margin-bottom:2px;background:#f9f9f9;border-collapse: collapse;border:1px solid #777;">';
             foreach($this->mcheckout->daftar_bank() as $g)
                          {
                            
                            $body.= " <tr><td>Nama Bank</td><td>: ".$g->namabank."</td></tr> "; 
                            $body.= " <tr><td>No Rekeneing</td><td>: ".$g->norekening."</td></tr> "; 
                            $body.= " <tr style='border-bottom:2px solid #777;'><td>Atas Nama</td><td>: ".$g->atasnama."</td></tr> "; 
                            
                          } 
                $body.= '</table>';
        $body.="<h4><i>Beberapa hal yang harus anda perhatikan</i>;<br /><ol>
        <li> Setelah anda melakukan order dan menerima konfirmasi pembayaran harap segera transfer.</li>
        <li> Batas Waktu transfer adalah 3x24 jam. Apabila kami tidak menerima transfer dari anda maka pesanan Anda, kami anggap batal.</li>
        <li> Setelah melakukan transfer, harap infokan kepada kami via email/sms/BBM. Kami akan mengirim barang anda dihari berikutnya.</li>
        <br />
        <li> Pengiriman akan dilakukan sehari sesudahnya.</li>
        <li> Jadwal pickup service TIKI setiap hari Senin - Sabtu jam 9 pagi.</li>
        <li> Apabila anda transfer pada hari Sabtu/Minggu, akan dikirim hari Senin.</li></h4>";

        $body.="<hr style='background:#ec3970'>";
        $body.="<h3>BabyandKids-Shop.com</h3>";
        $body.="<h4>
        Telepon : +628999903407<br />
PIN BB : 3140C680</h4>";

                           
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = "html"; 
        $this->load->library('email',$config); 
        $this->email->from('babyandkids_shop@yahoo.com', 'BabyandKids-Shop');
        $this->email->to($mmber->email);  
        $this->email->subject('Detail Pemesanan');
        $this->email->message($body);	
        
        $this->email->send();
        
      
        
       }
       
		$data = array();
        $data["base_url"]     = base_url() . "account";
        $data['daftar_bank']=$this->mcheckout->daftar_bank();
        $data["total_rows"]   = $this->mmember->record_count();
        
		$data['message']  = "produk tidak ada";
		$html = array();
		$html['title'] = "Tamy Putri Imanda";
		$html['meta'] = $this->load->view('meta',null,true);
		$html['css'] = $this->load->view('css',null,true);
		$html['header'] = $this->load->view('header',$data,true);
		$html['container'] = $this->load->view('account',$data,true);
		$html['footer'] = $this->load->view('footer',null,true);
		$html['js'] = $this->load->view('js',null,true);
		$this->load->view('template',$html);
	}
    	public function history_order($cat=NULL){
		$data = array();  
        $mid=$this->session->userdata('memberid');
        $data['apa_aja_sih_belanjaa_orang_kami_selama_ini']=$this->mcheckout->history_order($mid);
		$html = array();
		$html['title'] = "Tamy Putri Imanda";
		$html['meta'] = $this->load->view('meta',null,true);
		$html['css'] = $this->load->view('css',null,true);
		$html['header'] = $this->load->view('header',$data,true);
		$html['container'] = $this->load->view('history_order',$data,true);
		$html['footer'] = $this->load->view('footer',null,true);
		$html['js'] = $this->load->view('js',null,true);
		$this->load->view('template',$html);
	}


    	public function detail_pesanan($id){
		$data = array();  
        $mid=$this->session->userdata('memberid');
        $data['apa_aja_sih_belanjaa_orang_kami_selama_ini']=$this->mpemesanan->belanjaan($id);
		$html = array();
		$html['title'] = "Tamy Putri Imanda";
		$html['meta'] = $this->load->view('meta',null,true);
		$html['css'] = $this->load->view('css',null,true);
		$html['header'] = $this->load->view('header',$data,true);
		$html['container'] = $this->load->view('detail_pesanan',$data,true);
		$html['footer'] = $this->load->view('footer',null,true);
		$html['js'] = $this->load->view('js',null,true);
		$this->load->view('template',$html);
	}
    	public function transaksi(){
	   
          
        $a=array('id'=>'kodet','msg'=>'tidak valid');
        $b=array('id'=>'nomor','msg'=>'tidak valid');
        $c=array('id'=>'tot','msg'=>'tidak valid');
        $d=array('id'=>'dari','msg'=>'tidak valid');
        $e=array('id'=>'kemana','msg'=>'tidak valid');
        $f=array('id'=>'slider_example_2','msg'=>'tidak valid');
          $data['validate']=$this->js_palid->kudu_isi(array($b)).
                            $this->js_palid->kudu_isi(array($c,$b,$a,$d,$f)).
                            $this->js_palid->kudu_nomer(array($b,$c)).
                            $this->js_palid->kudu_pilih(array($e));
        $data['daftar_bank']=$this->mcheckout->daftar_bank();
		$html['title'] = "Tamy Putri Imanda";
		$html['meta'] = $this->load->view('meta',null,true);
		$html['css'] = $this->load->view('css',null,true);
		$html['header'] = $this->load->view('header',$data,true);
		$html['container'] = $this->load->view('transaksi_member',null,true);
		$html['footer'] = $this->load->view('footer',null,true);
		$html['js'] = $this->load->view('js',null,true);
		$this->load->view('template',$html);
	}
    	public function proses_transaksi(){
    	   var_dump($this->input->post());
	}
}
?>