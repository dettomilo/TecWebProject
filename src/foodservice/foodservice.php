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
        <select class="range">
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

      <?php
        //Includo il file esterno relativo la connessione al database.
        require($_SERVER['DOCUMENT_ROOT'] . "/smartunibo/src/database/db_connect.php");

        //Includo il file esterno relativo le funzioni per l'ottenimento delle mense poste in un certo range.
        require("foodservice_functions.php");

        //Visualizzazione delle mense in un certo range:
        //è stabilita temporaneamente una posizione fissa.
        $menseInRange = getFoodServicesInRange(44.14455, 12.248835, 2, $mysqli);
        echo "<b>Mense nel raggio (ordinate per distanza):</b><br>";
        foreach ($menseInRange as $m) {
          echo "Nome = " .$m["Nome"] ."<br>";
          echo "Indirizzo = " .$m["Indirizzo"] ."<br>";
          echo "SitoWeb = " .$m["SitoWeb"] ."<br>";
          echo "Telefono = " .$m["Telefono"] ."<br>";
          echo "Valutazione = " .$m["Valutazione"] ."/100<br>";
          echo "Distanza = " .$m["Distanza"] ."km<br>";
          echo "---------------------------------------------<br>";
        }
       ?>
    </main>
  </body>
</html>
