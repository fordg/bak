<script>
        $(document).ready(function() {
                                  $('#wait_1').hide();
                                  $('#drop_1').ready(function(){
                                  $('#wait_1').show();
                                  $('#result_1').hide();
                                  $.post("<?php echo base_url().'admin/produk/drop_1' ?>", { 
                                        pariabel: $('#drop_1').val(),
                                        pariabel_2: "<?php echo $prd->kodeProduk ?>"
                              }, function(response){
                                $('#result_1').fadeOut();
                                setTimeout("finishAjax('result_1', '"+escape(response)+"')", 400);
                              });
                                return false;
                                });
                        });

                        function finishAjax(id, response) {
                          $('#wait_1').hide();
                          $('#'+id).html(unescape(response));
                          $('#'+id).fadeIn();
                        }
</script>
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
						<h5>Account</h5>
						<div class="search">
							<form action="#" method="post">
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
                    <?php echo form_open_multipart('admin/produk/update_proccess/'.$prd->kodeProduk); ?>
                    <table style="width:500px">
							<thead>
								<tr>
									<th colspan="2" class="left">Administrator Information Update</th>
								</tr>
							</thead>
							<tbody>
                            <?php 
                            
                            ?>
                                                            <tr>
									<td width="219" class="title">Kode Produk</td>
								  	<td width="219" class="price" style="text-align:left;">
								  		<?php echo form_input(array('name'=>'kodeproduk','size'=>'40','value'=>$prd->kodeProduk)); ?>                                  
                                                                        </td>
							  	</tr>
                                  <tr>
                                <td>Stok</td>
                                <td>
                              <?php 
//                              var_dump($eta);
                              $xx=0;
                              foreach ($size as $size_) 
                              {
                                
                            echo form_input(array('name'=>'ukr_'.$size_['id'],'size'=>'10', 'value'=>$eta [$xx]['stok']))."ukuran ".$size_['ukuran_produk']."<br />";
                                $xx++;
                                }
                                       ?>                                                   
                                </td>
                                </tr>
								<tr>
									<td width="219" class="title">Nama Kategori</td>
								  	<td width="219" class="price" style="text-align:left;">
                                    
								  		<div class="select">
                                                                                        <select name="id_kategori" id="drop_1">
                                                                                            <option value="<?php echo $prd->id_kategori ?>"><?php echo $prd->namaKategori ?></option>
                                                                                            <?php foreach ($cats as $value) {?>
                                                                                            <option value="<?php echo $value->id_kategori ?>"><?php echo $value->namaKategori ?></option>
                                                                                             <?php } ?>
                                                                                        </select>
                                                                                        
                                                                                    <span id="wait_1" style="display: none;">
                                                                                        <img alt="Please Wait" src="<?php echo base_url()."img/"; ?>ajax-loader.gif"/>
                                                                                    </span>
                                                                                    <span id="result_1" style="display: none;"></span> 
                                                                                </div>                                 
                                                                        </td>
							  	</tr>
                                <tr>
									<td width="219" class="title">Jenis Kelamin</td>
								  	<td width="219" class="price" style="text-align:left;">
								  		<div class="select">
                                                                                        <select id="select" name="id_human">
                                                                                            <option value="" disabled="true">--Choose One--</option>
                                                                                            <?php foreach ($human as $value) {?>
                                                                                                <option value="<?php echo $value->id_human ?>"><?php echo $value->namaHuman ?></option>
                                                                                                <?php } ?>
                                                                                        </select>
                                                                                </div>                                 
                                                                        </td>
							  	</tr>
                                                                <tr>
									<td width="219" class="title">Nama Produk</td>
								  	<td width="219" class="price" style="text-align:left;">
								  		<?php echo form_input(array('name'=>'namaproduk','size'=>'40','value'=>$prd->NamaProduk)); ?>                                  
                                                                        </td>
							  	</tr>
                                                                    <tr>
									<td width="219" class="title">Harga</td>
								  	<td width="219" class="price" style="text-align:left;">
								  		<?php echo form_input(array('name'=>'harga','size'=>'40','value'=>$prd->harga)); ?>                                  
                                                                    </td>
                                                                    </tr>
                                                                     <tr>
									<td width="219" class="title">Berat</td>
								  	<td width="219" class="price" style="text-align:left;">
								  		<?php echo form_input(array('name'=>'berat','size'=>'20','value'=>$prd->berat)); ?>                                  
                                                                  .KG  </td>
                                                                    </tr>
                                               
                                                                <tr>
									<td width="219" class="title">Gambar</td>
								  	<td width="219" class="price" style="text-align:left;">
                                                                            
								  		<input type="file" name="userfile" size="20" />    
                                                      
                                                                        </td>
							  	</tr>
                                                               
                                                                <tr>
									<td width="219" class="title">Keterangan</td>
								  	<td width="219" class="price" style="text-align:left;">
								  		<div class="textarea textarea-editor">
                                                                                <textarea id="textarea" name="ket" cols="50" rows="5" class="editor"><?php echo $prd->ket; ?></textarea>
                                                                                </div>                                  
                                                                        </td>
							  	</tr>
							 
							</tbody>
						</table>

                    <?php echo form_close(); ?>
				  </div>
			  </div>
				<!-- end table -->
			  <!-- messages -->
			  <!-- end messages -->
			  <!-- forms -->
			  <!-- end forms -->
			  <!-- box / left --><!-- end box / left -->
				<!-- box / right -->
              <!-- end box / right -->
		    </div>
			<!-- end content / right -->
		</div>
		<!-- end content -->