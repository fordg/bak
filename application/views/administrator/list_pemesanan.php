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
						<h5>Ukuran</h5>
						<div class="search">
							<form action="<?php echo base_url(); ?>admin/pemesanan/cari" method="post">
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
					<div class="table">
						<table style="width:550px">
<thead>
								<tr>
								  <th width="26" class="left">Kode Transaksi</th>
								  <th width="20"> Nama Member</th> 
								  <th width="20"> Nama Penerima</th> 
								  <th width="20"> waktu</th>  
								  <th width="20"> status</th>
								  <th width="20"> Ogkir</th>  
								  <th width="20"> total</th> 
								  <th colspan="50">Actions</th>
								</tr>
							</thead>
							<tbody>
								<tr>
                                                                <?php 
                                                                
                                                                    $i=1; 
                                                                foreach($tampil as $row) :  
                                                                 
                                                                 ?>
                            									<td ><?php echo $row->kode_transaksi; ?></td>
                            									<td ><?php echo $row->atas_nama; ?></td>
                                                               	<td ><?php echo $row->atas_nama; ?></td>
                            									<td ><?php echo $row->waktu; ?></td>
                                                               	<td ><b><?php echo strtoupper($row->status); ?></b></td>
                                                               	<td ><?php echo  number_format ($row->total_ongkir,0,",",",") ?></td>
                                                               	<td ><?php echo  number_format ($row->total_bayar,0,",",",") ?></td>
                                             <td width="39" class="category"><a href="<?php echo base_url().'admin/pemesanan/detail/'.$row->kode_transaksi; ?>">Detail</a></td>
							      </tr>
                                                                <?php 
                                                                $i++; 
                                                                endforeach; 
                                                                ?> 
                                                              
							</tbody>
						</table>
                          <div class="halaman">Halaman : <?php echo $halaman;?></div>
 

                                             
					</div>
				</div>
		    </div>
			<!-- end content / right -->
		</div>
		<!-- end content -->
                