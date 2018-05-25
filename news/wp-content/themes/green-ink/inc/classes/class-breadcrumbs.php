<?php
/**
* Breadcrumbs Class
*
* @author PressFore
*
*/

Class PF_Breadcrumbs {

	// Create our breadcrumbs
	public function __construct() {
		$this->breadcrumbs();
	}

	/**
	 * Get active page templates for breadcrumbs
	 *
	 * Currently works if blog, or portfolio templates
	 * are not set multiple times. If there is more blog
	 * or portfolio pages, last one in the loop will be used
	 *
	 * @since 1.0.0
	 * @param $temp_args values that will be checked
	 * @return string
	 */
	public function get_templates($temp_args) {
		$temp = '';
		$args = array( 
			'post_type' 	  => 'page',
			'posts_per_page'  => -1
		);
		// an array that will hold the pages id's
		$ids[] = ''; 
		// collect all pages
		$pages = get_posts($args);

		// loop through all pages in order to find 
		// which pages use portfolio and blog template
		foreach( $pages as $page ) {
			// loop through arguments and test if
			// current page has page template set.
			// If it has and it mathches any template 
			// set in $theme_args assign it's name to $temp var
			foreach( $temp_args as $name => $template ) {  
				$temp = $name; 
				if( get_page_template_slug($page->ID) === $template ){
					// add id to the $ids array that will be returned for later use
					$ids[$temp] = $page->ID;
				} elseif( strpos( $template, '.php' ) === false ) {
					$ids[$temp] = $template;
				}
			}
		}

		return $ids;
	}


	/**
	* Get page parents
	*
	* @since 1.0.0
	* @param $post_id id of the current page
	*
	*/
	public function get_page_parents($post_id) { 
		$parents = get_post_ancestors($post_id); 
		// sort parents from highest page id
		// to lowest so when looping
		// we will start from last child
		// and ascend to the first parent
		arsort($parents);
		$html = '';

		// loop through parenst and add new breadcrumb
		foreach( $parents as $parent ) {
			$html .= '<a href="'.esc_url( get_permalink( $parent ) ).'">'.get_the_title( $parent ).'</a>';
		}
		
		return $html;
	}


	/**
	* Get categoy parents
	*
	* @since 1.0.0
	* @param $cat category/term id
	*
	*/
	public function get_cat_parents($cat) {
		return get_category_parents( $cat, true, '' );
	}


	/**
	* Get taxonomy
	*
	* @since 1.0.0
	* @param $post_id / Post ID
	*
	*/
	public function get_terms($post_id, $tax) 
	{
		$terms = get_the_terms( $post_id, $tax );
		$last = count($terms)-1; // array starts from 0
		$html = '';
		if( is_array($terms) && isset( $terms[$last] ) && $last > 0 )
		{
			$html .= $this->get_term_parents($terms[$last]->term_id, $tax);
			$html .= sprintf( '<a href="%1$s">%2$s</a>', get_term_link($terms[$last]->term_id), $terms[$last]->name);
		}
		else if( is_array($terms) && isset($terms[0]) )
		{
			$html .= sprintf( '<a href="%1$s">%2$s</a>', get_term_link($terms[0]->term_id), $terms[0]->name);
		}

		return $html;
	}

	/**
	* Get taxonomy
	*
	* @since 1.0.0
	* @param $cat category/term id
	*
	*/
	public function get_term_parents($term_id, $tax)
	{
		$parents = get_ancestors( $term_id, $tax );
		if( is_array($parents) )
		{
			// sort parents from highest page id
			// to lowest so when looping
			// we will start from last child
			// and ascend to the first parent
			arsort($parents);
			$html = '';

			// loop through parenst and add new breadcrumb
			foreach( $parents as $parent ) {
				$term = get_term_by('id', $parent, $tax);
				$html .= '<a href="'.esc_url( get_term_link( $parent ) ).'">'.$term->name.'</a>';
			}

			return $html;
		}
		
	}


	/**
	* green ink breadcrumbs
	*
	* @since 1.0.0
	*
	*/
	public function breadcrumbs() {
		$post_id = get_queried_object_id();
		$current_post = get_post($post_id);
		$args = array(
			'blog'      => get_option( 'page_for_posts' ),
			'portfolio' => 'templates/portfolio.php'
		);
		if( is_array( $args ) && ! empty( $args ) ) {
			$temps = $this->get_templates($args);
		} else {
			$temp = '';
		}
		// define main page parents
		$home = get_site_url();
		$blog = '';
		$portfolio = '';
		if( is_array( $temps ) ) {
			$blog = isset( $temps['blog'] ) ? get_permalink( $temps['blog'] ) : '';
			$portfolio = isset($temps['portfolio']) ? get_permalink( $temps['portfolio'] ) : '';
		}
		// open breadcrumbs
		$html = '<div id="breadcrumbs">';
		$html .= '<a href="'.$home.'">'.__('Home', 'green-ink').'</a>'; // home page

		if( is_home() ) {
			return;
		}

		if( is_singular('wpf-portfolio') ) { 
			if( $portfolio ) $html .= '<a href="'.$portfolio.'">'.get_the_title( $temps['portfolio'] ).'</a>'; // portfolio page
			$html .= $this->get_terms($current_post->ID, 'wportfolio_category');
			$html .= '<span>'.apply_filters('the_title', $current_post->post_title).'</span>'; // current post
		} else if( green_ink_is_wc_installed() && is_product() ) {
			$cat = get_query_var('product_cat'); 
			$shop = get_option( 'woocommerce_shop_page_id' ); ;
			$html .= sprintf('<a href="%1$s">%2$s</a>', get_permalink($shop), get_the_title($shop) );
			$html .= $this->get_terms($current_post->ID, 'product_cat');
			$html .= '<span>'.apply_filters('the_title', $current_post->post_title).'</span>'; // current page
		} else if( green_ink_is_wc_installed() && is_woocommerce() ) {
			$html .= '<span>'.woocommerce_page_title(false)."</span>";
		} else if( is_single() ) { 
			if( $blog && !empty($temps['blog']) ) $html .= '<a href="'.$blog.'">'.get_the_title( $temps['blog'] ).'</a>'; // blog page
			$html .= '<span>'.apply_filters('the_title', $current_post->post_title).'</span>'; // current post
		} else if( ( is_page() || is_home() ) && !is_front_page() ) {
			if( $current_post->post_parent != 0 ) $html .= $this->get_page_parents( $current_post->ID );
			$html .= '<span>'.apply_filters('the_title', $current_post->post_title).'</span>'; // current page
		} else if( is_search() ) { // 
			$term = get_query_var('s');
			$html .= '<span>'.$term.'</span>'; // current search term
		} else if( is_category() ) {
			$cat = get_query_var('category_name');
			$id = get_cat_ID($cat);
			if ($blog && !empty($temps['blog'])) {
				$html .= '<a href="' . $blog . '">' . get_the_title($temps['blog']) . '</a>';
			} else if($id) {
				$html .= '<a>'.esc_html__('Category', 'green-ink').'</a>';
			}
			if( $id ) {
				$html .= $this->get_cat_parents($id); // categories
			}
		} else if( is_tag() ) {
			$tag = get_query_var('tag');
			$html .= '<a>'.esc_html__('Tags', 'green-ink').'</a>';
			$html .= '<span>'.$tag.'</span>';
		} else if( is_tax('wportfolio_category') ) {
			$cat = get_query_var('wportfolio_category'); 
			$term = get_term_by( 'slug', $cat, 'wportfolio_category' ); 
			if( $portfolio ) $html .= '<a href="'.$portfolio.'">'.get_the_title( $temps['portfolio'] ).'</a>'; // portfolio page
			$html .= $this->get_term_parents( $term->term_id, 'wportfolio_category' ); // categories
			$html .= '<span>'.$term->name.'</span>';
		} else if( green_ink_is_wc_installed() && is_product_category() ) {
			$cat = get_query_var('product_cat'); 
			$term = get_term_by( 'slug', $cat, 'product_cat' ); 
			if( $portfolio ) $html .= '<a href="'.$portfolio.'">'.get_the_title( $temps['portfolio'] ).'</a>'; // portfolio page
			$html .= $this->get_cat_parents($term->term_id); // categories
		} else if( is_author() ) {
			$author = get_query_var('author_name'); 
			$html .= '<span>'.$author.'</span>'; // current page
		}

		// close the breadcrumbs
		$html .= '</div><!-- #breadcrumbs -->';

		echo wp_kses( $html, array(
			'div' => array(
				'id' => true
			),
			'a' => array(
				'href' => true
			),
			'span' => true
		) );
	}

}