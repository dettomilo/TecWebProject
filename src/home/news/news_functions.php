<?php
/*
* Questa funzione restituisce le notizie più recenti, in relazione ai parametri specificati:
* - categoria delle notizie desiderate (0 = ateneo, 1 = corso)
* - numero di notizie richieste
* Viene restituito un array di array associativi, contenenti le varie notizie e, per ognuna
* di esse, le informazioni di interesse.
* Link di riferimento sulla soluzione adottata:
* - http://php.net/manual/it/mysqli-result.fetch-array.php
*/
function getNews($isCorso, $numNews, $mysqli) {
  if ($stmt = $mysqli->prepare("SELECT IdNotizia, t.Tipo, DATE_FORMAT(DATE(DataOra), '%d/%m/%Y') as Data, Titolo, Sommario, Testo, Immagine
  FROM notizie AS n INNER JOIN tipi_notizie AS t ON n.Tipo = t.IdTipo
  WHERE IsCorso = ? ORDER BY DataOra DESC LIMIT ?")) {
    $stmt->bind_param('ii', $isCorso, $numNews); //Eseguo il binding dei parametri
    $stmt->execute(); //Eseguo la query appena creata
    $result = $stmt->get_result(); //Ottengo il risultato della query
    $temp = array();
    $array = array();
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) { //Per ogni notizia...
      $temp["Tipo"] = $row["Tipo"];
      $temp["Data"] = $row["Data"];
      $temp["Titolo"] = $row["Titolo"];
      $temp["Sommario"] = $row["Sommario"];
      $temp["Testo"] = $row["Testo"];
      $temp["Immagine"] = $row["Immagine"];
      $array[$row['IdNotizia']] = $temp; //... Memorizzo i dati in un nuovo array associativo
      unset($temp);
    }
    return $array;
  }
}
?>
