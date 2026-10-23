function LatLngControl(map_local){
    //	this.ANCHOR_OFFSET_ = new google.maps.Point(8, 8);
    this.node_ = this.createHtmlNode_();
    map_local.controls[google.maps.ControlPosition.BOTTOM_LEFT].push(this.node_);
    this.setMap(map_local);
    this.set('visible', false);
    var instance = this;
    google.maps.event.addListener(map_local, 'mouseover', function(mEvent) {
        instance.set('visible', true);
    });
    google.maps.event.addListener(map_local, 'mouseout', function(mEvent) {
        instance.set('visible', false);
    });
    google.maps.event.addListener(map_local, 'mousemove', function(mEvent) {
        instance.updatePosition(mEvent.latLng);
    });
}

LatLngControl.prototype = new google.maps.OverlayView();
LatLngControl.prototype.draw = function() {};
LatLngControl.prototype.createHtmlNode_ = function() {
    var divNode = document.createElement('div');
    divNode.id = 'latlng-control';
    divNode.index = 100;
    divNode.style.color = 'white';
    divNode.style.backgroundColor = '#333333';
    divNode.style.fontFamily = "Arial";
    divNode.style.fontSize = "11px";
    divNode.style.width = '180px';
    divNode.style.height = '15px';
    divNode.style.textAlign = 'center';
    divNode.style.marginBottom = '5px';
    divNode.style.paddingBottom = '1px';
    divNode.style.paddingTop = '2px';
    return divNode;
};
LatLngControl.prototype.visible_changed = function() {
    this.node_.style.display = this.get('visible') ? '' : 'none';
};
LatLngControl.prototype.updatePosition = function(latLng) {
    var projection = this.getProjection();
    var point = projection.fromLatLngToContainerPixel(latLng);
    this.node_.innerHTML = [latLng.toUrlValue(10)];
};

function NivelesControl(map_local, nombres, niveles, all){
    this.div_ = this.createDiv(nombres, niveles, all, map_local);
    map_local.controls[google.maps.ControlPosition.RIGHT_TOP].push(this.div_);
    this.setMap(map_local);
    this.set('visible', true);
}
NivelesControl.prototype = new google.maps.OverlayView();
NivelesControl.prototype.draw = function() {};
NivelesControl.prototype.createDiv = function(nombres, niveles, all, map_local){
    var divNiveles = document.createElement('div');
    divNiveles.id = 'niveles-control';
    divNiveles.index = 200;
    divNiveles.style.position = 'absolute';
    divNiveles.style.backgroundColor = '#FFFFFF';
    divNiveles.style.fontFamily = "Tahoma";
    divNiveles.style.fontSize = "11px";
    divNiveles.style.borderStyle = "groove";
    divNiveles.style.borderWidth = "1px";
    divNiveles.style.borderColor = "#434343";
    divNiveles.style.marginRight = '5px';
    divNiveles.style.marginTop = '3px';
    var divChk = document.createElement('div');
    //nombres = new Array("Hola", "A", "Ustedes");
    //	niveles = new Array("1", "2", "3");
    //	all = true;
    var br = document.createElement("hr");
    var chk = document.createElement("input");
    var bold = document.createElement("b");
    if(all){
        chk.type = "checkbox";
        chk.name = "chk_allNivel";
        chk.id  = "chk_allNivel";
        chk.checked = true;
        chk.onclick=function(){checkAll(this.checked, map_local)};
        bold.className = "chk_all";
        var lbl1 = document.createTextNode("\u00A0 Todos \u00A0\u00A0");
        bold.appendChild(lbl1);
        divChk.appendChild(chk);
        divChk.appendChild(bold);    
        divChk.appendChild(br);    
        chk.checked = true;
        divNiveles.appendChild(divChk);
    }
    if(nombres.length > 0) {
        for(var i = 0; i < nombres.length; i++){
            divChk = document.createElement('div');
            br = document.createElement("br");
            chk = document.createElement("input");
            bold = document.createElement("b");
            var nom = niveles[i].replace(/ /g, "_");
            chk.type = "checkbox";
            chk.name = "nivel";
            chk.id  = "chk_"+ nom;
            chk.className = "quitaPonNivel";
            chk.onclick = getClickFunction(chk.id, chk, map_local);
            bold.className = "niv_" + nom;
            var lbl1 = document.createTextNode( "\u00A0" + nombres[i] + "\u00A0\u00A0");
            bold.appendChild(lbl1);
            divChk.appendChild(chk);
            divChk.appendChild(bold);
            divNiveles.appendChild(divChk);
            chk.checked = true;
        }
    }
    return divNiveles;
}

