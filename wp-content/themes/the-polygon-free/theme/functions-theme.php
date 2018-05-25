<?php
/**
 * Your Inspiration Themes
 *
 * @package WordPress
 * @subpackage Your Inspiration Themes
 * @author Your Inspiration Themes Team <info@yithemes.com>
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */


/**
 * Set up all theme data.
 *
 * @return void
 * @since 1.0.0
 */
function yit_setup_theme()
{

    /**
     * Set up the content width value based on the theme's design.
     *
     * @see yit_content_width()
     *
     * @since Twenty Fourteen 1.0
     */
    if (!isset($GLOBALS['content_width'])) {
        $GLOBALS['content_width'] = apply_filters('yit-container-width-std', 1170);
    }

    //This theme have a CSS file for the editor TinyMCE
    add_editor_style('css/editor-style.css');

    //This theme support post thumbnails
    add_theme_support('post-thumbnails');

    //This theme uses the menus
    add_theme_support('menus');

    add_theme_support( "title-tag" );

    //Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    //This theme support post formats
    add_theme_support('post-formats', apply_filters('yit_post_formats_support', array('gallery', 'audio', 'video', 'quote')));

    if (!defined('HEADER_TEXTCOLOR'))
        define('HEADER_TEXTCOLOR', '');

    // The height and width of your custom header. You can hook into the theme's own filters to change these values.
    // Add a filter to twentyten_header_image_width and twentyten_header_image_height to change these values.
    define('HEADER_IMAGE_WIDTH', apply_filters('yiw_header_image_width', 1170));
    define('HEADER_IMAGE_HEIGHT', apply_filters('yiw_header_image_height', 410));

    // Don't support text inside the header image.
    if (!defined('NO_HEADER_TEXT'))
        define('NO_HEADER_TEXT', true);

    //This theme support custom header
    add_theme_support('custom-header');

    //This theme support custom backgrounds
    add_theme_support('custom-backgrounds');

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support('html5', array(
        'search-form', 'comment-form', 'comment-list',
    ));

    // We'll be using post thumbnails for custom header images on posts and pages.
    // We want them to be 940 pixels wide by 198 pixels tall.
    // Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
    // set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );
    $image_sizes = array(
        'blog_small' => array(372, 343, true),
        'blog_section' => array(295, 295, true),
        'recent_posts' => array(98, 67, true),
        'blog_widget_compact' => array(75, 75, true),
        'testimonial_thumb' => array(58, 58, true),
    );


    $image_sizes = apply_filters('yit_add_image_size', $image_sizes);

    foreach ($image_sizes as $id_size => $size) {
        add_image_size($id_size, apply_filters('yit_' . $id_size . '_width', $size[0]), apply_filters('yit_' . $id_size . '_height', $size[1]), isset($size[2]) ? $size[2] : false);
    }

    //Set localization and load language file
    $locale = get_locale();
    $locale_file = YIT_THEME_PATH . "/languages/$locale.php";
    if (is_readable($locale_file)) {
        require_once($locale_file);
    }

    //remove wpml stylesheet
    define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);

    if (!defined('WPLANG')) define('WPLANG', '');

    if (WPLANG != '') {
        load_theme_textdomain('yit', dirname(locate_template('/languages/' . WPLANG . '.mo')));
    } else {
        load_theme_textdomain('yit', get_template_directory() . '/languages');
    }


    // Add support to woocommerce
    if (defined('YIT_IS_SHOP') && YIT_IS_SHOP) {
        add_theme_support('woocommerce');
    }


    //Register menus
    register_nav_menus(
        array(
            'nav' => __('Main Navigation', 'yit'),
            'shop-by-category' => __('Shop by Category', 'yit'),
            'shop-by-category-2' => __('Shop by Category 2', 'yit'),
            'mobile-nav' => __('Mobile Navigation', 'yit'),
            'welcome-menu' => __('Welcome Menu', 'yit'),
            'copyright_right' => __('Copyright Right', 'yit'),
            'copyright_left' => __('Copyright Left', 'yit'),
            'copyright_centered' => __('Copyright Centered', 'yit')
        )
    );

    //create the menu items if they don't exist
    $menuname = 'Welcome Menu';
    if (!wp_get_nav_menu_object($menuname)) {
        if (is_shop_installed()) {
            $my_account_id = get_option('woocommerce_myaccount_page_id');
            if ($my_account_id) {

                $menu_id = wp_create_nav_menu($menuname);
                $my_account_url = get_permalink(wc_get_page_id('myaccount'));
                wp_update_nav_menu_item($menu_id, 0, array(
                    'menu-item-title' => __('My Account', 'yit'),
                    'menu-item-object' => 'page',
                    'menu-item-object-id' => get_option('woocommerce_myaccount_page_id'),
                    'menu-item-type' => 'post_type',
                    'menu-item-status' => 'publish'));

                wp_update_nav_menu_item($menu_id, 0, array(
                    'menu-item-title' => __('My Orders', 'yit'),
                    'menu-item-classes' => 'view-order',
                    'menu-item-url' => wc_get_endpoint_url('view-order', '', $my_account_url),
                    'menu-item-status' => 'publish'));

                if (defined('YITH_WCWL')) {
                    wp_update_nav_menu_item($menu_id, 0, array(
                        'menu-item-title' => __('My Wishlist', 'yit'),
                        'menu-item-classes' => 'wishlist',
                        'menu-item-url' => wc_get_endpoint_url('wishlist', '', $my_account_url),
                        'menu-item-status' => 'publish'));
                }

                wp_update_nav_menu_item($menu_id, 0, array(
                    'menu-item-title' => __('Edit Address', 'yit'),
                    'menu-item-classes' => 'edit-address',
                    'menu-item-url' => wc_get_endpoint_url('edit-address', '', $my_account_url),
                    'menu-item-status' => 'publish'));

                wp_update_nav_menu_item($menu_id, 0, array(
                    'menu-item-title' => __('Edit Account', 'yit'),
                    'menu-item-classes' => 'edit-account',
                    'menu-item-url' => wc_get_endpoint_url('edit-account', '', $my_account_url),
                    'menu-item-status' => 'publish'));


                wp_update_nav_menu_item($menu_id, 0, array(
                    'menu-item-title' => __('Logout', 'yit'),
                    'menu-item-classes' => 'customer-logout',
                    'menu-item-url' => wc_get_endpoint_url('customer-logout', '', $my_account_url),
                    'menu-item-status' => 'publish'));

                if (!has_nav_menu('welcome-menu')) {
                    $locations = get_theme_mod('nav_menu_locations');
                    $locations['welcome-menu'] = $menu_id;
                    set_theme_mod('nav_menu_locations', $locations);
                }
            }

        }

    }

    // Default Sidebar
    register_sidebar(yit_sidebar_args("Default Sidebar", __("The default widgets area ready to use.", 'yit'), 'widget', 'h3'));
    /* === Add Default Blog Sidebar === */
    register_sidebar(yit_sidebar_args("Blog Sidebar", __("The default blog widgets area ready to use.", 'yit'), 'widget', 'h3'));


    for ($i = 1; $i <= yit_get_option('footer-rows', 0); $i++) {
        register_sidebar(yit_sidebar_args("Footer Row $i", sprintf(__("The widget area #%d used in Footer section", 'yit'), $i), 'widget col-xs-6 col-sm-' . (12 / yit_get_option('footer-columns')), apply_filters('yit_footer_sidebar_' . $i . '_wrap', 'h3')));
    }

    if (yit_get_option('footer-add-extra-area') == 'yes') {
        register_sidebar(yit_sidebar_args("Footer Extra Area", sprintf(__("The widget extra area used on the %s Footer section", 'yit'), yit_get_option('footer-extra-area-position')), 'widget col-sm-12', apply_filters('yit_footer_extra_area_wrap', 'h3')));
    }
}

