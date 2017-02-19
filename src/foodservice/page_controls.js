$(function() {
	//BUTTONS
	$("#geolocation").click(function() {
		//Avvio la geolocalizzazione
		setGeolocatedPosition();
	});
	$("#calculatePos").click(function() {
		//Imposto la nuova posizione dell'utente
		setNewPosition($("#address").val());
	});

	//RANGE SELECTOR
	$( ".range" ).change(function() {
		//Aggiorno la rappresentazione grafica
		updateRange($(this).val());
		//Mostro le mense presenti nel nuovo raggio specificato
		var pos = getCurrentPosition();
		refreshFoodServicesInRange(pos.lat, pos.lng);
	});
});
