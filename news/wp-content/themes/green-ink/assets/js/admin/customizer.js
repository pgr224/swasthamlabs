/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '#site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-desc' ).text( to );
		} );
	} );
	//Update header position in real time...
	wp.customize( 'green_ink_options[header_pos]', function( value ) {
		value.bind( function( newval ) {
			$('#header').removeClass('header-over standard').addClass( newval );
			var $header = $('#header');
			if( $header.hasClass('header-over') ) {
				var $height = $header.find('.inner').outerHeight();
				$header.find('.inner').css('margin-bottom', '-'+$height+'px');
			} else {
				$header.find('.inner').css('margin-bottom', '');
			}
		} );
	} );

} )( jQuery );
