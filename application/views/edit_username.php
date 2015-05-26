<div class="container">
	<section class="page">
		<div class="row">
			<header class="span12 prime">
				<h3>Personal Informations</h3>
			</header>
		</div>

		<div class="wrap">
			<div class="row-fluid">
                <div class="span4">
                	<div id="pinggir">
					<ul>
						<li><a href="<?php echo base_url(); ?>view_account/detail/<?php echo $this->session->userdata('memberid'); ?>"><i class="icon-caret-right"></i> View Account</a></li>
                        <li><a href="<?php echo base_url(); ?>edit_account/update/<?php echo $this->session->userdata('memberid'); ?>"><i class="icon-caret-right"></i> Edit Your Account Information</a></li>
						<li><a href="<?php echo base_url(); ?>edit_username/update/<?php echo $this->session->userdata('memberid'); ?>"><i class="icon-caret-right"></i> Change Your Password</a></li>
					</ul>
                    </div>
                </div><!-- end span4 -->
				<div class="span8">
					<div class="tab-pane active" id="login">
                    	<?php /*?><?php echo $messages; ?><?php */?>
						<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>edit_username/update_proccess/<?php echo $this->session->userdata('memberid'); ?>">
                            <div class="control-group">
								<label class="control-label" for="inputPassword">Username</label>
								<div class="controls">
									<?php echo form_input(array('name'=>'username', 'size'=>'40', 'value'=>$member->username_member)); ?>
								</div><!-- end controls -->
							</div><!-- end control-group -->
                            <div class="control-group">
								<label class="control-label" for="inputPassword">Password</label>
								<div class="controls">
									<?php echo form_password(array('name'=>'password', 'size'=>'40')); ?>
								</div><!-- end controls -->
							</div><!-- end control-group -->
                            <div class="control-group">
								<label class="control-label" for="inputPassword">Confirm Password</label>
								<div class="controls">
									<?php echo form_password(array('name'=>'con_password', 'size'=>'40')); ?>
								</div><!-- end controls -->
							</div><!-- end control-group -->
							<div class="control-group">
								<div class="controls">
									<button type="submit" class="btn theme">Update</button>
								</div><!-- end controls -->
							</div><!-- end control-group -->
						</form>
					</div><!-- end tab-pane active -->
				</div><!-- end span8 -->
			</div>
		</div>
	</section>
</div>