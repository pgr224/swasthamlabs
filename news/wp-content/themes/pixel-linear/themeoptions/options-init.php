<?php
/**
  ReduxFramework Sample Config File
  For full documentation, please visit: https://docs.reduxframework.com
 * */

if (!class_exists('azkaban_options_redux_framework_config')) {

    class azkaban_options_redux_framework_config {

        public $args        = array();
        public $sections    = array();
        public $theme;
        public $ReduxFramework;

        public function __construct() {

            if (!class_exists('ReduxFramework')) {
                return;
            }

            // This is needed. Bah WordPress bugs.  ;)
            if ( true == Redux_Helpers::isTheme( __FILE__ ) ) {
                $this->initSettings();
            } else {
                add_action('plugins_loaded', array($this, 'initSettings'), 10);
            }

        }

        public function initSettings() {

            // Just for demo purposes. Not needed per say.
            $this->theme = wp_get_theme();

            // Set the default arguments
            $this->setArguments();

            // Set a few help tabs so you can see how it's done
            $this->setHelpTabs();

            // Create the sections and fields
            $this->setSections();

            if (!isset($this->args['opt_name'])) { // No errors please
                return;
            }

            // If Redux is running as a plugin, this will remove the demo notice and links
            //add_action( 'redux/loaded', array( $this, 'remove_demo' ) );
            
            // Function to test the compiler hook and demo CSS output.
            // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
            add_filter('redux/options/'.$this->args['opt_name'].'/compiler', array( $this, 'compiler_action' ), 10, 3);
            
            // Change the arguments after they've been declared, but before the panel is created
            //add_filter('redux/options/'.$this->args['opt_name'].'/args', array( $this, 'change_arguments' ) );
            
            // Change the default value of a field after it's been set, but before it's been useds
            //add_filter('redux/options/'.$this->args['opt_name'].'/defaults', array( $this,'change_defaults' ) );
            
            // Dynamically add a section. Can be also used to modify sections/fields
            //add_filter('redux/options/' . $this->args['opt_name'] . '/sections', array($this, 'dynamic_section'));

            $this->ReduxFramework = new ReduxFramework($this->sections, $this->args);

        }

        /**

          This is a test function that will let you see when the compiler hook occurs.
          It only runs if a field	set with compiler=>true is changed.

         * */
        function compiler_action($options, $css, $changed_values) {
            //echo '<h1>The compiler hook has run!</h1>';
            //echo "<pre>";
            //print_r($changed_values); // Values that have changed since the last save
            //echo "</pre>";
            //print_r($options); //Option values
           // print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
            /*
              // Demo of how to use the dynamic CSS and write your own static CSS file
              $filename = dirname(__FILE__) . '/compiled_style' . '.css';
             
              global $wp_filesystem;
              if( empty( $wp_filesystem ) ) {
                require_once( ABSPATH .'/wp-admin/includes/file.php' );
              WP_Filesystem();
              }

              if( $wp_filesystem ) {
                $wp_filesystem->put_contents(
                    $filename,
                    $css,
                    FS_CHMOD_FILE // predefined mode settings for WP files
                );
              }
            */
        }

        /**

          Custom function for filtering the sections array. Good for child themes to override or add to the sections.
          Simply include this function in the child themes functions.php file.

          NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
          so you must use get_template_directory_uri() if you want to use any of the built in icons

         * */
        function dynamic_section($sections) {
            //$sections = array();
            $sections[] = array(
                'title' => __('Section via hook', 'pixel-linear'),
                'desc' => __('<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'pixel-linear'),
                'icon' => 'el-icon-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }

        /**

          Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.

         * */
        function change_arguments($args) {
            //$args['dev_mode'] = true;

            return $args;
        }

        /**

          Filter hook for filtering the default value of any given field. Very useful in development mode.

         * */
        function change_defaults($defaults) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }

        // Remove the demo link and the notice of integrated demo from the redux-framework plugin
        function remove_demo() {

            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if (class_exists('ReduxFrameworkPlugin')) {
                remove_filter('plugin_row_meta', array(ReduxFrameworkPlugin::instance(), 'plugin_metalinks'), null, 2);

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action('admin_notices', array(ReduxFrameworkPlugin::instance(), 'admin_notices'));
            }
        }

        public function setSections() {

            /**
              Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
             * */
            // Background Patterns Reader
            $sample_patterns_path   = ReduxFramework::$_dir . '../sample/patterns/';
            $sample_patterns_url    = ReduxFramework::$_url . '../sample/patterns/';
            $sample_patterns        = array();

            if (is_dir($sample_patterns_path)) :

                if ($sample_patterns_dir = opendir($sample_patterns_path)) :
                    $sample_patterns = array();

                    while (( $sample_patterns_file = readdir($sample_patterns_dir) ) !== false) {

                        if (stristr($sample_patterns_file, '.png') !== false || stristr($sample_patterns_file, '.jpg') !== false) {
                            $name = explode('.', $sample_patterns_file);
                            $name = str_replace('.' . end($name), '', $sample_patterns_file);
                            $sample_patterns[]  = array('alt' => $name, 'img' => $sample_patterns_url . $sample_patterns_file);
                        }
                    }
                endif;
            endif;

            ob_start();

            $ct             = wp_get_theme();
            $this->theme    = $ct;
            $item_name      = $this->theme->get('Name');
            $tags           = $this->theme->Tags;
            $screenshot     = $this->theme->get_screenshot();
            $class          = $screenshot ? 'has-screenshot' : '';

            $customize_title = sprintf(__('Customize &#8220;%s&#8221;', 'pixel-linear'), $this->theme->display('Name'));
            
            ?>
            <div id="current-theme" class="<?php echo esc_attr($class); ?>">
            <?php if ($screenshot) : ?>
                <?php if (current_user_can('edit_theme_options')) : ?>
                        <a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize" title="<?php echo esc_attr($customize_title); ?>">
                            <img src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview','pixel-linear'); ?>" />
                        </a>
                <?php endif; ?>
                    <img class="hide-if-customize" src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview','pixel-linear'); ?>" />
                <?php endif; ?>

                <h4><?php echo $this->theme->display('Name'); ?></h4>

                <div>
                    <ul class="theme-info">
                        <li><?php printf(__('By %s', 'pixel-linear'), $this->theme->display('Author')); ?></li>
                        <li><?php printf(__('Version %s', 'pixel-linear'), $this->theme->display('Version')); ?></li>
                        <li><?php echo '<strong>' . __('Tags', 'pixel-linear') . ':</strong> '; ?><?php printf($this->theme->display('Tags')); ?></li>
                    </ul>
                    <p class="theme-description"><?php echo $this->theme->display('Description'); ?></p>
            <?php
            if ($this->theme->parent()) {
                printf(' <p class="howto">' . __('This <a href="%1$s">child theme</a> requires its parent theme, %2$s.','pixel-linear') . '</p>', __('http://codex.wordpress.org/Child_Themes', 'pixel-linear'), $this->theme->parent()->display('Name'));
            }
            ?>

                </div>
            </div>

            <?php
            $item_info = ob_get_contents();

            ob_end_clean();

            $sampleHTML = '';
            if (file_exists(dirname(__FILE__) . '/info-html.html')) {
                /** @global WP_Filesystem_Direct $wp_filesystem  */
                global $wp_filesystem;
                if (empty($wp_filesystem)) {
                    require_once(ABSPATH . '/wp-admin/includes/file.php');
                    WP_Filesystem();
                }
                $sampleHTML = $wp_filesystem->get_contents(dirname(__FILE__) . '/info-html.html');
            }

            // ACTUAL DECLARATION OF SECTIONS
			$this->sections[] = array(
                'icon'      => 'el-icon-credit-card',
                'title'     => __('General', 'pixel-linear'),
                'fields'    => array(
                    array (
					'id' => 'custom_ads',
					'icon' => true,
					'type' => 'info',
					'raw' => '<h3 style="margin: 0 0 10px;">Click on image to get themes</h3>
							<a href=\'http://pixelthemestudio.ca/product/pixel-linear/\' target=\'_blank\'><img src='.site_url().'/wp-content/themes/pts-pixel-linear/admin/assets/images/new-ad.jpg /></a> ',
				),array (
					'desc' => 'Upload or paste the URL for your custom favicon.',
					'id' => 'custom_favicon',
					'type' => 'media',
					'title' => 'Favicon',
					'url' => true,
				),
				array (
					'desc' => 'Use this field to upload your custom logo for use in the theme header. (Recommended 200px x 40px)',
					'id' => 'custom_logo',
					'type' => 'media',
					'title' => 'Main Logo',
					 'url'       => true,
					'default'   => array('url' => get_stylesheet_directory_uri() .'/images/logo.png'),
				),
				array (
					'desc' => 'Use this field to logo slogan for use in the theme header.',
					'id' => 'logo_tagline',
					'type' => 'text',
					'title' => 'Tagline',
				),
				array (
					'desc' => 'Select full width or Boxed layout for pages.',
					'id' => 'custom_main_layout',
					'type' => 'select',
					'options' => array (
						'Full Width' => 'Full Width',
						'Boxed' => 'Boxed',
					),
					'title' => 'Main Layout',
					'default' => 'Boxed',
				),
				array (
					'desc' => 'Select layout for Blog Page with left, right Sidebar. Use widgets to add contents on sidebars',
					'id' => 'custom_blog_layout',
					'type' => 'select',
					'options' => array (
						'No Sidebar' => 'No Sidebar',
						'Left Sidebar' => 'Left Sidebar',
						'Right Sidebar' => 'Right Sidebar',
						'Left + Right Sidebar' => 'Left + Right Sidebar',
					),
					'title' => 'Blog Layout',
					'default' => 'No Sidebar',
				),
				array (
					'desc' => 'Select layout for Single Post View with left, right Sidebar. Use widgets to add contents on sidebars',
					'id' => 'custom_single_post_layout',
					'type' => 'select',
					'options' => array (
						'No Sidebar' => 'No Sidebar',
						'Left Sidebar' => 'Left Sidebar',
						'Right Sidebar' => 'Right Sidebar',
						'Left + Right Sidebar' => 'Left + Right Sidebar',
					),
					'title' => 'Single Post Layout',
					'default' => 'No Sidebar',
				)
                    /*
                    array(
                        'id'        => 'blog-layout',
                        'type'      => 'select',
                        'title'     => __('Select Blog Layout', 'pixel-linear'),
                        'desc'      => __('Select site wide blog layout.', 'pixel-linear'),
                        'options'   => array(
                            '1' => 'Large Featured',
                            '2' => 'Medium Featured',
                            '3' => 'Grid',
                        ),
                        'default'   => '1'
                    ),
                    */
                )
            );
			
            $this->sections[] = array(
                'icon'      => 'el-icon-credit-card',
                'title'     => __('Home Settings', 'pixel-linear'),
                'fields'    => array(
					array (
					'desc' => 'Click on button to enable slider on homepage',
					'id' => 'enable_disable_slider',
					'on' => 'Enable',
					'off' => 'Disable',
					'type' => 'switch',
					'title' => 'Enable Slider',
				),
				array (
					'desc' => 'Unlimited slider with drag and drop sortings. (Recommended size xpx x ypx)',
					'id' => 'custom_slider',
					'type' => 'slides',
					'title' => 'Slider Options',
				),
				array (
					'desc' => 'Use widgets to add content in 3 boxes',
					'id' => 'enable_disable_3box',
					'on' => 'Enable',
					'off' => 'Disable',
					'type' => 'switch',
					'title' => 'Enable 3 Boxes On Homepage',
				)
                    /*
                    array(
                        'id'        => 'blog-layout',
                        'type'      => 'select',
                        'title'     => __('Select Blog Layout', 'pixel-linear'),
                        'desc'      => __('Select site wide blog layout.', 'pixel-linear'),
                        'options'   => array(
                            '1' => 'Large Featured',
                            '2' => 'Medium Featured',
                            '3' => 'Grid',
                        ),
                        'default'   => '1'
                    ),
                    */
                )
            );
            
            $this->sections[] = array(
                'icon'      => 'el-icon-hand-down',
                'title'     => __('Social Settings', 'pixel-linear'),
                'fields'    => array(
                    array (
					'desc' => 'Click on button to enable Social Icons at bottom',
					'id' => 'enable_disable_sm',
					'on' => 'Enable',
					'off' => 'Disable',
					'type' => 'switch',
					'title' => 'Enable Social Icons',
					'default' => '1',
				),
				array (
					'id' => 'sco_ico_lbl',
					'icon' => true,
					'type' => 'info',
					'raw' => '<h3 style="margin: 0 0 10px;">Insert your social link to show the icon.</h3>',
				),
				array (
					'desc' => 'Insert your custom link to show the Facebook icon. Leave blank to hide icon.',
					'id' => 'custom_facebook_link',
					'type' => 'text',
					'title' => 'Facebook',
					'default' => 'http://www.facebook.com',
				),
				array (
					'desc' => 'Insert your custom link to show the Twitter icon. Leave blank to hide icon.',
					'id' => 'custom_twitter_link',
					'type' => 'text',
					'title' => 'Twitter',
					'default' => 'http://www.twitter.com',
				),
				array (
					'desc' => 'Insert your custom link to show the Google+ icon. Leave blank to hide icon.',
					'id' => 'custom_Googlep_link',
					'type' => 'text',
					'title' => 'Google+',
					'default' => 'http://www.google.com',
				),
				array (
					'desc' => 'Insert your custom link to show the Linkedin icon. Leave blank to hide icon.',
					'id' => 'custom_linkedin_link',
					'type' => 'text',
					'title' => 'Linkedin',
					'default' => 'http://www.linkedin.com',
				),
				array (
					'desc' => 'Insert your custom link to show the Instagram icon. Leave blank to hide icon.',
					'id' => 'custom_instagram_link',
					'type' => 'text',
					'title' => 'Instagram',
					'default' => 'http://www.instagram.com',
				),
				array (
					'desc' => 'Insert your custom link to show the Pinterest icon. Leave blank to hide icon.',
					'id' => 'custom_pinterest_link',
					'type' => 'text',
					'title' => 'Pinterest',
					'default' => 'http://www.pinterest.com',
				),
				array (
					'desc' => 'Insert your custom link to show the Reddit icon. Leave blank to hide icon.',
					'id' => 'custom_reddit_link',
					'type' => 'text',
					'title' => 'Reddit',
					'default' => 'http://www.reddit.com',
				),
				array (
					'desc' => 'Insert your custom link to show the Tumblr icon. Leave blank to hide icon.',
					'id' => 'custom_tumblr_link',
					'type' => 'text',
					'title' => 'Tumblr',
					'default' => 'http://www.tumblr.com',
				),
				array (
					'desc' => 'Insert your custom link to show the Stumbleupon icon. Leave blank to hide icon.',
					'id' => 'custom_stumbleupon_link',
					'type' => 'text',
					'title' => 'Stumbleupon',
					'default' => 'http://www.stumbleupon.com',
				)
                )
            );
            
            $this->sections[] = array(
                'icon'      => 'el-icon-list-alt',
                'title'     => __('Footer Settings', 'pixel-linear'),
                'fields'    => array(
                    array (
					'desc' => 'Upload your footer logo here.',
					'id' => 'custom_footer_logo',
					'type' => 'media',
					'title' => 'Footer Logo',
					'url' => true,
				),
				array (
					'desc' => 'Copyright information goes here',
					'id' => 'custom_copy_info',
					'type' => 'textarea',
					'title' => 'Copyright Text',
					'default' => 'Copyright &copy; 2015 Pixel Theme Studio. All rights reserved.',
				)	
                )
            );
            
            $theme_info  = '<div class="redux-framework-section-desc">';
            $theme_info .= '<p class="redux-framework-theme-data description theme-uri">' . __('<strong>Theme URL:</strong> ', 'pixel-linear') . '<a href="' . $this->theme->get('ThemeURI') . '" target="_blank">' . $this->theme->get('ThemeURI') . '</a></p>';
            $theme_info .= '<p class="redux-framework-theme-data description theme-author">' . __('<strong>Author:</strong> ', 'pixel-linear') . $this->theme->get('Author') . '</p>';
            $theme_info .= '<p class="redux-framework-theme-data description theme-version">' . __('<strong>Version:</strong> ', 'pixel-linear') . $this->theme->get('Version') . '</p>';
            $theme_info .= '<p class="redux-framework-theme-data description theme-description">' . $this->theme->get('Description') . '</p>';
            $tabs = $this->theme->get('Tags');
            if (!empty($tabs)) {
                $theme_info .= '<p class="redux-framework-theme-data description theme-tags">' . __('<strong>Tags:</strong> ', 'pixel-linear') . implode(', ', $tabs) . '</p>';
            }
            $theme_info .= '</div>';
                   
                    
            $this->sections[] = array(
                'type' => 'divide',
            );

            $this->sections[] = array(
                'icon'      => 'el-icon-info-sign',
                'title'     => __('Theme Information', 'pixel-linear'),
                'desc'      => __('<p class="description">Visit us at <a href="http://PixelThemeStudio.ca/">PixelThemeStudio.ca</a></p>', 'pixel-linear'),
                'fields'    => array(
                    array(
                        'id'        => 'opt-raw-info',
                        'type'      => 'raw',
                        'content'   => $item_info,
                    )
                ),
            );

        }

        public function setHelpTabs() {

            define(get_template_directory_uri, get_template_directory_uri());
            // Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
            $this->args['help_tabs'][] = array(
                'id'        => 'azkaban-help-tab-1',
                'title'     => __('More Information', 'pixel-linear'),
                'content'   => __('<p>Feel free to <a href="http://PixelThemeStudio.ca/contact/">contact us</a> for any help you need.</p>', 'pixel-linear')
            );

            $this->args['help_tabs'][] = array(
                'id'        => 'azkaban-help-tab-2',
                'title'     => __('Submit Review', 'pixel-linear'),
                'content'   => __('<p>Submit your review at <a href="http://PixelThemeStudio.ca/">PixelThemeStudio.ca</a>.</p>', 'pixel-linear')
            );

            // Set the help sidebar
            $this->args['help_sidebar'] = __('<p><a href="https://www.facebook.com/pthemestudio" target="_blank"><img src="get_template_directory_uri/images/socialicons/fb.png" title="Find Us On Facebook" /></a> <a href="https://twitter.com/pthemestudio" target="_blank"><img src="get_template_directory_uri/images/socialicons/twitter.png" title="Follow Us On Twitter" /></a> <a href="https://www.youtube.com/channel/UCHBQpt1gn7woiKQkgVDAObw" target="_blank"><img src="get_template_directory_uri()/images/socialicons/youtube.png" title="Check Us On YouTube" /></a> <a href="http://www.pinterest.com/berkansanches/pthemestudio/" target="_blank"><img src="get_template_directory_uri/images/socialicons/pinterest.png" title="Check Us On Pinterest" /></a></p>', 'pixel-linear');
        }

        /**

          All the possible arguments for Redux.
          For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments

         * */
        public function setArguments() {

            $theme = wp_get_theme(); // For use with some settings. Not necessary.

            $this->args = array (
                'opt_name' => 'pixel_linear_options',
                'display_name'     => $theme->get('Name'),
                'display_version'  => $theme->get('Version'),
                'global_variable' => 'pixel_linear_options',
                'admin_bar' => '1',
                'allow_sub_menu' => '1',
                'customizer' => '1',
                'default_show' => '1',
                'default_mark' => '*',
                'footer_text' => '<p><center><a href="http://www.tkqlhce.com/g9117biroiq5DB6968A576A6EAF8" target="_blank" onmouseover="window.status=\'http://www.hostgator.com\';return true;" onmouseout="window.status=\' \';return true;"><img src="http://www.lduhtrp.net/1i103c37w1-LTRMPMOQLNMQMUQVO" alt="" border="0"/></a></center></p>',
                'google_api_key' => 'sdfadfasdfasdfasdfasdf',
                'hint-icon' => 'el-icon-question-sign',
                'icon_position' => 'right',
                'icon_color' => '#1e73be',
                'icon_size' => 'normal',
                'tip_style_color' => 'light',
                'tip_style_rounded' => '1',
                'tip_style_style' => 'youtube',
                'tip_position_my' => 'top left',
                'tip_position_at' => 'bottom right',
                'tip_show_duration' => '500',
                'tip_show_event' => 
                array (
                  0 => 'mouseover',
                ),
                'tip_hide_duration' => '500',
                'tip_hide_event' => 
                array (
                  0 => 'mouseleave',
                  1 => 'unfocus',
                ),
                'intro_text' => '<p><center></center></p>',
                'menu_title' => $theme->get('Name') . ' Options',
                'menu_type' => 'menu',
                'output' => '1',
                'output_tag' => '1',
                'page_icon' => 'icon-themes',
                'page_parent_post_type' => 'your_post_type',
                'page_priority' => '4',
                'page_permissions' => 'manage_options',
                'page_slug' => '_options',
                'page_title' => $theme->get('Name') . ' Theme Options',
                'save_defaults' => '1',
                'show_import_export' => '1',
                'update_notice' => '1',
                'footer_credit' => 'Powered By <a href="http://www.reduxframework.com/">Redux Framework</a> v3.2.7.1 - Developed By <a href="http://PixelThemeStudio.ca">PixelThemeStudio.ca</a>',
            );

            // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
            $this->args['share_icons'][] = array(
                'url'   => 'https://www.facebook.com/pixelthemestudio/?fref=ts',
                'title' => 'Like us on Facebook',
                'icon'  => 'el-icon-facebook'
            );
            $this->args['share_icons'][] = array(
                'url'   => 'https://twitter.com/pthemestudio',
                'title' => 'Follow us on Twitter',
                'icon'  => 'el-icon-twitter'
            );
           /* $this->args['share_icons'][] = array(
                'url'   => 'https://www.youtube.com/channel/UCHBQpt1gn7woiKQkgVDAObw',
                'title' => 'Visit us on YouTube',
                'icon'  => 'el-icon-youtube'
                //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
            );
            $this->args['share_icons'][] = array(
                'url'   => 'http://www.pinterest.com/berkansanches/pthemestudio/',
                'title' => 'Find us on Pinterest',
                'icon'  => 'el-icon-pinterest'
            );*/
        }
    }
    
    global $reduxConfig;
    $reduxConfig = new azkaban_options_redux_framework_config();
}

/**
  Custom function for the callback referenced above
 */
if (!function_exists('azkaban_options_my_custom_field')):
    function azkaban_options_my_custom_field($field, $value) {
        print_r($field);
        echo '<br/>';
        print_r($value);
    }
endif;

/**
  Custom function for the callback validation referenced above
 * */
if (!function_exists('azkaban_options_validate_callback_function')):
    function azkaban_options_validate_callback_function($field, $value, $existing_value) {
        $error = false;
        $value = 'just testing';

        /*
          do your validation

          if(something) {
            $value = $value;
          } elseif(something else) {
            $error = true;
            $value = $existing_value;
            $field['msg'] = 'your custom error message';
          }
         */

        $return['value'] = $value;
        if ($error == true) {
            $return['error'] = $field;
        }
        return $return;
    }
endif;
