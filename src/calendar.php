<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'/>
<link href='../lib/fullcalendar-3.1.0/fullcalendar.min.css' rel='stylesheet' />
<link href='../lib/fullcalendar-3.1.0/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='../lib/fullcalendar-3.1.0/lib/moment.min.js'></script>
<script src='../lib/fullcalendar-3.1.0/lib/jquery.min.js'></script>
<script src='../lib/fullcalendar-3.1.0/fullcalendar.min.js'></script>
<script src='../lib/fullcalendar-3.1.0/locale/it.js'></script>
<script>

	$(document).ready(function() {

		// Vars
		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();

		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: '',
				right: 'title'
			},

			events: "http://localhost/smartunibo/src/events.php",
			//events: 'http://localhost/smartunibo/src/json-events-feed.php',

			// customize the button names,
			// otherwise they'd all just say "list"
			/*views: {
				listDay: { buttonText: 'list day' },
				listWeek: { buttonText: 'list week' }
			},*/

			defaultView: 'listWeek',
			//defaultDate: '2016-12-12', // this line should be deleted to use current day
			navLinks: true, // can click day/week names to navigate views
			editable: false,
			eventLimit: true, // allow "more" link when too many events

	    	/*eventSources: [
		        {
		            url: 'http://localhost/smartunibo/src/json-events-feed.php',
		            //url: 'url/json-events-feed.php',
		            type: 'POST', // Send post data
		            //dataType: 'jsonp',
		            /*data: {
		                custom_param1: 'description'
		            },
		            error: function() {
		                alert('there was an error while fetching events!');
		            },
		            color: 'yellow',   // a non-ajax option
		            textColor: 'black' // a non-ajax option
		        }
	    	]*/

	    	/*events: {
				url: 'http://localhost/smartunibo/src/json-events-feed.php',

				error: function() {
					$('#script-warning').show();
					alert('there was an error while fetching events!');
				}
			},
			loading: function(bool) {
				$('#loading').toggle(bool);
			}*/
		});
	});

</script>
<style>

	body {
		margin: 40px 10px;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}

	#calendar {
		max-width: 900px;
		margin: 0 auto;
	}

</style>
</head>
<body>

	<div id='calendar'></div>

</body>
</html>
