<!-- END USER LOGIN DROPDOWN -->
</ul>
<!-- END TOP NAVIGATION MENU -->
</div>
<!-- END TOP NAVIGATION BAR -->


</div>
<!-- END HEADER -->
<div class="clearfix"></div>
<!-- BEGIN CONTAINER -->   
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->        
        <ul class="page-sidebar-menu">
            <li>
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler hidden-phone"></div>
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            </li>
            <li class="start ">
                <a href="<?php echo base_url() . sitio(); ?>">
                    <i class="fa fa-home"></i> 
                    <span class="title"><?php echo lang('mnu_inicio'); ?></span>
                </a>
            </li>
           <!-- <li class="">
                <a href="<?php echo base_url() . sitio() . '/home/documentos'; ?>">
                    <i class="fa fa-folder-o"></i> 
                    <span class="title"><?php echo lang('mnu_documentos'); ?></span><span class="badge badge-info">New!</span>
                </a>
            </li> -->
           <!-- <li class="">
                <a href="<?php echo base_url() . sitio() . '/home/circulares'; ?>">
                    <i class="fa fa-folder-open-o"></i> 
                    <span class="title"><?php echo lang('mnu_circulares'); ?></span><span class="badge badge-info">New!</span>
                </a>
            </li> -->
           <!-- <li class="">
                <a href="<?php echo base_url() . sitio() . '/home/boletines'; ?>">
                    <i class="fa fa-file"></i> 
                    <span class="title">Boletines</span><span class="badge badge-info">New!</span>
                </a>
            </li> -->
            <!-- <li class="">
                <a href="<?php echo base_url() . sitio() . '/home/fichas'; ?>">
                    <i class="fa fa-info"></i> 
                    <span class="title"><?php echo lang('mnu_fichas'); ?></span>
                </a>
            </li> -->
          <!--  <li class="">
                <a href="<?php echo base_url() . sitio() . '/home/enlaces'; ?>">
                    <i class="fa fa-link"></i> 
                    <span class="title"><?php echo lang('mnu_enlaces'); ?></span>
                </a>
            </li> -->          
            <li class="">
                <a href="<?php echo base_url() . sitio() . '/home/manuales'; ?>">
                    <i class="fa fa-book"></i> 
                    <span class="title"><?php echo lang('mnu_manuales'); ?></span>
                </a>
            </li>
            

            <?php if ($this->session->userdata('site_lang')) { ?>

                <?php if ($this->session->userdata('site_lang') == "spanish") { ?>
                    <!--            <li class="">
                                    <a href="<?php echo base_url() . sitio(); ?>/Language/Load/english">
                                        <i class="fa fa-group"></i> 
                                        <span class="title">English</span>
                                    </a>
                                </li>-->

                <?php } ?>

                <?php if ($this->session->userdata('site_lang') == "english") { ?>
                    <!--            <li class="">
                                    <a href="<?php echo base_url() . sitio(); ?>/Language/Load/spanish">
                                        <i class="fa fa-group"></i> 
                                        <span class="title">Español</span>
                                    </a>
                                </li>-->

                <?php } ?>


            <?php } else { ?>
                <!--            <li class="">
                                <a href="<?php echo base_url() . sitio(); ?>/Language/Load/english">
                                    <i class="fa fa-group"></i> 
                                    <span class="title">English</span>
                                </a>
                            </li>-->

            <?php } ?>

            <?php if (!logged()) { ?>
              <li class="">
                <a href="<?php echo base_url() . sitio() . '/home/altacliente'; ?>">
                    <i class="fa fa-user"></i> 
                    <span class="title"><?php echo lang('mnu_alta'); ?></span>
                    <br>
                     <i class="fa-rotate-270"></i> 
                    <span text-align="right" class="title"><?php echo lang('mnu_alta2'); ?></span>
                </a>
            </li>
                <li class="">
                    <a href="<?php echo base_url() . sitio(); ?>/users/login">
                        <i class="fa fa-sign-in"></i> 
                        <span class="title"><?php echo lang('mnu_login'); ?></span>
                    </a>
                </li>
            <?php } ?>
                <?php if(logged()){ ?>
           
                    <?php if($this->session->userdata('group_id') == 3){ ?>
                     <li>
                        <a class="active" href="javascript:;">
                        <i class="fa fa-file-o"></i> 
                        <span class="title">Códigos</span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                    <li>
                        <a href="<?php echo base_url().sitio().'/facturacion/registrar'; ?>">
                            <i class="fa fa-plus-circle"></i>
                            Agregar código(s)
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().sitio().'/facturacion/codigos'; ?>">
                            <i class="fa fa-table"></i>
                                            Mis códigos
                        </a>
                    </li>
                     </ul>
                </li>
                <li>
                        <a class="active" href="javascript:;">
                        <i class="fa fa-user"></i> 
                        <span class="title">Mi cuenta</span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                    <li>
                        <a href="<?php echo base_url().sitio().'/facturacion/datosfacturacion'; ?>">
                            <i class="fa fa-book"></i>
                            Mis datos de facturación
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().sitio().'/facturacion/updatepass'; ?>">
                            <i class="fa fa-key"></i>
                                            Cambiar contraseña
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().sitio().'/facturacion/datospersonales'; ?>">
                            <i class="fa fa-key"></i>
                                            Mis datos personales
                        </a>
                    </li>
                     </ul>
                </li>
                    <?php }elseif($this->session->userdata('group_id') == 2){  ?>
                    <li>
                    <a class="active" href="javascript:;">
                        <i class="fa fa-file-o"></i> 
                        <span class="title">Facturas</span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                    <li>
                        <a href="<?php echo base_url().sitio().'/admin/pendientes'; ?>">
                            <i class="fa fa-clock-o"></i>
                            Pendientes
                        </a>
                         <a href="<?php echo base_url().sitio().'/admin/clientes'; ?>">
                            <i class="fa fa-archive"></i>
                            Clientes
                        </a>
                    </li>
                     </ul>
                </li>
                    <?php } ?>
                   
                    
                 
                  
             
            <?php } ?>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->