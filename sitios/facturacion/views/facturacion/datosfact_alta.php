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
    <img id="cargando" src="<?php echo assets_url(); ?>/img/ajax-loading.gif" style="display:none;" />

    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box light-grey">
            <div class="portlet-title">
                <div class="caption"><i class="fa fa-globe"></i><?php echo $titulo; ?></div>
                <div class="actions">
                    <a href="<?php echo base_url() . sitio(); ?>/facturacion/datosfacturacion" class="btn btn-danger"><i class="fa fa-reply"></i> Volver</a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                     <div class="col-md-2">
          <div class="form-group">
              <label class="control-label"><?php echo lang('tipopersona'); ?></label>
              <div>
              <?php if($id > 0){ ?>
              <?php if($registros[0]['tipopersona'] == 1){ ?>
                <label class="inline"><input name="tipopersona" id="tipopersona" type="radio" value="1" checked/> Física</label> &nbsp; 
                <label class="inline"><input name="tipopersona" id="tipopersona2" type="radio" value="2"   /> Moral</label> 
              <?php }else{ ?>
              <label class="inline"><input name="tipopersona" id="tipopersona" type="radio" value="1"/> Física</label> &nbsp; 
                <label class="inline"><input name="tipopersona" id="tipopersona2" type="radio" value="2" checked  /> Moral</label>
              <?php } }else{ ?>
               <label class="inline"><input name="tipopersona" id="tipopersona" type="radio" value="1" checked/> Física</label> &nbsp; 
                <label class="inline"><input name="tipopersona" id="tipopersona2" type="radio" value="2"   /> Moral</label> 
              <?php } ?>
                
              </div>
          </div>
      </div>

       <div class="col-md-2">
          <div class="form-group">
              <label class="control-label"><?php echo lang('rfc'); ?></label>
              <div>
                  <input id="txtrfc" class="form-control entrada" name="rfc" style="text-transform:uppercase;">
                  <span id = "msgrfc" class="help-block" ></span>
              </div>
          </div>
      </div>
                  <div class="col-md-4">
          <div class="form-group">
              <label class="control-label"><?php echo lang('razon'); ?></label>
              <div>
                  <input id="txtrazon" class="form-control entrada" name="razon">
                  <span id = "msgrazon" class="help-block" ></span>
              </div>
          </div>

      </div>
            <div class="col-md-4">
          <div class="form-group">
              <label class="control-label"><?php echo lang('calle'); ?></label>
              <div>
                  <input id="txtcalle" class="form-control entrada" name="calle">
                  <span id = "msgcalle" class="help-block" ></span>
              </div>
          </div>
      </div>
            </div>
            <div class="row">
                    <div class="col-md-3">
          <div class="form-group">
              <label class="control-label"><?php echo lang('colonia'); ?></label>
              <div>
                  <input id="txtcolonia" class="form-control entrada" name="colonia">
                  <span id = "msgcolonia" class="help-block" ></span>
              </div>
          </div>
      </div>
            <div class="col-md-3">
          <div class="form-group">
              <label class="control-label"><?php echo lang('exterior'); ?></label>
              <div>
                  <input id="txtexterior" class="form-control entrada" name="exterior">
                  <span id = "msgexterior" class="help-block" ></span>
              </div>
          </div>
      </div>
      <div class="col-md-3">
          <div class="form-group">
              <label class="control-label"><?php echo lang('interior'); ?></label>
              <div>
                  <input id="txtinterior" class="form-control entrada" name="interior">
                  <span id = "msginterior" class="help-block" ></span>
              </div>
          </div>
      </div>
            <div class="col-md-3">
          <div class="form-group">
              <label class="control-label"><?php echo lang('cp'); ?></label>
              <div>
                  <input id="txtcp" class="form-control entrada" name="cp">
                  <span id = "msgcp" class="help-block" ></span>
              </div>
          </div>
      </div>
            </div>
          
             <div class="row">
                    <div class="col-md-4">
          <div class="form-group">
              <label class="control-label"><?php echo lang('estado'); ?></label>
              <div>
                <select class="select2_demo_1 form-control " id="slc_estado" >
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
                <select class="select2_demo_1 form-control " id="slc_municipio">
                 <option>...</option>
                </select>
          <span id = "msgmunicipio" class="help-block" ></span>
            </div>
        </div>
    </div>
        <div class="col-md-4">
        <div class="form-group">
            <label class="control-label"><?php echo lang('localidad'); ?></label>
             <div>
                <input id="txtlocalidad" class="form-control entrada" name="localidad">
                 <span id = "msglocalidad" class="help-block" ></span>
            </div>
        </div>
    </div>
            </div>
             <div class="row">

            </div>
              <hr>
              <div class="row">
             
              <div class="col-md-4"></div>
                <div class="col-md-1"><a class="btn btn-success enviar_form1" id="guardar"><i class="fa fa-save"></i> Guardar </a></div>
                   <div class="col-md-2"><a class="btn btn-danger" id="limpiar"><i class="fa fa-reply"></i>   Limpiar </a></div>                 
              </div>
              </div>
        </div>
    </div>
