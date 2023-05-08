jQuery(function($){
	
	"use strict";
	
	$(window).load(function() {
 
		function rwIsotope() {

			var $container = $('.grid-container'),
				filters = {};

			// init Isotope
			$container.isotope({
				itemSelector: 'article',
				layoutMode: 'fitRows'
			});

			// filter buttons
			$('select').change(function(){

				var $this = $(this);

				// store filter value in object
				// i.e. filters.color = 'red'
				var group = $this.attr('data-filter-group');

				filters[ group ] = $this.find(':selected').attr('data-filter-value');
				//console.log( $this.find(':selected') );

				// convert object into array
				var isoFilters = [];
				for ( var prop in filters ) {
					isoFilters.push( filters[ prop ] );
				}
				console.log(filters);
				var selector = isoFilters.join('');
				$container.isotope({ filter: selector });
				return false;

			});


		} rwIsotope();


		/*resize*/
		var isIE8 = $.browser.msie && +$.browser.version === 8;
		if (isIE8) {
			document.body.onresize = function () {
				rwIsotope();
			};
		} else {
			$(window).resize(function () {
				rwIsotope();
			});
		}

		// Orientation change
		window.addEventListener("orientationchange", function() {
			rwIsotope();
		});
		
	});
		
});




