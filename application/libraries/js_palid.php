<?php

class Js_palid{
    public function __construct(){
        $CI =& get_instance();
        $this->instan = $CI;
        

    }
    
    public function kudu_isi($array){
    		$msg=''; 
        foreach ($array as $aidi)
        {
            
            if(isset($aidi['msg']))
                           {
                            if($aidi['msg']=='') 
                            $pesan='message: '. '"harus diisi"';
                            else
                            $pesan='message: '. '"'.$aidi['msg'].'"';
                           }
                            else
                            $pesan='';
                            
             $msg .= ' 
                jQuery(function(){
                       jQuery("#'.$aidi['id'].'").validate({
                          expression: "if (VAL) return true; else return false;", '
                          .$pesan.'
                          
                      });
                     
               });  ';
        }     
       return '<script type="text/javascript">'.$msg .'</script>';
    }
     public function kudu_pilih($array){
    		$msg=''; 
        foreach ($array as $aidi)
        {
            
            if(isset($aidi['msg']))
                           {
                            if($aidi['msg']=='') 
                            $pesan='message: '. '"harus dipilih"';
                            else
                            $pesan='message: '. '"'.$aidi['msg'].'"';
                           }
                            else
                            $pesan='';
                            
             $msg .= ' 
                jQuery(function(){
                       jQuery("#'.$aidi['id'].'").validate({
                       expression: "if (VAL != \'0\') return true; else return false;", '
                          .$pesan.'
                          
                      });
                     
               });  ';
        }     
       return '<script type="text/javascript">'.$msg .'</script>';
    }
    
   public function kudu_nomer($array)
   {
    		$msg=''; 
        foreach ($array as $aidi)
        {
            
            if(isset($aidi['msg']))
                           {
                            if($aidi['msg']=='') 
                            $pesan='message: '. '"harus dipilih"';
                            else
                            $pesan='message: '. '"'.$aidi['msg'].'"';
                           }
                            else
                            $pesan='';
                            
             $msg .= ' 
                jQuery(function(){
                       jQuery("#'.$aidi['id'].'").validate({
					    expression: "if (VAL.match(/^[0-9]*$/) && VAL) return true; else return false;",'
                          .$pesan.'
                          
                      });
                     
               });  ';
        }     
       return '<script type="text/javascript">'.$msg .'</script>';
    }
    
	public function ganda_campuran($fungsinya,$nilainya)
	{
	$return='';
	var_dump($nilainya);
        foreach ($fungsinya as $fungsi)
        {
	        
			$return .= $this->$fungsi($nilainya);
			 
		}	
		
		return $return;
	}

	
	public function ulah_leuwih($id,$ss,$berapa)
	{
	           $msg=''; 
               $pesan='message: '. '"'.$ss.'"';
               $msg .= ' 
                jQuery(function(){
                       jQuery("#'.$id.'").validate({
					    expression: "if (VAL <= '.$berapa.') return true; else return false;",'
                          .$pesan.'
                          
                      });
                     
               });  ';
             
       return '<script type="text/javascript">'.$msg .'</script>';

	}
    	public function kudu_centang($id,$ss)
	{
	           $msg=''; 
               $pesan='message: '. '"'.$ss.'"';
               $msg .= ' 
                jQuery(function(){
                       jQuery("#'.$id.'").validate({
					    expression: "if (isChecked(SelfID)) return true; else return false;",'
                          .$pesan.'
                          
                      });
                     
               });  ';
             
       return '<script type="text/javascript">'.$msg .'</script>';

	}
   
}
?>