$(function() {
	$( ".range" ).change(function() {
		updateRange($(this).val());
		refreshFoodServicesInRange();
	});
});
