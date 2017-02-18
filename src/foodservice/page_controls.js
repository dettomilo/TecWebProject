$(function() {
	$( ".range" ).change(function() {
		//Aggiorno la rappresentazione grafica
		updateRange($(this).val());
		//Mostro le mense presenti nel nuovo raggio specificato
		var pos = getCurrentPosition();
		refreshFoodServicesInRange(pos.lat, pos.lng);
	});
});
