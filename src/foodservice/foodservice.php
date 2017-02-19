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
			<!-- Map script -->

	    <script src="/smartunibo/src/foodservice/map_settings.js"></script>

	    <!-- Page controls script -->
	    <script src="/smartunibo/src/foodservice/page_controls.js"></script>

			<!-- FONT AWESOME CDN -->
			<script src="https://use.fontawesome.com/7bd167f128.js"></script>
			<!-- BackToTop script -->
			<script src='/smartunibo/src/home/back_to_top.js'></script>

	    <!-- bootstrap CSS override -->
	    <link rel="stylesheet" type="text/css" href="/smartunibo/src/home/homeStyle.php" media="screen"/>

			<style>
	      /* Impostazione esplicita dell'altezza della mappa per la definzione delle dimensioni
	       * dell'elemento div che la contiene. */
	      #map {
	        height: 60vmin;
	      }
	      /* Impostazione delle dimensioni della pagina. */
	      html, body {
	        height: 100%;
	        margin: 0;
	        padding: 0;
	      }
	    </style>
  	</head>

		<?php
			//Includo il file esterno relativo le funzioni di login per la gestione della sessione.
			require($_SERVER['DOCUMENT_ROOT'] . "/smartunibo/src/login/functions.php");

			//Includo il file esterno relativo le funzioni per l'ottenimento dei dati dello studente.
			require("../home/student_functions.php");

			//Avvio la sessione.
			sec_session_start();
		 ?>

  	<body>
  		<main>
  			<section id="content" class="container">
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
									<li><a href="/smartunibo/src/home/calendar/calendar.php" id="calendario" class="glyphicon glyphicon-calendar pull" role="button" aria-haspopup="true"></a></li>

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

				<!-- SERVICES LIST style="float: none; margin: 0 auto;" -->
				<div class="container-fluid jumbotron">
						<h2 class="display-2  text-center">Servizio Mensa</h2>
						<br />
						<div class="row">

							<div class="container-fluid col-md-5">
								<!-- SELEZIONE RAGGIO -->
					      <form>
					        Seleziona la modalità di localizzazione:<br>
					        <input type="radio" id="geolocation" name="position" value="geolocation" checked> Geolocalizzazione
					        <input type="radio" id="manual" name="position" value="manual"> Manuale<br>
					        <input type="text" id="address" name="address" placeholder="Es. Via Sacchi 3, Cesena" size="50" style="visibility:hidden;">
					        <input type="button" id="calculatePos" value="Calcola posizione" style="visibility:hidden;"><br><br>
					        Seleziona il range per la ricerca delle mense:<br>
					        <select id="rangeSelector" class="range">
					          <option value="0.2">200 m</option>
					          <option value="0.5">500 m</option>
					          <option value="1">1 Km</option>
					          <option value="2" selected="selected">2 Km</option>
					          <option value="3">3 Km</option>
					          <option value="4">4 Km</option>
					          <option value="5">5 Km</option>
					        </select>
					      </form>

								<!-- ELENCO MENSE -->

					      <div class="pre-scrollable container-fluid" id="foodservices"></div>
					      <script>
					        /*
					        * Questa funzione, quando richiamata, carica all'interno dell'elemento div (mediante AJAX) l'elenco
					        * delle mense situate in un certo raggio a partire dalla posizione scelta dall'utente.
					        */
					        function refreshFoodServicesInRange(lat, lng) {
					          $.ajax({
					            url: "data.php?range=" + $("#rangeSelector option:selected").val() + "&lat=" + lat + "&lng=" + lng,
					            cache: false,
					            success: function(data) {
					              $("#foodservices").html(data);
					            }
					          });
					        }
					      </script>
							</div>
							
							<!-- MAPPA -->
							<div class="container-fluid col-md-7" id="map"></div>
								<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbS22mHEoCvuhOAtmH2dGIJj1UmLGiJE0&callback=initMap"></script>
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

</html>
