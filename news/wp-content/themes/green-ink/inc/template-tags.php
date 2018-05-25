<?php
/**
 * Custom template tags for this theme.
 *
 *
 * @package green-ink
 */

/**
* Get template part from the loop folder
*
* @since 1.0.0
*/
function green_ink_get_version()
{
	$theme = wp_get_theme();
	
	if(is_child_theme()) 
	{
		$parent  = $theme->parent();
		$version = $parent['Version'];
	} 
	else 
	{
		$version = $theme['Version'];
	}

	return $version;
}


/**
* Get template part from the loop folder
*
* @since 1.0.0
*/
if( !function_exists('green_ink_get_content') )
{
	function green_ink_get_content($content)
	{ 
		$pre = 'loop/content'; 

		if( 'single' === $content && '' != get_post_format() )
		{
			$content = get_post_format();
		}

		get_template_part( $pre, $content ); 
	}
}

/**
* Get template part from the loop folder
*
* @since 1.0.0
*/
if( !function_exists('green_ink_get_part') )
{
	function green_ink_get_part($template)
	{ 
		$pre = 'parts/'; 
		$template = $pre.$template; 

		get_template_part( $template ); 
	}
}

/**
* Get sidebar template from the templates folder
*
* @since 1.0.0
*/
if( !function_exists('green_ink_get_sidebar') )
{
	function green_ink_get_sidebar($content)
	{ 
		$pre = 'templates/sidebar'; 

		get_template_part( $pre, $content ); 
	}
}

/**
* Retrive the nav menu
* If locations does not exists
* use the pages menu as callback
*
* @since 1.0.0
*/
if( !function_exists('green_ink_get_menu') )
{
	function green_ink_get_menu($args)
	{
		if ( isset( $args['theme_location'] ) && has_nav_menu( $args['theme_location'] ) ) {
			wp_nav_menu( $args );
		} else {
			wp_page_menu( $args );
		}
	}
}


/**
 * 
 * Prints HTML with meta information 
 * for the current post-date/time and author.
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'green_ink_posted_on' ) ) {
	
	function green_ink_posted_on() 
	{
		printf( '<span class="%1$s"><i class="fa fa-history"></i> %2$s</span> %3$s <span class="meta-sep"></span><i class="fa fa-user-circle"></i> %4$s %5$s',
			'meta-prep meta-prep-author',
			esc_html__( 'Posted on', 'green-ink' ),
			sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
				get_permalink(),
				esc_attr( get_the_time() ),
				get_the_date()
			),
			esc_html__( 'by', 'green-ink' ),
			sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
				get_author_posts_url( get_the_author_meta( 'ID' ) ),
				sprintf( '%s %s',
						esc_attr__( 'View all posts by', 'green-ink' ),
						get_the_author()
				),
				get_the_author()
			)
		);
	}
}


/**
 * 
 * Prints HTML with meta information for 
 * the current post (category, tags and permalink)
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'green_ink_posted_in' ) ) {
	function green_ink_posted_in() {
		// Retrieves tag list of current post, separated by commas.
		$tag_list = get_the_tag_list( '', ', ' );
		if ( $tag_list ) {
			$posted_in = sprintf( '%1$s <i class="fa fa-folder"></i> %2$s %3$s <i class="fa fa-tags"></i> %4$s. %5$s <i class="fa fa-link"></i> <a href="%6$s" title="%7$s %8$s" rel="bookmark">%9$s</a>.', 
				esc_html__( 'This entry was posted in', 'green-ink' ),
				get_the_category_list( ', ' ),
					esc_html__( 'and tagged', 'green-ink' ),
				$tag_list,
					esc_html__( 'Bookmark the', 'green-ink' ),
				get_permalink(),
					esc_html__( 'Permalink to', 'green-ink' ),
				the_title_attribute( 'echo=0' ),
					esc_html__( 'permalink', 'green-ink' )
			);
		} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
			$posted_in = sprintf( '%1$s %2$s. %3$s <a href="%4$s" title="%5$s %6$s" rel="bookmark">%7$s</a>.', 'green-ink',
					esc_html__('This entry was posted in', 'green-ink'),
				get_the_category_list( ', ' ),
					esc_html__('Bookmark the', 'green-ink'),
				get_permalink(),
					esc_html__('Permalink to', 'green-ink'),
				the_title_attribute( 'echo=0' ),
					esc_html__('permalink', 'green-ink')
			 );
		} else {
			$posted_in = sprintf( '%1$s <a href="%2$s" title="%3$s %4$s" rel="bookmark">%5$s</a>.',
					esc_html__('Bookmark the', 'green-ink'),
				get_permalink(),
					esc_html__('Permalink to', 'green-ink'),
				the_title_attribute( 'echo=0' ),
					esc_html__('permalink', 'green-ink')
			);
		}

		// Prints the string, replacing the placeholders.
		echo $posted_in;
	}
}


if( !function_exists('green_ink_get_thumbnail') ) {
	/**
	 * Get post thumbnail
	 *
	 * @since 1.0.0
	 */
	function green_ink_get_thumbnail($size  = 'post-thumbnail', $isForced = false)
	{ 
		if( is_page() || ( 'no' == green_ink_options('bg_thumb') || '' == green_ink_options('bg_thumb') ) )	{
			global $post;
			global $id;
			$size = !$isForced ? apply_filters( 'green_ink_thumbnail_size', $size ) : $size;
			$no_image = false;

			if( is_sticky($id) ) {
				$size = 'full';
			}

			$align = 'scale-with-grid';
			$image = has_post_thumbnail($id) ? get_the_post_thumbnail($id, $size, array('class' => $align)) : '';

			if( '' == $image && !is_single() && 'page' !== get_post_type() ) {
				$no_image = true;

				$image = sprintf( '<img src="%1$s" alt="thumbnail"/>', get_template_directory_uri().esc_attr('/assets/images/thumb.jpg') );
			}
			
			return apply_filters( 'green_ink_image_thumbnail_markup', $image, $id, $no_image );
		}
	}
}


