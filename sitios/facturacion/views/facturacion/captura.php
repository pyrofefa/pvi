<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery-ui-1.10.2.custom.css"  />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery.multiselect.css" />
<link rel="stylesheet" type="text/css" href="<?php echo assets_url(); ?>plugins/select2/select2_metro.css" />
<script type="text/javascript" src="<?php echo assets_url(); ?>plugins/jquery-multi-select/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery/jquery.multiselect.filter.js"></script>
<script type="text/javascript" src="<?php echo assets_url(); ?>plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datepicker.js"></script>


<script type="text/javascript" src="<?php echo assets_url(); ?>../js/qr/html5-qrcode.min.js"></script>
<script type="text/javascript" src="<?php echo assets_url(); ?>../js/qr/jsqrcode-combined.min.js"></script>


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
  <audio id="audio" src="<?php echo assets_url(); ?>../js/qr/beep.wav" autostart="false" ></audio>

  <div class="col-md-12">
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
    <div class="portlet box light-grey">
      <div class="portlet-title">
        <div class="caption"><i class="fa fa-globe"></i><?php echo $titulo; ?></div>
        <div class="actions">
          <a href="<?php echo base_url() . sitio(); ?>/facturacion/codigos" class="btn btn-danger"><i class="fa fa-reply"></i> Volver</a>
        </div>
      </div>
      <div class="portlet-body">

        <div class="row">
          <div class="col-md-3 right">
            <label for="thue_name" class="control-label ">Código:</label>
          </div>

          <div class="col-md-4">
            <div class="input-icon right"><input type="text" name="thue_name" value=""  id = 'txtcodigo' class='required  form-control' /></div>
          </div>
          <div class="col-md-1"><a class="btn btn-warning " id="btnLeerQR"><i class="fa fa-qrcode"></i> QR</a></div>
          <div class="col-md-push-4"><a class="btn btn-info enviar_form1" id="btnagregarcodigo">Validar </a></div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <center>
              <div id="reader" style="width: 400px; height: 400px;"></div>
            </center>
          </div>
        </div>

        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
           <span id ="lblmsg" class="help-block center"></span>
         </div>

         <!--   <label for="thue_name" class="label-danger col-md-8 control-label center" id="lblmsg"></label> -->
         <div class="col-md-2"></div>
       </div>
       <hr>
       <div class="row">
        <div class="col-md-12">
          <div class="table-responsive">
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Código</th>
                  <th>Fecha</th>
                  <th>Precio</th>
                  <th>Servicio</th>
                  <th></th>                                    
                </tr>
              </thead>
              <tbody id="table_body">

              </tbody>
            </table>
          </div>

        </div>
      </div>
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
         <span id ="lblmsgcodigo" class="help-block center"></span>
       </div>

       <!--   <label for="thue_name" class="label-danger col-md-8 control-label center" id="lblmsg"></label> -->
       <div class="col-md-2"></div>
     </div>
     <hr>
    <div class="row">
      <label for="uso_comprobante" class="col-md-4 control-label right">Uso de comprobante:</label>
      <div class="col-md-2 col-sm-12">
        <select class="form-control" id="cbo_uso" required>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
       <span id ="lblmsguso" class="help-block center"></span>
     </div>
     <div class="col-md-2"></div>
   </div>
   <hr>
     <div class="row">
      <label for="thue_name" class="col-md-4 control-label right">Datos de facturación:</label>
      <div class="col-md-2 col-sm-12">
        <select class="form-control" id="cbo_datosf" required>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
       <span id ="lblmsgdatosf" class="help-block center"></span>
     </div>

     <!--   <label for="thue_name" class="label-danger col-md-8 control-label center" id="lblmsg"></label> -->
     <div class="col-md-2"></div>
   </div>
   <hr>
   <div id="datosf">
    <div class="row">
     <label for="thue_name" class="col-md-4 control-label">Nombre o Razón Social:</label>
     <label for="thue_name" class="col-md-4 control-label">Código Postal:</label>
     <label for="thue_name" class="col-md-4 control-label">Calle:</label>
   </div>
   <div class="row">

    <div class="col-md-4"><div class="input-icon right"><i class="fa"></i><input type="text" name="thue_name" value=""  id = 'txtrazon' class='required  form-control' readonly ' /></div>
  </div>
  <div class="col-md-4"><div class="input-icon right"><i class="fa"></i><input type="text" name="thue_name" value=""  id = 'txtcp' class='required  form-control' readonly ' /></div>
