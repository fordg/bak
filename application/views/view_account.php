<div class="container">
	<section class="page">
		<div class="row">
			<header class="span12 prime">
				<h3>Detail My Account</h3>
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
                		<div class="judul_regis">1. Personal Informations</div>
                        <div class="form_regis">
                            <table width="524" height="264">
                            	<tr>	
                                	<td>Photo</td>
                                    <td><img src="../../uploads/<?php echo $total_rows->ava; ?>" width="73" height="73" /></td>
                                </tr>
                                <tr>
                                    <td>First Name</td>
                                    <td><?php echo $total_rows->NamaDepan; ?></td>
                                </tr>
                                <tr>
                                    <td>Last Name</td>
                                    <td><?php echo $total_rows->NamaBelakang; ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><?php echo $total_rows->email; ?></td>
                                </tr>
                                <tr>
                                    <td>Telepon</td>
                                    <td><?php echo $total_rows->telepon; ?><br /></td>
                                </tr>
                            </table>
                        </div>
                        <div class="judul_regis">2. Delivery Informations</div>
                        <div class="form_regis">
                            <table width="424" height="134">
                                <tr>
                                    <td>Address</td>
                                    <td><?php echo $total_rows->alamat1; ?></td>
                                </tr>
                                <tr>
                                    <td>City</td>
                                    <td><?php echo $total_rows->kota; ?></td>
                                </tr>
                                <tr>
                                    <td>Post Code</td>
                                    <td><?php echo $total_rows->kodepos; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div><!-- end regis -->
				</div><!-- end span8 -->
			</div>
		</div>
	</section>
</div>