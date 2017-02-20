<?php
/*
* Questa funzione restituisce un array in cui ogni elemento riporta il tipo di evento
* gestito dal db e il colore a esso associato.
*/
function getEventColors($mysqli) {
	if ($stmt = $mysqli->prepare("SELECT * FROM tipi_eventi")) {
    $stmt->execute(); //Eseguo la query appena creata
    $result = $stmt->get_result(); //Ottengo il risultato della query
    $legend = array();
    $type_event = array();
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) { //Per ogni tipo di evento...
      $type_event["Tipo"] = $row["TipoEvento"];
      $type_event["Colore"] = $row["Colore"];
			array_push($legend, $type_event); //... Memorizzo i dati nell'array associativo risultante
    }
    return $legend;
  }
}
?>
