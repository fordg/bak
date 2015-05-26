<div class="container">
<section class="page">
	<div class="row">
		<div class="span12">
			<!-- Replace data-center with your address -->
			<div class="gmap" id="map" data-center="Bandung" data-zoom="15"></div>
		</div><!-- end span12 -->
	</div><!-- end row -->
	<div class="row address">
		<div class="span4">
			<div class="wrap contactform">
				<address class="row-fluid">
					<div class="pull-left clabel"><i class="icon-phone"></i></div>
					<div class="pull-left cdata">+628999903407</div>
				</address>
				<address class="row-fluid">
					<div class="pull-left clabel"><i class="icon-user"></i></div>
					<div class="pull-left cdata">76372E43</div>
				</address>
				<address class="row-fluid">
					<div class="pull-left clabel"><i class="icon-chart-pie"></i></div>
					<div class="pull-left cdata"><a href="#">09.00 - 17.00 <br />(Senin - Sabtu)</a></div>
				</address>
			</div><!-- end wrap contactform -->
		</div><!-- end span4 --> 
		<div class="span8">
			<div class="row-fluid">
				<form action="<?php echo base_url(); ?>contact/add_proccess" method="post" class="wrap contactform">
				<div class="row-fluid">
					<div class="span12" style="margin-left:10px;">
						<label for="inputPassword">Nama Depan</label>
						<input type="text" id="inputEmail" placeholder="First Name" name="namadepan">
					</div><!-- end span12 -->
                    <div class="span12">
						<label for="inputPassword">Nama Belakang</label>
						<input type="text" id="inputEmail" placeholder="Last Name" name="namabelakang">
					</div><!-- end span12 -->
                    <div class="span12">
						<label for="inputPassword">Email</label>
						<input type="text" id="inputEmail" placeholder="Email" name="email">
					</div><!-- end span12 -->
                    <div class="span12">
						<label for="inputPassword">No Telepon</label>
						<input type="text" id="inputEmail" placeholder="Telephone" name="telepon">
					</div><!-- end span12 -->
                    <div class="span12">
						<label for="inputPassword">Pesan</label>
						<textarea name="comment" id="" rows="5"></textarea>
					</div><!-- end span12 -->
					<p  style="margin-left:10px;"><input type="submit" class="btn" value="Submit"/></p>
				</div><!-- end span12 -->
				</form>	
			</div><!-- end row-fluid -->
		</div><!-- end span8 -->
	</div><!-- end row address -->
</section>
</div>