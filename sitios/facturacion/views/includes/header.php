<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title><?php echo  $this->config->item('sitio_short') . " | " . $this->config->item('sitio_long');?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="<?php echo  $this->config->item('sitio_short');?>" name="description" />
        <meta content="" name="author" />
        <meta name="MobileOptimized" content="320">
        <meta http-equiv="X-UA-Compatible" content="IE=10; IE=9; IE=8; IE=7; IE=EDGE" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="<?php echo assets_url(); ?>plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo assets_url(); ?>plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo assets_url(); ?>plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo assets_url(); ?>plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME STYLES --> 
        <link href="<?php echo assets_url(); ?>css/style-metronic.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo assets_url(); ?>css/style2.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?php echo assets_url(); ?>plugins/revolution_slider/css/rs-style.css" media="screen">
        <link rel="stylesheet" href="<?php echo assets_url(); ?>plugins/revolution_slider/rs-plugin/css/settings.css" media="screen"> 
        <link href="<?php echo assets_url(); ?>css/style-responsive2.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo assets_url(); ?>css/plugins.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo assets_url(); ?>css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
        <link rel="stylesheet" href="<?php echo assets_url(); ?>plugins/data-tables/DT_bootstrap.css" />
        <link href="<?php echo assets_url(); ?>css/custom.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo customs_url(); ?>css/custom.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo assets_url(); ?>plugins/bootstrap-toastr/toastr.css" rel="stylesheet" type="text/css"/>
        <!-- END THEME STYLES -->
        <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/customs/facturacion/img/favicon.png">
        <script src="<?php echo assets_url(); ?>plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
        <script src="<?php echo assets_url(); ?>plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>          
        <script src="<?php echo assets_url(); ?>plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js" type="text/javascript"></script>          
        <script src="<?php echo base_url(); ?>assets/jquery/jquery.validate.min.js" type="text/javascript"></script> 
        <script src="<?php echo assets_url(); ?>plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript" ></script>
        <script src="<?php echo assets_url(); ?>plugins/bootstrap-toastr/toastr.min.js" type="text/javascript" ></script>
        <script src="<?php echo assets_url(); ?>plugins/jquery.blockui.min.js" type="text/javascript" ></script>
        <script type="text/javascript" src="<?php echo assets_url(); ?>plugins/data-tables/jquery.dataTables.js"></script>
        <script type="text/javascript" src="<?php echo assets_url(); ?>plugins/data-tables/DT_bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.floatThead.min.js"></script>
        <script type="text/javascript">
        toastr.options = {
                        closeButton : true,
                        positionClass : "toast-top-full-width",
                        onclick : null,
                        showDuration : "1000",
                        hideDuration : "1000"  
                   };
        </script>
    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body class="page-header-fixed page-sidebar-fixed page-footer-fixed">
        <!-- BEGIN HEADER -->   
        <div class="header navbar navbar-inverse navbar-fixed-top">


            <!-- BEGIN TOP NAVIGATION BAR -->
            <div class="header-inner">
                <!-- BEGIN LOGO -->  
                <a class="navbar-brand" href="<?php echo base_url() . sitio(); ?>">
                    <img src="<?php echo assets_url(); ?>img/pvi.png" alt="logo" class="img-responsive" />
                </a>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER --> 
                <a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <img src="<?php echo assets_url(); ?>img/menu-toggler.png" alt="" />
                </a> 
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                
