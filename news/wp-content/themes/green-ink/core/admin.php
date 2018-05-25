<?php
/**
 * Core functions for admin side
 *
 * @package Green Ink WordPress Theme
 * @author Pressfore - www.pressfore.com
 *
 */

/*-----------------------------------------------------------------------------------*/
/* Register Dynamic post template selection
/*-----------------------------------------------------------------------------------*/
function green_ink_register_post_meta() 
{
	if( green_ink_is_wpf_active() || class_exists('Green_Ink_Pro') ) {

		add_meta_box(
				'green_ink_pmeta',
				esc_html__('Post Type Rendering', 'green-ink'),
				'green_ink_meta_cb',
				'page',
				'normal',
				'default'
		);
	}
}
add_action('add_meta_boxes', 'green_ink_register_post_meta');


/**
 * Dynamic post type callback
 *
 * Add a selection of the available post
 * types so that user can select
 * which custom post type want to integrate
 * into this template which will keep original
 * template layout but list custom post type
 */
function green_ink_meta_cb($post)
{
	wp_nonce_field( 'green_ink_nonce_dynamic', 'green_ink_meta_page_noncename' );

	$name = 'dynamic_post_type';
	$selected = get_post_meta($post->ID, $name, true );
	$selection = green_ink_dynamic_post_selection($name, $selected);

	echo wp_kses($selection, array(
		'select' => array(
			'name' => true,
			'id'   => true
		),
		'option' => array(
			'value'    => true,
			'selected' => true
		)
	));
}

/**
* Post meta save
*
*/
function green_ink_save_post_meta($post_id) {
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return $post_id;
	}

	if ( empty( $_POST ) && ! wp_verify_nonce( 'green_ink_nonce_dynamic', 'green_ink_meta_page_noncename' ) ) {
		return false;
	}

    if( isset( $_POST['post_type'] ) ) {
        // Check permissions to edit pages and/or posts
	    if ( 'page' == $_POST['post_type'] ) {
	        if ( !current_user_can( 'edit_page', $post_id ) || !current_user_can( 'edit_post', $post_id ))
	          return $post_id;
	    } 

		$name = 'dynamic_post_type';

	    $meta = isset( $_POST[$name] ) ? wp_unslash( $_POST[$name] ) : false;

	    update_post_meta( $post_id, $name, sanitize_text_field($meta) );
	}
}
add_action('save_post', 'green_ink_save_post_meta');