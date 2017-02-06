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

			<style>
				#calendar {
					max-width: 900px;
					margin: 0 auto;
				}
			</style>

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
									<div class="col-md-12">
										<img class="img-responsive center-block" src="SmartUniboBanner.png" alt="Logo Smart Unibo">
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
							<li class="active"><a href="#">News</a></li>
              <li><a href="#">Servizi</a></li>
              <li><a href="#">Carriera</a></li>
						</ul>

            <ul class="nav navbar-nav navbar-right">
							<li><a href="#" class="glyphicon glyphicon-calendar" role="button" aria-haspopup="true" aria-expanded="false" data-toggle="modal" data-target="#calendarBox"></a></li>
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
			<!-- CALENDAR BOX -->
				<div class="modal fade" id="calendarBox" role="dialog">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h3 class="modal-title">Calendario</h3>
							</div>
							<div class="modal-body">

								<script>

									$(document).ready(function() {

										$('#calendar').fullCalendar({
											header: {
												left: 'prev,next today',
												center: '',
												right: 'title'
											},

											// customize the button names,
											// otherwise they'd all just say "list"
											/*views: {
												listDay: { buttonText: 'list day' },
												listWeek: { buttonText: 'list week' }
											},*/

											defaultView: 'listWeek',
											defaultDate: '2016-12-12',
											navLinks: true, // can click day/week names to navigate views
											editable: false,
											eventLimit: true, // allow "more" link when too many events
											events: [
												{
													title: 'All Day Event',
													start: '2016-12-01'
												},
												{
													title: 'Long Event',
													start: '2016-12-07',
													end: '2016-12-10'
												},
												{
													id: 999,
													title: 'Repeating Event',
													start: '2016-12-09T16:00:00'
												},
												{
													id: 999,
													title: 'Repeating Event',
													start: '2016-12-16T16:00:00'
												},
												{
													title: 'Conference',
													start: '2016-12-11',
													end: '2016-12-13'
												},
												{
													title: 'Meeting',
													start: '2016-12-12T10:30:00',
													end: '2016-12-12T12:30:00'
												},
												{
													title: 'Lunch',
													start: '2016-12-12T12:00:00'
												},
												{
													title: 'Meeting',
													start: '2016-12-12T14:30:00'
												},
												{
													title: 'Happy Hour',
													start: '2016-12-12T17:30:00'
												},
												{
													title: 'Dinner',
													start: '2016-12-12T20:00:00'
												},
												{
													title: 'Birthday Party',
													start: '2016-12-13T07:00:00'
												},
												{
													title: 'Click for Google',
													url: 'http://google.com/',
													start: '2016-12-28'
												}
											]
										});

									});
								</script>

								<div id='calendar'></div>
							</div>
							<div class="modal-footer">
								<a class="glyphicon glyphicon-chevron-up" role="button" data-dismiss="modal"></a>
							</div>
						</div>
					</div>
				</div>

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

								echo '<div class="col-md-3 col-sm-6 col-xs-12" role="button" data-toggle="modal" data-target="#'.$currentNewsId.'">
										    <div class="thumbnail">';

								if (!is_null($n["Immagine"])) {
			            echo '<img src="'.$n["Immagine"].'" height=\"150\" width=\"200\">';
			          } else {
									echo '<img src="'.$noImageSource.'" height=\"150\" width=\"200\">';
								}

								echo '<div class="caption">
										  <h4>'.$n["Titolo"].'</h4>';

								echo '<p><em>' .$n["Data"] .'</em></p>';

								if (!is_null($n["Sommario"])) {
			            echo "<p>" .$n["Sommario"] ."</p>";
			          }

							  echo '<p><em class="readMore">Leggi tutto »</em></p>
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
								                	';
																	if (!is_null($n["Sommario"])) {
																		echo $n["Sommario"];
																	} else {
																		echo '';
																	}
															echo '
																	<br/>
																	<button type="button" class="btn btn-info btn-md pull-left" data-toggle="modal" data-target="#'.$currentNewsId.'">Leggi</button>
								            </div>

								            <div class="panel-footer">
								                <span class="label label-default">'.$n["Tipo"].'</span>
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
