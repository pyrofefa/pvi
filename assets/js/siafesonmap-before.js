function isset(variable){
	if(typeof(variable) != "undefined" && variable !== null) {
		return true;
	}
	else{
		return false;
	}
}

function creaMarcadores(map_local){
	if(isset(eval("MARCADORES_" + map_name))){
		for(var ii = 0; ii < eval("LATITUD_" + map_name).length; ii++){
			var _mOpt = getOpt(eval("LATITUD_" + map_name)[ii], eval("LONGITUD_" + map_name)[ii], eval("COLORES_" + map_name)[ii], 10, eval("IDS_" + map_name)[ii]);
			var _marker = creaMarcador(_mOpt, map_local);
			eval("MARCADORES_" + map_name)[ii] = _marker;
			if(js_function){
				google.maps.event.addListener(eval("MARCADORES_" + map_name)[ii],'click', attachListener2(_marker, _mOpt, map_local));
			}
			else{
				google.maps.event.addListener(eval("MARCADORES_" + map_name)[ii],'click', attachListener(_marker, _mOpt, map_local));
			}
		}
	}
}

function attachListener(_mrk,_opt,_map1){
	var contenido = getStr(_mrk);
	return function () {
		iw.setContent(contenido);
		iw.open(_map1, _mrk);
	}
}

function attachListener2(_mrk,_opt,_map1){
	var contenido = getStr2(_mrk);
	return function () {
		var fn = window[js_function];
		var fnparams = [contenido,_opt,_map1];
		if (typeof fn === "function") fn.apply(null, fnparams);
		// console.log(fn);
		// console.log(js_function);
	}
}

function getStr(_mrk){
	var str = "";
	// alert(JSON.stringify(_mrk.direccion, null, 4));
	for(var o in _mrk.direccion){
		str += "&" + encodeURIComponent(o) + '=' + 
		encodeURIComponent(_mrk.direccion[o]);
	}
	var contenido = "<iframe name='popup' class='infowindow' src='"+ eval("ruta_a_redirect_" + map_name) +"?balloon=1"+ str +"'></iframe";
	return contenido;
}

function getStr2(_mrk){
	var par = {};
	// alert(_mrk.direccion);
	for(var o in _mrk.direccion){
		// console.log(encodeURIComponent(o) + ":" + _mrk.direccion[o]);
		par[encodeURIComponent(o)] = encodeURIComponent(_mrk.direccion[o]);
		// ret.push(par);
	}
	return par;
}

function creaMarcador(options){
	// alert(JSON.stringify(options, null, 4));
	var _mark1 = new google.maps.Marker(options);
	return _mark1;
}

function setContent(opt, _map_local, marker){
	var str = "";
	for(var o in opt.direccion){
		str += "&" + encodeURIComponent(o) + '=' + 
		encodeURIComponent(opt.direccion[o]);
	}
	var contenido = "<iframe name='popup' class='infowindow' src='"+ eval("ruta_a_redirect_" + map_name) +"?balloon=1"+ str +"'></iframe";
	iw.setContent(contenido);
}

function showMarcadores(_map, _nivel, _status){
	var i;
	// alert(_map);
	// alert(_nivel);
	// alert(eval("NIVELES_" + map_name)[100]);
	// alert(eval("NIVELES_" + map_name)[100] == _nivel);
	// alert(_status);
	
	if(isset(eval("MARCADORES_" + map_name))){
		for(i = 0; i < eval("MARCADORES_" + map_name).length; i++){
			if(eval("NIVELES_" + map_name)[i] == _nivel || _nivel == '*'){
				if(_status){
					eval("MARCADORES_" + map_name)[i].setMap(_map);
				}
				else{
					eval("MARCADORES_" + map_name)[i].setMap(null);
				}
			}
		}
	}
}

function showPoligonos(_map, _nivel, _status){
    var i;
    // alert(_map);
    // alert(_nivel);
    // alert(eval("NIVELES_" + map_name)[100]);
    // alert(eval("NIVELES_" + map_name)[100] == _nivel);
    // alert(_status);
    
    if(isset(eval("POLIGONOS_" + map_name))){
        for(i = 0; i < eval("POLIGONOS_" + map_name).length; i++){
            if(eval("POLICOLORS_" + map_name)[i] == _nivel || _nivel == '*'){
                if(_status){
                    eval("POLIGONOS_" + map_name)[i].setMap(_map);
                }
                else{
                    eval("POLIGONOS_" + map_name)[i].setMap(null);
                }
            }
        }
    }
}


function getOpt(_lat, _lon, _color, _size, _id){
	if(isset(google)){
		var A = new Object();
		A = getLink(_id);
		var markerOptions = {
			position: new google.maps.LatLng(_lat,_lon),
			icon: new google.maps.MarkerImage(baseURL + 'assets/imgs/markers_10/' + _color + '.png',
				new google.maps.Size(_size, _size),
				new google.maps.Point(0, 0)),
			direccion: A
		};
		return markerOptions;
	}
}

function getLink(_id){
	var A = eval("PARAMADD_" + map_name);
	A["Pag"] = eval("RPT_" + map_name);
	A["ID"] = _id;
	return A;
}