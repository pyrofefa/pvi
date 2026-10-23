<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title>Iniciar sesión</title>
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
                <?php echo form_open(base_url().sitio().'/users/login','class="login-form"'); ?>
                    <input type="hidden" value="<?php echo str_replace('.php','',sitio()); ?>" name="sitio" />
			<h3 class="form-title">Inicio de sesión</h3>
                        <span style="color: red;font-family: verdana, sans-serif;font-size: 16px;"><?php if ($this->session->flashdata('error')):  echo  $this->session->flashdata('error');  endif; echo validation_errors();?></span>
                        <div id="infoMessage"><?php echo $message;?></div>
			<div class="form-group">
				<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
				<label class="control-label visible-ie8 visible-ie9"><?php echo lang('global_usuario'); ?></label>
				<div class="input-icon">
					<i class="fa fa-user"></i>
                                       <!-- <?php echo form_input($identity); ?> -->
                                       <input type="text" name="identity" value="" id="identity" class="form-control placeholder-no-fix qwerty" placeholder="Usuario"  />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label visible-ie8 visible-ie9"><?php echo lang('global_password'); ?></label>
				<div class="input-icon">
					<i class="fa fa-lock"></i>
                                       <!-- <?php echo form_input($password); ?> -->
                                         <input type="password" name="password" value="" id="password" class="form-control placeholder-no-fix qwerty" placeholder="Contraseña"  />

				</div>
			</div>
			<div class="form-actions">
				<label class="checkbox">
                              <!--  <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
                                    <?php echo lang('global_recordarme'); ?> -->
				</label>
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
	<!-- <script src="<?php echo assets_url(); ?>plugins/keyboard/js/jquery.js"></script> -->
	<!-- <script src="<?php echo assets_url(); ?>plugins/keyboard/js/jquery-ui.min.js"></script> -->
	<!-- <script src="<?php echo assets_url(); ?>plugins/jquery-1.10.2.min.js" type="text/javascript"></script> -->
	<!--  <script src="<?php echo assets_url(); ?>plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script> -->
	<!-- <script src="<?php echo assets_url(); ?>plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> -->
	<!-- <script src="<?php echo assets_url(); ?>plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script> -->
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	 <link href="<?php echo assets_url(); ?>plugins/Keyboard2/css/pvi.css" rel="stylesheet">
	<script src="<?php echo assets_url(); ?>plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>	
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="<?php echo assets_url(); ?>scripts/app.js" type="text/javascript"></script>
	<script src="<?php echo assets_url(); ?>scripts/login.js" type="text/javascript"></script> 
	<!-- END PAGE LEVEL SCRIPTS --> 
 <script src="<?php echo assets_url(); ?>plugins/keyboard2/js/jquery.js"></script>
 <script src="<?php echo assets_url(); ?>plugins/keyboard2/js/jquery-ui.min.js"></script>
 <link href="<?php echo assets_url(); ?>plugins/Keyboard2/css/keyboard.css" rel="stylesheet">
 <script src="<?php echo assets_url(); ?>plugins/Keyboard2/js/jquery.keyboard.js"></script>
 	<script src="<?php echo assets_url(); ?>plugins/Keyboard2/js/jquery.mousewheel.js"></script>
	<script src="<?php echo assets_url(); ?>plugins/Keyboard2/js/jquery.keyboard.extension-typing.js"></script>
	<script src="<?php echo assets_url(); ?>plugins/Keyboard2/js/jquery.keyboard.extension-autocomplete.js"></script>

	<script>
 jQuery(document).ready(function() {  
 	console.log("hola nona");
		 // App.init();
		 // Login.init();
		  	//FUNCION PARA INICIAR EL TECLADO EN PANTALLA
	$('.qwerty').keyboard(
	{
		layout   : 'qwerty',
		lockInput: true // prevent manual keyboard entry
	});
	
	$('.qwerty:eq(1)').keyboard(
	{
		openOn   : null,
		stayOpen : true,
		lockInput: true,
		layout   : 'qwerty'
	});
  $('#password').click(function(){
  	console.log("hola jona");
    $('.qwerty:eq(1)').getkeyboard().reveal();
  });
		});
	</script>
	<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>