<script type="text/javascript">
    window.onload = function() {
        PrintWindow();
    };
    // window.print();
    // window.close();
    function PrintWindow() {                 
        window.print();           
        CheckWindowState();
    }

    function CheckWindowState(){  
        //alert(document.readyState);       
        if(document.readyState=="complete") {
        console.log("CERRANDO..........");
        setTimeout(window.close, 3000);
        console.log("Cerrado!");
        } else {          
            setTimeout("CheckWindowState()", 2000)
        }
    }

</script>
<html>
<head>
    <title></title>
    <style type='text/css'>
@font-face {
    font-family: barcode;
    src: url(IDAutomationHC39M.ttf);
}
*{margin:0 10 0 auto !important; padding: 0 0 0 0 !important; font-size:12px; font-family:arial;}
th{
    padding-top:0px;
    padding-bottom:20px;
}
td.fld{
    text-align:right;
    width:60px;
    font-weight:bold;
}
td.val{
    text-align:left;
}
td.codigo{
    padding-top:20px;
    padding-bottom:20px;
}
div.corte{
page-break-after:always;
}
.barcode{
    margin: 10px 0 10px 0;
    font-family: barcode;
    font-size: 12px;
}
tr{
    text-align: "center";
}
b.url-fact{
    font-size: 8px;
    font-weight: bold;
}

</style>
</head>
<body>
<table width = '100%' align='center' valign='center'>
            <tr>
                <th colspan='2'>
                <!-- DEPENDIENDO DEL TIPO DE SERVICIO, IMPRIMIRA EL LOGO DEL CESAVE O DEL COSAFI -->
                <?php if($empresa_id == 2){ ?>
                    <img src=' <?php echo customs_url() ?>img/ticket_csf.png' width='210px'>
                <?php }elseif($empresa_id == 1){ ?>
                
                    <img src=' <?php echo customs_url() ?>img/ticket_csv.png' width='210px'>
               <?php } ?>
                </td>
            </tr>
            <tr>
                <td class='fld'>
                    Folio:
                </td>
                <td class='val'> <?php echo $maq; ?>-<?php echo $folio; ?>
                </td>
            </tr>
            
            <tr>
                <td class='fld'>
                    Fecha:
                </td>
                <td class='val'>
                   <?php echo $fecha; ?>
                </td>
            </tr>
            <tr>
                <td class='fld'>
                    T&eacute;cnico:
                </td>
                <td class='val'>
                   <?php echo $nombre; ?>
                </td>
            </tr>
            
            <tr>
                <td class='fld'>
                    PVI:
                </td>
                <td class='val'>
                    <?php echo $pvi; ?>
                </td>
            </tr>
            
            <tr>
                <td class='fld' valign='top'>
                    Servicio:
                </td>
                <td class='val'>
                    <?php echo $servNombre; ?>
                </td>
            </tr>
            <tr>
                <td class='fld'>
                    Costo:
                </td>
                <td class='val'>
                    $ <?php echo $costo; ?>
                </td>
            </tr>
            
            
            <tr align='center'>
                <td class='codigo' colspan='2'>
                    <u>C&oacute;digo de requisici&oacute;n:</u><br>
                    <b><?php echo $codigo; ?></b>
                </td
            </tr>
            <tr align='center'>
                <td class='qr' colspan='2'>
                  <img src='<?php echo base_url() . sitio() ?>/imprimirqr?codigo=<?php echo $codigo ?>' width='100px'>  
                </td
            </tr>
            <tr align='center'>
                <td colspan='2' style='text-align:center;'>
                    <em style='font-size:10px;'>Este no es un comprobante fiscal deducible</em>
                </td>
            </tr>
            
           <?php if($empresa_id == 2){ ?>
                <tr align='center'>
                <td colspan='2' style='text-align:center;'><br>
                <!-- <em style='font-size:10px;'>Podr&aacute; solicitar su factura en 24 horas con su c&oacute;digo de<br>requisici&oacute;n en <b>www.cosafisc.com/facturas/</b></em> -->
                <em style='font-size:8px;'>Podr&aacute; solicitar su factura en 24 horas con su c&oacute;digo de<br>requisici&oacute;n en <br><b class='url-fact'>https://facturacionpvi.siafeson.org.mx/facturacion.php/</b></em>
                </td></tr>
          <?php  }elseif($empresa_id == 1){ ?>
                <tr align='center'>
                <td colspan='2' style='text-align:center;'><br>
                <!-- <em style='font-size:10px;'>Podr&aacute; solicitar su factura en 24 horas con su c&oacute;digo de<br>requisici&oacute;n en <b class='url-fact'>www.cesaveson.com/facturas/</b></em> -->
                <em style='font-size:8px;'>Podr&aacute; solicitar su factura en 24 horas con su c&oacute;digo de<br>requisici&oacute;n en <br><b class='url-fact'>https://facturacionpvi.siafeson.org.mx/facturacion.php/</b></em>
                </td></tr>
          <?php  } ?>
        </table>
</body>
</html>
