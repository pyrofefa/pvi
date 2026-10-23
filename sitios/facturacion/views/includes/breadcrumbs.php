<!-- BEGIN PAGE -->
		<div class="page-content">        
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
						<img src="<?php echo customs_url();?>img/<?php echo $this->config->item('sitio_logo');?>" class="img-responsive" />
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="fa fa-home"></i>
							<a href="<?php echo base_url(); ?>">SIAFESON</a> 
							<i class="fa fa-angle-right"></i>
						</li>
						<?php foreach(breadcrumbs() as $br){ ?>
                                                <li>
                                                    <a href="#">
                                                        <?php echo $br; ?>
                                                    </a>
                                                    <i class="fa fa-angle-right"></i>
                                                </li>
                                                <?php } ?>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">