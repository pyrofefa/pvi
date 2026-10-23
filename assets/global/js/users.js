/*
 *  Javascript con funciones para la administración de usuarios
 */
$(document).ready(function(){
    var tblRegistros = $('#tblRegistros1').DataTable({
        "lengthMenu": [[5, 10, 15, 25,50,100], [5, 10, 15, 25, 50, 100]],
        'iDisplayLength': 15,
        "oLanguage": {
            "sSearch" : "Buscar:",
            "sZeroRecords" : "No se encontraron resultados",
            "sLengthMenu" : "Mostrar _MENU_ registros",
            "sInfoFiltered": " - Filtrados de un total de _MAX_ registros",
            "sInfo": "Mostrando _START_ a _END_ de _TOTAL_ registros",
            "sInfoEmpty": "No hay registros que mostrar"
        }
    });
});
$('#formUser').hide(); 
$('#formUserEdit').hide()
$('#form2 input[type=reset]').hide();
$('.enviar_form1').click(function(){
    $('form#form1').submit();
});
  
$('.enviar_form2').click(function(e){
    var dataUpdate = $('#form2').serializeArray();
    $('#form2').block({
        theme: false,
        message: '<h4><img src="'+$('#cargando').attr('src')+'" style="width:20px;" /> Cargando...</h4>'
    });
    if(typeof customProc == 'undefined'){
        customProc = '';
    }
    $.ajax({
        url: burl+'users/modifyUser/'+customProc,
        method: 'POST',
        data: dataUpdate,
        success: function(response){
            response = jQuery.parseJSON(response);
            if(response.success == 1){
                window.location.href=burl+'users/usuarios/?edit=success';
            }else{
                command: toastr.error(response.msg,response.head_msg);
            }
        },
        error: function(){
            command: toastr.error(response.msg,response.head_msg);
        }
    });
});

$('#nuevo').click(function(){
    $('#registros').slideUp(function(){
        $('#formUser').slideDown();
    });
});
$('#nivel,.nivel').select2({
    placeholder: "Seleccione nivel(es)",
    allowClear: true
});
$('#junta_id,.junta_id').select2({
    placeholder: "Seleccione una junta",
    allowClear: true
});
$('.goBack').click(function(){
    $(this).closest('.portlet').slideUp(function(){
        $("#form1")[0].reset();
        $(".form-group").removeClass('has-success').removeClass('has-error');
        $(".form-group i").removeClass('fa-check').removeClass('fa-warning');
        $('#registros').slideDown();
        $(this).closest(".select2-search-choice").remove();
    });
});
$('input[type=reset]').click(function(){
    $(".form-group").removeClass('has-success').removeClass('has-error');
    $(".form-group i").removeClass('fa-check').removeClass('fa-warning');
    $(".select2-search-choice").remove();
});


$('#registros').delegate('.edit','click',function(){
    var uid = $(this).parent().parent().attr('id');
    $('#uid').val(uid);
    $('#registros').block({
        theme: false,
        message: '<h4><img src="'+$('#cargando').attr('src')+'" style="width:20px;" /> Cargando...</h4>'
    });
    if(typeof customProc == 'undefined'){
        customProc = '';
    }
    $.ajax({
        url: burl+'users/GetUserInfo/'+customProc,
        method: 'POST',
        data: 'uid='+uid,
        success: function(response){
            response = jQuery.parseJSON(response);
            $('#registros').unblock();
            if(response.success == 1){
                $('#registros').slideUp(function(){
                    $('#formUserEdit').slideDown();
                });
                $('.enviar_form2').attr('id','btnActualizar').html('Actualizar');
                var inputs = $('#form2 input');
                $.each(response.data,function(key,value){
                    $('.'+key).val(value);
                });
                $('.junta_id').select2('val',response.data.junta_id);
                var niveles = [];
                $.each(response.levels,function(key,value){
                    niveles.push(value.id);
                });
                $('.nivel').select2('val',niveles);
                
                    
            }else{
                toastr.options.closeButton = true;
                toastr.options.positionClass = "toast-top-full-width";
                toastr.options.onclick = null;
                toastr.options.showDuration = "1000";
                toastr.options.hideDuration = "1000";
                    Command: toastr.error('<h4>Ocurrió un error al obtener los datos del usuario</h4>', '<h3>Error</h3>');
                $('#registros').unblock();
            }
        },
        error:function(response){
            toastr.options.closeButton = true;
            toastr.options.positionClass = "toast-top-full-width";
            toastr.options.onclick = null;
            toastr.options.showDuration = "1000";
            toastr.options.hideDuration = "1000";
                Command: toastr.error('<h4>Ocurrió un error al obtener los datos del usuario</h4>', '<h4>Error</h4>');
            $('#registros').unblock();
        }
    });
});

function StartFunction(){

}
    
function Cargando(){
    $('#form1').block({
        theme: false,
        message: '<h4><img src="'+$('#cargando').attr('src')+'" style="width:20px;" /> Cargando...</h4>'
    });
}

function SuccessFunction(response){
    $('#formUser').slideUp(function(){
        $('#junta_id').select2('val','');
        $(".form-group").removeClass('has-success').removeClass('has-error');
        $(".form-group i").removeClass('fa-check').removeClass('fa-warning');
        $('#registros').slideDown();
        $('.Newsuccess').removeClass('success').fadeIn();
        var newTable = '<tr id="'+response.dataUser.id+'" class="success Newsuccess">';
        newTable += '<td class="center">'+response.dataUser.id+'</td>';
        newTable += '<td>'+response.dataUser.usuario+'</td>';
        newTable += '<td>'+response.dataUser.nombre+'</td>';
        newTable += '<td>'+response.dataUser.apaterno+'</td>';
        newTable += '<td>'+response.dataUser.amaterno+'</td>';
        newTable += '<td>'+response.dataUser.email+'</td>';
        newTable += '<td><a href="#" class="btn default btn-xs yellow-strip edit"><i class="fa fa-edit"></i> Editar</a></td>';
        newTable += '</tr>';
        $('#registros table tbody').append(newTable);
    });
}

function ErrorFunction(){
        
}
function success(head,msg){
    command: toastr.success(msg,head);
}

