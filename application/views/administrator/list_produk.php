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
				<h5>Daftar Produk</h5>
				<div class="search">
					<form action="<?php echo base_url(); ?>admin/produk/cari" method="post">
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
				<table style="width:80%">
				<thead>
                        <tr>
                          <th>No</th>
                          <th>Kode Produk</th>
                          <th>Kategori</th> 
                          <th>Nama Produk</th>
                          <th>Harga</th> 

                          <th>Ukuran</th>  
                          <th>Stok</th> 
                          <th colspan="2">Actions</th>
                        </tr>
					</thead>
					<tbody>
                        <tr>
                            <?php                                                                
                            	$i=1;   
                            	foreach($hasil as $row) : 
                            ?>
							<td><?php echo $i; ?></td>
							<td><?php echo $row['kodeProduk']; ?></td>
                            <td>
								<?php echo  $row['namaKategori']; ?><br />
                                <?php if($row['idsubkategori']>0)
                                {
                                    $aisjldanshjasjl= $this->msubkategori->get_id($row['idsubkategori']);
                                    echo " <br /><i>".$aisjldanshjasjl->namasubkategori."</i>";
                                }
                                ?>
                        	</td>
                            <td><?php echo $row['NamaProduk']; ?></td>
                            <td><?php echo $row['harga']; ?></td>  
                            <td colspan="2" > 
                            	<?php 
                                	$stok= $this->mproduk->berapakah_stoknya($row['kodeProduk']);
                                    echo "<table >";
                                    foreach($stok as $itu)
                                    {
                                        echo "<tr><td >".$itu['ukuran'].'</td> <td style="border-right:none">'.$itu['stok'].'</td></tr>';
									}
                                    echo "</table>";
								?>
                    		</td>
							<td ><a href="<?php echo base_url()."admin/produk/update/".$row['kodeProduk']; ?>">Update</a></td>
							<td ><a href="javascript:confirmDelete('<?php echo base_url().'admin/produk/delete/'.$row['kodeProduk']; ?>')">Delete</a></td>
						</tr>
						<?php 
                    		$i++; 
							endforeach;
						?>
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
         