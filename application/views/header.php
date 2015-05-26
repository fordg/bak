<div class="container welcome" style="width:100%;">
	<div class="row-fluid pink bodas">
		<div style="padding-left:209px; float:left; padding-top:10px; padding-bottom:10px;" class="bodas">
			Selamat datang <a href="<?php echo base_url(); ?>account"><?php echo $this->session->userdata('username_member'); ?></a>, 
			<?php 
            	if($this->session->userdata('username_member') == null){
            ?>
            	<a href='<?php echo base_url(); ?>login'>Login</a>
            <?php
                }else{
            ?>
            	<a href='<?php echo base_url(); ?>main/logout'>Logout</a>
            <?php
                }
            ?>
		</div>
        <div style="padding-right:209px; float:right; padding-top:10px; padding-bottom:10px;">
            <!-- Cart Updates -->
            <div class="counter">
                <a href="<?php echo base_url(); ?>cart"><i class="icon-basket"></i> Keranjang belanja </a> : <?php /*?><span class="theme"><?php echo $total_item_in_cart ?></span><?php */?> || 
                <?php
                	$uri_isvalideted = base_url('checkout/go');
                    $uri_notvalidated = base_url('checkout');
                ?>
                <a href="<?php if($this->session->userdata('username_member') == null){ echo $uri_notvalidated; }else{ echo $uri_isvalideted; } ?>">Checkout</a>
            </div>
            
            <div class="counter">
            </div>
                        
            <!-- Bubble Cart Item -->
            <div class="cartbubble">	
                <div class="arrow-box">				
                    <!-- Item 1 -->
                    <div class="clearfix">
                        <a href="#">Sample Tshirt Stripes...</a> <span class="theme pull-right">$55</span>
                    </div>			
                    <!-- Item 2 -->
                    <div class="clearfix">
                        <a href="#">Sample Dress in cart</a> <span class="theme pull-right">$73</span>
                    </div>		
                    <!-- Item 3 -->
                    <div class="clearfix">
                        <a href="#">Sample Socks in cart</a> <span class="theme pull-right">$11</span>
                    </div>
                    <hr />
                    <!-- Total -->
                    <div class="clearfix">
                        TOTAL <span class="theme pull-right">$139</span>
                    </div>
                    <hr />
                    <div class="clearfix">
                        <a href="javascript:void(0)" id="closeit">Close</a>
                        <a href="checkout.html" class="btn theme btn-mini pull-right">Checkout</a>
                    </div><!-- end Total-->
                </div><!-- end Cartbuble-->			
            </div><!-- end pull-right cart tright -->
	</div><!-- end row-fluid -->
</div><!-- end container welcome -->
</div>

<div class="container head">
	<div class="row">
		<div class="span12 clearfix">
			<div class="top row">
				<div class="span8 logo text" style="display:none"><a href="<?php echo base_url(); ?>main">BabyandKids-Shop</a></div>
				<div class="span8 logo image">
                	<a href="<?php echo base_url(); ?>main">
                		<img src="<?php echo base_url(); ?>img/logo4.png" />
                	</a>
                </div>
				<div class="cart span4">
					<form action="#" class="topsearch">
						<input type="search" class="top-search" placeholder="Search"/>
						<button type="submit"><i class="icon-search"></i></button>
					</form>
				</div>
			</div>	
		</div>
	</div>
</div>
		
<div class="container">
	<div class="row">		
		<div class="span12">
			<nav class="horizontal-nav full-width">
			<ul class="nav" id="nav">
			
                <?php
                
                $ka=$this->mkategori->tampil();
                $warna=array("hejo","mermud","biru","oren");
                 $i=0;
                foreach($ka as $kkk)
                {
                if($i%4==0)
                $i=0;
                
                $hum=$this->mkategori->tampil2($kkk->id_kategori);
                 ?>
                    
                 <li class="<?php echo $warna[$i] ?>">
                     <a href="<?php echo base_url(); ?>category/detail_kategori/<?php echo $kkk->id_kategori; ?>"><?php echo $kkk->namaKategori ?></a>
                     <?php if (sizeof($hum)>0) { ?>
                     	<ul class="nav">
						<?php foreach ($hum as $humu) { ?>
                        <li>
                        	<a href="<?php echo base_url(); ?>category/detail_kategori/<?php echo $kkk->id_kategori; ?>/<?php echo $humu['idsubkategori'] ?>">
                            <?php echo $humu['namasubkategori']; ?>
                            </a>
                        </li>
                        <?php } ?>
					</ul> 
                      <?php } ?>
                 </li> 
  
  
                <?php
                $i++;
                }
                ?>
                
                
				<!--<li class="biru"><a href="#">Features</a></li>-->
				<li class="oren">
					<a href="<?php echo base_url(); ?>how_to_order">How to Order</a>
					<!--<ul class="nav">
						<li><a href="blog-right-sidebar.html">blog right sidebar</a></li>
						<li><a href="blog-left-sidebar.html">blog left sidebar</a></li>
						<li><a href="post-right-sidebar.html">post right sidebar</a></li>
						<li><a href="post-left-sidebar.html">post left sidebar</a></li>
					</ul>-->
				</li>
				<li class="mermud"><a href="<?php echo base_url(); ?>contact">Contact</a></li>
			</ul>
			</nav>
		</div>
	</div>
</div>
		
