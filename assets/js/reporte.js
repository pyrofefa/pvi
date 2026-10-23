var iTotalVol;
var iFilterVol;
$(document).ready(function(){
	$("#miTabla").dataTable({
		"iDisplayLength": 50,
		"sPaginationType": "bootstrap",
		"bLengthChange": false,
		"oLanguage": {
			"sInfo": "_TOTAL_ registros (_START_ a _END_)",
			"sInfoEmpty": "0",
			"sZeroRecords": "No hay registros para mostrar",
			"sInfoFiltered": " - filtrado de _MAX_ reg.",
			"sSearch": "Buscar: ",
			"oPaginate":{
				"sPrevious": "<",
				"sNext": ">",
				"sLast": ">>",
				"sFirst": "<<"
			},
		},
		"aaSorting": [[ 0, "desc" ]],
		"aoColumnDefs": [
		{	"bSortable": false,
			"aTargets": [ -1 ]	}
		],
		"fnFooterCallback": function ( nRow, aaData, iStart, iEnd, aiDisplay ) {
			if(ColumnToSum >= 0){
				iTotalVol = 0;
				iFilterVol = 0;
				for ( var i=0 ; i<aaData.length ; i++ )
				{
					iTotalVol += aaData[i][ColumnToSum].replace(",","")*1;
				}
				for ( var i=iStart ; i<iEnd ; i++ )
				{
					iFilterVol += aaData[ aiDisplay[i] ][ColumnToSum].replace(",","")*1;
				}
				//iTotalVol = iTotalVol.replace(",","");
				//iFilterVol = iFilterVol.replace(",","");
				var nCells = nRow.getElementsByTagName('th');
				var lg = "VOLUMEN TOTAL: " + parseFloat(iTotalVol).toFixed(2);
				lg += "     |     ";
				lg += "FILTRADO: " + parseFloat(iFilterVol).toFixed(2);
				nCells[0].innerHTML = lg;
			}
		}

	});

});