/**
 * Remove the class no-js when javascript is activated
 *
 * We add the action at the start of head, to do this operation immediatly, without gap of all libraries loading
 */
function yit_detect_javascript()
{
    ?>
    <script
        type="text/javascript">document.documentElement.className = document.documentElement.className.replace('no-js', '') + ' yes-js js_active js'</script>
    <?php
}

/**
 * Adjust content_width value for image attachment template.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return void
 */
function yit_content_width()
{
    $full_width = $GLOBALS['content_width'];
    $sidebar_width = $full_width * (25 / 100);   // 25% (col-3)
    $sidebar = YIT_Layout()->sidebars;
    $sidebar = is_array($sidebar) ? $sidebar : array('layout' => $sidebar);

    if ('sidebar-double' == $sidebar['layout']) {
        $GLOBALS['content_width'] -= $sidebar_width * 2;
    } elseif ('sidebar-no' != $sidebar['layout']) {
        $GLOBALS['content_width'] -= $sidebar_width;
    }

    $GLOBALS['content_width'] -= 30;
}

add_action('template_redirect', 'yit_content_width');


/**
 * Register the extra body classes to add in the pages
 *
 * @param array $classes
 *
 * @return array
 * @since 1.0.0
 */
function yit_add_body_class($classes)
{
    $layout = yit_get_option('general-layout-type');
    $classes[] = $layout . '-layout';

    if ($layout == 'fluid') {
        $classes[] = 'stretched-layout';
    }

    $classes = yit_detect_browser_body_class($classes);

    if (is_singular('post')) {
        $blog_single_type = yit_get_option('blog-single-type');
        $classes[] = empty($blog_single_type) ? 'blog-single' : 'blog-single blog-single-' . $blog_single_type;
    }

    if (yit_get_option('general-activate-responsive') == 'yes') {
        $classes[] = 'responsive';
    }

    return $classes;
}

