//Quando la pagina ha completato il caricamento...
$(document).ready(function() {

	//Mostro o nascondo il bottone nel footer.
	$(window).scroll(function() {
		if($(this).scrollTop() > 200) {
			$('.go-top').fadeIn(200);
		} else {
			$('.go-top').fadeOut(200);
		}
	});

	//Gestisco l'animazione di scrolling, impedendo il refresh della pagina.
	$('.go-top').click(function(event) {
		event.preventDefault();
		$('html, body').animate({scrollTop: 0}, 300);
	});
});
