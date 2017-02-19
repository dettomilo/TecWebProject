<?php
// List of keys
$keys = array();

// Query that retrieves events
$request = "SELECT * FROM tipi_eventi";

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
	$event['tipo'] = $row['TipoEvento'];
	$event['color'] = $row['Colore'];

	// Merge the event array into the return array
	array_push($keys, $event);
}

echo $keys;
?>