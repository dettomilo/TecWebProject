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

			<script src="openNewsBox.js"></script>

	    <!-- bootstrap CSS override -->
	    <link rel="stylesheet" type="text/css" href="homeStyle.php" media="screen"/>
  	</head>
		<?php
			$noImageSource = "/smartunibo/src/home/news/noImage.png";
		 ?>
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

			<!-- NAV BAR -->
			<nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Apri o Chiudi navigazione</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Smart Unibo</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
            <ul class="nav navbar-nav">

							<li class="active"><a href="#">News</a></li>
              <li><a href="#">Servizi</a></li>
              <li><a href="#">Carriera</a></li>
<!--
							<li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="./">Default <span class="sr-only">(current)</span></a></li>
              <li><a href="../navbar-static-top/">Static top</a></li>
              <li><a href="../navbar-fixed-top/">Fixed top</a></li>
            </ul>
					-->
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
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
							$currentNewsId = 0;
			        foreach ($ateneoNews as $n) {

								echo '<div class="col-md-3">
										    <div class="thumbnail">';

								if (!is_null($n["Immagine"])) {
			            echo "<img src=".$n["Immagine"]." height=\"150\" width=\"200\"><br>";
			          }

								echo '<div class="caption">
										  <h4>'.$n["Titolo"].'</h4>';

								echo '<p><em>' .$n["Data"] .'</em></p>';

								if (!is_null($n["Sommario"])) {
			            echo "<p>" .$n["Sommario"] ."</p>";
			          }

							  echo '<p><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#'.$currentNewsId.'">Leggi</button></p>
										  </div>
										  </div>
											</div>';

								echo '<div class="modal fade" id="'.$currentNewsId.'" role="dialog">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h3 class="modal-title">'.$n["Titolo"].'</h3>
														</div>
														<div class="modal-body">
															<p><em>' .$n["Data"] .'</em></p>
															<p>'.$n["Testo"].'</p>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
														</div>
													</div>
												</div>
											</div>';

								$currentNewsId++;
							}

			      ?>

			      </div>
					</div>
				</div>
				<!-- end of NEWS ATENEO -->

				<!-- start of NEWS -->
				<?php
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
								                                <h3 class="pull-left">'.$n["Titolo"].'</h3>
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
								                	';
																	if (!is_null($n["Sommario"])) {
																		echo $n["Sommario"];
																	} else {
																		echo '<small><em>Nessun sommario</em></small>';
																	}
															echo '
																	<br/>
																	<button type="button" class="btn btn-info btn-sm pull-left" data-toggle="modal" data-target="#'.$currentNewsId.'">Leggi</button>
								            </div>

								            <div class="panel-footer">
								                <span class="label label-default">'.$n["Tipo"].'</span> <span class="label label-default">'.$n["Data"].'</span>
								            </div>
								        </div>


								    </div>
								</div>
									<div class="col-md-1"></div>
									</div>
								</div>
							';

					echo '<div class="modal fade" id="'.$currentNewsId.'" role="dialog">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h3 class="modal-title">'.$n["Titolo"].'</h3>
											</div>
											<div class="modal-body">
												<p><em>' .$n["Data"] .'</em></p>
												<p>'.$n["Testo"].'</p>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
											</div>
										</div>
									</div>
								</div>';

								$currentNewsId++;
	        }
				?>

				<!-- spacing line to footer -->
				<hr>

				<footer>
	        <p>© Smart Unibo - 2017</p>
	      </footer>

  			</section>
  		</main>
  	</body>

</html>
