<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// echo "<pre>". print_r(get_defined_vars(),true) ."</pre>";
?>
<div class = "container-fluid">
	<div class="row">
		<div class="col-lg-2">

			<ul class='nav navbar-nav'>
				<?php
					foreach($Servicios as $s){
						foreach ($s as $key => $value) {
							$$key = $value;
						}
						echo "<li >
								<a class='btn btn-success srv_$id_tiposervicio' href='javascript:mostrarPrecios($id_tiposervicio)'>". $nombre ."</a>
							</li>";
					}
				?>
			</ul>

		</div>
		<div id="divPrecios" class="col-lg-10">	


		</div>
	</div>
</div>
<script src="<?php echo base_url();?>assets/js/main.js"></script>