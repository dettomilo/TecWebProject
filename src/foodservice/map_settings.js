/*
* Questa funzione inizializza la mappa, impostando le sue proprietà.
* Lo schema di funzionamento è stato assunto a partire dalle guida ufficiale sulle
* Google Maps API: https://developers.google.com/maps/documentation/javascript/mysql-to-maps
*/
function initMap() {
	//Impostazioni della mappa
	var mapProp = {
	    zoom: 16,
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
	var map = new google.maps.Map(document.getElementById("map"), mapProp);

	//Disablitazione della visibilità dei punti di interesse all'interno della mappa (es. ristoranti)
	//diversi da quelli supportati dal servizio
	map.setOptions({styles: styles['hide']});

	//Dichiarazione dell'oggetto finestra per la visualizzazione dei dettagli
	var infoWindow = new google.maps.InfoWindow();

	//Geolocalizzazione HTML5
	if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var myPosition = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      map.setCenter(myPosition);
			var userImage = "/smartunibo/src/foodservice/images/userMapPointer.png";
			var marker = new google.maps.Marker({
        map: map,
        position: myPosition,
				icon: userImage,
				animation: google.maps.Animation.DROP,
				clickable: false
      });
    });
  } else {
			//Se la geolocalizzazione non è supportata dal Browser...
			//Posizione di default su cui centrare la mappa (Via Sacchi 3, Cesena)
			var defaultPos = new google.maps.LatLng(44.139763, 12.243217);
			map.setCenter(defaultPos);
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

      var infowincontent = document.createElement('div');
      var strong = document.createElement('strong');
      strong.textContent = name;
      infowincontent.appendChild(strong);
      infowincontent.appendChild(document.createElement('br'));

			var addressText = document.createElement('text');
			addressText.textContent = address;
			infowincontent.appendChild(addressText);
      infowincontent.appendChild(document.createElement('br'));

			var siteWebText = document.createElement('text');
			siteWebText.textContent = siteWeb;
			infowincontent.appendChild(siteWebText);
      infowincontent.appendChild(document.createElement('br'));

			var telephoneText = document.createElement('text');
			telephoneText.textContent = telephone;
			infowincontent.appendChild(telephoneText);
      infowincontent.appendChild(document.createElement('br'));

			var foodServiceImage = "/smartunibo/src/foodservice/images/RestaurantMapPointer.png";
      var marker = new google.maps.Marker({
        map: map,
        position: point,
				icon: foodServiceImage,
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
