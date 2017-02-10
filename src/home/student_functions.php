<?php
/*
* Questa funzione restituisce il nome del corso frequentato dallo studente con
* la matricola specificata.
*/
function getCorso($matricola, $mysqli) {
  if ($stmt = $mysqli->prepare("SELECT NomeCorso FROM studenti WHERE Matricola = ? LIMIT 1")) {
    $stmt->bind_param('i', $matricola); //Eseguo il binding dei parametri.
    $stmt->execute(); //Eseguo la query creata.
    $stmt->store_result();

    //Se esiste un utente con la matricola specificata
    if ($stmt->num_rows == 1) {
      $stmt->bind_result($corso); //Recupero il risultato della query
      $stmt->fetch();
    }
    return $corso;
  }
}
?>
