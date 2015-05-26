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
                         <td style="border:#f2f2f2 1px solid;background:#f2f2f2;">Kode Transaksi</td>
                         <td style="border:#f2f2f2 1px solid;background:#f2f2f2;">Atas Nama</td>
                         <td style="border:#f2f2f2 1px solid;background:#f2f2f2;">Status</td> 
                         <td style="border:#f2f2f2 1px solid;background:#f2f2f2;">Alamat Pengiriman</td>
                         <td style="border:#f2f2f2 1px solid;background:#f2f2f2;">Kode Pos</td>
                         <td style="border:#f2f2f2 1px solid;background:#f2f2f2;">Total Pesanan</td>
                         <td style="border:#f2f2f2 1px solid;background:#f2f2f2;">Total Ongkos kirim</td>
                         <td style="border:#f2f2f2 1px solid;background:#f2f2f2;">Servis</td> 
                         <td style="border:#f2f2f2 1px solid;background:#f2f2f2;">Detail</td>
                 	</tr>
                 
                    <?php foreach($apa_aja_sih_belanjaa_orang_kami_selama_ini as $eta): ?>
                    <tr>
                        <td valign="top"><?php echo strtoupper($eta->kode_transaksi) ?></td>
                        <td valign="top"><?php echo $eta->atas_nama ?></td> 
                        <td valign="top"><b><?php echo strtoupper($eta->status) ?></b></td> 
                        <td valign="top"><?php echo $eta->kota." <br />".$eta->alamat_penerima ?></td>
                        <td valign="top"><?php echo $eta->kodepos ?></td>
                        <td valign="top"><?php echo 'Rp. '. number_format ($eta->total_bayar,0,",",",") ?></td>
                        <td valign="top"><?php echo 'Rp. '. number_format ($eta->total_ongkir,0,",",",") ?></td>
                        <td valign="top"><?php echo $eta->service ?></td>
                        <td valign="top">
                        	<a href="<?php echo base_url()."account/detail_pesanan/".$eta->kode_transaksi; ?>">Detail Pesanan</a>
						</td>
                    
                    </tr>
                    <?php endforeach; ?>
                 </table>
                    </div>
				</div><!-- end span4 -->
			</div>
		</div>
	</section>
</div>