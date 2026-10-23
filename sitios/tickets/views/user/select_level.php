<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title>Seleccionar nivel</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<meta name="MobileOptimized" content="320">
	<!-- BEGIN GLOBAL MANDATORY STYLES -->          
	<link href="<?php echo assets_url(); ?>plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo assets_url(); ?>plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo assets_url(); ?>plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL STYLES --> 
	<link rel="stylesheet" type="text/css" href="<?php echo assets_url(); ?>plugins/select2/select2_metro.css" />
	<!-- END PAGE LEVEL SCRIPTS -->
	<!-- BEGIN THEME STYLES --> 
	<link href="<?php echo assets_url(); ?>css/style-metronic.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo assets_url(); ?>css/style.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo assets_url(); ?>css/style-responsive.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo assets_url(); ?>css/plugins.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo assets_url(); ?>css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="<?php echo assets_url(); ?>css/pages/login.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo assets_url(); ?>css/custom.css" rel="stylesheet" type="text/css"/>
	<!-- END THEME STYLES -->
	<link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- BEGIN BODY -->
<body class="login">
	<!-- BEGIN LOGO -->
	<div class="logo">
		<img src="<?php echo assets_url(); ?>img/siafeson.png" alt="" /> 
	</div>
	<!-- END LOGO -->
	<!-- BEGIN LOGIN -->
	<div class="content">
		<!-- BEGIN LOGIN FORM -->
                <?php echo form_open(base_url().sitio().'/users/selectLevelProccess','class="login-form"'); ?>
			<h3 class="form-title">Selecciona un nivel para accesar</h3>
			<div class="alert alert-danger display-hide">
				<button class="close" data-close="alert"></button>
				<span>Enter any username and password.</span>
			</div>
			<div class="form-group">
				<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
				<label class="control-label visible-ie8 visible-ie9"><?php echo lang('global_usuario'); ?></label>
				<div class="input-icon">
                                        <?php echo form_dropdown('level',$levelsDropdown,'','class="form-control"'); ?>
				</div>
			</div>
			<div class="form-actions">
				<button type="submit" class="btn green pull-right">
				<?php echo lang('global_entrar'); ?> <i class="m-icon-swapright m-icon-white"></i>
				</button>            
			</div>
			<div class="forget-password">
                            <h4><a href="<?php echo base_url().sitio(); ?>"><?php echo lang('login_regresar_principal'); ?></a></h4>
			</div>
		<?php echo form_close(); ?>
		<!-- END LOGIN FORM -->        
	</div>
	<!-- END LOGIN -->
	<!-- BEGIN COPYRIGHT -->
	<div class="copyright">
		<?php echo date('Y'); ?> &copy; SIAFESON. <?php echo strtoupper(str_replace(".php","",sitio())); ?>.
	</div>
	<!-- END COPYRIGHT -->
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->   
	<!--[if lt IE 9]>
	<script src="<?php echo assets_url(); ?>plugins/respond.min.js"></script>
	<script src="<?php echo assets_url(); ?>plugins/excanvas.min.js"></script> 
	<![endif]-->   
	<script src="<?php echo assets_url(); ?>plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
	<script src="<?php echo assets_url(); ?>plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
	<script src="<?php echo assets_url(); ?>plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo assets_url(); ?>plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script src="<?php echo assets_url(); ?>plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>	
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="<?php echo assets_url(); ?>scripts/app.js" type="text/javascript"></script>
	<script src="<?php echo assets_url(); ?>scripts/login.js" type="text/javascript"></script> 
	<!-- END PAGE LEVEL SCRIPTS --> 
	<script>
		jQuery(document).ready(function() {     
		  App.init();
		  Login.init();
		});
	</script>
	<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>