function getClickFunction(_nom, _chk, _map_local){
    return function(){
        toggleNivel(_nom, _chk.checked, _map_local);
    }

}

LatLngControl.prototype.visible_changed = function() {
    this.node_.style.display = this.get('visible') ? '' : 'none';
};

LatLngControl.prototype.getDefaultPosition = function() 
{  
    return new GControlPosition(G_ANCHOR_TOP_RIGHT, new GSize(7, 27));
}
LatLngControl.prototype.setTextStyle_ = function(text) 
{  
    text.style.color = "#000";
    text.style.fontSize="13px";
    text.style.fontFamily="Calibri";
    text.style.textAlign="justify";
    text.style.filter = "alpha(opacity=100)";
    text.style.MozOpacity="1";
}

function checkAll(_status, map_local){
    //	alert(_status);
    var elem = document.getElementsByClassName('quitaPonNivel');
    for (var i = 0; i < elem.length; ++i) {
        var item = elem[i];  
        item.checked = _status;
    }
    showMarcadores(map_local, '*', _status)
}

function toggleNivel(id, _status, map_local){
    // alert(id);
    var nivel = id.replace("chk_", "");
    if(_status == false){
        var _chkAll = document.getElementById("chk_allNivel");
        if(isset(_chkAll)){
            if(_chkAll.checked){
                _chkAll.checked = false;
            }			
        }
    }
    // else{}
    // if(A.length > 0){
    showMarcadores(map_local, nivel, _status);
    // }
}

// POLIGONOS

function NivelesControlP(map_local, nombres, niveles, all){
    this.div_ = this.createDiv(nombres, niveles, all, map_local);
    map_local.controls[google.maps.ControlPosition.RIGHT_TOP].push(this.div_);
    this.setMap(map_local);
    this.set('visible', true);
}
NivelesControlP.prototype = new google.maps.OverlayView();
NivelesControlP.prototype.draw = function() {};
NivelesControlP.prototype.createDiv = function(nombres, niveles, all, map_local){
    var divNivelesp = document.createElement('div');
    divNivelesp.id = 'niveles-controlp';
    divNivelesp.index = 200;
    divNivelesp.style.position = 'absolute';
    divNivelesp.style.backgroundColor = '#FFFFFF';
    divNivelesp.style.fontFamily = "Tahoma";
    divNivelesp.style.fontSize = "11px";
    divNivelesp.style.borderStyle = "groove";
    divNivelesp.style.borderWidth = "1px";
    divNivelesp.style.borderColor = "#434343";
    divNivelesp.style.marginRight = '5px';
    divNivelesp.style.marginTop = '3px';
    var divChkp = document.createElement('div');
    //nombres = new Array("Hola", "A", "Ustedes");
    //    niveles = new Array("1", "2", "3");
    //    all = true;
    var brp = document.createElement("hr");
    var chkp = document.createElement("input");
    var boldp = document.createElement("b");
    if(all){
        chkp.type = "checkbox";
        chkp.name = "chk_allNivelp";
        chkp.id  = "chk_allNivelp";
        chkp.checked = true;
        chkp.onclick=function(){checkAllp(this.checked, map_local)};
        boldp.className = "chk_allp";
        var lbl1 = document.createTextNode("\u00A0 Todos \u00A0\u00A0");
        boldp.appendChild(lbl1);
        divChkp.appendChild(chkp);
        divChkp.appendChild(boldp);    
        divChkp.appendChild(brp);    
        chkp.checked = true;
        divNivelesp.appendChild(divChk);
    }
    if(nombres.length > 0) {
        for(var i = 0; i < nombres.length; i++){
            divChkp = document.createElement('div');
            brp = document.createElement("br");
            chkp = document.createElement("input");
            boldp = document.createElement("b");
            var nomp = niveles[i].replace(/ /g, "_"); 
            chkp.type = "checkbox";
            chkp.name = "nivelp";
            chkp.id  = "chkp_"+ nomp;
            chkp.className = "quitaPonNivelp";
            chkp.onclick = getClickFunctionp(chkp.id, chkp, map_local);
            boldp.className = "nivp_" + nomp;
            var lbl1 = document.createTextNode( "\u00A0" + nombres[i] + "\u00A0\u00A0");
            boldp.appendChild(lbl1);
            divChkp.appendChild(chkp);
            divChkp.appendChild(boldp);
            divNivelesp.appendChild(divChkp);
            chkp.checked = true;
        }
    }
    return divNivelesp;
}

