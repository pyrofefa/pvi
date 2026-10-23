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
              <label class="control-label center display"><?php echo lang('actualpass'); ?></label>
              <div>
                  <input type="password" id="txtpass" class="form-control entrada" name="razon">
                  <span id = "msgpass" class="help-block" ></span>
              </div>
          </div>   
      </div>
            </div>
            <div class="row">
            <div class="col-md-3 col-md-push-4">
          <div class="form-group">
              <label class="control-label center display"><?php echo lang('newpass'); ?></label>
              <div>
                  <input type="password" id="txtnewpass" class="form-control entrada" name="exterior">
                  <span id = "msgnewpass" class="help-block" ></span>
              </div>
          </div>
      </div>
            </div>
          
             <div class="row">
        <div class="col-md-3 col-md-push-4">
        <div class="form-group">
            <label class="control-label center display"><?php echo lang('confirmpass'); ?></label>
             <div>
                <input type="password" id="txtrepeatpass" class="form-control entrada" name="localidad">
                 <span id = "msgrepeatpass" class="help-block" ></span>
            </div>
        </div>
    </div>
            </div>
             <div class="row">

            </div>
              <hr>
              <div class="row">
                <div class="col-md-12 col-md-push-5"><a class="btn btn-success enviar_form1" id="guardar"><i class="fa fa-save"></i> Cambiar </a></div>                
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
  if(validar_actual()){
    if(password_formato($('#txtnewpass').val())){
      if(validar_contra()){
    url =   '<?php echo base_url(); ?>/facturacion.php/facturacion/updatepassnew/';
    var passnew = $('#txtnewpass').val();
    data= { "pass" : passnew };
      $.ajax({  // Abre AJax
      url : url,
      type : 'post',
      data: data,
      async:false,
      dataType : 'json',
      success : function(dato) { // Abre Success
       if(dato.estatus == 1){
           $("#msgusuarios").html('<div class="alert alert-success">'+
              '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
              '<strong><?php echo $this->lang->line("exito");?></strong> '+dato.msg+
            '</div>');
           
           toastr["success"]("Se ha actualizado tus contraseña correctamente");
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
    }else{
       $('#msgrepeatpass').html('');
    $('#msgrepeatpass').append('<div class="alert alert-danger"><a class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
      '<strong><?php echo $this->lang->line("error");?></strong> <?php echo $this->lang->line("no_iguales");?></div>'); 
    }
  }else{
    $('#msgnewpass').append('<div class="alert alert-danger"><a class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
    '<strong><?php echo $this->lang->line("msg_adv");?></strong> <?php echo $this->lang->line("msg_contra_insegura");?></div>'); 
    
  }
}else{
  $('#msgpass').append('<div class="alert alert-danger"><a class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
    '<strong><?php echo $this->lang->line("msg_adv");?></strong> <?php echo $this->lang->line("no_pass_new_coincide");?></div>'); 
}
}
});
function validar_valores(){
  var cont = 0;
  if($('#txtpass').val()==''){
      $('#msgpass').html('');
      $('#msgpass').append('<div class="alert alert-danger"><a class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> <?php echo $this->lang->line("error");?></strong>  <?php echo $this->lang->line("no_pass2");?></div>'); 
      cont ++;
  }else{
    $('#msgpass').html('');
  }
  if($('#txtnewpass').val()==''){
      $('#msgnewpass').html('');
      $('#msgnewpass').append('<div class="alert alert-danger"><a class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> <?php echo $this->lang->line("error");?></strong> <?php echo $this->lang->line("no_pass_new");?></div>'); 
      cont ++;
  }else{
    $('#msgnewpass').html('');
  }
  if($('#txtrepeatpass').val()==''){
      $('#msgrepeatpass').html('');
      $('#msgrepeatpass').append('<div class="alert alert-danger"><a class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> <?php echo $this->lang->line("error");?></strong> <?php echo $this->lang->line("no_pass_new_repeat");?></div>'); 
      cont ++;
  }else{
     $('#msgrepeatpass').html('');
  }
  if(cont>0){
      return false; 
  }else{
      return true;    
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


});

</script>