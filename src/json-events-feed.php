<?php
try {

    // Connect to database
    // $connection = new PDO($url, $username, $password);
    //$connection = new PDO('mysql:host=localhost;dbname=events;charset=utf8_general_ci', 'root', '');
    $connection = new PDO('mysql:host=localhost;dbname=fullcalendar;charset=utf8_general_ci', 'root', '');

    // Prepare and execute query
    //$query = "SELECT * FROM events";
    $query = "SELECT * FROM evenement";
    $sth = $connection->prepare($query);
    $sth->execute();

    // Returning array
    $events = array();

    // Fetch results
    while ($row = $sth->fetch(PDO::FETCH_ASSOC) {

        $e = array();
        $e['title'] = $row['title'];
        //$e['description'] = $row['description'];
        $e['start'] = $row['start'];
        $e['end'] = $row['end'];
        $e['allDay'] = false;

        // Merge the event array into the return array
        array_push($events, $e);

    }

    // Output json for our calendar
    echo json_encode($events);
    exit();

} catch (PDOException $e) {
    echo $e->getMessage();
}

?>