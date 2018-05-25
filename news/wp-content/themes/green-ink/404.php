<?php
/**
 * Green Ink WordPress Theme - 404 page
 *
 * @package green ink WordPress Theme
 * @subpackage Green Ink
 * @author Pressfore - www.pressfore.com
 */

get_header();
do_action('green_ink_before_content');
?>
	<h1><?php green_ink_404_title(); ?></h1>
	<p><?php esc_html_e( 'Apologies, but the page you requested could not be found. Perhaps searching will help.', 'green-ink' ); ?></p>
	<?php get_search_form(); ?>

<?php
do_action('green_ink_after_content');
get_sidebar();
get_footer();
?>