<?php
// List of events
$json = array();

// Query that retrieves events
$request = "SELECT * FROM events";

// connection to the database
try {
	$bdd = new PDO('mysql:host=localhost;dbname=fullcalendar', 'root', '');
} catch(Exception $ex) {
	exit('Unable to connect to database.');
}
 // Execute the query
$result = $bdd->query($request) or die(print_r($bdd->errorInfo()));

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

	$event = array();
	$event['id'] = $row['id'];
	$event['title'] = $row['title'];
	$event['start'] = $row['start'];
	$event['end'] = $row['end'];
	if ($row['allDay'] == 0) {
		$event['allDay'] = false;
	} else {
		$event['allDay'] = true;
	}
	//$event['allDay'] = false;

	// Merge the event array into the return array
	array_push($json, $event);
}

// sending the encoded result to success page
//$json = $result->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($json);

?>