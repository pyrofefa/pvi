        <?php if (logged()) { ?>
            <li class="dropdown user">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <img alt="" src="<?php echo assets_url(); ?>img/no-avatar.png" style="width:29px;height:29px;" />
                    <span class="username"><?php echo $this->session->userdata('username'); ?></span>
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <?php if($this->ion_auth->permiso(6)){ ?>
                    <li><a href="<?php echo base_url().sitio();?>/admin"><?php echo $this->lang->line('mnu_list_muestreo');?></a></li>
                     <li class="divider"></li>
                   <!-- <li><a href="<?php echo base_url().sitio();?>/control">Registros de control</a></li> -->
                    <li><a href="<?php echo base_url().sitio();?>/admin/ubicaciones">Ubicaciones</a></li>
                    <li><a href="<?php echo base_url().sitio();?>/admin/listaTecnicos">Listado de Técnicos e IMEI</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url().sitio();?>/admin/muestrear"> <?php echo lang('mnu_reg_muestreo');?></a></li>
                    <!-- <li><a href="<?php echo base_url().sitio();?>/control/registrar">Registrar control</a></li> -->
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url().sitio();?>/admin/qr"><i class="fa fa-qrcode"></i> <?php echo lang('mnu_herramientas_qrs');?></a></li>
                    <li><a href="<?php echo base_url().sitio();?>/admin/etiquetas"> <?php echo lang('mnu_herramientas_eti');?></a></li>
                    <li><a href="<?php echo base_url().sitio();?>/admin/recuperar"> <?php echo lang('mnu_herramientas_rec');?></a></li>
                    <li class="divider"></li>
                    <!--<li><a href="extra_lock.html"><i class="fa fa-lock"></i> Lock Screen</a></li>-->
                    <?php }elseif($this->ion_auth->permiso(1)){ ?>
                    <li><a href="<?php echo base_url().sitio();?>/users/usuarios"><i class="fa fa-move"></i> Usuarios</a></li>
                    <?php } ?>
                    <li><a href="javascript:;" id="trigger_fullscreen"><i class="fa fa-move"></i> Pantalla completa</a></li>
                    <li><a href="<?php echo base_url().sitio();?>/users/logout"><i class="fa fa-key"></i> Salir</a></li>
                </ul>
            </li>
            <?php } ?>