<?php
//Includo il file esterno relativo la connessione al database
require($_SERVER['DOCUMENT_ROOT'] . "/smartunibo/src/database/db_connect.php");

//Creo il nodo radice del file XML
$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);

//Seleziono tutti i marker
if ($stmt = $mysqli->prepare("SELECT * FROM mense AS M INNER JOIN tipi_servizi AS T ON M.TipoServizio = T.IdTipoServizio WHERE 1")) {
  $stmt->execute(); //Eseguo la query creata
  $result = $stmt->get_result(); //Ottengo il risultato della query

	//Imposto il tipo del file
	header("Content-type: text/xml");

	//Creo un nodo XML per ogni marker
	while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
	  $node = $dom->createElement("marker");
	  $newnode = $parnode->appendChild($node);
    $newnode->setAttribute("IdMensa", $row['IdMensa']);
	  $newnode->setAttribute("Nome", $row['Nome']);
    $newnode->setAttribute("Indirizzo", $row['Indirizzo']);
	  $newnode->setAttribute("Latitudine", $row['Latitudine']);
	  $newnode->setAttribute("Longitudine", $row['Longitudine']);
    $newnode->setAttribute("SitoWeb", $row['SitoWeb']);
    $newnode->setAttribute("Telefono", $row['Telefono']);
    $newnode->setAttribute("Valutazione", $row['Valutazione']);
    $newnode->setAttribute("Immagine", $row['Immagine']);
	}

	echo $dom->saveXML();
}
?>
