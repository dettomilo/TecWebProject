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

			<!-- CALENDAR -->
      <link href='/smartunibo/lib/fullcalendar-3.1.0/fullcalendar.min.css' rel='stylesheet' />
      <link href='/smartunibo/lib/fullcalendar-3.1.0/fullcalendar.print.min.css' rel='stylesheet' media='print' />
      <script src='/smartunibo/lib/fullcalendar-3.1.0/lib/moment.min.js'></script>
      <script src='/smartunibo/lib/fullcalendar-3.1.0/fullcalendar.min.js'></script>
      <script src='/smartunibo/lib/fullcalendar-3.1.0/locale/it.js'></script>

      <script>

      	$(document).ready(function() {

      		$('#calendar').fullCalendar({
      			header: {
      				left: 'prev,next today',
      				right: 'title'
      			},

      			events: "/smartunibo/src/home/calendar/events.php",
      			defaultView: 'listWeek',
      			defaultDate: '2017-02-22', // this line should be deleted to use current day
      			navLinks: true, // can click day/week names to navigate views
      			editable: false,
      			eventLimit: true, // allow "more" link when too many events
      		});
      	});

      </script>
      <style>

      	#calendar {
      		max-width: 1050px;
      		margin: 0 auto;
      	}

      </style>

			<!-- BackToTop script -->
			<script src='/smartunibo/src/home/back_to_top.js'></script>

	    <!-- bootstrap CSS override -->
	    <link rel="stylesheet" type="text/css" href="/smartunibo/src/home/homeStyle.php" media="screen"/>
  	</head>

    <?php
			//Includo il file esterno relativo la connessione al database.
			require($_SERVER['DOCUMENT_ROOT'] . "/smartunibo/src/database/db_connect.php");
      //Includo il file esterno relativo le funzioni di login per la gestione della sessione.
			require($_SERVER['DOCUMENT_ROOT'] . "/smartunibo/src/login/functions.php");

			//Includo il file esterno relativo le funzioni per l'ottenimento dei dati dello studente.
			require("../student_functions.php");

			//Avvio la sessione.
			sec_session_start();
		 ?>

  	<body>
  		<main>
  			<section id=content class="container-fluid">
	  			<header class="header">
	  				<div>
	  					<a href="/smartunibo/src/home/home.php">
								<div class="row">
									<div class="col-md-12">
										<img class="img-responsive center-block" src="/smartunibo/src/home/images/SmartUniboBanner.png" alt="Logo Smart Unibo">
									</div>
								</div>
      				</a>
	  				</div>
	  			</header>

			<!-- NAV BAR -->
		<nav class="navbar navbar-default">
      <div class="container">

				<div class="row">
					<div class="col-md-12">

          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Apri o Chiudi Navigazione</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>

          <div id="navbar" role="navigation" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
            <ul class="nav navbar-nav">
							<li><a href="/smartunibo/src/home/home.php">News</a></li>
              <li><a href="#">Servizi</a></li>
              <li><a href="#">Carriera</a></li>
						</ul>

            <ul class="nav navbar-nav navbar-right">
							<li class="active"><a href="#" class="glyphicon glyphicon-calendar" role="button" aria-haspopup="true" aria-expanded="false" data-toggle="modal" data-target="#calendarBox"></a></li>
							<li><a href="#" class="glyphicon glyphicon-bell" role="button" aria-haspopup="true" aria-expanded="false"></a></li>
							<li class="dropdown">
                <a href="#" class="glyphicon glyphicon-user" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                <ul class="dropdown-menu">
									<li><a href="#">Impostazioni</a></li>
									<li role="separator" class="divider"></li>
                  <li><a href="/smartunibo/src/login/logout.php">Logout</a></li>
                </ul>
              </li>
            </ul>

      		</div><!--/.nav-collapse -->
				</div>

			</div>
    </div><!--/.container-fluid -->
  </nav>
        <?php
        //Stampo il nome del corso frequentato dallo studente.
        $nomeCorso = getCorso($_SESSION['matricola'], $mysqli);
        echo '
            <h2 class="text-center">CALENDARIO</h2>
            <h3 class="text-center nomeCorsoNews">'.$nomeCorso.'</h3>';
         ?>
        <div class="row">
          <div class="col-md-12">
            <div id='calendar'></div>
          </div>
        </div>

				<!-- spacing line to footer -->
				<hr>

				<footer>
	        <p>© Smart Unibo - 2017</p>
					<a href="#" class="go-top"><i class="glyphicon glyphicon-chevron-up" style="color:white"></i></a>
	      </footer>

  			</section>
  		</main>
  	</body>

</html>
