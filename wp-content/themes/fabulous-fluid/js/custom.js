/**
 * custom.js
 *
 * Custom Scripts
 */
(function($) {
	$('#social-search-anchor').click(function(event){
		$('#social-search-inline').toggle();
		event.stopPropagation();
	});

	$('#social-search-inline .wrapper').click(function(event){
		event.stopPropagation();
	});

	$('html').click(function() {
		if( $('#social-search-inline').is(":visible") ) {
			$('#social-search-inline').toggle();
		}
	});

	$(document).ready(function() {
	    size_row = $( "#featured-grid-content div.wrapper > div.row" ).size();

	    $('#loadMore').click(function () {
	    	rel = parseInt( $(this).attr('rel') );

	    	//Show featured content grid row
	    	$( "#featured-grid-content div.wrapper div.row" ).eq(rel).slideDown('slow');

	    	rel++;

	    	//Update rel value
	    	$(this).attr('rel', rel);

	        //Hide Load more if all content is shown
	        if ( rel > size_row-1 ) {
	        	$('#loadMore').slideUp('slow');
	        }

	        return false;
	    });
	});


	$('#responsive-menu-button').sidr({
		name: 'sidr-main',
		source: '#site-navigation',
		side: 'right'
	});

    //Enable jcf
    if( typeof(jcf) != "undefined" && jcf !== null ) {
		jcf.replaceAll();
	}
})( jQuery );
