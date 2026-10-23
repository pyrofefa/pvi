<!-- </div> -->
<!-- FOOTER -->
			</div>
			<!-- END PAGE CONTENT-->
		</div>
		<!-- END PAGE -->    
	</div>
	<!-- END CONTAINER -->
	<!-- BEGIN FOOTER -->
	<div class="footer">
		<div class="footer-inner">
			<?php echo date('Y'); ?> &copy; <?php echo $this->config->item('sitio_by');?>
		</div>
		<div class="footer-tools">
			<span class="go-top">
			<i class="fa fa-angle-up"></i>
			</span>
		</div>
	</div>
	<!-- END FOOTER -->
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE assets/PLUGINS -->   
	<!--[if lt IE 9]>
	<script src="<?php echo base_url(); ?>assets/plugins/respond.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/excanvas.min.js"></script> 
	<![endif]-->   
	
	<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
	<script src="<?php echo base_url(); ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>  
	<script src="<?php echo base_url(); ?>assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>

        <!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/plugins.min.js"></script> -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jquery.themepunch.revolution.min.js"></script> 
	<!-- END CORE assets/PLUGINS -->
	<script src="<?php echo base_url(); ?>assets/scripts/app.js"></script>
    <script src="<?php echo base_url(); ?>assets/scripts/index.js"></script>
	<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>