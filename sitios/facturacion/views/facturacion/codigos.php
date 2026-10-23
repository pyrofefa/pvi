<h2>Códigos</h2>
<div class="row">
    <div class="col-md-12">
        <div class="portlet box light-grey">
            <div class="portlet-title">
                <!-- <div class="caption"><i class="fa fa-globe"></i> Registros Control Químico (Semana <?php echo $semana; ?>)</div> -->
                <div class="caption"><i class="fa fa-globe"></i> Códigos registrados</div>
                <div class="actions">

                    <div class="btn-group">
                        <a class="btn green" href="<?php echo base_url().sitio(); ?>/facturacion/registrar">
                            <i class="fa fa-plus-circle"></i> Agregar código
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
                            <th><?php echo lang('tbl_fecha');?></th>
                            <th>RFC</th>
                            <th><?php echo lang('tbl_codigo');?></th>
                            <th>Precio</th>
                            <th>Servicio</th>
                            <th>Folio ticket</th>
                            <th>Uso comprobante</th>
                            <th>Status</th>
                           <!-- <th>Opciones</th> -->
                            <th>PVI</th>
                        </tr>
                    </thead>
                    <tbody>
                     <?php foreach($registros as $r){ ?>    
                     <?php if($r->status == "Facturado"){ ?>
                        <tr class="success" data-id="<?php echo $r->id; ?>" id="row_<?php echo $r->id; ?>">
                      <?php  }elseif($r->status == "Pendiente"){ ?>
                         <tr class="warning" data-id="<?php echo $r->id; ?>" id="row_<?php echo $r->id; ?>">
                        <?php }elseif($r->status == "Anulado"){ ?>
                          <tr class="danger" data-id="<?php echo $r->id; ?>" id="row_<?php echo $r->id; ?>">

                            <?php } ?>
                       <!-- <td><?php echo $r->id; ?></td> -->
                        <td><?php echo $r->fecha; ?></td>
                        <td><?php echo $r->rfc; ?></td>
                        <td><?php echo $r->codigo; ?></td>
                        <td><?php echo $r->precio; ?></td>
                        <td><?php echo $r->servicio; ?></td>
                        <td><?php echo $r->folioTicket; ?></td>
                        <td><?php echo $r->usocomprobante; ?></td>
                        <td><?php echo $r->status; ?></td>
                        <td><?php echo $r->pvi; ?></td>
                      <!--  <td>
                        <?php if($r->status == 0){ ?>
                           <a href="<?php echo base_url().sitio().'/control/registrar/'.$r->id; ?>" class="btn btn-default"><i class="fa fa-edit"></i></a>
                           <a href="javascript:;" class="btn btn-default btnDel popconfirm_full" data-id="<?php echo $r->id; ?>"><i class="fa fa-times"></i></a>
                           <?php } ?>
                       </td> -->
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