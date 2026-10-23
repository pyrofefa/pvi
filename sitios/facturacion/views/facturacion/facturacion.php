<!-- <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/select2/select2.full.min.js"></script> -->
    <link href="<?php echo base_url(); ?>assets/plugins/toastr/toastr.css" rel="stylesheet" />
    <script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>

    <div class="panel panel-default">
      <div class="panel-body">
          <h1 class="text-navy"><?php echo lang('titulo_alta'); ?></h1>
          <p><?php echo lang('descripcion_alta'); ?></p>

      </div>
  </div>
<form class="form">
  <div id="formUser" class="portlet box green">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-user"></i>
            <span id="headTitle">Datos de contacto</span>
        </div>
    </div>
    <div class="portlet-body form">
        <div class="panel panel-default">
         <div class="panel-body">
          <div class="col-md-4">
              <div class="form-group">
                  <label class="control-label"><?php echo lang('nombre'); ?></label>
                  <div>
                      <input id="txtnombre" class="form-control entrada" name="nombre" id="nombre">
                      <span id = "msgnombre" class="help-block" ></span>
                  </div>
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                  <label class="control-label"><?php echo lang('paterno'); ?></label>
                  <div>
                      <input id="txtpaterno" class="form-control entrada" name="paterno" id="paterno">
                      <span id = "msgpaterno" class="help-block" ></span>
                  </div>
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                  <label class="control-label"><?php echo lang('materno'); ?></label>
                  <div>
                      <input id="txtmaterno" class="form-control entrada"  name="materno" id="materno">
                      <span id = "msgmaterno" class="help-block" ></span>
                  </div>
              </div>
          </div>
          <div class="clearfix"></div>
          <div class="col-md-4">
              <div class="form-group">
                  <label class="control-label"><?php echo lang('telefono'); ?></label>
                  <div>
                      <input id="txttelefono" class="form-control entrada"  name="telefono" id="telefono">
                      <span id = "msgtelefono" class="help-block" ></span>
                  </div>
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                  <label class="control-label"><?php echo lang('email'); ?></label>
                  <div>
                      <input id="txtcorreo" class="form-control entrada" id="correo" name="correo">
                      <span id = "msgcorreo" class="help-block" ></span>
                  </div>
              </div>
          </div>
      </div>
  </div>    
</div>
<div class="portlet-title">
    <div class="caption">
        <i class="fa fa-user"></i>
        <span id="headTitle">Datos de Facturación</span>
    </div>
</div>
<div class="portlet-body form">
    <div class="panel panel-default">
     <div class="panel-body">
      <div class="col-md-4">
          <div class="form-group">
              <label class="control-label"><?php echo lang('rfc'); ?></label>
              <div>
                  <input id="txtrfc" class="form-control entrada" name="rfc" id="rfc">
                  <span id = "msgrfc" class="help-block" ></span>
              </div>
          </div>
      </div>
      <div class="col-md-4">
          <div class="form-group">
              <label class="control-label"><?php echo lang('razon'); ?></label>
              <div>
                  <input id="txtrazon" class="form-control entrada" name="razon" id="razon">
                  <span id = "msgrazon" class="help-block" ></span>
              </div>
          </div>
      </div>
      <div class="col-md-4">
          <div class="form-group">
              <label class="control-label"><?php echo lang('calle'); ?></label>
              <div>
                  <input id="txtcalle" class="form-control entrada" name="calle" id="calle">
                  <span id = "msgcalle" class="help-block" ></span>
              </div>
          </div>
      </div>
      <div class="col-md-4">
          <div class="form-group">
              <label class="control-label"><?php echo lang('colonia'); ?></label>
              <div>
                  <input id="txtcolonia" class="form-control entrada" name="colonia" id="colonia">
                  <span id = "msgcolonia" class="help-block" ></span>
              </div>
          </div>
      </div>
      <div class="col-md-2">
          <div class="form-group">
              <label class="control-label"><?php echo lang('exterior'); ?></label>
              <div>
                  <input id="txtexterior" class="form-control entrada" name="exterior" id="exterior">
                  <span id = "msgexterior" class="help-block" ></span>
              </div>
          </div>
      </div>
      <div class="col-md-2">
          <div class="form-group">
              <label class="control-label"><?php echo lang('interior'); ?></label>
              <div>
                  <input id="txtinterior" class="form-control entrada" name="interior" id="interior">
                  <span id = "msginterior" class="help-block" ></span>
              </div>
          </div>
      </div>
      <div class="col-md-2">
          <div class="form-group">
              <label class="control-label"><?php echo lang('cp'); ?></label>
              <div>
                  <input id="txtcp" class="form-control entrada" name="cp" id="cp">
                  <span id = "msgcp" class="help-block" ></span>
              </div>
          </div>
      </div>
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
                <input id="txtlocalidad" class="form-control entrada" name="localidad" id="localidad">
                 <span id = "msglocalidad" class="help-block" ></span>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<div class="portlet-title">
    <div class="caption">
        <i class="fa fa-user"></i>
        <span id="headTitle">Datos de Acceso</span>
    </div>
