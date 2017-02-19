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
      				left: 'prev,next today listWeek',
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

			//Verifico che il login sia stato eseguito.
			if (login_check($mysqli)) {
		 ?>

  	<body>
  		<main>
  			<section id=content class="container">
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
					<nav class="navbar navbar-default" role="navigation">
			    <div class="container">
						<div class="navbar-header navbar-right">
							<button type="button" class="navbar-toggle pull-right" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Apri menu navigazione</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>

				      <!-- NO COLLAPSE -->
				      <div class="navbar-header">
				        <ul class="nav navbar-nav pull-right noStack">
									<li class="active"><a href="/smartunibo/src/home/calendar/calendar.php" id="calendario" class="glyphicon glyphicon-calendar pull" role="button" aria-haspopup="true"></a></li>

									<li><a href="#" id="notifiche" class="glyphicon glyphicon-bell" aria-haspopup="true" data-toggle="notifichePopover" data-trigger="focus"></a></li>

									<li><a href="#" id="user" class="glyphicon glyphicon-user" aria-haspopup="true" data-toggle="userMenuPopover" data-trigger="focus"></a></li>
				        </ul>
				      </div>

						</div>

						<div class="collapse navbar-collapse navbar-left">
			        <ul class="nav navbar-nav">
								<li><a href="/smartunibo/src/home/home.php" id="news">News</a></li>
								<li><a href="/smartunibo/src/home/services/services.php" id="servizi">Servizi</a></li>
								<li><a href="/smartunibo/src/home/career/career.php" id="carriera">Carriera</a></li>
			        </ul>
			      </div>

			    </div>
			  </nav>

				<!-- NOTIFICHE POPOVER -->
				<div style="display:none" class="lista_notifiche">
			  	<ul class="unstyled">
			    	<li class="notifica"><a href="#">Messaggio di notifica un po più lungo del normale</a> <br /><div class="clearfix"></div></li>
			    	<li class="notifica"><a href="#">Messaggio di notifica 2 un po più lungo del normale</a> <br /><div class="clearfix"></div></li>
			    	<li class="notifica"><a href="#">Messaggio di notifica un po più lungo del normale</a> <br /><div class="clearfix"></div></li>
			  	</ul>
				</div>

				<script>
					$(document).ready(function(){
					    $('[data-toggle="notifichePopover"]').popover({
								'title' : 'Notifiche',
								'html' : true,
								container: 'body',
								'placement' : 'bottom',
								template: '<div class="popover popover-medium popoverNotifiche"><div class="arrow"></div><div class="popover-inner"><h3 class="popover-title"></h3><div class="popover-content"><p></p></div></div></div>',
								'content' : $(".lista_notifiche").html()
							});
					});
				</script>
				<!-- FINE NOTIFICHE POPOVER -->

				<!-- USER MENU POPOVER -->
				<div style="display:none" class="lista_menu_utente">
						<a href="#">Impostazioni</a>
						<hr>
						<a href="/smartunibo/src/login/logout.php">Logout</a>
				</div>

				<script>
					$(document).ready(function(){
					    $('[data-toggle="userMenuPopover"]').popover({
								'title' : 'Bentornato <?php echo $_SESSION['nome'] ?>',
								'html' : true,
								container: 'body',
								'placement' : 'bottom',
								template: '<div class="popover popover-medium popoverUser"><div class="arrow"></div><div class="popover-inner"><h3 class="popover-title"></h3><div class="popover-content"><p></p></div></div></div>',
								'content' : $(".lista_menu_utente").html()
							});
					});
				</script>
				<!-- FINE USER MENU POPOVER -->

        <div class="jumbotron">
        <?php
        //Stampo il nome del corso frequentato dallo studente.

        $nomeCorso = getCorso($_SESSION['matricola'], $mysqli);
        echo '
            <h2 class="display-2">Calendario</h2>
            <h3 class="nomeCorsoNews">'.$nomeCorso.'</h3>
						<br />';
         ?>
        <div class="row">
          <div class="col-md-12">
            <div id='calendar'></div>
          </div>
        </div>
        </div>

				<!-- spacing line to footer -->
				<hr />

				<footer>
	        <p>Smart Unibo - 2017</p>
					<a href="#" class="go-top"><i class="glyphicon glyphicon-chevron-up" style="color:#bb2e29"></i></a>
	      </footer>

  			</section>
  		</main>
  	</body>

		<?php
			} else {
				echo "<p><b>Attenzione</b>: è necessario effetturare prima il login</p>";
			}
		?>
</html>
