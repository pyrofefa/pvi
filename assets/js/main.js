SERVICIO=0;
PRECIO=0.00;
var win = null;
$("#divImprimir").hide();
function mostrarPrecios(id){
	var _dir = _host + "tickets.php/ticket/getServiciosPorTipo/" + id;
    $.ajax({
        type: 'GET',
        dataType: 'json',
        data: {},
        url: _dir,
        error: function (jqXHR, textStatus, errorThrown) {
            console.log("ERROR");
            console.log(_dir);
            // console.log(jqXHR);
            // console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        },
        success: function (data) {
          createList(id, data);
        }
    });


   //  $.getJSON(_dir, function(result){
   // //response data are now in the result variable
   //      alert(result);
   //  });
}

function createList(tipo_id, arr){
  str = "<label style='color: white; font-size: 32px; font-weight: bold;'>Elige un precio</label>";
	str += "<table>";
  str += "<tr>";
  if(tipo_id == 1 || tipo_id == 3 || tipo_id == 4){
    color = "textBlack";
  }else{
    color = "text";
  }
  //console.log(color);
	$.each(arr, function(key, val){

   // str += "<td>" + "<a href='javascript:setPrecio("+ val.id +",\""+ val.nombre +"\","+ val.costo +")' >" +"<img width=160 src='" + _customs +"tickets/img/Botones/_"+tipo_id+".png' > $ " + parseInt(val.costo) + "</img>" + "</a></td>";
     str += "<td>" + "<div id='containerImg'>" +"<a href='javascript:setPrecio("+ val.id +",\""+ val.nombre +"\","+ val.costo +")' >"+"<img id='image' width=160 src='" + _customs +"tickets/img/Botones/_"+tipo_id+".png' ><p id='"+color+"'> $ " + parseInt(val.costo) + "</p></img></a></div>" + "</td>";
		//str += "<td>" + "<a href='javascript:setPrecio("+ val.id +",\""+ val.nombre +"\","+ val.costo +")' >" +"<span style='color:white; text-align:center; width: 160px; height: 160px; background-image: url(" + _customs +"tickets/img/Botones/_"+tipo_id+".png); display:block' > $ " + parseInt(val.costo) + "</span></a></td>";
    //str += "<td>" + "<a class='button button-glow button-raised button-royal button-rounded button-jumbo button-longshadow-right precio_" + tipo_id + "' href='javascript:setPrecio("+ val.id +",\""+ val.nombre +"\","+ val.costo +")'> $ " + parseInt(val.costo) + "</a>" + "</td>";
   
	});
  str += "</tr>"
	str += "</table>";
   console.log(str);
  $("#divImprimir").hide();
  $("#divServicio").html("");
	$("#divPrecios").html(str);
}

function setPrecio(id,nombre,costo){
	SERVICIO=id;
  PRECIO  =costo;
   $("#divImprimir").show();
    $("#divServicio").html("SERVICIO SELECCIONADO:<br>" + nombre + " ($" + costo + ")");
}

$("#printTicket").click(function()
  {
    if(SERVICIO==0)  //CUANDO NO SE HAYA SELECCIONADO ALGUN SERVICIO
    {
      alert('Necesita seleccionar un servicio');
    }
    else
    {
     //SE DESHABILITA EL BOTON PARA EVITAR MULTIPLE IMPRESIÓN
      //$("#printTicket").attr("disabled",true);
      $("#divServicio").html("");

      //ENVIAMOS EL SERVICIO Y EL PRECIO AL SCRIPT, PARA QUE NOS REGRESE EL CODIGO
      $.post(_host + "tickets.php/ticket/getCodigo",{'servicio':SERVICIO,'precio':PRECIO},function(data)
      {
        // alert("hola");exit();
        if(data.length==32)
        {
          var code=data;
          var url= _host + "tickets.php/ticket/printTicketz?code="+code;
          // alert(url);exit();
          //$("input:radio").removeAttr("checked");
          SERVICIO=0;
          PRECIO=0.00;
          printTicketz(url,"TICKET",300,400,'');
          setTimeout(function(){ $("#printTicket").attr("disabled",false)},2000);
        }
      });

    }
  });


//FUNCION QUE LLAMA A LA VENTANA DONDE SE IMPRIME EL TICKET
function printTicketz(mypage,myname,w,h,features)
{
  var winl = (screen.width-w)/2; var wint = (screen.height-h)/2;
  if (winl < 0) winl = 0;
  if (wint < 0) wint = 0;
  var settings = 'height=' + h + ',';
  settings += 'width=' + w + ',';
  settings += 'top=' + wint + ',';
  settings += 'left=' + winl + ',';
  settings += features;
  win = window.open(mypage,myname,settings); 
  if(win) {
    win.window.focus();
    //win.close();
  }
  else{
    alert("No se pudo crear la ventana emergente. Favor de verificar si el navegador los esta bloqueando.");
  }
 // window.print();
}