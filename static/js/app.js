(function() {

	$(window).on('scroll', function() {
		if ($(document).scrollTop() > 500) {
			$("#topBar").addClass("fixed");
		} else {
			$("#topBar").removeClass("fixed");
		}
	});


})($);

$(document).ready(function() {

	$("#route-photos").owlCarousel({
		 slideSpeed : 1000,
		 paginationSpeed : 1000,
		 singleItem:true,
		 autoPlay: 5000,
		 transitionStyle : "fade"
		});

	  $.datepicker.setDefaults(
	    $.extend($.datepicker.regional[''])
	  );
	  $('#datepicker').datepicker();

	$('[data-js-lang]').change(function() {
		document.location.href= '../' + $(this).val();
	});


});

