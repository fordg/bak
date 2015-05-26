<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<!-- stylesheets -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resources/css/reset.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resources/css/style.css" media="screen" />
		<link id="color" rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resources/css/colors/blue.css" />
		<!-- scripts (jquery) -->
		<script src="<?php echo base_url(); ?>resources/scripts/jquery-1.4.2.min.js" type="text/javascript"></script>
		<!--[if IE]><script language="javascript" type="text/javascript" src="resources/scripts/excanvas.min.js"></script><![endif]-->
		<script src="<?php echo base_url(); ?>resources/scripts/jquery-ui-1.8.custom.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/jquery.ui.selectmenu.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/jquery.flot.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/tiny_mce/tiny_mce.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/tiny_mce/jquery.tinymce.js" type="text/javascript"></script>
		<!-- scripts (custom) -->
		<script src="<?php echo base_url(); ?>resources/scripts/smooth.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/smooth.menu.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/smooth.chart.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/smooth.table.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/smooth.form.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/smooth.dialog.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>resources/scripts/smooth.autocomplete.js" type="text/javascript"></script>
        <link id="color" rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery.validate.css" />
	
    	<script src="<?php echo base_url(); ?>resources/scripts/jquery-1.4.2.min.js" type="text/javascript"></script>
	    <script src="<?php echo base_url(); ?>js/jquery.validate.js" type="text/javascript"></script>

	          <script type="text/javascript">
                        function confirmDelete(delUrl) {
                          if (confirm("Are you sure you want to delete")) {
                            document.location = delUrl;
                          }
                        }
                        $(document).ready(function() {
                                  $('#wait_1').hide();
                                  $('#drop_1').change(function(){
                                  $('#wait_1').show();
                                  $('#result_1').hide();
                                  $.post("<?php echo base_url().'admin/produk/drop_1' ?>", {
                                        func: "get_ukuran",
                                        pariabel: $('#drop_1').val()
                              }, function(response){
                                $('#result_1').fadeOut();
                                setTimeout("finishAjax('result_1', '"+escape(response)+"')", 400);
                              });
                                return false;
                                });
                        });

                        function finishAjax(id, response) {
                          $('#wait_1').hide();
                          $('#'+id).html(unescape(response));
                          $('#'+id).fadeIn();
                        }
                        
                 
		</script>
