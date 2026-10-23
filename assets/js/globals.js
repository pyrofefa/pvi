// Se toma del navegador para que funcione igual en XAMPP (http://localhost/pvi/) y en Docker (http://localhost:8080/)
var _hostname = window.location.host;
var _host = window.location.protocol + "//" + _hostname + window.location.pathname.replace(/[^\/]*\.php.*$/, "");
var _customs = _host + "assets/customs/";
