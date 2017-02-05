<?php
/*
* Questa funzione va richiamata all'inizio di ogni pagina avente la necessità di accedere
* a una variabile di sessione.
* Impedisce a un hacker di accere all'id della sessione usando un semplice script Java.
* Previene inoltre l'hijacking della sessione.
*/
function sec_session_start() {
  $session_name = 'session_id';
  $secure = false;
  $httponly = true; //Impedisce a un javascript di essere in grado di accedere all'id di sessione.
  ini_set('session.use_only_cookies', 1); //Forzo la sessione a utilizzare solo i cookie.
  $cookieParams = session_get_cookie_params(); //Leggo i parametri correnti relativi ai cookieParams
  session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly);
  session_name($session_name); //Imposto il nome di sessione.
  session_start(); //Avvio la sessione php.
  session_regenerate_id(); //Rigenero la sessione e cancello quella creata in precedenza.
}


/*
* Questa funzione verifica l'indirizzo e-mail e la password specificate con quelle
* memorizzate nel database, inizializzando le variabili di sessione e restituendo 'true'
* nel caso in cui venga trovata una corrispondenza.
* Gestisce inoltre attacchi a "forza bruta".
*/
function login($email, $password, $mysqli) {
  //Utilizzo statement sql 'prepared' per non rendere possibile un attacco di tipo SQL injection.
  if ($stmt = $mysqli->prepare("SELECT Matricola, Nome, Cognome, Pw, Salt FROM studenti WHERE EmailIstituzionale = ? LIMIT 1")) {
    $stmt->bind_param('s', $email); //Eseguo il bind del parametro '$email'.
    $stmt->execute(); //Eseguo la query appena creata.
    $stmt->store_result();
    $stmt->bind_result($matricola, $nome, $cognome, $db_password, $salt); //Recupero il risultato della query e lo memorizzo nelle variabili.
    $stmt->fetch();
    $password = hash('sha512', $password.$salt); //Codifico la password usando una chiave univoca.

    //Se l'utente esiste...
    if ($stmt->num_rows == 1) {
      //Verifico che non sia disabilitato in seguito all'esecuzione di troppi tentativi di accesso errati.
      if (checkbrute($matricola, $mysqli) == true) {
        //Account disabilitato.
        return false;
      } else {
        //Verifico cha la pw memorizzata nel database corrisponda a quella inserita dall'utente.
        if ($db_password == $password) {
          //Password corretta.
          $user_browser = $_SERVER['HTTP_USER_AGENT'];
          $matricola = preg_replace("/[^0-9]+/", "", $matricola);       //Protezione da attacco XSS.
          $_SESSION['matricola'] = $matricola;
          $nome = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $nome);        //Protezione da attacco XSS.
          $_SESSION['nome'] = $nome;
          $cognome = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $cognome);  //Protezione da attacco XSS.
          $_SESSION['cognome'] = $cognome;
          $_SESSION['login_string'] = hash('sha512', $password.$user_browser);
          //Login eseguito con successo.
          return true;
        } else {
          //Password non corretta.
          //Registro il tentativo fallito nel database.
          $now = time();
          $mysqli->query("INSERT INTO tentativi_login (Matricola, Ora) VALUES ('$matricola', '$now')");
          return false;
        }
      }
    } else {
      //L'utente inserito non esiste.
      return false;
    }
  }
}


/*
* Questa funzione verifica la presenza di almeno 5 tentativi di login eseguiti
* nelle ultime due ore da parte della matricola specificata come parametro.
* Serve per prevenire un attacco basato su "forza bruta".
* Restituisce 'true' in caso di corrispondenza, 'false' altrimenti.
*/
function checkbrute($matricola, $mysqli) {
  //Recupero il timestamp della data e ora corrente.
  $now = time();
  //Analizzo tutti i tentativi di login effettuati nelle ultime due ore.
  $valid_attempts = $now - (2 * 60 * 60);
  if ($stmt = $mysqli->prepare("SELECT Ora FROM tentativi_login WHERE Matricola = ? AND Ora > '$valid_attempts'")) {
    $stmt->bind_param('i', $matricola);
    //Eseguo la query creata.
    $stmt->execute();
    $stmt->store_result();
    //Verifico l'esistenza di più di 5 tentativi di login falliti.
    if ($stmt->num_rows > 5) {
      return true;
    } else {
      return false;
    }
  }
}


/*
* Questa funzione verifica lo stato del login.
* L'esecuzione del controllo sulla base di 'login_string' consente di prevenire
* un attacco all'hijacking della sessione.
*/
function login_check($mysqli) {
  //Verifico che tutte le variabili di sessione siano impostate correttamente.
  if (isset($_SESSION['matricola'], $_SESSION['nome'], $_SESSION['cognome'], $_SESSION['login_string'])) {
    $matricola = $_SESSION['matricola'];
    $nome = $_SESSION['nome'];
    $cognome = $_SESSION['cognome'];
    $login_string = $_SESSION['login_string'];
    $user_browser = $_SERVER['HTTP_USER_AGENT'];
    if ($stmt = $mysqli->prepare("SELECT Pw FROM studenti WHERE Matricola = ? LIMIT 1")) {
      $stmt->bind_param('i', $matricola); //Eseguo il bind del parametro '$matricola'
      $stmt->execute(); //Eseguo la query creata.
      $stmt->store_result();

      //Se l'utente esiste
      if ($stmt->num_rows == 1) {
        $stmt->bind_result($password); //Recupero il risultato della query
        $stmt->fetch();
        $login_check = hash('sha512', $password.$user_browser);
        if ($login_check == $login_string) {
          //Login eseguito.
          return true;
        } else {
          //Login non eseguito.
          return false;
        }
      } else {
        //Login non eseguito.
        return false;
      }
    } else {
      //Login non eseguito.
      return false;
    }
  } else {
    //Login non eseguito.
    return false;
  }
}
?>
