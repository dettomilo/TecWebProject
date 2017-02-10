<?php
// List of events
$json = array();

// Query that retrieves events
$request = "SELECT *,
				IF(events.allDay = 0, false, true) as allDay
			FROM events";

 // connection to the database
try {
	$bdd = new PDO('mysql:host=localhost;dbname=fullcalendar', 'root', '');
} catch(Exception $e) {
	exit('Unable to connect to database.');
}
 // Execute the query
$result = $bdd->query($request) or die(print_r($bdd->errorInfo()));

 // sending the encoded result to success page
$json = $result->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($json);

?>