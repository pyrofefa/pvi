<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// echo "<pre>". print_r(get_defined_vars(),true) ."</pre>";
?>
<div style='float:right; display: inline;'><a href="<?php echo base_url().sitio();?>/users/logout/1"><img width='160' src="<?php echo customs_url(); ?>img/logout.ico" ></a></div>

<div class = "container">

<div class="row" align="center">
  
<label style="color: white; font-size: 32px; font-weight: bold;">Elige un servicio</label>
<table>
    <tr>
         <?php
                    foreach($Servicios as $s){
                        foreach ($s as $key => $value) {
                            $$key = $value;
                        }
                      echo "<td ><a href='javascript:mostrarPrecios($ID_T)'>
                                <img class='btnImg' width='160' idT='$ID_T' src= '". customs_url() ."img/Botones/$ID_T.png' />
                                </a>
                            </td>";
                    }
                ?>
    </tr>
</table>
    
</div>


    <div class="row" align="center">
       
       <!-- <div class="col-lg-2">

            <ul class='nav navbar-nav'>
                <?php
                    foreach($Servicios as $s){
                        foreach ($s as $key => $value) {
                            $$key = $value;
                        }
                        echo "<li >
                                <a class='btn btn-success srv_$ID_T' href='javascript:mostrarPrecios($ID_T)'>". $Nom_T ."</a>
                            </li>";
                    }
                ?>
            </ul>

        </div> -->
        <div id="divPrecios" class="col-lg-12" align="center"> 

        </div>
         <div id="divServicio" class="col-lg-12" align="center"> 


        </div>
    </div>
    <div class="row">

<div id ="divImprimir" class="col-lg-12" align="center">
<input type="image" id='printTicket' name='printTicket' class="rounded-corners" value="IMPRIMIR TICKET" src="<?php echo customs_url(); ?>img/print.png" />
</div>
</div>
</div>
<script src="<?php echo base_url();?>assets/js/main.js?<?php echo date('YmdHis'); ?>" ></script>
<script>
$(document).ready(function(){
    $(".btnImg").mouseover(function(){
        $(this).css('border','1px solid black');
        $(this).css('cursor','pointer');
    });
    $(".btnImg").mouseout(function(){
        $(this).css('border','none');
        $(this).css('cursor','default');
        
    });
    //CUANDO SE HACE CLIC EN EL BOTON DEL SERVICIO, SE DESPLEGARÁ EL MENU QUE LE CORRESPONDE
    $(".btnImg").click(function(){
        var idS = $(this).attr('idT');
        SERVICIO = 0;
        $("#lblServicio").html("");
     //   $.post('menuServicios.php', {idS:idS}, function(data) {
       //     $('#btn2Div').html(data);
        //});
    });
});

</script>