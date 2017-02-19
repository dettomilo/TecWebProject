<?php
  //Includo il file esterno relativo la connessione al database.
  require($_SERVER['DOCUMENT_ROOT'] . "/smartunibo/src/database/db_connect.php");

  //Inlcudo il file per la formattazione dell'url.
  require("format_url.php");

  //Includo il file esterno relativo le funzioni per l'ottenimento delle mense poste in un certo range.
  require("foodservice_functions.php");

  //Visualizzazione delle mense in un certo range.
  $menseInRange = getFoodServicesInRange($_GET['lat'], $_GET['lng'], $_GET['range'], $mysqli);

  foreach ($menseInRange as $m) {
    echo
    '
    <div class="well" style="border-radius: 10px; box-shadow: 5px 2px 10px #888; margin: 5%; background-color:white;">
      <strong>'.$m["Nome"].'</strong><br />'.$m["Indirizzo"].'<br />';

    if(!is_null($m["SitoWeb"])) {
      echo '<a href="'.$m["SitoWeb"].'">'.formatURL($m["SitoWeb"]).'</a><br />';
    }

    echo
    '
      <em>Telefono: '.$m["Telefono"].'</em><br />

      <div style="min-width:110px; width: 110px;">
        <div class="rating" style="width: '.$m["Valutazione"].'%; height: 97%; background-color:orange;">
        <img src="/smartunibo/src/foodservice/images/starRatingMask.png" alt="Rating" style="min-width:110px;">
        </div>
      </div>

      <br />
      <p>Distanza: '.$m["Distanza"].' km</p>
    </div>
    ';
  }
 ?>
