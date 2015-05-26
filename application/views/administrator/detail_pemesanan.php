<!-- content -->
		<div id="content">
			<!-- end content / left -->
			<div id="left">
				<div id="menu">
					<h6 id="h-menu-products" class="selected"><a href="#products"><span>Products</span></a></h6>
					<ul id="menu-products" class="opened">
						<li><a href="<?php echo base_url(); ?>admin/produk">Manage Products</a></li>
						<li><a href="<?php echo base_url(); ?>admin/produk/add">Add Product</a></li>
					</ul>
					<h6 id="h-menu-member"><a href="#member"><span>Member</span></a></h6>
					<ul id="menu-member" class="closed">
						<li><a href="<?php echo base_url(); ?>admin/member">Manage Member</a></li>
					</ul>
					<h6 id="h-menu-events"><a href="#events"><span>Events</span></a></h6>
					<ul id="menu-events" class="closed">
						<li><a href="">Manage Events</a></li>
						<li class="last"><a href="">New Event</a></li>
					</ul>
                    
					<h6 id="h-menu-links"><a href="#links"><span>Category</span></a></h6>
					<ul id="menu-links" class="closed">
						<li><a href="<?php echo base_url(); ?>admin/category">Manage Category</a></li>
					    <li class="last"><a href="<?php echo base_url(); ?>admin/category/add">Add Category</a></li>
					
                    	<li><a href="<?php echo base_url(); ?>admin/subkategori">Manage SubCategory</a></li>
					    <li class="last"><a href="<?php echo base_url(); ?>admin/subkategori/add">Add SubCategory</a></li>
					</ul>
                       <h6 id="h-menu-size"><a href="#size"><span>Size</span></a></h6>
					<ul id="menu-size" class="closed">
						<li><a href="<?php echo base_url(); ?>admin/size">Manage Size</a></li>
                      	<li><a href="<?php echo base_url(); ?>admin/size/add_size">Add New Size</a></li>
	
					</ul>
                    
                    <h6 id="h-menu-bank"><a href="#bank"><span>Bank</span></a></h6>
					<ul id="menu-bank" class="closed">
						<li><a href="<?php echo base_url(); ?>admin/bank/manage">Manage Bank</a></li>
                      	<li><a href="<?php echo base_url(); ?>admin/bank/add_data">Add New Bank</a></li> 
					</ul>
                    
                     <h6 id="h-menu-jasa"><a href="#jasa"><span>Ongkir</span></a></h6>
					<ul id="menu-jasa" class="closed"> 
                        <li><a href="<?php echo base_url(); ?>admin/ongkir/add_data/">Add New Ongkos kirim</a></li>
	                    <li><a href="<?php echo base_url(); ?>admin/ongkir/upload/ongkos_kirim">Upload Excel Ongkir</a></li>
	
					</ul>
                     <h6 id="h-menu-pemesanan"><a href="#pemesanan"><span>Pemesanan</span></a></h6>
					<ul id="menu-pemesanan" class="closed">
						<li><a href="<?php echo base_url(); ?>admin/pemesanan/index">Manage Pemesanan</a></li>  
	
					</ul>
                    
					<h6 id="h-menu-banner"><a href="#banner"><span>Promo Banner</span></a></h6>
					<ul id="menu-banner" class="closed">
						<li><a href="<?php echo base_url(); ?>admin/promo_banner/manage">Manage </a></li> 
					</ul>
                    
                    	<h6 id="h-menu-settings"><a href="#settings"><span>Settings</span></a></h6>
					<ul id="menu-settings" class="closed">
						<li><a href="">Manage Settings</a></li>
						<li class="last"><a href="">New Setting</a></li>
					</ul>
				</div>
				<div id="date-picker"></div>
			</div>
			<!-- end content / left -->
			<!-- content / right -->
			<div id="right">
				<!-- table -->
				<div class="box">
					<!-- box / title -->
					<div class="title">
						<h5>Detail</h5>
						<div class="search">
							<form action="<?php echo base_url(); ?>admin/wilayah/cari/kota" method="post">
								<div class="input">
									<input type="text" id="search" name="search" />
								</div>
								<div class="button">
									<input type="submit" name="submit" value="Search" />
								</div>
							</form>
						</div>
					</div>
					<!-- end box / title --> 
                        <?php echo $this->session->flashdata('message');?>
						<h5>Detail Pemesan</h5>
					<div class="table">
                    <h6>Ubah status: 
                    <?php $status=array('pemesanan','pembayaran','pembatalan') ?>
                    <?php foreach ($status as $palsu): 
                    if($palsu!=$bijilin[0]->status)
                    { ?>
                    <a onclick="return confirm('Anda Yakin untuk mengubah status?')" href="<?php echo base_url().'admin/pemesanan/update_status/'.$palsu.'/'.$bijilin[0]->kode_transaksi; ?>">[<?php echo $palsu ?>]</a> 
                    <?php  }
                    endforeach;?>
                    </h6>            
                                                       
                    <br /><br /><br />
                    
                                    
						<table style="width:750px">
                            <thead>
								<tr>
								  <th width="166" class="left">Status</th> 
                                  <td ><b><?php echo strtoupper($bijilin[0]->status); ?></b></td>
								</tr>
                                <tr>
								  <th width="26" class="left">Kode Transaksi</th> 
                                  <td ><?php echo $bijilin[0]->kode_transaksi; ?></td>
								</tr>
                                <tr>
								  <th width="26" class="left">Nama Member</th>
                                  <td ><?php echo $bijilin[0]->namamember; ?></td> 
								</tr>
                                <tr>
								  <th width="26" class="left">No Telepon</th>
                                  <td ><?php echo $bijilin[0]->telepon; ?></td> 
								</tr>
                                <tr>
								  <th width="26" class="left">Nama Penerima</th>
                                   <td ><?php echo $bijilin[0]->atas_nama; ?></td> 
								</tr> 
                                
                                <tr>
								  <th width="26" class="left">Alamat Penerima</th> 
                                   <td ><?php echo $bijilin[0]->kota." <br />".$bijilin[0]->alamat_penerima; ?></td>
								</tr> 
                                <tr>
								  <th width="26" class="left">Kode Pos</th> 
                                   <td ><?php echo  $bijilin[0]->kodepos; ?></td>
								</tr> 
                                <tr>
								  <th width="26" class="left">Servis</th>
                                  <td ><?php echo $bijilin[0]->service; ?></td> 
								</tr>
                                <tr>
								  <th width="26" class="left">Total Bayar</th> 
                                   <td ><?php echo 'Rp. '.number_format ($bijilin[0]->total_bayar,0,",",","); ?></td>
								</tr>
                                 <tr>
								  <th width="26" class="left">Total Ongkos Kirim</th> 
                                   <td ><?php echo 'Rp. '.number_format ($bijilin[0]->total_ongkir,0,",",","); ?></td>
								</tr>
                                
                                <tr>
								  <th width="26" class="left">Waktu</th> 
                                  <td ><?php echo $bijilin[0]->waktu; ?></td>
								</tr>
                                 <tr>
								  <th width="26" class="left">Catatan Member</th> 
                                  <td ><?php echo $bijilin[0]->catatan; ?></td>
								</tr>
							</thead>  
						</table> 
                        
 

                                             
					</div>
                    
                    
                    	<h5>Detail Pesanan</h5>
					<div class="table">
						<table style="width:750px">
                            <thead>
                            	<tr>
								  <th width="166" class="left">Nama Produk</th>  
								  <th width="166" class="left">Size</th>  
								  <th width="166" class="left">Qty</th>   
								  <th width="166" class="left">Harga</th> 
         	                   </tr> 
                            <?php foreach($pesannanna as $etawelah): ?>
                            <tr>
                            <td><?php echo $etawelah->namaProduk ?></td>
                            <td><?php echo $etawelah->size ?></td>
                            <td><?php echo $etawelah->qty ?></td> 
                                 <td ><?php echo 'Rp. '.number_format ($etawelah->harga,0,",",","); ?></td>
							
                            
                            </tr>
							<?php endforeach; ?>
							</thead>  
						</table> 
                        
 

                                             
					</div>
				</div>
		    </div>
			<!-- end content / right -->
		</div>
		<!-- end content -->
                