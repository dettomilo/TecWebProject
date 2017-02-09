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

			defaultView: 'listWeek',
			//defaultDate: '2016-12-12', // this line should be deleted to use current day
			navLinks: true, // can click day/week names to navigate views
			editable: false,
			eventLimit: true, // allow "more" link when too many events
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
