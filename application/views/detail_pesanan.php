<div class="container">
	<section class="page">
		<div class="row">
			<header class="span12 prime">
				<h3>List Order</h3>
			</header>
		</div>
                          <?php echo $this->session->flashdata('message');?>
			
		<div class="wrap">
			<div class="row-fluid">
				<div class="span12">
                 <div id="pinggir">
				 <table width="940" style="margin-left:-20px;border:#f2f2f2 1px solid;font-size:13px;">
                     <tr>
                         <td style="border:#f2f2f2 1px solid;background:#f2f2f2;">Nama Produk</td>
                         <td style="border:#f2f2f2 1px solid;background:#f2f2f2;">Quantity</td>
                         <td style="border:#f2f2f2 1px solid;background:#f2f2f2;">Size</td> 
                         <td style="border:#f2f2f2 1px solid;background:#f2f2f2;">Harga</td>
                 	</tr>
                     <?php foreach($apa_aja_sih_belanjaa_orang_kami_selama_ini as $eta): ?>
                    <tr>
                        <td valign="top"><?php echo strtoupper($eta->namaProduk) ?></td>
                        <td valign="top"><?php echo $eta->qty ?></td> 
                        <td valign="top"><b><?php echo ($eta->size) ?></b></td> 
                        <td valign="top">Rp. <?php echo number_format ($eta->harga,0,",",",") ?></td> 
                    
                    </tr>
                    <?php endforeach; ?>
                 </table>
                    </div>
				</div><!-- end span4 -->
			</div>
		</div>
	</section>
</div>