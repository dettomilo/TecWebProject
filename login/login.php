<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <title>Smart Unibo</title>
    <script type="text/javascript" src="sha512.js"></script>
    <script type="text/javascript" src="forms.js"></script>
  </head>
  <body>
    <main>
      <section id="content">
        <h1>Titolo di esempio</h1>
        <p>Descrizione</p>

        <?php
        //Includo il file esterno relativo le funzioni di login.
        require("functions.php");

        //Avvio una sessione php sicura.
        sec_session_start();

        //Se le variabili sono state inviate in post e se l'utente ha quindi effettuato
        //il submit del form...
        if (isset($_POST['email'], $_POST['pw'])) {
          //Controllo che i valori non siano nulli
          if($_POST['email'] == NULL || $_POST['pw'] == NULL) {
            echo "<p>I valori non possono essere nulli</p>";
          } else {
            //Includo il file esterno relativo la connessione al database.
            require("db_connect.php");
            //Ottengo l'email inserita e la password criptata.
            $email = $_POST['email'];
            $password = $_POST['pw'];
            //Eseguo un tentativo di login.
            if (login($email, $password, $mysqli) == true) {
              //Login eseguito.
              echo "<p>Success: You have been logged in</p>";
            } else {
              //Login fallito.
              echo "<p>Login failed</p>";
            }
          }
        }
        ?>

        <form action="login.php" method="post" name="login_form">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" autocomplete="on"/><br/>
          <label for="password">Password</label>
          <input type="password" name="password" id="password" autocomplete="off"/><br/>
          <input type="button" value="Login" onclick="formhash(this.form, this.form.password);"/>
        </form>
      </section>
    </main>
  </body>
</html>