</div>
<div class="portlet-body form">
    <div class="panel panel-default">
     <div class="panel-body">
           <div class="col-md-4">
          <div class="form-group">
              <label class="control-label"><?php echo lang('usuario'); ?></label>
              <div>
                  <input  class="form-control entrada" id="usuario" name="usuario" style="">
                  <span id = "msgusuario" class="help-block" ></span>
              </div>
          </div>
      </div>
      <div class="col-md-4">
          <div class="form-group">
              <label class="control-label"><?php echo lang('contrasena'); ?></label>
              <div>
                  <input type="password" class="form-control entrada" id="password" name="password">
                  <span id = "msgpassword" class="help-block" ></span>
              </div>
          </div>
      </div>
      <div class="col-md-4">
          <div class="form-group">
              <label class="control-label"><?php echo lang('confirmar'); ?></label>
              <div>
                  <input type="password" class="form-control entrada" id="password_dos" name="password_dos">
                  <span id = "msgpassword_dos" class="help-block" ></span>
              </div>
          </div>
      </div>
      </div>
      </div>
      </div>
 
  <div class="panel panel-default">
    <div class="panel-body">
    <div class="col-md-4 col-md-offset-4">
      <a class="btn btn-primary" id="guardar"> 
        <i class="fa fa-save"></i>
        <?php echo lang('btn_guardar'); ?>
      </a>
      <a class="btn btn-danger" id="limpiar"> 
        <i class="fa fa-reply"></i>
        <?php echo lang('btn_limpiar'); ?>
      </a>
    </div>
    </div>
  </div>

</div>
</form>
<script type="text/javascript">

var url  = '<?php echo base_url();?>';
//console.log(url);

$("#limpiar").on('click',function(){
  $('#txtnombre').val("");
  $('#txtpaterno').val("");
  $('#txtmaterno').val("");
  $('#txttelefono').val("");
  $('#txtcorreo').val("");
  $('#txtrfc').val("");
  $('#txtrazon').val("");
  $('#txtcalle').val("");
  $('#txtcolonia').val("");
  $('#txtexterior').val("");
  $('#txtinterior').val("");
  $('#txtcp').val("");
  $('#txtlocalidad').val("");
  $('#usuario').val("");
  $('#password').val("");
  $('#password_dos').val("");
  });

 /*Estado*/
