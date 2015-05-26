<?php

class Kerannda{
    
    	var $_cart_contents	= array();


    function __construct(){
         	$this->CI =& get_instance();

            $this->CI->load->library('session');
            if ($this->CI->session->userdata('cart_contents') !== FALSE)
		{
			$this->_cart_contents = $this->CI->session->userdata('keranjang_belanda');
		}
                       // $etawelah['nyetok']["stok_".$f->kodeProduk][$y->ukuran]=$l[0][$y->ukuran]; 
                       // $this->session->set_userdata('keranjang_belanda');

    }
    
    public function insert($larik)
    {
             
            $r=$larik['id']."-".$larik['size'];
            $a=array('rowid'=>$r);
             $array=array_merge($larik,$a);
        
        
          
           if($this->CI->session->userdata('keranjang_belanda')!== FALSE)
                { 
                    
                    
                     foreach($array as $arral=>$oral)
                              {
                              $orai[$r][$arral]=$oral; 
                              } 

                     //$xyz = $this->_cart_contents;
                     // var_dump($orai[$r]['rowid']);
                        
                                $this->_cart_contents[$orai[$r]['rowid']]= $orai[$r];
                                
                                 $this->_bungkus();
                                //$this->CI->session->set_userdata($faaak);  
                                      
                }
                else
                {
                     
                                 $this->_cart_contents[$r]=$array; 
                              
                                 $this->_bungkus();
                                //$this->CI->session->set_userdata($etawelah);
                               
         
                }
        
                       
    }
    public function _bungkus()
    {
       
       
		$this->CI->session->set_userdata(array('keranjang_belanda' => $this->_cart_contents));
    }
    
    
  
}
?>

