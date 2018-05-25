<?php
/**
 * Registers custom taxomies for use with this theme
 *
 * @package WordPress
*/

add_action( 'init', 'bi_register_taxonomies' );

if ( !function_exists('bi_register_taxonomies') ) {
	
	function bi_register_taxonomies() {

		//portfolio
		/*
		$portfolio_post_type_name = bi_get_data('portfolio_post_type_name') ? bi_get_data('portfolio_post_type_name') : __('Portfolio','pixel-linear');
		$portfolio_tax_slug = bi_get_data('portfolio_tax_slug') ? bi_get_data('portfolio_tax_slug') : 'portfolio-category';

			// Portfolio taxonomies
		register_taxonomy('portfolio_cats','portfolio',array(
			'hierarchical' => true,
			'labels' => apply_filters('bi_portfolio_tax_labels', array(
				'name' => $portfolio_post_type_name . ' ' . __( 'Categories', 'pixel-linear' ),
				'singular_name' => $portfolio_post_type_name . ' '. __( 'Category', 'pixel-linear' ),
				'search_items' =>  __( 'Search Categories', 'pixel-linear' ),
				'all_items' => __( 'All Categories', 'pixel-linear' ),
				'parent_item' => __( 'Parent Category', 'pixel-linear' ),
				'parent_item_colon' => __( 'Parent Category:', 'pixel-linear' ),
				'edit_item' => __( 'Edit  Category', 'pixel-linear' ),
				'update_item' => __( 'Update Category', 'pixel-linear' ),
				'add_new_item' => __( 'Add New  Category', 'pixel-linear' ),
				'new_item_name' => __( 'New Category Name', 'pixel-linear' ),
				'choose_from_most_used'	=> __( 'Choose from the most used categories', 'pixel-linear' )
				)
			),
			'query_var' => true,
			'rewrite' => array( 'slug' => $portfolio_tax_slug ),
		));
		*/
	
	}
	
} ?>