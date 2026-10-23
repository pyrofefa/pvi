var app = angular.module('ExportarApp', []);
app.controller('Exportar', ["$scope", "$http", function(s, h) {
        s.tipos = [
            {val: 1, txt: 'Semanal'},
            {val: 2, txt: 'Mensual'}
        ];
        s.level = nivel;
        s.tipo = s.tipos[0];
        s.anos,s.semanas,s.meses = [];
        s.ano,s.semana,s.mes,s.valor;
        s.mesName = ['','Enero','Febrero','Marzo','Abril','Mayo'
                    ,'Junio','Julio','Agosto','Septiembre','Octubre'
                    ,'Noviembre','Diciembre'];
        s.LoadAnos = function() {
          blocke($('#exportarmodal .modal-content'));
            h.post(
                    url + '/AgetAnos', {
                        ajax: 1,
                        'nivel': nivel
                    }
            )
                    .success(function(data) {
                        if (data.length > 0) {
                            s.anos = data;
                            s.ano = s.anos[0];
                            s.YearChanged();
                        } else {
                            s.anos = [];
                        }
                    })
                    .error(function(err) {
                        s.anos = [];
                        $('#exportarmodal .modal-content').unblock();
                    })
                    .finally(function() {
                        $('#exportarmodal .modal-content').unblock();
                    });
        };
        s.LoadAnosCustom = function() {
            blocke($('#exportarmodal .modal-content'));
            h.post(
                    url + '/'+getAnos, {
                        ajax: 1,
                        'nivel': nivel
                    }
            )
                    .success(function(data) {
                        if (data.length > 0) {
                            s.anos = data;
                            s.ano = s.anos[0];
                            s.YearChangedCustom();
                        } else {
                            s.anos = [];
                        }
                    })
                    .error(function(err) {
                        s.anos = [];
                        $('#exportarmodal .modal-content').unblock();
                    })
                    .finally(function() {
                        $('#exportarmodal .modal-content').unblock();
                    });
        };
        s.SetType = function(t) {
            s.type = t;
            if(s.tipo.val == 1){
              s.valor = s.semana.semana;
            }else{
              s.valor = s.mes.mes;
            }
        };
        s.SetValor = function(v){
            s.valor = v;
        };
        s.YearChanged = function() {
            blocke($('#exportarmodal .modal-content'));
                h.post(
                        url + '/AgetMS', {
                            ajax: 1,
                            ano: s.ano.ano,
                            'nivel': nivel
                        }
                )
                        .success(function(data) {
                            if (data.mes.length > 0) {
                                s.meses = data.mes;
                                s.mes = s.meses[0];
                            } else {
                                s.mes = [];
                            }
                            if(data.semana.length > 0){
                                s.semanas = data.semana;
                                s.semana = s.semanas[0];
                            }
                            if(s.tipo.val == 1){
                                s.valor = s.semana.semana;
                            }else{
                                s.valor = s.mes.mes;
                            }
                        })
                        .error(function(err) {
                            s.mes = [];
                            $('#exportarmodal .modal-content').unblock();
                        })
                        .finally(function() {
                            $('#exportarmodal .modal-content').unblock();
                        });
        };
        s.YearChangedCustom = function() {
            blocke($('#exportarmodal .modal-content'));
                h.post(
                        url + '/'+getMS, {
                            ajax: 1,
                            ano: s.ano.ano,
                            'nivel': nivel
                        }
                )
                        .success(function(data) {
                            if (data.mes.length > 0) {
                                s.meses = data.mes;
                                s.mes = s.meses[0];
                            } else {
                                s.mes = [];
                            }
                            if(data.semana.length > 0){
                                s.semanas = data.semana;
                                s.semana = s.semanas[0];
                            }
                            if(s.tipo.val == 1){
                                s.valor = s.semana.semana;
                            }else{
                                s.valor = s.mes.mes;
                            }
                        })
                        .error(function(err) {
                            s.mes = [];
                            $('#exportarmodal .modal-content').unblock();
                        })
                        .finally(function() {
                            $('#exportarmodal .modal-content').unblock();
                        });
        }
    }]);

function blocke(el) {
        var html = '<img src="'+spinner+'" />';
        el.block({
                    message: html,
                });
    }
