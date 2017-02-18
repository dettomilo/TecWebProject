<?php

/*
* Questa funzione calcola la distanza tra due posizioni geografiche e restituisce il
* risultato dell'operazione sulla base dell'unità di misura specificata.
*/
function calcDistance($lat1, $lon1, $lat2, $lon2, $unit) {
  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);

  if ($unit == "K") {
    return round(($miles * 1.609344), 2);
  } else if ($unit == "N") {
    return round(($miles * 0.8684), 2);
  } else {
    return round($miles, 2);
  }
}

/*
* Questa funzione serve per stabilire il criterio di ordinamento dell'array associativo:
* crescente sulla base del campo "Distanza".
*/
function cmp($a, $b) {
  if ($a["Distanza"] == $b["Distanza"]) {
    return 0;
  }
  return ($a["Distanza"] < $b["Distanza"]) ? -1 : 1;
}

/*
* Questa funzione restituisce le mense presenti all'interno del range della dimensione
* specificata (a partire dalla posizione indicata), in ordine di distanza crescente.
*/
function getFoodServicesInRange($latitude, $longitude, $range, $mysqli) {
  if ($stmt = $mysqli->prepare("SELECT * FROM mense WHERE 1")) {
    $stmt->execute(); //Eseguo la query creata
    $result = $stmt->get_result(); //Ottengo il risultato della query
    $temp = array();
    $array = array();
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) { //Per ogni mensa...
      $dist = calcDistance($latitude, $longitude, $row["Latitudine"], $row["Longitudine"], "K");
      if ($dist <= $range) {  //... Se essa rientra nel range...
        $temp["Nome"] = $row["Nome"];
        $temp["Indirizzo"] = $row["Indirizzo"];
        $temp["SitoWeb"] = $row["SitoWeb"];
        $temp["Telefono"] = $row["Telefono"];
        $temp["Valutazione"] = $row["Valutazione"];
        $temp["Distanza"] = $dist;
        $array[$row['IdMensa']] = $temp; //... Memorizzo i dati in un nuovo array associativo
        unset($temp);
      }
    }
    usort($array, "cmp");
    return $array;
  }
}
?>