function getClickFunctionp(_nom, _chk, _map_local){
    return function(){
        toggleNivelp(_nom, _chk.checked, _map_local);
    }

}

function checkAllp(_status, map_local){
    //    alert(_status);
    var elem = document.getElementsByClassName('quitaPonNivelp');
    for (var i = 0; i < elem.length; ++i) {
        var item = elem[i];  
        item.checked = _status;
    }
    showPoligonos(map_local, '*', _status)
}

function toggleNivelp(id, _status, map_local){
    // alert(id);
    var nivel = id.replace("chkp_", "");
    if(_status == false){
        var _chkAll = document.getElementById("chkp_allNivel");
        if(isset(_chkAll)){
            if(_chkAll.checked){
                _chkAll.checked = false;
            }            
        }
    }
    // else{}
    // if(A.length > 0){
    showPoligonos(map_local, nivel, _status);
    // }
}

// ENDPOLIGONOS


function BarImageControl(map_local, imgPath, w, h){
    //	this.ANCHOR_OFFSET_ = new google.maps.Point(8, 8);
    this.node_ = this.createHtmlNode_(imgPath, w, h);
    map_local.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(this.node_);
    this.setMap(map_local);
    this.set('visible', true);
    var instance = this;
    // google.maps.event.addListener(map_local, 'mouseover', function(mEvent) {
    // 	instance.set('visible', true);
    // });
    // google.maps.event.addListener(map_local, 'mouseout', function(mEvent) {
    // 	instance.set('visible', false);
    // });
    // google.maps.event.addListener(map_local, 'mousemove', function(mEvent) {
    // 	instance.updatePosition(mEvent.latLng);
    // });
}

BarImageControl.prototype = new google.maps.OverlayView();
BarImageControl.prototype.draw = function() {};
BarImageControl.prototype.createHtmlNode_ = function(path, w, h) {
    var divNode = document.createElement('div');
    var img = new Image();
    img.src = path;

    img.style.width = '100%';
    img.style.height = '100%';

    divNode.appendChild(img);

    divNode.id = 'barImage-control';
    divNode.index = 100;
    // divNode.style.color = 'white';
    divNode.style.backgroundColor = 'transparent';
    // divNode.style.fontFamily = "Arial";
    // divNode.style.fontSize = "11px";
    divNode.style.width = ''+ w +'';
    divNode.style.height = ''+ h +'';
    divNode.style.textAlign = 'center';
    divNode.style.marginBottom = '10px';
    divNode.style.paddingLeft = '8px';
    // divNode.style.paddingTop = '2px';
    return divNode;
};
BarImageControl.prototype.visible_changed = function() {
    this.node_.style.display = this.get('visible') ? '' : 'none';
};
BarImageControl.prototype.updatePosition = function(latLng) {
    var projection = this.getProjection();
    var point = projection.fromLatLngToContainerPixel(latLng);
    this.node_.innerHTML = [latLng.toUrlValue(10)];
};


