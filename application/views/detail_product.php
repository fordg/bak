<!--Ajax Chain-->
        <link id="color" rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery.validate.css" />
    	<script src="<?php echo base_url(); ?>resources/scripts/jquery-1.4.2.min.js" type="text/javascript"></script>
	    <script src="<?php echo base_url(); ?>js/jquery.validate.js" type="text/javascript"></script>
        

<script type="text/javascript">
$(document).ready(function() {
	$('#wait_').hide();
	$('#ukuran').change(function(){
	  $('#wait_').show();
	  $('#result_stok').hide();
      $.post("<?php echo base_url(); ?>main/chain_stok", {
		fungsi: "change_stok", 
        kodbar: "<?php echo $produks->kodeProduk?>",
		ukuran: $('#ukuran').val()
      }, function(response){
        $('#result_stok').fadeOut();
        setTimeout("finishAjax_kategori('result_stok', '"+escape(response)+"')", 400);
      });
    	return false;
	});
});

function finishAjax_kategori(id, response) {
  $('#wait_').hide();
  $('#'+id).html(unescape(response));
  $('#'+id).fadeIn();
}
</script>
<!--end Ajax Chain-->

<div class="container">
	<section class="single">
		<div class="row">
			<header class="span12 prime">
				<h3>Detail Product</h3>
			</header>
		</div><!-- end row -->
		<div class="row">
			<div class="span5">
				<!-- Product Images -->
				<div class="wrap">
					<img alt="" src="<?php echo base_url().'uploads/'.$produks->GambarBesar; ?>" width="372" height="370">
				</div><!-- end wrap -->
			</div><!-- end span5 -->
			<div class="span7">
				<!-- Product Info -->
				<div class="details wrapper">
					<h3><?php echo $produks->NamaProduk; ?></h3>
					<p class="price"><i class="icon-tag"></i>Rp <?php echo number_format ( $produks->harga,0,",",","); ?></p>
					<form action="<?php echo base_url().'main/add_cart_qty/'; ?>" method="post">
						<p>
                        <input type="hidden" name="kodeproduk" value="<?php echo $produks->kodeProduk ?>" />
						<input type="hidden" name="berat" value="<?php echo $produks->berat ?>" /> 
							
                            
                             
   
      <?php
      $oooo=0;
                                 foreach ($ukurin as $ukuran)
                                 { 
                                    
                                    if( sizeof($ukurin)==1)
                                    $m='checked';
                                    else
                                    $m='';
                                    
                                     
                                     ?>
                                     
                                     <script type="text/javascript">
$(document).ready(function() {
	$('#wait_').hide();
	$('#<?php echo $ukuran['id_'] ?>').change(function(){
	  $('#wait_').show();
	  $('#result_stok').hide();
      $.post("<?php echo base_url(); ?>main/chain_stok", {
		fungsi: "change_stok", 
        kodbar: "<?php echo $produks->kodeProduk?>",
		ukuran: $('#<?php echo $ukuran['id_'] ?>').val()
      }, function(response){
        $('#result_stok').fadeOut();
        setTimeout("finishAjax_kategori('result_stok', '"+escape(response)+"')", 400);
      });
    	return false;
	});
});

function finishAjax_kategori(id, response) {
  $('#wait_').hide();
  $('#'+id).html(unescape(response));
  $('#'+id).fadeIn();
}

<?php if($m=='checked') { ?>
$(document).ready(function() {
	$('#wait_').hide();
	$('#<?php echo $ukuran['id_'] ?>').ready(function(){
	  $('#wait_').show();
	  $('#result_stok').hide();
      $.post("<?php echo base_url(); ?>main/chain_stok", {
		fungsi: "change_stok", 
        kodbar: "<?php echo $produks->kodeProduk?>",
		ukuran: $('#<?php echo $ukuran['id_'] ?>').val()
      }, function(response){
        $('#result_stok').fadeOut();
        setTimeout("finishAjax_kategori('result_stok', '"+escape(response)+"')", 400);
      });
    	return false;
	});
});

function finishAjax_kategori(id, response) {
  $('#wait_').hide();
  $('#'+id).html(unescape(response));
  $('#'+id).fadeIn();
}
<?php 

//
} ?>
</script>
<?php  
 if($ukuran['stok']!=0 && $ukuran['stok']!=NULL ) { 
    $oooo++;
    ?>

                                     <input type="radio" <?php echo $m ?> id="<?php echo $ukuran['id_'] ?>" class="radioisme" name="size" value="<?php echo "ukr_".$ukuran['id_'] ?>"/>
                                    <label for="<?php echo $ukuran['id_'] ?>"> <?php echo $ukuran['ukuran'] ?> </label>
   <?php }
  
   

                                 }
                                  if($oooo==0)
   echo "<b><i>maaf, saat ini stok produk </i>".strtoupper($produks->NamaProduk) ." <i>sedang kosong.</i></b>";

      ?>
        
             
						</p>
						<div class="clearfix">
                            <div class="pull-left qty">
                                 <span id="wait_" style="display: none;">
                                 <img alt="Please Wait" src="<?php echo base_url() ?>img/ajax-loader.gif"/>
                                 </span>
                                 <span id="result_stok" style="display: none;"></span> 
                                 </div><!-- end pull-left qty -->
                           
						</div>
                           <!-- end clearfix -->
					</form>
                        <?php /* <hr>
                        <div class="row-fluid">
                            <div class="span6 decidernote">Hard to decide? Ask you friends :)</div>
                            <div class="span6 decider">
                                <a href="#"><i class="icon-facebook-circled"></i></a>
                                <a href="#"><i class="icon-twitter-circled"></i></a>
                                <a href="#"><i class="icon-gplus-circled"></i></a>
                                <a href="#"><i class="icon-pinterest-circled"></i></a>
                                <a href="#"><i class="icon-mail"></i></a>
                            </div><!-- end span6 decider -->
                        </div><!-- end row-fluid -->
                        <hr>
                        */ ?>
                        <!-- Product details -->
                        <div class="accordion" id="accordion2" style="margin-top:20px;">
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#sizing">
                                        <i class="icon-layout theme"></i> Deskripsi Produk
                                    </a>
                                </div><!-- end accordion-heading -->
                                <div id="sizing" class="accordion-body collapse in">
                                    <div class="accordion-inner">
                                        <?php echo $produks->ket; ?>
                                    </div><!-- end accordion-inner -->
                                </div><!-- end sizing -->
                            </div><!-- end accordion-group -->
                        </div><!-- end accordion -->
                    </div><!-- end details wrapper -->
				</div><!-- end span7 -->
			</div><!-- end row -->
			<div class="row">
				<div class="span12">
                	<?php /*
					<div class="cross-wrapper">
						<hr />
						<header>Wear it with</header>
						<section class="row-fluid cross-product">
							<article class="span3">
                                <div class="view view-thumb">
                                    <img src="<?php echo base_url(); ?>img/products/single-8.jpeg" alt="single-1" width="455" height="475"/>
                                    <div class="mask">
                                        <h2>$39</h2>
                                        <p>Product description Vestibulum ante ipsum primis in faucibus orci luctus.</p>
                                        <a href="product.html" class="info">View</a> <a href="checkout.html" class="info">Buy</a>
                                    </div><!-- end mask -->
                                </div><!-- end view view-thumb -->
                                <p>Sample Cross-Sell Product</p>
							</article>
							<article class="span3">
								<div class="view view-thumb">
									<img src="<?php echo base_url(); ?>img/products/single-9.jpeg" alt="single-1" width="455" height="475"/>
									<div class="mask">
										<h2>$39</h2>
					                    <p>Product description Vestibulum ante ipsum primis in faucibus orci luctus.</p>
				                        <a href="product.html" class="info">View</a> <a href="checkout.html" class="info">Buy</a>
									</div><!-- end mask -->
								</div><!-- end view view-thumb -->
								<p>Sample Cross-Sell Product</p>
							</article>
							<article class="span3">
								<div class="view view-thumb">
									<img src="<?php echo base_url(); ?>img/products/single-10.jpeg" alt="single-1" width="455" height="475"/>
									<div class="mask">
										<h2>$39</h2>
				                        <p>Product description Vestibulum ante ipsum primis in faucibus orci luctus.</p>
					                    <a href="product.html" class="info">View</a> <a href="checkout.html" class="info">Buy</a>
									</div><!-- end mask -->
								</div><!-- end view view-thumb -->
								<p>Sample Cross-Sell Product</p>
							</article>
							<article class="span3">
								<div class="view view-thumb">
									<img src="<?php echo base_url(); ?>img/products/single-11.jpeg" alt="single-1" width="455" height="475"/>
									<div class="mask">
										<h2>$39</h2>
				                        <p>Product description Vestibulum ante ipsum primis in faucibus orci luctus.</p>
				                        <a href="product.html" class="info">View</a> <a href="checkout.html" class="info">Buy</a>
									</div><!-- end mask -->
								</div><!-- end view view-thumb -->
								<p>Sample Cross-Sell Product</p>
							</article>
						</div><!-- end cross-wrapper -->
                        */ ?>
					</div><!-- end span12 -->
				</div><!-- end row -->
			</div><!-- end row -->
		</section>
</div> 