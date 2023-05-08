jQuery(function($){
	
	"use strict";
	
        $(window).load(function() {
 
			/*main function*/
			function rwIsotope() {
                
				var $container = $('.rw-masonry-grid-container');
                
                // initialize isotope
				$container.isotope({
					itemSelector: 'article',
					layoutMode: 'masonry'
				});
				
                // bind filter on select change
				$('.filters-select').on( 'change', function() {

					// get filter value from option value
					var filterValue = this.value;

					// use filterFn if matches value
					$container.isotope({ filter: filterValue });

				});
				
				// filter items on button click
				$('.filter-button-group').on( 'click', 'button', function() {
				  var filterValue = $(this).attr('data-filter');
				  $container.isotope({ filter: filterValue });
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