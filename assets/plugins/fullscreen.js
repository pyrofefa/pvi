$(document).ready(function(){
	$("#btn_fullscreen").click(function(event){
		event.preventDefault();
		console.log(myMapEdit.getCenter().lat());
		var toGo =  this.href + "center_lat=" + myMapEdit.getCenter().lat() + "&center_lon=" + myMapEdit.getCenter().lng() + "&_zoom=" + myMapEdit.getZoom();
		var win=window.open(toGo);
		});
});