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

    <!-- Map script -->
    <script src="/smartunibo/src/foodservice/map_settings.js"></script>
  </head>

  <body>
    <main>
      <div id="map"></div>
      <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbS22mHEoCvuhOAtmH2dGIJj1UmLGiJE0&callback=initMap"></script>

      <!-- FOOD 5 STAR RATING -->
      <div style="width: 100px;">
        <div class="rating" style="height: 26px; width: 85%; background-color:orange;">
          <img class="img-responsive" src="/smartunibo/src/foodservice/images/starRatingMask.png" alt="Rating" style="max-width:100px;">
        </div>
      </div>

    </main>
  </body>
</html>