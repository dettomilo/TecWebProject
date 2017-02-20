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

		<!-- Basic styles for black background and crosshair cursor -->
    <style class="cp-pen-styles">
			canvas {
				cursor: crosshair;
				display: block;
			}
		</style>

		<!-- bootstrap CSS override -->
		<link rel="stylesheet" type="text/css" href="/smartunibo/src/home/homeStyle.php" media="screen"/>

		<!-- Credits CSS -->
		<link rel="stylesheet" type="text/css" href="credits.css" media="screen"/>
	</head>

	<?php
		//Includo il file esterno relativo la connessione al database.
		require($_SERVER['DOCUMENT_ROOT'] . "/smartunibo/src/database/db_connect.php");
		//Includo il file esterno relativo le funzioni di login per la gestione della sessione.
		require($_SERVER['DOCUMENT_ROOT'] . "/smartunibo/src/login/functions.php");

		//Includo il file esterno relativo le funzioni per l'ottenimento delle notifiche.
		require("../notifications/notifications_functions.php");
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
						<a href="/smartunibo/src/home/home.php" title="Vai alla homepage del Portale">
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
								<li><a href="/smartunibo/src/home/calendar/calendar.php" id="calendario" title="Calendario" class="glyphicon glyphicon-calendar pull" role="button" aria-haspopup="true"></a></li>

								<li><a href="#" id="notifiche" title="Notifiche" class="glyphicon glyphicon-bell" aria-haspopup="true" data-toggle="notifichePopover" data-trigger="focus"></a></li>

								<li><a href="#" id="user" title="Profilo" class="glyphicon glyphicon-user" aria-haspopup="true" data-toggle="userMenuPopover" data-trigger="focus"></a></li>
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
				<ul>
					<?php
						$not = getNotifications($mysqli);
						$currentNewsId = 0;
						for ($i = 1; $i <= 4; $i++) {
							if(array_key_exists($i, $not)) {
										$n = $not[$i];
								echo '
									<li class="notifica" style="cursor:pointer">
										<i class="glyphicon '.$n["Icona"].'"></i><a href"#> '.$n["Titolo"].'</a><div class="clearfix"></div>
									</li>
								';
							}
						}
					?>
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

			<div class="jumbotron" style="background-color: #111">
				<div class="row">
						<canvas id="canvas" class="col-md-12" style="height: 35vmin"></canvas>
						<script src="fireworks.js"></script>
				</div>

				<audio id="musicBack" controls autoplay hidden loop>
				  <source src="unreal_superhero_3.mp3" type="audio/mpeg">
				</audio>
				<script>
					document.getElementById("musicBack").volume = 0.5;
				</script>

				<div class="row">
				<div class='console-container col-md-12'><span id='text'></span><div class='console-underscore' id='console'>&#95;</div></div>
				<script>
				consoleText(['Smart Unibo', 'Made with love by', 'Alberto Serluca', 'Giacomo Frisoni', 'Emilio Dettori', "So cool isn't it?"], 'text',['#95f442','#ff5900','#4080ff','#d12323']);

				function consoleText(words, id, colors) {
					if (colors === undefined) colors = ['#fff'];
					var visible = true;
					var con = document.getElementById('console');
					var letterCount = 1;
					var x = 1;
					var waiting = false;
					var target = document.getElementById(id)
					target.setAttribute('style', 'color:' + colors[0])
					window.setInterval(function() {

						if (letterCount === 0 && waiting === false) {
							waiting = true;
							target.innerHTML = words[0].substring(0, letterCount)
							window.setTimeout(function() {
								var usedColor = colors.shift();
								colors.push(usedColor);
								var usedWord = words.shift();
								words.push(usedWord);
								x = 1;
								target.setAttribute('style', 'color:' + colors[0])
								letterCount += x;
								waiting = false;
							}, 1000)
						} else if (letterCount === words[0].length + 1 && waiting === false) {
							waiting = true;
							window.setTimeout(function() {
								x = -1;
								letterCount += x;
								waiting = false;
							}, 1000)
						} else if (waiting === false) {
							target.innerHTML = words[0].substring(0, letterCount)
							letterCount += x;
						}
					}, 90)
					window.setInterval(function() {
						if (visible === true) {
							con.className = 'console-underscore hidden'
							visible = false;

						} else {
							con.className = 'console-underscore'
							visible = true;
						}
					}, 400)
				}
				</script>
			</div>
			</div>

			<!-- spacing line to footer -->
			<hr />

			<footer>
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-6">
						<p class="pull-left">
							Smart Unibo - 2017 |
							This website uses: <a href="http://glyphicons.com/">Glyphicon</a> and <a href="http://fontawesome.io/icons/">Fontawesome</a> icons.
						</p>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6">
						<p class="pull-right">
							So cool, isn't it?
						</p>
				</div>
				<a href="#" class="go-top"><i class="glyphicon glyphicon-chevron-up" style="color:#bb2e29"></i></a>
			</footer>

			</section>
		</main>
	</body>

	<?php
		} else {
			header("Location: /smartunibo/src/login/login.php");
			die();
		}
	?>
</html>
