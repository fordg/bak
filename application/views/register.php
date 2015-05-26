<div class="container">
	<section class="page">
		<div class="row">
			<header class="span12 prime">
				<h3>Register</h3>
			</header>
		</div>

		<div class="wrap">
			<div class="row-fluid">
				<div class="span12">
                	<ul class="nav nav-tabs" id="myTab">
						<li class="active"><a href="#login"><i class="icon-lock"></i>Register</a></li>
					</ul>
                	<div class="tab-content">
					<div class="tab-pane active" id="register">
                    	<?php /*?><?php echo $messages; ?><?php */?>
						<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>register/add_proccess">
							<div class="control-group">
								<label class="control-label" for="inputEmail">Nama Depan</label>
								<div class="controls">
									<input type="text" id="inputEmail" placeholder="First Name" name="namadepan">
								</div><!-- end controls -->
							</div><!-- end control-group -->
							<div class="control-group">
								<label class="control-label" for="inputPassword">Nama Belakang</label>
								<div class="controls">
									<input type="text" id="inputEmail" placeholder="Last Name" name="namabelakang">
								</div><!-- end controls -->
							</div><!-- end control-group -->
                            <div class="control-group">
								<label class="control-label" for="inputPassword">Email</label>
								<div class="controls">
									<input type="text" id="inputEmail" placeholder="Email" name="email">
								</div><!-- end controls -->
							</div><!-- end control-group -->
                            <div class="control-group">
								<label class="control-label" for="inputPassword">No. Telepon</label>
								<div class="controls">
									<input type="text" id="inputEmail" placeholder="Telephone" name="telepon">
								</div><!-- end controls -->
							</div><!-- end control-group -->
                            <div class="control-group">
								<label class="control-label" for="inputPassword">Alamat</label>
								<div class="controls">
									<input type="text" id="inputEmail" placeholder="Alamat" name="alamat1">
								</div><!-- end controls -->
							</div><!-- end control-group -->
                            <div class="control-group">
								<label class="control-label" for="inputPassword">Kota</label>
								<div class="controls">
									<input type="text" id="inputEmail" placeholder="City" name="kota">
								</div><!-- end controls -->
							</div><!-- end control-group -->
                            <div class="control-group">
								<label class="control-label" for="inputPassword">Kode Pos</label>
								<div class="controls">
									<input type="text" id="inputEmail" placeholder="Post Kode" name="kodepos">
								</div><!-- end controls -->
							</div><!-- end control-group -->
                            <div class="control-group">
								<label class="control-label" for="inputPassword">Username</label>
								<div class="controls">
									<input type="text" id="inputEmail" placeholder="Username" name="username">
								</div><!-- end controls -->
							</div><!-- end control-group -->
                            <div class="control-group">
								<label class="control-label" for="inputPassword">Password</label>
								<div class="controls">
									<input type="password" id="inputPassword" placeholder="Password" name="password">
								</div><!-- end controls -->
							</div><!-- end control-group -->
                            <div class="control-group">
								<label class="control-label" for="inputPassword">Confirm Password</label>
								<div class="controls">
									<input type="password" id="inputPassword" placeholder="Confirm Password" name="con_password">
								</div><!-- end controls -->
							</div><!-- end control-group -->
							<div class="control-group">
								<div class="controls">
									<button type="submit" class="btn theme">Register</button>
								</div><!-- end controls -->
							</div><!-- end control-group -->
						</form>
					</div><!-- end tab-pane active -->
                    </div>
				</div><!-- end span12 -->
			</div>
		</div>
	</section>
</div>