</div>
<div class="col-md-4"><div class="input-icon right"><i class="fa"></i><input type="text" name="thue_name" value=""  id = 'txtcalle' class='required  form-control' readonly ' /></div>
</div>
</div>
<div class="row">
 <label for="thue_name" class="col-md-4 control-label">Número exterior:</label>
 <label for="thue_name" class="col-md-4 control-label">Número interior:</label>
 <label for="thue_name" class="col-md-4 control-label">Colonia:</label>
</div>
<div class="row">

  <div class="col-md-4"><div class="input-icon right"><i class="fa"></i><input type="text" name="thue_name" value=""  id = 'txtexterior' class='required  form-control' readonly ' /></div>
</div>
<div class="col-md-4"><div class="input-icon right"><i class="fa"></i><input type="text" name="thue_name" value=""  id = 'txtinterior' class='required  form-control' readonly ' /></div>
</div>
<div class="col-md-4"><div class="input-icon right"><i class="fa"></i><input type="text" name="thue_name" value=""  id = 'txtcolonia' class='required  form-control' readonly ' /></div>
</div>
</div>
<div class="row">
 <label for="thue_name" class="col-md-4 control-label">Localidad:</label>
 <label for="thue_name" class="col-md-4 control-label">Municipio:</label>
 <label for="thue_name" class="col-md-4 control-label">Estado:</label>
</div>
<div class="row">

  <div class="col-md-4"><div class="input-icon right"><i class="fa"></i><input type="text" name="thue_name" value=""  id = 'txtlocalidad' class='required  form-control' readonly ' /></div>
</div>
<div class="col-md-4"><div class="input-icon right"><i class="fa"></i><input type="text" name="thue_name" value=""  id = 'txtmunicipio' class='required  form-control' readonly ' /></div>
</div>
<div class="col-md-4"><div class="input-icon right"><i class="fa"></i><input type="text" name="thue_name" value=""  id = 'txtestado' class='required  form-control' readonly ' /></div>
</div>
</div>
</div>
<hr>
<div class="row">
  <div class="col-md-4"></div>
  <div class="row col-md-4">
    <div class="col-md-4"></div>
    <div class="col-md-4"><a class="btn btn-success enviar_form1" id="btnEnviar">Enviar </a></div>
    <div class="col-md-4"></div>
  </div>

  <div class="col-md-4"></div>
</div>
</div>
</div>
</div>
</div>


