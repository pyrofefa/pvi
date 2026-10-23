$(document).ready(function(){
    var tblRegistros = $('#tblRegistros').DataTable({
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

        $( ".btn-danger" ).click(function() {
            id = $(this).attr("data-id")
            EliminarRegistro(id);
        });

        function EliminarRegistro(id){
    var parametros = {"id" : id};
            $.ajax({
                data:  parametros,
                url:   url + '/elimina',
                type:  'post',
                success:  function (response) {
                    var response = jQuery.parseJSON(response);
                    if(response.success == 1){
                        EliminarRenglon(id);
                         toastr.success(response.msg,response.head_msg);
                    }else{
                         toastr.error(response.msg,response.head_msg);

                    }
                }
        });
}



    function EliminarRenglon(id){
        $("#row_" + id).remove();   
        return true;
        }

});
