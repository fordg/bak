<div class="container">	
	<div id="flexslider" class="flexslider row">
		<ul class="slides span12">
	    	<!-- Sample slider with text caption -->
		    <li>
				<img src="<?php echo base_url(); ?>img/banner/slide-1.jpg" alt="banner-c" width="940" height="400" />
				<p class="flex-caption">
                    <strong>LEATHERMAN</strong><br />
                    You can have any text on slider, <br />and call-to-action buttons. <br /><br />
                    <a href="#" class="btn theme pink">Buy Now</a>
			    </p>
			</li>

			<li>
				<img src="<?php echo base_url(); ?>img/banner/slide-2.jpg" alt="banner-d" width="940" height="400" />
			</li>

			<!-- Sample normal slider -->
			<li>
				<img src="<?php echo base_url(); ?>img/banner/slide-3.jpg" alt="banner-e" width="940" height="400" />
			</li>

		</ul>
	</div>			
</div>
<!-- Promo Banner Option -->
<div class="container promo-option" style="display:block">
	<section class="home-panel promo">
		<div class="row-fluid">
			<article class="span4"><a href="#"><img src="<?php echo base_url(); ?>img/banner/promo_1.jpg" alt="Baby and Kids" /></a></article>
			<article class="span4"><a href="#"><img src="<?php echo base_url(); ?>img/banner/promo_2.jpg" alt="Baby and Kids" /></a></article>
			<article class="span4"><a href="#"><img src="<?php echo base_url(); ?>img/banner/promo_3.jpg" alt="Baby and Kids" /></a></article>
		</div>
	</section>	
</div>
		
<div class="container home">
	<!-- Featured section -->
	<section class="feat">
		<div class="row">
			<div class="span12">
				<h6 class="subhead theme"><strong>FEATURED ITEMS</strong></h6>
				<div class="tab-content row">
				<!-- Feat tab -->
					<div class="tab-pane active" id="feat">
                    	<?php foreach ($produks as $produk){ ?>
						<article class="span4">
							<div class="view view-thumb">
								<img src="<?php echo base_url(); ?>uploads/<?php echo $produk->GambarBesar; ?>" alt="single-1" width="455" height="475"/>
								<div class="mask">
									<h2>Rp. <?php echo $produk->harga; ?></h2>
				                   	<p><?php echo $produk->ket; ?>.</p>
				                    <a href="<?php echo base_url().'main/detail/'.$produk->kodeProduk; ?>" class="info">View</a> <!--<a href="checkout.html" class="info">Buy</a>-->
								</div><!-- end mask -->
							</div><!-- end view view-thumb -->
							<p><a href="#"><?php echo $produk->NamaProduk; ?></a></p>
						</article>
                        <?php } ?>
				  	</div><!-- end tab-pane active -->
				</div> <!-- End tab-content -->
			</div><!-- end span12 -->
		</div><!-- end row -->
	
    <?php /*
    <h6 class="subhead theme brands"><strong>DESIGNER BRANDS</strong></h6>
	<div class="tab-brand">
		<div id="flexcarousel-brands" class="flexslider">
			<ul class="slides">
				<li><img src="img/brands/branda.jpg" alt="" /></li>
				<li><img src="img/brands/brandb.jpg" alt="" /></li>
				<li><img src="img/brands/brandc.jpg" alt="" /></li>
				<li><img src="img/brands/brandd.jpg" alt="" /></li>
				<li><img src="img/brands/brande.jpg" alt="" /></li>
				<li><img src="img/brands/brandf.jpg" alt="" /></li>
				<li><img src="img/brands/brandg.jpg" alt="" /></li>
				<li><img src="img/brands/brandh.jpg" alt="" /></li>
			</ul>
		</div><!-- end flexcarousel-brands -->
	</div><!-- end tab-brand -->
	*/ ?>
	</section>
</div><!-- end container home -->