$(function() {
	//RADIOBUTTON
	$("#geolocation").change(function() {
		setGeolocatedPosition();
		$("#address").css('visibility', 'hidden');
		$("#calculatePos").css('visibility', 'hidden');
	});
	$("#manual").change(function() {
		$("#address").css('visibility', 'visible');
		$("#calculatePos").css('visibility', 'visible');
	});

	//SELECTOR
	$( ".range" ).change(function() {
		//Aggiorno la rappresentazione grafica
		updateRange($(this).val());
		//Mostro le mense presenti nel nuovo raggio specificato
		var pos = getCurrentPosition();
		refreshFoodServicesInRange(pos.lat, pos.lng);
	});

	//BUTTON
	$("#calculatePos").click(function() {
		//Imposto la nuova posizione dell'utente
		setNewPosition($("#address").val());
	});
});
