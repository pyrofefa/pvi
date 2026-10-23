    var charging = "<option value='0'>Cargando...</option>";
    var opt = "<option value='0'>Seleccione tecnico...</option>";

    $(document).ready(function(){

        $("#cbo_imei").change(function(){
            $("#cbo_file").html(charging);
            var imei = $("#cbo_imei").val();
            if(imei != ""){
                console.log(base_url  + sitio + "/" + controller + "/" + archivo);
                $.post(base_url  + sitio + "/" + controller + "/" + archivo,{cbo:"archivos", imei:imei}, function(data){
//                  alert(data);
                    $("#cbo_file").html(data);
                });
            }
            else{
                $("#cbo_file").html(opt);
            }
            });

        $("#cbo_file").change(function(){
            $("#container").html("<center>Cargando...</center>");
            var imei = $("#cbo_imei").val();
            var file = $("#cbo_file").val();
            if(imei != ""){
                if(file != ""){
                    $.post(base_url + sitio + "/" + controller + "/" + recuperar ,{file:file,imei:imei,anterior:ant}, function(data){
                        $("#container").html(data);
                    });
                }
                else{$("#container").html("<center><span style='color:red;'>No seleccionaste ningun archivo...</span></center>");}
            }
            else{alert("Seleccionar tecnico");$("#container").html("ERROR: Seleccionar tecnico...");}
        });

        
$( "#user_id" ).change(function() {
         id = $("#user_id option:selected").val();
        var miselect=$("#cbo_imei");
        /* VACIAMOS EL SELECT Y PONEMOS UNA OPCION QUE DIGA CARGANDO... */
        miselect.find('option').remove().end().append('<option value="">Cargando...</option>').val('');
        var parametros = {
        "user_id" : id
        };
        $.ajax({
                data:  parametros,
                url:   base_url + sitio + '/' + controller + '/' + 'getImei/1',
                type:  'POST',
                dataType: "json",
                success:  function (data) {
                    miselect.empty();
                    miselect.html('<option value="">--- Seleccione ---</option>');
                    for (var i=0; i<data.length; i++) {
                        miselect.append('<option value="' + data[i].imei + '">' + data[i].imei + '</option>');
                    }
                }
        });


});



    });