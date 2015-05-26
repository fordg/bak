<div class="container">
	<!-- Login Section -->
	<section class="login">
	<div class="row standard">
		<header class="span12 prime">
			<h3>Account</h3>
		</header>
	</div>

	<div class="wrap">
		<div class="row-fluid">
			<div class="span6">
    			<ul class="nav nav-tabs" id="myTab">
					<li class="active"><a href="#login"><i class="icon-lock"></i>Pelanggan</a></li>
				</ul>

				<div class="tab-content">
					<!-- Login -->
					<div class="tab-pane active" id="login">
                    	<?php echo $messages; ?>
						<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>login/process">
							<div class="control-group">
								<label class="control-label" for="inputEmail">Username</label>
								<div class="controls">
									<input type="text" id="inputEmail" placeholder="Username" name="username_member">
								</div><!-- end controls -->
							</div><!-- end control-group -->
							<div class="control-group">
								<label class="control-label" for="inputPassword">Password</label>
								<div class="controls">
									<input type="password" id="inputPassword" placeholder="Password" name="password">
								</div><!-- end controls -->
							</div><!-- end control-group -->
							<div class="control-group">
								<div class="controls">
									<button type="submit" class="btn theme">Login</button>
								</div><!-- end controls -->
							</div><!-- end control-group -->
						</form>
					</div><!-- end tab-pane active -->
					<!-- Register -->
					<div class="tab-pane" id="forgot">
						<form class="form-horizontal">
						<div class="control-group">
							<label class="control-label" for="inputEmail"> Email</label>
							<div class="controls">
								<input type="email" id="inputEmail" placeholder="Email">
							</div><!-- end controls -->
						</div><!-- end control-group -->

						<div class="control-group">
							<div class="controls">
								<button type="submit" class="btn theme">Retrieve password</button>
							</div><!-- end controls -->
						</div><!-- end control-group -->
						</form>
					</div><!-- end tab-pane -->
				</div><!-- end tab-content -->
			</div><!--  end span6 -->

			<div class="span6">
				<p>Pelanggan Baru</p>
				<hr>
				<p>
                	Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed molestie augue sit amet leo consequat posuere. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere. <a href="<?php echo base_url(); ?>register" class="theme">Buat Akun Baru →</a>
                </p>
			</div><!-- end span6 -->
		</div><!-- end row-fluid -->
	</div><!-- end wrap -->
</section>
</div><!-- end container -->