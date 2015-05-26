<?php echo $validate ?>
<script type="text/javascript">
$(document).ready(function() {
	$('#wait_jasa_pengiriman').hide();
	$('#id_jasa_pengiriman').change(function(){
	  $('#wait_jasa_pengiriman').show();
	  $('#result_jasa_pengiriman').hide();
      $.post("<?php echo base_url(); ?>/admin/jasa/chain_ongkos_kirim", {
		fungsi: "change_paket_jasa", 
		id_jasa_pengiriman: $('#id_jasa_pengiriman').val()
      }, function(response){
        $('#result_jasa_pengiriman').fadeOut();
        setTimeout("finishAjax_ongkir('result_jasa_pengiriman', '"+escape(response)+"')", 400);
      });
    	return false;
	});
});

function finishAjax_ongkir(id, response) {
  $('#wait_jasa_pengiriman').hide();
  $('#'+id).html(unescape(response));
  $('#'+id).fadeIn();
}

$(document).ready(function() {
	$('#wait_provinsi').hide();
	$('#idprovinsi').change(function(){
	  $('#wait_provinsi').show();
	  $('#result_provinsi').hide();
      $.post("<?php echo base_url(); ?>/admin/jasa/chain_ongkos_kirim", {
		fungsi: "change_provinsi", 
		idprovinsi: $('#idprovinsi').val()
      }, function(response){
        $('#result_provinsi').fadeOut();
        setTimeout("finishAjax_provinsi('result_provinsi', '"+escape(response)+"')", 400);
      });
    	return false;
	});
});

function finishAjax_provinsi(id, response) {
  $('#wait_provinsi').hide();
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
						<h5>Tambah Kategori</h5>
						<!--div class="search">
							<form action="<?php echo base_url(); ?>admin/category/cari" method="post">
								<div class="input">
									<input type="text" id="search" name="search" />
								</div>
								<div class="button">
									<input type="submit" name="submit" value="Search" />
								</div>
							</form>
						</div-->
					</div>
					<!-- end box / title -->
                    <?php echo $this->session->flashdata('message');?>
                                        <div class="table">
                    <?php echo form_open(base_url().'admin/jasa/tambah_'); ?>
                    <table style="width:450px">
							<thead>
								<tr>
									<th colspan="2" class="left">Administrator Information Update</th>
								</tr>
							</thead>
							<tbody>
                             <tr> 
                            <td>Nama Jasa Pengiriman</td>
                            <td>
                            <select id="id_jasa_pengiriman">
                             <option value="0" disabled="disabled" selected="selected">-Pilih Jasa Pengiriman-</option>
                             <?php foreach ($jasa_pengiriman as $value) {?>
                             <option value="<?php echo $value['id_jasa_pengiriman']; ?>">
							<?php echo $value['nama_jasa_pengiriman'] ?>
                            </option>
                            <?php } ?>
                            </select> 
                            </td>
                            </tr>
                            
                              
                              <tr> 
                            <td>Nama Paket Jasa</td>
                            <td>
                                <span id="wait_jasa_pengiriman" style="display: none;">
                                 <img alt="Please Wait" src="<?php echo base_url() ?>img/ajax-loader.gif"/>
                                 </span>
                                 <span id="result_jasa_pengiriman" style="display: none;"></span> 
                            </td>
                            </tr>
                            
                             <tr>
                            <td>Nama Provinsi</td>
                            <td>
                            <select id="idprovinsi">
                             <option value="0" disabled="disabled" selected="selected">-Pilih Provinsi-</option>
                             <?php foreach ($prov as $value) {?>
                             <option value="<?php echo $value['idprovinsi']; ?>">
							<?php echo $value['namaprovinsi'] ?>
                            </option>
                            <?php } ?>
                            </select> 
                            </td>
                            </tr>
                             
                              <tr> 
                            <td>Nama Kota</td>
                            <td>
                                <span id="wait_provinsi" style="display: none;">
                                 <img alt="Please Wait" src="<?php echo base_url() ?>img/ajax-loader.gif"/>
                                 </span>
                                 <span id="result_provinsi" style="display: none;"></span> 
                            </td>
                            </tr>
								<tr>
									<td width="219" class="title">Biaya</td>
								  <td width="219" class="price" style="text-align:left;">
								  	<?php echo form_input(array('id'=>'biaya','name'=>'biaya_ongkos_kirim','size'=>'40')); ?>                                  </td>
						 <input type="hidden" name="tabel" value="paket_jasa" />
                         	  </tr>
								<tr>
                                	<tr>
									<td width="219" class="title">Lama Pengiriman</td>
								  <td width="219" class="price" style="text-align:left;">
								  	<?php echo form_input(array('id'=>'lama','name'=>'lama_pengiriman','size'=>'20')); ?>    hari                                </td>
						 <input type="hidden" name="tabel" value="ongkos_kirim" />
                         	  </tr>
								<tr>
									<td colspan="2" class="title" style="text-align:center"> 
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