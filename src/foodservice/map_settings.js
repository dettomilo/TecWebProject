//Posizione corrente dell'utente
var pos;

//Mappa
var map;

//Cerchio per la rappresentazione dell'area di ricerca
var rangeCircle;

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

	//Binding delle proprietà
	map = new google.maps.Map(document.getElementById("map"), mapProp);

	//Disablitazione della visibilità dei punti di interesse all'interno della mappa (es. ristoranti)
	//diversi da quelli supportati dal servizio
	map.setOptions({styles: styles['hide']});

	//Dichiarazione dell'oggetto finestra per la visualizzazione dei dettagli
	var infoWindow = new google.maps.InfoWindow();

	//Geolocalizzazione HTML5
	if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };

			//Operazioni svolte non appena si entra a conoscenza della posizione
			drawRange(map, pos, 2000);
			refreshFoodServicesInRange(pos.lat, pos.lng);

			//Visualizzazione del marker in corrispondenza dell'utente
			map.setCenter(pos);
			var userImage = "/smartunibo/src/foodservice/images/userMapPointer.png";
			var marker = new google.maps.Marker({
        map: map,
        position: pos,
				icon: userImage,
				animation: google.maps.Animation.DROP,
				clickable: false
      });
    });
  } else {
			//Se la geolocalizzazione non è supportata dal Browser...
			//Si ricorre a una osizione di default su cui centrare la mappa (Via Sacchi 3, Cesena)
			pos = new google.maps.LatLng(44.139763, 12.243217);
			drawRange(map, pos, 2000);
			refreshFoodServicesInRange(pos.lat, pos.lng);
			map.setCenter(pos);
	}


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
	      infowincontent.appendChild(document.createElement('br'));
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
* sulla base del raggio specificato.
*/
function updateRange(range) {
	rangeCircle.setMap(null);
	drawRange(map, pos, range * 1000);
}

/*
* Questa funzione restituisce la posizione corrente dell'utente (geolocalizzata o meno),
* su cui è inzialmente centrata la mappa.
*/
function getCurrentPosition() {
	return pos;
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
