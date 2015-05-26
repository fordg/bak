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
						<h5>Daftar Member</h5>
						<div class="search">
							<form action="<?php echo base_url(); ?>admin/member/cari" method="post">
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
					<div class="table">
						<table style="width:100%">
						<thead>
								<tr>
								  <th>No</th>
								  <th>Nama Depan</th>
                                  <th>Nama Belakang</th>
                                  <th>Email</th>
                                  <th>Telepon</th>
                                  <th>Alamat 1</th>
                                  <th>Kota</th>
                                  <th>Kode Pos</th>
                                  <th>Username</th>
								  <th style="width:20px;">Actions</th>
						  </tr>
							</thead>
							<tbody>
								<tr>
                                                                <?php 
                                                                if(isset($results)) : 
                                                                    $i=1; 
                                                                foreach($results as $row) : ?>
									<td ><?php echo $i; ?></td>
									<td ><?php echo $row->NamaDepan; ?></td>
                                                                        <td ><?php echo $row->NamaBelakang; ?></td>
                                                                        <td ><?php echo $row->email; ?></td>
                                                                        <td ><?php echo $row->telepon; ?></td>
                                                                        <td ><?php echo $row->alamat1; ?></td>
                                                                        <td ><?php echo $row->kota; ?></td>
                                                                        <td ><?php echo $row->kodepos; ?></td>
                                                                        <td ><?php echo $row->username_member; ?></td>
                                                                        <td>
                                                                            <a href="<?php echo base_url().'admin/member/detail/'.$row->id_member; ?>">Detail</a>
                                                                        </td>
							  </tr>
                                                                <?php 
                                                                $i++; 
                                                                endforeach; 
                                                                endif;?>
							</tbody>
						</table>

                                            <div class="pagination">
                                            <?php echo $links; ?>
                                            </div>
					</div>
				</div>
		    </div>
			<!-- end content / right -->
		</div>
		<!-- end content -->
         