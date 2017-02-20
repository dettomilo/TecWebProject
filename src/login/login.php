<!DOCTYPE html>
<html lang="it">

  <head>
    <title>Smart Unibo</title>

    <!-- meta informations -->
    <meta charset="UTF-8">
    <!-- to ensure proper zooming and rendering on mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="sha512.js"></script>
    <script type="text/javascript" src="forms.js"></script>

    <!-- bootstrap CSS override -->
    <link rel="stylesheet" type="text/css" href="login.css" media="screen" />
  </head>

  <body>
    <main>
      <img class="img-responsive" src="/smartunibo/src/login/images/sigillo.png" alt="Logo Unibo" style="position:absolute; float:left; bottom:0">
      <section id="content" class="container-fluid">

        <?php
        //Includo il file esterno relativo le funzioni di login.
        require("functions.php");
        $varMsg = "";
        //Avvio una sessione php sicura.
        sec_session_start();

        //Se le variabili sono state inviate in post e se l'utente ha quindi effettuato
        //il submit del form...
        if (isset($_POST['email'], $_POST['pw'])) {
          //Controllo che i valori non siano nulli
          if($_POST['email'] == NULL || $_POST['pw'] == NULL) {
            $varMsg =  "<p class='text-center response'>Inserisci le tue credenziali</p>";
          } else {
            //Includo il file esterno relativo la connessione al database.
            require($_SERVER['DOCUMENT_ROOT'] . "/smartunibo/src/database/db_connect.php");
            //Ottengo l'email inserita e la password criptata.
            $email = $_POST['email'];
            $password = $_POST['pw'];
            //Eseguo un tentativo di login.
            if (login($email, $password, $mysqli) == true) {
              //Login eseguito.
              header("Location: http://localhost/smartunibo/src/home/home.php");
              exit;
            } else {
              //Login fallito.
              $varMsg =  "<p class='text-center response'>Login fallito</p>";
            }
          }
        }
        ?>

        <div class="modal-dialog modal-transparent">
          <div class="modal-content">

            <div class="modal-header">
              <h1 class="text-center">Smart Unibo</h1>
            </div>

            <form action="login.php" method="post" name="login_form">
            <div class="modal-body">

              <div class="form-group input-group">
                <label class="sr-only" for="email">Email</label>
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="email" name="email" id="email" autocomplete="on" placeholder="email istituzionale" class="form-control input-lg"/><br/>
              </div>

              <div class="form-group input-group">
                <label class="sr-only" for="password">Password</label>
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input type="password" name="password" id="password" autocomplete="off" placeholder="password" class="form-control input-lg"/><br/>
              </div>

              <div class="form-group">
                <?php
                  echo $varMsg;
                 ?>
                <input type="button" value="Login" onclick="formhash(this.form, this.form.password);" class="btn btn-block btn-lg"/>
              </div>

            </div>
            </form>

          </div>
        </div>

      </section>
    </main>
  </body>
</html>
