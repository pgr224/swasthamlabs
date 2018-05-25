<?php
/**
 * Core functions for initializing required theme functions
 *
 * @package Green Ink WordPress Theme
 * @subpackage Green Ink
 * @author Pressfore - www.pressfore.com
 *
 */


/*-----------------------------------------------------------------------------------*/
/* Register Core Stylesheets and javascript
/* These are necessary for the theme to function as intended
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'green_ink_scripts' ) ) {

	function green_ink_scripts() {
		// Set a dynamic version for cache busting.
		$version = green_ink_get_version();

		// If dev mode is defined, load unminified js.
		if( defined('GREEN_INK_DEV') && true === GREEN_INK_DEV ) {
			$main = 'main.js';
		} else {
			$main = 'main.min.js';
		}

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// Layout.
		$maxwidth = green_ink_options('layout', '1140');
	    wp_enqueue_style('green-ink-layout', get_template_directory_uri() .'/assets/css/green-ink-'.$maxwidth.'.css', array(), $version);

		// Primary theme stylesheet.
		wp_enqueue_style( 'green-ink', get_stylesheet_uri() );

		// Javascript.
		wp_enqueue_script( 'green-ink-plugins', get_template_directory_uri() . '/assets/js/plugins.min.js', array('jquery'), $version, true );
		wp_enqueue_script( 'green-ink', get_template_directory_uri() . '/assets/js/'.$main, array('jquery'), $version, true );
	}

	add_action( 'wp_enqueue_scripts', 'green_ink_scripts');
}


if ( !function_exists( 'green_ink_admin_scripts' ) ) {
	function green_ink_admin_scripts() {
		$screen = get_current_screen();

		if( is_admin() && 'page' === $screen->post_type ) {
			wp_enqueue_style('green-ink-admin', get_template_directory_uri() . '/assets/css/admin.css');
			wp_enqueue_script('green-ink-admin', get_template_directory_uri() . '/assets/js/admin/admin.js', array(), null);
		}
	}

	add_action( 'admin_enqueue_scripts', 'green_ink_admin_scripts');
}


/** Tell WordPress to run green_ink_setup() when the 'after_setup_theme' hook is run. */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override green_ink_setup() in a child theme, add your own green_ink_setup to your child theme's
 * functions.php file.
 *
 */
if ( ! function_exists( 'green_ink_setup' ) ) {

	function green_ink_setup() {
		// Translations can be filed in the /languages/ directory
		load_theme_textdomain( 'green-ink', get_template_directory() . '/languages' );

		add_editor_style();

		add_theme_support( 'title-tag' );

		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'post-thumbnails' );

		add_theme_support( 'custom-background', array(
			'default-color'  => '#f9f9f9'
		));

		add_theme_support( 'custom-logo', array(
				'height'      => 40,
				'width'       => 150,
				'flex-height' => true,
				'flex-width'  => true,
				'header-text' => array( 'site-title', 'site-description' ),
		) );

		$post_formats = apply_filters( 'green_ink_post_formats_support' , array( 'audio', 'video', 'gallery', 'link', 'quote' ) );
		add_theme_support( 'post-formats', $post_formats );

		$crop = green_ink_options('crop_thumb', 'no'); 
		if( 'no' === $crop ) $crop = false;
		else $crop = true;

	  	set_post_thumbnail_size( 320, 210, $crop );
		// 150px square
		add_image_size( 'green-ink-squared150', 150, 150, true );
		// 250px square
		add_image_size( 'green-ink-squared250', 250, 250, true );
		// 320px rectangle
		add_image_size( 'green-ink-rectangle320', 320, 250, true );
		// 4:3 Video
		add_image_size( 'green-ink-video43', 320, 240, true );
		// 16:9 Video
		add_image_size( 'green-ink-video169', 320, 180, true );

		register_nav_menus( array(
			'primary' => __( 'Primary Navigation', 'green-ink' ),
			'footer'  => __( 'Footer Navigation', 'green-ink' )
		));

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

	}
	add_action( 'after_setup_theme', 'green_ink_setup' );
}

/*-----------------------------------------------------------------------------------*/
//	Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
//	To override green_ink_widgets_init() in a child theme, remove the action hook and add your own
//	function tied to the init hook.
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'green_ink_widgets_init' ) ) {
	function green_ink_widgets_init() {
		// Area 1, Posts Widget area
		register_sidebar( array(
			'id'            => 'sidebar-1',
			'name'          => esc_html__( 'Posts Widget Area', 'green-ink' ),
			'description'   => esc_html__( 'Shown only in Blog Posts, Archives, Categories, etc.', 'green-ink' ),
			'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );


		// Area 2, located on pages
		register_sidebar( array(
			'id'            => 'sidebar-2',
			'name'          => esc_html__( 'Pages Widget Area', 'green-ink' ),
			'description'   => esc_html__( 'Shown only in Pages', 'green-ink' ),
			'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		// Area 3, located on woocommerce pages
		if( green_ink_is_wc_installed() )
			register_sidebar( array(
				'id'            => 'sidebar-3',
				'name'          => esc_html__( 'Shop Widget Area', 'green-ink' ),
				'description'   => esc_html__( 'Shown only in Woocommerce pages and products', 'green-ink' ),
				'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			) );

		// Area located in the header.
		register_sidebar( array(
			'id'            => 'sidebar-header',
			'name'          => esc_html__( 'Header Widget Area', 'green-ink' ),
			'description'   => esc_html__( 'Shown in header after the main menu in the right corner.', 'green-ink' ),
			'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		// Area 3, located in the footer. Empty by default.
		register_sidebar( array(
			'id'            => 'footer-widget-area-1',
			'name'          => esc_html__( 'First Footer Widget Area', 'green-ink' ),
			'description'   => esc_html__( 'The first footer widget area', 'green-ink' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		// Area 4, located in the footer. Empty by default.
		register_sidebar( array(
			'id'            => 'footer-widget-area-2',
			'name'          => esc_html__( 'Second Footer Widget Area', 'green-ink' ),
			'description'   => esc_html__( 'The second footer widget area', 'green-ink' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		// Area 5, located in the footer. Empty by default.
		register_sidebar( array(
			'id'            => 'footer-widget-area-3',
			'name'          => esc_html__( 'Third Footer Widget Area', 'green-ink' ),
			'description'   => esc_html__( 'The third footer widget area', 'green-ink' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		// Area 6, located in the footer. Empty by default.
		register_sidebar( array(
			'id'            => 'footer-widget-area-4',
			'name'          => esc_html__( 'Fourth Footer Widget Area', 'green-ink' ),
			'description'   => esc_html__( 'The fourth footer widget area', 'green-ink' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}

	add_action( 'widgets_init', 'green_ink_widgets_init' );
}