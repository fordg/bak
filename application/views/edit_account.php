<div class="container">
	<section class="page">
		<div class="row">
			<header class="span12 prime">
				<h3>Edit Your Account Information</h3>
			</header>
		</div>

		<div class="wrap">
			<div class="row-fluid">
            	<div class="span4">
                	<div id="pinggir">
                	<ul>
						<li><a href="<?php echo base_url(); ?>view_account/detail/ "><i class="icon-caret-right"></i> View Account</a></li>
                        <li><a href="<?php echo base_url(); ?>edit_account/update/ "><i class="icon-caret-right"></i> Edit Your Account Information</a></li>
						<li><a href="<?php echo base_url(); ?>edit_username/update/ "><i class="icon-caret-right"></i> Change Your Password</a></li>
					</ul>
                    </div>
                </div><!-- end span4 -->
				<div class="span8">
					<div id="regis">
                    	<form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url(); ?>edit_account/update_proccess/<?php echo $this->session->userdata('memberid'); ?>" method="post">
                    	<div class="judul_regis">1. Personal Informations</div>
                    	<?php /*?><?php echo $messages; ?><?php */?>
                        	<div class="form_regis">
                            	<div class="control-group">
                                    <label class="control-label" for="inputEmail">Photo</label>
                                    <div class="controls">
                                        <input type="file" name="userfile" size="40"  />
                                    </div><!-- end controls -->
                                </div><!-- end control-group -->
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">First Name</label>
                                    <div class="controls">
                                        <?php echo form_input(array('name'=>'namadepan','size'=>'40','value'=>$member->NamaDepan)); ?>
                                    </div><!-- end controls -->
                                </div><!-- end control-group -->
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Last Name</label>
                                    <div class="controls">
                                        <?php echo form_input(array('name'=>'namabelakang','size'=>'40','value'=>$member->NamaBelakang)); ?>
                                    </div><!-- end controls -->
                                </div><!-- end control-group -->
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Email</label>
                                    <div class="controls">
                                        <?php echo form_input(array('name'=>'email','size'=>'40', 'placeholder'=>'example@example.com','value'=>$member->email)); ?>
                                    </div><!-- end controls -->
                                </div><!-- end control-group -->
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Telephone</label>
                                    <div class="controls">
                                       <?php echo form_input(array('name'=>'telepon','size'=>'40','value'=>$member->telepon)); ?>
                                    </div><!-- end controls -->
                                </div><!-- end control-group -->
                            </div>
                            <div class="judul_regis">2. Delivery Informations</div>
                            <div class="form_regis">
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">First Address</label>
                                    <div class="controls">
                                        <?php echo form_textarea(array('name'=>'alamat1','value'=>$member->alamat1)); ?>
                                    </div><!-- end controls -->
                                </div><!-- end control-group -->
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">City</label>
                                    <div class="controls">
                                        <?php echo form_input(array('name'=>'kota','size'=>'40','value'=>$member->kota)); ?>
                                    </div><!-- end controls -->
                                </div><!-- end control-group -->
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Post Code</label>
                                    <div class="controls">
                                        <?php  echo form_input(array('name'=>'kodepos', 'size'=>'40','value'=>$member->kodepos)); ?>
                                    </div><!-- end controls -->
                                </div><!-- end control-group -->
                            </div>
							<div class="control-group">
								<div class="controls">
									<button type="submit" class="btn theme">Update</button>
								</div><!-- end controls -->
							</div><!-- end control-group -->
					</div><!-- end regis -->
                    </form>
				</div><!-- end span8 -->
			</div>
		</div>
	</section>
</div>