/**
 * Extend the default WordPress post classes.
 *
 * Adds a post class to denote:
 * Non-password protected page with a post thumbnail.
 *
 * @since Twenty Fourteen 1.0
 *
 * @param array $classes A list of existing post class values.
 * @return array The filtered post class list.
 */
function yit_post_classes($classes)
{
    if (!post_password_required() && has_post_thumbnail()) {
        $classes[] = 'has-post-thumbnail';
    }

    return $classes;
}

add_filter('post_class', 'yit_post_classes');

if (!function_exists('remove_equals_from_special_chars')) {
    function remove_equals_from_special_chars($chars)
    {

        unset($chars['/[=\[](.*?)[=\]]/']);
        $chars['/[\[](.*?)[\]]/'] = '<span class="title-highlight">$1</span>';

        return $chars;
    }
}

// Remove Open Sans that WP adds from frontend

if (!function_exists('remove_wp_open_sans')) :
    function remove_wp_open_sans()
    {
        wp_deregister_style('open-sans');
        wp_register_style('open-sans', false);
    }

    add_action('wp_enqueue_scripts', 'remove_wp_open_sans');
    // Uncomment below to remove from admin
    // add_action('admin_enqueue_scripts', 'remove_wp_open_sans');
endif;

/**
 * === Start Blog Functions ===
 */

if (!function_exists('yit_add_blog_stylesheet')) {

    /**
     * Register/Enqueue the blog stylesheet
     *
     * @return void
     * @since 2.0.0
     * @author Andrea Grillo    <andrea.grillo@yithems.com>
     */

    function yit_add_blog_stylesheet()
    {
        $blog = array(
            'src' => YIT_THEME_ASSETS_URL . '/css/blog.css',
            'enqueue' => true,
            'registered' => false
        );

        $masterslider_style = array(
            'src' => YIT_THEME_ASSETS_URL . '/lib/masterslider/style/masterslider.css',
            'enqueue' => true,
            'registered' => false
        );

        $masterslider_script = array(
            'src' => YIT_THEME_ASSETS_URL . '/lib/masterslider/masterslider.min.js',
            'enqueue' => true,
            'deps' => array('jquery')
        );

        if (is_page_template('blog.php') || is_search() || is_singular('post') || is_home() || is_archive() || is_category() || is_tag() || yit_is_old_ie()) {
            YIT_Asset()->set('style', 'blog-stylesheet', $blog, 'before', 'comment-stylesheet');

            /* === Add Master Slider Style and Script on Single Post with gallery post format === */
            if ((is_singular('post') && get_post_format() == 'gallery') || yit_is_old_ie()) {
                YIT_Asset()->set('style', 'masterslider-style', $masterslider_style, 'after', 'blog-stylesheet');
                YIT_Asset()->set('script', 'masterslider-script', $masterslider_script);
            }

        }
    }
}

