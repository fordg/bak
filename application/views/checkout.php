<style>
#loading{ 
                position: absolute;
                top: 130px;
                left: 820px;
				margin-top:200px;
            }
</style>
<div class="container">
	<section class="page">
		<div class="row">
			<header class="span12 prime">
				<h3>Checkout</h3>
			</header>
		</div>
        

<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/jquery.autocomplete.css" />

<script type='text/javascript' src='<?php echo base_url() ?>js/1.8.2.js'></script>
<script type='text/javascript' src='<?php echo base_url() ?>js/jquery.autocomplete.js'></script> 
        <link id="color" rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery.validate.css" /> 
	    <script src="<?php echo base_url(); ?>js/jquery.validate.js" type="text/javascript"></script>
        
 <?php echo $validate ?>
        <script>
      	var $jo = jQuery.noConflict();
      
 
$jo().ready(function() {

	function log(event, data, formatted) {
		$jo("<li>").html( !data ? "No match!" : "Selected: " + formatted).appendTo("#result");
	}
	
	function formatItem(row) {
		return row[0] + " (<strong>id: " + row[1] + "</strong>)";
	}
	function formatResult(row) {
		return row[0].replace(/(<.+?>)/gi, '');
	}
	
	

	$jo("#komplit").autocomplete("<?php echo base_url()."checkout/suggest" ?>", {
		width: 260,
		selectFirst: false,
                        
                        
	});
	
	$jo("#suggest4").result(function(event, data, formatted) {
		var hidden = $jo(this).parent().next().find(">:input");
		hidden.val( (hidden.val() ? hidden.val() + ";" : hidden.val()) + data[1]);
	});
 
	
});
</script>
 <script type="text/javascript">
 			var $bu = jQuery.noConflict();
            $bu(document).ready(function(){
                function loading_show(){
                    $bu('#loading').html("<img src='<?php base_url()."img/ajax-loader.gif"?>'/>").fadeIn('normal');
                }
                function loading_hide(){
                    $bu('#loading').fadeOut('normal');
                }                
                function loadData(katahati){
                    loading_show();                    
                    $bu.ajax
                    ({
                        type: "POST",
                        url: "<?php echo base_url()."checkout/ambil_biaya" ?>",   
                          data : { katahati : katahati},
     
                        success: function(msg)
                        {
                            $bu("#kontener").ajaxComplete(function(event, request, settings)
                            {
                                loading_hide();
                                $bu("#kontener").html(msg);
                            });
                        }
                    });
                }
                    	$bu('#komplit').focusout(function () { 
       loadData($bu('#komplit').val());  // For first time page load default results 
                    }); 
                          	$bu('#komplit').ready(function () { 
       loadData($bu('#komplit').val());  // For first time page load default results 
                    }); 
                                                            
            });
        </script>
        <form action="<?php echo base_url()."checkout/proses" ?>" method="post">                    
			
		<div class="wrap">
			<div class="row-fluid">
				<div class="span4">
<?php if( sizeof($this->cart->contents())!=0) {?>
                	<p><b>Shipping Address</b></p>
              		<table width="200" border="0">
                      <tr>
                        <td>Name</td>
                        <td><?php echo form_input(array('size'=>'20','id'=>'nama','name'=>'atas_nama','value'=>$member->NamaDepan." ".$member->NamaBelakang)); ?></td>
                      </tr>
                       
                      <tr>
                        <td>Mobile Number</td>
                        <td><?php echo form_input(array('size'=>'20','name'=>'telepon','value'=>$member->telepon)); ?></td>
                      </tr>
                      
                      <tr>
                        <td>City</td>
                        <td><?php echo form_input(array('size'=>'20','name'=>'kota','id'=>'komplit','value'=>$member->kota)); ?></td>
                      </tr>
                      
                      <tr>
                        <td>Post Code</td>
                        <td><?php echo form_input(array('maxsize'=>'5','id'=>'kodepos','name'=>'kodepos','value'=>$member->kodepos)); ?></td>
                      </tr>
                      <tr>
                        <td>Address</td>
                        <td><textarea name="alamat_penerima" id="alamat"><?php echo $member->alamat1 ?></textarea></td>
                      </tr>
                    </table> <br/> 
                    
                 
			</div> 
                 
              <div class="span4">
                    <div id="loading"></div>
        <div id="kontener"> 
                           
        </div>
        
                </div><!-- end span4 -->
		</div>
        
                         </form>  
                         <?php } 
                    else
                    echo "Keranjang belanja Anda kosong!";
                    ?>
	</section>
</div>
</div> 