<script type="text/javascript">
  var urlbase  = '<?php echo base_url();?>';
  var lgCboLoading = "<option value = ''>Cargando...</option>";
  $(document).ready(function() {
    // initCanvas(800, 600);
    $("#reader").hide();
    $("#datosf").hide();
    $('#lblmsg').html("");
    $('#lblmsg').hide();
    $('#lblmsgcodigo').html("");
    $('#lblmsgcodigo').hide();
    fillDatosf();
    var contCode = 0;
    var arrCode = new Array();
    $('#btnagregarcodigo').click(function(event) {

      var codigo = $("#txtcodigo").val();
      console.log(codigo);
      $(".tblcodigos").each(function(){
        var code    =  $(this).attr('data-code');
        if(code == codigo){
          console.log("Codigo duplicado");
          contCode ++;
        }
      });
      if(contCode > 0){
        $('#lblmsg').html('<div class="alert alert-danger">'+
          '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
          '<strong></strong> Error</strong> ticket duplicado </div>');
        $('#lblmsg').show();
        contCode = 0;
      }else{
        url =   '<?php echo base_url(); ?>/facturacion.php/facturacion/getinfocode/';
        data= { "codigo" : codigo };
        $.ajax({ 
          url         : url,
          type        : 'post',
          data        : data,
          dataType    :'json',
          async       : false, 
      success     : function(dato) { // Abre Success
        if(dato.estatus == 1){
           // console.log($('#table_body').val('id'));
           if(dato.datos[0]['status'] == 0){
             $('#lblmsg').html("");
             $('#lblmsg').hide();
             armar_tabla(dato.datos);
             $("#txtcodigo").val("");
           }else if(dato.datos[0]['status'] == 1){
             $('#lblmsg').html('<div class="alert alert-danger">'+
              '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
              '<strong></strong> Error</strong> Este ticket ya se encuentra en proceso de facturación </div>');
             $('#lblmsg').show();
           }else if(dato.datos[0]['status'] == 2){
             $('#lblmsg').html('<div class="alert alert-danger">'+
              '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
              '<strong></strong> Error</strong> Este ticket ya ha sido facturado </div>');
             $('#lblmsg').show();
           }else if(dato.datos[0]['status'] < 0){
             $('#lblmsg').html('<div class="alert alert-danger">'+
              '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
              '<strong></strong> Error</strong> Este ticket ya ha sido anulado </div>');
             $('#lblmsg').show();
           }


           
         }else{
          $('#lblmsg').html('<div class="alert alert-danger">'+
            '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
            '<strong></strong> Error</strong> Código inválido</div>');
          $('#lblmsg').show();
        }
      }, // Cierra Success
      error : function(jqXHR, status, error) { //Abre Error

         // dato_return.estatus = 0;
         // dato_return.msg     = error;
         console.log(error);
       }
     });
        contCode = 0;
      }
    });

    $('#btnEnviar').click(function(event) {
      var datosfact =  $('#cbo_datosf').val();
      var datosuso =  $('#cbo_uso').val();
      $(".tblcodigos").each(function(){
        var code    =  $(this).attr('id');
        arrCode.push(code);
      });
      var arrCode2 = new Array();

      if(arrCode.length > 0){
        $('#lblmsgcodigo').hide();
       if(datosuso != ""){
        $('#lblmsguso').hide();
        if(datosfact != ""){
          $('#lblmsgdatosf').hide();
          arrCode2 = arrCode;
          arrCode = [];
          var objetoJson = { 
            ticket_id:arrCode2, 
            datosf_id : datosfact,
            datosuso_id:datosuso};

      $.ajax({  // Abre AJax
        url : '<?php echo base_url(); ?>/facturacion.php/facturacion/add_peticion/',
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
           toastr["success"]("Petición generada correctamente");
           //window.location.href = url + 'facturacion.php/users/login';
           setTimeout("location.href = urlbase + 'facturacion.php/facturacion/codigos'", 3000);
         }else{
          $("#msgusuarios").html('<div class="alert alert-danger">'+
            '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
            '<strong><?php echo $this->lang->line("error");?></strong> '+dato.msg+
            '</div>');
          toastr["success"]("Se han producido algún error inesperado.");
           // window.location.href = url + 'facturacion.php/home/altacliente';
           setTimeout("location.href = urlbase + 'facturacion.php/facturacion/codigos'", 3000);
         }
      }, // Cierra Success
      error : function(jqXHR, status, error) { //Abre Error
        alert(error);
      } // Cierra Error
  }); // Cierra Ajax 
    }else{
     $('#lblmsgdatosf').html('<div class="alert alert-danger">'+
      '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
      '<strong></strong> Error</strong> no se ha elegido datos de facturación </div>');
     $('#lblmsgdatosf').show();
   }
}else{
     $('#lblmsguso').html('<div class="alert alert-danger">'+
      '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
      '<strong></strong> Error</strong> no se ha elegido uso de comprobante </div>');
     $('#lblmsguso').show();
   }
 }else{
  $('#lblmsgcodigo').html('<div class="alert alert-danger">'+
    '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
    '<strong></strong> Error</strong> no se han agregado tickets </div>');
  $('#lblmsgcodigo').show();
}


  //  url =   '<?php echo base_url(); ?>/facturacion.php/facturacion/getinfocode/';
    //data= { "codigo" : codigo };
  /*  $.ajax({ 
      url         : url,
      type        : 'post',
      data        : data,
      dataType    :'json',
      async       : false, 
      success     : function(dato) { // Abre Success
          if(dato.estatus == 1){
           // console.log($('#table_body').val('id'));
            if(dato.datos[0]['status'] == 0){
               $('#lblmsg').html("");
                $('#lblmsg').hide();
                armar_tabla(dato.datos);
                $("#txtcodigo").val("");
            }else if(dato.datos[0]['status'] == 1){
               $('#lblmsg').html('<div class="alert alert-danger">'+
                  '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
                  '<strong></strong> Error</strong> Este ticket ha sido anulado </div>');
              $('#lblmsg').show();
            }else if(dato.datos[0]['status'] == 2){
               $('#lblmsg').html('<div class="alert alert-danger">'+
                  '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
                  '<strong></strong> Error</strong> Este ticket ya ha sido facturado </div>');
              $('#lblmsg').show();
            }
               
            
           
          }else{
              $('#lblmsg').html('<div class="alert alert-danger">'+
                  '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
                  '<strong></strong> Error</strong> Código inválido</div>');
              $('#lblmsg').show();
          }
      }, // Cierra Success
      error : function(jqXHR, status, error) { //Abre Error
      
         // dato_return.estatus = 0;
         // dato_return.msg     = error;
          console.log(error);
      }
    }); */


  });


