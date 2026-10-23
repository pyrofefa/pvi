$(document).ready(function() {
        //$('#tablafixed').fixedHeaderTable({altClass: 'odd' },{ themeClass: 'table' });
        $('#tablafixed').dataTable( {
            "bPaginate": false,
            'bSearchable': false,
            "bLengthChange": false,
            "sScrollY": "250px",
            "bFilter": false,
            "bSort": false,
            "bInfo": false
        } );
        $('.fht-thead table.fht-table').dataTable( {
            "bPaginate": false,
            'bSearchable': false,
            "bLengthChange": false,
            "sScrollY": "250px",
            "bFilter": false,
            "bSort": false,
            "bInfo": false
        } );
        $('.dataTables_empty').parent().hide();
        $('.ocultar').click(function(){
            fnShowHide($(this).val()); 
        });
        $('#columnasul').click(function(e){
        e.stopPropagation();
    });
    });
    
    
    function fnShowHide( iCol )
    {
        /* Get the DataTables object again - this is not a recreation, just a get of the object */
        var oTable = $('#tablafixed').dataTable();
        var iTable = $('.fht-thead table.fht-table').dataTable();
	
        var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
        oTable.fnSetColumnVis( iCol, bVis ? false : true);
        
        var bVis1 = iTable.fnSettings().aoColumns[iCol].bVisible;
        iTable.fnSetColumnVis( iCol, bVis1 ? false : true);
        $('.dataTables_empty').parent().parent().hide();
        $('.fht-tbody').css('padding-top','12px');
    }