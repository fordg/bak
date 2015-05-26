<div class="container">
	<section class="page">
		<div class="row">
			<header class="span12 prime">
				<h3>Transaksi</h3>
			</header>
		</div> 
			
		<div class="wrap">
			<div class="row-fluid">
				<div class="span10">
                	<div id="pinggir">
                    
    <script type='text/javascript' src='<?php echo base_url() ?>js/1.8.2.js'></script>
    <script type="text/javascript" src="<?php echo base_url() ?>js/jquery-ui.js"></script> 
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui-timepicker-addon.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui-sliderAccess.js"></script> 
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery-ui.css" type="text/css"/>
    
        <link id="color" rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery.validate.css" /> 
	    <script src="<?php echo base_url(); ?>js/jquery.validate.js" type="text/javascript"></script>
	
		<script type="text/javascript">
			
			$(function(){
			 	 
$('#slider_example_2').datetimepicker({
	timeFormat: 'HH:mm:ss',
	stepHour: 1,
	stepMinute: 1,
	stepSecond: 1
}); 
			});
		
		</script> 
        <?php echo $validate ?>
                <form action="<?php echo base_url()."account/proses_transaksi" ?>" method="post">
                <table>
                <tr><td>Kode Transaksi</td> <td><input type="text" name="kode_transaksi" id="kodet" /></td></tr>                
                <tr><td>Total Bayar</td> <td><input type="text" name="total_pembayaran" id="tot" /></td></tr>                
                <tr><td>No Rekening Anda</td> <td><input type="text" name="norekening" id="nomor" /></td></tr> 
                <tr><td>Transfer Dari</td> <td><input type="text" name="transfer_dari" id="dari" placeholder="contoh: BNI" /></td></tr> 
                <tr><td>Transfer Ke</td>
                <td><select name="transfer_ke" id="kemana">
                <option value="0" selected="" disabled="">Pilih Bank</option>
                
                <?php
                foreach($daftar_bank as $bank_napi)
                {
                    echo "<option vaue='$bank_napi->idbank'>".strtoupper($bank_napi->namabank) ." - ". $bank_napi->norekening ."</option>";
                }
                ?>
                </select></td>
                
                </tr>               
                <tr><td>Waktu transfer</td>
              <td><input name="waktu_pembayaran" type="text" id="slider_example_2"/></td> </tr>
                <tr><td colspan="2"><input type="submit" value="simpan" /></td></tr>
                </table>
                
                </form>
                
                    </div>
				</div><!-- end span4 -->
			</div>
		</div>
	</section>
    
</div>