<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>CESAVESON PVI Tickets</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="<?php echo  $this->config->item('sitio_short');?>" name="description" />
    <meta content="" name="author" />
    <meta name="MobileOptimized" content="320">
    <meta http-equiv="X-UA-Compatible" content="IE=10; IE=9; IE=8; IE=7; IE=EDGE" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="<?php echo base_url(); ?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <!--
        <link href="<?php echo base_url(); ?>assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME STYLES --> 
    <link href="<?php echo base_url(); ?>assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/revolution_slider/css/rs-style.css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/revolution_slider/rs-plugin/css/settings.css" media="screen"> 
    <link href="<?php echo base_url(); ?>assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/css/default.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-toastr/toastr.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/css/news.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/css/buttons.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo base_url(); ?>assets/css/pvi.css" rel="stylesheet" type="text/css" media="all" />

    <!-- END THEME STYLES -->
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/customs/siafeson/img/favicon.png">
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>          
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js" type="text/javascript"></script>          
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript" ></script>
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-toastr/toastr.min.js" type="text/javascript" ></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery.blockui.min.js" type="text/javascript" ></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/data-tables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/data-tables/DT_bootstrap.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/data-tables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/data-tables/DT_bootstrap.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/data-tables/fnReloadAjax.js"></script>

    <script src="<?php echo base_url(); ?>assets/plugins/fullscreen.js" type="text/javascript" ></script>
    <script src="<?php echo base_url(); ?>assets/js/globals.js" type="text/javascript" ></script>


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
            <a class="navbar-brand" href="index.html">
                <img src="<?php echo base_url(); ?>assets/img/siafeson.png" alt="logo" class="img-responsive" />
            </a>
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER --> 
            <a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <img src="<?php echo base_url(); ?>assets/img/menu-toggler.png" alt="" />
            </a> 

            <ul class="nav navbar-nav pull-right">
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                