if (!function_exists('yit_get_comments_template')) {
    /**
     * Get the comments template
     *
     * @return mixed
     * @since 2.0.0
     * @author Andrea Grillo <andrea.grillo@yithems.com>
     */

    function yit_get_comments_template()
    {
        return include(YIT_PATH . '/comments.php');
    }
}

//Hide the footer
if (!function_exists('yit_hide_footer')) {

    /**
     * Change the footer type options to hide the footer
     *
     * @return void
     * @since 2.0.0
     * @author Andrea Grillo    <andrea.grillo@yithems.com>
     */
    function yit_hide_footer()
    {
        return 'none';
    }
}


if (!function_exists('yit_curPageURL')) {
    /**
     * Retrieve the current complete url
     *
     * @since 1.0
     */
    function yit_curPageURL()
    {
        $pageURL = 'http';
        if (isset($_SERVER["HTTPS"]) AND $_SERVER["HTTPS"] == "on")
            $pageURL .= "s";

        $pageURL .= "://";

        if (isset($_SERVER["SERVER_PORT"]) AND $_SERVER["SERVER_PORT"] != "80")
            $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
        else
            $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];

        return $pageURL;
    }
}
/**
 * === END Blog Functions ===
 */


if (!function_exists('yit_excerpt_text')) {
    /**
     * Cut the text
     *
     * @author Andrea Grillo  <andrea.grillo@yithemes.com>
     *
     * @param string $text
     * @param int $excerpt_length
     * @param string $excerpt_more
     * @return string
     * @since 1.0.0
     */
    function yit_excerpt_text($text, $excerpt_length = 50, $excerpt_more = '')
    {
        $words = preg_split("/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
        if (count($words) > $excerpt_length) {
            array_pop($words);
            $text = implode(' ', $words);
            $text = $text . $excerpt_more;
        } else {
            $text = implode(' ', $words);
        }

        echo $text;
    }
}


if (!function_exists('yit_get_registered_nav_menus')) {
    /**
     * Retireve all registered menus
     *
     * @return array
     * @since 1.0.0
     */
    function yit_get_registered_nav_menus()
    {
        $menus = get_terms('nav_menu');
        $return = array();

        foreach ($menus as $menu) {
            array_push($return, $menu->name);
        }

        return $return;
    }
}
if (!function_exists('yit_og')) {
    function yit_og()
    {
        if (yit_get_option('general-enable-open-graph') == 'no') {
            return;
        }

        /**
         * Create the og tag description with properly content, based on the current queried object.
         */
        $queried_object = get_queried_object();

        $ogcontent = array();
        $ogcontent['site_name'] = get_bloginfo('name');
        $ogcontent['title'] = function_exists( 'wp_get_document_title' ) ? wp_get_document_title() : wp_title( '-', false, 'right' );
        // For posts, pages and products
        if (isset($queried_object->post_type)) {
            $post = get_post($queried_object->ID);
            $ogcontent['url'] = get_permalink($post);
            $ogcontent['description'] = $post->post_excerpt ? $post->post_excerpt : wp_trim_words($post->post_content);


            if (has_post_thumbnail($post->ID)) {
                $image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium');
                $ogcontent['image'] = $image_url[0];
            }

        } else if (isset($queried_object->taxonomy) && $queried_object->taxonomy) {

            $ogcontent['description'] = $queried_object->description;

            if (function_exists('WC')) {
                $term_thumbnail = get_woocommerce_term_meta($queried_object->term_id, 'thumbnail_id', true);
                $imgs = wp_get_attachment_image_src($term_thumbnail, 'medium');
                if ($imgs[0]) {
                    $ogcontent['image'] = $imgs[0];
                }
            }
        }

        // If the taxonomy or post don't have content, use the site description
        if ((is_home() || is_front_page()) && empty($ogcontent['description'])) {
            $ogcontent['description'] = get_bloginfo('description');
        }

        if (empty($ogcontent['image']) && yit_get_option('header-custom-logo') == 'yes' && yit_get_option('header-custom-logo-image') != '') {
            $ogcontent['image'] = yit_get_option('header-custom-logo-image');
        }

        $ogcontent['description'] = isset($ogcontent['description']) ? apply_filters('yit_og_description', strip_tags(strip_shortcodes(preg_replace("~(?:\[/?)[^/\]]+/?\]~s", '', $ogcontent['description'])))) : '';

        foreach ($ogcontent as $property => $content) {
            echo '<meta property="og:' . $property . '" content="' . esc_attr($content) . '"/>' . "\n";
        }

    }

}

/**
 * SoundCloud functions
 */
if (!function_exists('soundcloud_oembed_params')) {
    function soundcloud_oembed_params($embed, $params)
    {
        global $soundcloud_oembed_params;
        $soundcloud_oembed_params = $params;
        return preg_replace_callback('/src="(https?:\/\/(?:w|wt)\.soundcloud\.(?:com|dev)\/[^"]*)/i', 'soundcloud_oembed_params_callback', $embed);
    }
}

if (!function_exists('soundcloud_oembed_params_callback')) {
    function soundcloud_oembed_params_callback($match)
    {
        global $soundcloud_oembed_params;

        // Convert URL to array
        $url = parse_url(urldecode($match[1]));
        // Convert URL query to array
        parse_str($url['query'], $query_array);
        // Build new query string
        $query = http_build_query(array_merge($query_array, $soundcloud_oembed_params));

        $search = array('show_artwork=0', 'show_artwork=1', 'auto_play=0', 'auto_play=1', 'show_comments=0', 'show_comments=1');
        $replace = array('show_artwork=false', 'show_artwork=true', 'auto_play=false', 'auto_play=true', 'show_comments=false', 'show_comments=true');

        $query = str_replace($search, $replace, $query);

        return 'src="' . $url['scheme'] . '://' . $url['host'] . $url['path'] . '?' . $query;
    }
}

if (!function_exists('yit_string_is_serialized')) {
    /**
     * Check if a string is serialized
     *
     * @author   Andrea Grillo  <andrea.grillo@yithemes.com>
     *
     * @param $string
     *
     * @internal param string $src
     * @return bool | true if string is serialized, false otherwise
     * @since    2.0.0
     */
    function yit_string_is_serialized($string)
    {
        $data = @unserialize($string);
        return !$data ? $data : true;
    }
}

if (!function_exists('yit_string_is_json')) {
    /**
     * Check if a string is json
     *
     * @author   Andrea Grillo  <andrea.grillo@yithemes.com>
     *
     * @param $string
     *
     * @internal param string $src
     * @return bool | true if string is json, false otherwise
     * @since    2.0.0
     */
    function yit_string_is_json($string)
    {
        $data = @json_decode($string);
        return $data == NULL ? false : true;
    }
}

if (!function_exists('yit_remove_script_version')) {
    /**
     * Remove the script version from the script and styles
     *
     * @author Andrea Grillo  <andrea.grillo@yithemes.com>
     *
     * @param string $src
     * @return string
     * @since 1.0.0
     */
    function yit_remove_script_version($src)
    {
        if (yit_get_option('general-remove-scripts-version') == 'yes') {
            $parts = explode('?v', $src);
            return $parts[0];
        } else {
            return $src;
        }
    }

}

if (!function_exists('yit_exclude_categories_list_widget')) {
    /*
     * exclude categories(selected in the theme options) from wordpress widget categories
     *
     * @return void
     * @since 2.0
     * @author Andrea Frascaspata <andrea.frascaspata@yithemes.com>
     */
    function yit_exclude_categories_list_widget($args)
    {
        $cat_args = array('exclude' => str_replace("-", "", yit_get_excluded_categories(2)));
        return array_merge($args, $cat_args);
    }
}

function yit_newsletter_show_placeholder($placeholder, $shortcode)
{

    if ($shortcode == 'newsletter_form') {
        return true;
    } else {
        return $placeholder;
    }

}

if (!function_exists('yit_get_testimonial_list_array')) {
    /**
     * Get the list of testimonials
     *
     * Retrieve an array of testimonials, if the plugin is active
     *
     * @param array
     * @since  2.0.0
     * @param array $default_value | an array with the default value
     * @return Array
     * @author Andrea Grillo <andrea.grillo@yithemes.com>
     */
    function yit_get_testimonial_list_array($default_value = array())
    {
        $testimonials_list = array();
        if (function_exists('YIT_Testimonial')) {
            $testimonials = new WP_Query(
                array(
                    'post_type' => YIT_Testimonial()->testimonial_post_type,
                    'posts_per_page' => -1
                )
            );
            if (!empty($testimonials)) {

                if (!empty($default_value)) {
                    $testimonials_list = $default_value;
                }

                foreach ($testimonials->posts as $testimonial) {
                    $testimonials_list[$testimonial->ID] = $testimonial->post_title;
                }
            } else {
                $testimonials_list = false;
            }
        } else {
            $testimonials_list = false;
        }

        return $testimonials_list;
    }
}

if (!function_exists('yit_unregister_faq_widget')) {
    /**
     * Unregister Faq Filter Widget
     *
     *
     * @param array
     * @since  2.0.0
     * @return void
     * @author Andrea Grillo <andrea.grillo@yithemes.com>
     */
    function yit_unregister_faq_widget()
    {
        if (class_exists('YIT_Faq_Filters')) {
            unregister_widget('YIT_Faq_Filters');
        }
    }
}
add_action('widgets_init', 'yit_unregister_newsletter_widget', 20);

if (!function_exists('yit_unregister_newsletter_widget')) {
    /**
     * Unregister Newsletter Filter Widget
     *
     *
     * @param array
     * @since  2.0.0
     * @return void
     * @author Emanuela Castorina <emanuela.castorina@yithemes.com>
     */
    function yit_unregister_newsletter_widget()
    {
        if (class_exists('YIT_Newsletter_Form')) {
            unregister_widget('YIT_Newsletter_Form');
        }
    }
}
add_action('widgets_init', 'yit_unregister_newsletter_widget', 20);

if (!function_exists('yit_remove_default_shortcodes')) {
    /**
     * Remove Swiper Slider Shortcodes from shortcodes list
     *
     *
     * @param array
     * @since  2.0.0
     * @return void
     * @author Andrea Grillo <andrea.grillo@yithemes.com>
     */

    function yit_remove_default_shortcodes($shortcodes_list)
    {

        unset(
            $shortcodes_list['swiper_products_slider'],
            $shortcodes_list['lastpost'],
            $shortcodes_list['banner'],
            $shortcodes_list['image_banner'],
            $shortcodes_list['review_slider'],
            $shortcodes_list['random_numbers'],
            $shortcodes_list['recentpost'],
            $shortcodes_list['popularpost']

        );

        return $shortcodes_list;
    }
}
add_filter('yit-shortcode-plugin-init', 'yit_remove_default_shortcodes');

/* ============================== */
/* MOBILE HEADER MENU             */
/* ============================== */

function yit_mobile_menu_trigger() {
    ?>
    <!-- HEADER MENU TRIGGER -->
    <div id="mobile-menu-trigger" class="mobile-menu-trigger"><a href="#" data-effect="st-effect-4"
                                                                 class="glyphicon glyphicon-align-justify visible-xs"></a>
    </div>
    <?php
    }
    add_action('yit_header_inner', 'yit_mobile_menu_trigger', 5);


    function yit_manually_pos_w3tc() {
    if (!function_exists('w3_instance') || !w3_instance('W3_Plugin_Minify')->_config->get_boolean('minify.css.enable')) {
        return;
    }

    ?><!-- W3TC-include-css --><?php
}
add_action('wp_head', 'yit_manually_pos_w3tc', 1);

if (!function_exists('yit_get_blog_post_format_icon')) {
    /**
     * Remove the Wordpress Essential Grid Banner
     *
     *
     * @param string $post_format The post format type
     *
     * @param bool $echo Check if the method return the string code value or echo it.
     *
     * @return string  The icon code
     * @author Andrea Grillo <andrea.grillo@yithemes.com>
     * @since  2.0
     */
    function yit_get_blog_post_format_icon($post_format, $echo = true)
    {
        $icon_code = array(
            'standard' => '&#xe3ed',
            'quote' => '&#xe0c9',
            'gallery' => '&#xe3ee',
            'video' => '&#xe40f',
            'audio' => '&#xe264',
        );

        if (!isset($icon_code[$post_format])) {
            return '';
        }

        if ($echo) {
            echo $icon_code[$post_format];
        } else {
            return $icon_code[$post_format];
        }
    }
}

if (!function_exists('yit_comment_script')) {
    /**
     * add js comment script
     *
     * @author   Andrea Frascaspata  <andrea.frascaspata@yithemes.com>
     *
     * @return mixed array
     * @since    1.2.9
     */
    function yit_comment_script()
    {
        if (is_singular() && get_option('thread_comments'))
            wp_enqueue_script('comment-reply');
    }
}

if (!function_exists('yit_get_highlighted_title')) {
    /**
     * @param $title
     * @param string $highlighted_class
     *
     * @return mixed|string
     */
    function yit_get_highlighted_title($title, $highlighted_class = 'title-highlight')
    {
        $new_title = sprintf('<span>%s</span>', str_replace(array(
            '[',
            ']'
        ), array('</span><span class="' . $highlighted_class . '">', '</span><span>'), $title));
        $new_title = str_replace('<span></span>', '', $new_title);

        return $new_title;
    }
}

if (!function_exists('yit_add_testimonial_slider_script')) {
    /**
     * Add Testimonail Slider Script
     *
     * @since  2.0.0
     * @author Andrea Grillo <andrea.grillo@yithemes.com>
     */
    function yit_add_testimonial_slider_script()
    {

        if (function_exists('YIT_Testimonial')) {
            $options = array(
                'src' => YIT_THEME_ASSETS_URL . '/js/yit-testimonial-frontend.js',
                'enqueue' => true,
                'deps' => array('jquery'),
            );

            if (function_exists('YIT_Asset') && !is_admin()) {
                YIT_Asset()->set('script', 'yit-testimonial', $options);
            } else {
                wp_dequeue_script('yit-testimonial');
            }
        }
    }
}

if (!function_exists('yit_change_newsletter_cta_default_args')) {
    /**
     * Add new icon style
     *
     * @since  2.0.0
     * @author Andrea Grillo <andrea.grillo@yithemes.com>
     */
    function yit_change_newsletter_cta_default_args($shortcodes)
    {
        if (function_exists('YIT_Newsletter') && isset($shortcodes['newsletter_cta']['attributes']['icon_form'])) {
            $shortcodes['newsletter_cta']['attributes']['icon_form'] = array(
                'title' => __('Newsletter Form Icon', 'yit'),
                'type' => 'icon-list',
                'options' => YIT_Plugin_Common::get_icon_list(),
                'std' => ''
            );
        }

        return $shortcodes;
    }
}
add_filter('yit-shortcode-plugin-init', 'yit_change_newsletter_cta_default_args', 15);


if (!function_exists('yit_woocommerce_get_shop_categories')) {
    function yit_woocommerce_get_shop_categories($show_all = true)
    {
        global $wpdb;

        $terms = $wpdb->get_results('SELECT name, slug FROM ' . $wpdb->prefix . 'terms, ' . $wpdb->prefix . 'term_taxonomy WHERE ' . $wpdb->prefix . 'terms.term_id = ' . $wpdb->prefix . 'term_taxonomy.term_id AND taxonomy = "product_cat" ORDER BY name ASC;');

        $categories = array();
        if ($show_all) {
            $categories['0'] = __('All categories', 'yit');
        }
        if ($terms) {
            foreach ($terms as $cat) {
                $categories[$cat->slug] = ($cat->name) ? $cat->name : 'ID: ' . $cat->slug;
            }
        }
        return $categories;
    }
}


if (!function_exists('yit_deregister_style')) {
    /**
     * Remove css plugin
     *
     * @author Andrea Frascaspata <andrea.frascaspata@yithemes.com>
     * @since 2.0
     */
    function yit_deregister_style()
    {
        // js composer shortcode fix
        wp_deregister_style('prettyphoto');
    }
}