$("#slc_estado").on('change',function(){
  var estado_id = $("#slc_estado").val();
  $("#slc_municipio").html('');
  if(estado_id!=0){
    //$("#municipios").hide();
    //$("#comunidades").hide();
    $.ajax({  // Abre AJax
    url : url+'facturacion.php/home/get_municipio',
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

function crear_lista(slc,dato){
$("#slc_"+slc).html('');
$("#slc_"+slc).append('<option></option>');
  $.each(dato, function(i,item){
  $("#slc_"+slc).append('<option value='+dato[i]['id']+'>'+dato[i]['name']+'</option>');
        });
}

$("#guardar").on('click',function(){
 if(validar_valores()){
  if(validar_email()){
    if(validar_usuario()){
      if(password_formato($('#password').val())){
        if(validar_contra()){

        /*var sitios = [];
        $('.checksitios:checked').each(function() { sitios.push($(this).val()); });*/

    var objetoJson = { 
      nivel:3, 
      nombre:$('#txtnombre').val(),
      paterno:$('#txtpaterno').val(),
      materno:$('#txtmaterno').val(),
      telefono:$('#txttelefono').val(),
      correo:$('#txtcorreo').val(),
      rfc:$('#txtrfc').val(),
      razon:$('#txtrazon').val(),
      calle:$('#txtcalle').val(),
      colonia:$('#txtcolonia').val(),
      exterior:$('#txtexterior').val(),
      interior:$('#txtinterior').val(),
      cp:$('#txtcp').val(),
      localidad:$('#txtlocalidad').val(),
      usuario:$('#usuario').val(),
      password:$('#password').val(),
      estado_id:$("#slc_estado").val(),
      municipio_id:$("#slc_municipio").val()}; 
        
      $.ajax({  // Abre AJax
      url : url+'facturacion.php/home/add_user',
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
           setTimeout("location.href = url + 'facturacion.php/users/login'", 3000);
          }else{
            $("#msgusuarios").html('<div class="alert alert-danger">'+
              '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
              '<strong><?php echo $this->lang->line("error");?></strong> '+dato.msg+
            '</div>');
              toastr["success"]("Se han producido algún error inesperado.");
           // window.location.href = url + 'facturacion.php/home/altacliente';
           setTimeout("location.href = url + 'facturacion.php/home/altacliente'", 3000);
          }
      }, // Cierra Success
      error : function(jqXHR, status, error) { //Abre Error
          alert(error);
      } // Cierra Error
  }); // Cierra Ajax 
      
  }else{
    $('#msgpassword_dos').html('');
    $('#msgpassword_dos').append('<div class="alert alert-danger"><a class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
      '<strong><?php echo $this->lang->line("error");?></strong> <?php echo $this->lang->line("no_iguales");?></div>'); 
  }

  }else{
    $('#msgpassword').append('<div class="alert alert-danger"><a class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
    '<strong><?php echo $this->lang->line("msg_adv");?></strong> <?php echo $this->lang->line("msg_contra_insegura");?></div>'); 
    
  }
    }
  }
}
});

function validar_valores(){
  var cont = 0;
  if($('#txtnombre').val()==''){
          $('#msgnombre').html('');
      $('#msgnombre').append('<div class="alert alert-danger"><a class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> <?php echo $this->lang->line("error");?></strong>  <?php echo $this->lang->line("no_nombre");?></div>'); 
      cont ++;
  }
  if($('#txtpaterno').val()==''){
      $('#msgpaterno').html('');
      $('#msgpaterno').append('<div class="alert alert-danger"><a class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> <?php echo $this->lang->line("error");?></strong> <?php echo $this->lang->line("no_paterno");?></div>'); 
      cont ++;
  }
  if($('#txtcorreo').val()==''){
      $('#msgcorreo').html('');
      $('#msgcorreo').append('<div class="alert alert-danger"><a class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> <?php echo $this->lang->line("error");?></strong> <?php echo $this->lang->line("no_mail");?></div>'); 
      cont ++;
  }
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
  /*if($('#sexo').val()==''){
      $('#msgsexo').html('');
      $('#msgsexo').append('<div class="alert alert-danger"><a class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> <?php echo $this->lang->line("error");?></strong> <?php echo $this->lang->line("no_sexo");?></div>'); 
      cont ++;
  }*/

  if($('#usuario').val()==''){
      $('#msgusuario').html('');
      $('#msgusuario').append('<div class="alert alert-danger"><a class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> <?php echo $this->lang->line("error");?></strong> <?php echo $this->lang->line("no_usuario");?></div>'); 
      cont ++;
  }
  if($('#password').val()==''){
      $('#msgpassword').html('');
      $('#msgpassword').append('<div class="alert alert-danger"><a class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> <?php echo $this->lang->line("error");?></strong> <?php echo $this->lang->line("no_pass");?></div>'); 
      cont ++;
  }

  if($('#password_dos').val()==''){
      $('#msgpassword_dos').html('');
      $('#msgpassword_dos').append('<div class="alert alert-danger"><a class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> <?php echo $this->lang->line("error");?></strong> <?php echo $this->lang->line("no_pass_dos");?></div>'); 
      cont ++;
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

function validar_usuario(){
  var resp = false;
  var objetoJson = {username:$("#usuario").val()};
 $.ajax({  // Abre AJax
    url : url+'facturacion.php/home/get_username',
    type : 'post',
    data: objetoJson,
    async:false,
    dataType : 'json',
    success : function(dato) { // Abre Success
     if(dato.estatus == 1){
         resp = true;
        }else{
          $("#msgusuario").html('<div class="alert alert-danger">'+
            '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
            '<strong><?php echo $this->lang->line("error");?></strong> '+dato.msg+
          '</div>');
          resp = false
        }
    }, // Cierra Success
    error : function(jqXHR, status, error) { //Abre Error
        alert(error);
    } // Cierra Error
}); // Cierra Ajax
return resp;
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
  var pass = $("#password").val();
  var pass_2 = $("#password_dos").val();
    if(pass != pass_2){
      resp = false;
    }else{
      resp = true;
    }
  return resp;
}
</script>