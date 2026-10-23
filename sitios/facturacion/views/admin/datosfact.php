<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery-ui-1.10.2.custom.css"  />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery.multiselect.css" />
<link rel="stylesheet" type="text/css" href="<?php echo assets_url(); ?>plugins/select2/select2_metro.css" />
<script type="text/javascript" src="<?php echo assets_url(); ?>plugins/jquery-multi-select/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery/jquery.multiselect.filter.js"></script>
<script type="text/javascript" src="<?php echo assets_url(); ?>plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datepicker.js"></script>
<style type="text/css">
    div#map_canvas{
    border: 2px solid gray;
    }
    .center{
    text-align: center;
    }
    .display{
      display: block;
    }
    .right: {
    text-align: right;
    }
    .pinta{
    background-color: red; 
    }
    .control-label{
    font-weight: bolder;
    }
    
</style>
<!-- BEGIN PAGE CONTENT-->
<div class="row">
  <div class="col-md-12">
  <h4>Solicitud de Factura enviada desde el sistema de PVI en la fecha: <b><?php echo $fechapeticion; ?></b> (Horario Servidor)</h4>
  </div>
</div>
<div class="row">
    <img id="cargando" src="<?php echo assets_url(); ?>/img/ajax-loading.gif" style="display:none;" />
  
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box light-grey">
            <div class="portlet-title">
                <div class="caption"><i class="fa fa-globe"></i><?php echo $titulo; ?></div>
                <div class="actions">
                    <a href="<?php echo base_url() . sitio(); ?>/admin/pendientes" class="btn btn-danger"><i class="fa fa-reply"></i> Volver</a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                     <div class="col-md-12">
 <div class="col-md-4">
          <div class="form-group">
              <label class="control-label"><?php echo lang('nombre'); ?></label>
              <div>
                  <input id="txtrazon" class="form-control entrada" name="razon" readonly>
                  <span id = "msgrazon" class="help-block" ></span>
              </div>
          </div>

      </div>
     

       <div class="col-md-4">
          <div class="form-group">
              <label class="control-label"><?php echo lang('rfc'); ?></label>
              <div>
                  <input id="txtrfc" class="form-control entrada" name="rfc" style="text-transform:uppercase;" readonly>
                  <span id = "msgrfc" class="help-block" ></span>
              </div>
          </div>
      </div>
                 
            <div class="col-md-4">
          <div class="form-group">
              <label class="control-label"><?php echo lang('calle'); ?></label>
              <div>
                  <input id="txtcalle" class="form-control entrada" name="calle" readonly>
                  <span id = "msgcalle" class="help-block" ></span>
              </div>
          </div>
      </div>
       </div>
            </div>
            <div class="row">
                    <div class="col-md-3">
          <div class="form-group">
              <label class="control-label"><?php echo lang('colonia'); ?></label>
              <div>
                  <input id="txtcolonia" class="form-control entrada" name="colonia" readonly>
                  <span id = "msgcolonia" class="help-block" ></span>
              </div>
          </div>
      </div>
            <div class="col-md-3">
          <div class="form-group">
              <label class="control-label"><?php echo lang('exterior'); ?></label>
              <div>
                  <input id="txtexterior" class="form-control entrada" name="exterior" readonly>
                  <span id = "msgexterior" class="help-block" ></span>
              </div>
          </div>
      </div>
      <div class="col-md-3">
          <div class="form-group">
              <label class="control-label"><?php echo lang('interior'); ?></label>
              <div>
                  <input id="txtinterior" class="form-control entrada" name="interior" readonly>
                  <span id = "msginterior" class="help-block" ></span>
              </div>
          </div>
      </div>
            <div class="col-md-3">
          <div class="form-group">
              <label class="control-label"><?php echo lang('cp'); ?></label>
              <div>
                  <input id="txtcp" class="form-control entrada" name="cp" readonly>
                  <span id = "msgcp" class="help-block" ></span>
              </div>
          </div>
      </div>
            </div>
          
             <div class="row">
                     <div class="col-md-4">
        <div class="form-group">
            <label class="control-label"><?php echo lang('localidad'); ?></label>
             <div>
                <input id="txtlocalidad" class="form-control entrada" name="localidad" readonly>
                 <span id = "msglocalidad" class="help-block" ></span>
            </div>
        </div>
    </div>
                    <div class="col-md-4">
          <div class="form-group">
              <label class="control-label"><?php echo lang('estado'); ?></label>
              <div>
                <select class="select2_demo_1 form-control " id="slc_estado" disabled>
                  <option></option>
                  <?php for ($i=0; $i <count($estados) ; $i++) { ?>
                <option value="<?php echo $estados[$i]['id']?>"><?php echo $estados[$i]['name'];?></option>
              <?php }?>
              </select>
              <span id = "msgestado" class="help-block" ></span>
          </div>
      </div>
    </div>
        <div class="col-md-4">
        <div class="form-group">
          <label class="control-label"><?php echo lang('municipio'); ?></label>
            <div>
                <select class="select2_demo_1 form-control " id="slc_municipio" disabled>
                 <option>...</option>
                </select>
          <span id = "msgmunicipio" class="help-block" ></span>
            </div>
        </div>
    </div>

            </div>
              </div>
        </div>
    </div>
