<?php
  //Includo il file esterno relativo la connessione al database.
  require($_SERVER['DOCUMENT_ROOT'] . "/smartunibo/src/database/db_connect.php");

  //Includo il file esterno relativo le funzioni per l'ottenimento delle mense poste in un certo range.
  require("foodservice_functions.php");

  //Visualizzazione delle mense in un certo range.
  $menseInRange = getFoodServicesInRange($_GET['lat'], $_GET['lng'], $_GET['range'], $mysqli);
  //echo "Latitudine: " .$_GET['lat'] ."<br>";
  //echo "Longitudine: " .$_GET['lng'] ."<br><br>";
  //echo "<b>Mense nel raggio di " .$_GET['range'] ."Km (ordinate per distanza):</b><br>";
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