</div>


<script type="text/javascript">
var urlbase  = '<?php echo base_url();?>';
var lgCboLoading = "<option value = ''>Cargando...</option>";

$("#limpiar").on('click',function(){
  $('#tipopersona').val("");
  $('#txtrfc').val("");
  $('#txtrazon').val("");
  $('#txtcalle').val("");
  $('#txtcolonia').val("");
  $('#txtexterior').val("");
  $('#txtinterior').val("");
  $('#txtcp').val("");
  $('#txtlocalidad').val("");
  });
/*Estado*/
$("#slc_estado").on('change',function(){
  var estado_id = $("#slc_estado").val();
  $("#slc_municipio").html('');
  if(estado_id!=0){
    //$("#municipios").hide();
    //$("#comunidades").hide();
    $.ajax({  // Abre AJax
    url : urlbase +'facturacion.php/facturacion/get_municipio',
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
});
  /*Fin de estado*/
function cargar_municipios(dato){
var estado_id = $("#slc_estado").val();
$("#slc_municipio").html('');
  if(estado_id!=0){
    //$("#municipios").hide();
    //$("#comunidades").hide();
    $.ajax({  // Abre AJax
    url : urlbase +'facturacion.php/facturacion/get_municipio',
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
  function crear_lista(slc,dato){
$("#slc_"+slc).html('');
$("#slc_"+slc).append('<option></option>');
  $.each(dato, function(i,item){
  $("#slc_"+slc).append('<option value='+dato[i]['id']+'>'+dato[i]['name']+'</option>');
        });
}
$("#txtrfc").on('focusout',function(){
if(validar_rfc()){
   $('#msgrfc').html('');
}
});
function validar_rfc(){
  var valor = $('#txtrfc').val();
  valor = valor.toUpperCase();
  var filter = /^([A-ZÑ\x26]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[A-Z|\d]{3})$/;
  console.log(valor);
    if(filter.test(valor)){
        return true;
    }else{
        $('#msgrfc').html('');
        $('#msgrfc').append('<div class="alert alert-danger"><a class="close" data-dismiss="alert" aria-label="close">&times;</a><strong><?php echo $this->lang->line("error");?></strong> <?php echo $this->lang->line("rfcnovalido");?></div>'); 
        return false;
    }
}
$("#guardar").on('click',function(){
 if(validar_valores()){
   if(validar_rfc()){
    if('<?php echo $id; ?>' > 0){
      var iddatosfact = '<?php echo $id; ?>';
      url = urlbase+'facturacion.php/facturacion/update_datosfacturacion';
    }else{
      var iddatosfact = 0;
      url = urlbase+'facturacion.php/facturacion/add_datosfacturacion';
    }
     var _tipopersona = $('input:radio[name=tipopersona]:checked').val();
    var rfc = $('#txtrfc').val();
    rfc = rfc.toUpperCase();
    var objetoJson = { 
      tipopersona: _tipopersona,
      id:iddatosfact,
      rfc:rfc,
      razon:$('#txtrazon').val(),
      calle:$('#txtcalle').val(),
      colonia:$('#txtcolonia').val(),
      exterior:$('#txtexterior').val(),
      interior:$('#txtinterior').val(),
      cp:$('#txtcp').val(),
      localidad:$('#txtlocalidad').val(),
      estado_id:$("#slc_estado").val(),
      municipio_id:$("#slc_municipio").val()}; 
        
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
           toastr["success"]("Se han guardado tus datos correctamente");
           //window.location.href = url + 'facturacion.php/users/login';
           setTimeout("location.href = urlbase + 'facturacion.php/facturacion/datosfacturacion'", 3000);
          }else{
            $("#msgusuarios").html('<div class="alert alert-danger">'+
              '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
              '<strong><?php echo $this->lang->line("error");?></strong> '+dato.msg+
            '</div>');
              toastr["success"]("Se han producido algún error inesperado.");
           // window.location.href = url + 'facturacion.php/home/altacliente';
           setTimeout("location.href = urlbase + 'facturacion.php/home/altacliente'", 3000);
          }
      }, // Cierra Success
      error : function(jqXHR, status, error) { //Abre Error
          alert(error);
      } // Cierra Error
  }); // Cierra Ajax 
  }
}
});
function validar_valores(){
  var cont = 0;
  if($('#txtrfc').val()==''){
      $('#msgrfc').html('');
      $('#msgrfc').append('<div class="alert alert-danger"><a class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> <?php echo $this->lang->line("error");?></strong>  <?php echo $this->lang->line("no_rfc");?></div>'); 
      cont ++;
  }
  if($('#txtrazon').val()==''){
      $('#msgrazon').html('');
      $('#msgrazon').append('<div class="alert alert-danger"><a class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> <?php echo $this->lang->line("error");?></strong> <?php echo $this->lang->line("no_razon");?></div>'); 
      cont ++;
  }
  if($('#txtcalle').val()==''){
      $('#msgcalle').html('');
      $('#msgcalle').append('<div class="alert alert-danger"><a class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> <?php echo $this->lang->line("error");?></strong> <?php echo $this->lang->line("no_calle");?></div>'); 
      cont ++;
  }
  if($('#txtcolonia').val()==''){
      $('#msgcolonia').html('');
      $('#msgcolonia').append('<div class="alert alert-danger"><a class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> <?php echo $this->lang->line("error");?></strong> <?php echo $this->lang->line("no_colonia");?></div>'); 
      cont ++;
  }
  if($('#txtexterior').val()==''){
      $('#msgexterior').html('');
      $('#msgexterior').append('<div class="alert alert-danger"><a class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> <?php echo $this->lang->line("error");?></strong> <?php echo $this->lang->line("no_exterior");?></div>'); 
      cont ++;
  }
  if($('#txtcp').val()==''){
      $('#msgcp').html('');
      $('#msgcp').append('<div class="alert alert-danger"><a class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> <?php echo $this->lang->line("error");?></strong> <?php echo $this->lang->line("no_cp");?></div>'); 
      cont ++;
  }
  if($('#slc_estado').val()==''){
      $('#msgestado').html('');
      $('#msgestado').append('<div class="alert alert-danger"><a class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> <?php echo $this->lang->line("error");?></strong> <?php echo $this->lang->line("no_estado");?></div>'); 
      cont ++;
  }
  if($('#slc_municipio').val()==''){
      $('#msgmunicipio').html('');
      $('#msgmunicipio').append('<div class="alert alert-danger"><a class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> <?php echo $this->lang->line("error");?></strong> <?php echo $this->lang->line("no_municipio");?></div>'); 
      cont ++;
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
  
}

});

</script>