</div>
<div class="row">
    <img id="cargando" src="<?php echo assets_url(); ?>/img/ajax-loading.gif" style="display:none;" />

    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box light-grey">
            <div class="portlet-title">
                <div class="caption"><i class="fa fa-globe"></i>Datos de Contacto</div>
            </div>
            <div class="portlet-body">
                <div class="row">
                     <div class="col-md-12">
 <div class="col-md-4">
          <div class="form-group">
              <label class="control-label"><?php echo lang('nombre'); ?></label>
              <div>
                  <input id="txtnombre" class="form-control entrada" name="razon" readonly>
                  <span id = "msgrazon" class="help-block" ></span>
              </div>
          </div>

      </div>
     

       <div class="col-md-4">
          <div class="form-group">
              <label class="control-label"><?php echo lang('telefono'); ?></label>
              <div>
                  <input id="txttelefono" class="form-control entrada" name="rfc" style="text-transform:uppercase;" readonly>
                  <span id = "msgrfc" class="help-block" ></span>
              </div>
          </div>
      </div>
                 
            <div class="col-md-4">
          <div class="form-group">
              <label class="control-label"><?php echo lang('email'); ?></label>
              <div>
                  <input id="txtcorreo" class="form-control entrada" name="calle" readonly>
                  <span id = "msgcalle" class="help-block" ></span>
              </div>
          </div>
      </div>
       </div>
            </div>
             <div class="row">

            </div>
             
              </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="portlet box light-grey">
            <div class="portlet-title">
                <!-- <div class="caption"><i class="fa fa-globe"></i> Registros Control Químico (Semana <?php echo $semana; ?>)</div> -->
                <div class="caption"><i class="fa fa-globe"></i> Tickets a Facturar (<?php echo $registrosticketstotal;  ?>) </div>
                <div class="actions">

                  <!--  <div class="btn-group">
                        <a class="btn green" href="<?php echo base_url().sitio(); ?>/facturacion/registrar">
                            <i class="fa fa-plus-circle"></i> Agregar código
                        </a>
                    </div> -->
                    
                 <!--   <div class="btn-group">
                        <a href="#" class="btn dark dropdown-toggle" data-toggle="dropdown"> 
                            <i class="fa fa-cog"></i> <?php echo lang('btn_opciones'); ?>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu pull-right">   
                             <li><a href="<?php echo base_url().sitio(); ?>/control/exportarexcel/<?php echo $semana; ?>"><i class="fa fa-table"></i> Exportar a Excel</a></li> 
                        </ul>
                    </div> -->
                </div>
            </div>
            <div class="portlet-body">
                <table id="tblRegistros" class="table table-striped table-bordered table-hover dataTable" id="sample_1">
                    <thead>
                        <tr>
                            <!--<th class="table-checkbox"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>-->
                          <!--  <th>ID</th> -->
                            <th>TICKETS</th>
                            <th>ID</th>
                            <th>CÓDIGO</th>
                            <th>FOLIO</th>
                            <th>IVA (%)</th>                            
                            <th>TOTAL ($)</th>
                            <th>SERVICIO</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                     <?php foreach($registrostickets as $r){ ?>                            
                     <tr data-id="<?php echo $r['id']; ?>" id="row_<?php echo $r['id']; ?>">
                       <!-- <td><?php echo $r->id; ?></td> -->
                        <td><?php echo $r['noticket']; ?></td>
                        <td><?php echo $r['id']; ?></td>
                        <td><?php echo $r['codigo']; ?></td>
                        <td><?php echo $r['folio']; ?></td>
                        <td><?php echo $r['iva']; ?></td>
                        <td><?php echo $r['costo']; ?></td>
                        <td><?php echo $r['servicio']; ?></td>
                   </tr>
                   <?php } ?>
               </tbody>
           </table>
       </div>
   </div>
   <!-- END EXAMPLE TABLE PORTLET-->
