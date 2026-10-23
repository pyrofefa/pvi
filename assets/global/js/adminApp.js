var app = angular.module('AdminApp',['ui.bootstrap',"ngRoute",'angular-loading-bar','highcharts-ng','datatables','remoteValidation','selectize']);
app.config(["$routeProvider","$locationProvider", function(rp,lp){
	rp.when('/inicio',{templateUrl: base_url+'/Dashboard',controller: 'Home',activetab: 'inicio'})
	.when('/',{templateUrl: base_url+'/inicio',controller: 'Home',activetab: 'inicio'})
	.when('/usuarios',{templateUrl: base_url+'/usuarios',controller: 'Usuarios',activetab: 'usuarios'})
	.when('/usuarios/editar/:userId',{templateUrl:base_url+'/opUsuarios',controller:'Opusuarios',activetab:'usuarios'})
	.when('/usuarios/crear',{templateUrl:base_url+'/opUsuarios',controller:'Opusuarios',activetab:'usuarios'})
	.otherwise({redirectTo: '/'});
}]);
app.config(['cfpLoadingBarProvider', function(cfpLoadingBarProvider) {
	cfpLoadingBarProvider.parentSelector = 'div#angular';
}]);
app.controller('Navbar',["$scope","$location","$routeParams",function(s,l,r){
	s.base_url = base_url;
	s.tabActive = function(location){
		return location.split('/')[1] == l.path().split('/')[1];
	}
}]);
app.controller('Home',["$scope","$http","$route",function(s,h,r){
	s.sitioData = [];
	s.years = years;
	s.yearSelected = new Date().getFullYear();
	s.GetSitioData = function(){
		h.post(base_url+'/GetSitioData',{
			ajax: 1
		}).then(function(res){
			s.sitioData = res.data;

		});
	};
	s.GetSitioData();
	
	s.chartUsuario = {
		options: {
			chart: {
				type: 'line'
			}
		},
		series: [{
			name: 'Usuarios',
			data: []
		}],
		title: {
			text: 'Usuarios dados de alta en el año '+s.yearSelected
		},
		xAxis:{
			categories: months
		},
		yAxis:{
			title: {text:'Usuarios'}
		},
		loading: false
	}
	s.chartUbicaciones = {
		options: {
			chart: {
				type: 'line'
			}
		},
		series: [
		{
			name: 'Ubicaciones',
			data: []
		}],
		title: {
			text: 'Ubicaciones dadas de alta en el año '+s.yearSelected
		},
		xAxis:{
			categories: months
		},
		yAxis:{
			title: {text:'Ubicaciones'}
		},
		loading: false
	}
	s.UpdateYearData = function(){
		s.chartUsuario.loading = true;
		s.chartUbicaciones.loading = true;
		s.chartUsuario.series[0].data = [];
		s.chartUbicaciones.series[0].data = [];
		s.chartUbicaciones.title.text = 'Ubicaciones dadas de alta en el año '+s.yearSelected;
		s.chartUsuario.title.text = 'Usuarios dados de alta en el año '+s.yearSelected;
		h.post(base_url+'/GetDataByYear',{
			ajax: 1,
			year: s.yearSelected
		}).then(function(res){
			s.chartUsuario.series[0].data = res.data.UsersByYear;
			s.chartUbicaciones.series[0].data = res.data.UbicacionesByYear;
			s.chartUsuario.loading = false;
			s.chartUbicaciones.loading = false;
		});
	};
	s.UpdateYearData();
}]);
app.controller('Usuarios',["$scope","$http","$compile","DTOptionsBuilder","DTColumnBuilder",function(s,h,compile,DTOptionsBuilder,DTColumnBuilder){
	s.dtColumns = [	DTColumnBuilder.newColumn('id').withTitle('ID')
					,DTColumnBuilder.newColumn('usuario').withTitle('Usuario')
					,DTColumnBuilder.newColumn('nombre').withTitle('Nombre')
					,DTColumnBuilder.newColumn('apPaterno').withTitle('Ap.Paterno')
					// ,DTColumnBuilder.newColumn('apMaterno').withTitle('Ap.Materno')
					,DTColumnBuilder.newColumn('junta').withTitle('Junta')
					// ,DTColumnBuilder.newColumn('email').withTitle('Email')
					,DTColumnBuilder.newColumn('personalID').withTitle('PersonalID')
					,DTColumnBuilder.newColumn('sistema').withTitle('Sistema').withClass('text-center').renderWith(function(data,type,full,meta){
						if(data > 0){
							return '<i class="fa fa-check" style="color:green;"></i>';
						}else{
							return '<i class="fa fa-times" style="color:red;"></i>';
						}
					})
					// ,DTColumnBuilder.newColumn('niveles').withTitle('Niveles')
					,DTColumnBuilder.newColumn('opciones').withTitle('Opciones').notSortable().renderWith(function(data,type,full,meta){
						return '<a class="btn btn-default btn-sm" href="'+base_url+'#usuarios/editar/'+full.id+'">'+
								'<i class="fa fa-edit"></i> Editar</a>';
					})];
	s.base_url = base_url;
	s.dtOptions = DTOptionsBuilder.newOptions().withOption('ajax',{
			url: base_url+'/GetUsers',
			type: 'POST'
		}).withOption('processing',true).withOption('serverSide',true).withDataProp('data');
}]);
app.controller('Opusuarios',["$scope","$routeParams","$http",function(s,r,h){
	s.juntas = [];
	s.niveles = [];
	s.myConfig = {
	      create: false,
	      valueField: 'id',
	      labelField: 'short_name',
	      placeholder: 'Selecciona una junta',
	      onInitialize: function(selectize){
	        //
	    },
	    maxItems: 1
	};
	s.myConfigNivel = {
	      create: false,
	      valueField: 'id',
	      labelField: 'description',
	      placeholder: 'Selecciona los niveles del usuario',
	      onInitialize: function(selectize){
	        //
	    },
	    maxItems: 15
	};
	if(r.userId){
		s.portletTitle = 'Editar Usuario';
		s.edit = true;
		s.id = r.userId;

	}else{
		s.portletTitle = 'Crear Usuario';
		s.edit = false;
		s.id = 0;
	}
	s.GetJuntas = function(){
		h.post(base_url+'/GetJuntas/',{
			ajax: 1
		}).then(function(res){
			s.juntas = res.data;
		});
	};
	s.GetNiveles = function(){
		h.post(base_url+'/GetNiveles/',{
			ajax: 1
		}).then(function(res){
			s.niveles = res.data;
		});
	};
}]);