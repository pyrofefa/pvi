        <?php if (logged()) { ?>
            <li class="dropdown user">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <img alt="" src="<?php echo assets_url(); ?>img/no-avatar.png" style="width:29px;height:29px;" />
                    <span class="username"><?php echo $this->session->userdata('username'); ?></span>
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url().sitio();?>/tecnico"> Registros</a></li>
                    <li><a href="<?php echo base_url().sitio();?>/tecnico/mapa"> Mapa</a></li>
                    <li><a href="<?php echo base_url().sitio();?>/tecnico/qrs"> Imprimir Qr's</a></li>
                    <li class="divider"></li>
                    <li><a href="javascript:;" id="trigger_fullscreen"><i class="fa fa-move"></i> Pantalla Completa</a></li>
                    <!--<li><a href="extra_lock.html"><i class="fa fa-lock"></i> Lock Screen</a></li>-->
                    <li><a href="<?php echo base_url().sitio();?>/users/logout"><i class="fa fa-key"></i> Cerrar Sesion</a></li>
                </ul>
            </li>
            <?php } ?>