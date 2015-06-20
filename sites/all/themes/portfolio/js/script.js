/**
 * @file
 * A JavaScript file for the theme.
 *
 * In order for this JavaScript to be loaded on pages, see the instructions in
 * the README.txt next to this file.
 */

// JavaScript should be made compatible with libraries other than jQuery by
// wrapping it with an "anonymous closure". See:
// - https://drupal.org/node/1446420http://getbootstrap.com/javascript/#modals-usage
// - http://www.adequatelygood.com/2010/3/JavaScript-Module-Pattern-In-Depth
(function( $ ) {
$(function() {
$(document).ready(function(){
	$(window).load(function(){

	var $sideBar = $('#work-sidebar')

	$sideBar.affix({
		offset: {
			top: function () {
				var offsetTop      = $sideBar.offset().top;
				var sideBarMargin  = parseInt($sideBar.children(0).css('margin-top'), 10);
				return (this.top = offsetTop - 20);
			}
			, bottom: function () {
				return (this.bottom = $('#footer').outerHeight(true) + 30);
			}
		}
	});
	});

	$('.project-container').each(function(){
		$(this).find('.views-field-field-project-list-screenshot').hover(
			function() {
				$(this).closest('.project-container').find('.views-field-title a').addClass( "hover" );
			}, function() {
				$(this).closest('.project-container').find('.views-field-title a').removeClass( "hover" );
			}
		);
	});
	$('.node-pager a').append('<span class="glyphicon glyphicon-chevron-right"></span>');
	if( $('body').hasClass('node-type-project') ) {
		$(document).keydown(function(e) {
		    switch(e.which) {
		        case 37: // left
		        window.location.href = $('#node-pager li.first a').attr('href');
		        break;

		        case 39: // right
		        window.location.href = $('#node-pager li.last a').attr('href');
		        break;

		        default: return; 
		    }
		    e.preventDefault();
		});
	}
	

});
});
})(jQuery);
