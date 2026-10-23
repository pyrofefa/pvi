
jQuery.fn.exists = function(){return this.length>0;}

function eliminar(base, controller, id, tabla){
		var add1 = "";
		var tabla = tabla || 0;
		if(tabla != 0 && tabla != ''){
			 add1 = "/" + tabla;
		}
		var href = base + "index.php/" + controller + "/" + "eliminar/" + id + add1;
		$("#dcmBody").html("¿Seguro que desea eliminar este registro?");
		$("#dcmButtonEliminar").attr("href", href);
		$("#divConfirmModal").modal("show");
	}

function alert(m){
	$("#damBody").html(m);
	$("#divAlertModal").modal("show");
}

function desbloquear(fld, term){
	$("#ddmBody").html("No se encuentran registros con el " + fld + " \""+ term +"\", desea ingresarlo manualmente?");
	$("#ddmButtonConfirmar").attr("href", "javascript:unblock();");
	$("#divDesbloqModal").modal("show");
}
function unblock(){
	$(".disabled").attr("readonly", false);
	$(".disabled").attr("disabled", false);
	$(".disabled option").removeAttr("disabled");
	try{
		$("#id_exportadora").val("");
		$("#id_centro_acopio").html("<option value=''>Seleccione Exportadora</option>");
		$("#id_ubicacion").html("<option value=''>Seleccione Centro Acopio</option>");
	}
	catch(e){

	}
	$("#divDesbloqModal").modal("hide");
}
function loading(){
	$("#divloadingModal").modal("show");
}
function loaded(){
	$("#divloadingModal").modal("hide");
}

function confirm1(confirmMessage,callback){
	//	confirmMessage = confirmMessage || '';
	$('#dcm2Body').html(confirmMessage);
	$("#divConfirm2Modal2").modal("show");
	$('#dcm2ButtonYes').click(function(){
		$('#confirmbox').modal('hide');
		if (callback) callback(true);
	});
	$('#dcm2ButtonFalse').click(function(){
		$('#confirmbox').modal('hide');
		if (callback) callback(true);
	});
}


$(document).ready(function(){
	$(".info").attr("disabled", "disabled");
	$(".disabled").attr("readonly", "readonly");
	$(".disabled option:not(:selected)").attr('disabled', true);
	$(".onlyNumbers").keypress(function(e){
		tecla = (document.all) ? e.keyCode : e.which; // 2
		if (tecla==8) return e; // 3
		if (tecla=="\t") return e;
		patron = /[\.|\d|]/;
		te = String.fromCharCode(tecla); // 5
		if(patron.test(te))
			return e;
		else
			return false;
	});
	if($("#form1").exists()){
		$("#form1").validate({
			rules:{
				fecha:{
					date: true,
					dateISO : true
				}
			},
			submitHandler: function(form){
				var b = false;
				$(".positivo").each(function(){
					if(parseFloat(this.value) > 0){
						b = true;
					}
				});
				if(b){
					confirm1('Va a registrar un positivo a Carb&oacute;n Parcial de Trigo,<br> Desea continuar?',function(result) {
						if(result){
							form.submit();	
						}
						else{
							return false;		
						}
					});
				}
				else{
					form.submit();
				}
			}
		});
	if($("#volumen").exists()){$("#volumen").rules("add", {range: [1, 100],	messages: {range: "Por favor ingrese un volumen valido entre 1 y 100 tons"}});}
	}
});
