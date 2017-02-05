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

	    <!-- bootstrap CSS override -->
	    <link rel="stylesheet" type="text/css" href="homeStyle.php" media="screen"/>
  	</head>

  	<body>
  		<main>
  			<section id=content class="container-fluid">
	  			<header class="header">
	  				<div>
	  					<a href="#">
								<div class="row">
									<div class="col-md-6">
										<img class="img-responsive pull-right" src="alma-mater-studiorum.png" alt="Alma Mater Studiorum A.D. 1088">
									</div>
									<div class="col-md-6">
	          				<img class="img-responsive" src="universita-di-bologna.png" alt="Università di Bologna">
									</div>
								</div>
      				</a>
	  				</div>
	  			</header>

					<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
					<div class="container">
						<div class="row">
								<div class="col-md-12">
										<ul class="nav navbar-nav">
												<li role="presentation" class="active"><a href="#">Home</a></li>
												<li role="presentation"><a href="#">News</a></li>
												<li role="presentation"><a href="#">Servizi</a></li>
												<li role="presentation"><a href="#">Carriera</a></li>
										</ul>
									</div>
						</div>
					</div>
			    </nav>

				<div class="jumbotron">
					<div class="container">
						<!-- NEWS ATENEO -->
						<h1 class="display-1">News Ateneo</h1>
						<div class="row">
						<?php
			        //Includo il file esterno relativo la connessione al database.
			        require($_SERVER['DOCUMENT_ROOT'] . "/smartunibo/src/database/db_connect.php");

			        //Includo il file esterno relativo le funzioni per l'ottenimento delle notizie.
			        require("news/news_functions.php");

			        //Stampo le 4 notizie di Ateneo più recenti.
			        $ateneoNews = getNews(0, 4, $mysqli);
			        foreach ($ateneoNews as $n) {

								echo '<div class="col-sm-3">
										    <div class="thumbnail">';

								if (!is_null($n["Immagine"])) {
			            echo "<img src=".$n["Immagine"]." height=\"150\" width=\"200\"><br>";
			          }

								echo '<div class="caption">
										  <h4>'.$n["Titolo"].'</h4>';

								if (!is_null($n["Sommario"])) {
			            echo "<p>" .$n["Sommario"] ."</p>";
			          }

							  echo '<p><a href="#" class="btn btn-primary" role="button">Leggi articolo</a></p>
										  </div>
										  </div>
											</div>';
								}

			      ?>

			      </div>
					</div>
				</div>

				<hr>

				<footer>
	        <p>© Smart Unibo - 2017</p>
	      </footer>

  			</section>
  		</main>
  	</body>

</html>
