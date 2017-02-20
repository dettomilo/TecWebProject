<?php
// List of events
$json = array();

// Query that retrieves events
$request = "SELECT *
			FROM eventi
			INNER JOIN tipi_eventi
			ON eventi.Tipo=tipi_eventi.TipoEvento";

// connection to the database
try {
	$bdd = new PDO('mysql:host=localhost;dbname=smartunibo', 'root', '');
} catch(Exception $ex) {
	exit('Unable to connect to database.');
}
 // Execute the query
$result = $bdd->query($request) or die(print_r($bdd->errorInfo()));

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

	$event = array();
	$event['id'] = $row['IdEvento'];
	$event['title'] = $row['Titolo'];
	$event['start'] = $row['DataOraInizio'];
	$event['end'] = $row['DataOraFine'];
	$event['color'] = $row['Colore'];
	if ($row['GiornoIntero'] == 0) {
		$event['allDay'] = false;

	} else {
		$event['allDay'] = true;
	}

	// Merge the event array into the return array
	array_push($json, $event);
}

// Change the query in order to fetch from another table
$request = "SELECT * FROM lezioni";
// Execute the new query
$result = $bdd->query($request) or die(print_r($bdd->errorInfo()));

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

	$event = array();
	$event['id'] = $row['IdLezione'];
	$event['title'] = $row['NomeMateria'];
	$event['start'] = $combined_date_and_time = $row['Data'] . ' ' . $row['OraInizio'];
	$event['end'] = $combined_date_and_time = $row['Data'] . ' ' . $row['OraFine'];
	$event['allDay'] = false;
	$event['color'] = "#AAA";

	// Merge the event array into the return array
	array_push($json, $event);
}

// sending the encoded result to success page
//$json = $result->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($json);

?>
