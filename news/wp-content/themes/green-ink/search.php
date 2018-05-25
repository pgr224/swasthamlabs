<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Green Ink
 * @since 1.0.0
 */

get_header();

do_action('green_ink_before_content');

if ( have_posts() ) : ?>
	<?php
	/* Run the loop for the search to output the results.
	 * If you want to overload this in a child theme then include a file
	 * called loop-search.php and that will be used instead.
	 */
	 green_ink_get_content( 'search' );
	?>
<?php else : ?>
	<div id="post-0" class="post no-results not-found">
		<h2><?php esc_html_e( 'Nothing Found', 'green-ink' ); ?></h2>

		<p><?php esc_html_e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'green-ink' ); ?></p>
			<?php get_search_form(); ?>

	</div><!-- #post-0 -->
<?php endif;
do_action('green_ink_after_content');
get_sidebar();
get_footer();
?>