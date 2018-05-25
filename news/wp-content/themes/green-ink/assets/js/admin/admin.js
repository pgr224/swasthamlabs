/**
 * Admin side javascript
 *
 */

jQuery(document).ready(function( $ ) {

	$('#page_template').on('change', dynamic_template);
	dynamic_template();

	// Site title and description.
	$('.toggle').on('click', function(){
    	if( $(this).is(':checked') && ! $(this).closest('label').hasClass('active') ){
    		$(this).closest('label').addClass('active').siblings().removeClass('active');
    	}
    });

     $('.toggle:checked').closest('label').addClass('active'); 

     function dynamic_template(e) {
     	if( e && e.type != undefined ) {
	     	var $this = $(this);
	     } else {
	     	var $this = $('#page_template');
	     }

	     if( $this.val() == 'templates/dynamic.php' )
	     	$('#green_ink_pmeta').addClass('active');
	     else
	     	$('#green_ink_pmeta').removeClass('active');
     }

} );
