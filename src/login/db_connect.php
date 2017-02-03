<?php
$servername = "localhost";
$username = "admin_user";
$password = "KWvHbgcLtCimIMBg";
$db = "smartunibo";

//Create connection
$mysqli = new mysqli($servername, $username, $password, $db);

//Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
