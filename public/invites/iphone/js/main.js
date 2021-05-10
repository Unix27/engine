
(function($) {
	
	"use strict";

	new WOW().init();

	$.scrollUp({
		scrollText: '<i class="zmdi zmdi-chevron-up"></i>',
		easingType: 'linear',
		scrollSpeed: 900,
		animation: 'fade'
	}); 

	$('[data-toggle="tooltip"]').tooltip({
		animated: 'fade',
		placement: 'right',
		html: true
	});

})(jQuery);


setInterval('countdown()', 1000);
function countdown() {
	var mins = parseInt(document.getElementById("mins").innerHTML);
	var secs = parseInt(document.getElementById("hsecs").innerHTML);
	if (mins != 0 && secs == 0) {
		nmins = mins - 1;
		nsecs = 59;
	} else if (mins != 0 || secs != 0) {
		nmins = mins;
		nsecs = secs - 1;
	} else if (mins == 0 && secs == 0) {
		nmins = mins;
		nsecs = secs;
	}
	document.getElementById("mins").innerHTML = nmins;
	document.getElementById("hsecs").innerHTML = nsecs;
	if (nsecs < 10) nsecs = "0" + nsecs;
}