</div>
 <div class="row">
  <div class="col-md-2 ">
  </div>
   <div class="col-md-8 ">
   <div class="row">
         <div class="col-md-4 ">
          <div class="form-group">
              <label class="control-label"><?php echo lang('factura'); ?></label>
              <div>
                  <input id="txtfactura" class="form-control entrada" name="razon" onkeypress="return isNumber(event)">
                  <span id = "msgfactura" class="help-block" ></span>
              </div>
          </div>

      </div>  
      <div class="col-md-4 ">
          <div class="form-group">
              <label class="control-label"><?php echo lang('fecha_factura'); ?></label>
             <input type="date" class="form-control" name="fecha" id="fecha" value="<?php echo date('Y-m-d') ?>" required>
              <span id = "msgfecha" class="help-block" ></span>
          </div>

      </div>  
      <div class="col-md-4 ">
          <div class="form-group">
              <label class="control-label"><?php echo lang('uso_comprobante'); ?></label>
              <input class="form-control entrada" name="usoComprobante" id="txtUsoComprobante" value="<?php echo $usocomprobante ?>" readonly>
              <span id = "msgfecha" class="help-block" ></span>
          </div>

      </div>
   </div>
   </div>
    <div class="col-md-2 ">
    </div>
     
  </div>
              <hr>
 <div class="row">
             
              <div class="col-md-5"></div>
                <div class="col-md-1"><a class="btn btn-success enviar_form1" id="guardar"><i class="fa fa-save"></i> MARCAR COMO FACTURADO </a></div>               
              </div>
</div>
<script type="text/javascript">
var urlbase  = '<?php echo base_url();?>';
var lgCboLoading = "<option value = ''>Cargando...</option>";

function cargar_municipios(dato){
var estado_id = $("#slc_estado").val();
$("#slc_municipio").html('');
  if(estado_id!=0){
    //$("#municipios").hide();
    //$("#comunidades").hide();
    $.ajax({  // Abre AJax
    url : urlbase +'facturacion.php/admin/get_municipio',
    type : 'post',
    data: {id:estado_id},
    async:false,
    dataType : 'json',
    success : function(dato) { // Abre Success
       crear_lista('municipio',dato);
       //  muestra_municipios();
    }, // Cierra Success
    error : function(jqXHR, status, error) { //Abre Error
        alert(error);
    } // Cierra Error
}); // Cierra Ajax
  }else{
   // $("#municipios").hide();
    //$("#comunidades").hide();
   // $("#alta_usuario").hide();
    //limpiar();
  }
}

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
  function crear_lista(slc,dato){
$("#slc_"+slc).html('');
$("#slc_"+slc).append('<option></option>');
  $.each(dato, function(i,item){
  $("#slc_"+slc).append('<option value='+dato[i]['id']+'>'+dato[i]['name']+'</option>');
        });
}

