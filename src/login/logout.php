<?php
/*
* Questo script consente di eseguire il logout: avvia una sessione, la distrugge e
* reindirizza l'utente verso un'altra pagina.
*/

include 'functions.php';

//Avvio una sessione php sicura.
sec_session_start();

//Elimino tutti i valori della sessione.
$_SESSION = array();

//Recupero i parametri di sessione.
$params = session_get_cookie_params();

//Cancello i cookie attuali.
setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);

//Cancello la sessione.
session_destroy();

//Eseguo il reindirizzamento.
header('Location: ./');
?>
