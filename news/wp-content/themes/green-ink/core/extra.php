<?php
/**
 * Layout Hooks:
 *
 * green_ink_rolo_slider // Add rolo-active class if rolo is active
 * green_ink_plugins_hook // Add the filter after all pluigns have been loaded
 * green_ink_font_awesome // Enqueue font awesome 
 * green_ink_font_awesome_cb // Check if Kingcomposer is active to include font awesome
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage Green Ink
 * @since 1.0.0
 *
 */


/*-----------------------------------------------------------------------------------*/
/* Modify TBody class if rolo slider is active
/*-----------------------------------------------------------------------------------*/

if (!function_exists('green_ink_rolo_slider'))
{
    function green_ink_rolo_slider_class($classes)
    {
        // If Rolo slider is active add class
        if( class_exists('Rolo_Slider') )
            $classes[] = 'rolo-active';

        return $classes;
    }
}

// Add filter on init hook after plugins have been loaded
function green_ink_plugins_hook() 
{
    add_filter( 'body_class', 'green_ink_rolo_slider_class' );
}

add_action( 'init', 'green_ink_plugins_hook' );

/*-----------------------------------------------------------------------------------*/
/* Modify Logo output
/*-----------------------------------------------------------------------------------*/
if (!function_exists('green_ink_custom_logo'))
{
    function green_ink_custom_logo($html, $blog_id)
    {
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $display_tagline = get_theme_mod( 'header_text' );

        $green_ink_logo = '<div class="logo-wrap">';

        // We have a logo. Logo is go.
        if ( $custom_logo_id && ! $display_tagline ) {
            $green_ink_logo .= sprintf( '<a href="%1$s" class="logotype-img" rel="home" itemprop="url">%2$s</a>',
                esc_url( home_url( '/' ) ),
                wp_get_attachment_image( $custom_logo_id, 'full', false, array(
                    'class'    => 'custom-logo',
                    'itemprop' => 'logo',
                ) )
            );
        } else {
            $green_ink_logo .= sprintf('<a id="site-title" class="text" href="%1$s" title="2$s" rel="home">%3$s</a>',
                    esc_url( home_url( '/' ) ),
                    esc_attr( get_bloginfo( 'name', 'display' ) ),
                    esc_attr( get_bloginfo( 'name', 'display' ) )
                );
            $green_ink_logo .= sprintf( '<span class="site-desc">%s</span>' . "\n", get_bloginfo( 'description' ) );
        }

        $green_ink_logo .= '</div>';

        $html = apply_filters ( 'green_ink_child_logo', $green_ink_logo);

        return $html;
    }
}
add_filter('get_custom_logo', 'green_ink_custom_logo', 10, 2);

/*-----------------------------------------------------------------------------------*/
/* Include font-awesome if king komposer is not active
/*-----------------------------------------------------------------------------------*/
if (!function_exists('green_ink_font_awesome'))
{
    function green_ink_font_awesome()
    {
  		wp_enqueue_style('green-ink-awesome', get_template_directory_uri() .'/assets/css/font-awesome.min.css');
  	}
}

// Add action on init hook after plugins have been loaded
function green_ink_font_awesome_cb()
{ 
	if( !class_exists('KingComposer') )
		add_action( 'wp_enqueue_scripts', 'green_ink_font_awesome' );
}
add_action( 'init', 'green_ink_font_awesome_cb', 99 );