$("#guardar").on('click',function(){
  var _peticionid = <?php echo $id; ?>;
 if(validar_valores()){
    var objetoJson = { 
      nofactura:$('#txtfactura').val(),
      fecha:$('#fecha').val(),
      peticionid: _peticionid}; 
      url =   '<?php echo base_url(); ?>/facturacion.php/admin/marcarfacturado/';
      $.ajax({  // Abre AJax
      url : url,
      type : 'post',
      data: objetoJson,
      async:false,
      dataType : 'json',
      success : function(dato) { // Abre Success
       if(dato.estatus == 1){
           $("#msgusuarios").html('<div class="alert alert-success">'+
              '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
              '<strong><?php echo $this->lang->line("exito");?></strong> '+dato.msg+
            '</div>');
           //limpiar_us();
           toastr["success"]("Ticket actualizado correctamente");
           //window.location.href = url + 'facturacion.php/users/login';
           setTimeout("location.href = urlbase + 'facturacion.php/admin/pendientes'", 3000);
          }else{
            $("#msgusuarios").html('<div class="alert alert-danger">'+
              '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
              '<strong><?php echo $this->lang->line("error");?></strong> '+dato.msg+
            '</div>');
              toastr["success"]("Se han producido algún error inesperado.");
           // window.location.href = url + 'facturacion.php/home/altacliente';
           setTimeout("location.href = urlbase + 'facturacion.php/admin/pendientes'", 3000);
          }
      }, // Cierra Success
      error : function(jqXHR, status, error) { //Abre Error
          alert(error);
      } // Cierra Error
  }); // Cierra Ajax 
}
});
function validar_valores(){
  var cont = 0;
  if($('#txtfactura').val()==''){
      $('#msgfactura').html('');
      $('#msgfactura').append('<div class="alert alert-danger"><a class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> <?php echo $this->lang->line("error");?></strong>  <?php echo $this->lang->line("no_factura");?></div>'); 
      cont ++;
  }else{
    $('#msgfactura').html('');
  }
  if($('#fecha').val()==''){
      $('#msgfecha').html('');
      $('#msgfecha').append('<div class="alert alert-danger"><a class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> <?php echo $this->lang->line("error");?></strong> <?php echo $this->lang->line("no_fecha");?></div>'); 
      cont ++;
  }else{
    $('#msgfecha').html('');
  }

  if(cont>0){
      return false; 
  }else{
      return true;    
  }
  
}
$(document).ready(function() {

$("#datosf").hide();
$('#lblmsg').html("");
$('#lblmsg').hide();
$('#lblmsgcodigo').html("");
$('#lblmsgcodigo').hide();
var contCode = 0;
var arrCode = new Array();


if('<?php echo $id; ?>' > 0){
  $('#txtrfc').val('<?php echo $registros[0]['rfc']; ?>');
  $('#txtrazon').val('<?php echo $registros[0]['razon']; ?>');
  $('#txtcalle').val('<?php echo $registros[0]['direccion']; ?>');
  $('#txtcolonia').val('<?php echo $registros[0]['colonia']; ?>');
  $('#txtexterior').val('<?php echo $registros[0]['exterior']; ?>');
  if('<?php echo $registros[0]['interior']; ?>' == 0){
    $('#txtinterior').val('');
  }else{
    $('#txtinterior').val('<?php echo $registros[0]['interior']; ?>');
  }
  $('#slc_estado').val('<?php echo $registros[0]['estado_id']; ?>');
  cargar_municipios('<?php echo $registros[0]['municipio_id']; ?>');
  $('#slc_municipio').val('<?php echo $registros[0]['municipio_id']; ?>');
  $('#txtcp').val('<?php echo $registros[0]['cp']; ?>');
  $('#txtlocalidad').val('<?php echo $registros[0]['localidad']; ?>');
  $('#txtnombre').val('<?php echo $registrospersona[0]['nombre']; ?>');
  $('#txttelefono').val('<?php echo $registrospersona[0]['telefono']; ?>');
  $('#txtcorreo').val('<?php echo $registrospersona[0]['correo']; ?>');
  
}

});

</script>