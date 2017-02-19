//Posizione corrente dell'utente
var pos;

//Mappa
var map;

//Cerchio per la rappresentazione dell'area di ricerca
var rangeCircle;

//Dimensione di default del raggio dell'area
var currentRangeRadius = 2000;

//Marker relativo alla posizione dell'utente
var userMarker;

//Variabile per il refresh della geolocalizzazione
var positionTimer;

//Variabile per la gestione della traduzione Indirizzo-->coordinate
var geocoder;

/*
* Questa funzione inizializza la mappa, impostando le sue proprietà.
* Lo schema di funzionamento è stato assunto a partire dalle guida ufficiale sulle
* Google Maps API: https://developers.google.com/maps/documentation/javascript/mysql-to-maps
*/
function initMap() {
	//Impostazioni della mappa
	var mapProp = {
	    zoom: 14,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			zoomControl: true,
      zoomControlOptions: {
				style: google.maps.ZoomControlStyle.LARGE,
				position: google.maps.ControlPosition.LEFT_BOTTOM
			},
			streetViewControl: true,
      streetViewControlOptions: {
          position: google.maps.ControlPosition.RIGHT_BOTTOM
      },
      fullscreenControl: true,
			disableDefaultUI: true,
			gestureHandling: 'cooperative'
	};

	//inizializzazione del geocoder
	geocoder = new google.maps.Geocoder();

	//Binding delle proprietà
	map = new google.maps.Map(document.getElementById("map"), mapProp);

	//Disablitazione della visibilità dei punti di interesse all'interno della mappa (es. ristoranti)
	//diversi da quelli supportati dal servizio
	map.setOptions({styles: styles['hide']});

	//Dichiarazione dell'oggetto finestra per la visualizzazione dei dettagli
	var infoWindow = new google.maps.InfoWindow();

	//Geolocalizzazione HTML5
	setGeolocatedPosition();

	//A partire dal file XML contenente i dati delle varie mense (estratte da db)
	//si realizza il caricamento dei marker all'interno della mappa.
	downloadUrl("/smartunibo/src/foodservice/get_map_markers.php", function(data) {
		var xml = data.responseXML;
    var markers = xml.documentElement.getElementsByTagName('marker');
    Array.prototype.forEach.call(markers, function(markerElem) {
      var name = markerElem.getAttribute('Nome');
			var address = markerElem.getAttribute('Indirizzo');
      var point = new google.maps.LatLng(
          parseFloat(markerElem.getAttribute('Latitudine')),
          parseFloat(markerElem.getAttribute('Longitudine')));
			var siteWeb = markerElem.getAttribute('SitoWeb');
			var telephone = markerElem.getAttribute('Telefono');
			var rating = markerElem.getAttribute('Valutazione');
			var image = markerElem.getAttribute('Immagine');

			//Nome
      var infowincontent = document.createElement('div');
      var strong = document.createElement('strong');
      strong.textContent = name;
      infowincontent.appendChild(strong);
      infowincontent.appendChild(document.createElement('br'));

			//Indirizzo
			var addressText = document.createElement('text');
			addressText.textContent = address;
			infowincontent.appendChild(addressText);
      infowincontent.appendChild(document.createElement('br'));

			//Sito web
			if (siteWeb.length > 0) {
				var siteWebText = document.createElement('a');
				var linkText = document.createTextNode(siteWeb);
				siteWebText.appendChild(linkText);
				siteWebText.title = siteWeb;
				siteWebText.href = siteWeb;
				infowincontent.appendChild(siteWebText);
			}

			//Telefono
			var telephoneText = document.createElement('text');
			telephoneText.textContent = telephone;
			infowincontent.appendChild(telephoneText);
      infowincontent.appendChild(document.createElement('br'));

			//Valutazione
			var ratingControl = document.createElement('div');
			var str =
			'<div style="width: 100px;"><div class="rating" style="height: 26px; width: ' + rating + '%; background-color:orange;">' +
			'<img class="img-responsive" src="/smartunibo/src/foodservice/images/starRatingMask.png" alt="Rating" style="max-width:100px;">' +
			'</div></div>';
			ratingControl.innerHTML = str;
			infowincontent.appendChild(ratingControl);

			//Visualizzazione del marker in corrispondenza della mensa corrente e gestione dei relativi eventi
      var marker = new google.maps.Marker({
        map: map,
        position: point,
				icon: image,
				animation: google.maps.Animation.DROP
      });
      marker.addListener('click', function() {
        infoWindow.setContent(infowincontent);
        infoWindow.open(map, marker);
      });
    });
	});
}

/*
* Questa funzione aggiorna la circonferenza rappresentante l'area di ricerca mense
* sulla base del raggio (in chilometri) specificato.
*/
function updateRange(range) {
	rangeCircle.setMap(null);
	currentRangeRadius = range * 1000;
	drawRange(map, pos, currentRangeRadius);
}

/*
* Questa funzione restituisce la posizione corrente dell'utente (geolocalizzata o meno),
* su cui è inzialmente centrata la mappa.
*/
function getCurrentPosition() {
	return pos;
}