if ( ! function_exists( 'green_ink_comments' ) ) {
	/**
	 *
	 * Comment Styles
	 *
	 * @since  1.0.0
	 */
	function green_ink_comments($comment, $args, $depth) 
	{
		$comment = $GLOBALS['comment']; ?>
		<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>" class="single-comment clearfix">
				<div class="comment-author vcard"> <?php echo get_avatar($comment,$size='64'); ?></div>
				<div class="comment-meta commentmetadata">
					<?php if ($comment->comment_approved == '0') : ?>
					<em><?php esc_html_e('Comment is awaiting moderation','green-ink');?></em> <br />
					<?php endif; ?>
					<h6><?php echo esc_html__('By','green-ink') . ' ' . get_comment_author_link( get_comment_ID() ) . ' ' . get_comment_date() . '  -  ' . get_comment_time(); ?></h6>
					<?php comment_text() ?>
					<?php edit_comment_link( esc_html__('Edit comment','green-ink'),'  ','' ); ?>
					<?php comment_reply_link( array_merge( $args, array( 'reply_text' => esc_html__( 'Reply','green-ink'),'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</div>
			<!-- </li> -->
	<?php  
	}
}


/**
 * 
 * Format the font
 *
 * @since 1.0.0
 */
function green_ink_format_font($data)
{
	$query_args = '';

	if( is_array($data) && !empty($data) )
	{
		$font  = str_replace("+"," ", $data['font-family']);

		if( isset($data['variant']) && 'regular' != $data['variant'] )
			$font 	= $font.':'.$data['variant'];

		if( isset( $data['subsets'] ) && is_array( $data['subsets'] ) )
			$font 	= $font.':'.implode( ', ', $data['subsets'] );
		else if( isset( $data['subsets'] ) )
			 $font 	= $font.':'.$data['subsets'];

		$query_args = array( 'family' => $font );
	}

	return $query_args;
}

/**
 * 
 * Customizer fallback typography
 *
 * @since 1.0.0
 */
function green_ink_customizer_cb($font)
{
	return array(
		'font-family'    => $font,
		'font-size'      => '',
		'letter-spacing' => '',
		'color'          => '',
		'text-align'     => '',
		'text-transform' => '',
		'line-height'    => '',
		'variant'        => ''
	);
}

/**
 * 
 * Custoizer styles join
 *
 * @since 1.0.0
 */
function green_ink_join_styles($css)
{
	$key = key($css);

	return $css[$key];
}

/**
 * 
 * Get thumbnail image src
 *
 * @since 1.0.0
 */
function green_ink_get_thumb_src($post)
{
	$img_id  = get_post_thumbnail_id( $post->ID );
	$img     = wp_get_attachment_image_src($img_id, 'full');
	$img_src = is_array($img) && isset($img[0]) ? $img[0] : '';

	return $img_src;
}

/**
 * 
 * Get custom post types
 *
 * @since 1.0.0
 */
function green_ink_dynamic_post_selection($name, $selected = '')
{
	$types = array( 'wpf-portfolio', esc_html__('Portfolios','green-ink') );
	$portfolio_exists = class_exists('WPF_Portfolio');

	$html  = '<select name="'.$name.'" id="'.$name.'">';
	$html .= $portfolio_exists ? '<option '.selected('dynamic_post_type', $selected, false).' value="'.$types[0].'">'.$types[1].'</option>' : '<option value=""></option>';
	$html .= apply_filters( 'green_ink_dynamic_post_types', '', $selected );
	$html .= '</select>';
	$html .= sprintf('<p class="description">%1$s</p>', esc_html__('Select the post type you want to integrate into the template. This tempalte will list the selected post type, keeping the original theme layout for blog list. In Pro version you will be able to select any custom post type.', 'green-ink'));

	return $html;
}

/**
 *
 * Get custom post types
 *
 * @since 1.0.0
 */
function green_ink_dynamic_post_args()
{
	$id = get_queried_object_id();
	$name = 'dynamic_post_type';
	$selected = get_post_meta($id, $name, true );

	$args = array(
			'post_type' => $selected,
			'posts_per_page' => get_option('posts_per_page')
	);
	$args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

	return apply_filters('green_ink_dynamic_posts_args', $args);
}

/**
 *
 * Check if Winning Portfolio Plugin Is Active
 *
 * @since 1.0.0
 */
function green_ink_is_wpf_active()
{
	return class_exists('WPF_Portfolio');
}

/**
 *
 * Wrapper function for related posts class
 *
 * @since 1.0.0
 */
function green_ink_related_posts($type)
{
	return new PF_Related_Posts($type);
}

/**
 * 
 * Get thumbnail image src
 *
 * @since 1.0.0
 */
function green_ink_is_wc_installed()
{
	if( class_exists( 'WooCommerce' ) )
	{
		return true;
	}

	return false;
}

/**
 * 
 * Check if it is woocommerce tempalte
 *
 * @since 1.0.0
 */
function green_ink_is_wc_template()
{
	return function_exists ( "is_woocommerce" ) && is_woocommerce();
}

/**
 * Retrieve the general archive title.
 *
 * @since  3.0.0
 * @access public
 * @return string
 */
function green_ink_get_single_archive_title() {
	return esc_html__( 'Archives', 'green-ink' );
}

/**
 * Retrieve the author archive title.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function green_ink_single_author_title() {
	return get_the_author_meta( 'display_name', absint( get_query_var( 'author' ) ) );
}

/**
 * Print the year archive title.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function green_ink_single_year_title() {
	echo green_ink_get_single_year_title();
}

/**
 * Retrieve the year archive title.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function green_ink_get_single_year_title() {
	return get_the_date( esc_html_x( 'Y', 'yearly archives date format', 'green-ink' ) );
}

/**
 * Print the week archive title.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function green_ink_single_week_title() {
	echo green_ink_get_single_week_title();
}

/**
 * Retrieve the week archive title.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function green_ink_get_single_week_title() {

	// Translators: 1 is the week number and 2 is the year.
	return sprintf(
			'%1$s %2$s of %3$s',
			esc_html__( 'Week', 'green-ink' ),
			get_the_time( esc_html_x( 'W', 'weekly archives date format', 'green-ink' ) ),
			get_the_time( esc_html_x( 'Y', 'yearly archives date format', 'green-ink' ) )
	);
}

/**
 * Print the day archive title.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function green_ink_single_day_title() {
	echo green_ink_get_single_day_title();
}

/**
 * Retrieve the day archive title.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function green_ink_get_single_day_title() {
	return get_the_date( esc_html_x( 'F j, Y', 'daily archives date format', 'green-ink' ) );
}

/**
 * Print the hour archive title.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function green_ink_single_hour_title() {
	echo green_ink_get_single_hour_title();
}

/**
 * Retrieve the hour archive title.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function green_ink_get_single_hour_title() {
	return get_the_time( esc_html_x( 'g a', 'hour archives time format', 'green-ink' ) );
}

/**
 * Print the minute archive title.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function green_ink_single_minute_title() {
	echo green_ink_get_single_minute_title();
}

/**
 * Retrieve the minute archive title.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function green_ink_get_single_minute_title() {

	// Translators: Minute archive title. %s is the minute time format.
	return sprintf(
			'%s %s',
			esc_html__( 'Minute', 'green-ink' ),
			get_the_time( esc_html_x( 'i', 'minute archives time format', 'green-ink' ) )
	);
}

/**
 * Print the minute + hour archive title.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function green_ink_single_minute_hour_title() {
	echo green_ink_get_single_minute_hour_title();
}

/**
 * Retrieve the minute + hour archive title.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function green_ink_get_single_minute_hour_title() {
	return get_the_time( esc_html_x( 'g:i a', 'minute and hour archives time format', 'green-ink' ) );
}

/**
 * Print the search results title.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function green_ink_search_title() {
	echo green_ink_get_search_title();
}

/**
 * Retrieve the search results title.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function green_ink_get_search_title() {

	// Translators: %s is the search query. The HTML entities are opening and closing curly quotes.
	return sprintf(
			'%s &#8220;%s&#8221;',
			esc_html__( 'Search results for', 'green-ink' ),
			get_search_query()
	);
}

/**
 * Retrieve the 404 page title.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function green_ink_404_title() {
	echo green_ink_get_404_title();
}

/**
 * Retrieve the 404 page title.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function green_ink_get_404_title() {
	return esc_html__( '404 Not Found', 'green-ink' );
}