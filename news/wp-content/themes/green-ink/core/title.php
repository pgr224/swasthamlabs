<?php
/**
 *
 * Layout Hooks:
 *
 * green_ink_title_bg // Title background image
 * green_ink_title_open_tag // Header title opening tag
 * green_ink_title_heading // Main title heading
 * green_ink_title_breadcrumbs // Breadcrumbs
 * green_ink_title_meta // Title meta
 * green_ink_title_close_tag // Header title closing tag
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage Green Ink
 * @since 1.0.0
 *
 */



if ( !function_exists( 'green_ink_title_bg' ) ) {
	/**
	 *
	 * Title background image
	 *
	 * @since  1.0.0
	 */
	function green_ink_title_bg($header, $class) {
		global $post;

		if ( 
			is_page() && has_post_thumbnail( $post->ID ) ||
			is_single() && has_post_thumbnail( $post->ID ) && 'yes' == green_ink_options('bg_thumb') ||
			class_exists('woocommerce') && is_product() && 'yes' == green_ink_options('prod_bg_thumb')
		)
		{
			# Class
			$class[] = 'has-title-bg';
			$class   = implode( ' ', $class );

			# Image
			$img_src = green_ink_get_thumb_src($post);

			# Style
			$style  = 'style="background-image: url('.esc_url($img_src).'); "';

			# Output
			$header = '<div '.$style.' class="'.esc_attr($class).'">';
		} 

		return $header;
	}
	add_filter( 'green_ink_header_open_tag', 'green_ink_title_bg', 10, 2 );
}

if ( ! function_exists( 'green_ink_title_open_tag' ) ) {
	/**
	 * Title header opening wrap
	 *
	 * @since  1.0.0
	 */
	function green_ink_title_open_tag()	{
		// Class.
		$class   = array( 'entry-header' );
		$class   = apply_filters( 'green_ink_header_classes', $class );
		$join_cls = implode( ' ', $class );

		// Header markup.
		$header = '<div class="' . $join_cls . '">';
		$header = apply_filters( 'green_ink_header_open_tag', $header, $class );

		// Output.
		echo wp_kses($header, array(
			'div' => array(
				'class' => true
			)
		) );
	}
	add_action( 'green_ink_title', 'green_ink_title_open_tag', 1 );
}


if ( ! function_exists( 'green_ink_title_heading' ) ) {
	/**
	 * Title Heading
	 *
	 * @since  1.0.0
	 */
	function green_ink_title_heading() {
		$title_wrap = array( 'title-wrap', 'breadcrumbs' );
		$title_wrap = apply_filters( 'green_ink_title_wrap_class', $title_wrap );
		$post_id    = get_queried_object_id();
		$title_class = join( ' ', $title_wrap );
		?>

		<div class="<?php echo esc_attr($title_class); ?>">
			<h1 class="entry-title">
			<?php  if ( is_day() ) : 
					printf( '%s %s', esc_html__( 'Daily Archives:', 'green-ink' ), get_the_date() );

				elseif ( is_month() ) :
					printf( '%s %s', esc_html__( 'Monthly Archives:', 'green-ink' ), get_the_date('F Y') );

				elseif ( is_year() ) :
					printf( '%s %s', esc_html__( 'Yearly Archives:', 'green-ink' ), get_the_date('Y') );

				elseif ( green_ink_is_wc_installed() && green_ink_is_wc_template() && ! is_product() ):
					woocommerce_page_title();

				elseif( is_category() ) :
					printf( '%s %s', esc_html__( 'Category Archives:', 'green-ink' ), single_cat_title( '', false ) );

				elseif( is_author() ):
					printf( '%s %s', esc_html__( 'Author Archives:', 'green-ink' ), get_the_author() );

				elseif( is_tag() ) :
					printf( '%s %s', esc_html__( 'Tag: ', 'green-ink' ), get_query_var('tag') );

				elseif( is_archive() ):
					esc_html_e( 'Blog Archives', 'green-ink' );
					the_archive_description();

				elseif( is_search() ):
					echo green_ink_get_search_title();

				elseif( is_home() ):
					return;

				else:
				   echo get_the_title($post_id);

				endif; 
			?>
			</h1>
		<?php
	}
	add_action( 'green_ink_title', 'green_ink_title_heading', 2 );
}

/**
 * 
 * Breadcrumbs
 *
 * @since  1.0.0
 */
if ( !function_exists( 'green_ink_title_breadcrumbs' ) ) 
{
	function green_ink_title_breadcrumbs()
	{
		new PF_Breadcrumbs;

		echo '</div>';
	}
	add_action( 'green_ink_title', 'green_ink_title_breadcrumbs', 3 );
}

/**
 * 
 * Title Meta
 *
 * @since  1.0.0
 */
if ( !function_exists( 'green_ink_title_meta' ) ) 
{
	function green_ink_title_meta()
	{
		$meta = apply_filters( 'green_ink_title_meta', true );
		if( $meta && is_singular() ): ?>

			<div class="entry-meta">
				<?php green_ink_posted_on(); ?>
			</div><!-- .entry-meta -->

		<?php endif;
	}
	add_action( 'green_ink_title', 'green_ink_title_meta', 4 );
}

/**
 * 
 * Title header closing wrap
 *
 * @since  1.0.0
 */
if ( !function_exists( 'green_ink_title_close_tag' ) ) 
{
	function green_ink_title_close_tag()
	{
		echo '</div><!-- .entry-header -->';
	}
	add_action( 'green_ink_title', 'green_ink_title_close_tag', 5 );
}