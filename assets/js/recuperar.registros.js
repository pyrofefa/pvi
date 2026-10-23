    var charging = "<option value='0'>Cargando...</option>";
    var opt = "<option value='0'>Seleccione tecnico...</option>";

    $(document).ready(function(){

        $("#cbo_imei").change(function(){
            $("#cbo_file").html(charging);
            var imei = $("#cbo_imei").val();
            if(imei != "" && imei != 0){
                $.post(base_url  + sitio + "/" + controller + "/" + archivo,{cbo:"archivos", imei:imei}, function(data){
//                  alert(data);
                    $("#cbo_file").html(data);
                   //  console.log(data);
                });
            }
            else{
                $("#cbo_file").html(opt);
              //   console.log(opt);
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

    });