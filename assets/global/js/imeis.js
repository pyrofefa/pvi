$('#imeis').select2();
$('#uimeis').delegate('.action','click',function(){
    $(this).hide();
    var html = $(this).parent().html();
    $(this).parent().html(html+'<span class="confirm">Confirmar: <a href="#" class="btn btn-xs green" id="cYes"><i class="fa fa-check"></i> Si</a> <a href="#" class="btn btn-xs red" id="cNo"><i class="fa fa-times"></i> No</a></span>');
    return false;
});
$('#uimeis').delegate('#cNo','click',function(){
    $(this).parent().parent().contents('.action').show();
    $(this).parent().remove();
    return false;
});
$('#uimeis').delegate('#cYes','click',function(){
    $(this).closest('table').block({
        theme: false,
        message: '<h4><img src="'+$('#cargando').attr('src')+'" style="width:20px;" /> Cargando...</h4>'
    });
    var id = $(this).parent().parent().parent().attr('id');
    var cYes = $(this);
    $.ajax({
        method: 'POST',
        url: burl+'/users/imeiActions/',
        data: 'id='+id,
        success: function(response){
            console.log(response);
            response = jQuery.parseJSON(response);
            if(response.success == 1){
                cYes.parent().remove();
                cYes.parent().parent().parent().parent().remove();
                var newrow = '';
                var labelstatus = '';
                var status = '';
                var action,color,activate = '';

                $.each(response.data, function(key,value){
                    newrow += '<tr>';
                    newrow += '<td>'+value.name+'</td>';
                    if(value.status == 0){
                        labelstatus = 'error';
                        status = 'Inactivo';
                        action = 'Activar';
                        color = 'green';
                    }else if(value.status == 1){
                        labelstatus = 'success';
                        status = 'Activo';
                        action = 'Desactivar';
                        color = 'red';
                    }
                    newrow += '<td><span class="label label-'+labelstatus+'">'+status+'</span></td>';
                    newrow += '<td><a href="'+burl+'users/'+action+'imei/'+value.uid+'/'+value.id+'" class="btn default btn-xs '+color+'-stripe action">'+action+'</a></td>';
                    newrow += '</tr>';
                    $('.modal-body table tbody').append(newrow);
                });
                window.location.href = burl+'/users/newimei/'+$('#uid').val()+'?deactivate=success';
            }
        },
        error: function(response){

        }
    });
});
$('#add').click(function(){
    if($('#imeis').val() == ''){
        $('#imeis').parent().addClass('has-error');
        $('#errorlbl').removeClass('hide').slideDown();
        return false;
    }else{
        $('#imeis').parent().removeClass('has-error');
        $('#errorlbl').addClass('hide');
    }
    $(this).parent().parent().parent().block({
        theme: false,
        message: '<h4><img src="'+$('#cargando').attr('src')+'" style="width:20px;" /> Cargando...</h4>'
    });
    var uid = $('#uid').val();
    var imei = $('#imeis').val();
        
    $.ajax({
        url: burl+'users/addimei/',
        data: 'uid='+uid+'&imei='+imei,
        method: 'POST',
        success: function(response){
            console.log(response);
            response = jQuery.parseJSON(response);
            if(response.success == 1){
                $('table > *').unblock();
                $('#imeis option[value='+imei+']').remove();
                $('#imeis').select2('val','');
                var newrow = '';
                var labelstatus = '';
                var status = '';
                var action,color,activate = '';
                $('#uimeis > tbody > tr').remove();
                $('#uimeis > tbody').html('');
                $.each(response.data,function(key,value){
                    newrow = '<tr id="'+value.id+'">';
                    newrow += '<td>'+value.name+'</td>';
                    if(value.status == 0){
                        labelstatus = 'error';
                        status = 'Inactivo';
                        action = 'Activar';
                        color = 'green';
                    }else if(value.status == 1){
                        labelstatus = 'success';
                        status = 'Activo';
                        action = 'Desactivar';
                        color = 'red';
                    }
                    newrow += '<td>'+status+'</td>';
                    newrow += '<td><a href="'+burl+'users/'+action+'imei/'+value.uid+'/'+value.id+'" class="btn default btn-xs '+color+'-stripe action">'+action+'</a></td>';
                    newrow += '</tr>';
                    $('#uimeis tbody').append(newrow);
                });
                    command: toastr.success(response.msg,response.head_msg);
            }else if(response.success == -1){
                $('table > *').unblock();
                $('#imeis option[value='+imei+']').remove();
                $('#imeis').select2('val',''); 
                    command: toastr.error(response.msg,response.head_msg);
            }else{
                $('table > *').unblock();
                    command: toastr.error(response.msg,response.head_msg);
            }
        },
        error: function(response){
            response = jQuery.parseJSON(response);
                command: toastr.error('Ocurrió un error al asignar el IMEI','Error!');
        }
    });
});
$('#imeis').change(function(){
    if($(this).val() != ''){
        $('#imeis').parent().removeClass('has-error');
        $('#errorlbl').addClass('hide');
    }
});