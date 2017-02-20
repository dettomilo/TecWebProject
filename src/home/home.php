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

			<!-- BackToTop script -->
			<script src='/smartunibo/src/home/back_to_top.js'></script>

	    <!-- bootstrap CSS override -->
	    <link rel="stylesheet" type="text/css" href="/smartunibo/src/home/homeStyle.php" media="screen"/>
  	</head>

		<?php
			$noImageSource = "/smartunibo/src/home/news/images/noImage.png";

			//Includo il file esterno relativo la connessione al database.
			require($_SERVER['DOCUMENT_ROOT'] . "/smartunibo/src/database/db_connect.php");

			//Includo il file esterno relativo le funzioni di login per la gestione della sessione.
			require($_SERVER['DOCUMENT_ROOT'] . "/smartunibo/src/login/functions.php");

			//Includo il file esterno relativo le funzioni per l'ottenimento delle notizie.
			require("news/news_functions.php");

			//Includo il file esterno relativo le funzioni per l'ottenimento dei dati dello studente.
			require("student_functions.php");

			//Includo il file esterno relativo le funzioni per l'ottenimento delle notifiche.
			require("notifications/notifications_functions.php");

			//Avvio la sessione.
			sec_session_start();

			//Verifico che il login sia stato eseguito.
			if (login_check($mysqli)) {
		 ?>

  	<body>
  		<main>
  			<section id="content" class="container">
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
									<li><a href="/smartunibo/src/home/calendar/calendar.php" id="calendario" title="Calendario" class="glyphicon glyphicon-calendar" role="button" aria-haspopup="true"></a></li>

									<li><a href="#" id="notifiche" title="Notifiche" class="glyphicon glyphicon-bell" aria-haspopup="true" data-toggle="notifichePopover" data-trigger="hover touch focus"></a></li>

									<li><a href="#" id="user" title="Profilo" class="glyphicon glyphicon-user" aria-haspopup="true" data-toggle="userMenuPopover" data-trigger="hover touch focus"></a></li>
				        </ul>
				      </div>

						</div>

						<div class="collapse navbar-collapse navbar-left">
			        <ul class="nav navbar-nav">
								<li class="active"><a href="/smartunibo/src/home/home.php" id="news">News</a></li>
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

				<div class="jumbotron">
					<div class="container">
						<!-- NEWS ATENEO -->
						<h1 class="display-1">News Ateneo</h1>
						<div class="row">
						<?php

			        //Stampo le 4 notizie di Ateneo più recenti.
			        $ateneoNews = getNews(0, 4, $mysqli);
							$currentNewsId = 0;
			        foreach ($ateneoNews as $n) {

								echo '<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12" role="button" data-toggle="modal" data-target="#'.$currentNewsId.'">
												<div class="newsAteneoBox">
										    <div class="thumbnail">
												';

								if (!is_null($n["Immagine"])) {
			            echo '<img src="'.$n["Immagine"].'" height=\"150\" width=\"200\">';
			          } else {
									echo '<img src="'.$noImageSource.'" height=\"150\" width=\"200\">';
								}

								echo '<div class="caption">
										  <h4>'.$n["Titolo"].'</h4>';

								echo '<p><em>' .$n["Data"] .'</em></p>';

								if (!is_null($n["Sommario"])) {
			            echo "<p>" .$n["Sommario"]."</p>";
			          }

							  echo '				<em class="readMore">Leggi tutto »</em>
										  			</div>
										  		</div>
												</div>
											</div>';

								echo nl2br('<div class="modal fade" id="'.$currentNewsId.'" role="dialog">
												<div class="modal-dialog modal-lg">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h3 class="modal-title">'.$n["Titolo"].'</h3>
														</div>
														<div class="modal-body">
															<em>' .$n["Data"] .'</em>
															<br />
															<p class="pre-scrollable">'.$n["Testo"].'</p>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
														</div>
													</div>
												</div>
											</div>');

								$currentNewsId++;
							}

			      ?>

			      </div>
					</div>
				</div>
				<!-- end of NEWS ATENEO -->


				<?php
				//---------------------------- start of NEWS ----------------------------

					//Stampo il nome del corso frequentato dallo studente.
					$nomeCorso = getCorso($_SESSION['matricola'], $mysqli);
					echo '
							<h2 class="text-center">News Corso</h2>
							<h3 class="text-center nomeCorsoNews">'.$nomeCorso.'</h3>';

					$corsoNews = getNews(1, 10, $mysqli);

	        foreach ($corsoNews as $n) {
					echo '
								<div class="container">
								<div class="row">
							    <div class="col-md-1"></div>
									<div class="col-md-10">
										<div id="postlist">
											<div class="panel">
								                <div class="panel-heading">
								                    <div class="text-center">
								                        <div class="row">
								                            <div class="col-sm-9">
								                                <h3 class="pull-left" role="button" data-toggle="modal" data-target="#'.$currentNewsId.'">'.$n["Titolo"].'</h3>
								                            </div>
								                            <div class="col-sm-3">
								                                <h4 class="pull-right">
								                                <small><em>'.$n["Data"].'</em></small>
								                                </h4>
								                            </div>
								                        </div>
								                    </div>
								                </div>

							            <div class="panel-body">
														<div class="row">
															<div class="col-md-11 col-sm-11 col-xs-10">
															';
															if (!is_null($n["Sommario"])) {
																echo $n["Sommario"];
															} else {
																echo '';
															}
														echo '
															</div>
																	<button type="button" class="col-md-1 col-sm-1 col-xs-2 btn btn-info btn-md pull-left" data-toggle="modal" data-target="#'.$currentNewsId.'">Leggi</button>
														</div>
							            </div>

								            <div class="panel-footer">
								                <span class="label label-default">'.$n["Tipo"].'</span>
								            </div>
								        </div>


								    </div>
								</div>
									<div class="col-md-1 col-xs-1"></div>
									</div>
								</div>
							';

					echo nl2br('<div class="modal fade" id="'.$currentNewsId.'" role="dialog">
									<div class="modal-dialog modal-md">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h3 class="modal-title">'.$n["Titolo"].'</h3>
											</div>
											<div class="modal-body">
												<p><em>' .$n["Data"] .'</em></p>
												<p class="pre-scrollable">'.$n["Testo"].'</p>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
											</div>
										</div>
									</div>
								</div>');

								$currentNewsId++;
	        }
				?>

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
								<a href="/smartunibo/src/home/about/about.php">> About</a>
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
