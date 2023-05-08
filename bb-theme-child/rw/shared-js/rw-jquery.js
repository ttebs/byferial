jQuery(function( $ ){
	
	"use strict";
    /*
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

    $('.scrolltotop').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });
	*/
    
	// Don't Stick the Menu Until the User scrolls down the height of the header
	// Makes the Transition Smooth

    var offset = 160;
	var $header = $('.fl-page-header');

	// Override the addClass to prevent fixed header class from being added before offset reached
	var addclass = $.fn.addClass;
	$.fn.addClass = function () {
		var result = addclass.apply(this, arguments);
		if ($(window).scrollTop() < offset) {
			$header.removeClass('rw-fixed-header');
		}
		return result;
	};

	// Remove fixed header class initially
	$header.removeClass('rw-fixed-header');

	// Create waypoint which adds / removes fixed header class when offset reached
	$('body').waypoint({
		handler: function (d) {
			$header.toggleClass('rw-fixed-header', (d === 'down'));
		},
		offset: -offset
	});
    
    /* Add Placeholder text to Really Simple Captcha Input Field */
	//$(".gfield_captcha_input_container input").attr("placeholder", "Enter Code");

});