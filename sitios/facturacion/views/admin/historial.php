<h2><?php echo $nombre_empresa; ?></h2>
<div class="row">
    <div class="col-md-12">
        <div class="portlet box light-grey">
            <div class="portlet-title">
                <!-- <div class="caption"><i class="fa fa-globe"></i> Registros Control Químico (Semana <?php echo $semana; ?>)</div> -->
                <div class="caption"><i class="fa fa-globe"></i> Clientes</div>
                <div class="actions">

                    <div class="btn-group">
                        <a class="btn btn-danger" href="<?php echo base_url().sitio(); ?>/admin/clientes">
                            <i class="fa fa-reply"></i> Volver
                        </a>
                    </div> 
                    
                 <!--   <div class="btn-group">
                        <a href="#" class="btn dark dropdown-toggle" data-toggle="dropdown"> 
                            <i class="fa fa-cog"></i> <?php echo lang('btn_opciones'); ?>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu pull-right">   
                             <li><a href="<?php echo base_url().sitio(); ?>/control/exportarexcel/<?php echo $semana; ?>"><i class="fa fa-table"></i> Exportar a Excel</a></li> 
                        </ul>
                    </div> -->
                </div>
            </div>
            <div class="portlet-body">
                <table id="tblRegistros" class="table table-striped table-bordered table-hover dataTable" id="sample_1">
                    <thead>
                        <tr>
                            <!--<th class="table-checkbox"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>-->
                          <!--  <th>ID</th> -->
                            <th>ID</th>
                            <th>FECHA PETICIÓN</th>
                            <th>FECHA FACTURA</th>
                            <th>NO. FACTURA</th>
                            <th>CÓDIGO</th>                          
                            <th>FOLIO</th>
                            <th>IVA (%)</th>
                            <th>TOTAL ($)</th>
                            <th>SERVICIO</th>
                            <th>Opciones</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                     <?php foreach($registros as $r){ ?>                            
                     <tr data-id="<?php echo $r->id; ?>" id="row_<?php echo $r->id; ?>">
                       <!-- <td><?php echo $r->id; ?></td> -->
                        <td><?php echo $r->id; ?></td>
                        <td><?php echo $r->fecha_peticion; ?></td>
                        <td><?php echo $r->fecha_factura; ?></td>
                        <td><?php echo $r->num_factura; ?></td>
                        <td><?php echo $r->codigo; ?></td>
                        <td><?php echo $r->folio; ?></td>
                        <td><?php echo $r->iva; ?></td>
                        <td><?php echo $r->costo; ?></td>
                        <td><?php echo $r->servicio; ?></td>
                        <td>
                       
                           <a href="<?php echo base_url().sitio().'/admin/getdatoshistorial/'.$r->id; ?>" class="btn btn-default"><i class="fa fa-search"></i></a>
                         <!--  <a href="javascript:;" class="btn btn-default btnDel popconfirm_full" data-id="<?php echo $r->id; ?>"><i class="fa fa-times"></i></a> -->
                          
                       </td>
                   </tr>
                   <?php } ?>
               </tbody>
           </table>
       </div>
   </div>
   <!-- END EXAMPLE TABLE PORTLET-->
</div>
</div>
<script type="text/javascript">
var url = '<?php echo base_url().sitio(); ?>';
 $(document).ready(function(){
    $('body').delegate('.btnDel','click',function(){
        $(this).hide();
        var html = $(this).parent().html();
        $(this).parent().html(html+'<span class="confirm">Confirmar: <a href="#" class="btn btn-xs green" id="cYes"><i class="fa fa-check"></i> Si</a> <a href="#" class="btn btn-xs red" id="cNo"><i class="fa fa-times"></i> No</a></span>');
        return false;
    });

    $('body').delegate('#cNo','click',function(){
        $(this).parent().parent().contents('.btnDel').show();
        $(this).parent().remove();
        return false;
    });

    $('body').delegate('#cYes','click',function(){
        var id = $(this).parent().parent().parent().attr('data-id');
        var cYes = $(this);
        EliminarRegistro(id);
        return false;
    });

    function EliminarRegistro(mid){
        console.log(mid);
        $.ajax({
            method: 'POST',
            data: {cid:mid},
            url: url + '/control/eliminar',
            success:  function(response){
                console.log(response);
                response = jQuery.parseJSON(response);
                if(response.success == 1){
                    EliminarRenglon(mid);
                    toastr.success(response.msg,response.head_msg);
                }else{
                   toastr.error(response.msg,response.head_msg);

               }
           },
           error: function(response){
            console.log(response);
        }
    });
    }



    function EliminarRenglon(id){
        $("#row_" + id).remove();   
        return true;
    }

});

</script>