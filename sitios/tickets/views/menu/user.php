<?php if (logged()) { ?>
            <li class="dropdown user">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <img alt="" src="<?php echo base_url(); ?>assets/img/no-avatar.png" style="width:29px;height:29px;" />
                    <span class="username"><?php echo $this->session->userdata('username'); ?></span>
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url().sitio();?>/users/logout"><i class="fa fa-key"></i> Salir</a></li>
                </ul>
            </li>
            <?php } ?>