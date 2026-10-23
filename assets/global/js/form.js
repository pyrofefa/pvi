
 $( document ).ready(function() {
	          UIToastr.init();
      $('.selectpicker').selectpicker();

jQuery.extend(jQuery.validator.messages, {
  required: "Requerido.",
  remote: "Por favor, rellena este campo.",
  email: "Por favor, escribe una dirección de correo válida",
  url: "Por favor, escribe una URL válida.",
  date: "Por favor, escribe una fecha válida.",
  dateISO: "Por favor, escribe una fecha (ISO) válida.",
  number: "Por favor, escribe un número entero válido.",
  digits: "Por favor, escribe sólo dígitos.",
  creditcard: "Por favor, escribe un número de tarjeta válido.",
  equalTo: "Por favor, escribe el mismo valor de nuevo.",
  accept: "Por favor, escribe un valor con una extensión aceptada.",
  maxlength: jQuery.validator.format("Por favor, no escribas más de {0} caracteres."),
  minlength: jQuery.validator.format("Por favor, no escribas menos de {0} caracteres."),
  rangelength: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1} caracteres."),
  range: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1}."),
  max: jQuery.validator.format("Por favor, escribe un valor menor o igual a {0}."),
  min: jQuery.validator.format("Por favor, escribe un valor mayor o igual a {0}.")
});


        $("#btnEnviar").click(function() {
	    	CKupdate()
	       $("#form1").submit();
	    });

        $('.date-picker').datepicker({
            format:'yyyy-mm-dd',
            language: 'es',
            startDate: inicio,
            endDate: fin,
            autoclose: true,
            todayHighlight: true

        });


});
 
function CKupdate(){
    for ( instance in CKEDITOR.instances )
        CKEDITOR.instances[instance].updateElement();
}

     function Cargando(){
        $('#form1').block({
            theme: false,
            message: '<h4><img src="'+$('#cargando').attr('src')+'" style="width:20px;" /> Cargando...</h4>'
        });
    }

	function StartFunction(){
        }

    function ErrorFunction(){

    }

	function SuccessFunction(){
    if(Segmento3 > 0){
    }else{
      $(':input','#form1').not(':button, :submit, :reset, :hidden').val('').removeAttr('checked').removeAttr('selected');
    }
		$("#" + idTabla).dataTable().fnReloadAjax();

	 }



    function EditFunction(id){
		$(location).attr('href',urlEdit + id);
  }

  function DeleteFunction(id){
        var parametros = {"id" : id,"tbl" : tbl};
        $.ajax({
                data:  parametros,
                url:   urlDelete + id,
                type:  'POST',
                dataType: "json",
                success:  function (data) {
                                if(data.success == 1){
									SuccessFunction();
                                     toastr.success(data.msg,data.head_msg);
                                }else{
                                     toastr.error(data.msg,data.head_msg);
                                }
                }
        });
  }
    function ActualiarTrampas(select,user,tipo){
        var miselect=$("#" + select);
        /* VACIAMOS EL SELECT Y PONEMOS UNA OPCION QUE DIGA CARGANDO... */
        if(Segmento2 == "revisadas"){
        miselect.find('option').remove().end().append('<option value="">Cargando...</option>').val('');
        }
        var parametros = {
        "user_id" : user,
        "tipo" : tipo,
        "semana" : semana
        };
        $.ajax({
                data:  parametros,
                url:   url + '/' + Segmento1 +'/TrampasFaltantes',
                type:  'POST',
                dataType: "json",
                success:  function (data) {
                    miselect.empty();
                    if(Segmento2 == "revisadas"){
                    miselect.html('<option value="">--- Seleccione ---</option>');
                    }
                    for (var i=0; i<data.length; i++) {
                        miselect.append('<option value="' + data[i].id + '">' + data[i].name + '</option>');
                    }
                }
        });

    }