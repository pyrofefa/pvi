        <?php if (logged()) { ?>
            <li class="dropdown user">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <img alt="" src="<?php echo assets_url(); ?>img/no-avatar.png" style="width:29px;height:29px;" />
                    <span class="username"><?php echo $this->session->userdata('username'); ?></span>
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <?php if($this->ion_auth->permiso(10)){ ?>
                    <li><a href="<?php echo base_url().sitio();?>/reportes/estatal"><i class="fa fa-bar-chart-o"></i> Reporte de Capturas</a></li>
                    <?php } ?>
                    <li><a href="javascript:;" id="trigger_fullscreen"><i class="fa fa-move"></i> Pantalla completa</a></li>
                    <li><a href="<?php echo base_url().sitio();?>/users/logout"><i class="fa fa-key"></i> Salir</a></li>
                </ul>
            </li>
            <?php } ?>