/*
* Questa funzione gestisce la geolocalizzazione qualora sia supportata.
*/
function setGeolocatedPosition() {
	if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(displayAndWatch, locError, {
			enableHighAccuracy: false,
			timeout: 60000,
			maximumAge: 60000
		});
  } else {
		window.alert("Il tuo browser non supporta la geolocalizzazione");
	}
}

/*
* Questa funzione gestisce i possibili errori che possono essere incontrati durante la
* geolocalizzazione.
*/
function locError(err) {
	if (err.code == 1) {
		console.log("Error: Access is denied!");
	} else if (err.code == 2) {
		console.log("Error: Position is unavailable!");
	} else {
		console.log("Error: Geolocation not supported");
	}
}

/*
* Questa funzione rappresenta ciò che viene svolto qualora la localizzazione abbia successo.
*/
function displayAndWatch(position) {
	//Aggiornamento della posizione
	pos = {
		lat: position.coords.latitude,
		lng: position.coords.longitude
	};

	//Disegno dell'area
	if (rangeCircle != null) {
		rangeCircle.setMap(null);
	}
	drawRange(map, pos, currentRangeRadius);
	refreshFoodServicesInRange(position.coords.latitude, position.coords.longitude);

	//Impostazione della posizione dell'utente e relativo marker
	setUserLocation(position);

	//Aggiornamento del marker al cambiamento di posizione dell'utente
	watchCurrentPosition();
}

/*
* Questa funzione gestisce il disegno del marker legato all'utente e il centramento della mappa.
*/
function setUserLocation(position) {
	var userImage = "/smartunibo/src/foodservice/images/userMapPointer.png";
	if (userMarker != null) {
		userMarker.setMap(null);
	}
	userMarker = new google.maps.Marker({
		map: map,
		position: pos,
		icon: userImage,
		animation: google.maps.Animation.DROP,
		clickable: false
	});
	map.panTo(new google.maps.LatLng(position.coords.latitude, position.coords.longitude));
}

/*
* Questa funzione aggiorna la posizione del marker sulla mappa e il conseguenziale centramento.
*/
function watchCurrentPosition() {
	positionTimer = navigator.geolocation.watchPosition(function(position) {
		setMarkerPosition(userMarker, position);
		map.panTo(new google.maps.LatLng(position.coords.latitude, position.coords.longitude));
	})
}

/*
* Questa funzione posiziona il marker specificato nel punto individuato mediante geolocalizzazione.
*/
function setMarkerPosition(marker, position) {
	marker.setPosition(new google.maps.LatLng(position.coords.latitude, position.coords.longitude));
}

/*
* Questa funzione prende in ingresso una stringa rappresentante un indirizzo e la converte
* in coordinate geografiche, aggiornando di conseguenza la posizione, il marker dell'utente
* e l'area di ricerca.
* Se non viene individuato alcun risultato per l'indirizzo passato come parametro, non viene
* applicata alcuna modifica.
*/
function setNewPosition(address) {
	if (geocoder) {
		geocoder.geocode( {'address': address}, function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
					navigator.geolocation.clearWatch(positionTimer);
					//Aggiornamento della posizione e centramento della mappa
					pos = {
						lat: results[0].geometry.location.lat(),
						lng: results[0].geometry.location.lng()
					};
					map.setCenter(pos);
					//Reset del marker dell'utente
					var userImage = "/smartunibo/src/foodservice/images/userMapPointer.png";
					userMarker.setMap(null);
					userMarker = new google.maps.Marker({
		        map: map,
		        position: pos,
						icon: userImage,
						animation: google.maps.Animation.DROP,
						clickable: false
		      });
					//Ridisegno del range
					rangeCircle.setMap(null);
					drawRange(map, pos, currentRangeRadius);
					//Mostro le mense presenti nel raggio a partire dalla nuova posizione specificata
					refreshFoodServicesInRange(pos.lat, pos.lng);
				}
			}
		});
	}
}

/*
* Stili di visualizzazione della mappa.
*/
var styles = {
	default: null,
	hide: [
		{
			featureType: 'poi.business',
			stylers: [{visibility: 'off'}]
		}
	]
};

/*
* Questa funzione disegna una circonferenza in corrispondenza della posizione
* specificata e del raggio indicato.
*/
function drawRange(map, pos, radius) {
	rangeCircle = new google.maps.Circle({
		strokeColor: '#696969',
		strokeOpacity: 0.8,
		strokeWeight: 2,
		fillColor: '#939393',
		fillOpacity: 0.2,
		map: map,
		center: pos,
		radius: radius
	});
}

/*
* Questa funzione carica il file XML dall'URL specificato sfruttando AJAX.
* Il parametro 'callback' indica la funzione che viene richiamata dallo script nel
* momento in cui viene reperito l'XML. Questo consente di lavorare in modo asincrono.
*/
function downloadUrl(url, callback) {
  var request = window.ActiveXObject ?
      new ActiveXObject('Microsoft.XMLHTTP') :
      new XMLHttpRequest;

  request.onreadystatechange = function() {
    if (request.readyState == 4) {
      request.onreadystatechange = doNothing;
      callback(request, request.status);
    }
  };

  request.open('GET', url, true);
  request.send(null);
}

/*
* Funzione vuota di supporto
*/
function doNothing() {}
