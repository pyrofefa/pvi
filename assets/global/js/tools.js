var app = angular.module('ToolsApp', []);
app.controller('Grafica', ["$scope", "$http","$element", function(s, h, e) {
	s.graf = function(t,tec){
		blocke(e);
		console.log(tec);
		h.post(
				url + 'graficaAvance', {
				ajax: 1,
				'sem': semana,
				'ano': ano,
				'tec': tec,
				'type': t
				}
            ).success(function(data) {
				var objeto = [];
				if(data.length > 0){
					for(var i = 0;i < data.length;i++){
						objeto[i] = [];
						objeto[i].push(data[i].tipo);
						objeto[i].push(parseFloat(data[i].Avance));
					}
					e.highcharts({
				        chart: {
				            plotBackgroundColor: null,
				            plotBorderWidth: null,
				            plotShadow: false
				        },
				        title: {
				            text: ''
				        },
				        tooltip: {
				    	    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
				        },
				        plotOptions: {
				            pie: {
				                allowPointSelect: true,
				                cursor: 'pointer',
				                dataLabels: {
				                    enabled: true,
				                    color: '#000000',
				                    connectorColor: '#000000',
				                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
				                }
				            }
				        },
				        series: [{
				            type: 'pie',
				            name: 'Avance',
				            data: objeto
				        }]
				    });
				}else{
					e.html('<i class="fa fa-info-circle"></i> No se encontraron datos para la semana especificada.');
				}
			}).error(function(err) {
				e.html('<i class="fa fa-ban"></i> Ocurrió un error al obtener la gráfica. Intente de nuevo');
            }).finally(function() {
				e.unblock();
			});
	};
	console.log(e);
}]);

function blocke(el) {
	var html = '<img src="'+spinner+'" /><br>Cargando...';
	el.block({
        message: html,
        theme: false
    });
}