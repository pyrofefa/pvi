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
        <div class="col-md-3 col-md-push-4"> 
          <div class="form-group">
              <label class="control-label center display"><?php echo lang('nombre'); ?></label>
              <div>
                  <input id="txtnombre" class="form-control entrada" name="razon">
                  <span id = "msgnombre" class="help-block" ></span>
              </div>
          </div>   
      </div>
            </div>
            <div class="row">
            <div class="col-md-3 col-md-push-4">
          <div class="form-group">
              <label class="control-label center display"><?php echo lang('paterno'); ?></label>
              <div>
                  <input id="txtpaterno" class="form-control entrada" name="exterior">
                  <span id = "msgpaterno" class="help-block" ></span>
              </div>
          </div>
      </div>
            </div>
          
             <div class="row">
        <div class="col-md-3 col-md-push-4">
        <div class="form-group">
            <label class="control-label center display"><?php echo lang('materno'); ?></label>
             <div>
                <input id="txtmaterno" class="form-control entrada" name="localidad">
                 <span id = "msgmaterno" class="help-block" ></span>
            </div>
        </div>
    </div>
            </div>
                         <div class="row">
        <div class="col-md-3 col-md-push-4">
        <div class="form-group">
            <label class="control-label center display"><?php echo lang('telefono'); ?></label>
             <div>
                <input id="txttelefono" class="form-control entrada" name="localidad">
                 <span id = "msgtelefono" class="help-block" ></span>
            </div>
        </div>
    </div>
            </div>
                         <div class="row">
        <div class="col-md-3 col-md-push-4">
        <div class="form-group">
            <label class="control-label center display"><?php echo lang('email'); ?></label>
             <div>
                <input id="txtcorreo" class="form-control entrada" name="localidad">
                 <span id = "msgcorreo" class="help-block" ></span>
            </div>
        </div>
    </div>
            </div>
             <div class="row">

            </div>
              <hr>
              <div class="row">
                <div class="col-md-12 col-md-push-5"><a class="btn btn-success enviar_form1" id="guardar"><i class="fa fa-save"></i> Guardar </a></div>                
              </div>
              </div>
        </div>
    </div>
</div>


<script type="text/javascript">
var urlbase  = '<?php echo base_url();?>';
var lgCboLoading = "<option value = ''>Cargando...</option>";

$("#guardar").on('click',function(){
 if(validar_valores()){
  if(validar_email()){
    url =   '<?php echo base_url(); ?>/facturacion.php/facturacion/updatepersonalnew/';
    var objetoJson = { 
      nombre:$('#txtnombre').val(),
      paterno:$('#txtpaterno').val(),
      materno:$('#txtmaterno').val(),
      telefono:$('#txttelefono').val(),
      correo:$('#txtcorreo').val()}; 
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
           
           toastr["success"]("Se han actualizado tus datos personales");
           setTimeout("location.href = urlbase + 'facturacion.php/facturacion/datosfacturacion'", 3000);
          }else{
            $("#msgusuarios").html('<div class="alert alert-danger">'+
              '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
              '<strong><?php echo $this->lang->line("error");?></strong> '+dato.msg+
            '</div>');
              toastr["success"]("Se han producido algún error inesperado.");
           setTimeout("location.href = urlbase + 'facturacion.php/facturacion/datosfacturacion'", 3000);
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
  if($('#txtnombre').val()==''){
      $('#msgnombre').html('');
      $('#msgnombre').append('<div class="alert alert-danger"><a class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> <?php echo $this->lang->line("error");?></strong>  <?php echo $this->lang->line("no_nombre");?></div>'); 
      cont ++;
  }else{
    $('#msgnombre').html('');
  }
  if($('#txtpaterno').val()==''){
      $('#msgpaterno').html('');
      $('#msgpaterno').append('<div class="alert alert-danger"><a class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> <?php echo $this->lang->line("error");?></strong> <?php echo $this->lang->line("no_paterno");?></div>'); 
      cont ++;
  }else{
    $('#msgpaterno').html('');
  }
  if($('#txtcorreo').val()==''){
      $('#msgcorreo').html('');
      $('#msgcorreo').append('<div class="alert alert-danger"><a class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> <?php echo $this->lang->line("error");?></strong> <?php echo $this->lang->line("no_mail");?></div>'); 
      cont ++;
  }else{
     $('#msgcorreo').html('');
  }
  if(cont>0){
      return false; 
  }else{
      return true;    
  }
  
}
function validar_email(){
  var valor = $('#txtcorreo').val();
  var filter = /[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
    if(filter.test(valor)){
        return true;
    }else{
        $('#msgcorreo').html('');
        $('#msgcorreo').append('<div class="alert alert-danger"><a class="close" data-dismiss="alert" aria-label="close">&times;</a><strong><?php echo $this->lang->line("error");?></strong> <?php echo $this->lang->line("correo_no_valido");?></div>'); 
        return false;
    }
}
function password_formato(pass){
  var con = 0;
  var res = false;
    if (pass.length > 6 ) {
        con++;
    }
   /* //validate letter
    if ( pass.match(/[A-z]/) ) {
        con++;
    } 
    //validate capital letter
    if ( pass.match(/[A-Z]/) ) {
         con++;
    }
    //validate number
    if ( pass.match(/\d/) ) {
         con++;
    } */
      if(con == 1){
        res = true;
        }else{
        res = false;
      }
    return res;

}
function validar_contra(){
  var resp = false;
  var pass = $("#txtnewpass").val();
  var pass_2 = $("#txtrepeatpass").val();
    if(pass != pass_2){
      resp = false;
    }else{
      resp = true;
    }
  return resp;
}
function validar_actual(){
  var regresar = false;
  var pass = $('#txtpass').val();
   url =   '<?php echo base_url(); ?>/facturacion.php/facturacion/getinfopass/';
   data= { "pass" : pass };
   $.ajax({ 
      url         : url,
      type        : 'post',
      data        : data,
      dataType    :'json',
      async       : false, 
      success     : function(dato) { // Abre Success
          if(dato.estatus == 1){
              regresar = true;
          }else{
             regresar = false;
          }
      }, // Cierra Success
      error : function(jqXHR, status, error) { //Abre Error
      regresar = false;
         // dato_return.estatus = 0;
         // dato_return.msg     = error;
          console.log(error);
      }
  });
   return regresar;

}
$(document).ready(function() {
  $('#txtnombre').val('<?php echo $registros[0]['nombre']; ?>');
  $('#txtpaterno').val('<?php echo $registros[0]['apellido_paterno']; ?>');
  $('#txtmaterno').val('<?php echo $registros[0]['apellido_materno']; ?>');
  $('#txttelefono').val('<?php echo $registros[0]['telefono']; ?>');
  $('#txtcorreo').val('<?php echo $registros[0]['correo']; ?>');

});

</script>