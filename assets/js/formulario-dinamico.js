// JavaScript Document
$(function(){
	
	$(document).on('click','#eliminarcelda',function(){
		var objCuerpo=$(this).parents().get(2);
			if($(objCuerpo).find('tr').length==1){
				if(!confirm('Esta es el Ãºnica fila de la lista Â¿Desea eliminarla?')){
					return;
				}
			}
					
		var objFila=$(this).parents().get(1);
			/*eliminamos el tr que contiene los datos del contacto (se elimina todo el
			contenido (en este caso los td, los text y logicamente, el boton */
			$(objFila).remove();
		});


	
		$('#mais').click(function(){
		var next = $('#lista tbody').children('tr').length + 1;
		$('#lista tbody').append('<tr>' + 
        	'<td><select name="tipo' + next + '"></select></td>' + 
            '<td class="linha-right"><input type="text" name="foto' + next + '" size="10" /></td>' +
            '<td><select name="cultivo' + next + '" ></select></td>' +
            '<td><input type="text" name="latitud' + next + '" style="width: 60px;" /></td>' +
            '<td><input type="text" name="longitud' + next + '" style="width: 60px;" /></td>' +
            '<td><input type="text" name="superficie' + next + '" style="width: 60px;" /></td>' +
            '<td><select name="status' + next + '" ></select></td>' +
        "<td><input type='button' value='Eliminar' id='eliminarcelda' class='btn btn-danger eliminar'></td>"+
        '</tr>');
        
		
		$(':hidden').val(next);
				return false;
	});
	$('#dinamico').submit(function(){
		
		var parametros = $(this).serialize();
		
		$.get(
			$(this).attr('action'),
			parametros,
			function(data){
				$('#resultado').empty().append(data);
			},
			"html"
		)
		
		return false;
		
	});
	
	$('#enviar').click(function(){
		$('form').submit();
	});
	
	$(':text').live('focus',function(){
		$(this).closest('tr').addClass('input-focus');
	}).live('blur',function(){
		$(this).closest('tr').removeClass();
	});
	
});