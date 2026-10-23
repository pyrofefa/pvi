</div>
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
	<!-- BEGIN CORE PLUGINS -->   
	<!--[if lt IE 9]>
	<script src="<?php echo assets_url(); ?>plugins/respond.min.js"></script>
	<script src="<?php echo assets_url(); ?>plugins/excanvas.min.js"></script> 
	<![endif]-->   
	
	<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="<?php echo assets_url(); ?>plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo assets_url(); ?>plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
	<script src="<?php echo assets_url(); ?>plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="<?php echo assets_url(); ?>plugins/jquery.blockui.min.js" type="text/javascript"></script>  
	<script src="<?php echo assets_url(); ?>plugins/jquery.cookie.min.js" type="text/javascript"></script>
	<script src="<?php echo assets_url(); ?>plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>

        <script type="text/javascript" src="<?php echo assets_url(); ?>plugins/revolution_slider/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
    <script type="text/javascript" src="<?php echo assets_url(); ?>plugins/revolution_slider/rs-plugin/js/jquery.themepunch.revolution.min.js"></script> 
	<!-- END CORE PLUGINS -->
	<script src="<?php echo assets_url(); ?>scripts/app.js"></script>
        <script src="<?php echo assets_url(); ?>scripts/index.js"></script>
	<script>
		jQuery(document).ready(function() { 
		$('.dataTable').dataTable({
            'dom': "<'row'<'col-md-6'l><'col-md-6'f>>",
            "pageLength": 50,
            "iDisplayLength": 50,
            "sPaginationType": "bootstrap",
            "ordering": false,
            "aaSorting": [],
            "oLanguage": {
                "sSearch" : "Buscar:",
                "sZeroRecords" : "No se encontraron registros",
                "sLengthMenu" : "Mostrar _MENU_ registros por página",
                "sInfoFiltered": " - Filtrados de un total de _MAX_ registros",
                "sInfo": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                "sInfoEmpty": "No hay registros que mostrar",
                "sNext": "Siguiente",
                "oPaginate": {
                    "sFirst":      "Primera",
                    "sLast":       "Última",
                    "sNext":       "Siguiente",
                    "sPrevious":   "Anterior"
                }
            }
        });   
		   App.init();
                   Index.initRevolutionSlider(); 
		});
	</script>
	<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>