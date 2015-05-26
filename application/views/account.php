<div class="container">
	<section class="page">
		<div class="row">
			<header class="span12 prime">
				<h3>Personal Informations</h3>
			</header>
		</div>
                          <?php  $u=$this->session->flashdata('checkout_berhasil');
                                 if($u!=FALSE){
                          ?>
                          
                          <div style="border: 1px solid #ec3000;background: #ec3970;color: #fff;padding: 10px;"> 
                          <h3>Terima kasih telah melakukan pemesanan</h3>
                           Kode Pemesanan anda adalah <b><?php echo $u ?></b>
                          <br /><b>Segeralah melakukan transfer ke daftar akun bank milik kami:<br />
                         
                          <?php foreach($daftar_bank as $g)
                          {
                            echo '<table style="margin-left: 50px;margin-bottom:30px;margin-top:10px">';
                            echo " <tr><td>Nama Bank</td><td>: ".$g->namabank."</td></tr> "; 
                            echo " <tr><td>No Rekeneing</td><td>: ".$g->norekening."</td></tr> "; 
                            echo " <tr><td>Atas Nama</td><td>: ".$g->atasnama."</td></tr> "; 
                            echo '</table>';
                          } 
                          ?>
                          </b>
                          
                          <h6>Cek Email anda, untuk keterangan lebih lanjut</h6>
                          
                          </div>
                          <?php  } ?>
			
		<div class="wrap">
			<div class="row-fluid">
				<div class="span4">
                	<div id="pinggir">
					<ul>
						<li><a href="<?php echo base_url(); ?>view_account/detail/"><i class="icon-caret-right"></i> Lihat Akun</a></li>
                        <li><a href="<?php echo base_url(); ?>account/history_order"><i class="icon-caret-right"></i> Daftar Pesanan Anda</a></li>
                        <!-- <li><a href="<?php echo base_url(); ?>account/transaksi"><i class="icon-caret-right"></i> Transaksi</a></li> -->
                        <li><a href="<?php echo base_url(); ?>edit_account/update/"><i class="icon-caret-right"></i> Edit Informasi Akun Anda</a></li>
						<li><a href="<?php echo base_url(); ?>edit_username/update/<?php echo $this->session->userdata('memberid'); ?>"><i class="icon-caret-right"></i> Merubah Password Anda</a></li>
					</ul>
                    </div>
				</div><!-- end span4 -->
			</div>
		</div>
	</section>
</div>