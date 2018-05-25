<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package green ink WordPress Theme
 * @subpackage Green Ink
 * @author Pressfore - www.pressfore.com
 */

get_header();
do_action('green_ink_before_content');

?>
	
<?php
	$category_description = category_description();
	if ( ! empty( $category_description ) ) {
		echo esc_html($category_description);
	}
	/* Run the loop for the category page to output the posts.
	 * If you want to overload this in a child theme then include a file
	 * called loop-category.php and that will be used instead.
	 */
	green_ink_get_content( 'category' );
	do_action('green_ink_after_content');
	get_sidebar();
	get_footer();
?>
