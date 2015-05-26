<div class="container">
	<section class="order">
	<div class="row standard">
		<header class="span12 prime">
			<h3>Your Cart</h3>
		</header>
	</div><!-- end order -->
	<div class="row cart">
		<div class="span12">
			<div class="wrap-table">
                    <?php  $eujsd=$this->session->flashdata('produk_telah_payu');

                                 if($eujsd!=FALSE){
                          ?>
                          
                          <div style="border: 1px solid #ec3000;background: #ec3970;color: #fff;padding: 10px;"> 
                          <h3>kami mohon maaf</h3>
                          Beberapa saat yang lalu, produk yang anda inginkan telah terjual
                          dengan rincian:
                         <b>
                         <ol>
                           <?php
                           foreach ($eujsd as $sjd)
                           {
                            echo "<li><ul type='disc'>";
                                echo "<li>Nama Produk: ".$sjd['nama']."</li>";
                                echo "<li>Ukuran: ".$sjd['size']."</li>";
                                echo "<li>Sisa Stok: ".$sjd['qty']."</li>";
                                
                            echo "</ul></li>";
                           }
                           
                            ?>
                         </ol>
                         </b>
                         
                         
                          
                          </div>
                          <?php  } ?>
            	<form action="<?php echo base_url().'cart/update_cart'; ?>" method="post"">
			
				<table class="table">
					<thead>
						<tr>
							<td width="60%">Item</td>
							<td width="10%">Ukuran</td>
							<td width="10%">Berat /pcs</td>
							<td width="10%">Harga</td>
							<td width="10%">Jumlah</td>
							<td width="10%">Sub Total</td>
						</tr>
					</thead>
					<tbody>
                    	<?php
            	            $tolber=0;
                            
                            foreach ($cart as $items): 
                     
						?>
						<tr>
							<td>
                                <div class="cart-img pull-left hidden-phone">
                                	<img src="<?php echo base_url().'uploads/thumb/'.$items['gambar']; ?>" width="72" height="72" />
                                </div>
                                <div class="item pull-left">
                                    <span>
                                    
                                        <button class="icon-cancel-circled" style="border: none;background:transparent;" type="submit" name="kirangan_sauetik"></button> 
                                        <a href="#"><?php echo $items['name'] ?></a> 
                                        <a href="#"><i class="icon-remove-sign"></i></a>
                                        <input type="hidden" name="rowid" value="<?php echo $items['rowid'] ?>" />                                        
                                    </span>
                                </div><!-- end item pull-left -->
							</td>
							<td><i> <?php 
                            
                              $ggg=$this->mproduk->ukurannya_adalah(substr($items['size'],4));
                             echo $ggg->ukuran_produk; ?></i></td>
							<td><i> <?php echo ($items['berat']); ?></i></td>
                            <?php $tolber=$tolber + ($items['berat']*$items['qty']); ?>
							<td><i>Rp. <?php echo  number_format ($items['price'],0,",",","); ?></i></td>
							<td>
                            <input type="hidden" name="_qty" value="<?php echo $items['qty']?>" />
                            <input type="hidden" name="kodebarang" value="<?php echo $items['id']?>" />
                            <input type="hidden" name="size" value="<?php echo $items['size']?>" />
                             <select name="qty" style="width: 60px;">
                            <?php for($i=$items['qty'];$i>0;$i--) 
                           echo  "<option value='$i'>$i</option>";
                            ?>
                            </select>
                            </td>
							<td><strong>Rp. <?php echo number_format ($items['subtotal'],0,",",","); ?></strong></td>
						</tr>
                                    </form>
                        <?php endforeach; ?>
                        
                        </table>
					</tbody>
				<div class="row-fluid cart-pay">
					<div class="span6 cart-checkout">
                        <?php
                        	$uri_isvalideted = base_url('checkout/go');
                            $uri_notvalidated = base_url('checkout');
                        ?>
						<a href="<?php if($this->session->userdata('username_member') == null){ echo $uri_notvalidated; }else{ echo $uri_isvalideted; } ?>">
                        <b class="btn theme"><i class="icon-check"></i>Check Out</b>
                        <br />
                        
                        </a>
                        
                        
                    </div><!-- end span6 cart-checkout -->
				</div><!-- end row-fluid cart-pay --> 
                <table style="float: right;">
                           <tr>
                              <td>Total Harga</td>
                              <th>Rp. <?php echo number_format ($this->cart->total(),0,",",",") ?></th>
                           </tr>
                           <tr>
                              <td>Total Berat</td>
                              <th><?php echo $tolber ?> KG</th>
                           </tr>
                        </table>
                       		
			</div><!-- end wrap-table -->
		</div><!-- end span12 -->
	</div><!-- end row cart -->
	</section>
</div>