<!DOCTYPE html>
<html lang="it">
  <head>
    <title>FoodService</title>
    <style>
      /* Impostazione esplicita dell'altezza della mappa per la definzione delle dimensioni
       * dell'elemento div che la contiene. */
      #map {
        height: 500px;
        width: 500px;
      }
      /* Impostazione delle dimensioni della pagina. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>

    <!-- meta informations -->
	  <meta charset="UTF-8">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Map script -->
    <script src="/smartunibo/src/foodservice/map_settings.js"></script>

    <!-- Page controls script -->
    <script src="/smartunibo/src/foodservice/page_controls.js"></script>
  </head>
  <body>
    <main>
      <!-- SELEZIONE RAGGIO -->
      <form>
        Seleziona il range per la ricerca delle mense:<br>
        <select id="rangeSelector" class="range">
          <option value="1">1 Km</option>
          <option value="2" selected="selected">2 Km</option>
          <option value="3">3 Km</option>
          <option value="4">4 Km</option>
          <option value="5">5 Km</option>
        </select>
      </form>

      <!-- MAPPA -->
      <div id="map"></div>
      <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbS22mHEoCvuhOAtmH2dGIJj1UmLGiJE0&callback=initMap"></script>

      <!-- ELENCO MENSE -->
      <div id="foodservices"></div>
      <script>
        function refreshFoodServicesInRange() {
          $.ajax({
            url: "data.php?range=" + $("#rangeSelector option:selected").val(),
            cache: false,
            success: function(data) {
              $("#foodservices").html(data);
            }
          });
        }

        $(document).ready(function(){
          refreshFoodServicesInRange();  //Loads foordservices when DOM is ready
        });
      </script>
    </main>
  </body>
</html>
