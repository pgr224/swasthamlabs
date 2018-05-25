<?php
/**
 * Customizer Inline CSS
 *
 * @package Green Ink WordPress Theme
 * @subpackage Green Ink
 * @author Pressfore - www.pressfore.com
 *
 */


if ( !function_exists( 'green_ink_customizer_styles' ) ) 
{

	function green_ink_customizer_styles() 
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

		# Get Typography Options
		$heading_font = '' != green_ink_options('heading_font') ? green_ink_options('heading_font') : green_ink_customizer_cb('Roboto'); 
		$body_font    = '' != green_ink_options('main_font') ? green_ink_options('main_font') : green_ink_customizer_cb('Poppins');
		$menu_font    = '' != green_ink_options('header_font') ? green_ink_options('header_font') : green_ink_customizer_cb('Libre Franklin') ;

		# Args
		$menu_args    = green_ink_format_font($menu_font);
		$heading_args = green_ink_format_font($heading_font);
		$body_args    = green_ink_format_font($body_font);

		# Get protocol
		$protocol     = is_ssl() ? 'https' : 'http';

		wp_enqueue_style('green_ink-body-font',add_query_arg($body_args, "$protocol://fonts.googleapis.com/css" ),array(), null);
		wp_enqueue_style('green_ink-heading-font',add_query_arg($heading_args, "$protocol://fonts.googleapis.com/css" ),array(), null);
		wp_enqueue_style('green_ink-header-font',add_query_arg($menu_args, "$protocol://fonts.googleapis.com/css" ),array(), null);

		$logo_height			 = green_ink_options('logo_height', 49);
		$secondary_color   		 = green_ink_options('secondary_color', '');
		$primary_color     		 = green_ink_options('primary_color', '#375199');
		$header_bg_color     	 = green_ink_options('header_bg_color', 'rgba(0,0,0,0.7)');
		$preloader_bg			 = green_ink_options('preloader_bg', '#fff');
		$preloader_cl			 = green_ink_options('preloader_cl', 'rgb(178,221,76)');
		$menu_color     		 = green_ink_options('menu_1st_color', '#f9fafa');
		$menu_2nd_color     	 = green_ink_options('menu_2nd_color', '#333');
		$menu_hcolor     	 	 = green_ink_options('menu_hcolor', '#b2dd4c');
		$body_bg_color     		 = green_ink_options('body_bg_color', '');
		$footer_bg_top   		 = green_ink_options('footer_bg_top', '');
		$footer_bg_bottom   	 = green_ink_options('footer_bg_bottom', '');
		$body_text_color   		 = green_ink_options('body_text_color', '');
		$heading_color   		 = green_ink_options('heading_color', '#333');
		$footer_text_color 		 = green_ink_options('footer_text_color', '');
		$footer_btext_color 	 = green_ink_options('footer_btext_color', '');
		$link_color        		 = green_ink_options('link_color', '');
		$link_hover_color  		 = green_ink_options('link_hover_color', '');
		$footer_link_color       = green_ink_options('footer_link_color', '');
		$footer_link_hover_color = green_ink_options('footer_link_hover_color', '');

		$css = array();

		$preloader = sprintf("
			.pf-gi-preloader-container,
			.pf-gip-preloader-container {
				background-color: %s;
			}
			.cssload-loading:after, 
			.cssload-loading:before, 
			.cssload-loading-center {
				background: %s;
			}
			",
			esc_attr($preloader_bg),
			esc_attr($preloader_cl)
		);

		$css['preloader'] = apply_filters('green_ink_css_preloader_style', $preloader, $preloader_bg, $preloader_cl);

		$css['body'] = sprintf("
			body {
				color: %s;
				font-family: %s;
				background-color: %s;
				font-size: %s;
				line-height: %s;
				letter-spacing: %s;
			}
			",
			esc_attr($body_text_color),
			esc_attr($body_font['font-family']),
			esc_attr($body_bg_color),
			esc_attr($body_font['font-size']),
			esc_attr($body_font['line-height']),
			esc_attr($body_font['letter-spacing'])
		);

		$css['headings'] = sprintf("
				h1,h2,h3,h4,h5,h6 {
					font-family: %s;
					color: %s;
				}
			",
			esc_attr($heading_font['font-family']),
			esc_attr($heading_color)
		);

		$css['header'] = sprintf("
				#header .main-navigation {
					font-family: %s;
				}
				.main-navigation ul {
					text-align: %s;
				}
				.main-navigation ul > li > a {
					color: %s;
					letter-spacing: %s;
					text-transform: %s;
					font-size: %s;
					font-weight: %s;
				}
				.green-ink-cart > a {
					color: %s;
				}
				.main-navigation .sub-menu > li > a {
					color: %s;
				}
				.main-navigation ul li:hover > a,
				.main-navigation ul li.focus > a,
				.main-navigation ul li.current-menu-item > a,
				.header-right .green-ink-cart:hover > a {
					color: %s;
				}
				#header #site-title a {
					color: %s;
				}
				#header span.site-desc {
					color: %s;
				}
				#header .inner {
					background-color: %s;
				}
				#header .logo-wrap  img {
					height: %s;
				}
			",
			esc_attr($menu_font['font-family']),
			esc_attr($menu_font['text-align']),
			esc_attr($menu_color),
			esc_attr($menu_font['letter-spacing']),
			esc_attr($menu_font['text-transform']),
			esc_attr($menu_font['font-size']),
			esc_attr($menu_font['variant']),
			esc_attr($menu_color),
			esc_attr($menu_2nd_color),
			esc_attr($menu_hcolor),
			esc_attr($primary_color),
			esc_attr($secondary_color),
			esc_attr($header_bg_color),
			esc_attr($logo_height) . 'px'
		);

		$css['links'] = sprintf("
				a,a:visited,
				#sidebar a {
					color: %s;
				}
				a:hover, a:focus, a:active,
				#sidebar a:hover {
					color: %s;
				}
			",
			esc_attr($link_color),
			esc_attr($link_hover_color)
		);

		$css['footer'] = sprintf("
				#footer {
					background-color: %s;
					color: %s;
				}
				#footer a{
					color: %s;
				}
				#footer a:hover,
				#footer a:visited{
					color: %s;
				}
				#footer #credits {
					background-color: %s;
					color: %s;
				}
			",
			esc_attr($footer_bg_top),
			esc_attr($footer_text_color),
			esc_attr($footer_link_color),
			esc_attr($footer_link_hover_color),
			esc_attr($footer_bg_bottom),
			esc_attr($footer_btext_color)
		);

		$css = apply_filters( 'green_ink_customizer_style', $css );
		$css = implode( ' ', $css );

		wp_add_inline_style( 'green-ink', esc_html($css) );

	}
	add_action( 'wp_enqueue_scripts', 'green_ink_customizer_styles');

}