$('#table_body').on('click','.btneliminar',function(){
 var id = $(this).attr("vl");
 $("#"+id).remove();
});
$("#cbo_datosf").change(function(){
  var valdatosf = $("#cbo_datosf").val();
  if(valdatosf != ""){
   url =   '<?php echo base_url(); ?>/facturacion.php/facturacion/getinfodataf/';
   data= { "valdatosf" : valdatosf };
   $.ajax({ 
    url         : url,
    type        : 'post',
    data        : data,
    dataType    :'json',
    async       : false, 
      success     : function(dato) { // Abre Success
        if(dato.estatus == 1){
          $("#txtrazon").val(dato.datos[0]['nombre']);
          $("#txtcp").val(dato.datos[0]['cp']);
          $("#txtcalle").val(dato.datos[0]['calle']);
          $("#txtexterior").val(dato.datos[0]['exterior']);
          $("#txtinterior").val(dato.datos[0]['interior']);
          $("#txtcolonia").val(dato.datos[0]['colonia']);
          $("#txtlocalidad").val(dato.datos[0]['localidad']);
          $("#txtmunicipio").val(dato.datos[0]['municipio']);
          $("#txtestado").val(dato.datos[0]['estado']);
          $("#datosf").show();

        }else{
             // $('#lblmsg').html('<div class="alert alert-danger">'+
             //     '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
               //   '<strong></strong> Error</strong> Código inválido</div>');
              //$('#lblmsg').show();
            }
      }, // Cierra Success
      error : function(jqXHR, status, error) { //Abre Error

         // dato_return.estatus = 0;
         // dato_return.msg     = error;
         console.log(error);
       }
     });

 }
 else{
  $("#datosf").hide();
}
});

});
function fillDatosf(){
  $("#cbo_datosf").html(lgCboLoading);
  $.post("<?php echo base_url();?>facturacion.php/facturacion/fill_select/", {}, function(data){
    $("#cbo_datosf").html(data);
  });
    $("#cbo_uso").html(lgCboLoading);
  $.post("<?php echo base_url();?>facturacion.php/facturacion/fill_select/false/1/2", {}, function(data){
    $("#cbo_uso").html(data);
  });
}
function armar_tabla(dato){
  $.each(dato, function(i,item){
   $("#table_body").append('<tr class="tblcodigos" data-code="'+dato[i]['codigo']+'" val="'+dato[i]['id']+'" id="'+dato[i]['id']+'">'+
    '<td>'+dato[i]['codigo']+'</td>'+
    '<td>'+dato[i]['fecha']+'</td>'+
    '<td>'+dato[i]['precio']+'</td>'+
    '<td>'+dato[i]['servicio']+'</td>'+
    '<td> <a class="btn btn-danger btneliminar" vl="'+dato[i]['id']+'" value="'+dato[i]['id']+'">Eliminar </a></td>'+
    '</tr>');
 });
}


</script>

<script type="text/javascript">
  $("#btnLeerQR").click(function(){
    //var boton1 = document.getElementById("btnLeerQR");
    //boton1.disabled = true;
    $("#btnLeerQR").attr("disabled","disabled");
    $("#txtcodigo").val("");
    $('#reader').show();
    $('#reader').html5_qrcode(function(data){
     // console.log("READ:", data);
     PlaySound();
     $("#txtcodigo").val(data);
     $('#reader').html5_qrcode_stop();
     $('#reader').empty();
     $('#reader').html("");
     $('#reader').hide();
     $("#btnLeerQR").removeAttr("disabled");
     $("#btnagregarcodigo").trigger("click");

   },
   function(error){
      //show read errors 
    }, 
    function(videoError){
      //the video stream could be opened
    });
  });

  function PlaySound() {
    var sound = document.getElementById("audio");
    sound.play();
  }

</script>
