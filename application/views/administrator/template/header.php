<!--div id="colors-switcher" class="color">
			<a href="" class="blue" title="Blue"></a>
			<a href="" class="green" title="Green"></a>
			<a href="" class="brown" title="Brown"></a>
			<a href="" class="purple" title="Purple"></a>
			<a href="" class="red" title="Red"></a>
			<a href="" class="greyblue" title="GreyBlue"></a>
		</div-->
		<!-- dialogs -->
	<!-- end dialogs -->
    <!-- header -->
<div id="header">
			<!-- logo -->
			<div id="logo">
				<h1><a href="" title="Smooth Admin"><img src="<?php echo base_url(); ?>resources/images/logo.png" alt="Smooth Admin" /></a></h1>
			</div>
			<!-- end logo -->
			<!-- user -->
			<ul id="user">
				<li class="first"><a href="<?php echo base_url(); ?>admin/home/account">Account [<?php echo $this->session->userdata('nama'); ?>]</a></li>
				<li><a href="">Messages (0)</a></li>
				<li><a href="<?php echo base_url(); ?>admin/home/logout">Logout</a></li>
				<li class="highlight last"><a href="">View Site</a></li>
			</ul>
			<!-- end user -->
			<div id="header-inner">
				<div id="home">
					<a href="<?php echo base_url(); ?>admin/home" title="Home"></a>
				</div>
				<!-- quick -->
				
				<!-- end quick -->
				<div class="corner tl"></div>
				<div class="corner tr"></div>
			</div>
		</div>
		<!-- end header -->